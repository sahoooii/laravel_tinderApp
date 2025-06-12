# laravel-tinderApp

## 🛠 Tech Stack

![Laravel](https://img.shields.io/badge/Laravel@8.75-F9322C?style=for-the-badge&logo=laravel&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP@8.0.28--0-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL@8.0.23-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
<br />
![HTML5](https://img.shields.io/badge/html5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap@5.1.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

<p>etc...</p>
<br />

## Demo

### User Page

![tinder1](https://github.com/sahoooii/laravel_tinderApp/assets/75118062/a72e6fec-a5c5-4d40-8793-632c8c1ddabc)

### Admin Page

![tinderAdmin](https://github.com/sahoooii/laravel_tinderApp/assets/75118062/a2056b0d-cbce-4935-b8fe-369bc4fe0602)

<br />

## What is this project?

**(EN)**

This is a **Tinder-like dating app** built primarily with **Laravel** and **MySQL**. It was my first full-stack project using Laravel.

Originally developed around 2023, I did a major refactor in 2024 — **redesigning the UI**, building an **admin panel**, **improving fat controllers**, and **enhancing both readability and security**. I also added more dummy data to better simulate real user interactions.
In 2025, I performed another round of refactoring, focusing on **better controller separation**, **secure password management** for admin users, and a more organized routing structure.

Users can create detailed profiles and swipe based on their preferences. They can set their relationship goals (casual, serious, etc.) and filter potential matches by gender. When two users match, they can view each other's full profiles — just like any real dating app.

**(JP)**

Laravel と MySQL を主に使用し、**Tinder のようなマッチングアプリ**を作成しました。これは、私にとって初めて Laravel を使用して開発したフルスタックプロジェクトです。

このアプリは 2023 年頃に作成しましたが、2024 年には大規模なリファクタリングを行い、**デザインの改善**、**管理者システムの構築**、**ファットコントローラーの見直し**などを実施しました。その結果、**コードの可読性とセキュリティが向上**し、ダミーデータもさらに追加しました。そして 2025 年には再度リファクタリングを行い、**コントローラーの責務の分離・整理、管理者ユーザーのパスワード管理の強化、ルーティング構成**の見直しなどを行いました。

ユーザーは自分のプロフィールを詳細に登録でき、設定に基づいて他のユーザーをスワイプすることができます。カジュアルな出会いから真剣な交際まで目的を選択でき、また希望する相手の性別を設定することで、それに沿ったユーザーが表示されます。マッチすると相手のプロフィールの詳細も閲覧できる、まさにマッチングアプリらしい機能を備えています。

<br />

## Features

**(EN)**

Here are some of the main features Tinder App offers:

✅ **Authentication**

-   Create a profile with an image
-   Login and logout with email and password
-   Delete your own account

✅ **Profile & Matching System**

-   Set detailed profile information: gender preference, relationship goals, height, age, etc...
-   Swipe users based on your preferences
-   Matching system
-   View matched users' full profiles
-   Unmatch from users matching list
-   Edit and delete your own profile

✅ **Admin Page**

-   Separate admin login page at `/admin/login`
-   View paginated user list
-   View user details: profile info, match count, likes received
-   Delete users from admin panel

✅ **Other Features**

-   Seed dummy data for testing
-   Responsive design for mobile and desktop
    <br />

**(JP)**

Tinder App で現在実装されている主な機能は以下の通りです：

✅ **認証機能**

-   写真つきでプロフィールを登録
-   Email とパスワードでログイン認証・ログアウト
-   登録したプロフィールの削除が可能

✅ **プロフィールとマッチング機能**

-   探している性別、目的、身長、年齢などをプロフィールに詳細に設定
-   プロフィール設定に基づいたスワイプシステム
-   マッチした相手のプロフィールの閲覧
-   マッチングの解除
-   プロフィールの編集・削除

✅ **管理者ページ**

-   管理者専用ログインページ `/admin/login`
-   ユーザー一覧をページネーションで表示
-   各ユーザーのプロフィール・マッチ数・Like 数の表示
-   ユーザーの削除

✅ **その他の機能**

-   ダミーデータをシーディング
-   モバイル・デスクトップ対応のレスポンシブデザイン

  <br />

## What's Improved? 🧐 (2024/05)

**(EN)**

After the initial development, I made a series of improvements to enhance **security, performance, and UI/UX**.

-   **⚡ Performance Optimization**

    -   **Refactored fat controllers** by separating logic into service classes and form requests for better readability
    -   **Improved the matching logic** to show only users with mutual gender preferences
    -   Fixed a bug that allowed unauthorized access to unmatched user profiles via direct URL — now redirects with a message

-   **🎨 UI/UX Enhancements**

    -   Redesigned swipe cards to show larger profile images along with user name and age
    -   Improved validation error handling, especially for image uploads, and fixed UI breakage
    -   **Added flash messages** after user actions for better feedback UX

-   **🔐 Feature Additions**

    -   Added the ability for users to delete their own accounts
    -   Implemented unmatching functionality

-   **🧐 Admin System Implementation**

    -   Created a **dedicated admin login page** with separate routes and middleware
    -   Added a user detail page where admins can view each user's profile, number of matches, and likes received
    -   Implemented a paginated user list for easy management

-   **🧪 Dummy Data & Testing**

    -   Increased the amount of seeded dummy data to create a more realistic testing environment

**(JP)**

最初の開発後、**セキュリティ、パフォーマンス、デザイン**を向上させるために以下の改善を行いました：

-   **⚡ パフォーマンスの最適化**

    -   **Fat Controller を解消**し、Service クラス・Form Request に処理を分離しコードの可読性を向上
    -   マッチングロジックを改善し、**検索条件が一致したユーザーのみ**を表示
    -   **不正アクセス防止**のため、マッチしていないユーザーのプロフィールが直接 URL 入力では表示されないように修正

-   **🎨 UI・UX の改善**

    -   スワイプカードに年齢と名前を表示し、写真をより大きく表示するようにデザインを改善し、**スワイプの判断材料の可視化**
    -   登録・編集フォームのバリデーションエラー表示を改善（UI 崩れの修正も含む）
    -   **Flash メッセージ機能**を実装し、操作後のユーザー通知をわかりやすく表示

-   **🔐 機能追加**

    -   自分のプロフィールを削除できる機能を追加
    -   **マッチ解除機能**を追加

-   **🧐 管理者システムの構築**

    -   **Admin 専用のログインページ**を作成し、専用の 専用のルート・ミドルウェアを設定
    -   各ユーザーのプロフィール、マッチ数、Like 数を表示できるユーザー詳細ページを追加
    -   登録されたユーザーを一覧で表示（ページネーション対応）
    -   管理者がユーザーを削除できる機能を追加

-   **🧪 テスト・ダミーデータ**

    -   ダミーユーザーを増やして、より現実的なマッチング体験ができるように改善

    <br />

## 📌 Recent Updates (2025/06)

### 🛠️ Latest Refactoring and Improvements

After the previous refactoring, further improvements were made to enhance readability, security, and maintainability of the code:

-   **Further Slimming Down Fat Controllers**

    -   Separated logic into Services and FormRequests to clean up and simplify controllers

-   **Improved Swipe Logic**

    -   Simplified the gender-matching logic by removing unnecessary `if` statements and reusing variables

-   **Leveraged Laravel Helper Methods**

    -   Used built-in methods like `whereIn` and `pluck` to reduce code length and improve clarity

-   **Optimized Image Uploads**

    -   Integrated `Intervention Image` to resize uploaded images and reduce file size

-   **Improved Admin Password Management (Dev Environment)**

    -   Replaced plaintext passwords with randomly generated ones using `Str::random()` for better security

-   **Admin Route Security Review & Cleanup**

    -   Reviewed middleware settings and removed redundant code for cleaner implementation

-   **Locked Dependency Versions**

    -   Removed carets (`^`) from `package.json` and `composer.json` to **lock all dependency versions**
    -   Prevented version drift across environments and **ensured stable and reproducible builds**
        <br />

**(JP)**

前回のリファクタリング後も、**コードの可読性、セキュリティ、メンテナンス性**のさらなる向上を目的として、以下の改善を行いました：

-   **Fat Controller のさらなる解消**

    -   サービスやフォームリクエストへ処理を分離し、各コントローラーをよりスリムに整理

-   **スワイプロジックの整理**

    -   「自分が探している性別」と「相手の探している性別」がマッチしたもののみ表示するロジックを簡潔にし、冗長な if 文や重複コードを排除

-   **Laravel の便利メソッドの活用**

    -   `whereIn` や `pluck` などのメソッドを適切に活用し、コードを短く可読性を向上

-   **画像アップロード機能の改善**

    -   `Intervention Image` を導入し、アップロード画像をリサイズして軽量化

-   **開発環境における admin ユーザーのパスワード管理の見直し**

    -   開発のしやすさから、平文パスワードを Hash 化して保存していたものを、`Str::random()` を使用したランダム生成に変更（セキュリティ強化）

-   **Admin Route のセキュリティ確認とコード整理**

    -   ミドルウェアの設定を見直し、冗長なコードを削除してよりクリーンな実装を実現

-   **依存パッケージのバージョン固定**

    -   `package.json` と `composer.json` のキャレット（`^`）を外し、**依存関係のバージョンを固定化**
    -   環境ごとの差異を防ぎ、**ビルドの安定性と再現性を向上**
        <br />

## Usage 🚀

This guide will help you run the project locally.
It assumes you're using **XAMPP** or **MAMP** to run Apache and MySQL on your local machine.

### ✅ Prerequisites

-   **PHP** (7.4+)
-   [Laravel](https://laravel.com/) (v8.x recommended)
-   [MySQL](https://www.mysql.com/) (or compatible DB)
-   **Composer**
-   [XAMPP](https://www.apachefriends.org/index.html) or [MAMP](https://www.mamp.info/en/mac/) (to run Apache & MySQL locally)

💡 This project was developed on macOS using XAMPP, Laravel v8.75, and MySQL.
<br >

### 1. 📁 Clone & Install

```bash
git clone https://github.com/sahoooii/laravel_tinderApp.git
cd laravel_tinderApp  # or the directory name you chose
composer install
```

<br />

### 2. ⚙️ Environment Setup

Rename the environment file:

```bash
cp example.env .env
```

Then update your `.env` file with your database credentials and admin info:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

ADMIN_USER_NAME=set_your_admin_name
ADMIN_EMAIL=set_your_admin_email
```

🛑 Note: Laravel has many default `.env` keys — you only need to modify the ones listed above unless your environment requires more customization.
<br />

### 3. 🔑 Generate APP Key

```bash
php artisan key:generate
```

<br />

### 4. 🛠️ Migrate & Seed Database

Create your database (e.g., via phpMyAdmin), then run the following command to seed the database with dummy data:

```bash
php artisan migrate --seed
```

#### 🔹 Seed Database

This project comes with original **18 dummy users** to help you test the app quickly.

You can log in using any of these accounts and experience the core features right away.

-   All seeded users follow the same email and password format:

    -   Email = `<first_name>@gmail.com`
    -   The password for all users is: `password`

```bash
Example:
    name: Stacy
	email: stacy@gmail.com
	password: password
```

📄 You can check more details in `UsersTableSeeder.php`.
<br />

### 5. 🔐 Admin Login Info

The seeded admin user uses credentials from your `.env` file.`

Make sure `ADMIN_USER_NAME` and `ADMIN_EMAIL` are valid.

❗️To check the admin password, please uncomment the following line in `AdminTableSeeder.php`:

```php
// echo "Admin Password: " . $password . PHP_EOL;
```

Then, run the seeder or migrate command in the terminal to see the generated password.

This method helps avoid hardcoding sensitive data and ensures the password is randomly generated for each setup.
<br />

### 6. 🖥️ Serve Locally

Start the Laravel development server:

```bash
php artisan serve
```

Visit the app at:

👉 General User: http://localhost:8000

👉 Admin panel: http://localhost:8000/admin/login
<br />

### 🖼️ Source

-   [Images](https://pixabay.com/) – Used for user profile pictures in dummy data
-   [Icons](https://fontawesome.com/) – Used throughout the UI for visual clarity

You can use these resources if you'd like to replace or add new images/icons to your local environment.
<br />

## 📘 Development Notes

**(EN)**

This project was initially developed around 2023 and has undergone two major refactoring phases along with multiple feature additions. As it was my first full-stack Laravel project, the early stages of development were far from perfect—controllers were overloaded with logic, and many useful Laravel features were overlooked.

However, as I gained more experience, I was able to improve the code in terms of readability and security, resulting in a much more maintainable structure.

Since I had always wanted to build a dating app, I enthusiastically added new features throughout the project. One of the key challenges I focused on was building a matching logic that truly reflects users' preferences. Drawing from real-life experiences, I worked hard to design a system that matches users based on their ideal partner preferences. It took some trial and error, but I'm proud of how clean and readable the final implementation turned out.

In the future, I plan to add new features such as a chat system for matched users and a membership-based visibility feature that allows users to see who liked them.

Although refactoring was a bit of a challenge—especially given the number of files Laravel uses—it turned out to be a great opportunity to solidify my understanding of the framework and grow as a developer. ✨
<br />

**(JP)**

このプロジェクトは、2023 年ごろに初期開発を行い、その後 2 回にわたって大規模なリファクタリングと機能追加を実施しました。初めての Laravel フルスタック開発だったこともあり、開発初期にはコントローラーに処理を詰め込みすぎたり、Laravel の便利なメソッドを活用できていなかったりと、多くの課題がありました。
しかし経験を重ねる中で、可読性やセキュリティの面でも改善を図り、より洗練されたコードに仕上げることができたと思います。

元々マッチングアプリを作ってみたいという思いがあり、機能追加にも意欲的に取り組みました。特にこだわったのは、ユーザーの好みを反映させるマッチングロジックです。実体験も踏まえながら、ユーザー同士の「探している相手像」をうまく一致させるための条件分岐に頭を悩ませましたが、最終的には可読性の高いコードに落とし込めたと感じています。

将来的には、マッチしたユーザー同士がチャットできる機能や、ユーザーの会員ステータスによって「誰から Like されたか」が確認できる仕組みなども追加していきたいと考えています。
Laravel はファイル構成が複雑な分、リファクタリング作業も大変でしたが、そのぶん学びも多く、良いスキルアップの機会になりました ✨
