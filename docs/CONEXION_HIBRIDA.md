# 🗄️ Guía de Conexión Híbrida - Base de Datos

## Zenith ERP - Mayor de Repuesto La Cima, C.A.

---

## 📋 Resumen del Sistema Híbrido

El sistema ahora soporta **dos bases de datos** automáticamente:

| Ambiente | Base de Datos | Uso |
|----------|---------------|-----|
| **Local** | SQLite (`dev.db`) | Desarrollo en tu computadora |
| **Nube** | PostgreSQL | Producción (Railway, Render, Fly.io) |

---

## 🔄 Cómo Funciona la Detección Automática

El sistema detecta automáticamente el ambiente:

```javascript
// backend/src/utils/dbConnection.js

// Detecta variables de entorno de plataformas cloud
const isRailway = !!process.env.RAILWAY_ENVIRONMENT;
const isRender = !!process.env.RENDER;
const isFly = !!process.env.FLY_APP_NAME;
const isCloud = isProduction || isRailway || isRender || isFly;

// Selecciona configuración automáticamente
const config = isCloud ? dbConfig.cloud : dbConfig.local;
```

### Indicadores de ambiente:

| Indicador | Significado |
|-----------|-------------|
| `NODE_ENV=production` | Modo producción |
| `RAILWAY_ENVIRONMENT` | Desplegado en Railway |
| `RENDER` | Desplegado en Render |
| `FLY_APP_NAME` | Desplegado en Fly.io |
| Ninguno | Modo desarrollo local (SQLite) |

---

## 🚀 Uso en Desarrollo Local

### 1. Instalar dependencias

```bash
cd backend
npm install
```

### 2. Configurar entorno local

El archivo `.env.local` ya está configurado para SQLite:

```env
DB_PROVIDER=sqlite
DATABASE_URL="file:./dev.db"
```

### 3. Ejecutar migraciones locales

```bash
# Crear base de datos SQLite
npm run db:migrate:local

# Poblar con datos de prueba
npm run db:seed:local
```

### 4. Iniciar servidor local

```bash
npm run dev:local
```

El servidor mostrará:
```
╔══════════════════════════════════════════╗
║     ZENITH ERP - Conexión Base Datos     ║
╠══════════════════════════════════════════╣
║  Ambiente: DESARROLLO (Local)            ║
║  Base Datos: SQLite (Desarrollo Local)   ║
║  Provider: sqlite                        ║
╚══════════════════════════════════════════╝
✅ Conectado a SQLite (Desarrollo Local)
```

---

## ☁️ Uso en la Nube (Producción)

### Railway.app (Recomendado)

1. **PostgreSQL se configura automáticamente**
   - Railway genera `DATABASE_URL` automáticamente
   - No necesitas configurar nada

2. **El sistema detecta Railway automáticamente**
   - Variable `RAILWAY_ENVIRONMENT` está presente
   - Usa PostgreSQL automáticamente

3. **Migraciones se ejecutan en el deploy**
   - Configurado en `railway.json`:
   ```json
   "startCommand": "cd backend && npx prisma migrate deploy && npx prisma db seed && npm start"
   ```

### Render.com

Similar a Railway:
- PostgreSQL automático
- Variable `RENDER` detectada automáticamente
- Migraciones en `render.yaml`

### Fly.io

```bash
# Crear PostgreSQL
fly postgres create --name zenith-db

# Conectar a la app
fly postgres attach --app zenith-erp-lacima

# Deploy
fly deploy
```

---

## 📁 Archivos de Configuración

### Archivos de Entorno

| Archivo | Uso | Base de Datos |
|---------|-----|---------------|
| `.env.local` | Desarrollo local | SQLite |
| `.env.production` | Producción nube | PostgreSQL |

### Scripts Disponibles

| Comando | Descripción | Ambiente |
|---------|-------------|----------|
| `npm run dev:local` | Servidor desarrollo | SQLite |
| `npm run dev` | Servidor producción | PostgreSQL |
| `npm run db:migrate:local` | Migraciones local | SQLite |
| `npm run db:migrate:prod` | Migraciones nube | PostgreSQL |
| `npm run db:seed:local` | Datos prueba local | SQLite |
| `npm run db:seed` | Datos prueba nube | PostgreSQL |
| `npm run db:reset:local` | Reset local | SQLite |
| `npm run db:studio` | Panel visual BD | Ambos |

---

## 🔌 Conexión Frontend ↔ Backend

### API Client (`frontend/public/js/api.js`)

El frontend detecta automáticamente si está en local o producción:

```javascript
class ZenithAPI {
  constructor() {
    // Detecta ambiente automáticamente
    this.isLocalhost = window.location.hostname === 'localhost';
    this.baseUrl = this.isLocalhost 
      ? 'http://localhost:3000/api'  // Local
      : '/api';                       // Producción
  }
}
```

### Páginas Conectadas:

| Página | Conectada a API | Funcionalidad |
|--------|-----------------|---------------|
| `auth/login.html` | ✅ | Login real con backend |
| `auth/crear_cuenta.html` | ✅ | Registro real |
| `auth/olvido_contraseña.html` | ✅ | Recuperación con aprobación |
| `auth/aprobacion-recuperacion.html` | ✅ | Panel admin |

### Cómo usar la API en el frontend:

```javascript
// Login
const response = await window.zenithApi.login(email, password);
window.zenithApi.setToken(response.data.token);

// Obtener usuarios (admin)
const users = await window.zenithApi.getUsers();

// Crear producto
const product = await window.zenithApi.createProduct({
  name: 'Producto',
  sku: 'SKU-001',
  price: 100,
  stock: 50
});
```

---

## 🔧 Solución de Problemas

### Error: "DATABASE_URL no está configurada"

**En local:**
```bash
# Copiar configuración local
cp backend/.env.local backend/.env
```

**En la nube:**
- Railway/Render generan `DATABASE_URL` automáticamente
- Si falta, añadir manualmente en el dashboard

### Error: "Prisma Client not generated"

```bash
cd backend
npm run db:generate
```

### Error: "No se puede conectar al backend"

1. Verificar que el backend está corriendo:
   ```bash
   npm run dev:local
   ```

2. Verificar CORS en backend (`backend/.env.local`):
   ```env
   FRONTEND_URL=http://localhost:5500
   CORS_ORIGINS=http://localhost:5500,http://localhost:3000
   ```

### Error: "Tabla no existe"

```bash
# Local
npm run db:migrate:local

# Nube (se ejecuta automáticamente en deploy)
npm run db:migrate:prod
```

---

## 📊 Flujo de Datos

### Desarrollo Local:
```
Frontend (localhost:5500)
    ↓
Backend API (localhost:3000)
    ↓
SQLite (backend/prisma/dev.db)
```

### Producción Nube:
```
Frontend (tu-dominio.com)
    ↓
Backend API (railway.app / render.com)
    ↓
PostgreSQL (gestionado por la plataforma)
```

---

## 🔐 Seguridad

### Tokens JWT

- Se almacenan en `localStorage` (`auth_token`)
- Se envían en header: `Authorization: Bearer <token>`
- Expiran según `JWT_EXPIRE` (default: 24h)

### Roles de Usuario

| Rol | Acceso |
|-----|--------|
| `ADMIN` | Acceso total |
| `MANAGER` | CRUD productos, ventas, inventario |
| `EMPLOYEE` | Lectura y operaciones básicas |
| `USER` | Solo catálogo público |

---

**Última actualización:** Abril 2026  
**Zenith ERP - Mayor de Repuesto La Cima, C.A.**
