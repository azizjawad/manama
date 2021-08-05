<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id')->unique()->index();
            $table->string('listing_name',80);
            $table->string('packaging_weight',30);
            $table->string('packaging_type',30);
            $table->string('cost_price',10);
            $table->string('barcode',50);
            $table->string('sku_code',50);
            $table->string('hsn_code',50);
            $table->boolean('sell_as_single');
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
        Schema::dropIfExists('product_info');
    }
}
