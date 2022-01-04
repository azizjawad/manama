<?php
class Helpers
{
    public function fetchProductMenu(){
       return \App\Models\CategoriesModel::limit(9)->get();
    }
}
?>