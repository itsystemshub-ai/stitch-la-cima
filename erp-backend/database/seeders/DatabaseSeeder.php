<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Administrador por defecto
        User::factory()->create([
            'name' => 'Administrador Zenith',
            'email' => 'admin@zenith.com',
            'password' => bcrypt('admin123'),
        ]);

        // Poblar datos maestros
        $this->call([
            ProductSeeder::class,
            CustomerSeeder::class,
            DataGeneratorSeeder::class, // Mantenemos el generador dinámico para mayor volumen
        ]);
    }
}
