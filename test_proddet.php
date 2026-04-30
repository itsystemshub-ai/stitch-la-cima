<?php
$ch = curl_init('http://localhost:8000/tienda/producto/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);
echo substr($html, 0, 2000);
