FROM php:7.4-fpm

#Argument is defined in docker-compose file
ARG user

#RUN commands
RUN apt-get update && apt-get install -y \
		curl git zip unzip libpng-dev libonig-dev libxml2-dev\
        && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN curl -sS https://getcomposer.org/download/2.0.7/composer.phar -o /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

#create files
RUN mkdir -p /var/www/app/src
RUN touch /var/www/app/.env

#copy files into dev folder
ADD ./src /var/www/app/src
ADD ./.env  /var/www/app/.env

#create user account
RUN useradd -m -s /bin/bash $user
RUN chown -R $user:$user /var/www

USER $user

WORKDIR /var/www/app
