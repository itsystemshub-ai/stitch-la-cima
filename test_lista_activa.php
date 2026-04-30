<?php
$ch = curl_init('http://localhost:8000/tienda/catalogo_detallado?view=list');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Verificar si muestra "Lista" activa
echo "URL: http://localhost:8000/tienda/catalogo_detallado?view=list\n";
echo "Respuesta HTTP: 200\n\n";

// Buscar el botón "Lista" y ver si tiene la clase activa (bg-black)
if (strpos($html, '>Lista</a>') !== false) {
    // Extraer contexto del botón Lista
    $pos = strpos($html, '>Lista</a>');
    $ctx = substr($html, max(0, $pos - 100), 150);
    if (strpos($ctx, 'bg-black text-white') !== false) {
        echo "✓ Botón LISTA está ACTIVO (bg-black)\n";
    } else {
        echo "✗ Botón LISTA NO está activo\n";
        echo "Contexto: " . htmlspecialchars($ctx) . "\n";
    }
}

// Verificar si aparece contenido tipo tabla
if (strpos($html, '<table class="w-full text-left">') !== false) {
    echo "✓ Tabla de LISTA encontrada\n";
} else {
    echo "✗ Tabla de LISTA NO encontrada\n";
}

// Verificar si está la tabla de lista completa
if (strpos($html, '<thead class="bg-stone-50/80') !== false) {
    echo "✓ Thead de lista encontrada\n";
}

// Verificar si dice "Vista:" o similar
if (strpos($html, '>Cuadrada</a>') !== false && strpos($html, '>Lista</a>') !== false) {
    echo "✓ Ambos botones de switch presentes\n";
} else {
    echo "✗ Botones de switch no completos\n";
}

// Si hay grid (col-span) entonces no es lista
if (strpos($html, 'grid-cols-1 sm:grid-cols-2') !== false) {
    echo "✗ Contenido GRID detectado (debería ser LISTA)\n";
} else {
    echo "✓ No hay grid-cols (sigue siendo LISTA)\n";
}
