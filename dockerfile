FROM php:8.1-cli

# Cài dependencies hệ thống
RUN apt-get update && apt-get install -y \
    git curl unzip zip sqlite3 libzip-dev pkg-config \
    && docker-php-ext-install pdo pdo_sqlite zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục làm việc
WORKDIR /var/www

# Copy mã nguồn Laravel
COPY . .

# Cài thư viện PHP Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Tạo APP key (nếu chưa có)
RUN php artisan key:generate || true

# Phân quyền
RUN chmod -R 775 storage bootstrap/cache

# Mở port 8080 cho Render
EXPOSE 8080

# Lệnh khởi động Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
