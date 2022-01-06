<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetailsModel extends Model
{
    protected $guarded = [];

    public $table = "order_details";

    use SoftDeletes;

    function product_info(){
        return $this->hasMany(\App\Models\ProductInfoModel::class,  'id', 'product_info_id');
    }
}
