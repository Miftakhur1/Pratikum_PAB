# =========================
# Base image PHP + Apache
# =========================
FROM php:8.2-apache

# =========================
# Install system deps
# =========================
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libicu-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libexif-dev \
    nodejs \
    npm \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql zip exif \
    && a2enmod rewrite

# =========================
# Install Composer (INI PENTING!)
# =========================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# =========================
# Set working dir
# =========================
WORKDIR /var/www/html

# =========================
# Copy project
# =========================
COPY . .

# =========================
# Install PHP deps
# =========================
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# =========================
# Install Node deps & build
# =========================
RUN npm ci && npm run build

# =========================
# Permissions
# =========================
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# =========================
# Expose port
# =========================
EXPOSE 80

# =========================
# Start Apache
# =========================
CMD ["apache2-foreground"]
