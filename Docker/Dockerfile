FROM php:8.2-apache

#COPY src/ /var/www/html/
RUN apt-get update && apt-get install -y \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libyaml-dev \
#       && docker-php-ext-configure gd --with-freetype --with-jpeg \
#       && docker-php-ext-install -j$(nproc) gd
        && docker-php-ext-install mysqli pdo pdo_mysql

RUN pecl install yaml && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini && docker-php-ext-enable yaml
RUN a2enmod rewrite

#RUN apt-get install -y imagemagick imagemagick-doc


RUN mkdir -p /var/external/
RUN cd /var/external/; git clone https://github.com/mikecao/flight.git
