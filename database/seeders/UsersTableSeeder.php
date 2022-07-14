<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Stacy',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/whiteWoman.jpg',
                'age' => 28,
                'height' => 165,
                'gender' => 1,
                'search_gender' => 2,
                'search_status' => 2,
                'occupation' => 'Instagramer',
                'message' => 'Hi everyone :). Love beach, bar... hell yeah Instagram!!!'
            ],
            [
                'name' => 'Julia',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => 'https://images.unsplash.com/photo-1589571894960-20bbe2828d0a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=350&q=80',
                'age' => 26,
                'height' => 155,
                'gender' => 1,
                'search_gender' => 0,
                'search_status' => 1,
                'occupation' => 'Model',
                'message' => "I'm a british model in New York. Love to chill at the central park. New to NY, wanna grab a cup of tea?"

            ],
            [
                'name' => 'Lance',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => 'https://images.unsplash.com/photo-1552058544-f2b08422138a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=350&q=80',
                'age' => 33,
                'height' => 175,
                'gender' => 0,
                'search_gender' => 2,
                'search_status' => 0,
                'occupation' => 'Engineer',
                'message' => "Hi there. I'm a computer nerd guy. Live in spooky SF. Also I'm a huge Warriors fan!"
            ],
            [
                'name' => 'Cathy',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => 'https://images.unsplash.com/photo-1491349174775-aaafddd81942?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=350&q=80',
                'age' => 28,
                'height' => 170,
                'gender' => 1,
                'search_gender' => 0,
                'search_status' => 1,
                'occupation' => 'Influencer',
                'message' => "What's up all? I'm a influencer who play 'The circle' season 4. If you notice me, I'm sure you already following me.Lol"
            ],
            [
                'name' => 'Nick',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/asianGuy.jpg',
                'age' => 26,
                'height' => 180,
                'gender' => 0,
                'search_gender' => 1,
                'search_status' => 1,
                'occupation' => 'Model',
                'message' => "Hey girls! I'm an asian model in Hollywood. And someone recognized me huh? Haha yes, I'm in Too hot Too handle.Lol"
            ],
            [
                'name' => 'Harry',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/modelGuy.jpg',
                'age' => 24,
                'height' => 188,
                'gender' => 0,
                'search_gender' => 1,
                'search_status' => 0,
                'occupation' => 'Fashion designer',
                'message' => "Hi I'm Harry. I'm a fashion designer. I'm running my company and also part-time model sometimes. I'm not a creepy guy just too hot.Lol"
            ],
            [
                'name' => 'Ryan Sakata',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/asianGuy2.jpg',
                'age' => 22,
                'height' => 188,
                'gender' => 0,
                'search_gender' => 1,
                'search_status' => 1,
                'occupation' => 'Underwear model',
                'message' => "Hello I'm Ryan. I'm new to here. I'm a model. If you notice me, you must go to Calvin Klein haha."
            ],
            [
                'name' => 'April',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/asianWoman.jpg',
                'age' => 21,
                'height' => 155,
                'gender' => 1,
                'search_gender' => 2,
                'search_status' => 1,
                'occupation' => 'Model',
                'message' => "Hello I'm April. I'm a Korean American baby girl. I have to still show my ID to get a drink.LOL"
            ],
            [
                'name' => 'Taylor',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/whiteGirl.jpg',
                'age' => 18,
                'height' => 172,
                'gender' => 1,
                'search_gender' => 2,
                'search_status' => 0,
                'occupation' => 'College Student',
                'message' => "Hello I'm Taylor. I was born and raised in California. Love beach travel food and Netflix and chill at the beach!"
            ],
        ]);

        // \App\Models\User::factory()->count(30)->create();
        User::factory()->count(30)->create();
    }
}
