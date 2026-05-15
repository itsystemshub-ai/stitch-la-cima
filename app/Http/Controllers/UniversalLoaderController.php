<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniversalLoaderController extends Controller
{
    /**
     * Procesar la carga de Clientes y Vendedores desde el archivo listaclientesvendedores.
     */
    public function importEntities(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,txt',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        
        try {
            DB::beginTransaction();

            if ($extension === 'txt' || $extension === 'csv') {
                $content = file_get_contents($file->getRealPath());
                $rows = explode("\n", $content);
                array_shift($rows); // Quitar cabecera
                
                foreach ($rows as $row) {
                    if (empty(trim($row))) continue;
                    
                    $data = str_contains($row, "\t") ? explode("\t", $row) : explode(",", $row);
                    
                    if (count($data) >= 6) {
                        $this->processRow([
                            'region' => trim($data[0]),
                            'estado' => trim($data[1]),
                            'nombre' => trim($data[2]),
                            'email'  => trim($data[3]),
                            'rol'    => strtolower(trim($data[4])),
                            'pass'   => trim($data[5]),
                        ]);
                    }
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Entidades sincronizadas exitosamente.']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    private function processRow($data)
    {
        if (empty($data['email'])) return;

        // 1. Crear o Actualizar Usuario
        $user = User::updateOrCreate(
            ['email' => $data['email']],
            [
                'name' => $data['nombre'],
                'password' => Hash::make($data['pass']),
                'role' => $this->mapRole($data['rol']),
                'is_active' => 1,
                'region' => $data['region'],
                'estado' => $data['estado'],
            ]
        );

        // 2. Si es Cliente, crear el perfil en la tabla customers
        if ($user->role === 'cliente') {
            Customer::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'rif' => 'PEND-' . Str::upper(Str::random(8)),
                    'razon_social' => $data['nombre'],
                    'email' => $data['email'],
                    'region' => $data['region'],
                    'estado' => $data['estado'],
                    'activo' => true,
                ]
            );
        }

        // 3. Si es Vendedor, crear el perfil en la tabla employees para nómina
        if ($user->role === 'vendedor') {
            Employee::updateOrCreate(
                ['email' => $data['email']],
                [
                    'cedula' => 'V-PEND-' . Str::upper(Str::random(6)),
                    'nombre' => explode(' ', $data['nombre'])[0] ?? $data['nombre'],
                    'apellido' => explode(' ', $data['nombre'])[1] ?? '',
                    'cargo' => 'Vendedor Externo',
                    'salario' => 0,
                    'fecha_ingreso' => now(),
                    'tipo_contrato' => 'Indefinido',
                    'estatus' => 'Activo',
                ]
            );
        }
    }

    private function mapRole($rol)
    {
        $map = [
            'vendedor' => 'vendedor',
            'cliente' => 'cliente',
            'superusuario' => 'admin',
            'admin' => 'admin'
        ];

        return $map[$rol] ?? 'cliente';
    }
}
