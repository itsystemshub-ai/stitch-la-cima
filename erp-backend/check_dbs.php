<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$dbs = [
    'default' => database_path('database.sqlite'),
    'root' => base_path('../database/zenith_erp.sqlite')
];

foreach ($dbs as $name => $path) {
    echo "Checking database: $name ($path)\n";
    if (!file_exists($path)) {
        echo "  File does not exist.\n";
        continue;
    }
    
    try {
        config(['database.connections.check' => [
            'driver' => 'sqlite',
            'database' => $path,
            'prefix' => '',
        ]]);
        
        $tables = DB::connection('check')->select("SELECT name FROM sqlite_master WHERE type='table'");
        echo "  Tables: " . implode(', ', array_column($tables, 'name')) . "\n";
    } catch (\Exception $e) {
        echo "  Error: " . $e->getMessage() . "\n";
    }
}
