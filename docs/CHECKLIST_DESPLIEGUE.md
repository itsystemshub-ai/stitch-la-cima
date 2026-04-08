# ✅ Checklist de Despliegue
## Zenith ERP - Mayor de Repuesto La Cima, C.A.

---

## 📋 Antes del Despliegue

### Código
- [ ] Todo el código está commiteado
- [ ] Push a GitHub completado
- [ ] No hay archivos `.env` con secretos en el repo
- [ ] `.gitignore` está configurado correctamente

### Base de Datos
- [ ] Schema de Prisma actualizado (`backend/prisma/schema.prisma`)
- [ ] Migraciones creadas (`backend/prisma/migrations/`)
- [ ] Seed script funcionando (`backend/database/seeders/seed.js`)

### Configuración
- [ ] `railway.json` presente (si usas Railway)
- [ ] `render.yaml` presente (si usas Render)
- [ ] `fly.toml` presente (si usas Fly.io)
- [ ] `Procfile` presente

---

## 🚀 Despliegue en Railway.app

### 1. Preparación
- [ ] Cuenta en Railway.app creada
- [ ] GitHub conectado a Railway
- [ ] Repositorio seleccionado

### 2. Base de Datos
- [ ] PostgreSQL añadido desde el dashboard de Railway
- [ ] `DATABASE_URL` configurada automáticamente

### 3. Variables de Entorno
- [ ] `NODE_ENV=production`
- [ ] `JWT_SECRET` generado y configurado
- [ ] `FRONTEND_URL` configurado (si aplica)
- [ ] `CORS_ORIGINS` configurado (si aplica)

### 4. Despliegue
- [ ] Deploy iniciado
- [ ] Build completado sin errores
- [ ] Migraciones ejecutadas
- [ ] Seed ejecutado (datos iniciales creados)

### 5. Verificación
- [ ] Health check responde: `https://tu-app.railway.app/api/health`
- [ ] Login funciona con credenciales por defecto
- [ ] API endpoints responden correctamente

---

## 🎨 Despliegue en Render.com

### 1. Preparación
- [ ] Cuenta en Render.com creada
- [ ] GitHub conectado a Render

### 2. Blueprint
- [ ] Repositorio seleccionado
- [ ] `render.yaml` detectado automáticamente

### 3. Base de Datos
- [ ] PostgreSQL configurado
- [ ] `DATABASE_URL` enlazada

### 4. Variables de Entorno
- [ ] `NODE_ENV=production`
- [ ] `JWT_SECRET` generado y configurado
- [ ] `FRONTEND_URL` configurado

### 5. Despliegue
- [ ] Deploy iniciado
- [ ] Build completado
- [ ] Servicios corriendo

### 6. Verificación
- [ ] Health check responde
- [ ] Login funciona
- [ ] API funcional

---

## 🪂 Despliegue en Fly.io

### 1. Preparación
- [ ] Fly CLI instalado
- [ ] Cuenta creada
- [ ] Login completado (`fly auth login`)

### 2. Inicialización
- [ ] `fly launch` ejecutado
- [ ] Aplicación creada

### 3. Base de Datos
- [ ] PostgreSQL creado (`fly postgres create`)
- [ ] BD conectada a la app (`fly postgres attach`)

### 4. Variables de Entorno
- [ ] `JWT_SECRET` configurado
- [ ] `NODE_ENV=production`
- [ ] `DATABASE_URL` automática

### 5. Despliegue
- [ ] `fly deploy` ejecutado
- [ ] Deploy exitoso

### 6. Verificación
- [ ] App accesible: `fly open`
- [ ] Health check responde
- [ ] API funcional

---

## 🔐 Seguridad Post-Despliegue

### Obligatorio
- [ ] Cambiar contraseña de admin por defecto
- [ ] Cambiar contraseña de manager por defecto
- [ ] Cambiar contraseña de usuario por defecto
- [ ] Verificar que `JWT_SECRET` es único y seguro
- [ ] CORS configurado solo para dominios permitidos

### Recomendado
- [ ] HTTPS forzado activado
- [ ] Rate limiting verificado
- [ ] Logs accesibles y monitoreados
- [ ] Backups de BD configurados

---

## 📊 Monitoreo

### Primeras 24 Horas
- [ ] Revisar logs de errores
- [ ] Verificar uso de memoria/CPU
- [ ] Comprobar tiempos de respuesta
- [ ] Validar que no hay crashes

### Continuo
- [ ] Health check monitoreado
- [ ] Logs revisados periódicamente
- [ ] Backups verificados
- [ ] Uso de BD monitoreado

---

## 🎯 Funcionalidades a Verificar

### API
- [ ] `POST /api/auth/register` - Registro
- [ ] `POST /api/auth/login` - Login
- [ ] `GET /api/products` - Listar productos
- [ ] `POST /api/products` - Crear producto
- [ ] `POST /api/sales` - Crear venta
- [ ] `GET /api/health` - Health check

### Base de Datos
- [ ] Usuarios creados por seed
- [ ] Productos creados por seed
- [ ] Categorías creadas por seed
- [ ] Empleados creados por seed

### Frontend (si está desplegado)
- [ ] Página principal carga
- [ ] Catálogo visible
- [ ] Login funciona
- [ ] Carrito funciona
- [ ] Checkout completa

---

## 📝 Documentación

- [ ] README.md actualizado
- [ ] GUIA_DESPLIEGUE.md revisado
- [ ] Variables de entorno documentadas
- [ ] API endpoints documentados
- [ ] Credenciales por defecto compartidas

---

## ✅ Firma de Completado

**Desplegado por:** _____________________  
**Fecha:** _____________________  
**Plataforma:** Railway / Render / Fly.io  
**URL Producción:** _____________________  
**Notas:** _____________________

---

*Checklist creado el 7 de abril de 2026*
