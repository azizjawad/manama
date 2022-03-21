<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class updateUserPass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->get();
        foreach ($users as $user){
            if (strlen($user->password) < 15){
                $pass = Hash::make($user->password);
                echo "id: $user->id\n";
                echo "old pass: $user->password\n";
                echo "generated hash pass: $pass\n";
                Log::info("id: $user->id");
                Log::info("old pass: $user->password");
                Log::info("generated hash pass: $pass");
                $updated = DB::table('users')->where('id', $user->id)->update(['password' => $pass]);
                echo "Record updated: $updated \n";
                Log::info("Record updated: $updated");
                echo "\n";
            }
        }
    }
}
