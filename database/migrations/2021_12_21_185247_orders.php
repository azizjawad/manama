<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->length(10)->index();
            $table->string('order_no', 16)->unique()->comment('order no');
            $table->string('trasaction_type', 6)->comment('cod | online');
            $table->double('total_amount', 8, 2);
            $table->string('trasaction_id', 60)->nullable();
            $table->string('gstn_no', 20)->nullable();
            $table->unsignedInteger('product_coupon')->length(10)->nullable();
            $table->unsignedInteger('shipping_coupon')->length(10)->nullable();
            $table->unsignedInteger('billing_address')->length(10)->index();
            $table->unsignedInteger('shipping_address')->length(10);
            $table->unsignedInteger('status')->length(2)->default(1);;
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
        Schema::dropIfExists('orders');
    }
}
