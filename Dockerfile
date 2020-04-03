FROM php:7.3-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update
RUN apt-get install -y libmcrypt-dev openssl libzip-dev

RUN docker-php-ext-install pdo mbstring pdo_mysql mbstring zip exif pcntl

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN mv /var/www/html/.env.docker /var/www/html/.env

RUN composer install

USER root

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chown -R www-data:www-data /var/www/
RUN a2enmod rewrite
RUN service apache2 restart

ENTRYPOINT php /var/www/html/artisan migrate && apachectl -D FOREGROUND
