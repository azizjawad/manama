<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
