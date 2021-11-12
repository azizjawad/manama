<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddCoulmnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $blueprint) {
            $blueprint->string('first_name', 50)->after('name');
            $blueprint->string('last_name', 50)->after('first_name');
            $blueprint->boolean('status')->default(1)->index()->after('remember_token')->comment('0 = Deactivate, 1 = Activate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $blueprint) {
            $blueprint->dropColumn('first_name');
            $blueprint->dropColumn('last_name');
            $blueprint->dropColumn('status');
        });
    }
}
