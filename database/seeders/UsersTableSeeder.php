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
                'search_gender' => 1,
                'search_status' => 2,
                'occupation' => 'Instagramer',
                'message' => 'Hi everyone :). Love beach, bar... hell yeah Instagram!!!'
            ],
            [
                'name' => 'Julia',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/julia.jpg',
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
                'img_url' => '/storage/images/lance.jpg',
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
                'img_url' => '/storage/images/cathy.jpg',
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
                'search_gender' => 0,
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
            [
                'name' => 'Josh',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/hapaBoy.jpg',
                'age' => 22,
                'height' => 178,
                'gender' => 0,
                'search_gender' => 1,
                'search_status' => 1,
                'occupation' => 'Professional Surfer',
                'message' => "Hello I'm Josh. I was born and raised in LosAngels, California. My mom is Japanese, I also speak Japanese too. Hit me up!"
            ],
            [
                'name' => 'Emily',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/influencerWoman.jpg',
                'age' => 28,
                'height' => 168,
                'gender' => 1,
                'search_gender' => 0,
                'search_status' => 0,
                'occupation' => 'Instagrammer',
                'message' => "Hi I'm Em! Have a cup of coffee near beach, Yes! I'm Instagrammer.Lol Unfortunately, I've been single for over three years. Let's have a coffee!"
            ],
            [
                'name' => 'Adam',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/harvardBoy.jpg',
                'age' => 24,
                'height' => 188,
                'gender' => 0,
                'search_gender' => 1,
                'search_status' => 1,
                'occupation' => 'Lawyer',
                'message' => "Hi, Adam is here. I graduated from Harvard University and I'm working in Chicago as a lawyer. I have no time to find one one-night stand buddy, so I'm here!"
            ],
            [
                'name' => 'Erica',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/jpGirl.jpg',
                'age' => 21,
                'height' => 158,
                'gender' => 1,
                'search_gender' => 0,
                'search_status' => 0,
                'occupation' => 'Exchange Student',
                'message' => "Hello, my name is Erica. I'm from Japan. I'm in college as an exchange student. I want to speak English. I like Sushi."
            ],
            [
                'name' => 'Isabelle',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/latinoWoman.jpg',
                'age' => 23,
                'height' => 173,
                'gender' => 1,
                'search_gender' => 2,
                'search_status' => 1,
                'occupation' => 'Model',
                'message' => "Hola! I'm Issy. I've been a professional model since I was 16. My show is everywhere in the world. So I need boys and girls in all my branches. Lol"
            ],
            [
                'name' => 'Mike',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/nurdGuy.jpg',
                'age' => 26,
                'height' => 178,
                'gender' => 0,
                'search_gender' => 1,
                'search_status' => 0,
                'occupation' => 'Software Engineer',
                'message' => "Hi there! I'm Mike. I'm a software engineer in San Francisco. There are so many 'Zombie' more than normal people and too many IT guys. So I decided to find the feature wife using tech!"
            ],
            [
                'name' => 'Olivia',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/tennessee.jpg',
                'age' => 28,
                'height' => 175,
                'gender' => 1,
                'search_gender' => 2,
                'search_status' => 0,
                'occupation' => 'HR',
                'message' => "Hello, I'm Olivia from Tennessee. I'm a country girl. I like reading and Yoga. Working in the HR department, I have good eyes to judge what kind of person you are. But that's why I'm being picky."
            ],
            [
                'name' => 'Austin',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/englishGuy.jpg',
                'age' => 31,
                'height' => 183,
                'gender' => 0,
                'search_gender' => 2,
                'search_status' => 0,
                'occupation' => 'Accounting',
                'message' => "Hello, my name is Austin, and I am from London. I know girls like English accents haha. I'm an attractive guy even if I'm not from London. Let's have a cup of tea or hit the PUB!"
            ],
            [
                'name' => 'Ezra',
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'img_url' => '/storage/images/gGuy.jpg',
                'age' => 34,
                'height' => 178,
                'gender' => 0,
                'search_gender' => 0,
                'search_status' => 0,
                'occupation' => 'Flight Attendant',
                'message' => "Hi, I'm Ezra. I'm looking for a guy. Yes, I'm gay, but I'm proud of myself. I want to settle down and want to have a family. No more hook up!"
            ],
        ]);

        // \App\Models\User::factory()->count(30)->create();
        User::factory()->count(30)->create();
    }
}
