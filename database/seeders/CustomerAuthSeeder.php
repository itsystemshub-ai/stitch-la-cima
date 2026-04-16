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
        if (Schema::hasColumn('customers', 'password')) {
            // Actualizar clientes existentes para que tengan contraseña si no la tienen (para testing B2B)
            Customer::whereNull('password')->update([
                'password' => Hash::make('cliente123'),
                'tipo_cliente' => 'B2B'
            ]);

            // Crear un clíente de prueba por defecto si no existe
            Customer::firstOrCreate(
                ['email' => 'cliente_b2b@lacima.com'],
                [
                    'rif' => 'J-99999999-9',
                    'razon_social' => 'Cliente de Prueba Tienda',
                    'telefono' => '0414-0000000',
                    'direccion' => 'Zona Industrial, Caracas',
                    'tipo_cliente' => 'B2B',
                    'password' => Hash::make('cliente123'),
                    'activo' => true,
                ]
            );
        }
    }
}
