<?php
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

    public static function fetchOrderDetails($column_name, $value, $return_type = 'first'){

        $orders = OrdersModel::select('orders.*','order_details.product_info_id','quantity','product_cost','my_address.state')
            ->join('order_details', 'order_details.order_id', 'orders.id')
            ->join('my_address','my_address.id','orders.billing_address');

        if($column_name != '' && $value != '' ){
            $orders->where( $column_name , $value);
        }

        $orders->groupBy('order_no')
                ->orderBy('orders.created_at', 'desc');

        if($return_type == 'first' ){
           return $orders->first();
        }else {
           return $orders->get();
        }

    }

}
