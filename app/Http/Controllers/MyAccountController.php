<?php

namespace App\Http\Controllers;

use App\Models\MyaccountModel;
use App\Models\OrdersModel;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
use Auth;
use Log;
use App\Models\ShippingModel;

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
        $user = Auth::user();
        return view('website.account.edit-profile', compact('user'));
    }

    public function order_history(){
        return view('website.account.order-history');
    }

    public function user_settings(){
        return view('website.account.user-settings');
    }

    public function checkout(Request $request) {
        $data['my_address_list'] = MyaccountModel::where('user_id', $this->logged_in_id->id)->get();
        $data['cart'] = (new MyCartController)->get_cart_data($this->logged_in_id->id);
        // get shipping rules
        $data['shippingDetails'] = self::getShippingCharges($this->logged_in_id->id);
        $data['discountArray'] = array();
        if($request->post('coupon_code') != ''){
            $data['discountArray']= self::apply_coupon($request,  $data['shippingDetails']);
        }else if( $request->post('coupon_code') == NULL ){
            Log::info("coupon is null");
            $data['discountArray'] = array(
                'coupon_code' => '',
                'discount' => '',
                'discountedTotal' => '',
                'message' => '',
                'product_type' => '',
                'errorMessage' => '',
                'invalidCoupon' => false,
            );
        }
        \Log::info("discountArray");
        \Log::info( $data['discountArray'] );
        return view('website/account/checkout', $data);
    }

    public function thank_you(){
        return view('website/account/thank-you');
    }

    public function manage_address() {
        $data['my_address_list'] = MyaccountModel::where('user_id', $this->logged_in_id->id)->get();
        return view('website/account/manage-address', $data);
    }

    public function save_profile(Request $request){
        $post = $request->post();

        $validator = Validator::make($post, [
            'name'         => ['required'],
        ]);

        if (!$validator->fails()){
            $name = explode(' ', $post['name']);

            $fields = [
                "name" => $post['name'],
                'first_name' => $name[0],
                'last_name' => $name[1] ?? "",
            ];

            if (isset($post['dob']) && !empty($post['dob'])){
               $fields['dob'] = date('Y-m-d', strtotime($post['dob']));
            }

            if (isset($post['phone_no']) && !empty($post['phone_no'])){
                $fields['mobile'] = $post['phone_no'];
            }

            User::where('id', auth()->id())->update($fields);
        }
        return redirect()->back();
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
    public static function apply_coupon($request, $shippingDetails = array()) {

        $post = $request->post();
        $validator = Validator::make($post, [
            'coupon_code'  => ['required']
        ]);;

        if ($validator->fails()){
            return array(
                'coupon_code' => '',
                'discount' => '',
                'discountedTotal' => '',
                'message' => '',
                'product_type' => '',
                'errorMessage' => 'Coupon Code is required',
                'invalidCoupon' => false,
            );
        }else {
            $status = false;
            $coupon =  \App\Models\CouponsModel::where('coupons.coupon_code', $post['coupon_code'])->where('coupons.coupon_validity', '>=', date('Y-m-d'))
            ->first();
            Log::info("coupon");
            Log::info( $coupon );
            if(!empty ($coupon) ) {
                 // check if coupon is single use
                 if($coupon->coupon_use == 1 ){
                    // order count
                    $orderExists = OrdersModel::where('orders.coupon_code', $post['coupon_code'])->where('orders.user_id', \Auth::id())->exists();
                    if( $orderExists ){
                        return array(
                            'coupon_code' => '',
                            'discount' => '',
                            'discountedTotal' => '',
                            'message' => '',
                            'product_type' => '',
                            'errorMessage' => 'Coupon Code is inValid/Expired',
                            'invalidCoupon' => true,
                        );
                    }
                }
                $cartDetails = self::getCartTotal(Auth::id());
                Log::info("cartDetails");
                Log::info( $cartDetails );
                $totalAmt = $cartDetails->cart_total;
                if( $coupon->product_type == 2){
                    $totalAmt = $shippingDetails['shippingCharges'];
                }
                if(strpos($coupon->coupon_value, '%') !== false ) {
                    Log::info("percentage discount >>");
                    $couponValue  = str_replace('%','',$coupon->coupon_value);
                    $discount = $totalAmt * ($couponValue / 100);
                    Log::info("couponValue");
                    Log::info( $couponValue );
                    Log::info("discount");
                    Log::info( $discount );
                } else {
                    Log::info("normal discount >> ");
                    $discount = $coupon->coupon_value;
                    Log::info("discount");
                    Log::info( $discount );
                }
                $discountedTotal = $cartDetails->cart_total - $discount;
                $message = 'Coupon Applied';
            } else {
                $message = 'Invalid Coupon';
                return array(
                    'coupon_code' => '',
                    'discount' => '',
                    'discountedTotal' => '',
                    'message' => '',
                    'product_type' => '',
                    'errorMessage' => 'Coupon Code is required',
                    'invalidCoupon' => true,
                );
            }
            $discountArray = array(
                'coupon_code' => $post['coupon_code'],
                'discount' => $discount,
                'discountedTotal' => $discountedTotal,
                'message' => $message,
                'product_type' => $coupon->product_type,
                'errorMessage' => '',
                'invalidCoupon' => false,
            );
            return $discountArray;
            // if ($status)
            //     return response(['status' => true, 'message' => $message, 'discount' => $discount]);
            // else
            //     return response(['status' => false, 'message' => $message], 500);
        }
    }

    public static function getCartTotal($user_id){
        return \App\Models\CartModel::select([\DB::raw('SUM(product_info.cost_price * cart.quantity) as cart_total'), \DB::raw( 'COUNT(product_info.id) as product_count')])
        ->join('product_info','cart.product_info_id','product_info.id')
        ->join('products','product_info.product_id','products.id')
        ->where('cart.user_id', $user_id)
        ->where('products.status',1)
        ->where('product_info.is_in_stock',1)
        ->first();
    }
    public static function getShippingCharges($user_id){
        $productDetails =  self::getCartTotal($user_id);
        Log::info('productDetails ');
        Log::info(json_encode($productDetails));
        $shippingDetails = ShippingModel::where('status', 1)->orderBy('id','DESC')->get();
        $resetShippingValue = false;
        $perBottleRate = 0;
        Log::info('shipping details');
        Log::info(json_encode($shippingDetails));
        $shippingDetails->map(function($shippingRule) use(&$resetShippingValue, $productDetails, &$perBottleRate){
            if($shippingRule->free_shipping_above == 0){
                Log::info('free_shipping_above == 0');
                $resetShippingValue = true;
                Log::info('resetShippingValue : '.$resetShippingValue);
            }
            if($productDetails->cart_total >= $shippingRule->free_shipping_above){
                Log::info('cart_total > free_shipping_above');
                $resetShippingValue = true;
                Log::info('resetShippingValue : '.$resetShippingValue);
            }else if($productDetails->cart_total < $shippingRule->free_shipping_above){
                Log::info('cart_total < free_shipping_above');
                $perBottleRate = $shippingRule->shipping_rate;
                Log::info('perBottleRate : '.$perBottleRate);
            }
        });
        $shippingCharges = 0;
        Log::info('resetShippingValue : '.$resetShippingValue);
        if(!$resetShippingValue){
            $shippingCharges = $productDetails->product_count * $perBottleRate;
        }
        Log::info('product_count : '.$productDetails->product_count);
        Log::info('shippingCharges : '.$shippingCharges);
        return [
            'shippingCharges' => $shippingCharges,
            'perBottleRate' => $perBottleRate,
        ];
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('website.invoice', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
