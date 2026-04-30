<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo 'HTTP Code: ' . $httpCode . PHP_EOL;
curl_close($ch);
