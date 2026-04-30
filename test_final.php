<?php
$listaUrl = 'http://localhost:8000/tienda/catalogo_detallado?view=list';
$gridUrl  = 'http://localhost:8000/tienda/catalogo_detallado?view=grid';

function test($url, $name) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "=== $name ($code) ===\n";
    echo "URL: $url\n";
    
    $hasLista = strpos($html, '<!-- VISTA LISTA: Compacta') !== false;
    $hasGrid  = strpos($html, '<!-- VISTA GRID: Cuadrada') !== false;
    $hasTable = strpos($html, '<table class="w-full text-left') !== false;
    $hasGridCols = strpos($html, 'grid grid-cols-1 sm:grid-cols-2') !== false;
    
    echo "Render LISTA: " . ($hasLista ? 'SI' : 'NO') . "\n";
    echo "Render GRID:  " . ($hasGrid ? 'SI' : 'NO') . "\n";
    echo "Tabla visible: " . ($hasTable ? 'SI' : 'NO') . "\n";
    echo "Grid-cols visible: " . ($hasGridCols ? 'SI' : 'NO') . "\n";
    
    // Consistencia
    if ($hasLista && !$hasGrid && $hasTable && !$hasGridCols) {
        echo "✓ CONSISTENTE (SOLO LISTA)\n";
    } elseif (!$hasLista && $hasGrid && !$hasTable && $hasGridCols) {
        echo "✓ CONSISTENTE (SOLO GRID)\n";
    } else {
        echo "✗ INCONSISTENTE (AMBDOS O NINGUNO)\n";
    }
    echo "\n";
}

test($listaUrl, 'VISTA LISTA');
test($gridUrl,  'VISTA GRID');
