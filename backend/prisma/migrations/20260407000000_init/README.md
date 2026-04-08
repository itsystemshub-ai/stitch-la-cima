# Migration Log
## Initial Database Schema

**Migration Name:** 20260407000000_init  
**Date:** 2026-04-07  
**Description:** Esquema inicial para Zenith ERP - La Cima, C.A.

### Tablas Creadas:
- `users` - Usuarios del sistema (ADMIN, MANAGER, EMPLOYEE, USER)
- `products` - Catálogo de productos con inventario
- `inventory_logs` - Registro de movimientos de inventario
- `sales` - Ventas realizadas
- `sale_items` - Detalle de items en cada venta
- `employees` - Registro de empleados
- `payrolls` - Nómina de empleados
- `categories` - Categorías de productos

### Índices Creados:
- Índices únicos en email (users), sku (products), dni (employees)
- Índices de búsqueda en category, brand, status
- Índices compuestos en payroll (year, month)

### Relaciones:
- users → sales (1:N)
- products → inventory_logs (1:N)
- products → sale_items (1:N)
- sales → sale_items (1:N)
- employees → payrolls (1:N)
