<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInfoModel extends Model
{
    protected $guarded = [];

    public $table = "product_info";

    use SoftDeletes;

    function product(){
        return $this->belongsTo(\App\Models\ProductsModel::class,  'product_id', 'id');
    }
}
