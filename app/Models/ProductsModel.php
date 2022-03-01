<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Reviews;

class ProductsModel extends Model
{
    protected $guarded = [];

    public $table = "products";

    use SoftDeletes;

    public function getRatingCountAttribute(){
        return Reviews::where('product_id', $this->id)->where('status',1)->avg('rating');
    }
}
