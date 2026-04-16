<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CustomerAuthSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Asegurar que existe el rol cliente para un usuario B2B de prueba
        $user = \App\Models\User::updateOrCreate(
            ['email' => 'cliente_b2b@lacima.com'],
            [
                'name' => 'Comercializadora Repuestos C.A. (B2B)',
                'password' => \Illuminate\Support\Facades\Hash::make('cliente123'),
                'role' => 'cliente',
                'is_active' => true,
            ]
        );

        // 2. Vincular con el perfil de Customer
        \App\Models\Customer::updateOrCreate(
            ['user_id' => $user->id],
            [
                'rif' => 'J-40308741-5',
                'razon_social' => 'COMERCIALIZADORA DE REPUESTOS Y SERVICIOS LA CIMA B2B',
                'telefono' => '0241-8000000',
                'direccion' => 'Zona Industrial, Valencia, Carabobo',
                'tipo_cliente' => 'B2B',
                'activo' => true,
            ]
        );
    }
}
