#!/bin/bash

apt-get update && apt-get dist-upgrade -y

apt-get install apache2 -y

ufw allow ssh
ufw allow in "Apache"
ufw enable

apt install mysql-server -y

mysql -e 'CREATE DATABASE challangeprogramma'

mysqlPassword=`openssl rand -hex 15`"D!"
mysql -e "CREATE USER 'challangeprogramma'@'localhost' IDENTIFIED BY '$mysqlPassword'; GRANT ALL ON *.* TO 'challangeprogramma'@'localhost' WITH GRANT OPTION;"
echo "Mysql password of challangeprogramma is: '$mysqlPassword'"

apt-get install php libapache2-mod-php php-mysql -y

mkdir /var/www/challangeprogramma.nl
cp -r * /var/www/challangeprogramma.nl
cp -r .* /var/www/challangeprogramma.nl

cd /var/www/challangeprogramma.html

apt-get install curl -y
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

apt-get install nodejs -y
apt-get install npm -y

composer install
npm install

cd /var/www/challangeprogramma.nl
cp .env.example .env

sed -i.bak 's/^DB_DATABASE=.*/DB_DATABASE=challangeprogramma/' .env
sed -i.bak 's/^DB_USERNAME=.*/DB_USERNAME=challangeprogramma/' .env
sed -i.bak "s/^DB_PASSWORD=.*/DB_PASSWORD=$mysqlPassword/" .env
sed -i.bak 's/^APP_DEBUG=.*/APP_DEBUG=false/' .env
sed -i.bak 's/^APP_URL=.*/APP_URL=challange-programma.nl/' .env

php artisan key:generate

cp challange-programma.nl.conf /etc/apache2/sites-available
cd /etc/apache2/sites-available

a2ensite challange-programma.nl.conf
systemctl reload apache2
# c20221639fb6617fc4bd055832f30dD!
