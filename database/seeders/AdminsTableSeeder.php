<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Str::random(12);

        DB::table('admins')->insert([
                    [
                        'name' => env('ADMIN_USER_NAME'),
                        'email' => env('ADMIN_EMAIL'),
                        'password' => Hash::make($password)
                    ]
        ]);
        // echo "Admin Password: " . $password . PHP_EOL;
    }
}
