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
                'name' => 'Alfredo Jiménez (Autopartes El Parral)',
                'email' => 'ajimenez@elparral.com.ve',
                'password' => 'parral2026',
                'razon_social' => 'AUTOPARTES EL PARRAL C.A.',
                'rif' => 'J-30492812-1',
                'telefono' => '+58 241 822 5544',
                'direccion' => 'Av. Universidad, Sector El Recreo, Valencia, Edo. Carabobo.',
                'tipo_cliente' => 'TALLER',
                'limite_credito' => 15000.00,
            ],
            [
                'name' => 'Logística Global Admin',
                'email' => 'operaciones@translog.com.ve',
                'password' => 'logisticaglobal2026',
                'razon_social' => 'TRANSPORTE LOGISTICO GLOBAL T.L.G. C.A.',
                'rif' => 'J-40283129-4',
                'telefono' => '+58 212 952 1122',
                'direccion' => 'Zona Industrial Carabobo, Galpón 12, Valencia.',
                'tipo_cliente' => 'FLOTISTA',
                'limite_credito' => 45000.00,
            ],
            [
                'name' => 'Pedro Armando Gómez',
                'email' => 'pgomez_ventas@hotmail.com',
                'password' => 'pedroge2026',
                'razon_social' => 'PEDRO ARMANDO GOMEZ (CENTRO ARAGUA)',
                'rif' => 'V-15829341-0',
                'telefono' => '+58 412 885 9922',
                'direccion' => 'Maracay, Estado Aragua, Av. Bolívar, Local 45.',
                'tipo_cliente' => 'DETAL',
                'limite_credito' => 2500.00,
            ],
            [
                'name' => 'Ventas Cummins Venezuela',
                'email' => 'ventas@cummins.com.ve',
                'password' => 'cumminsvc2026',
                'razon_social' => 'CUMMINS DE VENEZUELA, S.A.',
                'rif' => 'J-00045938-2',
                'telefono' => '+58 241 850 4433',
                'direccion' => 'Valencia, Zona Industrial II, Calle 101, Galpón C-4.',
                'tipo_cliente' => 'MAYOR',
                'limite_credito' => 100000.00,
            ],
        ];

        foreach ($customers as $data) {
            $user = \App\Models\User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => \Illuminate\Support\Facades\Hash::make($data['password']),
                    'role' => 'cliente',
                    'is_active' => true,
                ]
            );

            \App\Models\Customer::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'rif' => $data['rif'],
                    'razon_social' => $data['razon_social'],
                    'telefono' => $data['telefono'],
                    'direccion' => $data['direccion'],
                    'tipo_cliente' => $data['tipo_cliente'],
                    'limite_credito' => $data['limite_credito'],
                    'activo' => true,
                ]
            );
        }
    }
}
