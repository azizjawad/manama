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

    function order_details(){
        return $this->hasMany(\App\Models\OrderDetailsModel::class,  'order_id','id');
    }

    function product_info(){
        return $this->hasMany(\App\Models\ProductInfoModel::class,  'id', 'product_info_id');
    }

    function order_by(){
        return $this->belongsTo(\App\Models\User::class,  'created_by', 'id');
    }

    function seller(){
        return $this->belongsTo(\App\Models\User::class,  'user_id', 'id');
    }
    
    function shipping_address_detail(){
        return $this->belongsTo(\App\Models\MyaccountModel::class,  'shipping_address', 'id');
    }
    
    function billing_address_detail(){
        return $this->belongsTo(\App\Models\MyaccountModel::class,  'billing_address', 'id');
    }
}
