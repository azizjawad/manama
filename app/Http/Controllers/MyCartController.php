<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\CouponsModel;
use App\Models\OrderDetailsModel;
use App\Models\OrdersModel;
use App\Models\OrderHistory;
use App\Models\ProductInfoModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;
use Log;

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
                    return response(['status' => false,'messages' => 'User is not logged in'], 401);
                }
            }
            return response(['status' => false,'messages' => 'Product is out of stock'], 403);
        }

       return response(['status' => false,'messages' => $validator->errors()], 400);
    }

    public static function cart_page(){
        $user_id = Auth::id();
        $data['cart'] = self::get_cart_data($user_id);
        return view('website/account/cart', $data);
    }

    public function fetch_cart_details(){
        $user_id = Auth::id();
        return response(['status' => true, 'data' => self::get_cart_data($user_id)]);
    }

    public function get_product_by_info_id($product_info_id, $product_id = ''){
        $id = '';
        if (is_numeric($product_id)){
            $id = $product_id;
        }else{
            $product = ProductInfoModel::select('product_id')->where('id', $product_info_id)->first();
            $id = $product->product_id;
        }

        if (!empty($id)){
            $data = ProductInfoModel::select(['id','listing_name','cost_price'])->where('product_id', $id)->where('is_in_stock', 1)->get();
            return response(['status' => true, 'data' => $data]);
        }
        return response(['status' => false, 'data' => []]);
    }

    public function delete_cart($cart_id){
        $user_id = Auth::id();
        $is_deleted = CartModel::where('user_id', $user_id)->where('id', $cart_id)->delete();
        return response(['status' => (bool) $is_deleted, 'page' => 'cart']);
    }

    public static function get_cart_data($user_id){
            return CartModel::select(['cart.id as cart_id','products.image','cart.quantity','product_info.id as product_info_id','product_info.listing_name as product_name','product_info.packaging_weight',
                'product_info.packaging_type','product_info.cost_price','product_info.sku_code','product_info.gst_rate','product_info.barcode','is_in_stock'])
            ->join('product_info','cart.product_info_id','product_info.id')
            ->join('products','product_info.product_id','products.id')
            ->where('cart.user_id', $user_id)
            ->where('products.status',1)
            ->where('product_info.is_in_stock',1)
            ->get();
    }

    public function update_quantity(Request $request){
        $post = $request->all();
        $rules = array(
            'qty' => 'required',
        );
        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            $user_id = Auth::id();
            if (isset($post['clear_cart'])){
                CartModel::where('user_id', $user_id)->delete();
            }else{
                foreach ($post['qty'] as $key => $value){
                    CartModel::where('user_id', $user_id)->where('id', $key)->update(['quantity' => $value]);
                }
            }

            return redirect('/account/cart');
        }
    }

    // public function apply_coupon(Request $request) {

    //     $post = $request->post();
    //     $validator = Validator::make($post, [
    //         'coupon_code'  => ['required']
    //     ]);;

    //     if ($validator->fails()){
    //         return response(['status' => false, 'errors' => $validator->errors()], 400);
    //     }else {
    //         $status = false;
    //         $coupon = CouponsModel::select('coupons.*',\DB::raw('COUNT(orders.id) as order_count'))->where('coupon_code', $post['coupon_code'])->where('coupon_validity', '>=', date('Y-m-d'))
    //         ->leftjoin('orders', function ($join) {
    //             $join->on('orders.user_id', '=', Auth::id())
    //             ->where('orders.coupon_code', 'coupons.coupon_code');
    //         })
    //         ->first();
    //         Log::info("coupon");
    //         Log::info( $coupon );
    //         if(!empty ($coupon) ) {
    //             // check if coupon is single use
    //             if($coupon->coupon_use == 1 && $coupon->order_count > 0){

    //             }
    //             $cartDetails = self::getCartTotal(Auth::id());
    //             Log::info("cartDetails");
    //             Log::info( $cartDetails );
    //             $totalAmt = $cartDetails->cart_total;
    //             if(strpos($coupon->coupon_value, '%') !== false ) {
    //                 Log::info("percentage discount >>");
    //                 $couponValue  = str_replace('%','',$coupon->coupon_value);
    //                 $discount = $totalAmt - ($totalAmt * ($couponValue / 100));
    //                 Log::info("couponValue");
    //                 Log::info( $couponValue );
    //                 Log::info("discount");
    //                 Log::info( $discount );
    //             } else {
    //                 Log::info("normal discount >> ");
    //                 $discount = $totalAmt - $coupon->coupon_value;
    //                 Log::info("discount");
    //                 Log::info( $discount );
    //             }
    //             $message = 'Coupon Applied';
    //         } else {
    //             $message = 'Invalid Coupon';
    //         }
    //         if ($status)
    //             return response(['status' => true, 'message' => $message, 'discount' => $discount]);
    //         else
    //             return response(['status' => false, 'message' => $message], 500);
    //     }
    // }

    public function place_order(Request $request) {

        $post = $request->post();
        \Log::info("transaction_type");
        \Log::info($post['transaction_type']);
        $validator = Validator::make($post, [
            'billing_address'  => ['required']
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {
            $user_id = Auth::id();
            $cart_products = self::get_cart_data($user_id);
            $order_no = time().random_int(10000, 99999);
            $sub_total = 0;
            $order_details = [];
            foreach($cart_products as $cart_product) {
                $sub_total += ($cart_product->quantity * $cart_product->cost_price);
            }
            $orders = [
                'user_id'               => $user_id,
                'order_no'              => $order_no,
                'transaction_type'      => $post['transaction_type'],
                'total_amount'          => $post['total'],
                'transaction_id'         => $post['transaction_id'] ?? null,
                'sub_total'             => $sub_total,
                'discount'              => $post['discount'],
                'shipping_charges'      => $post['shipping_charges'],
                'coupon_type'           => $post['coupon_type'],
                'coupon_code'           => $post['coupon_code'],
                'billing_address'       => $post['billing_address'],
                'shipping_address'      => $post['shipping_address'],
                'status'                => ORDER_STATUSES['PROCESSING']['id'],
                'gstn_no'               => $post['gstn_no'],
                'created_by'            => $user_id
            ];
            $order_placed = OrdersModel::create($orders);
            OrderHistory::create([
                'order_id'          => $order_placed->id,
                'status'            => ORDER_STATUSES['PROCESSING']['id'],
                'description'       => ORDER_STATUSES['PROCESSING']['description'],
                'created_by'        => $user_id
            ]);
            if(!empty ( $order_placed )) {

                foreach($cart_products as $cart_product) {
                    $order_details[] = [
                        'product_info_id'=> $cart_product->product_info_id,
                        'order_id'      => $order_placed->id,
                        'quantity'      => $cart_product->quantity,
                        'product_cost'  => $cart_product->cost_price,
                        'created_by'    => $user_id,
                        'created_at'    => date('Y-m-d H:i:s')
                    ];
                }
                $status = OrderDetailsModel::insert($order_details);
                if ($status) {
                    CartModel::where('user_id', $user_id)->delete();
                    return response(['status' => true, 'message' => 'Order placed successfully']);
                }
            }
            return response(['status' => false, 'message'], 500);
        }
    }

    public function getCartTotal($user_id){
        return CartModel::select([\DB::raw('SUM(product_info.cost_price * cart.quantity) as cart_total')])
        ->join('product_info','cart.product_info_id','product_info.id')
        ->join('products','product_info.product_id','products.id')
        ->where('cart.user_id', $user_id)
        ->where('products.status',1)
        ->where('product_info.is_in_stock',1)
        ->first();
    }
}
