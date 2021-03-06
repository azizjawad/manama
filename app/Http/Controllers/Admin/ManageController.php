<?php

namespace App\Http\Controllers\Admin;

use App\Models\CouponsModel;
use App\Models\ShippingModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class ManageController extends Controller
{

    public function discount_page()
    {
        $data['coupons'] = CouponsModel::all();
        return view('admin.manage.discount', $data);
    }

    public function save_coupon(Request $request)
    {

        $post = $request->all();

        $rules = array(
            'product_type' => 'required',
            'coupon_code' => 'required',
            'coupon_use' => 'required',
            'coupon_value' => 'required',
            'coupon_validity' => 'required',
        );

        // validator Rules
        $validator = Validator::make($post, $rules);

        // Check validation (fail or pass)
        if (!$validator->fails()) {
            $fields = [
                'product_type' => $post['product_type'],
                'coupon_code' => strtoupper($post['coupon_code']),
                'coupon_use' => $post['coupon_use'],
                'coupon_value' => $post['coupon_value'],
                'coupon_validity' => date('Y-m-d', strtotime($post['coupon_validity'])),
                'created_by' => auth()->id(),
            ];

            $result = CouponsModel::create($fields);

            if ($result)
                return back()->with('success', 'Coupon has been created successfully!!');
        }
        return back()->withErrors($validator)->withInput();

    }

    public function shipping_page()
    {
        $data['shipping'] = ShippingModel::all();

        return view('admin.manage.shipping', $data);
    }

    public function shipping_form(Request $request)
    {
        $post = $request->all();

        $validator = Validator::make($post, [
                'shipping_rate' => ['required'],
                'free_shipping_above' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with($validator->errors());
        } else {
            $fields = [
                'shipping_rate' => $post['shipping_rate'],
                'free_shipping_above' => $post['free_shipping_above'],
                'status' => $post['status'] ?? 0,
                'created_by' => Auth::id()
            ];

            if ($fields['status'] == 1) {
                ShippingModel::where('status', 1)->update(['status' => 0]);
            }

            ShippingModel::create($fields);
            return redirect()->back()->with('success');
        }
    }

    public function shipping_delete($shipping_id){
        if (is_numeric($shipping_id)) {
            ShippingModel::find($shipping_id)->delete();
            return response(['status' => true, 'message' => 'Shipping rules has been deleted']);
        }
        return response(['status' => true, 'message' => 'Shipping rule has been deleted']);
    }

    public function cart_limit_manager(Request $request){
        $post = $request->all();

        $validator = Validator::make($post, [
                'cart_max_limit' => ['required','numeric'],
            ]
        );

        if (!$validator->fails()) {
             DB::table('cart_limit_manage')->update(['cart_max_limit' => $post['cart_max_limit'],'updated_at' => date('Y-m-d h:i:s')]);
        }

        $data['cart'] = DB::table('cart_limit_manage')->first();

        return view('admin.manage.cart-limit', $data);
    }

    public function volume_discount_manager(Request $request){

        $data['data'] = DB::table('volume_discounts')->get();

        return view('admin.manage.volume-discount',$data);
    }

    public function volume_discount_manager_update(Request $request){
        $post = $request->all();
        if (!empty($post)) {

            if (isset($post['cart_price']) && !empty($post['cart_price'])) {
                $validator = Validator::make($post, [
                        'id' => ['required'],
                        'cart_price' => ['required', 'numeric'],
                        'discount' => ['required', 'numeric'],
                    ]
                );
                if (!$validator->fails()) {
                    $fields = [
                        'cart_price' => $post['cart_price'],
                        'discount' => $post['discount'],
                        'updated_at' => date('Y-m-d h:i:s'),
                    ];

                    DB::table('volume_discounts')->where('id', $post['id'])->update($fields);
                }
            } else if (isset($post['delete_discounts']) && !empty($post['id'])) {
                $validator = Validator::make($post, [
                        'id' => ['required', 'numeric'],
                        'delete_discounts' => ['required'],
                    ]
                );
                if (!$validator->fails()) {
                    $fields = [
                        'cart_price' => 0,
                        'discount' => 0,
                        'updated_at' => date('Y-m-d h:i:s'),
                    ];

                    DB::table('volume_discounts')->where('id', $post['id'])->update($fields);
                }
            }
        }
        return redirect('/admin/manage/volume-discount-manager');
    }
}
