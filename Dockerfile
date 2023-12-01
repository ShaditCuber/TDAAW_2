FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libmcrypt-dev \
    zip \
    unzip \
    git \
    curl \
    vim \
    wget \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY composer.json .
RUN composer install --no-scripts
COPY . .

CMD php artisan serve --host=0.0.0.0 --port=80

