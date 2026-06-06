FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --from=node:18 /usr/local/bin/node /usr/local/bin/node
COPY --from=node:18 /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

WORKDIR /app
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction
RUN npm ci && npm run production

RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE $PORT
CMD php artisan migrate --force --seed && php artisan serve --host=0.0.0.0 --port=$PORT
