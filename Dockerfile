# Dockerfile
FROM php:8.2-fpm

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libonig-dev libpng-dev libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working dir
WORKDIR /var/www

# Copy composer.json first for cached composer install
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader || true

# Copy app
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
