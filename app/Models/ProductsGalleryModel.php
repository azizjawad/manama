<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsGalleryModel extends Model
{
    protected $guarded = [];

    public $table = "products_gallery";

    use SoftDeletes;
}
