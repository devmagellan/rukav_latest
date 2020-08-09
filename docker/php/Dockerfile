FROM php:7.2.5-fpm
LABEL maintainer="dev@chialab.io"

# Download script to install PHP extensions and dependencies
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync

RUN DEBIAN_FRONTEND=noninteractive apt-get update -q \
    && DEBIAN_FRONTEND=noninteractive apt-get install -qq -y \
      curl \
      git \
      zip unzip \
    && install-php-extensions \
      bcmath \
      bz2 \
      calendar \
      exif \
      gd \
      intl \
      ldap \
      memcached \
      mysqli \
      opcache \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      redis \
      soap \
      xsl \
      zip \
      sockets \
      iconv \
      mbstring 

# Install Composer.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_VERSION 1.7.2
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
RUN set -xe \
    && composer --ansi --version --no-interaction \
    && composer --no-interaction global require 'hirak/prestissimo' \
    && composer clear-cache \
    # show php info
    && php -v \
    && php-fpm -v \
    && php -m


# Install prestissimo (composer plugin). Plugin that downloads packages in parallel to speed up the installation process
# After release of Composer 2.x, remove prestissimo, because parallelism already merged into Composer 2.x branch:
# https://github.com/composer/composer/pull/7904
RUN composer global require hirak/prestissimo
COPY --chown=www-data:www-data ./ /var/www/html

WORKDIR /var/www/html
RUN  composer install --no-interaction --ansi --no-suggest --prefer-source