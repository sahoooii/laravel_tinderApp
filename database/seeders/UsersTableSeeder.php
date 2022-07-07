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
                'img_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80+750w',
                'age' => 22,
                'height' => 165,
                'gender' => 1,
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
                'occupation' => 'Model',
                'message' => "I'm a model in New York. Hit me up and catch me if you can!"

            ],
            [
                'name' => 'Lance',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => 'https://images.unsplash.com/photo-1552058544-f2b08422138a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=350&q=80',
                'age' => 33,
                'height' => 175,
                'gender' => 0,
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
                'occupation' => 'Influencer',
                'message' => "What's up all? I'm a influencer who play 'The circle' season 4. If you notice me, I'm sure you already following me.Lol"
            ],
            [
                'name' => 'Ryan',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/asianGuy.jpg',
                'age' => 26,
                'height' => 180,
                'gender' => 0,
                'occupation' => 'Model',
                'message' => "Hey girls! I'm an asian model in Hollywood. And someone recognized me huh? Haha yes, I'm in Too hot Too handle.Lol"
            ],
            [
                'name' => 'Jack',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/modelGuy.jpg',
                'age' => 24,
                'height' => 188,
                'gender' => 0,
                'occupation' => 'Fashion designer',
                'message' => "Hi I'm Jack. I'm a fashion designer. I'm running my company and also part-time model sometimes. I'm not a creepy guy just too hot."
            ],
            [
                'name' => 'Nialle',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/whiteGuy.jpg',
                'age' => 22,
                'height' => 190,
                'gender' => 0,
                'occupation' => 'College student',
                'message' => "Hello I'm a British guy. I'm new to here. If you like british accents, why don't you have a cup of tea in the English garden haha."
            ],
            [
                'name' => 'April',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/asianWoman.jpg',
                'age' => 21,
                'height' => 155,
                'gender' => 1,
                'occupation' => 'Model',
                'message' => "Hello I'm April. I'm Korean American baby girl. I have to still show my ID get a beer.LOL"
            ],
            [
                'name' => 'Taylor',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/whiteGirl.jpg',
                'age' => 18,
                'height' => 172,
                'gender' => 1,
                'occupation' => 'Photographer',
                'message' => "Hello I'm Taylor. I was born and raised in California. Love beach travel food and Netflix and chill in beach!"
            ],
        ]);

        // \App\Models\User::factory()->count(30)->create();
        User::factory()->count(30)->create();
    }
}
