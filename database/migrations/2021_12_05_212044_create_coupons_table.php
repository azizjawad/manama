<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_type')->index()->comment('1 = Product // 2 = Shipping');
            $table->string('coupon_code',50);
            $table->unsignedInteger('coupon_use')->comment('1 = single // 2 = multiple');
            $table->string('coupon_value',10);
            $table->date('coupon_validity');
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
        Schema::dropIfExists('coupons');
    }
}
