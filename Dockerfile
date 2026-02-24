FROM dunglas/frankenphp:php8.4

# 1. Install system deps & dos2unix
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

# 5. Konversi format file artisan (Windows to Linux)
RUN dos2unix artisan && chmod +x artisan

# 6. Install PHP dependencies (Optimized)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# 7. Atur izin folder & Optimasi Laravel (Sangat Penting untuk kecepatan)
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data /app 

# 8. Buat link untuk storage agar gambar bisa muncul
RUN php artisan storage:link

# 9. Port & Running
EXPOSE 10000
ENV PORT=10000

# 10. Clear cache & Jalankan server
CMD php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan serve --host=0.0.0.0 --port=10000