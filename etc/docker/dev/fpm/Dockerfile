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

RUN mkdir -p /var/www/html/var/cache/
RUN chmod 777 -R /var/www/html/var/cache

ARG W_DOCKER_BUILD_OS_NAME="linux"

# COPY etc/docker/dev/fpm/config/php.ini /usr/local/etc/php/php.ini
RUN if [ "macos" == "$W_DOCKER_BUILD_OS_NAME" ]; then sed -i "s/xdebug\.remote_connect_back[ ]*=[ ]*1;/xdebug.remote_connect_back=0;/g" /usr/local/etc/php/conf.d/xdebug.ini; fi

# Supervisor config of project
COPY etc/docker/dev/supervisord/supervisord.conf /etc/supervisor/conf.d/project_supervisord.conf