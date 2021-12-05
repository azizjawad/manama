<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsEventsGalleryModel extends Model
{
    protected $guarded = [];

    public $table = "news_events_gallery";

    use SoftDeletes;
}
