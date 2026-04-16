<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@lacima.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        User::firstOrCreate(
            ['email' => 'vendedor@lacima.com'],
            [
                'name' => 'Vendedor Principal',
                'password' => Hash::make('vendedor123'),
                'role' => 'vendedor',
                'is_active' => true,
                'modulos' => ['ventas', 'pos'],
            ]
        );

        User::firstOrCreate(
            ['email' => 'trabajador@lacima.com'],
            [
                'name' => 'Trabajador General',
                'password' => Hash::make('trabajador123'),
                'role' => 'trabajador',
                'is_active' => true,
                'modulos' => ['inventario', 'compras', 'ventas'],
            ]
        );
    }
}
