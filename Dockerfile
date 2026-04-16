# FROM php:8.2-fpm-alpine
FROM php:8.2-fpm-alpine

# Instalar dependencias del sistema
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    libzip-dev \
    nginx \
    supervisor

# Instalar extensiones de PHP necesarias (SOLUCIONA: pdo_mysql)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Configurar directorio de trabajo
WORKDIR /var/www

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de Composer (vía Multi-stage o asumiendo que ya están si se despliega local)
# Para este demo, asumimos que el usuario sube los archivos. En CI se usaría:
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# RUN composer install --no-dev --optimize-autoloader

# Configurar permisos
RUN mkdir -p /var/www/cache && chown -R www-data:www-data /var/www/storage /var/www/cache

# Configuración de Nginx
COPY ./docker/nginx.conf /etc/nginx/http.d/default.conf

# Script de inicio
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]

EXPOSE 80
