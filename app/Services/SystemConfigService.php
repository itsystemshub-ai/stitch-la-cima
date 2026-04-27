<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

class SystemConfigService
{
    /**
     * Obtener estado de salud del sistema.
     */
    public function getSystemHealth(): array
    {
        return [
            'database' => $this->checkDatabase(),
            'storage' => $this->checkStorage(),
            'cache' => $this->checkCache(),
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'server_os' => PHP_OS,
        ];
    }

    private function checkDatabase(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function checkStorage(): bool
    {
        return is_writable(storage_path());
    }

    private function checkCache(): bool
    {
        try {
            Cache::put('health_check', true, 10);
            return Cache::get('health_check') === true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Obtener estadísticas de la base de datos.
     */
    public function getDatabaseStats(): array
    {
        $tables = DB::select('SHOW TABLE STATUS');
        $totalSize = 0;
        foreach ($tables as $table) {
            $totalSize += $table->Data_length + $table->Index_length;
        }

        return [
            'tables_count' => count($tables),
            'size_mb' => round($totalSize / 1024 / 1024, 2),
            'last_backup' => Cache::get('last_backup_date', 'Nunca'),
        ];
    }
}
