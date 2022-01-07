<?php
class Helpers
{
    public static function fetchProductMenu(){
       return \App\Models\CategoriesModel::select(['categories.*','p.image as product_image'])
           ->join('products as p','categories.id','p.category_id' )
           ->groupBy('p.category_id')
           ->limit(9)
           ->get();
    }
}
?>
