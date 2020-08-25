FROM ubuntu:18.04

ARG DEBIAN_FRONTEND=noninteractive

RUN mkdir -p /var/www
COPY ./src /var/www

RUN apt-get update && \
    apt-get install --no-install-recommends -y software-properties-common && \
    add-apt-repository ppa:ondrej/php -y && \
    apt-get install --no-install-recommends -y --allow-unauthenticated \
      composer \
      curl \
      git \
      php7.4 \
      php7.4-common \
      php7.4-dev \
      php7.4-curl \
      php7.4-fpm \
      php7.4-gd \
      php7.4-igbinary \
      php7.4-imagick \
      php7.4-intl \
      php7.4-json \
      php7.4-mbstring \
      php7.4-mysql \
      php7.4-opcache \
      php7.4-soap \
      php7.4-sybase \
      php7.4-xml \
      php7.4-zip \
      php-cli-prompt \
      php-pear \
      tzdata \
      php-xdebug

RUN ln -fs /usr/share/zoneinfo/America/Fortaleza /etc/localtime && \
            dpkg-reconfigure --frontend noninteractive tzdata

RUN phpenmod \
      curl \
      dev \
      common \
      gd \
      igbinary \
      imagick \
      intl \
      ldap \
      mbstring \
      mysql \
      opcache \
      pear \
      soap \
      sybase \
      xml \
      zip \
      xdebug

COPY ./docker/locale.gen /etc/locale.gen

COPY ./docker/xdebug.ini /etc/php/7.4/cli/conf.d/20-xdebug.ini

COPY ./src/.env.example /var/www/.env

WORKDIR /var/www

RUN composer install

RUN php artisan key:generate



