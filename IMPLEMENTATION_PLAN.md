# Plan de Implementación - Sistema "Stitch La Cima"

## 1. Análisis del Sistema Actual

### 1.1 Stack Tecnológico
- **Backend**: Laravel 12+ (PHP 8.x)
- **Frontend**: Blade Templates + Tailwind CSS 4.0 + Vite
- **Base de datos**: MySQL
- **Búsqueda**: Laravel Scout

### 1.2 Estructura Actual

#### Frontend (Tienda - Público)
- Landing page con productos destacados
- Catálogo general (paginación 24)
- Catálogo detallado con filtros
- Detalle de producto con relacionados
- Carrito de compras
- Checkout y facturación

#### ERP (Admin)
- Dashboard principal
- Módulos: Inventario, Ventas, Compras, Contabilidad, RRHH, Finanzas, Configuración, Ayuda

#### Rutas principales:
- `/` → Tienda (público)
- `/erp/*` → Panel administrativo (autenticado)
- `/frontend/*` → Bridge para archivos estáticos legacy

### 1.3 Modelos Actuales
- Product, Order, OrderItem, Customer, User
- StockMovement (Kardex)
- Notification, Approval

---

## 2. Resumen de Funcionalidades Actuales vs Pendientes

### Estado Actual del Proyecto
| Módulo | Estado | Completado |
|--------|--------|------------|
| Inventario CRUD | ✅ | Productos, desarrollo, kardex, ajustes |
| Ventas/POS | ✅ | POS, clientes, facturación, notas crédito |
| Contabilidad | ⚠️ | Plan cuentas, libro diario/ventas/caja |
| RRHH | ⚠️ | Empleados, portal |
| Tienda básica | ✅ | Catálogo, carrito, checkout |

### Pendiente ( según requerimientos )
| Módulo | Descripción | Prioridad |
|--------|-------------|-----------|
| Tienda Auth | Login/registro clientes + portal | 🔴 Alta |
| Pagos Online | PayPal integración | 🔴 Alta |
| Carrito avanzado | Persistencia DB + wishlist | 🔴 Alta |
| Stock tiempo real | Validación en tiempo real | 🔴 Alta |
| Reportes KPIs | Dashboard con métricas | 🔴 Alta |
| Exportación | Excel/PDF | 🔴 Alta |
| Gráficos | Chart.js visualizaciones | 🟡 Media |

---

## 3. Plan de Implementación Mejorado

### Fase 1: Autenticación Tienda (Completado ✅)
*Nota: Se optó por una arquitectura de vinculación donde el perfil `Customer` se asocia a un registro en la tabla `Users` con el rol `cliente`, centralizando la seguridad.*

---

### Fase 2: Pagos Online + Carrito Avanzado (5 días)

#### 2.1 PayPal Integration
- [ ] Configurar `.env`:
```
PAYPAL_MODE=sandbox
PAYPAL_CLIENT_ID=xxx
PAYPAL_SECRET=xxx
```

- [ ] Instalar SDK: `composer require srmklive/paypal:~3.0`

- [ ] Crear `app/Services/PaymentService.php`:
```php
class PaymentService {
    public function createOrder($amount, $currency = 'USD');
    public function captureOrder($orderId);
    public function refundOrder($transactionId, $amount);
}
```

- [ ] Crear webhook route:
```php
Route::post('/api/tienda/webhook/paypal', [PaymentController::class, 'handleWebhook']);
```

- [ ] Actualizar checkout para validar pago antes de crear orden

#### 2.2 Carrito Persistente
- [ ] Crear migración `create_tienda_carts_table`:
  - id, user_id (nullable), product_id, cantidad, created_at, updated_at

- [ ] Crear modelo `app/Models/TiendaCart.php`

- [ ] Crear migración `create_tienda_wishlists_table`:
  - id, user_id, product_id, created_at

- [ ] Crear modelo `app/Models/TiendaWishlist.php`

- [ ] Actualizar `TiendaController.agregarCarrito()` para usar DB

- [ ] Crear API endpoints:
  - `GET /api/tienda/carrito`
  - `POST /api/tienda/wishlist`
  - `DELETE /api/tienda/wishlist/{id}`
  - `GET /api/tienda/wishlist`

- [ ] Sync carrito sesión → DB al hacer login

#### 2.3 Stock Tiempo Real
- [ ] Crear endpoint `GET /api/tienda/productos/{id}/stock`
- [ ] Validar stock en `agregarCarrito()` antes de agregar
- [ ] No mostrar productos sin stock en catálogo público
- [ ] Mostrar indicador de disponibilidad en UI
- [ ] Crear Job `SyncTiendaStock` (opcional: actualizar cada 5 min)

---

### Fase 3: Reportes y Dashboard (5 días)

#### 3.1 ReportesService
- [ ] Crear `app/Services/ReportesService.php`:

```php
class ReportesService {
    public function getVentasDia();           // Ventas hoy
    public function getVentasSemana();        // Últimos 7 días
    public function getVentasMes();           // Mes actual
    public function getVentasPorPeriodo($inicio, $fin);
    public function getTopProductos($limite = 10, $dias = 30);
    public function getClientesActivos($dias = 30);
    public function getStockBajo();
    public function getInventarioValorizado();
    public function getVentasPorCategoria();
}
```

#### 3.2 Dashboard View
- [ ] Crear `resources/views/erp/reportes/dashboard.blade.php`
- [ ] Cards KPIs:
  - Ventas hoy ($)
  - Órdenes pendientes (count)
  - Productos stock bajo (count)
  - Clientes nuevos mes (count)
- [ ] Gráficos:
  - Ventas últimos 30 días (bar)
  - Top 5 productos (horizontal bar)

#### 3.3 Reportes Ventas Mejorados
- [ ] Mejorar `VentasController@reportes`
- [ ] Agregar filtros: fecha inicio/fin, cliente, vendedor, estado
- [ ] Mejorar vista `erp/ventas/reportes.blade.php`
- [ ] Agregar resumen por período

#### 3.4 Reportes Inventario
- [ ] Mejorar `InventoryController@reportes`
- [ ] Filtros: categoría, ubicación, rango stock
- [ ] Calcular valor total inventario
- [ ] Agregar a vista `erp/inventario/reportes.blade.php`

---

### Fase 4: Exportación y Gráficos (5 días)

#### 4.1 Exportación Excel/PDF
- [ ] Instalar: `composer require maatwebsite/excel`
- [ ] Instalar: `composer require barryvdh/laravel-dompdf`
- [ ] Configurar `config/excel.php`

- [ ] Crear exports en `app/Exports/`:
  - `VentasExport.php` - FromArray + headers
  - `InventarioExport.php` - Con fórmulas de valor
  - `PedidosExport.php` - Detalle por orden

- [ ] Crear controller `ExportController`:
```php
Route::get('/export/ventas', [ExportController::class, 'ventasExcel']);
Route::get('/export/inventario', [ExportController::class, 'inventarioExcel']);
Route::get('/export/pedidos', [ExportController::class, 'pedidosExcel']);
```

- [ ] Agregar botones en vistas de reportes

#### 4.2 Gráficos
- [ ] Verificar/instalar: `npm install chart.js`
- [ ] Crear componente Livewire `ChartComponent.php`
- [ ] Charts a implementar:
  - Ventas diarias 30 días (line/bar)
  - Ventas por categoría (pie/doughnut)
  - Evolución stock (line)
  - Ventas por vendedor (horizontal bar)
- [ ] Integrar en dashboard y reportes

---

## 4. Dependencias a Instalar

### Backend
```bash
composer require srmklive/paypal:~3.0
composer require maatwebsite/excel
composer require barryvdh/laravel-dompdf
```

### Frontend
```bash
npm install chart.js
npm install datatables.net --save
```

---

## 5. Roadmap de Implementación

| Semana | Fase | Entregable |
|--------|------|-------------|
| 1 | Auth Tienda | Login/register clientes funcionando |
| 2 | Pagos + Carrito | Checkout con PayPal, wishlist |
| 3 | Reportes KPIs | Dashboard con métricas |
| 4 | Export + Charts | Excel/PDF, gráficos |

**Total estimado**: 20 días laborables

---

## 6. Notas Técnicas

- Frontend legacy embebido en `stitch/`, accesible vía `/frontend/{path}`
- Sistema usa Tailwind CSS 4.0 con Vite
- Livewire existente: `payroll-wizard.blade.php`
- GridStack para layouts drag-and-drop
- Driver.js para tutoriales guiados

---

## 7. Correcciones Realizadas (2026-04-15)

- Corregido InvoiceController: faltaba import de `Auth`
- Regenerado seeding de base de datos

**Credenciales de acceso**: admin@lacima.com / admin123

---

*Documento actualizado: 2026-04-15*