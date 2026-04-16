#!/bin/bash

# ============================================
# Script de Despliegue - La Cima ERP
# ============================================
# Uso: ./deploy.sh
# ============================================

set -e

echo "============================================"
echo "🚀 Despliegue La Cima ERP"
echo "============================================"

# 1. Instalar dependencias
echo "📦 Instalando dependencias..."
composer install --no-dev --optimize-autoloader

# 2. Generar key si no existe
echo "🔑 Generando APP_KEY..."
php artisan key:generate --force

# 3. Limpiar caché
echo "🧹 Limpiando caché..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 4. Ejecutar migraciones
echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force

# 5. Semillar datos iniciales
echo "🌱 Semillando datos..."
php artisan db:seed --class=UserSeeder --force
php artisan db:seed --class=CustomerAuthSeeder --force

# 6. Crear caché de configuración
echo "⚡ Optimizando..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "============================================"
echo "✅ Despliegue completado!"
echo "============================================"
echo ""
echo "Credenciales:"
echo "  Admin: admin@lacima.com / admin123"
echo ""
echo " URLs:"
echo "  ERP:  http://tu-dominio.com/erp/inicio"
echo "  Tienda:  http://tu-dominio.com/"
echo "============================================"