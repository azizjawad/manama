<?php
class Helpers
{
    public static function fetchProductMenu(){
       return \App\Models\CategoriesModel::limit(9)->get();
    }
}
?>
