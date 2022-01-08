<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('trasaction_type','transaction_type');
            $table->dropColumn('product_coupon');
            $table->dropColumn('shipping_coupon');
            $table->string('sub_total')->after('trasaction_type');
            $table->string('discount')->after('sub_total')->nullable();
            $table->boolean('coupon_type')->after('sub_total')->nullable();
            $table->string('coupon_code')->after('coupon_type')->nullable();
            $table->string('shipping_charges')->after('shipping_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table){
            $table->dropColumn('sub_total');
            $table->dropColumn('discount');
            $table->dropColumn('coupon_type');
            $table->dropColumn('coupon_code');
            $table->dropColumn('shipping_charges');
        });
    }
}
