<?php

use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessImportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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
    $absolutePath = base_path('../frontend/' . $path);
    if (!File::exists($absolutePath)) { abort(404); }
    $file = File::get($absolutePath);
    $type = File::mimeType($absolutePath);
    if (str_ends_with($absolutePath, '.css')) { $type = 'text/css'; }
    elseif (str_ends_with($absolutePath, '.js')) { $type = 'application/javascript'; }
    elseif (str_ends_with($absolutePath, '.svg')) { $type = 'image/svg+xml'; }
    
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    // Agregamos cache control para no penalizar el rendimiento
    $response->header("Cache-Control", "max-age=86400, public");
    return $response;
})->where('path', '.*');

// ========== GRUPOS DE RUTAS ERP (MODULAR) ==========

Route::prefix('erp')->group(function () {
    
    // Dashboard Principal
    Route::get('/inicio', function () { 
        return view('erp.inicio'); 
    })->name('erp.inicio');

    // Módulo Inventario
    Route::prefix('inventario')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('erp.inventario.index');
        Route::get('/productos', [InventoryController::class, 'productos'])->name('erp.inventario.productos');
        Route::post('/productos', [InventoryController::class, 'store'])->name('erp.inventario.productos.store');
        Route::get('/desarrollo', [InventoryController::class, 'desarrollo'])->name('erp.inventario.desarrollo');
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
        Route::get('/', function () { return view('erp.ventas.index'); })->name('erp.ventas.index');
        Route::get('/pos', function () { return view('erp.pos.index'); })->name('erp.ventas.pos');
        Route::get('/clientes', function () { return view('erp.ventas.clientes'); })->name('erp.ventas.clientes');
        Route::get('/registro', function () { return view('erp.ventas.registro'); })->name('erp.ventas.registro');
        Route::get('/facturacion', function () { return view('erp.ventas.facturacion'); })->name('erp.ventas.facturacion');
        Route::get('/historial', function () { return view('erp.ventas.historial'); })->name('erp.ventas.historial');
        Route::get('/notas-credito', function () { return view('erp.ventas.notas-credito'); })->name('erp.ventas.notas-credito');
        Route::get('/vendedores', function () { return view('erp.ventas.vendedores'); })->name('erp.ventas.vendedores');
        Route::get('/reportes', function () { return view('erp.ventas.reportes'); })->name('erp.ventas.reportes');
    });

    // Módulo Compras
    Route::prefix('compras')->group(function () {
        Route::get('/', function () { return view('erp.compras.index'); })->name('erp.compras.index');
        Route::get('/proveedores', function () { return view('erp.compras.proveedores'); })->name('erp.compras.proveedores');
        Route::get('/historial', function () { return view('erp.compras.historial'); })->name('erp.compras.historial');
        Route::get('/factura', function () { return view('erp.compras.factura'); })->name('erp.compras.factura');
        Route::get('/libro', function () { return view('erp.compras.libro'); })->name('erp.compras.libro');
        Route::get('/reportes', function () { return view('erp.compras.reportes'); })->name('erp.compras.reportes');
    });

    // Módulo Contabilidad
    Route::prefix('contabilidad')->group(function () {
        Route::get('/', function () { return view('erp.contabilidad.index'); })->name('erp.contabilidad.index');
        Route::get('/plan-cuentas', function () { return view('erp.contabilidad.plan-cuentas'); })->name('erp.contabilidad.plan-cuentas');
        Route::get('/libro-diario', function () { return view('erp.contabilidad.libro-diario'); })->name('erp.contabilidad.libro-diario');
        Route::get('/libro-ventas', function () { return view('erp.contabilidad.libro-ventas'); })->name('erp.contabilidad.libro-ventas');
        Route::get('/libro-caja', function () { return view('erp.contabilidad.libro-caja'); })->name('erp.contabilidad.libro-caja');
        Route::get('/balance-general', function () { return view('erp.contabilidad.balance-general'); })->name('erp.contabilidad.balance-general');
        Route::get('/balance-comprobacion', function () { return view('erp.contabilidad.balance-comprobacion'); })->name('erp.contabilidad.balance-comprobacion');
        Route::get('/estado-resultados', function () { return view('erp.contabilidad.estado-resultados'); })->name('erp.contabilidad.estado-resultados');
        Route::get('/declaracion-iva', function () { return view('erp.contabilidad.declaracion-iva'); })->name('erp.contabilidad.declaracion-iva');
        Route::get('/cierre', function () { return view('erp.contabilidad.cierre-contable'); })->name('erp.contabilidad.cierre');
        Route::get('/libros-legales', function () { return view('erp.contabilidad.libros-legales'); })->name('erp.contabilidad.libros-legales');
        Route::get('/reportes', function () { return view('erp.contabilidad.reportes-contables'); })->name('erp.contabilidad.reportes');
    });
    
    // Módulo Recursos Humanos (RRHH)
    Route::prefix('rrhh')->group(function () {
        Route::get('/', function () { return view('erp.rrhh.index'); })->name('erp.rrhh.index');
        Route::get('/empleados', function () { return view('erp.rrhh.empleados'); })->name('erp.rrhh.empleados');
        Route::get('/nomina', function () { return view('erp.rrhh.nomina'); })->name('erp.rrhh.nomina');
        Route::get('/prestaciones', function () { return view('erp.rrhh.prestaciones'); })->name('erp.rrhh.prestaciones');
        Route::get('/portal-empleado', function () { return view('erp.rrhh.portal-empleado'); })->name('erp.rrhh.portal-empleado');
        Route::get('/rendimiento', function () { return view('erp.rrhh.rendimiento'); })->name('erp.rrhh.rendimiento');
        Route::get('/reportes', function () { return view('erp.rrhh.reportes'); })->name('erp.rrhh.reportes');
    });

    // Módulo Configuracion
    Route::prefix('configuracion')->group(function () {
        Route::get('/', function () { return view('erp.configuracion.index'); })->name('erp.configuracion.index');
        Route::get('/parametros', function () { return view('erp.configuracion.parametros'); })->name('erp.configuracion.parametros');
        Route::get('/fiscal', function () { return view('erp.configuracion.config-fiscal'); })->name('erp.configuracion.fiscal');
        Route::get('/usuarios', function () { return view('erp.configuracion.usuarios-roles'); })->name('erp.configuracion.usuarios');
        Route::get('/base-datos', function () { return view('erp.configuracion.base-datos'); })->name('erp.configuracion.base-datos');
        Route::get('/backups', function () { return view('erp.configuracion.backups'); })->name('erp.configuracion.backups');
        Route::get('/estado-sistema', function () { return view('erp.configuracion.estado-sistema'); })->name('erp.configuracion.estado-sistema');
        Route::get('/tareas', function () { return view('erp.configuracion.tareas'); })->name('erp.configuracion.tareas');
        Route::get('/auditoria', function () { return view('erp.configuracion.auditoria'); })->name('erp.configuracion.auditoria');
    });

    // Módulo Finanzas
    Route::prefix('finanzas')->group(function () {
        Route::get('/', function () { return view('erp.finanzas.index'); })->name('erp.finanzas.index');
        Route::get('/activos-fijos', function () { return view('erp.finanzas.activos-fijos'); })->name('erp.finanzas.activos-fijos');
        Route::get('/cuentas-cobrar', function () { return view('erp.finanzas.cuentas-cobrar'); })->name('erp.finanzas.cuentas-cobrar');
        Route::get('/reportes', function () { return view('erp.finanzas.reportes'); })->name('erp.finanzas.reportes');
    });

    // Módulo Aprobaciones
    Route::prefix('aprobaciones')->group(function () {
        Route::get('/', [ApprovalController::class, 'index'])->name('erp.aprobaciones.index');
        Route::post('/{approval}/process', [ApprovalController::class, 'process'])->name('erp.aprobaciones.process');
    });

    // Módulo Ayuda
    Route::prefix('ayuda')->group(function () {
        Route::get('/', function () { return view('erp.ayuda.index'); })->name('erp.ayuda.index');
        Route::get('/tickets', function () { return view('erp.ayuda.tickets-soporte'); })->name('erp.ayuda.tickets');
        Route::get('/crear-ticket', function () { return view('erp.ayuda.crear-ticket'); })->name('erp.ayuda.crear-ticket');
        Route::get('/chat', function () { return view('erp.ayuda.chat-asistencia'); })->name('erp.ayuda.chat');
        Route::get('/conocimiento', function () { return view('erp.ayuda.conocimiento'); })->name('erp.ayuda.conocimiento');
        Route::get('/manual', function () { return view('erp.ayuda.manual-tecnico'); })->name('erp.ayuda.manual');
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

// Enrutador Dinámico para Autenticación (Login, Registro, Recuperación)
Route::get('/auth/{page?}', function ($page = 'login') {
    if ($page === 'index' || $page === 'inicio') return redirect('/');
    
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

