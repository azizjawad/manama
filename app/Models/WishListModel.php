<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WishListModel extends Model
{
    protected $guarded = [];

    public $table = "wishlist";

    use SoftDeletes;

    function product_info(){
        return $this->belongsTo(\App\Models\ProductInfoModel::class,  'product_info_id', 'id');
    }
}
