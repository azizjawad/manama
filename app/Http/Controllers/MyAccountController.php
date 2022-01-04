<?php

namespace App\Http\Controllers;

use App\Models\MyaccountModel;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Auth;


class MyAccountController extends Controller
{
    protected $logged_in_id;
    function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            $this->logged_in_id= Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        $data['orders'] = OrdersModel::join('order_details', 'order_details.order_id', 'orders.id')
        ->where('user_id', $this->logged_in_id->id)->orderBy('orders.id', 'desc')->get();
        return view('website/account/my-account', $data);
    }

    public function change_password()
    {
        return view('website/account/change-password');
    }

    public function my_wishlist()
    {
        $wishListData = \App\Models\WishListModel::with('product_info')->get();
        return view('website/account/my-wishlist', compact('wishListData'));
    }

    public function edit_profile(){
        return view('website/account/edit-profile');
    }

    public function order_history(){
        return view('website/account/order-history');
    }

    public function user_settings(){
        return view('website/account/user-settings');
    }

    public function checkout() {
        $data['my_address_list'] = MyaccountModel::where('user_id', $this->logged_in_id->id)->get();
        $data['cart'] = MyCartController::get_cart_data($this->logged_in_id->id);
        return view('website/account/checkout', $data);
    }

    public function thank_you(){
        return view('website/account/thank-you');
    }

    public function manage_address() {
        $data['my_address_list'] = MyaccountModel::where('user_id', $this->logged_in_id->id)->get();
        return view('website/account/manage-address', $data);
    }

    public function save_address(Request $request) {

        $post = $request->post();
        $validator = Validator::make($post, [
            'txt_label'         => ['required'],
            'txt_fullname'      => ['required'],
            'txt_mobile_no'     => ['required'],
            'txt_address'       => ['required'],
            'state'             => ['required'],
            'txt_city_village'  => ['required'],
            'txt_pincode'       => ['required']
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {
            
            $fields = [
                'label'         => $post['txt_label'],
                'fullname'      => $post['txt_fullname'],
                'mobile_no'     => $post['txt_mobile_no'],
                'address'       => $post['txt_address'],
                'state'         => $post['state'],
                'city_village'  => $post['txt_city_village'],
                'pincode'       => $post['txt_pincode'],
                'user_id'       => $this->logged_in_id->id,
            ];
            
            if (isset($post['my_address_id'])) {
                $fields['modified_by'] = $this->logged_in_id->id;
                $message = 'Address details updated successfully.';
                $status = MyaccountModel::where('id', $post['category_id'])->update($fields);
            } else {
                $fields['created_by'] = $this->logged_in_id->id;
                $message = 'Address created successfully.';
                $status = MyaccountModel::create($fields);
            }

            if ($status)
                return response(['status' => true, 'message' => $message]);
            else
                return response(['status' => false], 500);
        }
    }

    public function delete_address(Request $request) {

        $post = $request->post();
        $validator = Validator::make($post, [
            'row_id'         => ['required']
        ]);;

        if ($validator->fails()){
            return response(['status' => false, 'errors' => $validator->errors()], 400);
        }else {
            $fields['modified_by'] = $this->logged_in_id->id;
            $fields['deleted_at'] = date('Y-m-d H:i:s');
            $status = MyaccountModel::where('id', $post['row_id'])->update($fields);
        

            if ($status)
                return response(['status' => true, 'message' => 'Address deleted successfully']);
            else
                return response(['status' => false], 500);
        }
    }
}
