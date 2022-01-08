<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrdersModel;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function adminDashboard(){
        $data['new_sales'] = OrdersModel::select(DB::raw('COUNT(id) as new_sales'))->whereRaw('created_at > now() - interval 1 hour')->where('status', 1)->first()->new_sales;
        $data['pending_orders'] = OrdersModel::select(DB::raw('COUNT(id) as pending_orders'))->where('status', 2)->first()->pending_orders;
        $data['completed_orders'] = OrdersModel::select(DB::raw('COUNT(id) as completed_orders'))->where('status', 3)->first()->completed_orders;
        $data['daily_sales'] = OrdersModel::select(DB::raw('SUM(total_amount) as daily_sales'))->where('created_at', date('Y-m-d'))->first()->daily_sales;
        $data['monthly_sales'] = OrdersModel::select(DB::raw('SUM(total_amount) as monthly_sales'))->where('created_at', date('Y-m'))->first()->monthly_sales;
        $data['total_sales'] = OrdersModel::select(DB::raw('SUM(total_amount) as monthly_sales'))->first()->monthly_sales;
        $data['recent_orders'] = OrdersModel::join('order_details', 'order_details.order_id', 'orders.id')->where('status', 1)->get();
        $data['daily_new_registration'] = User::where('created_at', date('Y-m-d'))->count();
        $data['monthly_new_registration'] = User::where('created_at', date('Y-m'))->count();
        $data['total_users'] = User::count();
        $data['new_registrations'] = User::get();
        return view('admin.dashboard', compact('data'));
    }

    public function my_account(){
        return view('admin.my-account');
    }
}
