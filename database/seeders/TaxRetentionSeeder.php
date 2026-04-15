<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxRetentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $retentions = [
            [
                'tax_type' => 'IVA',
                'tax_code' => 'IVA-75',
                'description' => 'Retención IVA 75% Contribuyente Especial',
                'percentage' => 75.00,
                'base_amount' => 0.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tax_type' => 'IVA',
                'tax_code' => 'IVA-100',
                'description' => 'Retención IVA 100% Contribuyente Especial (Excepcional)',
                'percentage' => 100.00,
                'base_amount' => 0.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tax_type' => 'ISLR',
                'tax_code' => 'ISLR-2',
                'description' => 'Prestación de Servicios Nacionales (Persona Jurídica Domiciliada)',
                'percentage' => 2.00,
                'base_amount' => 0.00, // Ajustable por UT
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tax_type' => 'ISLR',
                'tax_code' => 'ISLR-3',
                'description' => 'Fletes Nacionales (Persona Jurídica Domiciliada)',
                'percentage' => 3.00,
                'base_amount' => 0.00, // Ajustable por UT
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('tax_retentions')->insertOrIgnore($retentions);
    }
}
