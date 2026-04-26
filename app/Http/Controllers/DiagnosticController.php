<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DiagnosticController extends Controller
{
    /**
     * Semilla rápida para crear un usuario administrador.
     */
    public function seedAdmin()
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@lacima.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => 1,
            ]
        );

        return response()->json([
            'status' => 'success',
            'user' => $user->email,
            'role' => $user->role,
            'message' => 'Usuario admin creado o actualizado correctamente.',
        ]);
    }

    /**
     * Informe de diagnóstico del sistema.
     */
    public function diagnostico()
    {
        $result = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'env_db_connection' => env('DB_CONNECTION'),
            'tablas' => [],
            'columnas_users' => [],
            'usuarios' => [],
            'environment' => app()->environment(),
        ];

        try {
            $tables = DB::getSchemaBuilder()->getTableListing();
            $result['tablas'] = $tables;
        } catch (\Exception $e) {
            $result['error_db'] = $e->getMessage();
        }

        try {
            $result['columnas_users'] = DB::getSchemaBuilder()->getColumnListing('users');
            $result['usuarios'] = User::select('id', 'name', 'email', 'role', 'is_active')->limit(10)->get();
        } catch (\Exception $e) {
            $result['error_users'] = $e->getMessage();
        }

        return response()->json($result, JSON_PRETTY_PRINT);
    }

    /**
     * Lista todas las rutas que contienen 'erp'.
     */
    public function listarRutasErp()
    {
        $rutas = Route::getRoutes();
        $erpRoutes = [];
        
        foreach ($rutas as $ruta) {
            if (str_contains($ruta->uri(), 'erp')) {
                $erpRoutes[] = $ruta->uri() . ' [' . implode(',', $ruta->methods()) . ']';
            }
        }

        return response()->json($erpRoutes);
    }

    /**
     * Lista todos los usuarios del sistema.
     */
    public function listarUsuarios()
    {
        return response()->json(User::select('id', 'name', 'email', 'role', 'is_active')->get());
    }

    /**
     * Prueba simple de credenciales admin.
     */
    public function loginTest()
    {
        $credentials = ['email' => 'admin@lacima.com', 'password' => 'admin123'];

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'success', 
                'user' => Auth::user()->name, 
                'role' => Auth::user()->role
            ]);
        }

        return response()->json(['status' => 'failed', 'message' => 'Autenticación fallida con credenciales por defecto.']);
    }
}
