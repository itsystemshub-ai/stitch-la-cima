<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Verificar que no haya texto duplicado clave
$pos1 = strpos($html, '<!-- List View (Enhanced Table Mode) -->');
if ($pos1 !== false) {
    $pos2 = strpos($html, '<!-- List View (Enhanced Table Mode) -->', $pos1 + 1);
    if ($pos2 !== false) {
        echo "ERROR: Se encontró duplicado del comentario de lista\n";
    } else {
        echo "OK: No hay duplicado del comentario de lista\n";
    }
}

// Buscar estructura repetida
// Contar divs con grid grid-cols-1 gap-4
$count = substr_count($html, 'grid grid-cols-1 gap-4');
echo "Apariciones de 'grid grid-cols-1 gap-4': $count\n";

// Verificar que el formulario de filtros no aparezca duplicado
$filtros = substr_count($html, 'Filtrado Técnico');
echo "Apariciones de 'Filtrado Técnico': $filtros\n";

// Extraer sección principal del catálogo
$start = strpos($html, '<main class="flex-grow pt-20');
$end = strpos($html, '</main>', $start);
if ($start !== false && $end !== false) {
    $body = substr($html, $start, $end - $start + 7);
    echo "\n--- LONGITUD DEL MAIN: " . strlen($body) . " caracteres\n";
    echo "--- INICIO DEL CONTENIDO ---\n";
    echo substr($body, 0, 2000);
}
