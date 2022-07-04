FROM php:8.1-apache

# Install tools required for build stage
RUN apt-get update && apt-get install -y \
    bash curl wget rsync ca-certificates openssl ssh git tzdata openntpd \
    libxrender1 fontconfig libc6 \
    default-mysql-client gnupg binutils-gold autoconf

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
 && chmod 755 /usr/bin/composer

# Install additional PHP libraries
RUN docker-php-ext-install bcmath pdo_mysql

# Install libraries for compiling GD, then build it
RUN apt-get install -fyqq libfreetype6 libfreetype6-dev libpng16-16 libpng-dev libjpeg62-turbo libjpeg62-turbo-dev \
 && docker-php-ext-install gd \
 && apt-get remove -fyqq libfreetype6-dev libpng-dev libjpeg62-turbo-dev

# Add ZIP archives support
RUN apt-get install -fyqq zip libzip-dev \
 && docker-php-ext-install zip \
 && apt-get remove -fyqq libzip-dev

# Install xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

# Enable XDebug
ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /app
