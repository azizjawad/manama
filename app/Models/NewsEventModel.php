<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsEventModel extends Model
{
    protected $guarded = [];

    public $table = "news_events";

    use SoftDeletes;

    function attach_gallery(){
        return $this->hasMany(NewsEventsGalleryModel::class, 'news_events_id', 'id');
    }
}
