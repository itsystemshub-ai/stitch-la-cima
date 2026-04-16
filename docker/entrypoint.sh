#!/bin/bash

# Generar cache para optimizar el rendimiento en Railway
echo "Generando caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Enlace simbólico de storage
echo "Generando enlace de storage..."
php artisan storage:link --force

# Correr migraciones automáticamente
echo "Ejecutando migraciones..."
php artisan migrate --force

# Iniciar procesos
echo "Iniciando PHP-FPM y Nginx..."
php-fpm -D && nginx -g 'daemon off;'
