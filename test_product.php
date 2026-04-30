<?php
$ch = curl_init('http://localhost:8000/tienda/producto/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo 'HTTP Code: ' . $httpCode . PHP_EOL;
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$body = substr($response, $headerSize);
if (strpos($body, 'Detalle del Producto') !== false || strpos($body, 'productTitle') !== false) {
    echo 'CONTENT OK: Found product detail markers' . PHP_EOL;
} else {
    echo 'CONTENT PARTIAL - First 500 chars:' . PHP_EOL;
    echo substr($body, 0, 500) . PHP_EOL;
}
curl_close($ch);
