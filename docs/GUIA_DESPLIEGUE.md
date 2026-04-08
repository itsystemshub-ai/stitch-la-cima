# Guía de Despliegue en la Nube
## Zenith ERP - Mayor de Repuesto La Cima, C.A.

---

## 📋 Resumen del Sistema

**Backend:** Node.js + Express.js + Prisma (PostgreSQL)  
**Frontend:** HTML/CSS/JS estático con Tailwind CSS  
**API:** REST con autenticación JWT  
**Base de Datos:** PostgreSQL (producción) / SQLite (desarrollo)

---

## 🚀 Opción 1: Railway.app (RECOMENDADO - Más Fácil)

### Ventajas:
- ✅ Despliegue automático desde GitHub
- ✅ PostgreSQL incluido automáticamente
- ✅ $5 de crédito gratis cada mes
- ✅ Sin necesidad de Docker
- ✅ Funciona en 5 minutos

### Pasos:

#### 1. Preparar el repositorio
```bash
# Asegúrate de que tu código esté en GitHub
git add .
git commit -m "Preparado para despliegue en Railway"
git push
```

#### 2. Crear cuenta en Railway
1. Ve a [railway.app](https://railway.app)
2. Click en "Start a New Project"
3. Selecciona "Deploy from GitHub repo"
4. Autoriza Railway a acceder a tu repositorio
5. Selecciona el repositorio `stitch la cima`

#### 3. Configurar la base de datos
1. En el dashboard de Railway, click en "+ New"
2. Selecciona "Database" > "Add PostgreSQL"
3. Railway crea automáticamente la variable `DATABASE_URL`

#### 4. Configurar variables de entorno
En el servicio del backend (en Railway), añade:
```
NODE_ENV=production
JWT_SECRET=<genera uno seguro, ver abajo>
FRONTEND_URL=https://tu-frontend.railway.app
```

**Generar JWT_SECRET seguro:**
```bash
node -e "console.log(require('crypto').randomBytes(64).toString('hex'))"
```

#### 5. Desplegar
Railway detecta automáticamente el `railway.json` y despliega.  
El despliegue tarda ~2-3 minutos.

#### 6. Verificar
Visita: `https://tu-backend.railway.app/api/health`

Deberías ver:
```json
{
  "status": "ok",
  "timestamp": "2026-04-07T...",
  "uptime": 123.456,
  "environment": "production"
}
```

---

## 🎨 Opción 2: Render.com

### Ventajas:
- ✅ Capa gratuita generosa
- ✅ PostgreSQL incluido
- ✅ HTTPS automático
- ✅ Despliegue desde GitHub

### Pasos:

#### 1. Crear cuenta en Render
1. Ve a [render.com](https://render.com)
2. Sign up con GitHub
3. Click en "New +" > "Blueprint"
4. Selecciona tu repositorio

#### 2. El blueprint detecta automáticamente `render.yaml`
Render configurará:
- Servicio de backend
- Base de datos PostgreSQL
- Variables de entorno automáticas

#### 3. Personalizar variables de entorno
En el dashboard de Render, añade:
```
JWT_SECRET=<tu secreto seguro>
NODE_ENV=production
```

#### 4. Desplegar
Click en "Apply" y espera ~3-5 minutos.

---

## 🪂 Opción 3: Fly.io

### Ventajas:
- ✅ Más control sobre infraestructura
- ✅ 3 VMs gratis (256MB RAM cada una)
- ✅ PostgreSQL incluido
- ✅ Distribución global

### Pasos:

#### 1. Instalar Fly CLI
```bash
# Windows (PowerShell)
iwr https://fly.io/install.ps1 -useb | iex

# O con npm
npm install -g @flydotio/flyctl
```

#### 2. Crear cuenta y login
```bash
fly auth signup
# o si ya tienes cuenta:
fly auth login
```

#### 3. Inicializar la aplicación
```bash
cd "backend"
fly launch --name zenith-erp-lacima
```

#### 4. Crear base de datos PostgreSQL
```bash
fly postgres create --name zenith-db
fly postgres attach --app zenith-erp-lacima
```

#### 5. Configurar variables de entorno
```bash
fly secrets set JWT_SECRET=<tu-secreto>
fly secrets set NODE_ENV=production
```

#### 6. Desplegar
```bash
fly deploy
```

---

## 🗄️ Base de Datos - Migraciones

### Ejecutar migraciones (primera vez):
```bash
cd backend
npx prisma migrate deploy
npx prisma db seed
```

### En producción (Railway/Render):
Se ejecutan automáticamente gracias a los scripts configurados.

### Ver datos en la base de datos:
```bash
npx prisma studio
```
Abre un panel web en `http://localhost:5555`

---

## 🔑 Credenciales por Defecto (después del seed)

| Rol | Email | Contraseña |
|-----|-------|------------|
| Admin | admin@lacima.com | admin123 |
| Manager | manager@lacima.com | manager123 |
| Usuario | usuario@lacima.com | user123 |

**⚠️ IMPORTANTE: Cambiar todas las contraseñas después del primer login!**

---

## 📊 Endpoints de la API

### Salud del sistema
```
GET /api/health
```

### Autenticación
```
POST /api/auth/register
POST /api/auth/login
POST /api/auth/logout
```

### Productos
```
GET    /api/products          (público)
GET    /api/products/:id      (público)
POST   /api/products          (ADMIN, MANAGER)
PUT    /api/products/:id      (ADMIN, MANAGER)
DELETE /api/products/:id      (ADMIN)
```

### Inventario
```
GET  /api/inventory/kardex/:id     (autenticado)
POST /api/inventory/add-stock      (ADMIN, MANAGER)
```

### Ventas
```
POST /api/sales        (autenticado)
GET  /api/sales        (ADMIN, MANAGER)
```

---

## 🛠️ Comandos Útiles

### Desarrollo local
```bash
# Instalar dependencias
cd backend && npm install

# Generar cliente Prisma
npx prisma generate

# Ejecutar migraciones
npx prisma migrate dev

# Poblar base de datos
npm run db:seed

# Iniciar servidor
npm run dev
```

### Producción
```bash
# Instalar dependencias (producción)
npm ci --production

# Ejecutar migraciones
npx prisma migrate deploy

# Poblar base de datos
npm run db:seed

# Iniciar servidor
npm start
```

---

## 📝 Estructura de Archivos de Despliegue

| Archivo | Propósito |
|---------|-----------|
| `railway.json` | Configuración para Railway.app |
| `render.yaml` | Configuración para Render.com |
| `fly.toml` | Configuración para Fly.io |
| `Procfile` | Configuración para Heroku/Render |
| `.env.production` | Plantilla de variables de producción |

---

## 🐛 Troubleshooting

### Error: "Database URL not found"
- Railway/Render generan `DATABASE_URL` automáticamente
- Si falta, añade manualmente en el dashboard

### Error: "JWT_SECRET not found"
- Genera uno nuevo: `node -e "console.log(require('crypto').randomBytes(64).toString('hex'))"`
- Añádelo como variable de entorno

### Error: "Port already in use"
- En nube, usa siempre `process.env.PORT`
- El código ya está configurado para esto

### Error: "Prisma Client not generated"
```bash
npx prisma generate
```

---

## 📞 Soporte

- Documentación Railway: [docs.railway.app](https://docs.railway.app)
- Documentación Render: [render.com/docs](https://render.com/docs)
- Documentación Prisma: [prisma.io/docs](https://prisma.io/docs)

---

*Última actualización: 7 de abril de 2026*
