<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MyAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->length(10)->index();
            $table->string('label', 100);
            $table->string('fullname',100);
            $table->string('mobile_no',11);
            $table->string('address',250);
            $table->string('state',50);
            $table->string('city_village',50);
            $table->string('pincode',6);
            $table->unsignedInteger('created_by')->index();
            $table->unsignedInteger('modified_by')->nullable();
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
        Schema::dropIfExists('my_address');
    }
}
