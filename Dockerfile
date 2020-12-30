# Use an existing image as a base
FROM php:8-apache

# Download and install a dependency
# apk - preinstalled command in alpine image
# RUN apk add --update redis
# RUN apk add --update gcc

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN apt-get update \
    && apt-get install -y supervisor zip unzip zlib1g-dev libpng-dev libzip-dev libsodium-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli gd zip sodium

# Add php composer to container
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer self-update

# Install additional php extensions
# RUN docker-php-ext-install gd zip sodium pdo_mysql

# Copy local root folder to /var/www/html folder in a container
# COPY ./ /var/www/html/

WORKDIR /var/www/html
EXPOSE 80

# Tell the image what to do when it starts as a container
# CMD ["php", "index.php"]
