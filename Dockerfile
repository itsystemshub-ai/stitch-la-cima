# --- Etapa 1: Dependencias de PHP (Composer) ---
FROM composer:latest as vendor
WORKDIR /app
COPY composer.json ./
RUN composer update \
    --no-dev \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# --- Etapa 2: Dependencias de JS y Compilación (Vite) ---
FROM node:20-alpine as assets
WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
COPY resources/ ./resources/
RUN npm install && npm run build

# --- Etapa 3: Imagen Final de Producción ---
FROM php:8.2-fpm-alpine
WORKDIR /var/www

# Instalar dependencias del sistema y extensiones necesarias
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    bash

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Copiar el código y las dependencias de las etapas anteriores
COPY . .
COPY --from=vendor /app/vendor/ ./vendor/
COPY --from=assets /app/public/build/ ./public/build/

# Crear link simbólico para el storage si no existe y dar permisos
RUN mkdir -p storage/framework/views storage/framework/cache storage/framework/sessions bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data /var/www

# Configuración de Nginx y Supervisor
COPY ./docker/nginx.conf /etc/nginx/http.d/default.conf

# Copiar y preparar el script de entrada
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Exponer puertos
EXPOSE 80

# Usar el script de entrada
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

