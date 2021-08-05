<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInfoModel extends Model
{
    protected $guarded = [];

    public $table = "product_info";

    use SoftDeletes;
}
