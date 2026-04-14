<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Notification;
use App\Models\Approval;

define('LARAVEL_START', microtime(true));

// Boot Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "<h1>Zenith System Repair Tool v2</h1>";

try {
    echo "<h2>1. Running Migrations...</h2>";
    Artisan::call('migrate', ['--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";
    echo "<p style='color:green'>Migrations completed.</p>";

    echo "<h2>2. Seeding Database (Standalone Mode)...</h2>";
    
    // Limpieza
    Schema::disableForeignKeyConstraints();
    Approval::truncate();
    Notification::truncate();
    OrderItem::truncate();
    Order::truncate();
    Customer::truncate();
    Product::truncate();
    User::truncate();
    Schema::enableForeignKeyConstraints();
    
    // Crear Admin
    $admin = User::create([
        'name' => 'Administrador Zenith',
        'email' => 'admin@zenith.com',
        'password' => bcrypt('admin123'),
    ]);
    echo "<li>Admin user created.</li>";

    // Productos
    $productos = [
        ['nombre' => 'Filtro de Aceite Cummins LF9009', 'marca' => 'Cummins', 'categoria' => 'Filtros', 'oem' => 'LF9009'],
        ['nombre' => 'Empacadura de Culata Volvo D13', 'marca' => 'Volvo', 'categoria' => 'Motor', 'oem' => '20910-D13'],
        ['nombre' => 'Inyector de Combustible Detroit S60', 'marca' => 'Detroit Diesel', 'categoria' => 'Inyección', 'oem' => 'R-23533501'],
        ['nombre' => 'Bomba de Agua Cummins ISX', 'marca' => 'Cummins', 'categoria' => 'Enfriamiento', 'oem' => '4351234'],
        ['nombre' => 'Turbo Cargador Holset HE451VE', 'marca' => 'Holset', 'categoria' => 'Turbo', 'oem' => '3791617'],
    ];

    foreach ($productos as $p) {
        Product::create([
            'codigo_oem' => $p['oem'],
            'codigo_interno' => 'LC-' . rand(1000, 9999),
            'nombre' => $p['nombre'],
            'marca' => $p['marca'],
            'categoria' => $p['categoria'],
            'stock_actual' => rand(5, 50),
            'stock_minimo' => 10,
            'costo_compra' => rand(50, 500),
            'precio_mayor' => rand(600, 800),
            'precio_detal' => rand(850, 1100),
            'activo' => true,
            'ubicacion_almacen' => 'PASILLO-' . chr(rand(65, 70)) . rand(1, 10),
        ]);
    }
    echo "<li>Products created.</li>";

    // Clientes
    $clientes = [
        ['razon_social' => 'Transporte Carabobo, C.A.', 'rif' => 'J-12345678-0', 'tipo' => 'Mayor'],
        ['razon_social' => 'Industrial Parts S.A.', 'rif' => 'J-87654321-9', 'tipo' => 'Mayor'],
    ];

    foreach ($clientes as $c) {
        Customer::create([
            'rif' => $c['rif'],
            'razon_social' => $c['razon_social'],
            'email' => strtolower(str_replace(' ', '.', $c['razon_social'])) . '@gmail.com',
            'telefono' => '0414-' . rand(1000000, 9999999),
            'direccion' => 'Zona Industrial Valencia',
            'tipo_cliente' => $c['tipo'],
            'limite_credito' => $c['tipo'] == 'Mayor' ? 5000 : 0,
            'activo' => true
        ]);
    }
    echo "<li>Customers created.</li>";

    // Ordenes
    $allProducts = Product::all();
    $allCustomers = Customer::all();
    for ($i = 0; $i < 5; $i++) {
        $customer = $allCustomers->random();
        $order = Order::create([
            'numero_orden' => 'ORD-' . (1024 + $i),
            'customer_id' => $customer->id,
            'estado' => 'Pagado',
            'total' => 0,
            'fecha_emision' => now()->subDays(rand(1, 60)),
        ]);

        $subtotal = 0;
        $product = $allProducts->random();
        $qty = rand(1, 5);
        $price = $customer->tipo_cliente == 'Mayor' ? $product->precio_mayor : $product->precio_detal;
        
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => $qty,
            'precio_unitario' => $price,
            'subtotal' => $price * $qty
        ]);
        $order->update(['total' => $price * $qty]);
    }
    echo "<li>Orders created.</li>";

    echo "<h2>3. Clearing Cache...</h2>";
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    echo "<p style='color:green'>Cache cleared.</p>";

    echo "<h2>4. Verification</h2>";
    $count = Product::count();
    echo "<p>Success! Total products in database: <b>$count</b></p>";

    echo "<hr><p><b>Repair process finished.</b> You can now go to <a href='/'>Home</a>.</p>";

} catch (\Exception $e) {
    echo "<h2 style='color:red'>Critical Error during repair:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
