<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$r = curl_exec($ch);
curl_close($ch);

$sections = substr_count($r, '<section class="flex-grow">');
echo "Secciones flex-grow encontradas: $sections\n";

// Mostrar contexto de cada aparición
$offset = 0;
for ($i = 1; $i <= $sections; $i++) {
    $pos = strpos($r, '<section class="flex-grow">', $offset);
    if ($pos === false) break;
    $ctx = substr($r, $pos, 200);
    echo "\n--- Aparición $i ---\n";
    echo $ctx . "\n";
    $offset = $pos + 1;
}
