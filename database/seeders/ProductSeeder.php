<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'codigo_oem' => 'CUM-50283-ISM',
                'codigo_interno' => 'PRD-001',
                'nombre' => 'KIT DE EMPACADURAS SUPERIOR CUMMINS ISM',
                'marca' => 'CUMMINS Genuine',
                'categoria' => 'MOTOR',
                'stock_actual' => 15,
                'stock_minimo' => 2,
                'costo_compra' => 450.00,
                'precio_mayor' => 580.00,
                'precio_detal' => 650.00,
                'activo' => true,
                'ubicacion_almacen' => 'EST-A1-SEC2',
            ],
            [
                'codigo_oem' => 'HIL-4029-2022',
                'codigo_interno' => 'PRD-002',
                'nombre' => 'DISCO DE FRENO DELANTERO TOYOTA HILUX 2022',
                'marca' => 'TOYOTA JPN',
                'categoria' => 'FRENOS',
                'stock_actual' => 42,
                'stock_minimo' => 10,
                'costo_compra' => 45.00,
                'precio_mayor' => 65.00,
                'precio_detal' => 85.00,
                'activo' => true,
                'ubicacion_almacen' => 'EST-B5-SEC1',
            ],
            [
                'codigo_oem' => 'FIL-7721-P',
                'codigo_interno' => 'PRD-003',
                'nombre' => 'FILTRO DE ACEITE HIGH PERFORMANCE P550428',
                'marca' => 'DONALDSON',
                'categoria' => 'FILTROS',
                'stock_actual' => 120,
                'stock_minimo' => 24,
                'costo_compra' => 12.50,
                'precio_mayor' => 18.00,
                'precio_detal' => 25.00,
                'activo' => true,
                'ubicacion_almacen' => 'EST-C2-SEC4',
            ],
            [
                'codigo_oem' => 'TURB-ISX-15',
                'codigo_interno' => 'PRD-004',
                'nombre' => 'TURBO COMPRESOR HOLSET ISX15 CON ACTUADOR',
                'marca' => 'HOLSET',
                'categoria' => 'TURBOS',
                'stock_actual' => 3,
                'stock_minimo' => 1,
                'costo_compra' => 1850.00,
                'precio_mayor' => 2200.00,
                'precio_detal' => 2450.00,
                'activo' => true,
                'ubicacion_almacen' => 'EST-VIP-1',
            ],
            [
                'codigo_oem' => 'INY-MACK-MP8',
                'codigo_interno' => 'PRD-005',
                'nombre' => 'INYECTOR DE COMBUSTIBLE MACK MP8 / VOLVO D13',
                'marca' => 'DELPHI',
                'categoria' => 'INYECCION',
                'stock_actual' => 12,
                'stock_minimo' => 6,
                'costo_compra' => 412.00,
                'precio_mayor' => 485.00,
                'precio_detal' => 520.00,
                'activo' => true,
                'ubicacion_almacen' => 'EST-SEC-D3',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['codigo_oem' => $product['codigo_oem']],
                $product
            );
        }
    }
}
