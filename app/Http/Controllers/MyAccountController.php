<?php

namespace App\Http\Controllers;

use App\Models\NewsEventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{

    public function index()
    {
        return view('website/account/my-account');
    }

    public function change_password()
    {
        return view('website/account/change-password');
    }

    public function my_wishlist()
    {
        return view('website/account/my-wishlist');
    }

    public function edit_profile(){
        return view('website/account/edit-profile');
    }

    public function order_history(){
        return view('website/account/order-history');
    }

    public function manage_address(){
        return view('website/account/manage-address');
    }

    public function user_settings(){
        return view('website/account/user-settings');
    }

    public function checkout(){
        $user_id = Auth::id();
        $data['cart'] = MyCartController::get_cart_data($user_id);
        return view('website/account/checkout', $data);
    }

    public function thank_you(){
        return view('website/account/thank-you');
    }
}
