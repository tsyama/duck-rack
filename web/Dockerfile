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

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/sbin/composer
RUN composer global require hirak/prestissimo

RUN a2enmod rewrite
