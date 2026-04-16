<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            // ACTIVOS (1)
            ['codigo' => '1', 'nombre' => 'ACTIVO', 'tipo' => 'Activo', 'nivel' => '1', 'movimiento' => false],
            ['codigo' => '1.1', 'nombre' => 'ACTIVO CORRIENTE', 'tipo' => 'Activo', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '1.1.01', 'nombre' => 'Caja', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true, 'auxiliar' => true],
            ['codigo' => '1.1.02', 'nombre' => 'Bancos', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true, 'auxiliar' => true],
            ['codigo' => '1.1.03', 'nombre' => 'Cuentas por Cobrar', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true, 'auxiliar' => true],
            ['codigo' => '1.1.04', 'nombre' => 'Inventarios', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true, 'auxiliar' => true],
            ['codigo' => '1.1.05', 'nombre' => 'IVA Acreditable', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '1.2', 'nombre' => 'ACTIVO NO CORRIENTE', 'tipo' => 'Activo', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '1.2.01', 'nombre' => 'Activos Fijos', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true, 'auxiliar' => true],
            ['codigo' => '1.2.02', 'nombre' => 'Depreciación Acumulada', 'tipo' => 'Activo', 'nivel' => '3', 'movimiento' => true],

            // PASIVOS (2)
            ['codigo' => '2', 'nombre' => 'PASIVO', 'tipo' => 'Pasivo', 'nivel' => '1', 'movimiento' => false],
            ['codigo' => '2.1', 'nombre' => 'PASIVO CORRIENTE', 'tipo' => 'Pasivo', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '2.1.01', 'nombre' => 'Cuentas por Pagar', 'tipo' => 'Pasivo', 'nivel' => '3', 'movimiento' => true, 'auxiliar' => true],
            ['codigo' => '2.1.02', 'nombre' => 'IVA Por Pagar', 'tipo' => 'Pasivo', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '2.1.03', 'nombre' => 'Retenciones por Pagar', 'tipo' => 'Pasivo', 'nivel' => '3', 'movimiento' => true],

            // PATRIMONIO (3)
            ['codigo' => '3', 'nombre' => 'PATRIMONIO', 'tipo' => 'Patrimonio', 'nivel' => '1', 'movimiento' => false],
            ['codigo' => '3.1', 'nombre' => 'CAPITAL', 'tipo' => 'Patrimonio', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '3.1.01', 'nombre' => 'Capital Social', 'tipo' => 'Patrimonio', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '3.2', 'nombre' => 'RESULTADOS', 'tipo' => 'Patrimonio', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '3.2.01', 'nombre' => 'Utilidades Acumuladas', 'tipo' => 'Patrimonio', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '3.2.02', 'nombre' => 'Pérdidas Acumuladas', 'tipo' => 'Patrimonio', 'nivel' => '3', 'movimiento' => true],

            // INGRESOS (4)
            ['codigo' => '4', 'nombre' => 'INGRESOS', 'tipo' => 'Ingreso', 'nivel' => '1', 'movimiento' => false],
            ['codigo' => '4.1', 'nombre' => 'VENTAS', 'tipo' => 'Ingreso', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '4.1.01', 'nombre' => 'Venta de Mercancía', 'tipo' => 'Ingreso', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '4.1.02', 'nombre' => 'Devoluciones en Ventas', 'tipo' => 'Ingreso', 'nivel' => '3', 'movimiento' => true],

            // COSTOS (5)
            ['codigo' => '5', 'nombre' => 'COSTO DE VENTAS', 'tipo' => 'Costo', 'nivel' => '1', 'movimiento' => false],
            ['codigo' => '5.1', 'nombre' => 'COSTO DE MERCANCÍA', 'tipo' => 'Costo', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '5.1.01', 'nombre' => 'Costo de Mercancía Vendida', 'tipo' => 'Costo', 'nivel' => '3', 'movimiento' => true],

            // GASTOS (6)
            ['codigo' => '6', 'nombre' => 'GASTOS', 'tipo' => 'Gasto', 'nivel' => '1', 'movimiento' => false],
            ['codigo' => '6.1', 'nombre' => 'GASTOS OPERATIVOS', 'tipo' => 'Gasto', 'nivel' => '2', 'movimiento' => false],
            ['codigo' => '6.1.01', 'nombre' => 'Gastos de Personal', 'tipo' => 'Gasto', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '6.1.02', 'nombre' => 'Gastos de Alquiler', 'tipo' => 'Gasto', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '6.1.03', 'nombre' => 'Gastos de Servicios', 'tipo' => 'Gasto', 'nivel' => '3', 'movimiento' => true],
            ['codigo' => '6.1.04', 'nombre' => 'Gastos de Depreciación', 'tipo' => 'Gasto', 'nivel' => '3', 'movimiento' => true],
        ];

        foreach ($accounts as $account) {
            Account::firstOrCreate(['codigo' => $account['codigo']], $account);
        }
    }
}