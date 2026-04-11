<?php
/**
 * Utility script to sanitize JS redirects and links in the frontend/public/ecommerce/js directory.
 * Converts .html references to Laravel routes.
 */

$jsDir = __DIR__ . '/../frontend/public/ecommerce/js';
$files = glob("$jsDir/*.js");

$replacements = [
    // Catalogo General
    "'/ecommerce/catalogo_general.html'" => "'/tienda/catalogo_general'",
    "'catalogo_general.html'" => "'/tienda/catalogo_general'",
    
    // Catalogo Detallado
    "'/ecommerce/catalogo_detallado.html'" => "'/tienda/catalogo_detallado'",
    "'catalogo_detallado.html'" => "'/tienda/catalogo_detallado'",
    
    // Index / Inicio
    "'/ecommerce/index.html'" => "'/tienda/index'",
    "'index.html'" => "'/tienda/index'",
    "'../ecommerce/index.html'" => "'/tienda/index'",
    
    // Auth related
    "'/auth/login.html'" => "'/auth/login'",
    "'login.html'" => "'/auth/login'",
    "'crear_cuenta.html'" => "'/auth/crear_cuenta'",
    
    // Others
    "'nosotros.html'" => "'/tienda/nosotros'",
    "'contacto.html'" => "'/tienda/contacto'",
    "'soporte.html'" => "'/tienda/soporte'",
    "'terminos_b2b.html'" => "'/tienda/terminos_b2b'",
    "'carrito.html'" => "'/tienda/carrito'",
    "'checkout.html'" => "'/tienda/checkout'",
    "'detalle_productos.html'" => "'/tienda/detalle_productos'",
];

foreach ($files as $file) {
    $content = file_get_contents($file);
    $original = $content;
    
    foreach ($replacements as $search => $replace) {
        $content = str_replace($search, $replace, $content);
    }
    
    // Handle query strings like 'catalogo_detallado.html?q='
    $content = preg_replace("/'catalogo_detallado\.html\?q=' \+/", "'/tienda/catalogo_detallado?q=' +", $content);
    $content = preg_replace("/'detalle_productos\.html\?id=' \+/", "'/tienda/detalle_productos?id=' +", $content);
    $content = preg_replace("/'detalle_productos\.html\?id=\\${p\.id}'/", "'/tienda/detalle_productos?id=\${p.id}'", $content);

    if ($original !== $content) {
        file_put_contents($file, $content);
        echo "Updated: " . basename($file) . "\n";
    }
}

echo "Sanitization complete.\n";
