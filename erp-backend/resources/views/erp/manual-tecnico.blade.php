# Manual Técnico: Ecosistema ERP & E-commerce "Industrial Forge"
## Cliente: MAYOR DE REPUESTO LA CIMA, C.A. (RIF: J-40308741-5)

### 1. Visión General del Sistema
El ecosistema desarrollado para "La Cima" es una solución integral que combina una plataforma de comercio electrónico orientada al cliente con un robusto Sistema de Planificación de Recursos Empresariales (ERP) de grado industrial. El sistema está diseñado bajo la filosofía "Industrial Forge", priorizando la densidad de datos, la precisión técnica y el cumplimiento estricto de las normativas legales venezolanas (LOTTT, SENIAT, ISLR, NIIF).

---

### 2. Arquitectura de Datos y Persistencia
- **Motor de Persistencia:** Basado en `localStorage` con una capa de abstracción de base de datos relacional simulada.
- **Interconexión:** Todos los módulos comparten un bus de datos común a través de claves compartidas en el navegador, permitiendo sincronización en tiempo real entre Ventas, Inventario y Contabilidad.
- **Seguridad:** Implementación de cifrado para datos sensibles, 2FA simulado para accesos administrativos y logs de auditoría inmutables por sesión.

---

### 3. Módulos y Funcionalidades Principales

#### 3.1. E-commerce Público
- **Flujo de Usuario:** Landing Page → Catálogo (Grid/List) → Búsqueda Avanzada → Carrito de Compras (LocalStorage) → Autenticación → Checkout.
- **Componentes:** Navbar con contador de items dinámico, Footer con información legal completa y página de "Nosotros" con mapa de ubicación en Valencia.

#### 3.2. Módulo de Inventario (Corazón Operativo)
- **Cumplimiento Legal:** Valuación por **Costo Promedio Ponderado** (Art. 177 ISLR).
- **Herramientas:** Kardex valorizado, control de stock mínimo/máximo, auditoría física mediante conteos ciegos y actas de ajuste con soporte documental.
- **Integración:** Actualiza automáticamente el Libro de Inventarios y Balances.

#### 3.3. Módulo de Ventas & Facturación
- **POS Industrial:** Interfaz de alta velocidad con validación de existencia en tiempo real.
- **Facturación Fiscal:** Emisión de facturas con número de control, QR simulado y cálculo automático de retenciones de IVA (75%) e ISLR (1.5%).
- **Documentos:** Factura Digital, Vista Previa de Impresión y Notas de Crédito para anulaciones.

#### 3.4. Módulo de Compras & Proveedores
- **Gestión B2B:** Registro de facturas de compra, aumento de stock y recalculo de costo promedio.
- **Libros:** Generación automática del Libro de Compras Fiscal.

#### 3.5. Módulo de Finanzas & Contabilidad
- **Contabilidad Central:** Generación de asientos automáticos por cada transacción operativa (Ventas, Compras, Nómina).
- **Estados Financieros:** Balance General, Estado de Resultados (P&G) y Balance de Comprobación generados bajo NIIF para PYMES.
- **Tesorería:** Gestión de Cuentas por Cobrar/Pagar y Libro de Caja/Bancos.

#### 3.6. Módulo de Recursos Humanos (RRHH)
- **Nómina Venezolana:** Cálculos según LOTTT (Cesta Ticket, IVSS, FAOV, INCES).
- **Pasivo Laboral:** Provisión automática de prestaciones sociales e intereses de antigüedad.
- **Portal del Empleado:** Auto-gestión de recibos de pago y consulta de vacaciones.

#### 3.7. Administración y Configuración Central
- **Cerebro del ERP:** Gestión de permisos granulares por rol, flujos de aprobación gerencial y configuración de parámetros globales (Tasa de cambio, RIF, Tasas de Impuesto).
- **Mantenimiento:** Herramientas de Backup/Restore en formato JSON y Tareas Programadas (Cron Jobs).

---

### 4. Soporte y Mantenimiento
- **Centro de Soporte:** Sistema de tickets integrado con prioridad por severidad.
- **Documentación:** Base de conocimientos con manuales operativos para procesos críticos (ej. Cierre Fiscal).
- **Estado del Sistema:** Monitor de salud de base de datos y logs de ciberseguridad.

---

### 5. Guía de Archivos y Pantallas (Mapa del Sistema)
El sistema consta de **67 pantallas** interconectadas. Los archivos fuente utilizan Vanilla JavaScript para garantizar la portabilidad y el rendimiento sin dependencias externas pesadas, utilizando únicamente CDN para Iconografía (FontAwesome) y Gráficos (Chart.js).

**Nota de Implementación:** Para desplegar el sistema, asegúrese de que el dominio tenga habilitado el acceso a `localStorage` y que los scripts de seguridad no bloqueen la capa de abstracción de la base de datos interna.
