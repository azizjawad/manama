<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reviews extends Model
{
    protected $guarded = [];

    public $table = "reviews";

    use SoftDeletes;

    function user(){
        return $this->belongsTo(\App\Models\User::class,  'user_id', 'id');
    }
}
