<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductInfoModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MyCartController extends Controller
{

    public function index(Request $request)
    {
        $post = $request->all();
        $rules = array(
            'product_info_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        );
        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            $is_online = ProductInfoModel::where('id',$post['product_info_id'])->where('is_in_stock', 1)->exists();
            if ($is_online){
                if (\Auth::user()){
                    $user_id = \Auth::id();
                    $previous_quantity = CartModel::where('user_id', $user_id)
                            ->where("product_info_id", $post['product_info_id'])
                            ->pluck('quantity')->first();

                    if (!empty($previous_quantity)){
                        $result = CartModel::where("product_info_id", $post['product_info_id'])->update(['quantity' => $previous_quantity + $post['quantity']]);
                        if ($result)
                        return response(['status' => true,'message' => "Success!! quantity has been updated in the cart"]);
                    }else{
                        $fields = [
                            "quantity" => $post['quantity'],
                            "product_info_id" => $post['product_info_id'],
                            "user_id" => $user_id
                        ];
                        $result = CartModel::create($fields);
                        if ($result)
                        return response(['status' => true,'message' => "Success!! product added into cart"]);
                    }
                    return response(['status' => false], 500);
                }else{
                    return response(['status' => false,'messages' => 'User is not logged in', 401]);
                }
            }
            return response(['status' => false,'messages' => 'Product is out of stock', 403]);
        }

       return response(['status' => false,'messages' => $validator->errors()], 400);
    }

    public function cart_page(){
        $user_id = Auth::id();
        $data['cart'] = self::get_cart_data($user_id);
        return view('website/account/cart', $data);
    }

    public function fetch_cart_details(){
        $user_id = Auth::id();
        return response(['status' => true, 'data' => self::get_cart_data($user_id)]);
    }

    public function delete_cart($cart_id){
        $user_id = Auth::id();
        $is_deleted = CartModel::where('user_id', $user_id)->where('id', $cart_id)->delete();
        return response(['status' => (bool) $is_deleted, 'page' => 'cart']);
    }

    private function get_cart_data($user_id){
            return CartModel::select(['cart.id as cart_id','products.image','cart.quantity','product_info.id as product_info_id','product_info.listing_name as product_name','product_info.packaging_weight',
                'product_info.packaging_type','product_info.cost_price','product_info.sku_code','product_info.barcode','is_in_stock'])
            ->join('product_info','cart.product_info_id','product_info.id')
            ->join('products','product_info.product_id','products.id')
            ->where('cart.user_id', $user_id)
            ->where('products.status',1)
            ->where('product_info.is_in_stock',1)
            ->get();
    }
}
