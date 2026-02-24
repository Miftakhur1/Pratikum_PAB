# 1. Gunakan PHP 8.4
FROM dunglas/frankenphp:php8.4

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libzip-dev libjpeg-dev libpng-dev libexif-dev \
    && docker-php-ext-install intl zip exif pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# ... (sisanya sama seperti Dockerfile sebelumnya) ...

EXPOSE 10000
ENV PORT=10000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]