<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
           $table->longText('description')->change();
           $table->longText('meta_description')->change();
        });
        Schema::table('categories', function (Blueprint $table){
            $table->longText('description')->change();
            $table->longText('meta_description')->change();
        });
        Schema::table('product_info', function (Blueprint $table){
            $table->dropUnique('product_info_product_id_unique');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
