FROM php:7.2-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN apt-get update
RUN apt-get install -y libmcrypt-dev openssl libzip-dev

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo mbstring pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN mv /var/www/html/.env.docker /var/www/html/.env

RUN composer install

USER root

COPY ./crontab /etc/crontab

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN php /var/www/html/artisan storage:link
RUN php /var/www/html/artisan vendor:publish --tag=public --force

RUN chown -R www-data:www-data /var/www/
RUN a2enmod rewrite && a2enmod expires
RUN service apache2 restart

RUN php artisan config:cache
RUN php artisan view:clear

RUN chown 755 /var/www/html/bootstrap/cache

ENTRYPOINT php /var/www/html/artisan migrate --force && apachectl -D FOREGROUND
