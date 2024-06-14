
# laravel-tinderApp

<img src="https://img.shields.io/badge/-HTML5-E34F26.svg?logo=html5&style=flat&logoColor=fff"> <img src="https://img.shields.io/badge/-CSS3-1572B6.svg?logo=css3&style=flat"> <img src="https://img.shields.io/badge/-laravel-FF2D20.svg?logo=laravel&style=flat&logoColor=black"> <img src="https://img.shields.io/badge/-MySQL-4479A1.svg?logo=mysql&style=flat&logoColor=orange">
<img src="https://img.shields.io/badge/-Bootstrap-7952B3.svg?logo=bootstrap&style=flat&logoColor=fff"> <img src="https://img.shields.io/badge/-JavaScript-black.svg?logo=javascript&style=flat">


## Demo

### User Page

![tinder1](https://github.com/sahoooii/laravel_tinderApp/assets/75118062/a72e6fec-a5c5-4d40-8793-632c8c1ddabc)

### Admin Page

![tinderAdmin](https://github.com/sahoooii/laravel_tinderApp/assets/75118062/a2056b0d-cbce-4935-b8fe-369bc4fe0602)

### Describe

I created a dating app like Tinder. Using Laravel  MySQL, Bootstrap, and some more. I created it about two years ago. But I did refactor it and add an admin page. I changed the design a little bit, so the design is better than before.<br/>
Also, I added some more dummy data so you can swipe it based on your profile. You can register own your profile, and set details of your dating status, like something casual or serious relationships. If you match someone, you can see the profile. Yes, this is a dating App!

TinderのようなDating Appを作成しました。Laravel, MySQL, Bootstrapを主に使用しています。２年ほど前に作成しましたが、今回Adminページを作成し、デザインも以前より良くなりました。<br/>
ダミーデータもさらに追加しました。あなたのプロフィールの設定に基づいて、swipeできます。自分のプロフィールも詳細に登録することができるので、カジュアルな出会い、真剣な関係など設定できます。もしマッチすれば相手のプロフィールも見ることがき、まさにDating Appです。


## Features

- CRUD
- Create a profile with image
- Login and Logout system
- Swipe User picture, based on your profile
- Matching and Unmatch System
- See matching mate's profile
- Edit your profile
- Delete your profile
- Seeding dummy data
- Pagination
- Responsive design
- Admin Page
	- Admin User login Page
  - Show users list
  - Delete users's account

## src

* [Images](https://pixabay.com/ja/)
* [Icons](https://fontawesome.com/)


## Usage

- Create a MySQL database and obtain your MySQL URI &nbsp; -[MySQL](https://www.mysql.com/jp/)
- composer install or composer update
- npm install
- npm run dev
- copied .env.example and create .env
	- .env files's detail is under the below
- After run server, seeding data

```
php artisan migrate:fresh --seed
```
- And finally, create APP_KEY

```
php artisan key:generate
```

- Make sure, it all works or not after the run server
```
php artisan serve
```

### Env Variables

Rename the `example.env` file to `.env` and add the following

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="YOUR DATABASE NAME"
DB_USERNAME="YOUR USER NAME"
DB_PASSWORD="YOUR DATABASE PASSWORD"

- Admin Page Info
ADMIN_USER_NAME="SET YOUR USER NAME FOR ADMIN"
ADMIN_EMAIL="SET YOUR USER EMAIL FOR ADMIN"
ADMIN_PASSWORD="SET YOUR PASSWORD FOR ADMIN"

```

### Database

I made three kinds of databases.

```
users
- id int
- name varchar
- email varchar
- email_verified_at	timestamp
- password varchar
- remember_token varchar
- img_url varchar
- age int
- height int
- gender tinyint
- search_gender	int
- search_status	int
- occupation varchar
- message text
- created_at timestamp
- updated_at timestamp

swipes
-id
- from_user_id
- to_user_id
- is_like tinyint
- created_at timestamp
- updated_at timestamp

admin
- id
- name varchar
- email varchar
- email_verified_at	timestamp
- password varchar
- remember_token varchar
- created_at timestamp
- updated_at timestamp

```
