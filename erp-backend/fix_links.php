<?php
$layoutPath = __DIR__ . '/resources/views/layouts/erp.blade.php';
$html = file_get_contents($layoutPath);

// Replace href="archivo.html" with href="/erp/archivo"
$html = preg_replace('/href="(?!(?:http|\/|css|js))(.*?)\.html"/', 'href="/erp/$1"', $html);

// Specific overrides
$html = str_replace('href="/erp/inicio"', 'href="/dashboard"', $html);
$html = str_replace('href="/erp/pos"', 'href="/pos"', $html);

file_put_contents($layoutPath, $html);
echo "Enlaces actualizados en el Layout.";
