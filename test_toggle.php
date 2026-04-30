<?php
// Test GRID
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=grid');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$grid = curl_exec($ch);
curl_close($ch);

// Test LISTA
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$list = curl_exec($ch);
curl_close($ch);

echo "=== GRID ===\n";
echo "Tiene 'VISTA GRID' comentario: " . (strpos($grid, 'VISTA GRID: Cuadrada') !== false ? 'SI' : 'NO') . "\n";
echo "Tiene 'VISTA LISTA' comentario: " . (strpos($grid, 'VISTA LISTA: Compacta') !== false ? 'SI (BUG)' : 'NO') . "\n";
echo "Tiene grid-cols: " . (strpos($grid, 'grid-cols-1 sm:grid-cols-2') !== false ? 'SI' : 'NO') . "\n";
echo "Tiene tabla: " . (strpos($grid, 'w-full text-left') !== false ? 'SI' : 'NO') . "\n\n";

echo "=== LISTA ===\n";
echo "Tiene 'VISTA GRID' comentario: " . (strpos($list, 'VISTA GRID: Cuadrada') !== false ? 'SI (BUG)' : 'NO') . "\n";
echo "Tiene 'VISTA LISTA' comentario: " . (strpos($list, 'VISTA LISTA: Compacta') !== false ? 'SI' : 'NO') . "\n";
echo "Tiene grid-cols: " . (strpos($list, 'grid-cols-1 sm:grid-cols-2') !== false ? 'SI (BUG)' : 'NO') . "\n";
echo "Tiene tabla: " . (strpos($list, 'w-full text-left') !== false ? 'SI' : 'NO') . "\n";
