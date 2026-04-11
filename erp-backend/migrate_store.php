<?php
/**
 * MIGRATE STORE v2 — Parser Robusto
 * Maneja páginas con <main> Y páginas sin <main> (extrae desde <body>).
 * Elimina Nav, MobileMenu y Footer propios (ya están en el layout).
 * Reescribe todos los href=*.html correctamente.
 */

$frontendPath = realpath(__DIR__ . '/../frontend/public');
$viewsPath    = realpath(__DIR__ . '/resources/views');

$modules = [
    'ecommerce' => [
        'path'   => "$frontendPath/ecommerce",
        'out'    => "$viewsPath/tienda",
        'layout' => 'layouts.ecommerce',
        'prefix' => 'tienda',
    ],
    'auth' => [
        'path'   => "$frontendPath/auth",
        'out'    => "$viewsPath/auth",
        'layout' => 'layouts.auth',
        'prefix' => 'auth',
    ],
];

foreach ($modules as $modName => $config) {
    if (!file_exists($config['out'])) {
        mkdir($config['out'], 0777, true);
    }

    $files = glob("{$config['path']}/*.html");
    foreach ($files as $file) {
        $filename = basename($file);
        $raw      = file_get_contents($file);

        // ── 1. TÍTULO ──────────────────────────────────────────────────────
        $title = 'MAYOR DE REPUESTO LA CIMA, C.A.';
        if (preg_match('/<title>(.*?)<\/title>/si', $raw, $m)) {
            $title = trim(strip_tags($m[1]));
        }

        // ── 2. CSS propios (excluir CDN) ───────────────────────────────────
        $cssLinks = [];
        if (preg_match_all('/<link[^>]+href=["\'](?!https?:\/\/)(css\/[^"\']+)["\'][^>]*>/i', $raw, $m)) {
            foreach ($m[1] as $css) {
                $cssLinks[] = "<link rel=\"stylesheet\" href=\"/frontend/public/{$modName}/{$css}\">";
            }
        }

        // ── 3. JS propios (excluir CDN) ────────────────────────────────────
        $jsScripts = [];
        if (preg_match_all('/<script[^>]+src=["\'](?!https?:\/\/)(js\/[^"\']+)["\'][^>]*><\/script>/i', $raw, $m)) {
            foreach ($m[1] as $js) {
                $jsScripts[] = "<script src=\"/frontend/public/{$modName}/{$js}\"></script>";
            }
        }
        // Elimina duplicados
        $jsScripts = array_unique($jsScripts);

        // ── 4. EXTRACCIÓN DE CONTENIDO ─────────────────────────────────────
        // Intentar primero con <main ... </main>
        $content = '';
        if (preg_match('/<main[\s\S]*?<\/main>/si', $raw, $m)) {
            $content = $m[0];
        } else {
            // Fallback: todo el <body> sin nav, footer, scripts y mobile menu propios
            if (preg_match('/<body[^>]*>([\s\S]*)<\/body>/si', $raw, $m)) {
                $bodyInner = $m[1];

                // Quitamos bloques que ya viven en el layout maestro
                // Nav fijo
                $bodyInner = preg_replace('/<nav\b[^>]*class="[^"]*fixed[^"]*"[\s\S]*?<\/nav>/si', '', $bodyInner);
                // Mobile overlay + drawer
                $bodyInner = preg_replace('/<div[^>]+id=["\']mobileMenu["\'][\s\S]*?<\/div>\s*<div[^>]+id=["\']mobileNav["\'][\s\S]*?<\/div>/si', '', $bodyInner);
                // Footer específico de la página (el layout ya pone el suyo)
                $bodyInner = preg_replace('/<footer[\s\S]*?<\/footer>/si', '', $bodyInner);
                // Scripts inline (ya los metemos en @push)
                $bodyInner = preg_replace('/<script(?!.*src)[^>]*>[\s\S]*?<\/script>/si', '', $bodyInner);
                // Botón scroll-to-top flotante opcional
                $bodyInner = preg_replace('/<button[^>]+id=["\']scrollTopBtn["\'][\s\S]*?<\/button>/si', '', $bodyInner);
                // PWA install container
                $bodyInner = preg_replace('/<div[^>]+id=["\']pwaInstallContainer["\'][\s\S]*?<\/div>/si', '', $bodyInner);

                $content = trim($bodyInner);
            }
        }

        // ── 5. REESCRITURA DE RUTAS ────────────────────────────────────────
        // ../auth/*.html  →  /auth/*
        $content = preg_replace('/href=["\']\.\.\/auth\/(.*?)\.html["\']/', 'href="/auth/$1"', $content);
        // ../ecommerce/*.html  →  /tienda/*
        $content = preg_replace('/href=["\']\.\.\/ecommerce\/(.*?)\.html["\']/', 'href="/tienda/$1"', $content);
        // *.html locales (sin ./ ni ../) → prefijo del módulo
        $prefix = $config['prefix'];
        $content = preg_replace('/href=["\'](?!https?:\/\/)(?!\/)([\w\-]+)\.html["\']/', "href=\"/{$prefix}/$1\"", $content);
        // Nosotros.html → nosotros (case insensitive)
        $content = preg_replace('/href=["\']\/tienda\/[Nn]osotros["\']/', 'href="/tienda/nosotros"', $content);
        // Rutas relativas de imágenes y assets
        $content = str_replace('../../assets', '/frontend/assets', $content);
        $content = str_replace('../assets',    '/frontend/assets', $content);
        // Auth form submit redirect
        $content = str_replace("window.location.href='../erp/inicio.html'", "window.location.href='/dashboard'", $content);
        // Corregir rutas mal formadas tipo /tienda/../auth/
        $content = str_replace('/tienda/../auth/', '/auth/', $content);

        // ── 6. GENERAR BLADE ───────────────────────────────────────────────
        $bladeName = str_replace('.html', '', $filename);
        $blade     = "@extends('{$config['layout']}')\n\n";
        $blade    .= "@section('title', '" . addslashes($title) . "')\n";

        if (!empty($cssLinks)) {
            $blade .= "\n@push('styles')\n    " . implode("\n    ", $cssLinks) . "\n@endpush\n";
        }

        $blade .= "\n@section('content')\n" . $content . "\n@endsection\n";

        if (!empty($jsScripts)) {
            $blade .= "\n@push('scripts')\n    " . implode("\n    ", $jsScripts) . "\n@endpush\n";
        }

        $outDir = $config['out'];
        file_put_contents("$outDir/$bladeName.blade.php", $blade);
        echo "  ✔  $modName/$bladeName.blade.php  (" . round(strlen($blade)/1024, 1) . " KB)\n";
    }
}

echo "\n==============================================\n";
echo "  🏆  MIGRACIÓN E-COMMERCE + AUTH COMPLETADA\n";
echo "==============================================\n";
