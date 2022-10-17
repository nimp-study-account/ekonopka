FROM php:7.4-fpm


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY src/ ./src/


WORKDIR /srv/ekonopka/