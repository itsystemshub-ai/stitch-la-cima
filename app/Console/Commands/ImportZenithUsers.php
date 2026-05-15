<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class ImportZenithUsers extends Command
{
    protected $signature = 'zenith:import-users';
    protected $description = 'Import users from listaclientesvendedores file';

    public function handle()
    {
        $path = base_path('listaclientesvendedores');
        if (!file_exists($path)) {
            $this->error("Archivo no encontrado en $path");
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($lines); // Quitar cabecera

        $count = 0;
        foreach ($lines as $line) {
            $data = explode("\t", $line);
            if (count($data) < 6) continue;

            $region = trim($data[0]);
            $estado = trim($data[1]);
            $nombre = trim($data[2]);
            $email = trim($data[3]);
            $rol = trim($data[4]);
            $pass = trim($data[5]);

            // Determinar Departamento
            $depto = ($rol === 'Vendedor') ? 'VENTAS' : 'EXTERNO';

            // Definir módulos permitidos por rol
            $modulos = [];
            if (strtolower($rol) === 'vendedor') {
                $modulos = ['ventas', 'ayuda'];
            }

            // Crear o Actualizar Usuario
            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $nombre,
                    'password' => Hash::make($pass),
                    'role' => strtolower($rol),
                    'departamento' => $depto,
                    'region' => $region,
                    'estado' => $estado,
                    'is_active' => true,
                    'modulos' => $modulos
                ]
            );

            // Si es cliente, asegurar que esté en la tabla de clientes
            if (strtolower($rol) === 'cliente') {
                Customer::updateOrCreate(
                    ['email' => $email],
                    [
                        'user_id' => $user->id,
                        'razon_social' => $nombre,
                        'region' => $region,
                        'estado' => $estado,
                        'activo' => true
                    ]
                );
            }

            // Si es vendedor, asegurar que esté en la tabla de empleados
            if (strtolower($rol) === 'vendedor') {
                Employee::updateOrCreate(
                    ['email' => $email],
                    [
                        'nombre' => explode(' ', $nombre)[0],
                        'apellido' => explode(' ', $nombre)[1] ?? '',
                        'cargo' => 'Vendedor Externo',
                        'departamento' => 'VENTAS',
                        'salario' => 0, // Comisiones puras
                        'fecha_ingreso' => now(),
                        'estatus' => 'Activo'
                    ]
                );
            }

            $count++;
        }

        $this->info("Importación completada: $count registros procesados.");
    }
}
