FROM php:8.0-fpm-alpine3.13

WORKDIR /var/www/html

RUN apk update

RUN apk add freetype-dev
RUN apk add libjpeg-turbo-dev
RUN apk add libpng-dev
RUN apk add libzip-dev
RUN apk add zlib-dev
RUN apk add ghostscript
RUN apk add busybox-extras
RUN apk add nano
RUN apk add curl
RUN apk add libxml2 libxslt-dev
RUN apk add jpeg-dev libpng-dev

# COPY ./docker/php/config/php.ini /usr/local/etc/php

RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql gd zip soap



# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html
RUN composer install
