<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeModel extends Model
{
    protected $guarded = [];

    public $table = "recipes";

    use SoftDeletes;
}
