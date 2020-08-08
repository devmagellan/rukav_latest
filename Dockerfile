FROM php:7.2.24-fpm

MAINTAINER Andrey Lopushansky <dev.magellan@gmail.com>

#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt update -yqq \
    && apt full-upgrade -y \
    && apt-get install -y nginx \
    && pecl channel-update pecl.php.net
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


ENV COMPOSER_ALLOW_SUPERUSER 1

COPY ./composer.json /var/www/html/composer.json
RUN /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
RUN sudo /sbin/mkswap /var/swap.1
RUN sudo chmod 600 -R /sbin/swapon /var/swap.1
RUN /usr/local/bin/php -d memory_limit=-1 /usr/local/bin/composer install --prefer-dist
WORKDIR /var/www/html

EXPOSE 80 443

CMD ["php-fpm"]

