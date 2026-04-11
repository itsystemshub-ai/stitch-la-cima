<?php
/**
 * Motor de Migración de HTML a Blade
 * Ejecutar: php migrate_views.php
 */

$frontendPath = realpath(__DIR__ . '/../frontend/public/erp');
$viewsPath = realpath(__DIR__ . '/resources/views');
$moduleViewsPath = $viewsPath . '/erp';

if (!file_exists($moduleViewsPath)) {
    mkdir($moduleViewsPath, 0777, true);
}

// Fases 3 y 4 (Todas las restantes)
$allFiles = glob("$frontendPath/*.html");
$filesToMigrate = [];

$excluir = ['inicio.html', 'inicio1.html', 'configuracion-legacy.html', 'pos.html', 'prueba_clima.html'];

foreach($allFiles as $file) {
    if (str_ends_with($file, '.modern.html') || str_ends_with($file, '_modern.html')) continue;
    $baseName = basename($file);
    if (!in_array($baseName, $excluir)) {
        // Ignoremos las que ya están en resources/views/erp/ para ahorrar log, o dejémoslas sobreescribir (es idempotente)
        $filesToMigrate[] = $baseName;
    }
}

foreach ($filesToMigrate as $filename) {
    if (!file_exists("$frontendPath/$filename")) {
        echo "No se encontró $filename\n";
        continue;
    }
    
    $html = file_get_contents("$frontendPath/$filename");
    
    // 1. Extraer Título (opcional)
    $title = 'Módulo ERP';
    if (preg_match('/<title>(.*?)<\/title>/s', $html, $matches)) {
        $title = trim($matches[1]);
    }
    
    // 2. Extraer Título del Breadcrumb
    $breadcrumb = 'Módulo';
    if (preg_match('/<span class="text-stone-900 font-medium".*?id="breadcrumbPage">(.*?)<\/span>/s', $html, $matches)) {
        $breadcrumb = trim($matches[1]);
    }
    
    // 3. Extraer CSS específico (que no sea common.css ni inicio.css)
    $cssTags = [];
    if (preg_match_all('/<link rel="stylesheet" href="(css\/.*?)">/s', $html, $matches)) {
        foreach ($matches[1] as $css) {
            if (!in_array($css, ['css/common.css', 'css/inicio.css'])) {
                $cssTags[] = "<link rel=\"stylesheet\" href=\"/frontend/public/erp/{$css}\">";
            }
        }
    }
    
    // 4. Extraer <main>...</main>
    $mainContent = '';
    // Usamos strpos para evitar lios con regex por el tamaño de \n
    $startMain = strpos($html, '<main');
    if ($startMain !== false) {
        $endMain = strpos($html, '</main>', $startMain);
        if ($endMain !== false) {
            $mainContent = substr($html, $startMain, ($endMain + 7) - $startMain);
        }
    }
    
    // 5. Extraer Javascript específico
    $jsTags = [];
    if (preg_match_all('/<script src="(js\/.*?)"><\/script>/s', $html, $matches)) {
        foreach ($matches[1] as $js) {
            if (!in_array($js, ['js/common.js', 'js/inicio.js'])) {
                $jsTags[] = "<script src=\"/frontend/public/erp/{$js}\"></script>";
            }
        }
    }
    
    // 6. Construir Blade
    $bladeName = str_replace('.html', '', $filename);
    
    $bladeContent = "@extends('layouts.erp')\n\n";
    $bladeContent .= "@section('title', '$title')\n";
    
    if (!empty($cssTags)) {
        $bladeContent .= "\n@push('styles')\n";
        $bladeContent .= "    " . implode("\n    ", $cssTags) . "\n";
        $bladeContent .= "@endpush\n";
    }
    
    $bladeContent .= "\n@section('content')\n";
    // Si queremos inyectar el Breadcrumb desde PHP via View Composer o script, lo dejamos así 
    // Por ahora el main ya incluye the layout, wait. The master layout INCLUDES the header and the breadcrumb wrapper!
    // Pero en el HTML original el breadcrumb header está ANTES del <main>. Para mantener inmutabilidad con el Master Layout q ya tiene el header quemado, inyectamos JS oculto para actualizar the title:
    $bladeContent .= "<script>\n";
    $bladeContent .= "  document.addEventListener('DOMContentLoaded', () => {\n";
    $bladeContent .= "      const b = document.getElementById('breadcrumbPage');\n";
    $bladeContent .= "      if(b) b.innerText = '$breadcrumb';\n";
    $bladeContent .= "  });\n";
    $bladeContent .= "</script>\n\n";
    
    $bladeContent .= $mainContent . "\n";
    $bladeContent .= "@endsection\n";
    
    if (!empty($jsTags)) {
        $bladeContent .= "\n@push('scripts')\n";
        $bladeContent .= "    " . implode("\n    ", $jsTags) . "\n";
        $bladeContent .= "@endpush\n";
    }
    
    file_put_contents("$moduleViewsPath/$bladeName.blade.php", $bladeContent);
    echo "✔ Generado: resources/views/erp/$bladeName.blade.php\n";
}

echo "\n============================================\n";
echo "🏆 MIGRACIÓN GLOBAL COMPLETADA (Fase 3 y 4).\n";
echo "¡Todo el frontend (Comrpas, Contabilidad, Finanzas, RRHH, etc.) ha sido consolidado en Blade!\n";
echo "============================================\n";
