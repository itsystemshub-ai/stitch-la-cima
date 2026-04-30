<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$list = curl_exec($ch);
curl_close($ch);

// Guardar para inspeccionar
file_put_contents('C:\Users\ET\Documents\GitHub\stitch_la_cima\vista_lista_debug.html', $list);
echo "Archivo guardado. Buscando 'grid-cols' en view=list:\n";
$pos = strpos($list, 'grid-cols');
if ($pos !== false) {
    $ctx = substr($list, max(0, $pos - 50), 200);
    echo "Contexto: " . htmlspecialchars($ctx) . "\n";
} else {
    echo "No se encontró 'grid-cols'\n";
}
// Check if table is there
$posTable = strpos($list, 'Referencia');
if ($posTable !== false) {
    echo "Texto 'Referencia' encontrado (tabla OK)\n";
}
// Check for "Cuadrada" text (grid label)
$posGridLabel = strpos($list, 'Cuadrada');
if ($posGridLabel !== false) {
    echo "Texto 'Cuadrada' encontrado (grid label - BUG)\n";
}
