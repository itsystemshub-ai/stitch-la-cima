<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Verificar si aparece "Vista LISTA" sección correctamente
echo "Buscando 'Vista LISTA' o tabla exclusiva...\n";

// Buscar si hay grid-cols (grid) en la página
$gridCount = substr_count($html, 'grid-cols-1 sm:grid-cols-2');
echo "Apariciones de 'grid-cols-1 sm:grid-cols-2': $gridCount\n";

// Buscar si hay texto específico de lista
tableCount = substr_count($html, '<table class="w-full text-left">');
echo "Apariciones de '<table class=\"w-full text-left\">': $tableCount\n";

// Verificar que el @if se evaluó correctamente
if (strpos($html, '<!-- VISTA LISTA: Compacta, SIN FOTO -->') !== false) {
    echo "✓ Comentario VISTA LISTA encontrado\n";
} else {
    echo "✗ Comentario VISTA LISTA NO encontrado\n";
}

if (strpos($html, '<!-- VISTA GRID: Cuadrada con galería -->') !== false) {
    echo "✓ Comentario VISTA GRID encontrado (NO debería estar en view=list)\n";
} else {
    echo "✓ Comentario VISTA GRID NO encontrado (correcto para view=list)\n";
}

// Verificar que no haya bloques duplicados de "flex-grow"
$flexCount = substr_count($html, 'class="flex-grow"');
echo "Apariciones de 'flex-grow': $flexCount (debería ser 1)\n";
