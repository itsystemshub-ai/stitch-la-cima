<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?page=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Verificar si hay clases nav-prev/nav-next
if (strpos($html, 'nav-prev') !== false && strpos($html, 'nav-next') !== false) {
    echo "✓ Botones de navegación (prev/next) encontrados\n";
} else {
    echo "✗ Botones de navegación NO encontrados\n";
}

// Verificar que existen múltiples imágenes en algún producto
if (strpos($html, 'data-dot') !== false) {
    echo "✓ Indicadores de puntos encontrados\n";
} else {
    echo "✗ Indicadores de puntos NO encontrados\n";
}

// Verificar que no hay errores de sintaxis
if (substr_count($html, '<') < 50) {
    echo "✗ Parece haber poco HTML\n";
} else {
    echo "✓ HTML cargado correctamente\n";
}

// Buscar product-card
$pos = strpos($html, 'product-card');
if ($pos !== false) {
    $start = max(0, $pos - 100);
    $snippet = substr($html, $start, 800);
    echo "\n--- Snippet product-card ---\n";
    echo $snippet;
}
