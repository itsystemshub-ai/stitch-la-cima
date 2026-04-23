# Arquitectura del Sistema Stitch La Cima ERP

## Visión General

Stitch La Cima es un sistema ERP (Enterprise Resource Planning) desarrollado con Laravel 12, diseñado para gestion empresarial integral con módulos de ventas, inventario, contabilidad, recursos humanos, compras y finanzas.

## Stack Tecnológico

### Backend
- **Framework**: Laravel 12.x
- **PHP**: 8.2+
- **Base de Datos**: SQLite (desarrollo), MySQL (producción)
- **Cache**: Redis (Predis client)
- **Autenticación**: Laravel Sanctum para API
- **Colas**: Database (desarrollo), Redis (producción)

### Frontend
- **Templates**: Blade con Alpine.js
- **Estilos**: TailwindCSS v4.0.0
- **Interactividad**: 
  - GridStack v11.x (drag & drop)
  - ApexCharts (gráficos)
  - Driver.js (tours interactivos)
  - Alpine.js v3.x

### Herramientas de Desarrollo
- **Testing**: PHPUnit 11.5
- **CI/CD**: GitHub Actions
- **Monitoreo**: Laravel Telescope
- **Logging**: Spatie Activity Log
- **Backups**: Spatie Backup

## Estructura de Módulos

### 1. Ventas (Sales)
```
app/
├── Models/Sale.php
├── Http/Controllers/SalesController.php
├── Services/SalesService.php
└── Observers/SaleObserver.php
```

**Funcionalidades**:
- Punto de venta (POS)
- Facturación electrónica
- Gestión de clientes
- Reportes de ventas
- Notas de crédito

### 2. Inventario (Inventory)
```
app/
├── Models/Product.php
├── Models/StockMovement.php
├── Http/Controllers/InventoryController.php
├── Services/InventoryService.php
└── Observers/StockMovementObserver.php
```

**Funcionalidades**:
- Control de stock en tiempo real
- Movimientos de inventario
- Auditoría de stock
- Kardex de productos
- Valoración de inventario

### 3. Contabilidad (Accounting)
```
app/
├── Models/Account.php
├── Models/Transaction.php
├── Services/AccountingService.php
└── Reports/
```

**Funcionalidades**:
- Plan de cuentas
- Asientos contables
- Balances y estados financieros
- Reportes fiscales
- Conciliación bancaria

### 4. Recursos Humanos (HR)
```
app/
├── Models/Employee.php
├── Models/Payroll.php
└── Services/HrService.php
```

**Funcionalidades**:
- Gestión de empleados
- Nómina automatizada
- Control de asistencia
- Evaluación de desempeño
- Beneficios y deducciones

### 5. Compras (Purchases)
```
app/
├── Models/Supplier.php
├── Models/PurchaseOrder.php
└── Services/PurchaseService.php
```

**Funcionalidades**:
- Gestión de proveedores
- Órdenes de compra
- Recepción de mercancía
- Control de costos
- Análisis de proveedores

### 6. Finanzas (Finance)
```
app/
├── Models/FixedAsset.php
├── Models/TaxReturn.php
└── Services/FinanceService.php
```

**Funcionalidades**:
- Cuentas por cobrar
- Cuentas por pagar
- Activos fijos
- Declaraciones fiscales
- Flujo de caja

## Patrones de Diseño

### Service Layer
Ubicación: `app/Services/`
- Encapsula lógica de negocio compleja
- Ejemplo: `InventoryService`, `PaymentService`

### Observer Pattern
Ubicación: `app/Observers/`
- Reacciona a eventos de modelos
- Ejemplo: `StockMovementObserver` actualiza stock automáticamente

### Repository Pattern
Opcional, ubicación: `app/Repositories/`
- Abstracción de acceso a datos
- Facilita testing y mantenimiento

## Flujo de Datos

### Request → Response
```
User Request
    ↓
Middleware (SecurityHeaders, Auth, Throttle)
    ↓
Routes (web.php / api.php)
    ↓
Controllers (validación, autorización)
    ↓
Services (lógica de negocio)
    ↓
Models (Eloquent ORM)
    ↓
Database (SQLite/MySQL)
    ↓
Response (Blade view / JSON API)
```

## Seguridad

### Middleware Implementados
1. **SecurityHeadersMiddleware**: Headers de seguridad HTTP
2. **AuthMiddleware**: Autenticación ERP
3. **VerificarPermisoModulo**: Control de acceso por módulo
4. **Throttle**: Rate limiting en API

### Sanctum API Authentication
- Tokens personales para usuarios
- Tokens de máquina para APIs
- Middleware `auth:sanctum`

## Base de Datos

### Conexiones Configuradas
1. **SQLite**: Desarrollo local (`database/database.sqlite`)
2. **MySQL**: Producción (configurado en `.env`)
3. **Redis**: Cache y colas

### Migraciones Principales
- Users, Products, Customers, Orders
- StockMovements, Accounts, Employees
- Suppliers, PurchaseOrders, FixedAssets
- TaxReturns, ActivityLog

## Cache y Rendimiento

### Estrategia de Cache
1. **Configuración**: `php artisan config:cache`
2. **Rutas**: `php artisan route:cache`
3. **Vistas**: `php artisan view:cache`
4. **Consultas**: Cache de resultados frecuentes con Redis

### Redis
- **Default**: Session storage
- **Cache**: Application cache
- **Queue**: Job processing (producción)

## Testing

### Estructura
```
tests/
├── Feature/
│   ├── UserTest.php
│   ├── ProductTest.php
│   └── OrderTest.php
├── Unit/
│   ├── Services/
│   └── Models/
└── TestCase.php
```

### Comandos
- `php artisan test` - Ejecutar todas las pruebas
- `php artisan test --coverage` - Con cobertura
- `php artisan test --filter=UserTest` - Prueba específica

## CI/CD Pipeline

### GitHub Actions (`.github/workflows/ci.yml`)
1. **test job**: Ejecuta migraciones, build assets, run tests
2. **security job**: PHP CS Fixer, composer audit

### Despliegue
- **Desarrollo**: `composer install && npm run dev`
- **Producción**: `composer install --no-dev && npm run build`

## Monitoreo y Logs

### Laravel Telescope
- Acceso: `/telescope`
- Funcionalidades: Requests, commands, logs, queries, exceptions

### Spatie Activity Log
- Registro de actividad de usuarios
- Auditoría de cambios en modelos
- Tabla: `activity_log`

### Spatie Backup
- Respaldos automáticos de BD y archivos
- Almacenamiento local o en la nube
- Comando: `php artisan backup:run`

## Internacionalización (En Progreso)

### Estructura `resources/lang/`
```
resources/lang/
├── en/
│   ├── messages.php
│   ├── validation.php
│   └── pagination.php
└── es/
    ├── messages.php
    ├── validation.php
    └── pagination.php
```

Configurado en `config/app.php`:
- `locale`: es (español por defecto)
- `fallback_locale`: en (inglés como respaldo)

## APIs y Integraciones

### API Endpoints (En Desarrollo)
```
/api/v1/
├── products
├── customers
├── orders
├── inventory
└── reports
```

### Documentación API
Recomendado: Swagger/OpenAPI o Scribe para documentación automática

## Escalabilidad

### Horizontally Scalable
- Stateless API con Sanctum tokens
- Redis para sesiones y cache compartido
- File storage en servicios como S3 (opcional)

### Performance
- Eager loading para evitar N+1 queries
- Cache de consultas costosas
- Queue jobs para procesamiento asíncrono
- Database indexing en campos frecuentes

## Roadmap Futuro

### Corto Plazo
- [ ] Completar cobertura de tests > 80%
- [ ] Implementar API REST completa
- [ ] Documentación con Scribe
- [ ] Dashboard en tiempo real con WebSockets

### Mediano Plazo
- [ ] Migración a Inertia.js + Vue/React
- [ ] Implementar multi-tenancy
- [ ] Integración con pasarelas de pago
- [ ] App móvil (React Native/Flutter)

### Largo Plazo
- [ ] Microservicios para módulos críticos
- [ ] Machine Learning para predicciones
- [ [ ] Expansión internacional (multi-moneda, multi-idioma)
- [ ] Marketplace de integraciones

## Conclusión

Stitch La Cima es un ERP robusto y escalable que sigue las mejores prácticas de Laravel. La arquitectura está diseñada para facilitar el mantenimiento y la extensión futura, con una clara separación de responsabilidades y uso de patrones de diseño probados.
