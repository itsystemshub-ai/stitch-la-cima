#!/bin/bash

# Generar cache para optimizar el rendimiento en Railway
echo "Limpiando caches anteriores..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Generando nuevas caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Enlace simbólico de storage
echo "Generando enlace de storage..."
php artisan storage:link --force

# Correr migraciones automáticamente
echo "Ejecutando migraciones (MySQL)..."
php artisan migrate --force

# Iniciar procesos
echo "Iniciando PHP-FPM y Nginx..."
php-fpm -D && nginx -g 'daemon off;'
