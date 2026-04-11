<?php
// We don't need the full Laravel bootstrap if we just want to check the files
$dbs = [
    'default' => __DIR__ . '/../database/database.sqlite',
    'root' => __DIR__ . '/../../database/zenith_erp.sqlite'
];

echo "<h1>Diagnostic Database Check</h1>";

foreach ($dbs as $name => $path) {
    echo "<h2>Checking database: $name</h2>";
    echo "<p>Path: $path</p>";
    if (!file_exists($path)) {
        echo "<p style='color:red'>File does not exist.</p>";
        continue;
    }
    
    try {
        $pdo = new PDO("sqlite:$path");
        $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "<p>Tables: " . implode(', ', $tables) . "</p>";
        
        $toCount = ['users', 'products', 'orders', 'customers'];
        foreach ($toCount as $tbl) {
            if (in_array($tbl, $tables)) {
                $count = $pdo->query("SELECT COUNT(*) FROM $tbl")->fetchColumn();
                echo "<p>Table <b>$tbl</b> count: $count</p>";
            }
        }
    } catch (\Exception $e) {
        echo "<p style='color:red'>Error: " . $e->getMessage() . "</p>";
    }
}
