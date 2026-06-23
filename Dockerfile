FROM php:8.2-fpm

ARG user=laravel
ARG uid=1000

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário e diretórios com permissão correta
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user \
    && mkdir -p /var/www \
    && chown -R $user:$user /var/www

WORKDIR /var/www

# Copiar o código já com ownership correto
COPY --chown=$user:$user . .

# Criar pastas necessárias e ajustar permissões
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions \
        storage/framework/views bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

USER $user

# Instalar dependências
RUN composer install --no-interaction --no-dev --optimize-autoloader

EXPOSE 8000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}