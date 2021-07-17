<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{

    public function discount_page(){
        return view('admin.manage.discount');
    }

    public function shipping_page(){
        return view('admin.manage.shipping');
    }
}
