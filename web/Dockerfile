FROM php:7.3-apache

ARG COMPOSE_PROJECT_NAME
ARG TZ

RUN apt-get update -y
RUN apt-get install -y \
    curl \
    gpg \
    git \
    libzip-dev \
    unzip \
    zlib1g-dev \
    zip
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

RUN docker-php-ext-install pdo pdo_mysql zip

COPY ./apache.conf /etc/apache2/sites-enabled/${COMPOSE_PROJECT_NAME}.conf
RUN rm /etc/apache2/sites-enabled/000-default.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer global require hirak/prestissimo

RUN a2enmod rewrite
