<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomepageBannersModel extends Model
{
    protected $guarded = [];

    public $table = "homepage_banners";

    use SoftDeletes;
}
