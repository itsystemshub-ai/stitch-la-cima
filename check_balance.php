<?php
// Intentar incluir el Blade como si fuera PHP puro para detectar errores de sintaxis
// (esto no funcionará por las directivas Blade, pero sirve para parseo básico)
$file = file_get_contents('C:\Users\ET\Documents\GitHub\stitch_la_cima\resources\views\tienda\detalle_productos.blade.php');

// Buscar posibles problemas: comillas sin cerrar, llaves desbalanceadas básicas
$openSection = substr_count($file, '@section(');
$closeSection = substr_count($file, '@endsection');
echo "@section: $openSection\n";
echo "@endsection: $closeSection\n";

$openPush = substr_count($file, '@push(');
$closePush = substr_count($file, '@endpush');
echo "@push: $openPush\n";
echo "@endpush: $closePush\n";

if ($openSection != $closeSection) {
    echo "ERROR: Secciones desbalanceadas\n";
}
if ($openPush != $closePush) {
    echo "ERROR: Pushes desbalanceados\n";
}
