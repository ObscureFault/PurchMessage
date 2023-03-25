FROM php:8.2-apache

#COPY src/ /var/www/html/
RUN apt-get update && apt-get install -y \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
#       && docker-php-ext-configure gd --with-freetype --with-jpeg \
#       && docker-php-ext-install -j$(nproc) gd
        && docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite
#RUN apt-get install -y imagemagick imagemagick-doc
#RUN apt-get install -y php8.2-pdo-mysql php8.2-yaml  php8.0-imagick


RUN mkdir -p /var/www/internal/
RUN cd /var/www/internal/; git clone https://github.com/mikecao/flight.git