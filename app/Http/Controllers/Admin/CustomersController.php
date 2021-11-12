<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;

class CustomersController extends Controller
{

    public function customer_manege_page(){
        $data['users'] = DB::table('users')->select('id','name','email','mobile','status','created_at')->get();
        return view('admin.customers.manage', $data);
    }

    public function customer_summary_page(){
        return view('admin.customers.summary');
    }

    public function customer_wishlist_page(){
        return view('admin.customers.wishlist');
    }
}
