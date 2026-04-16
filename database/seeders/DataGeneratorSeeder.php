<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Notification;
use App\Models\Approval;
use Illuminate\Support\Facades\DB;

class DataGeneratorSeeder extends Seeder
{
    public function run(): void
    {
        // Limpieza de datos transaccionales para evitar acumulación excesiva en pruebas
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Approval::truncate();
        Notification::truncate();
        OrderItem::truncate();
        Order::truncate();
        // Nota: NO truncamos Product ni Customer para preservar datos de seeders previos
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // 1. GENERACIÓN DE PRODUCTOS (REPUESTOS REALES)
        $productos = [
            ['nombre' => 'Filtro de Aceite Cummins LF9009', 'marca' => 'Cummins', 'categoria' => 'Filtros', 'oem' => 'LF9009'],
            ['nombre' => 'Empacadura de Culata Volvo D13', 'marca' => 'Volvo', 'categoria' => 'Motor', 'oem' => '20910-D13'],
            ['nombre' => 'Inyector de Combustible Detroit S60', 'marca' => 'Detroit Diesel', 'categoria' => 'Inyección', 'oem' => 'R-23533501'],
            ['nombre' => 'Bomba de Agua Cummins ISX', 'marca' => 'Cummins', 'categoria' => 'Enfriamiento', 'oem' => '4351234'],
            ['nombre' => 'Kit de Fan Clutch Horton', 'marca' => 'Horton', 'categoria' => 'Enfriamiento', 'oem' => '9908500'],
            ['nombre' => 'Tensor de Correa Mack E7', 'marca' => 'Mack', 'categoria' => 'Correas', 'oem' => '8192-397'],
            ['nombre' => 'Turbo Cargador Holset HE451VE', 'marca' => 'Holset', 'categoria' => 'Turbo', 'oem' => '3791617'],
            ['nombre' => 'Sensor de Presión de Aceite Cummins', 'marca' => 'Cummins', 'categoria' => 'Sensores', 'oem' => '4921517'],
            ['nombre' => 'Camisa de Cilindro Detroit S60', 'marca' => 'Detroit Diesel', 'categoria' => 'Motor', 'oem' => '23531249'],
            ['nombre' => 'Termostato Volvo D12', 'marca' => 'Volvo', 'categoria' => 'Enfriamiento', 'oem' => '21412534'],
        ];

        foreach ($productos as $p) {
            Product::updateOrCreate(
                ['codigo_oem' => $p['oem']],
                [
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
                ]
            );
        }

        // 2. CLIENTES CORPORATIVOS
        $clientes = [
            ['razon_social' => 'Transporte Carabobo, C.A.', 'rif' => 'J-12345678-0', 'tipo' => 'Mayor', 'name' => 'Admin Transporte Carabobo', 'email' => 'admin@transcarabobo.com.ve'],
            ['razon_social' => 'Industrial Parts S.A.', 'rif' => 'J-87654321-9', 'tipo' => 'Mayor', 'name' => 'Compras Industrial Parts', 'email' => 'compras@industrialparts.com.ve'],
            ['razon_social' => 'Constructora Master Venezuela', 'rif' => 'J-45612378-2', 'tipo' => 'Detal', 'name' => 'Ing. Ricardo Torres', 'email' => 'rtorres@masterauto.com.ve'],
            ['razon_social' => 'Logística La Cima Express', 'rif' => 'J-99887766-5', 'tipo' => 'Mayor', 'name' => 'Gerencia Logística', 'email' => 'gerencia@lacimaexpress.com.ve'],
        ];

        foreach ($clientes as $c) {
            $user = \App\Models\User::updateOrCreate(
                ['email' => $c['email']],
                [
                    'name' => $c['name'],
                    'password' => \Illuminate\Support\Facades\Hash::make('cliente123'),
                    'role' => 'cliente',
                    'is_active' => true,
                ]
            );

            Customer::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'rif' => $c['rif'],
                    'razon_social' => $c['razon_social'],
                    'telefono' => '0414-' . rand(1000000, 9999999),
                    'direccion' => 'Zona Industrial Valencia, Edo. Carabobo',
                    'tipo_cliente' => $c['tipo'],
                    'limite_credito' => $c['tipo'] == 'Mayor' ? 5000 : 0,
                    'activo' => true
                ]
            );
        }

        // 3. ÓRDENES E HISTORIAL PARA DASHBOARD
        $allProducts = Product::all();
        $allCustomers = Customer::all();
        $adminUser = \App\Models\User::where('role', 'admin')->first();
        $adminId = $adminUser ? $adminUser->id : 1;

        for ($i = 0; $i < 20; $i++) {
            $customer = $allCustomers->random();
            $orderNumber = 'ORD-' . (1024 + $i);
            
            $order = Order::updateOrCreate(
                ['numero_orden' => $orderNumber],
                [
                    'customer_id' => $customer->id,
                    'estado' => 'Pagado',
                    'total' => 0,
                    'fecha_emision' => now()->subDays(rand(1, 60)),
                    'created_at' => now()->subDays(rand(1, 60))
                ]
            );

            $subtotal = 0;
            $itemsCount = rand(1, 3);
            for ($j = 0; $j < $itemsCount; $j++) {
                $product = $allProducts->random();
                $qty = rand(1, 5);
                $price = $customer->tipo_cliente == 'Mayor' ? $product->precio_mayor : $product->precio_detal;
                
                OrderItem::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'product_id' => $product->id
                    ],
                    [
                        'cantidad' => $qty,
                        'precio_unitario' => $price,
                        'subtotal' => $price * $qty
                    ]
                );
                $subtotal += $price * $qty;
            }
            $order->update(['total' => $subtotal]);
        }

        // 4. NOTIFICACIONES DE LA CAMPANA (Para el Admin) - Muestra de sistema
        Notification::firstOrCreate(
            ['title' => 'Stock Bajo Detectado', 'user_id' => $adminId],
            [
                'type' => 'warning',
                'message' => 'El producto Filtro de Aceite Cummins LF9009 está por debajo del mínimo (8 unidades restantes).',
                'icon' => 'inventory_2',
                'read' => false
            ]
        );

        // 5. GENERACIÓN DE APROBACIONES PENDIENTES
        $ordersToApprove = Order::where('total', '>', 500)->take(3)->get();
        foreach ($ordersToApprove as $order) {
            $order->update(['estado' => 'Esperando Aprobación']);
            Approval::updateOrCreate(
                [
                    'approvable_id' => $order->id,
                    'approvable_type' => Order::class
                ],
                [
                    'requester_id' => $adminId,
                    'status' => 'pending',
                    'reason' => 'Orden de valor moderado requiere validación gerencial para despacho prioritario.'
                ]
            );
        }
    }
}
