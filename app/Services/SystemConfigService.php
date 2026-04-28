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
     * Obtener estadísticas detalladas de la base de datos.
     */
    public function getDatabaseStats(): array
    {
        try {
            $start = microtime(true);
            \DB::select('SELECT 1');
            $latency = round((microtime(true) - $start) * 1000, 2);

            $tables = \DB::select('SHOW TABLE STATUS');
            $totalSize = 0;
            $totalRecords = 0;
            $formattedTables = [];

            foreach ($tables as $table) {
                $size = ($table->Data_length + $table->Index_length);
                $totalSize += $size;
                $totalRecords += $table->Rows;

                $formattedTables[] = [
                    'name' => $table->Name,
                    'rows' => $table->Rows,
                    'size_mb' => round($size / 1024 / 1024, 2),
                    'engine' => $table->Engine,
                    'comment' => $table->Comment ?: 'Sustrato de datos activo',
                    'updated_at' => $table->Update_time,
                    'collation' => $table->Collation
                ];
            }

            usort($formattedTables, fn($a, $b) => $b['size_mb'] <=> $a['size_mb']);

            $status = collect(\DB::select("SHOW GLOBAL STATUS WHERE Variable_name IN ('Uptime', 'Queries', 'Threads_connected')"))
                ->pluck('Value', 'Variable_name');
            
            $variables = collect(\DB::select("SHOW VARIABLES WHERE Variable_name IN ('version', 'version_compile_os', 'protocol_version', 'character_set_server', 'collation_server', 'hostname', 'port')"))
                ->pluck('Value', 'Variable_name');

            $uptimeSeconds = $status['Uptime'] ?? 0;
            $days = floor($uptimeSeconds / 86400);
            $hours = floor(($uptimeSeconds % 86400) / 3600);
            $uptimeFormatted = "{$days} d : {$hours} h";

            return [
                'tables_count' => count($tables),
                'total_records' => $totalRecords,
                'size_mb' => round($totalSize / 1024 / 1024, 2),
                'last_backup' => Cache::get('last_backup_date', 'Nunca'),
                'tables' => $formattedTables,
                'version' => $variables['version'] ?? 'Unknown',
                'uptime' => $uptimeFormatted,
                'latency' => $latency,
                'connections' => $status['Threads_connected'] ?? 0,
                // phpMyAdmin Extended Specs
                'server_info' => [
                    'ip' => ($variables['hostname'] ?? '127.0.0.1') . ' via TCP/IP',
                    'type' => str_contains($variables['version'] ?? '', 'MariaDB') ? 'MariaDB' : 'MySQL',
                    'version' => $variables['version'] ?? 'N/A',
                    'os' => $variables['version_compile_os'] ?? 'N/A',
                    'protocol' => $variables['protocol_version'] ?? '10',
                    'user' => config('database.connections.mysql.username') . '@' . ($variables['hostname'] ?? 'localhost'),
                    'charset' => $variables['character_set_server'] ?? 'utf8mb4',
                    'collation' => $variables['collation_server'] ?? 'utf8mb4_unicode_ci',
                ],
                'web_server' => [
                    'software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Apache/2.4.58 (Win64)',
                    'php_version' => PHP_VERSION,
                    'extensions' => ['mysqli', 'curl', 'mbstring', 'openssl', 'pdo_mysql'],
                ],
                'phpmyadmin' => [
                    'version' => '5.2.1',
                    'latest' => '5.2.3'
                ],
                'database_name' => config('database.connections.mysql.database')
            ];
        } catch (\Exception $e) {
            return [
                'tables_count' => 0,
                'total_records' => 0,
                'size_mb' => 0,
                'tables' => [],
                'server_info' => [],
                'web_server' => [],
                'error' => $e->getMessage()
            ];
        }
    }
}
