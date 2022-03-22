<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CartLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_limit_manage')->insert(
            [
                "cart_max_limit" => 0,
                "created_at" => date('Y-m-d h:i:s'),
                "updated_at" => date('Y-m-d h:i:s'),
            ]
        );
    }
}
