<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:api', 'security.headers'])->group(function () {

    // Products API
    Route::apiResource('products', ProductController::class);

    // Get products with stock
    Route::get('products/in-stock', [ProductController::class, 'inStock']);
    Route::get('products/low-stock', [ProductController::class, 'lowStock']);

    // Customers API
    Route::apiResource('customers', CustomerController::class);

    // Orders API
    Route::apiResource('orders', OrderController::class);
    Route::get('orders/pending', [OrderController::class, 'pending']);
    Route::post('orders/{order}/complete', [OrderController::class, 'complete']);

    // Inventory API
    Route::get('inventory/movements', [InventoryController::class, 'movements']);
    Route::post('inventory/adjust', [InventoryController::class, 'adjustStock']);

    // Reports API
    Route::get('reports/sales', [ReportController::class, 'sales']);
    Route::get('reports/inventory', [ReportController::class, 'inventory']);
    Route::get('reports/financial', [ReportController::class, 'financial']);
});

// Public API (no auth required)
Route::middleware(['throttle:api', 'security.headers'])->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});
