<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);
$start = strpos($html, '<body');
$body = substr($html, $start, 8000);
$body = str_replace('</body>', '[FIN]', $body);
echo $body;
