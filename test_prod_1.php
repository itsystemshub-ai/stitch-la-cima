<?php
$ch = curl_init('http://localhost:8000/tienda/producto/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$r = curl_exec($ch);
$c = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo 'HTTP: ' . $c;
curl_close($ch);
