<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Extraer solo el area de productos (no el footer)
$start = strpos($html, '<section class="flex-grow">');
$end = strpos($html, '</section>', $start);
if ($start !== false && $end !== false) {
    $seccion = substr($html, $start, $end - $start + 11);
    // Buscar grid-cols DENTRO de esta seccion
    $tieneGrid = strpos($seccion, 'grid grid-cols-1 sm:grid-cols-2') !== false;
    $tieneTable = strpos($seccion, '<table class="w-full text-left') !== false;
    echo "En seccion flex-grow:\n";
    echo "  Grid-cols: " . ($tieneGrid ? 'SI' : 'NO') . "\n";
    echo "  Tabla: " . ($tieneTable ? 'SI' : 'NO') . "\n";
    if (!$tieneGrid && $tieneTable) {
        echo "✓ CORRECTO - SOLO LISTA\n";
    } else {
        echo "✗ INCORRECTO\n";
    }
}
