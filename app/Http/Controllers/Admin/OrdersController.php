<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrdersModel;

class OrdersController extends Controller
{

    public function index_page(){
        $orders = OrdersModel::join('order_details', 'order_details.order_id', 'orders.id')->orderBy('orders.id', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }
}
