FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libzip-dev libjpeg-dev libpng-dev libexif-dev \
    && docker-php-ext-install intl zip exif pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache modules (FIX MPM ERROR)
RUN a2dismod mpm_event mpm_worker \
 && a2enmod mpm_prefork rewrite

# Set document root to Laravel public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app
WORKDIR /var/www/html
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader \
 && php artisan key:generate || true

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
