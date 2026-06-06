FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction --no-scripts

RUN npm ci && npm run production

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

EXPOSE 80

CMD echo "DB_HOST=$DB_HOST DB_DATABASE=$DB_DATABASE DB_USERNAME=$DB_USERNAME" && apache2-foreground
