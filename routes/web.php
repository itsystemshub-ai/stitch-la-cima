<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessImportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ContabilidadController;
use App\Http\Controllers\RrhhController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\FinanzasController;
use App\Http\Controllers\AyudaController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

// Punto de Entrada Principal (Storefront)
Route::get('/', [TiendaController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




Route::prefix('erp/sync')->group(function () {
    Route::get('/', function () {
        return view('configuracion.sync');
    });
    Route::post('/upload-accdb', [AccessImportController::class, 'syncAccessDatabase']);
});

// Static Asset Bridge: Sirve los archivos de UI originales directamente
Route::get('/frontend/{path}', function ($path) {
    // Sanitize path to prevent traversal
    $path = str_replace(['../', '..\\'], '', $path);
    
    $absolutePath = base_path('stitch/' . $path);
    
    // Extra security: ensure real path is within the stitch directory
    $realPath = realpath($absolutePath);
    $stitchDir = realpath(base_path('stitch'));
    
    if (!$realPath || !str_starts_with($realPath, $stitchDir) || !File::exists($realPath)) { 
        abort(404); 
    }
    
    $file = File::get($realPath);
    $type = File::mimeType($realPath);
    if (str_ends_with($realPath, '.css')) { $type = 'text/css'; }
    elseif (str_ends_with($realPath, '.js')) { $type = 'application/javascript'; }
    elseif (str_ends_with($realPath, '.svg')) { $type = 'image/svg+xml'; }
    
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    // Agregamos cache control para no penalizar el rendimiento
    $response->header("Cache-Control", "max-age=86400, public");
    return $response;
})->where('path', '.*');

// ========== GRUPOS DE RUTAS ERP (MODULAR) ==========

Route::prefix('erp')->middleware('auth.erp')->group(function () {
    
    // Dashboard Principal
    // Dashboard Principal (ERP Inicio)
    Route::get('/dashboard', function () { 
        return view('erp.dashboard.index'); 
    })->name('erp.dashboard');

    // Redirección de compatibilidad
    Route::get('/inicio', function () { return redirect()->route('erp.dashboard'); });


    // Módulo Inventario
    Route::prefix('inventario')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('erp.inventario.index');
        Route::get('/productos', [InventoryController::class, 'productos'])->name('erp.inventario.productos');
        Route::post('/productos', [InventoryController::class, 'store'])->name('erp.inventario.productos.store');
        Route::get('/desarrollo', [InventoryController::class, 'desarrollo'])->name('erp.inventario.desarrollo');
        Route::post('/desarrollo/promote/{id}', [InventoryController::class, 'promoteToMaster'])->name('erp.inventario.desarrollo.promote');
        Route::get('/lista-precios', [InventoryController::class, 'massUpdate'])->name('erp.inventario.lista-precios');
        Route::post('/lista-precios', [InventoryController::class, 'massUpdate'])->name('erp.inventario.lista-precios.update');
        Route::get('/kardex', [InventoryController::class, 'kardex'])->name('erp.inventario.kardex');
        Route::get('/auditoria', [InventoryController::class, 'auditoria'])->name('erp.inventario.auditoria');
        Route::get('/ajustes', [InventoryController::class, 'ajustesView'])->name('erp.inventario.ajustes');
        Route::post('/ajustes', [InventoryController::class, 'adjustStock'])->name('erp.inventario.ajustes.process');
        Route::get('/reportes', [InventoryController::class, 'reportes'])->name('erp.inventario.reportes');
    });

    // Módulo Ventas
    Route::prefix('ventas')->group(function () {
        Route::get('/', [VentasController::class, 'index'])->name('erp.ventas.index');
        Route::get('/pos', [VentasController::class, 'pos'])->name('erp.ventas.pos');
        Route::get('/clientes', [VentasController::class, 'clientes'])->name('erp.ventas.clientes');
        Route::get('/registro', [VentasController::class, 'registro'])->name('erp.ventas.registro');
        Route::get('/facturacion', [VentasController::class, 'facturacion'])->name('erp.ventas.facturacion');
        Route::get('/historial', [VentasController::class, 'historial'])->name('erp.ventas.historial');
        Route::get('/notas-credito', [VentasController::class, 'notasCredito'])->name('erp.ventas.notas-credito');
        Route::get('/vendedores', [VentasController::class, 'vendedores'])->name('erp.ventas.vendedores');
        Route::get('/reportes', [VentasController::class, 'reportes'])->name('erp.ventas.reportes');
    });

    // Módulo Compras
    Route::prefix('compras')->group(function () {
        Route::get('/', [ComprasController::class, 'index'])->name('erp.compras.index');
        Route::get('/proveedores', [ComprasController::class, 'proveedores'])->name('erp.compras.proveedores');
        Route::get('/historial', [ComprasController::class, 'historial'])->name('erp.compras.historial');
        Route::get('/factura', [ComprasController::class, 'factura'])->name('erp.compras.factura');
        Route::get('/libro', [ComprasController::class, 'libro'])->name('erp.compras.libro');
        Route::get('/reportes', [ComprasController::class, 'reportes'])->name('erp.compras.reportes');
    });

    // Módulo Contabilidad
    Route::prefix('contabilidad')->group(function () {
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
        Route::get('/libros-legales', [ContabilidadController::class, 'librosLegales'])->name('erp.contabilidad.libros-legales');
        Route::get('/reportes', [ContabilidadController::class, 'reportesContables'])->name('erp.contabilidad.reportes');
    });
    
    // Módulo Recursos Humanos (RRHH)
    Route::prefix('rrhh')->group(function () {
        Route::get('/', [RrhhController::class, 'index'])->name('erp.rrhh.index');
        Route::get('/empleados', [RrhhController::class, 'empleados'])->name('erp.rrhh.empleados');
        Route::get('/nomina', [RrhhController::class, 'nomina'])->name('erp.rrhh.nomina');
        Route::get('/prestaciones', [RrhhController::class, 'prestaciones'])->name('erp.rrhh.prestaciones');
        Route::get('/portal-empleado', [RrhhController::class, 'portalEmpleado'])->name('erp.rrhh.portal-empleado');
        Route::get('/rendimiento', [RrhhController::class, 'rendimiento'])->name('erp.rrhh.rendimiento');
        Route::get('/reportes', [RrhhController::class, 'reportes'])->name('erp.rrhh.reportes');
    });

    // Módulo Configuracion
    Route::prefix('configuracion')->group(function () {
        Route::get('/', [ConfiguracionController::class, 'index'])->name('erp.configuracion.index');
        Route::get('/parametros', [ConfiguracionController::class, 'parametros'])->name('erp.configuracion.parametros');
        Route::get('/fiscal', [ConfiguracionController::class, 'fiscal'])->name('erp.configuracion.fiscal');
        Route::get('/usuarios', [ConfiguracionController::class, 'usuarios'])->name('erp.configuracion.usuarios');
        Route::get('/base-datos', [ConfiguracionController::class, 'baseDatos'])->name('erp.configuracion.base-datos');
        Route::get('/backups', [ConfiguracionController::class, 'backups'])->name('erp.configuracion.backups');
        Route::get('/estado-sistema', [ConfiguracionController::class, 'estadoSistema'])->name('erp.configuracion.estado-sistema');
        Route::get('/tareas', [ConfiguracionController::class, 'tareas'])->name('erp.configuracion.tareas');
        Route::get('/auditoria', [ConfiguracionController::class, 'auditoria'])->name('erp.configuracion.auditoria');
    });

    // Módulo Finanzas
    Route::prefix('finanzas')->group(function () {
        Route::get('/', [FinanzasController::class, 'index'])->name('erp.finanzas.index');
        Route::get('/activos-fijos', [FinanzasController::class, 'activosFijos'])->name('erp.finanzas.activos-fijos');
        Route::get('/cuentas-cobrar', [FinanzasController::class, 'cuentasCobrar'])->name('erp.finanzas.cuentas-cobrar');
        Route::get('/reportes', [FinanzasController::class, 'reportes'])->name('erp.finanzas.reportes');
    });

    // Módulo Aprobaciones
    Route::prefix('aprobaciones')->group(function () {
        Route::get('/', [ApprovalController::class, 'index'])->name('erp.aprobaciones.index');
        Route::post('/{approval}/process', [ApprovalController::class, 'process'])->name('erp.aprobaciones.process');
    });

    // Módulo Ayuda
    Route::prefix('ayuda')->group(function () {
        Route::get('/', [AyudaController::class, 'index'])->name('erp.ayuda.index');
        Route::get('/tickets', [AyudaController::class, 'tickets'])->name('erp.ayuda.tickets');
        Route::get('/crear-ticket', [AyudaController::class, 'crearTicket'])->name('erp.ayuda.crear-ticket');
        Route::get('/chat', [AyudaController::class, 'chat'])->name('erp.ayuda.chat');
        Route::get('/conocimiento', [AyudaController::class, 'conocimiento'])->name('erp.ayuda.conocimiento');
        Route::get('/manual', [AyudaController::class, 'manuales'])->name('erp.ayuda.manual');
    });

});

// Rutas Específicas Dinámicas del Storefront
Route::get('/tienda/index', [TiendaController::class, 'index']);
Route::get('/tienda/catalogo_general', [TiendaController::class, 'catalogoGeneral']);
Route::get('/tienda/catalogo_detallado', [TiendaController::class, 'catalogoDetallado']);
Route::get('/tienda/detalle_productos', [TiendaController::class, 'detalleProducto']);

// Enrutador Dinámico para el Storefront Público (Otras páginas estáticas)
Route::get('/tienda/{page?}', function ($page = 'index') {
    if ($page === 'index') return redirect('/tienda/index');
    $page = str_replace(['../', '..\\'], '', $page); // Sanitize path traversal
    if (view()->exists('tienda.' . $page)) {
        return view('tienda.' . $page);
    }
    abort(404, 'Página de tienda no encontrada.');
})->where('page', '.*');

// Auth Routes
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');

// Enrutador Dinámico para Autenticación (Registro, Recuperación)
Route::get('/auth/{page?}', function ($page = 'login') {
    // Redirect to proper login if already authenticated
    if (Auth::check() && $page === 'login') {
        return redirect('/erp/inicio');
    }

    $page = str_replace(['../', '..\\'], '', $page);
    $viewPath = resource_path('views/auth/' . $page . '.blade.php');

    if (file_exists($viewPath)) {
        return view('auth.' . $page);
    }

    // Fallback para nombres comunes
    if ($page === 'crear-cuenta') return redirect('/auth/crear_cuenta');

    abort(404, 'Página de acceso no encontrada: ' . $page);
})->where('page', '.*');

// Rutas Estrictas de Facturación y Transacciones
Route::prefix('api/erp/invoice')->group(function () {
    Route::post('/checkout', [InvoiceController::class, 'processCheckout']);
});

// Ruta Única de Mantenimiento para Desbloqueo de Base de Datos
Route::get('/erp/debug/desbloquear-db', [MaintenanceController::class, 'unlockDatabase']);
