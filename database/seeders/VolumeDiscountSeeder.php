<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VolumeDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volume_discounts')->truncate();

        $data = [
            ["cart_price" => 0,"discount" => 0, "created_at" => date('Y-m-d h:i:s'), "updated_at" => date('Y-m-d h:i:s')],
            ["cart_price" => 0,"discount" => 0, "created_at" => date('Y-m-d h:i:s'), "updated_at" => date('Y-m-d h:i:s')],
            ["cart_price" => 0,"discount" => 0, "created_at" => date('Y-m-d h:i:s'), "updated_at" => date('Y-m-d h:i:s')],
            ["cart_price" => 0,"discount" => 0, "created_at" => date('Y-m-d h:i:s'), "updated_at" => date('Y-m-d h:i:s')],
            ["cart_price" => 0,"discount" => 0, "created_at" => date('Y-m-d h:i:s'), "updated_at" => date('Y-m-d h:i:s')],
        ];

        DB::table('volume_discounts')->insert($data);
    }
}
