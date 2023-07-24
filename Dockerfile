FROM php:8-apache

RUN apt-get update && apt-get install -y git zip libzip-dev libxml2-dev

# Install mysql extension
# RUN docker-php-ext-configure pdo_mysql && docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql soap

# Install APCu extension
ADD https://pecl.php.net/get/apcu-5.1.3.tgz /tmp/apcu.tar.gz
# COPY apcu-5.1.3.tgz /tmp/apcu.tar.gz
RUN mkdir -p /usr/src/php/ext/apcu && tar xf /tmp/apcu.tar.gz -C /usr/src/php/ext/apcu --strip-components=1

# configure and install
#RUN docker-php-ext-configure apcu && docker-php-ext-install apcu
RUN pecl install apcu \
    && docker-php-ext-enable apcu

RUN rm -rd /usr/src/php/ext/apcu && rm /tmp/apcu.tar.gz

# Install APCu-BC extension
ADD https://pecl.php.net/get/apcu_bc-1.0.3.tgz /tmp/apcu_bc.tar.gz
# COPY apcu_bc-1.0.3.tgz /tmp/apcu_bc.tar.gz
RUN mkdir -p /usr/src/php/ext/apcu-bc && tar xf /tmp/apcu_bc.tar.gz -C /usr/src/php/ext/apcu-bc --strip-components=1

EXPOSE 80
WORKDIR /var/www
# change to webroot dir
COPY ./src /var/www
COPY .env /var/www

RUN git config --global url."https://github.com/".insteadOf git@github.com:
RUN git config --global url."https://".insteadOf git://

ENV APACHE_DOCUMENT_ROOT /var/www
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN chown -R www-data:www-data /var/www

RUN a2enmod rewrite
