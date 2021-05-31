FROM php:7.3-apache

RUN apt update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

COPY virtualhost.conf /etc/apache2/sites-available/virtualhost.conf
COPY apache2.conf /etc/apache2/apache2.conf
COPY xdebug.orig.ini /usr/local/etc/php/conf.d/xdebug.orig.ini

RUN pecl install xdebug
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini
RUN cat /usr/local/etc/php/conf.d/xdebug.orig.ini >> /usr/local/etc/php/conf.d/xdebug.ini

RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install mysqli mbstring exif pcntl bcmath gd ctype fileinfo pdo pdo_mysql


RUN a2enmod vhost_alias
RUN a2enmod rewrite
RUN a2enmod headers

RUN a2ensite virtualhost.conf

EXPOSE 80 9000
RUN useradd -G www-data,root --uid 1000 -d /home/userdev userdev
RUN mkdir -p /home/userdev/.composer && \
    chown -R userdev:userdev /home/userdev