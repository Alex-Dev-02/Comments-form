FROM php:8.2-fpm-alpine

# Установка зависимостей
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    mc

# Установка PHP-расширений
RUN docker-php-ext-install pdo_mysql pdo mysqli \
 && docker-php-ext-enable mysqli pdo pdo_mysql

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
