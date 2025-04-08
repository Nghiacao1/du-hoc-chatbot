FROM php:8.1

# Cài các gói cần thiết
RUN apt-get update && apt-get install -y \
    unzip zip curl git libzip-dev sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ code vào container
COPY . .

# Cài thư viện Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Tạo key cho Laravel
RUN php artisan key:generate

# Phân quyền thư mục
RUN chmod -R 775 storage bootstrap/cache

# Expose port 8080 để Render có thể truy cập
EXPOSE 8080

# Lệnh chạy app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
