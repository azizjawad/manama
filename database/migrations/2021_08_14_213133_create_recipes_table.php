<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('rcp_name');
            $table->longText('rcp_description');
            $table->string('youtube_url')->nullable();
            $table->string('rcp_display_img', 150);
            $table->string('rcp_homepage_img', 150);
            $table->string('rcp_meta_title');
            $table->string('rcp_meta_description');
            $table->string('rcp_page_slug', 50);
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
