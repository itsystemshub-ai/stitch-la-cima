<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'rif' => 'J-30492812-1',
                'razon_social' => 'AUTOPARTES EL PARRAL C.A.',
                'email' => 'contabilidad@elparral.com',
                'telefono' => '+58 241 822 5544',
                'direccion' => 'Av. Universidad, Sector El Recreo, Valencia.',
                'tipo_cliente' => 'TALLER',
                'limite_credito' => 15000.00,
                'activo' => true,
            ],
            [
                'rif' => 'J-40283129-4',
                'razon_social' => 'TRANSPORTE LOGISTICO GLOBAL',
                'email' => 'ops@translog.ve',
                'telefono' => '+58 212 952 1122',
                'direccion' => 'Zona Industrial Carabobo, Galpon 12, Valencia.',
                'tipo_cliente' => 'FLOTISTA',
                'limite_credito' => 45000.00,
                'activo' => true,
            ],
            [
                'rif' => 'V-15829341-0',
                'razon_social' => 'PEDRO ARMANDO GOMEZ (CENTRO ARAGUA)',
                'email' => 'pedrogomez@gmail.com',
                'telefono' => '+58 412 885 9922',
                'direccion' => 'Maracay, Estado Aragua, Av. Bolivar.',
                'tipo_cliente' => 'DETAL',
                'limite_credito' => 2500.00,
                'activo' => true,
            ],
            [
                'rif' => 'J-00045938-2',
                'razon_social' => 'CUMMINS DE VENEZUELA, S.A.',
                'email' => 'ventas@cummins.ve',
                'telefono' => '+58 241 850 4433',
                'direccion' => 'Valencia, Zona Industrial II.',
                'tipo_cliente' => 'PROVEEDOR-CLIENTE',
                'limite_credito' => 100000.00,
                'activo' => true,
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
