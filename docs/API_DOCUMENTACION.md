# Documentación de API - Zenith ERP

## Mayor de Repuesto La Cima, C.A.

**Sistema Integral de Gestión Empresarial (ERP)**
**Versión:** 1.0.0-zenith

---

## Tabla de Contenidos

1. [Información General](#información-general)
2. [Autenticación](#autenticación)
3. [Módulo de Autenticación](#módulo-de-autenticación)
4. [Módulo de Inventario y Productos](#módulo-de-inventario-y-productos)
5. [Módulo de Ventas y POS](#módulo-de-ventas-y-pos)
6. [Módulo de Compras](#módulo-de-compras)
7. [Módulo de RRHH y Nómina](#módulo-de-rrhh-y-nómina)
8. [Módulo de Contabilidad](#módulo-de-contabilidad)
9. [Módulo de Finanzas](#módulo-de-finanzas)
10. [Módulo de Configuración del Sistema](#módulo-de-configuración-del-sistema)
11. [Códigos de Error](#códigos-de-error)
12. [Rate Limiting](#rate-limiting)
13. [Ejemplos de Código](#ejemplos-de-código)

---

## Información General

| Parámetro | Valor |
|-----------|-------|
| **Base URL** | `https://tu-api.aqui.com/api` |
| **Autenticación** | JWT Bearer Token |
| **Formato de Datos** | JSON |
| **Codificación** | UTF-8 |
| **Métodos HTTP** | GET, POST, PUT, DELETE |
| **Entorno** | Producción / Desarrollo |

### Convenciones

- Todas las respuestas siguen el formato: `{ "status": "success" | "error", "data": {...}, "message": "..." }`
- Los errores devuelven `{ "status": "error", "message": "Descripción del error" }`
- La paginación usa los parámetros `page` y `limit`
- Las fechas siguen el formato ISO 8601 (`YYYY-MM-DDTHH:mm:ss.sssZ`)
- Los montos monetarios están expresados en Bolívares (Bs.)

### Roles de Usuario

| Rol | Descripción |
|-----|-------------|
| `ADMIN` | Acceso completo a todos los módulos y operaciones administrativas |
| `MANAGER` | Acceso a operaciones de gestión, reportes y supervisión |
| `USER` | Acceso básico a operaciones de venta y consulta |

---

## Autenticación

### Cómo obtener un Token

Realice una solicitud POST al endpoint de login con sus credenciales:

```bash
POST /api/auth/login
Content-Type: application/json

{
  "email": "admin@lacima.com",
  "password": "su_contrasena"
}
```

### Cómo usar el Token

Incluya el token en el encabezado `Authorization` de cada solicitud:

```
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
```

### Cómo cerrar sesión

```bash
POST /api/auth/logout
```

### Validez del Token

- **Duración:** 24 horas
- **Tipo:** JWT (JSON Web Token)
- **Almacenamiento:** También se almacena en cookie HttpOnly

---

## Módulo de Autenticación

### POST /api/auth/register

Registra un nuevo usuario en el sistema. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "email": "nuevo@lacima.com",
  "password": "Contraseñ4Segur4!",
  "name": "Juan Pérez",
  "role": "USER"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
  "user": {
    "id": 5,
    "email": "nuevo@lacima.com",
    "role": "USER"
  }
}
```

**Respuesta de Error (400):**

```json
{
  "status": "error",
  "message": "Ya existe un usuario con ese correo electrónico"
}
```

---

### POST /api/auth/login

Autentica un usuario y devuelve un token JWT.

**Solicitud:**

```json
{
  "email": "admin@lacima.com",
  "password": "Contraseñ4Segur4!"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
  "user": {
    "id": 1,
    "email": "admin@lacima.com",
    "role": "ADMIN"
  }
}
```

**Respuesta de Error (401):**

```json
{
  "status": "error",
  "message": "Credenciales inválidas"
}
```

---

### POST /api/auth/logout

Cierra la sesión del usuario actual y elimina la cookie de autenticación.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "message": "Sesión cerrada correctamente"
}
```

---

## Módulo de Inventario y Productos

**Prefijo de ruta:** `/api/inventory` (productos: `/api/products`)

### GET /api/inventory/products

Lista todos los productos con filtros y paginación.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página (default: 1) | `1` |
| `limit` | number | Items por página (max: 100) | `20` |
| `category` | string | Filtrar por categoría | `Filtros` |
| `brand` | string | Filtrar por marca | `Bosch` |
| `search` | string | Buscar en nombre, SKU, descripción | `Filtro aceite` |
| `stockStatus` | string | Estado de stock: `in-stock`, `low-stock`, `out-of-stock` | `in-stock` |

**Ejemplo:**

```
GET /api/inventory/products?category=Filtros&stockStatus=in-stock&page=1&limit=20
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "products": [
      {
        "id": 1,
        "sku": "FA-BOSCH-001",
        "name": "Filtro de Aceite Bosch",
        "description": "Filtro de aceite compatible con motores diésel",
        "price": 450.00,
        "stock": 150,
        "category": "Filtros",
        "brand": "Bosch",
        "origin": "Alemania",
        "active": true,
        "createdAt": "2026-01-15T08:30:00.000Z"
      }
    ],
    "pagination": {
      "page": 1,
      "limit": 20,
      "total": 45,
      "totalPages": 3
    }
  }
}
```

---

### GET /api/inventory/products/:id

Obtiene un producto específico con su historial de movimientos de inventario.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 1,
    "sku": "FA-BOSCH-001",
    "name": "Filtro de Aceite Bosch",
    "description": "Filtro de aceite compatible con motores diésel",
    "price": 450.00,
    "stock": 150,
    "category": "Filtros",
    "brand": "Bosch",
    "origin": "Alemania",
    "active": true,
    "createdAt": "2026-01-15T08:30:00.000Z",
    "inventoryLogs": [
      {
        "id": 101,
        "type": "IN",
        "quantity": 50,
        "cost": 420.00,
        "reason": "Compra a proveedor Repuestos CA",
        "createdAt": "2026-03-20T10:15:00.000Z"
      },
      {
        "id": 98,
        "type": "OUT",
        "quantity": 10,
        "cost": 450.00,
        "reason": "Venta #234",
        "createdAt": "2026-03-19T14:30:00.000Z"
      }
    ]
  }
}
```

**Respuesta de Error (404):**

```json
{
  "status": "error",
  "message": "Producto no encontrado"
}
```

---

### POST /api/inventory/products

Crea un nuevo producto en el inventario. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "sku": "FA-BOSCH-002",
  "name": "Filtro de Aire Bosch",
  "description": "Filtro de aire para motores de gasolina",
  "price": 380.00,
  "stock": 100,
  "category": "Filtros",
  "brand": "Bosch",
  "origin": "Alemania"
}
```

**Campos Obligatorios:** `sku`, `name`, `price`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 46,
    "sku": "FA-BOSCH-002",
    "name": "Filtro de Aire Bosch",
    "description": "Filtro de aire para motores de gasolina",
    "price": 380.00,
    "stock": 100,
    "category": "Filtros",
    "brand": "Bosch",
    "origin": "Alemania",
    "active": true,
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T09:00:00.000Z"
  }
}
```

**Respuesta de Error (409):**

```json
{
  "status": "error",
  "message": "Ya existe un producto con ese SKU"
}
```

---

### PUT /api/inventory/products/:id

Actualiza un producto existente. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "name": "Filtro de Aire Bosch Premium",
  "price": 420.00
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 46,
    "sku": "FA-BOSCH-002",
    "name": "Filtro de Aire Bosch Premium",
    "description": "Filtro de aire para motores de gasolina",
    "price": 420.00,
    "stock": 100,
    "category": "Filtros",
    "brand": "Bosch",
    "origin": "Alemania",
    "active": true,
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T10:30:00.000Z"
  }
}
```

---

### DELETE /api/inventory/products/:id

Elimina un producto (eliminación lógica: establece `active = false`). Requiere rol ADMIN.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "message": "Producto desactivado correctamente"
}
```

---

### GET /api/inventory/products/low-stock

Obtiene productos con stock bajo o agotado.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Default |
|-----------|------|-------------|---------|
| `threshold` | number | Umbral mínimo de stock | `10` |

**Ejemplo:**

```
GET /api/inventory/products/low-stock?threshold=15
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "products": [
      {
        "id": 12,
        "sku": "COR-DAYCO-015",
        "name": "Correa Dentada Dayco",
        "stock": 3,
        "category": "Correas",
        "brand": "Dayco",
        "price": 890.00
      },
      {
        "id": 28,
        "sku": "BUJ-NGK-008",
        "name": "Bujía NGK Iridium",
        "stock": 8,
        "category": "Encendido",
        "brand": "NGK",
        "price": 120.00
      }
    ],
    "threshold": 15,
    "count": 2
  }
}
```

---

### GET /api/inventory/products/summary

Obtiene un resumen general del inventario con métricas clave.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "totalProducts": 342,
    "totalStockUnits": 15780,
    "totalInventoryValue": 4523890.50,
    "productsByCategory": {
      "Filtros": { "count": 85, "totalStock": 4200 },
      "Frenos": { "count": 62, "totalStock": 3100 },
      "Suspensión": { "count": 48, "totalStock": 2400 },
      "Motor": { "count": 72, "totalStock": 3600 },
      "Eléctrico": { "count": 75, "totalStock": 2480 }
    },
    "lowStockCount": 23,
    "outOfStockCount": 5
  }
}
```

---

### GET /api/inventory/kardex/:productId

Obtiene el kardex (historial de movimientos de inventario) de un producto.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | `2026-03-01` |
| `endDate` | date | Fecha de fin | `2026-03-31` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "product": {
      "id": 1,
      "name": "Filtro de Aceite Bosch",
      "sku": "FA-BOSCH-001",
      "stock": 150,
      "price": 450.00
    },
    "movements": [
      {
        "id": 50,
        "type": "IN",
        "quantity": 200,
        "cost": 420.00,
        "reason": "Compra inicial de inventario",
        "createdAt": "2026-01-15T08:30:00.000Z",
        "balance": 200
      },
      {
        "id": 75,
        "type": "OUT",
        "quantity": 30,
        "cost": 450.00,
        "reason": "Venta #120",
        "createdAt": "2026-02-10T11:00:00.000Z",
        "balance": 170
      },
      {
        "id": 98,
        "type": "OUT",
        "quantity": 10,
        "cost": 450.00,
        "reason": "Venta #234",
        "createdAt": "2026-03-19T14:30:00.000Z",
        "balance": 160
      },
      {
        "id": 101,
        "type": "IN",
        "quantity": 50,
        "cost": 420.00,
        "reason": "Compra a proveedor Repuestos CA",
        "createdAt": "2026-03-20T10:15:00.000Z",
        "balance": 210
      },
      {
        "id": 105,
        "type": "ADJUST",
        "quantity": 150,
        "cost": 450.00,
        "reason": "Ajuste de inventario por conteo físico",
        "createdAt": "2026-03-31T17:00:00.000Z",
        "balance": 150
      }
    ],
    "currentStock": 150,
    "totalMovements": 5
  }
}
```

---

### POST /api/inventory/stock/add

Agrega stock a un producto con registro automático en el kardex. Calcula el costo promedio ponderado. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "productId": 1,
  "quantity": 50,
  "cost": 420.00,
  "reason": "Compra a proveedor Repuestos CA - Factura #4521"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "previousStock": 150,
    "currentStock": 200,
    "newAverageCost": 427.50,
    "logId": 102
  }
}
```

---

### POST /api/inventory/stock/remove

Retira stock de un producto con registro automático. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "productId": 1,
  "quantity": 25,
  "reason": "Devolución a proveedor por defecto de fabricación"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "previousStock": 200,
    "currentStock": 175,
    "logId": 103
  }
}
```

**Respuesta de Error (400):**

```json
{
  "status": "error",
  "message": "Stock insuficiente. Stock actual: 175, solicitado: 200"
}
```

---

### POST /api/inventory/stock/adjust

Ajusta el stock de un producto a una cantidad específica. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "productId": 1,
  "newQuantity": 180,
  "reason": "Ajuste por conteo físico de inventario mensual"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "previousStock": 175,
    "currentStock": 180,
    "difference": 5,
    "logId": 104
  }
}
```

---

### GET /api/inventory/audit

Obtiene un reporte de auditoría de inventario con resumen de movimientos. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio del período | `2026-03-01` |
| `endDate` | date | Fecha de fin del período | `2026-03-31` |
| `category` | string | Filtrar por categoría | `Filtros` |
| `brand` | string | Filtrar por marca | `Bosch` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "audit": [
      {
        "id": 1,
        "sku": "FA-BOSCH-001",
        "name": "Filtro de Aceite Bosch",
        "stock": 150,
        "price": 450.00,
        "category": "Filtros",
        "brand": "Bosch",
        "totalValue": 67500.00,
        "movementSummary": {
          "in": 250,
          "out": 40,
          "adjustments": 1,
          "count": 5
        }
      }
    ],
    "summary": {
      "totalProducts": 342,
      "totalInventoryValue": 4523890.50,
      "totalMovements": 1247,
      "totalStockIn": 8500,
      "totalStockOut": 3200,
      "totalAdjustments": 15,
      "generatedAt": "2026-04-07T14:30:00.000Z",
      "dateRange": {
        "startDate": "2026-03-01",
        "endDate": "2026-03-31"
      }
    }
  }
}
```

---

## Módulo de Ventas y POS

**Prefijo de ruta:** `/api/sales`

### POST /api/sales

Crea una nueva venta con sus ítems, decrementa el inventario y procesa el pago.

**Solicitud:**

```json
{
  "items": [
    {
      "productId": 1,
      "quantity": 4,
      "price": 450.00
    },
    {
      "productId": 12,
      "quantity": 2,
      "price": 890.00
    }
  ],
  "paymentMethod": "EFECTIVO",
  "discount": 50.00,
  "paymentReference": "REF-20260407-001"
}
```

**Métodos de Pago válidos:** `EFECTIVO`, `TRANSFERENCIA`, `PUNTO_DE_VENTA`, `ZELLE`, `TARJETA`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 345,
    "invoiceNumber": "FAC-2026-0345",
    "subtotal": 3580.00,
    "tax": 572.80,
    "discount": 50.00,
    "total": 4102.80,
    "status": "COMPLETED",
    "paymentMethod": "EFECTIVO",
    "paymentReference": "REF-20260407-001",
    "userId": 1,
    "items": [
      {
        "id": 890,
        "productId": 1,
        "quantity": 4,
        "price": 450.00,
        "subtotal": 1800.00
      },
      {
        "id": 891,
        "productId": 12,
        "quantity": 2,
        "price": 890.00,
        "subtotal": 1780.00
      }
    ],
    "createdAt": "2026-04-07T10:15:00.000Z"
  }
}
```

---

### GET /api/sales

Lista todas las ventas con filtros y paginación.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |
| `status` | string | Estado: `COMPLETED`, `CANCELLED` | `COMPLETED` |
| `paymentMethod` | string | Método de pago | `EFECTIVO` |
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-07` |
| `search` | string | Buscar por factura o ID | `FAC-2026` |
| `userId` | number | Filtrar por vendedor | `3` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "sales": [
      {
        "id": 345,
        "invoiceNumber": "FAC-2026-0345",
        "subtotal": 3580.00,
        "tax": 572.80,
        "discount": 50.00,
        "total": 4102.80,
        "status": "COMPLETED",
        "paymentMethod": "EFECTIVO",
        "createdAt": "2026-04-07T10:15:00.000Z",
        "items": [
          {
            "productId": 1,
            "product": { "id": 1, "name": "Filtro de Aceite Bosch", "sku": "FA-BOSCH-001" },
            "quantity": 4,
            "price": 450.00,
            "subtotal": 1800.00
          }
        ],
        "user": { "id": 1, "name": "Admin Principal", "email": "admin@lacima.com" }
      }
    ],
    "pagination": {
      "total": 345,
      "page": 1,
      "limit": 20,
      "totalPages": 18
    }
  }
}
```

---

### GET /api/sales/:id

Obtiene el detalle completo de una venta.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 345,
    "invoiceNumber": "FAC-2026-0345",
    "subtotal": 3580.00,
    "tax": 572.80,
    "discount": 50.00,
    "total": 4102.80,
    "status": "COMPLETED",
    "paymentMethod": "EFECTIVO",
    "paymentReference": "REF-20260407-001",
    "createdAt": "2026-04-07T10:15:00.000Z",
    "items": [
      {
        "id": 890,
        "productId": 1,
        "quantity": 4,
        "price": 450.00,
        "subtotal": 1800.00,
        "product": { "id": 1, "name": "Filtro de Aceite Bosch", "sku": "FA-BOSCH-001", "price": 450.00 }
      }
    ],
    "user": { "id": 1, "name": "Admin Principal", "email": "admin@lacima.com" },
    "creditNotes": []
  }
}
```

---

### POST /api/sales/:id/cancel

Cancela una venta y restaura el inventario. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "reason": "Error en facturación - cliente solicitó anulación"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 345,
    "invoiceNumber": "FAC-2026-0345",
    "total": 4102.80,
    "status": "CANCELLED",
    "updatedAt": "2026-04-07T11:30:00.000Z"
  },
  "message": "Venta cancelada exitosamente"
}
```

---

### GET /api/sales/summary

Obtiene un resumen de ventas con métricas clave.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-07` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "totalSales": 345,
    "revenue": 1425680.50,
    "avgTicket": 4132.41,
    "topProducts": [
      {
        "productId": 1,
        "product": { "id": 1, "name": "Filtro de Aceite Bosch", "sku": "FA-BOSCH-001", "category": "Filtros" },
        "quantitySold": 245,
        "revenue": 110250.00,
        "timesSold": 89
      }
    ],
    "paymentMethodBreakdown": [
      { "method": "EFECTIVO", "count": 180, "total": 720450.00 },
      { "method": "TRANSFERENCIA", "count": 95, "total": 425230.50 },
      { "method": "PUNTO_DE_VENTA", "count": 70, "total": 280000.00 }
    ]
  }
}
```

---

### GET /api/sales/by-date

Obtiene ventas agrupadas por fecha para gráficos y reportes.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Default |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | - |
| `endDate` | date | Fecha de fin | - |
| `groupBy` | string | Agrupación: `day`, `week`, `month` | `day` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": [
    {
      "date": "2026-04-01",
      "totalSales": 25,
      "totalRevenue": 98750.00,
      "count": 25,
      "byPaymentMethod": {
        "EFECTIVO": { "count": 12, "total": 48000.00 },
        "TRANSFERENCIA": { "count": 8, "total": 32750.00 },
        "PUNTO_DE_VENTA": { "count": 5, "total": 18000.00 }
      }
    },
    {
      "date": "2026-04-02",
      "totalSales": 32,
      "totalRevenue": 125400.00,
      "count": 32,
      "byPaymentMethod": {
        "EFECTIVO": { "count": 15, "total": 60000.00 },
        "TRANSFERENCIA": { "count": 10, "total": 42400.00 },
        "PUNTO_DE_VENTA": { "count": 7, "total": 23000.00 }
      }
    }
  ]
}
```

---

### GET /api/sales/top-products

Obtiene los productos más vendidos.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Default |
|-----------|------|-------------|---------|
| `limit` | number | Cantidad de productos (max: 50) | `10` |
| `startDate` | date | Fecha de inicio | - |
| `endDate` | date | Fecha de fin | - |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": [
    {
      "productId": 1,
      "product": {
        "id": 1,
        "name": "Filtro de Aceite Bosch",
        "sku": "FA-BOSCH-001",
        "category": "Filtros",
        "brand": "Bosch",
        "price": 450.00,
        "stock": 150
      },
      "quantitySold": 245,
      "totalRevenue": 110250.00,
      "timesSold": 89
    },
    {
      "productId": 12,
      "product": {
        "id": 12,
        "name": "Correa Dentada Dayco",
        "sku": "COR-DAYCO-015",
        "category": "Correas",
        "brand": "Dayco",
        "price": 890.00,
        "stock": 3
      },
      "quantitySold": 180,
      "totalRevenue": 160200.00,
      "timesSold": 72
    }
  ]
}
```

---

### GET /api/sales/by-salesperson

Obtiene ventas agrupadas por vendedor.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": [
    {
      "userId": 1,
      "user": { "id": 1, "name": "Admin Principal", "email": "admin@lacima.com", "role": "ADMIN" },
      "totalSales": 120,
      "totalRevenue": 520800.00,
      "avgTicket": 4340.00
    },
    {
      "userId": 3,
      "user": { "id": 3, "name": "Carlos Mendoza", "email": "carlos@lacima.com", "role": "USER" },
      "totalSales": 95,
      "totalRevenue": 395680.50,
      "avgTicket": 4165.06
    }
  ]
}
```

---

### POST /api/sales/credit-notes

Crea una nota de crédito para una venta. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "saleId": 345,
  "reason": "Devolución parcial de productos por defecto de fábrica"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 15,
    "number": "NC-2026-0015",
    "saleId": 345,
    "amount": 1800.00,
    "reason": "Devolución parcial de productos por defecto de fábrica",
    "status": "ACTIVE",
    "userId": 1,
    "createdAt": "2026-04-07T14:00:00.000Z"
  }
}
```

---

### GET /api/sales/credit-notes

Lista todas las notas de crédito.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |
| `status` | string | Estado: `ACTIVE`, `USED` | `ACTIVE` |
| `saleId` | number | Filtrar por venta | `345` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "creditNotes": [
      {
        "id": 15,
        "number": "NC-2026-0015",
        "saleId": 345,
        "amount": 1800.00,
        "reason": "Devolución parcial de productos por defecto de fábrica",
        "status": "ACTIVE",
        "createdAt": "2026-04-07T14:00:00.000Z",
        "sale": {
          "id": 345,
          "invoiceNumber": "FAC-2026-0345",
          "total": 4102.80,
          "createdAt": "2026-04-07T10:15:00.000Z"
        },
        "user": { "id": 1, "name": "Admin Principal", "email": "admin@lacima.com" }
      }
    ],
    "pagination": {
      "total": 15,
      "page": 1,
      "limit": 20,
      "totalPages": 1
    }
  }
}
```

---

### GET /api/sales/daily-report

Obtiene el reporte diario de ventas.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Default |
|-----------|------|-------------|---------|
| `date` | date | Fecha del reporte | Fecha actual |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "date": "2026-04-07",
    "completedSales": 28,
    "totalRevenue": 125400.00,
    "totalTax": 20064.00,
    "avgTicket": 4478.57,
    "paymentMethodBreakdown": [
      { "method": "EFECTIVO", "count": 14, "total": 56000.00 },
      { "method": "TRANSFERENCIA", "count": 8, "total": 38400.00 },
      { "method": "PUNTO_DE_VENTA", "count": 6, "total": 31000.00 }
    ],
    "cancelledCount": 2,
    "cancelledTotal": 8200.00,
    "sales": [
      {
        "id": 345,
        "invoiceNumber": "FAC-2026-0345",
        "total": 4102.80,
        "status": "COMPLETED",
        "paymentMethod": "EFECTIVO",
        "createdAt": "2026-04-07T10:15:00.000Z",
        "items": [
          { "productId": 1, "quantity": 4, "price": 450.00, "product": { "name": "Filtro de Aceite Bosch", "sku": "FA-BOSCH-001" } }
        ],
        "user": { "name": "Admin Principal", "email": "admin@lacima.com" }
      }
    ]
  }
}
```

---

### GET /api/sales/tax-report

Obtiene el reporte de impuestos (IVA). Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-30` |
| `period` | string | Período mensual (formato YYYY-MM) | `2026-04` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "period": {
      "startDate": "2026-04-01",
      "endDate": "2026-04-30"
    },
    "totalInvoices": 345,
    "totalSubtotal": 1425680.50,
    "totalTax": 228108.88,
    "totalDiscount": 15200.00,
    "totalRevenue": 1638589.38,
    "effectiveTaxRate": 16.00,
    "sales": [
      {
        "id": 345,
        "invoiceNumber": "FAC-2026-0345",
        "subtotal": 3580.00,
        "tax": 572.80,
        "total": 4102.80,
        "discount": 50.00,
        "paymentMethod": "EFECTIVO",
        "createdAt": "2026-04-07T10:15:00.000Z",
        "user": { "name": "Admin Principal" }
      }
    ]
  }
}
```

---

## Módulo de Compras

**Prefijo de ruta:** `/api/purchases`

### GET /api/purchases/suppliers

Lista todos los proveedores.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Default |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página (max: 100) | `50` |
| `search` | string | Buscar por nombre, RIF o email | - |
| `active` | boolean | Filtrar por estado activo | - |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "suppliers": [
      {
        "id": 1,
        "name": "Repuestos Industriales CA",
        "rif": "J-12345678-9",
        "email": "ventas@repuestosca.com",
        "phone": "+58 212-5551234",
        "address": "Av. Libertador, Caracas, Venezuela",
        "contact": "José Martínez",
        "active": true,
        "createdAt": "2026-01-10T08:00:00.000Z",
        "_count": { "purchases": 45 }
      }
    ],
    "pagination": {
      "total": 28,
      "page": 1,
      "limit": 50,
      "totalPages": 1
    }
  }
}
```

---

### POST /api/purchases/suppliers

Crea un nuevo proveedor. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "name": "Distribuidora Automotriz Venezuela",
  "rif": "J-98765432-1",
  "email": "contacto@dav.com.ve",
  "phone": "+58 212-5559876",
  "address": "Zona Industrial Valencia, Edo. Carabobo",
  "contact": "María González"
}
```

**Campo Obligatorio:** `name`, `rif`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 29,
    "name": "Distribuidora Automotriz Venezuela",
    "rif": "J-98765432-1",
    "email": "contacto@dav.com.ve",
    "phone": "+58 212-5559876",
    "address": "Zona Industrial Valencia, Edo. Carabobo",
    "contact": "María González",
    "active": true,
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T09:00:00.000Z"
  }
}
```

---

### PUT /api/purchases/suppliers/:id

Actualiza un proveedor existente. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "phone": "+58 212-5559999",
  "contact": "María González de Rodríguez"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 29,
    "name": "Distribuidora Automotriz Venezuela",
    "rif": "J-98765432-1",
    "email": "contacto@dav.com.ve",
    "phone": "+58 212-5559999",
    "address": "Zona Industrial Valencia, Edo. Carabobo",
    "contact": "María González de Rodríguez",
    "active": true,
    "updatedAt": "2026-04-07T10:30:00.000Z"
  }
}
```

---

### POST /api/purchases/orders

Crea una nueva orden de compra con sus ítems. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "supplierId": 1,
  "items": [
    {
      "productId": 1,
      "quantity": 100,
      "unitCost": 420.00
    },
    {
      "productId": 12,
      "quantity": 50,
      "unitCost": 750.00
    }
  ],
  "notes": "Reposición de stock - Pedido mensual",
  "expectedDeliveryDate": "2026-04-21"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 56,
    "number": "OC-2026-0056",
    "supplierId": 1,
    "total": 79500.00,
    "status": "PENDING",
    "orderDate": "2026-04-07T09:00:00.000Z",
    "expectedDeliveryDate": "2026-04-21",
    "notes": "Reposición de stock - Pedido mensual",
    "items": [
      {
        "id": 201,
        "productId": 1,
        "quantity": 100,
        "unitCost": 420.00,
        "subtotal": 42000.00
      },
      {
        "id": 202,
        "productId": 12,
        "quantity": 50,
        "unitCost": 750.00,
        "subtotal": 37500.00
      }
    ],
    "createdAt": "2026-04-07T09:00:00.000Z"
  }
}
```

---

### GET /api/purchases/orders

Lista las órdenes de compra con filtros.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |
| `status` | string | Estado: `PENDING`, `APPROVED`, `RECEIVED`, `CANCELLED` | `PENDING` |
| `supplierId` | number | Filtrar por proveedor | `1` |
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-30` |
| `search` | string | Buscar por número o notas | `OC-2026` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "orders": [
      {
        "id": 56,
        "number": "OC-2026-0056",
        "supplierId": 1,
        "total": 79500.00,
        "status": "PENDING",
        "orderDate": "2026-04-07",
        "expectedDeliveryDate": "2026-04-21",
        "notes": "Reposición de stock - Pedido mensual",
        "supplier": { "id": 1, "name": "Repuestos Industriales CA", "rif": "J-12345678-9" },
        "_count": { "items": 2 }
      }
    ],
    "pagination": {
      "total": 56,
      "page": 1,
      "limit": 20,
      "totalPages": 3
    }
  }
}
```

---

### GET /api/purchases/orders/:id

Obtiene el detalle completo de una orden de compra.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 56,
    "number": "OC-2026-0056",
    "supplierId": 1,
    "total": 79500.00,
    "status": "PENDING",
    "orderDate": "2026-04-07T09:00:00.000Z",
    "expectedDeliveryDate": "2026-04-21",
    "notes": "Reposición de stock - Pedido mensual",
    "items": [
      { "id": 201, "productId": 1, "quantity": 100, "unitCost": 420.00, "subtotal": 42000.00 },
      { "id": 202, "productId": 12, "quantity": 50, "unitCost": 750.00, "subtotal": 37500.00 }
    ],
    "supplier": {
      "id": 1,
      "name": "Repuestos Industriales CA",
      "rif": "J-12345678-9",
      "email": "ventas@repuestosca.com",
      "phone": "+58 212-5551234",
      "contact": "José Martínez"
    }
  }
}
```

---

### POST /api/purchases/orders/:id/approve

Aprueba una orden de compra. Requiere rol ADMIN o MANAGER.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 56,
    "number": "OC-2026-0056",
    "total": 79500.00,
    "status": "APPROVED",
    "approvedAt": "2026-04-07T10:00:00.000Z"
  },
  "message": "Orden de compra aprobada exitosamente"
}
```

---

### POST /api/purchases/orders/:id/receive

Recibe una orden de compra y actualiza el inventario. Requiere rol ADMIN o MANAGER.

**Solicitud (recepción completa):**

```json
{}
```

**Solicitud (recepción parcial):**

```json
{
  "partialReceive": true,
  "receivedItems": [
    { "itemId": 201, "receivedQuantity": 80 },
    { "itemId": 202, "receivedQuantity": 50 }
  ]
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 56,
    "number": "OC-2026-0056",
    "total": 79500.00,
    "status": "RECEIVED",
    "receivedAt": "2026-04-15T14:30:00.000Z"
  },
  "message": "Orden de compra recibida exitosamente. Inventario actualizado."
}
```

---

### POST /api/purchases/orders/:id/cancel

Cancela una orden de compra. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "reason": "Proveedor no pudo cumplir con los tiempos de entrega"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 56,
    "number": "OC-2026-0056",
    "total": 79500.00,
    "status": "CANCELLED",
    "cancelledAt": "2026-04-08T09:00:00.000Z"
  },
  "message": "Orden de compra cancelada exitosamente"
}
```

---

### GET /api/purchases/history

Obtiene el historial de compras por proveedor con estadísticas.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `supplierId` | number | Filtrar por proveedor | `1` |
| `startDate` | date | Fecha de inicio | `2026-01-01` |
| `endDate` | date | Fecha de fin | `2026-04-07` |
| `status` | string | Filtrar por estado | `RECEIVED` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "orders": [
      {
        "id": 56,
        "number": "OC-2026-0056",
        "supplierId": 1,
        "total": 79500.00,
        "status": "RECEIVED",
        "orderDate": "2026-04-07",
        "receivedAt": "2026-04-15T14:30:00.000Z",
        "supplier": { "id": 1, "name": "Repuestos Industriales CA", "rif": "J-12345678-9" },
        "items": [
          { "productId": 1, "quantity": 100, "unitCost": 420.00 }
        ]
      }
    ],
    "summary": {
      "totalOrders": 56,
      "totalSpent": 3456780.00,
      "avgOrderValue": 61728.21,
      "statusBreakdown": [
        { "status": "RECEIVED", "count": 48, "total": 3100000.00 },
        { "status": "PENDING", "count": 5, "total": 256780.00 },
        { "status": "APPROVED", "count": 2, "total": 85000.00 },
        { "status": "CANCELLED", "count": 1, "total": 15000.00 }
      ],
      "supplierBreakdown": [
        {
          "supplierId": 1,
          "supplier": { "id": 1, "name": "Repuestos Industriales CA", "rif": "J-12345678-9" },
          "orderCount": 20,
          "totalSpent": 1250000.00
        }
      ]
    }
  }
}
```

---

### GET /api/purchases/summary

Obtiene un resumen de compras con métricas clave.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-30` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "totalOrders": 56,
    "totalSpent": 3456780.00,
    "avgOrderValue": 61728.21,
    "pendingOrders": 5,
    "activeSuppliers": 28,
    "statusBreakdown": [
      { "status": "RECEIVED", "count": 48, "total": 3100000.00 },
      { "status": "PENDING", "count": 5, "total": 256780.00 },
      { "status": "APPROVED", "count": 2, "total": 85000.00 },
      { "status": "CANCELLED", "count": 1, "total": 15000.00 }
    ],
    "recentOrders": [
      {
        "id": 56,
        "number": "OC-2026-0056",
        "supplier": { "id": 1, "name": "Repuestos Industriales CA" },
        "total": 79500.00,
        "status": "RECEIVED",
        "orderDate": "2026-04-07"
      }
    ],
    "topSuppliers": [
      {
        "supplierId": 1,
        "supplier": { "id": 1, "name": "Repuestos Industriales CA", "rif": "J-12345678-9" },
        "orderCount": 20,
        "totalSpent": 1250000.00
      }
    ],
    "period": {
      "startDate": null,
      "endDate": null
    }
  }
}
```

---

## Módulo de RRHH y Nómina

**Prefijo de ruta:** `/api/hr`

### GET /api/hr/employees

Lista todos los empleados con filtros y paginación. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página (max: 100) | `50` |
| `department` | string | Filtrar por departamento | `Ventas` |
| `active` | boolean | Filtrar por estado activo | `true` |
| `search` | string | Buscar por nombre, apellido, email, cédula, cargo | `Carlos` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "employees": [
      {
        "id": 1,
        "firstName": "Carlos",
        "lastName": "Mendoza",
        "dni": "V-12345678",
        "email": "carlos@lacima.com",
        "position": "Vendedor Senior",
        "department": "Ventas",
        "hireDate": "2024-06-15T00:00:00.000Z",
        "salary": 850.00,
        "active": true,
        "createdAt": "2024-06-15T08:00:00.000Z",
        "_count": { "payroll": 10 }
      }
    ],
    "pagination": {
      "total": 35,
      "page": 1,
      "limit": 50,
      "totalPages": 1
    }
  }
}
```

---

### POST /api/hr/employees

Crea un nuevo empleado. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "firstName": "Ana",
  "lastName": "Rodríguez",
  "dni": "V-23456789",
  "email": "ana.rodriguez@lacima.com",
  "position": "Contadora",
  "department": "Contabilidad",
  "hireDate": "2026-04-07",
  "salary": 1200.00
}
```

**Campos Obligatorios:** `firstName`, `lastName`, `dni`, `email`, `position`, `department`, `hireDate`, `salary`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 36,
    "firstName": "Ana",
    "lastName": "Rodríguez",
    "dni": "V-23456789",
    "email": "ana.rodriguez@lacima.com",
    "position": "Contadora",
    "department": "Contabilidad",
    "hireDate": "2026-04-07T00:00:00.000Z",
    "salary": 1200.00,
    "active": true,
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T09:00:00.000Z"
  }
}
```

---

### PUT /api/hr/employees/:id

Actualiza un empleado existente. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "position": "Contadora Senior",
  "salary": 1400.00
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 36,
    "firstName": "Ana",
    "lastName": "Rodríguez",
    "dni": "V-23456789",
    "email": "ana.rodriguez@lacima.com",
    "position": "Contadora Senior",
    "department": "Contabilidad",
    "hireDate": "2026-04-07T00:00:00.000Z",
    "salary": 1400.00,
    "active": true,
    "updatedAt": "2026-04-07T10:30:00.000Z"
  }
}
```

---

### POST /api/hr/employees/:id/deactivate

Desactiva un empleado. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "reason": "Renuncia voluntaria"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 36,
    "firstName": "Ana",
    "lastName": "Rodríguez",
    "dni": "V-23456789",
    "active": false
  },
  "message": "Empleado desactivado: Renuncia voluntaria"
}
```

---

### GET /api/hr/departments

Obtiene la lista de departamentos con conteo de empleados y salario promedio.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": [
    {
      "department": "Administración",
      "employeeCount": 5,
      "avgSalary": 1350.00
    },
    {
      "department": "Almacén",
      "employeeCount": 8,
      "avgSalary": 650.00
    },
    {
      "department": "Contabilidad",
      "employeeCount": 4,
      "avgSalary": 1200.00
    },
    {
      "department": "Ventas",
      "employeeCount": 15,
      "avgSalary": 850.00
    },
    {
      "department": "Gerencia",
      "employeeCount": 3,
      "avgSalary": 2500.00
    }
  ]
}
```

---

### GET /api/hr/payrolls

Lista las nóminas con filtros. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |
| `employeeId` | number | Filtrar por empleado | `1` |
| `month` | number | Mes (1-12) | `4` |
| `year` | number | Año | `2026` |
| `processed` | boolean | Filtrar por estado procesado | `true` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "payrolls": [
      {
        "id": 350,
        "employeeId": 1,
        "month": 4,
        "year": 2026,
        "baseSalary": 850.00,
        "bonuses": 120.00,
        "deductions": 85.00,
        "netSalary": 885.00,
        "processed": true,
        "employee": {
          "id": 1,
          "firstName": "Carlos",
          "lastName": "Mendoza",
          "dni": "V-12345678",
          "department": "Ventas",
          "position": "Vendedor Senior"
        }
      }
    ],
    "pagination": {
      "total": 350,
      "page": 1,
      "limit": 20,
      "totalPages": 18
    }
  }
}
```

---

### POST /api/hr/payrolls/calculate

Calcula la nómina de un empleado para un mes específico. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "employeeId": 1,
  "month": 4,
  "year": 2026,
  "overtimeHours": 12,
  "includeCestaTicket": true,
  "additionalBonuses": 200.00
}
```

**Campos Obligatorios:** `employeeId`, `month`, `year`

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 351,
    "employeeId": 1,
    "month": 4,
    "year": 2026,
    "baseSalary": 850.00,
    "overtimePay": 85.00,
    "cestaTicket": 150.00,
    "bonuses": 320.00,
    "deductions": 102.00,
    "netSalary": 1303.00,
    "processed": false,
    "employee": {
      "firstName": "Carlos",
      "lastName": "Mendoza",
      "department": "Ventas",
      "position": "Vendedor Senior"
    }
  }
}
```

---

### POST /api/hr/payrolls/process

Procesa y finaliza una nómina. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "payrollId": 351
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 351,
    "employeeId": 1,
    "month": 4,
    "year": 2026,
    "netSalary": 1303.00,
    "processed": true,
    "updatedAt": "2026-04-07T16:00:00.000Z"
  },
  "message": "Nomina de Carlos Mendoza para 4/2026 procesada exitosamente"
}
```

---

### GET /api/hr/payrolls/summary

Obtiene un resumen de nómina del mes. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `month` | number | Mes (1-12) | `4` |
| `year` | number | Año | `2026` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "period": "4/2026",
    "totalEmployees": 35,
    "payrollsProcessed": 32,
    "payrollsPending": 3,
    "monthlyPayrollCost": 31520.00,
    "avgSalary": 985.00,
    "totals": {
      "baseSalary": 28500.00,
      "bonuses": 4800.00,
      "deductions": 3780.00,
      "netSalary": 31520.00,
      "employerInces": 1425.00,
      "totalCompanyCost": 34725.00
    },
    "departmentBreakdown": [
      { "department": "Ventas", "employees": 15, "totalNetSalary": 13275.00 },
      { "department": "Almacén", "employees": 8, "totalNetSalary": 5200.00 },
      { "department": "Administración", "employees": 5, "totalNetSalary": 6750.00 },
      { "department": "Contabilidad", "employees": 4, "totalNetSalary": 4800.00 },
      { "department": "Gerencia", "employees": 3, "totalNetSalary": 7500.00 }
    ]
  }
}
```

---

### GET /api/hr/attendance

Obtiene registros de asistencia con filtros.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página (max: 200) | `50` |
| `employeeId` | number | Filtrar por empleado | `1` |
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-07` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "records": [
      {
        "id": 520,
        "employeeId": 1,
        "date": "2026-04-07T00:00:00.000Z",
        "checkIn": "2026-04-07T08:00:00.000Z",
        "checkOut": "2026-04-07T17:00:00.000Z",
        "hours": 9.00,
        "notes": null,
        "employee": {
          "id": 1,
          "firstName": "Carlos",
          "lastName": "Mendoza",
          "dni": "V-12345678",
          "department": "Ventas",
          "position": "Vendedor Senior"
        }
      }
    ],
    "pagination": {
      "total": 520,
      "page": 1,
      "limit": 50,
      "totalPages": 11
    }
  }
}
```

---

### POST /api/hr/attendance

Registra entrada o salida de un empleado.

**Solicitud (Entrada):**

```json
{
  "employeeId": 1,
  "type": "checkIn"
}
```

**Solicitud (Salida):**

```json
{
  "employeeId": 1,
  "type": "checkOut",
  "notes": "Salida normal"
}
```

**Respuesta Exitosa - Entrada (201):**

```json
{
  "status": "success",
  "data": {
    "id": 521,
    "employeeId": 1,
    "date": "2026-04-07T00:00:00.000Z",
    "checkIn": "2026-04-07T08:00:00.000Z",
    "checkOut": null,
    "hours": null,
    "notes": null,
    "employee": {
      "id": 1,
      "firstName": "Carlos",
      "lastName": "Mendoza",
      "dni": "V-12345678"
    }
  },
  "message": "Entrada registrada exitosamente"
}
```

**Respuesta Exitosa - Salida (200):**

```json
{
  "status": "success",
  "data": {
    "id": 521,
    "employeeId": 1,
    "date": "2026-04-07T00:00:00.000Z",
    "checkIn": "2026-04-07T08:00:00.000Z",
    "checkOut": "2026-04-07T17:00:00.000Z",
    "hours": 9.00,
    "notes": "Salida normal",
    "employee": {
      "id": 1,
      "firstName": "Carlos",
      "lastName": "Mendoza",
      "dni": "V-12345678"
    }
  },
  "message": "Salida registrada exitosamente"
}
```

---

## Módulo de Contabilidad

**Prefijo de ruta:** `/api/accounting`

### GET /api/accounting/accounts

Obtiene el plan de cuentas contables. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `type` | string | Tipo de cuenta: `ASSET`, `LIABILITY`, `EQUITY`, `REVENUE`, `EXPENSE` | `ASSET` |
| `active` | boolean | Filtrar por estado activo | `true` |
| `search` | string | Buscar por código o nombre | `Caja` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "accounts": [
      {
        "id": 1,
        "code": "1.01.01",
        "name": "Caja General",
        "type": "ASSET",
        "parentCode": "1.01",
        "balance": 125000.00,
        "active": true,
        "createdAt": "2026-01-01T00:00:00.000Z",
        "updatedAt": "2026-01-01T00:00:00.000Z"
      },
      {
        "id": 2,
        "code": "1.01.02",
        "name": "Banco Mercantil - Cta. Corriente",
        "type": "ASSET",
        "parentCode": "1.01",
        "balance": 2500000.00,
        "active": true,
        "createdAt": "2026-01-01T00:00:00.000Z",
        "updatedAt": "2026-01-01T00:00:00.000Z"
      }
    ],
    "grouped": {
      "ASSET": [
        { "id": 1, "code": "1.01.01", "name": "Caja General", "type": "ASSET", "balance": 125000.00 }
      ],
      "LIABILITY": [
        { "id": 15, "code": "2.01.01", "name": "Cuentas por Pagar", "type": "LIABILITY", "balance": 450000.00 }
      ],
      "EQUITY": [
        { "id": 25, "code": "3.01.01", "name": "Capital Social", "type": "EQUITY", "balance": 5000000.00 }
      ],
      "REVENUE": [
        { "id": 35, "code": "4.01.01", "name": "Ingresos por Ventas", "type": "REVENUE", "balance": 8500000.00 }
      ],
      "EXPENSE": [
        { "id": 50, "code": "5.01.01", "name": "Costo de Mercancía Vendida", "type": "EXPENSE", "balance": 5200000.00 }
      ]
    },
    "total": 75
  }
}
```

---

### POST /api/accounting/accounts

Crea una nueva cuenta contable. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "code": "1.02.03",
  "name": "Inventario de Repuestos - Línea Bosch",
  "type": "ASSET",
  "parentCode": "1.02",
  "balance": 0
}
```

**Campos Obligatorios:** `code`, `name`, `type`

**Tipos de Cuenta válidos:** `ASSET`, `LIABILITY`, `EQUITY`, `REVENUE`, `EXPENSE`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 76,
    "code": "1.02.03",
    "name": "Inventario de Repuestos - Línea Bosch",
    "type": "ASSET",
    "parentCode": "1.02",
    "balance": 0,
    "active": true,
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T09:00:00.000Z"
  }
}
```

---

### PUT /api/accounting/accounts/:id

Actualiza una cuenta contable existente. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "name": "Inventario de Repuestos - Bosch Premium",
  "active": true
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 76,
    "code": "1.02.03",
    "name": "Inventario de Repuestos - Bosch Premium",
    "type": "ASSET",
    "parentCode": "1.02",
    "balance": 0,
    "active": true,
    "updatedAt": "2026-04-07T10:30:00.000Z"
  }
}
```

---

### GET /api/accounting/journal-entries

Obtiene los asientos contables con filtros. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-30` |
| `posted` | boolean | Filtrar por contabilizados | `true` |
| `search` | string | Buscar por número o descripción | `Compra` |
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "entries": [
      {
        "id": 125,
        "number": "AS-2026-0125",
        "date": "2026-04-07",
        "description": "Registro de compra de inventario - Factura #4521",
        "posted": true,
        "createdAt": "2026-04-07T09:00:00.000Z",
        "lines": [
          {
            "id": 250,
            "accountId": 5,
            "debit": 42000.00,
            "credit": 0,
            "description": "Filtro de Aceite Bosch x100",
            "account": { "code": "1.02.01", "name": "Inventario de Mercancía", "type": "ASSET" }
          },
          {
            "id": 251,
            "accountId": 1,
            "debit": 0,
            "credit": 42000.00,
            "description": "Pago a proveedor",
            "account": { "code": "1.01.02", "name": "Banco Mercantil", "type": "ASSET" }
          }
        ]
      }
    ],
    "pagination": {
      "page": 1,
      "limit": 20,
      "total": 125,
      "totalPages": 7
    }
  }
}
```

---

### POST /api/accounting/journal-entries

Crea un nuevo asiento contable. Requiere que los débitos y créditos estén balanceados. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "date": "2026-04-07",
  "description": "Registro de compra de inventario - Factura #4521",
  "lines": [
    {
      "accountId": 5,
      "debit": 42000.00,
      "credit": 0,
      "description": "Filtro de Aceite Bosch x100"
    },
    {
      "accountId": 1,
      "debit": 0,
      "credit": 42000.00,
      "description": "Pago a proveedor Repuestos CA"
    }
  ]
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 126,
    "number": "AS-2026-0126",
    "date": "2026-04-07",
    "description": "Registro de compra de inventario - Factura #4521",
    "posted": false,
    "totalDebit": 42000.00,
    "totalCredit": 42000.00,
    "balanced": true,
    "lines": [
      {
        "id": 252,
        "accountId": 5,
        "debit": 42000.00,
        "credit": 0,
        "description": "Filtro de Aceite Bosch x100"
      },
      {
        "id": 253,
        "accountId": 1,
        "debit": 0,
        "credit": 42000.00,
        "description": "Pago a proveedor Repuestos CA"
      }
    ],
    "createdAt": "2026-04-07T09:30:00.000Z"
  }
}
```

---

### POST /api/accounting/journal-entries/:id/post

Contabiliza un asiento contable, actualizando los saldos de las cuentas. Requiere rol ADMIN.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 126,
    "number": "AS-2026-0126",
    "date": "2026-04-07",
    "description": "Registro de compra de inventario - Factura #4521",
    "posted": true,
    "postedAt": "2026-04-07T10:00:00.000Z",
    "totalDebit": 42000.00,
    "totalCredit": 42000.00,
    "balanced": true
  },
  "message": "Asiento contable publicado exitosamente"
}
```

---

### GET /api/accounting/trial-balance

Obtiene el balance de comprobación. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `asOfDate` | date | Fecha de corte | `2026-03-31` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "accounts": [
      {
        "code": "1.01.01",
        "name": "Caja General",
        "type": "ASSET",
        "debit": 125000.00,
        "credit": 0,
        "balance": 125000.00
      },
      {
        "code": "1.01.02",
        "name": "Banco Mercantil - Cta. Corriente",
        "type": "ASSET",
        "debit": 2500000.00,
        "credit": 0,
        "balance": 2500000.00
      },
      {
        "code": "2.01.01",
        "name": "Cuentas por Pagar",
        "type": "LIABILITY",
        "debit": 0,
        "credit": 450000.00,
        "balance": -450000.00
      }
    ],
    "totals": {
      "totalDebit": 8525000.00,
      "totalCredit": 8525000.00,
      "balanced": true
    },
    "asOfDate": "2026-03-31"
  }
}
```

---

### GET /api/accounting/general-ledger

Obtiene el libro mayor general de una cuenta. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `accountId` | number | ID de la cuenta (requerido) | `5` |
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-30` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "account": {
      "code": "1.02.01",
      "name": "Inventario de Mercancía",
      "type": "ASSET",
      "currentBalance": 4523890.50
    },
    "entries": [
      {
        "type": "OPENING",
        "date": "2026-04-01",
        "entryNumber": null,
        "description": "Saldo anterior",
        "debit": 0,
        "credit": 0,
        "balance": 4481890.50
      },
      {
        "type": "ENTRY",
        "date": "2026-04-07",
        "entryNumber": "AS-2026-0125",
        "description": "Registro de compra de inventario",
        "debit": 42000.00,
        "credit": 0,
        "balance": 4523890.50
      }
    ],
    "period": {
      "startDate": "2026-04-01",
      "endDate": "2026-04-30"
    },
    "totalDebits": 42000.00,
    "totalCredits": 0,
    "endingBalance": 4523890.50
  }
}
```

---

### GET /api/accounting/balance-sheet

Obtiene el balance general (Activos = Pasivos + Patrimonio). Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `asOfDate` | date | Fecha de corte | `2026-03-31` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "assets": {
      "current": [
        { "code": "1.01.01", "name": "Caja General", "balance": 125000.00 },
        { "code": "1.01.02", "name": "Banco Mercantil", "balance": 2500000.00 },
        { "code": "1.02.01", "name": "Inventario de Mercancía", "balance": 4523890.50 }
      ],
      "nonCurrent": [
        { "code": "1.03.01", "name": "Mobiliario y Equipos", "balance": 350000.00 },
        { "code": "1.03.02", "name": "Vehículos", "balance": 1200000.00 }
      ],
      "total": 8698890.50
    },
    "liabilities": {
      "current": [
        { "code": "2.01.01", "name": "Cuentas por Pagar", "balance": 450000.00 },
        { "code": "2.01.02", "name": "Impuestos por Pagar", "balance": 125000.00 }
      ],
      "nonCurrent": [
        { "code": "2.02.01", "name": "Préstamos Bancarios LP", "balance": 800000.00 }
      ],
      "total": 1375000.00
    },
    "equity": {
      "items": [
        { "code": "3.01.01", "name": "Capital Social", "balance": 5000000.00 },
        { "code": "3.02.01", "name": "Utilidades Retenidas", "balance": 1823890.50 }
      ],
      "total": 6823890.50
    },
    "totals": {
      "assets": 8698890.50,
      "liabilitiesAndEquity": 8698890.50,
      "balanced": true
    },
    "asOfDate": "2026-03-31"
  }
}
```

---

### GET /api/accounting/income-statement

Obtiene el estado de resultados (Ingresos - Egresos). Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio (requerido) | `2026-04-01` |
| `endDate` | date | Fecha de fin (requerido) | `2026-04-30` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "revenue": {
      "accounts": [
        { "code": "4.01.01", "name": "Ingresos por Ventas", "balance": 1425680.50 },
        { "code": "4.01.02", "name": "Ingresos por Servicios", "balance": 85000.00 }
      ],
      "total": 1510680.50
    },
    "expenses": {
      "accounts": [
        { "code": "5.01.01", "name": "Costo de Mercancía Vendida", "balance": 920000.00 },
        { "code": "5.02.01", "name": "Gastos de Personal", "balance": 31520.00 },
        { "code": "5.02.02", "name": "Gastos Operativos", "balance": 125000.00 },
        { "code": "5.02.03", "name": "Depreciación", "balance": 45000.00 }
      ],
      "total": 1121520.00
    },
    "netIncome": 389160.50,
    "period": {
      "startDate": "2026-04-01",
      "endDate": "2026-04-30"
    }
  }
}
```

---

### GET /api/accounting/tax-report

Obtiene el reporte de impuestos (IVA). Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio (requerido) | `2026-04-01` |
| `endDate` | date | Fecha de fin (requerido) | `2026-04-30` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "period": {
      "startDate": "2026-04-01",
      "endDate": "2026-04-30"
    },
    "salesTax": {
      "totalBaseImponible": 1425680.50,
      "totalIVA_Debito": 228108.88,
      "totalExento": 0,
      "invoiceCount": 345
    },
    "purchaseTax": {
      "totalBaseImponible": 920000.00,
      "totalIVA_Credito": 147200.00,
      "invoiceCount": 56
    },
    "taxToPay": 80908.88,
    "effectiveRate": 16.00
  }
}
```

---

### GET /api/accounting/cash-book

Obtiene el libro de caja y bancos. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-30` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "cashAccounts": [
      { "id": 1, "code": "1.01.01", "name": "Caja General", "balance": 125000.00 },
      { "id": 2, "code": "1.01.02", "name": "Banco Mercantil - Cta. Corriente", "balance": 2500000.00 }
    ],
    "transactions": [
      {
        "date": "2026-04-07",
        "entryNumber": "AS-2026-0125",
        "description": "Registro de compra de inventario",
        "account": { "code": "1.01.02", "name": "Banco Mercantil" },
        "debit": 0,
        "credit": 42000.00,
        "netAmount": 42000.00,
        "type": "OUTFLOW"
      },
      {
        "date": "2026-04-07",
        "entryNumber": "AS-2026-0124",
        "description": "Registro de venta al contado",
        "account": { "code": "1.01.01", "name": "Caja General" },
        "debit": 4102.80,
        "credit": 0,
        "netAmount": 4102.80,
        "type": "INFLOW"
      }
    ],
    "period": {
      "startDate": "2026-04-01",
      "endDate": "2026-04-30"
    },
    "summary": {
      "totalInflows": 1425680.50,
      "totalOutflows": 1121520.00,
      "netCashFlow": 304160.50,
      "currentCashBalance": 2625000.00
    }
  }
}
```

---

## Módulo de Finanzas

**Prefijo de ruta:** `/api/finance`

### GET /api/finance/fixed-assets

Obtiene todos los activos fijos con información de depreciación. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `category` | string | Filtrar por categoría | `Vehículos` |
| `active` | boolean | Filtrar por estado activo | `true` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "assets": [
      {
        "id": 1,
        "name": "Camión de Entrega Ford F-350",
        "code": "AF-VEH-001",
        "category": "Vehículos",
        "acquisitionDate": "2024-03-15T00:00:00.000Z",
        "acquisitionCost": 3500000.00,
        "usefulLife": 10,
        "depreciationMethod": "STRAIGHT_LINE",
        "salvageValue": 350000.00,
        "currentBookValue": 2712500.00,
        "active": true,
        "accumulatedDepreciation": 787500.00,
        "depreciationInfo": {
          "monthly": 26250.00,
          "annual": 315000.00,
          "remainingMonths": 82
        }
      }
    ],
    "total": 5
  }
}
```

---

### POST /api/finance/fixed-assets

Crea un nuevo activo fijo. Requiere rol ADMIN.

**Solicitud:**

```json
{
  "name": "Estantería Industrial para Almacén",
  "code": "AF-MOB-005",
  "category": "Mobiliario",
  "acquisitionDate": "2026-04-07",
  "acquisitionCost": 450000.00,
  "usefulLife": 10,
  "depreciationMethod": "STRAIGHT_LINE",
  "salvageValue": 45000.00
}
```

**Campos Obligatorios:** `name`, `code`, `category`, `acquisitionDate`, `acquisitionCost`, `usefulLife`

**Métodos de Depreciación válidos:** `STRAIGHT_LINE`, `DECLINING`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 6,
    "name": "Estantería Industrial para Almacén",
    "code": "AF-MOB-005",
    "category": "Mobiliario",
    "acquisitionDate": "2026-04-07T00:00:00.000Z",
    "acquisitionCost": 450000.00,
    "usefulLife": 10,
    "depreciationMethod": "STRAIGHT_LINE",
    "salvageValue": 45000.00,
    "currentBookValue": 450000.00,
    "active": true,
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T09:00:00.000Z"
  }
}
```

---

### POST /api/finance/fixed-assets/:id/depreciate

Calcula y registra la depreciación de un activo fijo. Requiere rol ADMIN.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "asset": {
      "id": 1,
      "name": "Camión de Entrega Ford F-350",
      "code": "AF-VEH-001",
      "currentBookValue": 2686250.00,
      "accumulatedDepreciation": 813750.00
    },
    "depreciation": {
      "monthly": 26250.00,
      "period": "2026-04",
      "journalEntryId": 127
    }
  },
  "message": "Depreciación calculada y registrada exitosamente"
}
```

---

### GET /api/finance/fixed-assets/summary

Obtiene un resumen de activos fijos agrupados por categoría. Requiere rol ADMIN o MANAGER.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "totalAssets": 5,
    "totalAcquisitionCost": 5500000.00,
    "totalCurrentBookValue": 3962500.00,
    "totalAccumulatedDepreciation": 1537500.00,
    "byCategory": {
      "Vehículos": {
        "count": 2,
        "totalAcquisitionCost": 4500000.00,
        "totalCurrentBookValue": 3200000.00,
        "totalAccumulatedDepreciation": 1300000.00,
        "assets": [
          {
            "id": 1,
            "code": "AF-VEH-001",
            "name": "Camión de Entrega Ford F-350",
            "acquisitionCost": 3500000.00,
            "currentBookValue": 2686250.00,
            "accumulatedDepreciation": 813750.00,
            "monthlyDepreciation": 26250.00
          }
        ]
      },
      "Mobiliario": {
        "count": 3,
        "totalAcquisitionCost": 1000000.00,
        "totalCurrentBookValue": 762500.00,
        "totalAccumulatedDepreciation": 237500.00,
        "assets": []
      }
    }
  }
}
```

---

### GET /api/finance/receivables

Obtiene todas las cuentas por cobrar con filtros. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `status` | string | Estado: `PENDING`, `PARTIAL`, `PAID`, `OVERDUE` | `OVERDUE` |
| `customerId` | string | Filtrar por cliente | `CLI-001` |
| `overdue` | boolean | Filtrar vencidas | `true` |
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "receivables": [
      {
        "id": 15,
        "customerId": "CLI-042",
        "customerName": "Autopartes El Centro CA",
        "saleId": 298,
        "invoiceNumber": "FAC-2026-0298",
        "amount": 28500.00,
        "paidAmount": 10000.00,
        "outstanding": 18500.00,
        "status": "PARTIAL",
        "dueDate": "2026-05-07T00:00:00.000Z",
        "daysOverdue": 0,
        "createdAt": "2026-04-07T09:00:00.000Z",
        "updatedAt": "2026-04-15T10:00:00.000Z"
      },
      {
        "id": 12,
        "customerId": "CLI-018",
        "customerName": "Taller Mecánico Los Andes",
        "saleId": 275,
        "invoiceNumber": "FAC-2026-0275",
        "amount": 15200.00,
        "paidAmount": 0,
        "outstanding": 15200.00,
        "status": "OVERDUE",
        "dueDate": "2026-03-15T00:00:00.000Z",
        "daysOverdue": 23,
        "createdAt": "2026-03-15T09:00:00.000Z",
        "updatedAt": "2026-03-15T09:00:00.000Z"
      }
    ],
    "pagination": {
      "page": 1,
      "limit": 20,
      "total": 27,
      "totalPages": 2
    }
  }
}
```

---

### POST /api/finance/receivables

Crea una nueva cuenta por cobrar. Requiere rol ADMIN o MANAGER.

**Solicitud:**

```json
{
  "customerId": "CLI-055",
  "customerName": "Transportes La Cima CA",
  "saleId": 346,
  "invoiceNumber": "FAC-2026-0346",
  "amount": 45800.00,
  "dueDate": "2026-05-07"
}
```

**Campos Obligatorios:** `customerId`, `customerName`, `invoiceNumber`, `amount`, `dueDate`

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 28,
    "customerId": "CLI-055",
    "customerName": "Transportes La Cima CA",
    "saleId": 346,
    "invoiceNumber": "FAC-2026-0346",
    "amount": 45800.00,
    "paidAmount": 0,
    "status": "PENDING",
    "dueDate": "2026-05-07T00:00:00.000Z",
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T09:00:00.000Z"
  }
}
```

---

### PUT /api/finance/receivables/:id

Actualiza una cuenta por cobrar (registrar pago, cambiar estado). Requiere rol ADMIN o MANAGER.

**Solicitud (registrar pago parcial):**

```json
{
  "paidAmount": 15000.00
}
```

**Solicitud (marcar como pagada):**

```json
{
  "paidAmount": 18500.00
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 15,
    "customerId": "CLI-042",
    "customerName": "Autopartes El Centro CA",
    "invoiceNumber": "FAC-2026-0298",
    "amount": 28500.00,
    "paidAmount": 28500.00,
    "outstanding": 0,
    "status": "PAID",
    "dueDate": "2026-05-07T00:00:00.000Z",
    "updatedAt": "2026-04-25T14:00:00.000Z"
  },
  "message": "Cuenta marcada como pagada"
}
```

---

### GET /api/finance/receivables/summary

Obtiene un resumen de cuentas por cobrar (reporte de envejecimiento). Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `asOfDate` | date | Fecha de corte | `2026-04-07` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "aging": {
      "current": { "count": 12, "total": 185000.00 },
      "30days": { "count": 5, "total": 72000.00 },
      "60days": { "count": 3, "total": 35000.00 },
      "90days": { "count": 4, "total": 48000.00 },
      "over90days": { "count": 3, "total": 28500.00 }
    },
    "summary": {
      "totalOutstanding": 368500.00,
      "totalOverdue": 183500.00,
      "totalAllReceivables": 450000.00,
      "totalPaid": 81500.00
    }
  }
}
```

---

### GET /api/finance/dashboard

Obtiene el panel financiero con métricas clave, ratios y resúmenes. Requiere rol ADMIN o MANAGER.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Default |
|-----------|------|-------------|---------|
| `startDate` | date | Fecha de inicio | Inicio del mes actual |
| `endDate` | date | Fecha de fin | Fecha actual |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "period": {
      "startDate": "2026-04-01T00:00:00.000Z",
      "endDate": "2026-04-07T23:59:59.999Z"
    },
    "keyMetrics": {
      "totalRevenue": 1510680.50,
      "totalExpenses": 1121520.00,
      "netProfit": 389160.50,
      "profitMargin": 25.76,
      "totalAssets": 8698890.50,
      "totalLiabilities": 1375000.00,
      "totalEquity": 6823890.50,
      "fixedAssetBookValue": 3962500.00,
      "receivablesOutstanding": 368500.00,
      "receivablesOverdue": 183500.00,
      "pendingReceivablesCount": 27
    },
    "ratios": {
      "debtRatio": 0.158,
      "equityRatio": 0.784,
      "debtToEquity": 0.201,
      "netProfitMargin": 25.76,
      "roa": 4.47,
      "roe": 5.70
    },
    "receivables": {
      "totalOutstanding": 368500.00,
      "totalOverdue": 183500.00,
      "aging": {
        "current": { "count": 12, "total": 185000.00 },
        "30days": { "count": 5, "total": 72000.00 },
        "60days": { "count": 3, "total": 35000.00 },
        "90days": { "count": 4, "total": 48000.00 },
        "over90days": { "count": 3, "total": 28500.00 }
      }
    },
    "balanceSheet": {
      "assets": 8698890.50,
      "liabilities": 1375000.00,
      "equity": 6823890.50,
      "balanced": true
    },
    "incomeStatement": {
      "revenue": 1510680.50,
      "expenses": 1121520.00,
      "netIncome": 389160.50
    }
  }
}
```

---

## Módulo de Configuración del Sistema

**Prefijo de ruta:** `/api/admin`

> **Nota:** Todos los endpoints de este módulo requieren rol **ADMIN**.

### GET /api/admin/config

Obtiene todas las configuraciones del sistema.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "key": "company_name",
      "value": "Mayor de Repuesto La Cima, C.A.",
      "category": "general",
      "description": "Nombre de la empresa",
      "createdAt": "2026-01-01T00:00:00.000Z",
      "updatedAt": "2026-01-01T00:00:00.000Z"
    },
    {
      "id": 2,
      "key": "tax_rate",
      "value": "16",
      "category": "tax",
      "description": "Tasa de IVA (%)",
      "createdAt": "2026-01-01T00:00:00.000Z",
      "updatedAt": "2026-01-01T00:00:00.000Z"
    },
    {
      "id": 3,
      "key": "low_stock_threshold",
      "value": "10",
      "category": "inventory",
      "description": "Umbral de stock bajo por defecto",
      "createdAt": "2026-01-01T00:00:00.000Z",
      "updatedAt": "2026-01-01T00:00:00.000Z"
    }
  ]
}
```

---

### GET /api/admin/config/category/:category

Obtiene configuraciones por categoría.

**Categorías Válidas:** `general`, `tax`, `inventory`, `sales`, `hr`, `accounting`, `system`

**Ejemplo:**

```
GET /api/admin/config/category/tax
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": [
    {
      "id": 2,
      "key": "tax_rate",
      "value": "16",
      "category": "tax",
      "description": "Tasa de IVA (%)",
      "createdAt": "2026-01-01T00:00:00.000Z",
      "updatedAt": "2026-01-01T00:00:00.000Z"
    },
    {
      "id": 4,
      "key": "tax_exempt_categories",
      "value": "[]",
      "category": "tax",
      "description": "Categorías exentas de IVA",
      "createdAt": "2026-01-01T00:00:00.000Z",
      "updatedAt": "2026-01-01T00:00:00.000Z"
    }
  ]
}
```

---

### PUT /api/admin/config/:key

Actualiza una configuración del sistema.

**Solicitud:**

```json
{
  "value": "16",
  "description": "Tasa de IVA actualizada (%) - Vigente desde abril 2026"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 2,
    "key": "tax_rate",
    "value": "16",
    "category": "tax",
    "description": "Tasa de IVA actualizada (%) - Vigente desde abril 2026",
    "updatedAt": "2026-04-07T10:00:00.000Z"
  },
  "message": "Configuracion actualizada correctamente"
}
```

---

### GET /api/admin/config/system/health

Obtiene el estado de salud del sistema (base de datos, memoria, uptime).

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "database": {
      "connected": true,
      "responseTime": 12,
      "tables": 18
    },
    "system": {
      "uptime": 86400,
      "memoryUsage": {
        "rss": 256000000,
        "heapTotal": 128000000,
        "heapUsed": 85000000
      },
      "nodeVersion": "v20.11.0",
      "platform": "linux"
    },
    "application": {
      "version": "1.0.0-zenith",
      "environment": "production",
      "timestamp": "2026-04-07T14:30:00.000Z"
    }
  }
}
```

---

### POST /api/admin/config/backup/trigger

Ejecuta un backup manual de la base de datos.

**Solicitud (opcional):**

```json
{
  "notes": "Backup manual previo a actualización del sistema"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "message": "Backup iniciado correctamente",
  "data": {
    "id": 25,
    "type": "manual",
    "status": "completed",
    "startedAt": "2026-04-07T15:00:00.000Z",
    "completedAt": "2026-04-07T15:02:30.000Z",
    "size": "245.8 MB",
    "notes": "Backup manual previo a actualización del sistema"
  }
}
```

---

### GET /api/admin/config/audit-logs

Obtiene los registros de auditoría con filtros.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |
| `action` | string | Tipo de acción: `CREATE`, `UPDATE`, `DELETE`, `LOGIN`, `LOGOUT` | `UPDATE` |
| `entity` | string | Entidad afectada: `User`, `Product`, `Sale`, `Config` | `User` |
| `userId` | number | Filtrar por usuario | `1` |
| `startDate` | date | Fecha de inicio | `2026-04-01` |
| `endDate` | date | Fecha de fin | `2026-04-07` |
| `search` | string | Buscar en acción, entidad o ID | `usuario` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "logs": [
      {
        "id": 1025,
        "userId": 1,
        "action": "UPDATE",
        "entity": "User",
        "entityId": "5",
        "details": {
          "userEmail": "nuevo@lacima.com",
          "changes": {
            "role": { "old": "USER", "new": "MANAGER" }
          }
        },
        "createdAt": "2026-04-07T10:30:00.000Z",
        "user": {
          "id": 1,
          "name": "Admin Principal",
          "email": "admin@lacima.com",
          "role": "ADMIN"
        }
      },
      {
        "id": 1024,
        "userId": 1,
        "action": "CREATE",
        "entity": "Product",
        "entityId": "46",
        "details": {
          "sku": "FA-BOSCH-002",
          "name": "Filtro de Aire Bosch"
        },
        "createdAt": "2026-04-07T09:00:00.000Z",
        "user": {
          "id": 1,
          "name": "Admin Principal",
          "email": "admin@lacima.com",
          "role": "ADMIN"
        }
      }
    ],
    "pagination": {
      "total": 1025,
      "page": 1,
      "limit": 20,
      "totalPages": 52
    }
  }
}
```

---

### GET /api/admin/users

Lista todos los usuarios del sistema.

**Parámetros de Consulta:**

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `role` | string | Filtrar por rol: `ADMIN`, `MANAGER`, `USER` | `ADMIN` |
| `page` | number | Página | `1` |
| `limit` | number | Items por página | `20` |
| `search` | string | Buscar por email o nombre | `Carlos` |

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "users": [
      {
        "id": 1,
        "email": "admin@lacima.com",
        "name": "Admin Principal",
        "role": "ADMIN",
        "createdAt": "2026-01-01T00:00:00.000Z",
        "updatedAt": "2026-01-01T00:00:00.000Z",
        "_count": { "sales": 120 }
      },
      {
        "id": 3,
        "email": "carlos@lacima.com",
        "name": "Carlos Mendoza",
        "role": "USER",
        "createdAt": "2026-02-15T08:00:00.000Z",
        "updatedAt": "2026-03-20T10:00:00.000Z",
        "_count": { "sales": 95 }
      }
    ],
    "pagination": {
      "total": 8,
      "page": 1,
      "limit": 20,
      "totalPages": 1
    }
  }
}
```

---

### POST /api/admin/users

Crea un nuevo usuario del sistema.

**Solicitud:**

```json
{
  "email": "maria@lacima.com",
  "name": "María Fernández",
  "role": "MANAGER",
  "password": "Contraseñ4Segur4!"
}
```

**Respuesta Exitosa (201):**

```json
{
  "status": "success",
  "data": {
    "id": 9,
    "email": "maria@lacima.com",
    "name": "María Fernández",
    "role": "MANAGER",
    "createdAt": "2026-04-07T09:00:00.000Z"
  },
  "message": "Usuario creado correctamente"
}
```

---

### PUT /api/admin/users/:id

Actualiza un usuario existente.

**Solicitud:**

```json
{
  "name": "María Fernández de López",
  "email": "maria.lopez@lacima.com"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 9,
    "email": "maria.lopez@lacima.com",
    "name": "María Fernández de López",
    "role": "MANAGER",
    "createdAt": "2026-04-07T09:00:00.000Z",
    "updatedAt": "2026-04-07T10:30:00.000Z"
  },
  "message": "Usuario actualizado correctamente"
}
```

---

### PUT /api/admin/users/:id/role

Actualiza el rol de un usuario.

**Solicitud:**

```json
{
  "role": "ADMIN"
}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "id": 9,
    "email": "maria.lopez@lacima.com",
    "name": "María Fernández de López",
    "role": "ADMIN",
    "updatedAt": "2026-04-07T11:00:00.000Z"
  },
  "message": "Rol del usuario actualizado a ADMIN"
}
```

---

### POST /api/admin/users/:id/reset-password

Restablece la contraseña de un usuario.

**Solicitud (con contraseña específica):**

```json
{
  "password": "NuevaContraseñ4!"
}
```

**Solicitud (generar contraseña temporal):**

```json
{}
```

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "user": {
      "id": 9,
      "email": "maria.lopez@lacima.com",
      "name": "María Fernández de López",
      "role": "ADMIN"
    },
    "passwordGenerated": true
  },
  "message": "Contrasena restablecida correctamente. Contrasena temporal generada.",
  "tempPassword": "Tmp-2026-Xk9#mP"
}
```

---

### POST /api/admin/users/:id/deactivate

Desactiva un usuario del sistema.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "message": "Usuario desactivado correctamente",
  "data": {
    "id": 9,
    "email": "maria.lopez@lacima.com",
    "name": "María Fernández de López",
    "deactivated": true
  }
}
```

---

### GET /api/admin/users/sessions

Obtiene las sesiones activos de los usuarios.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "sessions": [
      {
        "userId": 1,
        "email": "admin@lacima.com",
        "name": "Admin Principal",
        "role": "ADMIN",
        "lastActivity": "2026-04-07T14:30:00.000Z",
        "isActive": true
      },
      {
        "userId": 3,
        "email": "carlos@lacima.com",
        "name": "Carlos Mendoza",
        "role": "USER",
        "lastActivity": "2026-04-07T13:00:00.000Z",
        "isActive": true
      }
    ],
    "total": 2,
    "note": "El seguimiento de sesiones activo requiere un almacén de sesiones dedicado (Redis, etc.)"
  }
}
```

---

### POST /api/admin/users/:id/force-logout

Fuerza el cierre de sesión de un usuario.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "message": "Sesion del usuario carlos@lacima.com cerrada correctamente",
  "data": {
    "userId": 3,
    "email": "carlos@lacima.com",
    "forceLoggedOut": true
  }
}
```

---

### GET /api/admin/config/system/tasks

Obtiene información sobre las tareas programadas del sistema.

**Respuesta Exitosa (200):**

```json
{
  "status": "success",
  "data": {
    "tasks": [
      {
        "id": "backup_daily",
        "name": "Backup Diario",
        "schedule": "0 2 * * *",
        "description": "Backup automatico de base de datos a las 2:00 AM",
        "enabled": true,
        "lastRun": null,
        "nextRun": "Calculado al proximo dia a las 2:00 AM"
      },
      {
        "id": "inventory_sync",
        "name": "Sincronizacion de Inventario",
        "schedule": "0 */6 * * *",
        "description": "Sincronizacion de stock cada 6 horas",
        "enabled": true,
        "lastRun": null,
        "nextRun": "Calculado cada 6 horas"
      },
      {
        "id": "audit_cleanup",
        "name": "Limpieza de Auditoria",
        "schedule": "0 3 * * 0",
        "description": "Eliminacion de logs de auditoria mayores a 90 dias",
        "enabled": false,
        "lastRun": null,
        "nextRun": "No programado (deshabilitado)"
      },
      {
        "id": "payroll_process",
        "name": "Procesamiento de Nomina",
        "schedule": "0 6 1 * *",
        "description": "Procesamiento automatico de nomina mensual",
        "enabled": true,
        "lastRun": null,
        "nextRun": "Calculado al primer dia del mes a las 6:00 AM"
      }
    ],
    "total": 4,
    "enabled": 3
  }
}
```

---

## Códigos de Error

### Códigos HTTP

| Código | Significado | Descripción |
|--------|-------------|-------------|
| `200` | OK | Solicitud exitosa |
| `201` | Created | Recurso creado exitosamente |
| `400` | Bad Request | Solicitud inválida o datos incorrectos |
| `401` | Unauthorized | No autenticado o token inválido/expirado |
| `403` | Forbidden | Rol no autorizado para esta operación |
| `404` | Not Found | Recurso no encontrado |
| `409` | Conflict | Conflicto de datos duplicados (RIF, SKU, email) |
| `500` | Internal Server Error | Error interno del servidor |

### Formato de Error

Todos los errores siguen este formato:

```json
{
  "status": "error",
  "message": "Descripción legible del error"
}
```

### Errores Comunes

| Escenario | Código | Mensaje |
|-----------|--------|---------|
| Token ausente | 401 | `"Not authorized"` |
| Token expirado | 401 | `"Token failed"` |
| Rol insuficiente | 403 | `"Role USER is not authorized"` |
| SKU duplicado | 409 | `"Ya existe un producto con ese SKU"` |
| RIF duplicado | 409 | `"Ya existe un proveedor con ese RIF"` |
| Cédula duplicada | 409 | `"Ya existe un empleado con esa cedula de identidad"` |
| Email duplicado | 409 | `"Ya existe un empleado con ese email"` |
| Factura duplicada | 409 | `"Ya existe una cuenta por cobrar con el numero de factura 'FAC-2026-0345'"` |
| Stock insuficiente | 400 | `"Stock insuficiente. Stock actual: 175, solicitado: 200"` |
| Venta ya cancelada | 400 | `"La venta ya esta cancelada"` |
| Nómina ya procesada | 400 | `"Esta nomina ya fue procesada"` |
| Cuenta no encontrada | 404 | `"Cuenta no encontrada"` |
| Producto no encontrado | 404 | `"Producto no encontrado"` |
| Proveedor no encontrado | 404 | `"Proveedor no encontrado"` |
| Empleado no encontrado | 404 | `"Empleado no encontrado"` |
| Usuario no encontrado | 404 | `"Usuario no encontrado"` |
| Venta no encontrada | 404 | `"Venta no encontrada"` |
| Orden no encontrada | 404 | `"Orden de compra no encontrada"` |
| Nómina no encontrada | 404 | `"Nomina no encontrada"` |

---

## Rate Limiting

El sistema implementa límites de peticiones para proteger contra abusos:

| Parámetro | Valor por Defecto | Descripción |
|-----------|-------------------|-------------|
| **Ventana de tiempo** | 15 minutos | Período de evaluación |
| **Máximo de peticiones** | 100 | Por IP por ventana |
| **Encabezados estándar** | Habilitados | `RateLimit-*` headers |

**Respuesta al exceder el límite (429):**

```json
{
  "status": "error",
  "message": "Demasiadas peticiones, por favor intente de nuevo más tarde."
}
```

**Encabezados de Rate Limiting:**

```
RateLimit-Limit: 100
RateLimit-Remaining: 95
RateLimit-Reset: 1712505600
```

> **Nota:** Los valores pueden ajustarse mediante las variables de entorno `RATE_LIMIT_WINDOW_MS` y `RATE_LIMIT_MAX_REQUESTS`.

---

## Ejemplos de Código

### JavaScript / Fetch API

```javascript
const API_BASE = 'https://tu-api.aqui.com/api';

// Login
async function login(email, password) {
  const response = await fetch(`${API_BASE}/auth/login`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, password })
  });

  const data = await response.json();
  if (data.status === 'success') {
    localStorage.setItem('token', data.token);
    return data.user;
  }
  throw new Error(data.message);
}

// Obtener productos con filtros
async function getProducts({ page = 1, limit = 20, category, search, stockStatus } = {}) {
  const params = new URLSearchParams({ page, limit });
  if (category) params.append('category', category);
  if (search) params.append('search', search);
  if (stockStatus) params.append('stockStatus', stockStatus);

  const response = await fetch(`${API_BASE}/inventory/products?${params}`, {
    headers: {
      'Authorization': `Bearer ${localStorage.getItem('token')}`
    }
  });

  const data = await response.json();
  if (data.status === 'success') {
    return data.data;
  }
  throw new Error(data.message);
}

// Crear una venta
async function createSale(items, paymentMethod, discount = 0) {
  const response = await fetch(`${API_BASE}/sales`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${localStorage.getItem('token')}`
    },
    body: JSON.stringify({ items, paymentMethod, discount })
  });

  const data = await response.json();
  if (data.status === 'success') {
    return data.data;
  }
  throw new Error(data.message);
}
```

### Python (Requests)

```python
import requests

API_BASE = 'https://tu-api.aqui.com/api'

class ZenithClient:
    def __init__(self, base_url=API_BASE):
        self.base_url = base_url
        self.session = requests.Session()
        self.token = None

    def login(self, email, password):
        response = self.session.post(
            f'{self.base_url}/auth/login',
            json={'email': email, 'password': password}
        )
        data = response.json()
        if data['status'] == 'success':
            self.token = data['token']
            self.session.headers['Authorization'] = f'Bearer {self.token}'
            return data['user']
        raise Exception(data['message'])

    def get_products(self, page=1, limit=20, category=None, search=None, stock_status=None):
        params = {'page': page, 'limit': limit}
        if category:
            params['category'] = category
        if search:
            params['search'] = search
        if stock_status:
            params['stockStatus'] = stock_status

        response = self.session.get(f'{self.base_url}/inventory/products', params=params)
        data = response.json()
        if data['status'] == 'success':
            return data['data']
        raise Exception(data['message'])

    def create_sale(self, items, payment_method, discount=0):
        response = self.session.post(
            f'{self.base_url}/sales',
            json={'items': items, 'paymentMethod': payment_method, 'discount': discount}
        )
        data = response.json()
        if data['status'] == 'success':
            return data['data']
        raise Exception(data['message'])

    def get_sales_summary(self, start_date=None, end_date=None):
        params = {}
        if start_date:
            params['startDate'] = start_date
        if end_date:
            params['endDate'] = end_date

        response = self.session.get(f'{self.base_url}/sales/summary', params=params)
        data = response.json()
        if data['status'] == 'success':
            return data['data']
        raise Exception(data['message'])

    def calculate_payroll(self, employee_id, month, year, overtime_hours=0):
        response = self.session.post(
            f'{self.base_url}/hr/payrolls/calculate',
            json={
                'employeeId': employee_id,
                'month': month,
                'year': year,
                'overtimeHours': overtime_hours,
                'includeCestaTicket': True
            }
        )
        data = response.json()
        if data['status'] == 'success':
            return data['data']
        raise Exception(data['message'])


# Ejemplo de uso
if __name__ == '__main__':
    client = ZenithClient()

    # Login
    user = client.login('admin@lacima.com', 'Contraseñ4Segur4!')
    print(f'Conectado como: {user["name"]} ({user["role"]})')

    # Obtener productos con stock bajo
    low_stock = client.get_products(stock_status='low-stock', limit=50)
    print(f'Productos con stock bajo: {low_stock["count"]}')

    # Resumen de ventas del mes
    summary = client.get_sales_summary(start_date='2026-04-01', end_date='2026-04-30')
    print(f'Ventas totales: {summary["totalSales"]}')
    print(f'Ingresos: Bs. {summary["revenue"]:,.2f}')
```

### cURL

```bash
# Login
curl -X POST https://tu-api.aqui.com/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email": "admin@lacima.com", "password": "Contraseñ4Segur4!"}'

# Guardar el token
TOKEN="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."

# Obtener productos
curl -X GET "https://tu-api.aqui.com/api/inventory/products?page=1&limit=20&category=Filtros" \
  -H "Authorization: Bearer $TOKEN"

# Crear una venta
curl -X POST https://tu-api.aqui.com/api/sales \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer $TOKEN" \
  -d '{
    "items": [
      { "productId": 1, "quantity": 4, "price": 450.00 },
      { "productId": 12, "quantity": 2, "price": 890.00 }
    ],
    "paymentMethod": "EFECTIVO",
    "discount": 50.00
  }'

# Obtener resumen financiero
curl -X GET "https://tu-api.aqui.com/api/finance/dashboard" \
  -H "Authorization: Bearer $TOKEN"

# Crear un asiento contable
curl -X POST https://tu-api.aqui.com/api/accounting/journal-entries \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer $TOKEN" \
  -d '{
    "date": "2026-04-07",
    "description": "Registro de compra de inventario",
    "lines": [
      { "accountId": 5, "debit": 42000.00, "credit": 0, "description": "Mercancia" },
      { "accountId": 1, "debit": 0, "credit": 42000.00, "description": "Pago banco" }
    ]
  }'

# Calcular depreciación de activos fijos
curl -X POST https://tu-api.aqui.com/api/finance/fixed-assets/1/depreciate \
  -H "Authorization: Bearer $TOKEN"

# Trigger de backup manual
curl -X POST https://tu-api.aqui.com/api/admin/config/backup/trigger \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer $TOKEN" \
  -d '{"notes": "Backup manual semanal"}'
```

---

## Notas Importantes

### Moneda

Todos los montos están expresados en **Bolívares (Bs.)**, la moneda oficial de la República Bolivariana de Venezuela.

### Impuestos

- **IVA (Impuesto al Valor Agregado):** 16% (configurable)
- Las ventas exentas de IVA se registran con `tax: 0`
- El reporte de impuestos consolida IVA débito y crédito

### Reglas de Negocio

1. **Inventario:** No se permite stock negativo. Las salidas de stock se validan contra el inventario disponible.
2. **Ventas:** Solo ADMIN y MANAGER pueden cancelar ventas. Las ventas canceladas restauran automáticamente el inventario.
3. **Órdenes de Compra:** Solo se pueden recibir órdenes en estado `APPROVED`. Las órdenes canceladas no se pueden recibir.
4. **Nómina:** Un empleado no puede tener dos nóminas para el mismo mes/año. Las nóminas procesadas no se pueden modificar.
5. **Asientos Contables:** Deben estar balanceados (total débitos = total créditos) antes de ser contabilizados.
6. **Cuentas por Cobrar:** El monto pagado no puede exceder el monto total de la factura.
7. **Usuarios:** Un ADMIN no puede desactivar su propia cuenta ni forzar el cierre de su propia sesión.

### Auditoría

Todas las acciones críticas se registran en el log de auditoría:
- Creación, modificación y eliminación de registros
- Cambios de rol y restablecimiento de contraseñas
- Operaciones de inventario (entradas, salidas, ajustes)
- Cancelación de ventas y órdenes de compra
- Backups manuales y cambios de configuración

---

## Contacto y Soporte

Para consultas sobre la API, soporte técnico o reportes de errores:

- **Empresa:** Mayor de Repuesto La Cima, C.A.
- **Sistema:** Zenith ERP v1.0.0-zenith
- **Documentación:** `/docs/API_DOCUMENTACION.md`

---

*Documento generado el 7 de abril de 2026 -- Mayor de Repuesto La Cima, C.A. -- Todos los derechos reservados.*