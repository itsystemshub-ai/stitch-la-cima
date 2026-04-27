<?php

define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

echo "<h1>Fixing Authentication...</h1>";

try {
    // 1. Create or Update Admin
    $admin = User::updateOrCreate(
        ['email' => 'admin@lacima.com'],
        [
            'name' => 'Administrador',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]
    );
    
    echo "<p style='color:green'>Admin user synchronized: <b>admin@lacima.com</b> / <b>admin123</b></p>";

    // 2. Clear Caches
    echo "<h2>Clearing Caches...</h2>";
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    echo "<p style='color:green'>System caches cleared successfully.</p>";

    echo "<hr><p><b>Process finished.</b> Please try logging in again at <a href='/auth/login'>Login Page</a>.</p>";

} catch (\Exception $e) {
    echo "<h2 style='color:red'>Error:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
