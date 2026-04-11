<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class MaintenanceController extends Controller
{
    /**
     * Ejecuta las migraciones y puebla la base de datos.
     * Útil para superar bloqueos de terminal en el entorno de desarrollo.
     */
    public function unlockDatabase()
    {
        try {
            Log::info('[ZENITH MAINTENANCE] Iniciando desbloqueo de DB...');
            
            // Ejecutamos migraciones frescas y seeders
            Artisan::call('migrate:fresh', ['--force' => true]);
            Artisan::call('db:seed', ['--force' => true]);
            
            $output = Artisan::output();
            
            return response()->json([
                'status' => 'success',
                'message' => 'Base de datos desbloqueada y poblada exitosamente.',
                'output' => $output
            ], 200);
            
        } catch (\Exception $e) {
            Log::error('[ZENITH MAINTENANCE] Error al desbloquear DB: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Fallo al desbloquear la base de datos.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
