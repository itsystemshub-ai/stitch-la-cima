<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "--- ROUTES AUDIT ---\n";
$routes = Route::getRoutes();
foreach ($routes as $route) {
    if (str_contains($route->uri(), 'erp')) {
        echo "URI: " . $route->uri() . " | NAME: " . $route->getName() . " | ACTIONS: " . $route->getActionName() . "\n";
    }
}

echo "\n--- ADMIN USER AUDIT ---\n";
$admin = User::where('role', 'admin')->first();
if ($admin) {
    echo "Admin Email: " . $admin->email . "\n";
    echo "Is Active: " . ($admin->is_active ? 'YES' : 'NO') . "\n";
    echo "Role: " . $admin->role . "\n";
    echo "Modulos: " . json_encode($admin->getModulos()) . "\n";
} else {
    echo "No admin user found!\n";
}
