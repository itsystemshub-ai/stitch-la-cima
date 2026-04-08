#!/bin/bash
# ============================================
# Script de Despliegue Rápido - Zenith ERP
# Mayor de Repuesto La Cima, C.A.
# ============================================

echo "🚀 Iniciando despliegue de Zenith ERP..."

# Verificar dependencias
echo "📦 Verificando dependencias..."
if ! command -v node &> /dev/null; then
    echo "❌ Node.js no está instalado"
    exit 1
fi

if ! command -v npm &> /dev/null; then
    echo "❌ npm no está instalado"
    exit 1
fi

echo "✅ Node.js $(node -v) detectado"
echo "✅ npm $(npm -v) detectado"

# Navegar al backend
cd backend

# Instalar dependencias
echo "📦 Instalando dependencias..."
npm ci --production=false

# Generar cliente Prisma
echo "🔧 Generando Prisma Client..."
npx prisma generate

# Verificar DATABASE_URL
if [ -z "$DATABASE_URL" ]; then
    echo "⚠️  DATABASE_URL no está configurada"
    echo "   Para desarrollo local: crea un archivo .env con:"
    echo "   DATABASE_URL='postgresql://usuario:password@localhost:5432/zenith_erp'"
    echo ""
    read -p "¿Quieres usar SQLite para desarrollo local? (y/n): " use_sqlite
    if [ "$use_sqlite" = "y" ]; then
        echo "🔄 Cambiando a SQLite para desarrollo..."
        # Crear .env para desarrollo
        cat > .env << EOF
NODE_ENV=development
PORT=3000
DATABASE_URL="file:./dev.db"
JWT_SECRET=development-secret-key-change-in-production
JWT_EXPIRE=24h
JWT_REFRESH_EXPIRE=7d
FRONTEND_URL=http://localhost:5500
EOF
        echo "✅ .env creado para desarrollo con SQLite"
    else
        echo "❌ Por favor configura DATABASE_URL y ejecuta este script de nuevo"
        exit 1
    fi
fi

# Ejecutar migraciones
echo "🗄️  Ejecutando migraciones..."
if [ "$NODE_ENV" = "production" ]; then
    npx prisma migrate deploy
else
    npx prisma migrate dev --name init
fi

# Poblar base de datos
echo "🌱 Poblando base de datos..."
npm run db:seed

# Iniciar servidor
echo "🚀 Iniciando servidor..."
if [ "$NODE_ENV" = "production" ]; then
    npm start
else
    npm run dev
fi
