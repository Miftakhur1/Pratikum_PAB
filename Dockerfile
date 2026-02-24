FROM dunglas/frankenphp:php8.4

# 1. Install system deps & dos2unix untuk benerin format file Windows
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libzip-dev libjpeg-dev libpng-dev libexif-dev dos2unix \
    && docker-php-ext-install intl zip exif pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# 2. Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 3. Set direktori kerja
WORKDIR /app

# 4. Copy seluruh isi folder proyek
COPY . .

# 5. BERSIHKAN FILE (Sangat Penting!)
# Dos2unix akan mengubah format Windows (CRLF) ke Linux (LF) agar artisan bisa dibaca
RUN dos2unix artisan && chmod +x artisan

# 6. Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# 7. Atur izin folder
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data /app

# 8. Port & Running
EXPOSE 10000
ENV PORT=10000

# Jalankan langsung dari folder /app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]