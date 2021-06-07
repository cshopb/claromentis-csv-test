FROM php:8.0.7-apache

MAINTAINER Zsolt

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /srv/www

RUN docker-php-ext-install pdo pdo_mysql \
    && chown -R www-data:www-data /srv/www \
    && a2enmod rewrite \
    && apt-get -y update \
    && apt-get -y install dialog apt-utils vim nano curl libxml2-dev net-tools libfontconfig1 libxrender1 libxext6 git zip unzip mariadb-client libpng-dev libonig-dev \
    libzip-dev libmagickwand-dev \
    && docker-php-ext-install soap calendar zip gd \
    && yes | pecl install xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
