<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesModel extends Model
{
    protected $guarded = [];

    public $table = "categories";

    use SoftDeletes;
}
