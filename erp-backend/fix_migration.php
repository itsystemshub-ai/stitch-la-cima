<?php
echo "Iniciando migración y desbloqueo de UI (Phase 0-6)...\n";

function fix_and_replace($path, $search, $replace) {
    if (!file_exists($path)) {
        echo "Error: No se encuentra $path\n";
        return;
    }
    $content = file_get_contents($path);
    // Convert encoding to UTF-8 if it's not already
    $content = mb_convert_encoding($content, 'UTF-8', 'auto');
    
    if (strpos($content, $search) !== false) {
        $content = str_replace($search, $replace, $content);
        file_put_contents($path, $content);
        echo "Exito: Reemplazado '$search' a '$replace' en $path\n";
    } else {
        echo "Aviso: '$search' no encontrado en $path\n";
    }
}

function mirror_html_to_blade($htmlPath, $bladePath) {
    if (!file_exists($htmlPath)) {
        echo "Error: No se encuentra $htmlPath\n";
        return;
    }
    $content = file_get_contents($htmlPath);
    $content = mb_convert_encoding($content, 'UTF-8', 'auto');

    // Remove BLOQUEADO tags
    $content = str_replace('<span class="text-error">BLOQUEADO</span>', '<span class="text-success font-bold text-green-500">ACTIVO</span>', $content);
    $content = str_replace('BLOQUEADO', 'ACTIVO', $content);
    
    // Replace hrefs with Laravel helpers where appropriate
    $content = preg_replace('/href="([^"]+)\.html"/', 'href="{{ url(\'/erp/$1\') }}"', $content);
    
    file_put_contents($bladePath, $content);
    echo "Exito: Migrado $htmlPath a $bladePath\n";
}

$base = __DIR__;

// 1. Fix libro-caja.blade.php
fix_and_replace(
    $base . '/resources/views/erp/libro-caja.blade.php', 
    '<span class="text-error">BLOQUEADO</span>', 
    '<span class="text-success font-bold text-green-500">ACTIVO</span>'
);

// 2. Migrate Inventario
mirror_html_to_blade(
    $base . '/../frontend/public/erp/inventario.html',
    $base . '/resources/views/erp/inventario.blade.php'
);

// 3. Migrate Ventas
mirror_html_to_blade(
    $base . '/../frontend/public/erp/ventas.html',
    $base . '/resources/views/erp/ventas.blade.php'
);

echo "Migración completada exitosamente.\n";
