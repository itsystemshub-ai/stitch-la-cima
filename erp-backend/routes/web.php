<?php

use Illuminate\Support\Facades\Route;

// Punto de Entrada Principal (Storefront)
Route::get('/', function () {
    return redirect('/tienda/index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/pos', function () {
    return view('pos.index');
});

// Rutas Avanzadas para Módulo de Sincronización
use App\Http\Controllers\AccessImportController;
use App\Http\Controllers\InvoiceController;

Route::prefix('erp/sync')->group(function () {
    Route::get('/', function () {
        return view('configuracion.sync');
    });
    Route::post('/upload-accdb', [AccessImportController::class, 'syncAccessDatabase']);
});

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

// Enrutador Dinámico para todos los submódulos ERP compilados en resources/views/erp/
Route::get('/erp/{module}', function ($module) {
    if (view()->exists('erp.' . $module)) {
        return view('erp.' . $module);
    }
    abort(404, 'Módulo no compilado o no encontrado.');
})->where('module', '.*');

use App\Http\Controllers\TiendaController;

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
    $page = str_replace(['../', '..\\'], '', $page);
    // Verificar existencia del archivo directamente para evitar conflictos con namespace 'auth'
    $viewPath = resource_path('views/auth/' . $page . '.blade.php');
    if (file_exists($viewPath)) {
        return view('auth.' . $page);
    }
    abort(404, 'Página de acceso no encontrada: ' . $page);
})->where('page', '.*');

// Rutas Estrictas de Facturación y Transacciones
Route::prefix('api/erp/invoice')->group(function () {
    Route::post('/checkout', [InvoiceController::class, 'processCheckout']);
});
