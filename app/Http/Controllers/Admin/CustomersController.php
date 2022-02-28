<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrdersModel;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function customer_manege_page(){
        $data['users'] = DB::table('users')->select('id','name','email','mobile','status','created_at')->where('role','default')->get();
        return view('admin.customers.manage', $data);
    }

    public function customer_summary_page(Request $request){
        $user_id = $request->get('user_id');
        if (!empty($user_id) && is_numeric($user_id)){
           $data['orders'] = DB::table('orders')->select('transaction_id','created_at','status','total_amount','order_no','transaction_type')
               ->where('user_id', $user_id)
               ->get();

            $data['name'] = User::where('id',$user_id)->pluck('name')->first();
        }
        $data['users'] =  User::select('users.id','users.name')->where('role','Default')
                    ->join('orders','orders.user_id','users.id')
                    ->groupBy('users.id')
                    ->get();
        return view('admin.customers.summary', $data);
    }

    public function customer_wishlist_page(){
        return view('admin.customers.wishlist');
    }
}
