<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersModel extends Model
{
    protected $guarded = [];

    public $table = "orders";

    use SoftDeletes;

    function order_history(){
        return $this->hasMany(\App\Models\OrderHistory::class,  'order_id','id');
    }

    function product_info(){
        return $this->hasMany(\App\Models\ProductInfoModel::class,  'id', 'product_info_id');
    }
}
