#!/bin/bash

# Asegurar permisos de almacenamiento en cada arranque
echo "Verificando permisos de almacenamiento..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Limpiar cachés previas
echo "Limpiando cachés..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generar enlace de storage si no existe
echo "Verificando enlace de storage..."
php artisan storage:link --force

# Esperar a que la base de datos esté lista (si es MySQL)
if [ ! -z "$MYSQLHOST" ]; then
    echo "Esperando a MySQL ($MYSQLHOST:%$MYSQLPORT)..."
    until php -r "try { new PDO('mysql:host=' . getenv('MYSQLHOST') . ';port=' . getenv('MYSQLPORT'), getenv('MYSQLUSER'), getenv('MYSQLPASSWORD')); exit(0); } catch (Exception \$e) { exit(1); }"; do
        echo "MySQL no está listo aún - reintentando en 2s..."
        sleep 2
    done
    echo "¡Conexión a MySQL establecida!"
fi

# Correr migraciones automáticamente
echo "Ejecutando migraciones..."
php artisan migrate --force

# Configurar el puerto dinámico para Railway
PORT=${PORT:-8080}
echo "Configurando Nginx para el puerto: $PORT"
sed -i "s/listen 8080;/listen $PORT;/g" /etc/nginx/http.d/default.conf

# Iniciar procesos
echo "Lanzando Zenith ERP v6.0..."
# Arrancamos PHP-FPM y Nginx
php-fpm -D
nginx -g 'daemon off;'
