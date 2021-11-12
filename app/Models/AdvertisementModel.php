<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisementModel extends Model
{

    protected $guarded = [];

    public $table = "advertisements";

    use SoftDeletes;
}
