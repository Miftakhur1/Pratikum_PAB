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

# 7. Atur izin folder secara brutal dan buat folder temporary upload
RUN mkdir -p storage/app/public/images \
    && mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/app/livewire-tmp \
    && chmod -R 777 storage bootstrap/cache \
    && chown -R www-data:www-data /app

# 8. Buat link untuk storage (Wajib agar gambar tidak 404)
# Kita tambahkan --force agar tidak error jika link sudah ada
RUN php artisan storage:link --force

# 9. Port & Running
EXPOSE 10000
ENV PORT=10000

# 10. Jalankan Migrasi & Server
CMD php artisan migrate --force && \
    php artisan storage:link --force && \
    php artisan config:clear && \
    frankenphp php-server --listen :10000