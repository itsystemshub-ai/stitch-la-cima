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

# Esperar a que la base de datos esté lista (si es MySQL)
if [ ! -z "$MYSQLHOST" ]; then
    echo "Esperando a MySQL ($MYSQLHOST)..."
    until php -r "try { new PDO('mysql:host=' . getenv('MYSQLHOST') . ';port=' . getenv('MYSQLPORT'), getenv('MYSQLUSER'), getenv('MYSQLPASSWORD')); exit(0); } catch (Exception \$e) { exit(1); }"; do
        echo "MySQL no está listo aún - reintentando en 2s..."
        sleep 2
    done
    echo "Conexión a MySQL establecida."
fi

# Correr migraciones automáticamente
echo "Ejecutando migraciones (MySQL)..."
php artisan migrate --force

# Configurar el puerto dinámico para Railway
PORT=${PORT:-8080}
echo "Configurando Nginx para escuchar en el puerto: $PORT"
sed -i "s/listen 8080;/listen $PORT;/g" /etc/nginx/http.d/default.conf

# Iniciar procesos
echo "Iniciando PHP-FPM y Nginx..."
php-fpm -D && nginx -g 'daemon off;'
