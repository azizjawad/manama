<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingModel extends Model
{
    protected $guarded = [];

    public $table = "shipping";

    use SoftDeletes;
}
