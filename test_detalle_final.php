<?php
$ch = curl_init('http://localhost:8000/tienda/producto/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Contar cuántas veces aparece "Premium Product Detail Main"
$count = substr_count($html, 'Premium Product Detail');
echo "Apariciones de 'Premium Product': $count\n";

// Contar cierres de main
$mainCloses = substr_count($html, '</main>');
echo "Cierres de </main>: $mainCloses\n";

// Extraer sección principal
$start = strpos($html, '<main class="pt-20');
$end = strpos($html, '</main>', $start);
if ($start !== false && $end !== false) {
    $body = substr($html, $start, $end - $start + 7);
    echo "\n--- MAIN HTML ---\n";
    echo $body;
} else {
    echo "No se pudo extraer el main";
}
