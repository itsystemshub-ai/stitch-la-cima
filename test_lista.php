<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list&search=Empacadura');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

$start = strpos($html, '<div id="listViewContainer"');
$end = strpos($html, '</div>             <!-- Pagination -->');
if ($start !== false && $end !== false) {
    $snippet = substr($html, $start, $end - $start + 400);
    echo "=== VISTA LISTA SNIPPET ===\n";
    echo substr($snippet, 0, 4000);
} else {
    echo "No se encontró listViewContainer";
}
