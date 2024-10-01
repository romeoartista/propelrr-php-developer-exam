FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable pdo_mysql

COPY src/ /var/www/html/
