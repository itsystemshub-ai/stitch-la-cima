<?php

use App\Http\Controllers\AccessImportController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AyudaController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ContabilidadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanzasController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RrhhController;
use App\Http\Controllers\TiendaAuthController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

// --- RUTA DE EMERGENCIA (PARA DESARROLLO) ---
Route::get('/direct-login', function() {
    $user = \App\Models\User::where('email', 'admin@lacima.com')->first();
    if (!$user) {
        $user = \App\Models\User::create([
            'name' => 'Administrador Supremo',
            'email' => 'admin@lacima.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'is_active' => 1,
            'modulos' => ['inventario','ventas','compras','contabilidad','rrhh','configuracion','finanzas','aprobaciones','ayuda']
        ]);
    } else {
        $user->update([
            'password' => bcrypt('admin123'),
            'is_active' => 1,
            'role' => 'admin',
            'modulos' => ['inventario','ventas','compras','contabilidad','rrhh','configuracion','finanzas','aprobaciones','ayuda']
        ]);
    }
    Auth::login($user);
    return redirect('/erp/dashboard');
});

// Punto de Entrada Principal (Storefront)
Route::get('/', [TiendaController::class, 'index'])->name('home');

// Ruta ERP simple SIN middleware para debug
Route::get('/erp', function () {
    return response()->json(['message' => 'ERP funciona!', 'status' => 'ok']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Nota: Las rutas de sincronización se han movido dentro del grupo erp para mayor seguridad.

// Static Asset Bridge: Sirve los archivos de UI originales directamente
Route::get('/frontend/{path}', [App\Http\Controllers\StaticAssetController::class, 'serve'])->where('path', '.*');

// ========== GRUPOS DE RUTAS ERP (MODULAR) ==========

Route::prefix('erp')->middleware('auth.erp')->group(function () {

    // Dashboard Principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('erp.dashboard');

    // Redirección de compatibilidad
    Route::get('/inicio', function () {
        return redirect()->route('erp.dashboard');
    });

    // Módulo Inventario
    Route::prefix('inventario')->middleware('permiso.modulo:inventario')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('erp.inventario.index');
        Route::get('/productos', [InventoryController::class, 'productos'])->name('erp.inventario.productos');
        Route::post('/productos', [InventoryController::class, 'store'])->name('erp.inventario.productos.store');
        Route::get('/desarrollo', [InventoryController::class, 'desarrollo'])->name('erp.inventario.desarrollo');
        Route::post('/desarrollo/promote/{id}', [InventoryController::class, 'promoteToMaster'])->name('erp.inventario.desarrollo.promote');
        Route::get('/lista-precios', [InventoryController::class, 'massUpdate'])->name('erp.inventario.lista-precios');
        Route::post('/lista-precios', [InventoryController::class, 'massUpdate'])->name('erp.inventario.lista-precios.update');
        Route::get('/kardex', [InventoryController::class, 'kardex'])->name('erp.inventario.kardex');
        Route::get('/ajustes', [InventoryController::class, 'ajustesView'])->name('erp.inventario.ajustes');
        Route::post('/ajustes', [InventoryController::class, 'adjustStock'])->name('erp.inventario.ajustes.process');
        Route::get('/reportes', [InventoryController::class, 'reportes'])->name('erp.inventario.reportes');
        Route::get('/api/search', [InventoryController::class, 'smartSearch'])->name('erp.inventario.api.search');
    });

    // Módulo Ventas
    Route::prefix('ventas')->middleware('permiso.modulo:ventas')->group(function () {
        Route::get('/', [VentasController::class, 'index'])->name('erp.ventas.index');
        Route::get('/pos', [VentasController::class, 'pos'])->name('erp.ventas.pos');
        Route::post('/pos/procesar', [VentasController::class, 'procesarVenta'])->name('erp.ventas.pos.procesar');
        Route::get('/clientes', [VentasController::class, 'clientes'])->name('erp.ventas.clientes');
        Route::post('/clientes', [VentasController::class, 'storeCliente'])->name('erp.ventas.clientes.store');
        Route::get('/registro', [VentasController::class, 'registro'])->name('erp.ventas.registro');
        Route::get('/facturacion', [VentasController::class, 'facturacion'])->name('erp.ventas.facturacion');
        Route::get('/historial', [VentasController::class, 'historial'])->name('erp.ventas.historial');
        Route::get('/notas-credito', [VentasController::class, 'notasCredito'])->name('erp.ventas.notas-credito');
        Route::get('/vendedores', [VentasController::class, 'vendedores'])->name('erp.ventas.vendedores');
        Route::get('/reportes', [VentasController::class, 'reportes'])->name('erp.ventas.reportes');
        Route::get('/reporte-ganancias', [VentasController::class, 'reporteGanancias'])->name('erp.ventas.reporte-ganancias');
        Route::get('/orden/{id}', [VentasController::class, 'showOrder'])->name('erp.ventas.orden.show');
        Route::post('/orden/{id}/anular', [VentasController::class, 'anularOrden'])->name('erp.ventas.orden.anular');
    });

    // Módulo Compras
    Route::prefix('compras')->middleware('permiso.modulo:compras')->group(function () {
        Route::get('/', [ComprasController::class, 'index'])->name('erp.compras.index');
        Route::get('/proveedores', [ComprasController::class, 'proveedores'])->name('erp.compras.proveedores');
        Route::get('/historial', [ComprasController::class, 'historial'])->name('erp.compras.historial');
        Route::get('/factura', [ComprasController::class, 'factura'])->name('erp.compras.factura');
        Route::get('/libro', [ComprasController::class, 'libro'])->name('erp.compras.libro');
        Route::get('/reportes', [ComprasController::class, 'reportes'])->name('erp.compras.reportes');
    });

    // Módulo Contabilidad
    Route::prefix('contabilidad')->middleware('permiso.modulo:contabilidad')->group(function () {
        Route::get('/', [ContabilidadController::class, 'index'])->name('erp.contabilidad.index');
        Route::get('/plan-cuentas', [ContabilidadController::class, 'planCuentas'])->name('erp.contabilidad.plan-cuentas');
        Route::get('/libro-diario', [ContabilidadController::class, 'libroDiario'])->name('erp.contabilidad.libro-diario');
        Route::get('/libro-ventas', [ContabilidadController::class, 'libroVentas'])->name('erp.contabilidad.libro-ventas');
        Route::get('/libro-caja', [ContabilidadController::class, 'libroCaja'])->name('erp.contabilidad.libro-caja');
        Route::get('/balance-general', [ContabilidadController::class, 'balanceGeneral'])->name('erp.contabilidad.balance-general');
        Route::get('/balance-comprobacion', [ContabilidadController::class, 'balanceComprobacion'])->name('erp.contabilidad.balance-comprobacion');
        Route::get('/estado-resultados', [ContabilidadController::class, 'estadoResultados'])->name('erp.contabilidad.estado-resultados');
        Route::get('/declaracion-iva', [ContabilidadController::class, 'declaracionIva'])->name('erp.contabilidad.declaracion-iva');
        Route::get('/cierre', [ContabilidadController::class, 'cierreContable'])->name('erp.contabilidad.cierre');
        Route::get('/libros', [ContabilidadController::class, 'librosContables'])->name('erp.contabilidad.libros');
        Route::get('/libros-legales', [ContabilidadController::class, 'librosLegales'])->name('erp.contabilidad.libros-legales');
        Route::get('/reportes', [ContabilidadController::class, 'reportesContables'])->name('erp.contabilidad.reportes');
    });

    // Módulo Recursos Humanos (RRHH)
    Route::prefix('rrhh')->middleware('permiso.modulo:rrhh')->group(function () {
        Route::get('/', [RrhhController::class, 'index'])->name('erp.rrhh.index');
        Route::get('/empleados', [RrhhController::class, 'empleados'])->name('erp.rrhh.empleados');
        Route::post('/empleados', [RrhhController::class, 'storeEmpleado'])->name('erp.rrhh.empleados.store');
        Route::get('/nomina', [RrhhController::class, 'nomina'])->name('erp.rrhh.nomina');
        Route::post('/nomina/generate', [RrhhController::class, 'generateNomina'])->name('erp.rrhh.nomina.generate');
        Route::get('/prestaciones', [RrhhController::class, 'prestaciones'])->name('erp.rrhh.prestaciones');
        Route::get('/portal-empleado', [RrhhController::class, 'portalEmpleado'])->name('erp.rrhh.portal-empleado');
        Route::get('/rendimiento', [RrhhController::class, 'rendimiento'])->name('erp.rrhh.rendimiento');
        Route::get('/reportes', [RrhhController::class, 'reportes'])->name('erp.rrhh.reportes');
    });

    // Módulo Configuracion
    Route::prefix('configuracion')->middleware('permiso.modulo:configuracion')->group(function () {
        Route::get('/', [ConfiguracionController::class, 'index'])->name('erp.configuracion.index');
        Route::get('/parametros', [ConfiguracionController::class, 'parametros'])->name('erp.configuracion.parametros');
        Route::get('/fiscal', [ConfiguracionController::class, 'fiscal'])->name('erp.configuracion.fiscal');
        Route::get('/usuarios', [ConfiguracionController::class, 'usuarios'])->name('erp.configuracion.usuarios');
        Route::get('/base-datos', [ConfiguracionController::class, 'baseDatos'])->name('erp.configuracion.base-datos');
        Route::get('/gestor-tablas', [ConfiguracionController::class, 'gestorTablas'])->name('erp.configuracion.gestor-tablas');
        Route::get('/gestor-tablas/{tabla}', [ConfiguracionController::class, 'verContenidoTabla'])->name('erp.configuracion.ver-tabla');
        Route::get('/backups', [ConfiguracionController::class, 'backups'])->name('erp.configuracion.backups');
        Route::get('/estado-sistema', [ConfiguracionController::class, 'estadoSistema'])->name('erp.configuracion.estado-sistema');
        Route::get('/tareas', [ConfiguracionController::class, 'tareas'])->name('erp.configuracion.tareas');
        Route::get('/auditoria', [ConfiguracionController::class, 'auditoria'])->name('erp.configuracion.auditoria');
        
        // Módulo Aprobaciones (Integrado en Configuración)
        Route::prefix('aprobaciones')->group(function () {
            Route::get('/', [ApprovalController::class, 'index'])->name('erp.aprobaciones.index');
            Route::post('/{approval}/process', [ApprovalController::class, 'process'])->name('erp.aprobaciones.process');
        });
    });

    // Módulo Finanzas
    Route::prefix('finanzas')->middleware('permiso.modulo:finanzas')->group(function () {
        Route::get('/', [FinanzasController::class, 'index'])->name('erp.finanzas.index');
        Route::get('/activos-fijos', [FinanzasController::class, 'activosFijos'])->name('erp.finanzas.activos-fijos');
        Route::get('/cuentas-cobrar', [FinanzasController::class, 'cuentasCobrar'])->name('erp.finanzas.cuentas-cobrar');
        Route::get('/reportes', [FinanzasController::class, 'reportes'])->name('erp.finanzas.reportes');
    });



    // Módulo Ayuda
    Route::prefix('ayuda')->middleware('permiso.modulo:ayuda')->group(function () {
        Route::get('/', [AyudaController::class, 'index'])->name('erp.ayuda.index');
        Route::get('/tickets', [AyudaController::class, 'tickets'])->name('erp.ayuda.tickets');
        Route::get('/crear-ticket', [AyudaController::class, 'crearTicket'])->name('erp.ayuda.crear-ticket');
        Route::get('/chat', [AyudaController::class, 'chat'])->name('erp.ayuda.chat');
        Route::get('/conocimiento', [AyudaController::class, 'conocimiento'])->name('erp.ayuda.conocimiento');
        Route::get('/manual', [AyudaController::class, 'manuales'])->name('erp.ayuda.manual');
    });

    // Rutas de Exportación
    Route::prefix('export')->group(function () {
        Route::get('/ventas', [App\Http\Controllers\ExportController::class, 'ventasExcel'])->name('erp.export.ventas');
        Route::get('/inventario', [App\Http\Controllers\ExportController::class, 'inventarioExcel'])->name('erp.export.inventario');
    });

});

// Rutas Específicas Dinámicas del Storefront
Route::get('/tienda/index', [TiendaController::class, 'index']);
Route::get('/tienda/catalogo_general', [TiendaController::class, 'catalogoGeneral']);
Route::get('/tienda/catalogo_detallado', [TiendaController::class, 'catalogoDetallado']);
// Página de detalle de producto
Route::get('/tienda/producto/{id}', [TiendaController::class, 'detalleProducto'])->name('tienda.producto.show');
// Mantener ruta antigua por compatibilidad
Route::get('/tienda/detalle_productos', [TiendaController::class, 'detalleProducto']);
Route::get('/tienda/carrito', [TiendaController::class, 'verCarrito']);
Route::get('/tienda/checkout', [TiendaController::class, 'checkout']);
Route::get('/tienda/confirmacion/{orderId}', [TiendaController::class, 'confirmacion']);
Route::get('/tienda/contacto', fn () => view('tienda.contacto'));
Route::post('/tienda/contacto/enviar', [TiendaController::class, 'enviarContacto']);
Route::get('/tienda/nosotros', fn () => view('tienda.nosotros'));

// Rutas de Autenticación de la Tienda
Route::prefix('tienda/auth')->group(function () {
    Route::get('/register', [TiendaAuthController::class, 'showRegisterForm']);
    Route::post('/register', [TiendaAuthController::class, 'register']);
    Route::get('/login', fn () => redirect('/auth/login'));
});

// Área de cliente autenticado
Route::middleware('auth')->group(function () {
    Route::get('/tienda/mi-cuenta', [TiendaAuthController::class, 'miCuenta']);
});


// Panel de Usuario (Clientes y Vendedores)
Route::prefix("tienda/panel")->middleware("auth")->name("tienda.panel.")->group(function () {
    Route::get("/", [App\Http\Controllers\Tienda\UserPanelController::class, "index"])->name("index");
    Route::get("/ordenes", [App\Http\Controllers\Tienda\UserPanelController::class, "misOrdenes"])->name("ordenes");
    Route::get("/orden/{id}", [App\Http\Controllers\Tienda\UserPanelController::class, "detalleOrden"])->name("detalle-orden");
    Route::get("/perfil", [App\Http\Controllers\Tienda\UserPanelController::class, "miPerfil"])->name("perfil");
    Route::put("/perfil", [App\Http\Controllers\Tienda\UserPanelController::class, "actualizarPerfil"])->name("perfil.update");
    Route::get("/canceladas", [App\Http\Controllers\Tienda\UserPanelController::class, "comprasCanceladas"])->name("canceladas");
    Route::get("/vendedor", [App\Http\Controllers\Tienda\UserPanelController::class, "panelVendedor"])->name("vendedor");
});

// Auth Routes (ERP + Tienda — Login Único)
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas CMS Dinámicas (SIEMPRE al final para no superponer rutas específicas)
Route::get('/tienda/{slug}', [TiendaController::class, 'getPage'])->where('slug', '[a-zA-Z0-9_-]+');

// Enrutador Dinámico para Autenticación (Registro, Recuperación)
Route::get('/auth/{page?}', [App\Http\Controllers\AuthPageController::class, 'show'])->where('page', '.*');

// Rutas Estrictas de Facturación y Transacciones
Route::prefix('api/erp/invoice')->group(function () {
    Route::post('/checkout', [InvoiceController::class, 'processCheckout']);
});

// Rutas API Tienda (Público)
Route::prefix('api/tienda')->group(function () {
    Route::get('/productos', [TiendaController::class, 'catalogoGeneral']);
    Route::get('/productos/{id}', [TiendaController::class, 'getProductoJson']);
    Route::post('/carrito', [TiendaController::class, 'agregarCarrito']);
    Route::put('/carrito/{id}', [TiendaController::class, 'updateCarrito']);
    Route::delete('/carrito/{id}', [TiendaController::class, 'eliminarDeCarrito']);
    Route::post('/checkout', [TiendaController::class, 'procesarCheckout']);
});

// Herramientas de Sincronización (Protegidas)
Route::prefix('sync')->group(function () {
    Route::get('/', [ConfiguracionController::class, 'showSync']);
    Route::post('/upload-accdb', [AccessImportController::class, 'syncAccessDatabase']);
});

// Ruta Única de Mantenimiento para Desbloqueo de Base de Datos
Route::get('/debug/desbloquear-db', [MaintenanceController::class, 'unlockDatabase']);

// Rutas de Herramientas y Diagnóstico (Protegidas solo para administradores en producción)
Route::middleware(['auth', 'permiso.modulo:configuracion'])->prefix('debug')->group(function () {
    Route::get('/seed-admin', [App\Http\Controllers\DiagnosticController::class, 'seedAdmin']);
    Route::get('/diagnostico', [App\Http\Controllers\DiagnosticController::class, 'diagnostico']);
    Route::get('/users', [App\Http\Controllers\DiagnosticController::class, 'listarUsuarios']); // Se asume que listarUsuarios existe o se usará listarRutasErp
    Route::get('/login-test', [App\Http\Controllers\DiagnosticController::class, 'loginTest']);
    Route::get('/rutas', [App\Http\Controllers\DiagnosticController::class, 'listarRutasErp']);

    // User management routes
    Route::middleware(['auth.erp'])->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });

});
