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
    public function __construct()
    {
        // Solo permitir debug en local o si está explícitamente habilitado en el .env
        if (app()->environment('production') && !config('app.erp_debug', false)) {
            abort(403, 'Acceso denegado: Herramientas de diagnóstico deshabilitadas en producción.');
        }
    }

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
     * Acceso directo de emergencia (Solo local).
     */
    public function emergencyLogin()
    {
        if (!app()->environment('local')) {
            abort(403, 'Solo permitido en entorno local.');
        }

        $user = User::where('email', 'admin@lacima.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Administrador Supremo',
                'email' => 'admin@lacima.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'is_active' => 1,
                'modulos' => ['inventario','ventas','compras','contabilidad','rrhh','configuracion','finanzas','aprobaciones','ayuda']
            ]);
        } else {
            $user->update([
                'password' => bcrypt('admin123'),
                'is_active' => 1,
                'role' => 'admin',
                'modulos' => ['inventario','ventas','compras','contabilidad','rrhh','configuracion','finanzas','aprobaciones','ayuda']
            ]);
        }
        
        Auth::login($user);
        return redirect('/erp/dashboard');
    }

    /**
     * Forzar migración e importación (Solo local).
     */
    public function forceImport()
    {
        if (!app()->environment('local')) {
            abort(403, 'Solo permitido en entorno local.');
        }

        try {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            $mig = \Illuminate\Support\Facades\Artisan::output();
            
            \Illuminate\Support\Facades\Artisan::call('zenith:import-users');
            $imp = \Illuminate\Support\Facades\Artisan::output();
            
            return "MIGRACIONES: " . $mig . "\n\nIMPORTACION: " . $imp;
        } catch (\Exception $e) {
            return "ERROR: " . $e->getMessage();
        }
    }
}
