<?php

use App\Models\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "============================================\n";
echo "✅ Verificación de Instalación - La Cima ERP\n";
echo "============================================\n\n";

// 1. Verificar conexión a base de datos
echo '1. Verificando base de datos... ';
try {
    DB::connection()->getPdo();
    echo "OK\n";
} catch (Exception $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
    exit(1);
}

// 2. Verificar tabla users
echo '2. Verificando tabla users... ';
try {
    $userCount = DB::table('users')->count();
    echo "OK ({$userCount} usuarios)\n";
} catch (Exception $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
}

// 3. Verificar columnas en users
echo '3. Verificando columnas... ';
try {
    $columns = DB::getSchemaBuilder()->getColumnListing('users');
    $hasRole = in_array('role', $columns);
    $hasActive = in_array('is_active', $columns);
    $hasModulos = in_array('modulos', $columns);
    echo "OK\n";
    echo '   - role: '.($hasRole ? 'OK' : 'FALTA')."\n";
    echo '   - is_active: '.($hasActive ? 'OK' : 'FALTA')."\n";
    echo '   - modulos: '.($hasModulos ? 'OK' : 'FALTA')."\n";
} catch (Exception $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
}

// 4. Verificar/Crear admin
echo '4. Verificando usuario admin... ';
$admin = User::where('email', 'admin@lacima.com')->first();
if ($admin) {
    echo "OK\n";
    echo "   - Rol: {$admin->role}\n";
    echo '   - Activo: '.($admin->is_active ? 'Si' : 'No')."\n";
} else {
    echo "NO EXISTE - Creando...\n";
    try {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@lacima.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);
        echo "   - CREADO OK\n";
    } catch (Exception $e) {
        echo '   - ERROR: '.$e->getMessage()."\n";
    }
}

// 5. Probar login
echo '5. Probando login... ';
try {
    if (Auth::attempt(['email' => 'admin@lacima.com', 'password' => 'admin123'])) {
        echo "OK\n";
        Auth::logout();
    } else {
        echo "FALLO\n";
    }
} catch (Exception $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
}

echo "\n============================================\n";
echo "🎉 Verificación completada!\n";
echo "============================================\n";
echo "\nCredenciales de acceso:\n";
echo "  Email: admin@lacima.com\n";
echo "  Password: admin123\n";
echo "\n URLs:\n";
echo "  Login: /auth/login\n";
echo "  ERP: /erp/dashboard\n";
echo "  Tienda: /\n";
echo "============================================\n";
