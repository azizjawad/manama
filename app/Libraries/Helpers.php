<?php
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
        $productCount = $orders->product_info->count() - 1;
        $productCountSubText = '';
        if ($productCount == 1) {
            $productCountSubText = ' and ' . $productCount . ' item';
        } elseif ($productCount > 1) {
            $productCountSubText = ' and ' . $productCount . ' items';
        }
        $productVariant = $orders->product_info->first();
        return 'Your order for ' . $productVariant->listing_name . ' ' . $productCountSubText;
    }
}
