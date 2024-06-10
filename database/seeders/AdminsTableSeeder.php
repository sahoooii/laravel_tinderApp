<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
					[
						'name' => env('ADMIN_USER_NAME'),
						'email' => env('ADMIN_EMAIL'),
						'password' => Hash::make(env('ADMIN_PASSWORD'))
					]
        ]);
    }
}
