<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableDob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
           $table->date('dob')->after('email')->nullable();
           $table->string('image')->after('dob')->nullable();
           $table->boolean('is_newsletter_subscribed')->after('dob')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('dob');
            $table->dropColumn('image');
            $table->dropColumn('is_newsletter_subscribed');
        });
    }
}
