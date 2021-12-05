<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsEventsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_events_gallery', function (Blueprint $table){
            $table->id();
            $table->unsignedInteger('news_events_id')->index();
            $table->string('image_caption')->nullable();
            $table->string('image_name');
            $table->unsignedInteger('created_by')->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_events_gallery');
    }
}
