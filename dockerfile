FROM php:8.1-apache

RUN apt update \
    && apt install wget \ 
    && wget -O phpunit https://phar.phpunit.de/phpunit-10.phar \ 
    && chmod +x phpunit \
    && mv phpunit /usr/local/bin/phpunit

