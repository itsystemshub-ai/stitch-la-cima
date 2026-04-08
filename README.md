# Zenith ERP - Mayor de Repuesto La Cima, C.A.

> Sistema integral de gestión empresarial y e-commerce para distribución de repuestos industriales

**RIF:** J-40308741-5 | **Ubicación:** Valencia, Venezuela

[![Node.js Version](https://img.shields.io/badge/node-%3E%3D18.0.0-brightgreen)](https://nodejs.org/)
[![License](https://img.shields.io/badge/license-Private-blue)]()
[![Database](https://img.shields.io/badge/database-PostgreSQL-blue)](https://www.postgresql.org/)
[![ORM](https://img.shields.io/badge/orm-Prisma-blue)](https://www.prisma.io/)

---

## 📋 Descripción

Sistema ERP (Enterprise Resource Planning) y plataforma e-commerce B2B/B2C para la empresa **Mayor de Repuesto La Cima, C.A.**, especializada en la distribución de repuestos automotrices industriales.

### Módulos Incluidos

| Módulo | Funcionalidades |
|--------|----------------|
| **E-Commerce** | Catálogo, carrito, checkout, órdenes |
| **Inventario** | Gestión de stock, kardex, importaciones CSV |
| **Punto de Venta** | POS integrado con facturación |
| **Facturación** | Facturación electrónica digital |
| **Recursos Humanos** | Gestión de empleados y nómina |
| **Contabilidad** | Finanzas y reportes contables |
| **Reportes** | Dashboard analítico y métricas |

---

## 🏗️ Arquitectura

### Stack Tecnológico

**Backend:**
- Node.js + Express.js
- Prisma ORM (PostgreSQL)
- JWT Authentication
- Socket.IO (real-time)
- Winston (logging)

**Frontend:**
- HTML5 + Tailwind CSS
- JavaScript Vanilla
- PWA (Progressive Web App)
- Service Workers

### Estructura del Proyecto

```
stitch-la-cima/
├── backend/                 # API REST + Servidor
│   ├── prisma/
│   │   ├── schema.prisma   # Esquema de base de datos
│   │   └── migrations/     # Migraciones
│   ├── src/
│   │   ├── app.js          # Entry point
│   │   ├── config/         # Configuración
│   │   ├── controllers/    # Controladores
│   │   ├── routes/         # Rutas API
│   │   ├── middleware/     # Auth, validación
│   │   └── services/       # Lógica de negocio
│   └── database/
│       └── seeders/        # Datos iniciales
├── frontend/               # Interaz de usuario
│   └── public/
│       ├── ecommerce/      # Páginas de e-commerce
│       ├── erp/            # Dashboard ERP
│       └── js/
│           └── api.js      # Cliente API
├── docs/                   # Documentación
│   └── GUIA_DESPLIEGUE.md  # Guía de despliegue
├── railway.json           # Config Railway.app
├── render.yaml            # Config Render.com
└── fly.toml               # Config Fly.io
```

---

## 🚀 Inicio Rápido

### Requisitos

- Node.js >= 18.0.0
- npm >= 9.0.0
- PostgreSQL (para producción) o SQLite (para desarrollo)

### Instalación Local

#### Opción 1: Script Automático (Recomendado)

**Windows:**
```bash
deploy.bat
```

**Linux/Mac:**
```bash
chmod +x deploy.sh
./deploy.sh
```

#### Opción 2: Manual

```bash
# 1. Clonar repositorio
git clone <tu-repo>
cd "stitch la cima"

# 2. Instalar dependencias del backend
cd backend
npm install

# 3. Configurar base de datos
# Para desarrollo con SQLite (automático)
npx prisma db push

# O para PostgreSQL
# Crea archivo .env con tu DATABASE_URL

# 4. Ejecutar migraciones
npx prisma migrate dev

# 5. Poblar base de datos
npm run db:seed

# 6. Iniciar servidor
npm run dev
```

### Acceder al Sistema

- **API:** http://localhost:3000/api
- **Health Check:** http://localhost:3000/api/health
- **Prisma Studio:** `npx prisma studio` → http://localhost:5555

### Credenciales por Defecto

| Rol | Email | Contraseña |
|-----|-------|------------|
| Admin | admin@lacima.com | admin123 |
| Manager | manager@lacima.com | manager123 |
| Usuario | usuario@lacima.com | user123 |

⚠️ **¡IMPORTANTE!** Cambiar todas las contraseñas después del primer login.

---

## 🌐 Despliegue en la Nube

### Opciones Disponibles

| Plataforma | Dificultad | Costo | PostgreSQL |
|------------|------------|-------|------------|
| **Railway.app** | ⭐ Muy Fácil | Gratis (~$5/mes) | ✅ Incluido |
| **Render.com** | ⭐⭐ Fácil | Gratis | ✅ Incluido |
| **Fly.io** | ⭐⭐⭐ Media | Gratis (3 VMs) | ✅ Incluido |

### Despliegue en Railway (5 minutos)

1. Ve a [railway.app](https://railway.app)
2. Click en "Deploy from GitHub repo"
3. Selecciona tu repositorio
4. Añade PostgreSQL desde el dashboard
5. Configura `JWT_SECRET` (genera uno seguro)
6. ¡Listo! Railway despliega automáticamente

**Guía completa:** [docs/GUIA_DESPLIEGUE.md](docs/GUIA_DESPLIEGUE.md)

---

## 📡 API Endpoints

### Autenticación
```
POST /api/auth/register   # Registrar usuario
POST /api/auth/login      # Iniciar sesión
POST /api/auth/logout     # Cerrar sesión
```

### Productos
```
GET    /api/products          # Listar productos
GET    /api/products/:id      # Obtener producto
POST   /api/products          # Crear producto (ADMIN, MANAGER)
PUT    /api/products/:id      # Actualizar (ADMIN, MANAGER)
DELETE /api/products/:id      # Eliminar (ADMIN)
```

### Inventario
```
GET  /api/inventory/kardex/:id     # Ver kardex
POST /api/inventory/add-stock      # Agregar stock
```

### Ventas
```
POST /api/sales        # Crear venta
GET  /api/sales        # Listar ventas (ADMIN, MANAGER)
```

### Salud del Sistema
```
GET /api/health        # Health check
```

**Documentación completa:** Ver controladores en `backend/src/controllers/`

---

## 🗄️ Base de Datos

### Modelos

- **User** - Usuarios del sistema
- **Product** - Catálogo de productos
- **Category** - Categorías de productos
- **InventoryLog** - Registro de movimientos
- **Sale** - Ventas realizadas
- **SaleItem** - Detalle de ventas
- **Employee** - Registro de empleados
- **Payroll** - Nómina

### Comandos de Base de Datos

```bash
# Ver esquema
npx prisma db pull

# Generar cliente
npx prisma generate

# Crear migración
npx prisma migrate dev --name nombre_migracion

# Aplicar migraciones (producción)
npx prisma migrate deploy

# Poblar datos
npm run db:seed

# Resetear base de datos
npm run db:reset

# Abrir panel de administración
npx prisma studio
```

---

## 🛠️ Scripts Disponibles

```bash
npm run dev              # Servidor desarrollo (nodemon)
npm start                # Servidor producción
npm run db:generate      # Generar Prisma Client
npm run db:migrate       # Crear migración (dev)
npm run db:migrate:deploy # Aplicar migraciones (prod)
npm run db:seed          # Poblar base de datos
npm run db:reset         # Resetear base de datos
npm run db:studio        # Abrir Prisma Studio
npm test                 # Ejecutar tests
npm run lint             # Verificar código
```

---

## 🔒 Seguridad

- ✅ Autenticación JWT
- ✅ Hash de contraseñas (bcrypt)
- ✅ Rate limiting
- ✅ Helmet.js (headers seguros)
- ✅ CORS configurado
- ✅ Validación de entradas
- ✅ Sanitización de datos

### Variables de Entorno

Crear archivo `backend/.env`:

```env
NODE_ENV=development
PORT=3000
DATABASE_URL=postgresql://usuario:password@localhost:5432/zenith_erp
JWT_SECRET=<generar_secreto_seguro>
JWT_EXPIRE=24h
FRONTEND_URL=http://localhost:5500
```

**Generar JWT_SECRET:**
```bash
node -e "console.log(require('crypto').randomBytes(64).toString('hex'))"
```

---

## 📊 Monitoreo

### Logs
```
backend/logs/
├── error.log       # Solo errores
└── combined.log    # Todos los eventos
```

### Health Check
```bash
curl http://localhost:3000/api/health
```

Respuesta:
```json
{
  "status": "ok",
  "timestamp": "2026-04-07T...",
  "uptime": 123.456,
  "environment": "production",
  "version": "1.0.0"
}
```

---

## 📖 Documentación Adicional

- [Guía de Despliegue](docs/GUIA_DESPLIEGUE.md) - Instrucciones detalladas para nube
- [Auditoría de Errores](docs/AUDITORIA_ERRORES.md) - Historial de fixes
- [Auditoría de Soluciones](docs/AUDITORIA_SOLUCIONES.md) - Mejoras aplicadas

---

## 🧪 Testing

```bash
# Ejecutar todos los tests
npm test

# Modo watch
npm run test:watch

# Con cobertura
npm test -- --coverage
```

---

## 🤝 Contribuir

1. Crear rama feature (`git checkout -b feature/nueva-funcionalidad`)
2. Commit cambios (`git commit -m 'Add: nueva funcionalidad'`)
3. Push a la rama (`git push origin feature/nueva-funcionalidad`)
4. Abrir Pull Request

---

## 📄 Licencia

Proyecto privado - Mayor de Repuesto La Cima, C.A.

Todos los derechos reservados.

---

## 📞 Soporte

Para problemas o consultas:
- Revisar logs en `backend/logs/`
- Verificar health check: `/api/health`
- Ejecutar `npx prisma studio` para inspeccionar BD

---

**Desarrollado para Mayor de Repuesto La Cima, C.A.**  
Valencia, Venezuela 🇻🇪  
Última actualización: Abril 2026
