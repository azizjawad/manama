<?php

use App\Models\CartModel;
use App\Models\OrdersModel;
class Helpers
{
    public static function fetchProductMenu()
    {
        return \App\Models\CategoriesModel::select(['categories.*', 'p.image as product_image'])
            ->join('products as p', 'categories.id', 'p.category_id')
            ->groupBy('p.category_id')
            ->limit(9)
            ->get();
    }

    public static function volume_discount_check($amount){
        if (is_numeric($amount)){
            return DB::table('volume_discounts')->where('cart_price','<=', $amount)->orderBy('cart_price','desc')->pluck('discount')->first();
        }
        return 0;
    }

    public static function getOrderStatusText($status_id)
    {
        $order_status = array_values(ORDER_STATUSES);
        $status_text = '';
        foreach ($order_status as $status) {
            if ($status_id == $status['id']) {
                $status_text = $status['text'];
            }

        }
        return $status_text;
    }

    public static function getProductVariantText($orders)
    {
        $productCount = \App\Models\OrderDetailsModel::where('order_id', $orders->id)->count();
        $productCountSubText = '';
        if ($productCount == 1) {
            $productCountSubText = ' and ' . $productCount . ' item';
        } elseif ($productCount > 1) {
            $productCountSubText = ' and ' . $productCount . ' items';
        }
        $productVariant = $orders->product_info->first();
        return 'Your order for ' . $productVariant->listing_name . ' ' . $productCountSubText;
    }

    public static function getDeliveryCompany($company_id)
    {
        $order_status = array_values(DELIVERY_COMPANY);
        $status_text = '';
        foreach ($order_status as $status) {
            if ($company_id == $status['id']) {
                $status_text = $status['text'];
            }

        }
        return $status_text;
    }

    public static function check_cart_limit($user_id, $current_quantity, $is_single_quantity = true){
        $default_cart_limit = DB::table('cart_limit_manage')->pluck('cart_max_limit')->first();
        $total_cart = CartModel::select(DB::raw('SUM(quantity) as total_cart'))->where('user_id', $user_id)->pluck('total_cart')->first();
        $current_total_cart = $is_single_quantity ? ($total_cart + $current_quantity) : $current_quantity;
        if ($default_cart_limit > 0 && $default_cart_limit < $current_total_cart){
            return ['status' => false,'message' => "Oops!! You have exceed the cart limit"];
        }
        return ['status' => true];
    }

    public static function fetchOrderDetails($column_name, $value, $return_type = 'first'){

        $orders = OrdersModel::select('orders.*','order_details.product_info_id','quantity','product_cost','my_address.state')
            ->join('order_details', 'order_details.order_id', 'orders.id')
            ->join('my_address','my_address.id','orders.billing_address');

        if($column_name != '' && $value != '' ){
            $orders->where( $column_name , $value);
        }

        $orders->groupBy('order_no')->orderBy('orders.id', 'desc');

        if($return_type == 'first' ){
           return $orders->first();
        }else {
            return $orders->get();
        }
    }

}
