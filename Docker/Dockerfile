FROM php:8.2-apache

#COPY src/ /var/www/html/
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev

RUN apt-get install -y imagemagick imagemagick-doc 
RUN apt-get install -y php8.2-pdo-mysql php8.2-yaml  php8.0-imagick

RUN mkdir -p /var/www/lib/
CD /var/www/lib/
RUN git clone https://github.com/mikecao/flight.git