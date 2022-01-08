<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageBannersModel;
use App\Models\OrdersModel;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function save_admin_profile(Request $request){
        $post = $request->post();

        $validator = Validator::make($post, [
            'name'         => ['required'],
        ]);

        if (!$validator->fails()) {
            $name = explode(' ', $post['name']);

            $fields = [
                "name" => $post['name'],
                'first_name' => $name[0],
                'last_name' => $name[1] ?? "",
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('/images/my-account');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                if ($image->move($destinationPath, $file_name)) {
                    $fields["image"] = $file_name;
                }
            }
            User::where('id', auth()->id())->update($fields);
        }

        return redirect()->back();
    }
}
