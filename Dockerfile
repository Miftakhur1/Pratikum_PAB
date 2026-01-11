FROM dunglas/frankenphp:php8.2

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libzip-dev libjpeg-dev libpng-dev libexif-dev \
    && docker-php-ext-install intl zip exif pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /app

# Copy project
COPY . .

# Install PHP deps
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Laravel permissions
RUN mkdir -p storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Expose Railway port
EXPOSE 3000

# Start Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=3000"]
