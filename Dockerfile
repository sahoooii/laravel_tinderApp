# PHP + Apache 環境の公式イメージを使用
FROM php:8.2-apache

# 必要なPHP拡張をインストール
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql gd

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# Laravelのファイルをコピー
COPY . .

# 依存関係のインストール
RUN composer install --no-dev --optimize-autoloader

# LaravelのAPP_KEYはRenderの環境変数で管理するため、`php artisan key:generate` は不要

# 権限の設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Apacheの設定
RUN a2enmod rewrite

# ポート設定
EXPOSE 80

# 起動スクリプト（Apacheを使用）
CMD ["apache2-foreground"]
