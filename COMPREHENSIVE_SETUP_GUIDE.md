# Stitch La Cima - Guía Completa de Configuración y Ejecución

## 📋 Descripción del Proyecto
Stitch La Cima es una aplicación web empresarial ERP construida con Laravel que incluye:
- Sistema de punto de venta (POS)
- Gestión de inventario
- Módulo de ventas y compras
- Contabilidad
- Recursos humanos
- Finanzas
- Panel de administración
- Tienda en línea (storefront)

## 🔧 Requisitos del Sistema

### Software Requerido
- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.0
- **npm** >= 9.0
- **Base de datos**: MySQL 8.0+ o SQLite (para desarrollo)
- **Git** (opcional pero recomendado)

### Extensiones de PHP Necesarias
- bcmath
- ctype
- fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML

## 📥 Instalación Paso a Paso

### 1. Clonar el Repositorio
```bash
git clone https://github.com/tu-usuario/stitch_la_cima.git
cd stitch_la_cima
```

### 2. Instalar Dependencias de PHP
```bash
composer install
```

### 3. Instalar Dependencias de JavaScript
```bash
npm install
```

### 4. Configurar Variables de Entorno
```bash
# Copiar el archivo de ejemplo
cp .env.example .env

# Generar la clave de aplicación
php artisan key:generate
```

### 5. Configurar la Base de Desarrollo
Para desarrollo local, el proyecto usa SQLite por defecto. Si prefieres MySQL:

#### Opción A: SQLite (Recomendado para desarrollo)
El archivo `.env` ya viene configurado para SQLite:
```
DB_CONNECTION=sqlite
DB_DATABASE=C:\Users\ET\Documents\GitHub\stitch_la_cima\database\database.sqlite
```

#### Opción B: MySQL
Edita tu archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stitch_la_cima
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

Luego crea la base de datos:
```bash
# MySQL
CREATE DATABASE stitch_la_cima;
```

### 6. Ejecutar Migraciones
```bash
php artisan migrate
```

### 7. (Opcional) Sembrar Datos de Prueba
```bash
php artisan db:seed
```

## 🚀 Ejecutando el Proyecto

### Método Recomendado: Script Todo-en-Uno
```bash
# Esto inicia ambos servidores automáticamente
serve.bat
```
Este script ejecuta:
- Servidor de desarrollo de Laravel en http://127.0.0.1:8000
- Servidor de desarrollo de Vite (hot reload para assets)

### Método Alternativo: Servidores Separados
En una terminal:
```bash
php artisan serve
```
Inicia: http://127.0.0.1:8000

En otra terminal:
```bash
npm run dev
```
Inicia: Vite dev server con hot reload

### Método Personalizado
```bash
php artisan serve:all
```
Comando personalizado que hace lo mismo que `serve.bat`

## 🏗️ Construcción para Producción

### Compilar Assets
```bash
npm run build
```

### Optimizar Laravel
```bash
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Probar en Producción Local
```bash
php artisan serve --env=production
```

## 📁 Estructura del Proyecto

```
stitch_la_cima/
├── app/                  # Lógica de la aplicación
│   ├── Http/             # Controladores y middleware
│   ├── Models/           # Modelos Eloquent
│   └── ...               # Otros componentes
├── bootstrap/            # Arquivo de inicialización
├── config/               # Archivos de configuración
├── database/             # Migraciones y seeders
├── public/               # Assets públicos compilados
├── resources/            # Assets sin compilizar
│   ├── css/              # Archivos CSS y Tailwind
│   ├── js/               # JavaScript
│   └── views/            # Plantillas Blade
├── routes/               # Definiciones de rutas
│   └── web.php           # Rutas principales
├── storage/              # Almacenamiento y logs
├── tests/                # Tests automatizados
└── vendor/               # Dependencias de Composer
```

## 🌐 Rutas Principales

### Frontend (Storefront)
- `http://127.0.0.1:8000/` - Página de inicio de la tienda
- `http://127.0.0.1:8000/tienda/catalogo_general` - Catálogo de productos
- `http://127.0.0.1:8000/tienda/carrito` - Ver carrito
- `http://127.0.0.1:8000/tienda/checkout` - Proceso de pago

### Autenticación
- `http://127.0.0.1:8000/auth/login` - Inicio de sesión
- `http://127.0.0.1:8000/auth/registrar` - Registro de usuarios

### ERP (Panel de Administración)
- `http://127.0.0.1:8000/erp/dashboard` - Panel principal (requiere login)
- `http://127.0.0.1:8000/erp/inventario` - Gestión de inventario
- `http://127.0.0.1:8000/erp/ventas` - Módulo de ventas
- `http://127.0.0.1:8000/erp/compras` - Módulo de compras
- `http://127.0.0.1:8000/erp/contabilidad` - Módulo contable
- `http://127.0.0.1:8000/erp/rrhh` - Recursos humanos
- `http://127.0.0.1:8000/erp/finanzas` - Gestión financiera
- `http://127.0.0.1:8000/erp/configuracion` - Ajustes del sistema

### APIs
- `http://127.0.0.1:8000/api/tienda/productos` - API de productos
- `http://127.0.0.1:8000/api/erp/invoice/checkout` - Procesamiento de facturas

## 🛠️ Herramientas de Desarrollo

### Comandos Útiles de Artisan
```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generar controladores
php artisan make:controller NombreController

# Generar modelos
php artisan make:model Nombre -mf  # -m migración, -f factory

# Ejecutar tests
php artisan test
phpunit

# Modo mantenimiento
php artisan down
php artisan up

# Limpiar vistas compiladas
php artisan view:clear
```

### Comandos de Vite/NPM
```bash
# Desarrollo con watch
npm run dev

# Producción minificada
npm run build

# Ver tamaño de los bundles
npm run build -- --analyze
```

## 🐳 Ejecutando con Docker (Opcional)

Si prefieres usar Docker:

```bash
# Construir las imágenes
docker-compose build

# Iniciar los contenedores
docker-compose up -d

# Instalar dependencias dentro del contenedor
docker-compose exec app composer install
docker-compose exec app npm install

# Generar clave y migrar
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate

# Acceder a la aplicación
# http://localhost:8000
```

## 🔐 Credenciales de Acceso Inicial

Después de la instalación, puedes crear un usuario administrador:

```bash
php artisan tinker
>>> App\Models\User::create([
    'name' => 'Administrador',
    'email' => 'admin@lacima.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin',
    'is_active' => 1
]);
```

O usar la ruta de debug (si está habilitada):
```
http://127.0.0.1:8000/debug/seed-admin
```

## 📝 Variables de Entorno Importantes

### .env
```env
# APP
APP_NAME="La Cima"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# BASE DE DATOS
DB_CONNECTION=sqlite
DB_DATABASE=C:\Users\ET\Documents\GitHub\stitch_la_cima\database\database.sqlite

# CACHE Y SESIONES
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database

# EMAIL (para notificaciones)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu_app_password

# ALMACENAMIENTO
FILESYSTEM_DISK=public

# AWS S3 (opcional, para producción)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=lacima-storage

# VITE
VITE_APP_NAME="${APP_NAME}"
```

## 🔍 Solución de Problemas Comunes

### 1. Error de Permisos en Storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 2. Error de Clave de Aplicación
```bash
php artisan key:generate
```

### 3. Error de Migración de Base de Datos
```bash
php artisan migrate:fresh --seed
```

### 4. Assets No Se Actualizan (HMR)
```bash
# Limpiar caché de Vite
rm -rf node_modules/.vite
npm install
npm run dev
```

### 5. Error de Sesión o CSRF Token
Asegúrate de que tu `.env` tenga:
```
SESSION_DRIVER=database
SANCTUM_STATEFUL_DOMAINS=localhost:8000,127.0.0.1:8000
```

## 📊 Monitoreo y Diagnóstico

### Rutas de Debug (Solo en Desarrollo)
- `http://127.0.0.1:8000/debug/diagnostico` - Información del sistema
- `http://127.0.0.1:8000/debug/rutas` - Lista de rutas ERP
- `http://127.0.0.1:8000/debug/users` - Lista de usuarios
- `http://127.0.0.1:8000/debug/login-test` - Probar credenciales
- `http://127.0.0.1:8000/debug/desbloquear-db` - Desbloquear BD

### Logs
- `storage/logs/laravel.log` - Log principal de Laravel
- `storage/logs/vite.log` - Log de Vite (si existe)

## 🛡️ Seguridad

### Buenas Prácticas Implementadas
- Protección CSRF automática en formularios
- Validación de entrada en todos los controladores
- Protección contra path traversal en rutas estáticas
- Rate limiting en rutas de autenticación
- Escapado de salida en plantillas Blade
- Uso de prepared statements en consultas DB

### Para Producción
1. Establece `APP_ENV=production`
2. Desactiva `APP_DEBUG=false`
3. Configura un web server adecuado (Nginx/Apache)
4. Usa HTTPS con certificado SSL
5. Configura permisos adecuados en archivos y carpetas
6. Considera usar un servicio de colas (Redis/SQS)
7. Implementa backup regular de la base de datos

## 📚 Recursos Adicionales

### Documentación Oficial
- [Laravel Documentation](https://laravel.com/docs)
- [Vite Documentation](https://vitejs.dev/guide/)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev/)

### Tutoriales Recomendados
- Laravel desde cero: https://laracasts.com/series/laravel-from-scratch
- Vue/Vite con Laravel: https://laracasts.com/series/modern-laravel
- Tailwind CSS: https://laracasts.com/series/tailwind-css-essential-training

## ✅ Verificación de Instalación

Después de completar la instalación, verifica que:

1. ✅ La página de carga muestra el logo de Laravel o la tienda
2. ✅ Puedes acceder a `/erp/dashboard` después de iniciar sesión
3. ✅ Los assets CSS y JS se cargan correctamente (ver en devtools)
4. ✅ El hot reload funciona cuando editas archivos en `resources/`
5. ✅ Las APIs responden correctamente (ej: `/api/tienda/productos`)
6. ✅ Puedes crear, leer, actualizar y eliminar registros en módulos básicos

---

## 🙋‍♂️ Soporte

Si tienes problemas durante la instalación o uso:

1. Revisa los logs en `storage/logs/`
2. Ejecuta `php artisan diagnose` para información del sistema
3. Verifica que cumplas con los requisitos de versión
4. Consulta los issues en el repositorio
5. Para problemas críticos, abre un issue detallando:
   - Sistema operativo y versión
   - Versiones de PHP, Node.js, Composer
   - Pasos para reproducir el error
   - Mensajes de error completos
   - Capturas de pantalla si es aplicable

---

**¡Disfruta desarrollando con Stitch La Cima!** 🎉

*Esta guía fue actualizada el: 2026-04-21*