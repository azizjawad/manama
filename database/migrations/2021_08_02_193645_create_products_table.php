<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->index();
            $table->string('name',120);
            $table->string('description',250);
            $table->string('meta_title',120);
            $table->string('image',200);
            $table->string('meta_description',250);
            $table->string('page_slug',50);
            $table->unsignedInteger('label')->default(0)->comment('0 = No Label // 1 = New // 2 = Featured');
            $table->integer('status')->default(0)->comment('0 = Offline, 1 = Online');
            $table->integer('created_by')->index();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
