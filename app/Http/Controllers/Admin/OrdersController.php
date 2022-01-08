<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrdersModel;
use Illuminate\Support\Facades\Validator;
use App\Models\OrderHistory;
use Log;
use Helpers;

class OrdersController extends Controller
{

    public function index_page()
    {
        $orders = Helpers::fetchOrderDetails('', '' , 'get');
        return view('admin.orders', compact('orders'));
    }

    public function manage_order($order_no)
    {
        $order = Helpers::fetchOrderDetails('orders.order_no', $order_no , 'first');
        return view('admin.manage_order', compact('order'));
    }

    public function update_order_status(Request $request, $order_no)
    {
        Log::info("update_order_status");
        $post = $request->all();
        $rules = array(
            'order_status' => 'required',
            'delivery_company' => 'required_if:order_status,' . ORDER_STATUSES['SHIPPED']['id'],
            'tracking_number' => 'required_if:order_status,' . ORDER_STATUSES['SHIPPED']['id'],
        );
        Log::info("update_order_status");
        Log::info($post);
        // validator Rules
        $validator = Validator::make($post, $rules);
        Log::info("reqiest");
        Log::info($validator->errors());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $ordersData = OrdersModel::where('order_no', $order_no)->first();
        if (!empty($ordersData)) {
            $ordersData->status = $post['order_status'];
            $ordersData->modified_by = $post['order_status'];
            if ( $post['order_status'] == ORDER_STATUSES['SHIPPED']['id']) {
                $ordersData->delivery_company = $post['delivery_company'];
                $ordersData->tracking_number = $post['tracking_number'];
            }
            $ordersData->save();

            $statusMessage = 'Status Changed Successfully';
            foreach (array_values(ORDER_STATUSES) as $status) {
                if ($status['id'] == $post['order_status']) {
                    $message = $status['description'];
                    if ($status['id'] == ORDER_STATUSES['SHIPPED']['id'] && $post['order_status'] == ORDER_STATUSES['SHIPPED']['id']) {
                        $deliveryCompany = \Helpers::getDeliveryCompany($post['delivery_company']);

                        $message = str_replace('DELIVERY_COMPANY', $deliveryCompany, $message);
                        $message = str_replace('TRACKING_NUMBER', $post['tracking_number'], $message);
                    }
                }
            }

            OrderHistory::create([
                'order_id'            => $ordersData->id,
                'status'            => $post['order_status'],
                'description'        => $message,
                'created_by'        => \Auth::user()->id
            ]);
        }
        return back()->with('success', 'Order status updated successfully!!');
    }
}
