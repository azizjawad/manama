<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsModel extends Model
{
    protected $guarded = [];

    public $table = "products";

    use SoftDeletes;
}
