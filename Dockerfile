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

# 権限の設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Apacheの設定
RUN a2enmod rewrite

# Laravelの環境変数（ENVファイル）はRenderの管理画面で設定

# ポート設定（Renderのデフォルトポート）
EXPOSE 10000

# 起動スクリプト
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
