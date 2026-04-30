<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

echo "Verificando vista LISTA...\n\n";

$gridCount = substr_count($html, 'grid-cols-1 sm:grid-cols-2');
echo "grid-cols: $gridCount\n";

$tableCount = substr_count($html, 'w-full text-left');
echo "tabla: $tableCount\n";

$listaComentario = strpos($html, 'VISTA LISTA: Compacta');
$gridComentario = strpos($html, 'VISTA GRID: Cuadrada');

echo "Coment LISTA: " . ($listaComentario !== false ? 'SI' : 'NO') . "\n";
echo "Coment GRID: " . ($gridComentario !== false ? 'SI' : 'NO') . "\n";

$flexCount = substr_count($html, 'flex-grow');
echo "flex-grow: $flexCount\n";
