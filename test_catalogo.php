<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$r = curl_exec($ch);
$c = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo 'Código HTTP: ' . $c . "\n\n";
$hSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$body = substr($r, $hSize);
echo 'Tamaño body: ' . strlen($body) . "\n\n";
echo substr($body, 0, 3000);
curl_close($ch);
