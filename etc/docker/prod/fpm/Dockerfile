FROM php:7.4-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN set -x \
    && curl -sS https://getcomposer.org/installer \
    |  php -- \
        --filename=composer \
        --install-dir=/usr/local/bin \
    && apk add --no-cache sudo \
    && sudo -u www-data composer config -g repos.packagist composer https://packagist.jp

RUN apk add git

RUN apk add unzip

# Supervisor config of project
COPY etc/docker/prod/supervisord/supervisord.conf /etc/supervisor/conf.d/project_supervisord.conf

# Uncomment these lines for project custom configuration
#COPY etc/docker/prod/fpm/config/php.ini /usr/local/etc/php/php.ini
#COPY etc/docker/prod/fpm/config/apcu.ini /usr/local/etc/php/conf.d/apcu.ini
#COPY etc/docker/prod/fpm/config/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

COPY . /var/www/html