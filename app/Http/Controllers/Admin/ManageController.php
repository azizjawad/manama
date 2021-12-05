<?php

namespace App\Http\Controllers\Admin;

use App\Models\CouponsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ManageController extends Controller
{

    public function discount_page(){
        $data['coupons'] = CouponsModel::all();
        return view('admin.manage.discount', $data);
    }

    public function save_coupon(Request $request){

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

    public function shipping_page(){
        return view('admin.manage.shipping');
    }
}
