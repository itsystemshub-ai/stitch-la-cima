<?php
$viewsPath = __DIR__ . '/resources/views/erp';
$files = glob("$viewsPath/*.blade.php");

foreach($files as $file) {
    $html = file_get_contents($file);
    // Replace href="something.html" to href="/erp/something"
    // We ignore http:// and absolute paths just in case
    $html = preg_replace('/href="(?!(?:http|\/|css|js))(.*?)\.html"/', 'href="/erp/$1"', $html);
    
    // Exception for pos since pos is at /pos, not /erp/pos
    $html = str_replace('href="/erp/pos"', 'href="/pos"', $html);
    
    // Exception for inicio since it's /dashboard
    $html = str_replace('href="/erp/inicio"', 'href="/dashboard"', $html);
    
    file_put_contents($file, $html);
}
echo "¡Enlaces limpios en " . count($files) . " vistas Blade!\n";
