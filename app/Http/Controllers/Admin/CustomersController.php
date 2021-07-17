<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{

    public function customer_manege_page(){
        return view('admin.customers.manage');
    }

    public function customer_summary_page(){
        return view('admin.customers.summary');
    }

    public function customer_wishlist_page(){
        return view('admin.customers.wishlist');
    }
}
