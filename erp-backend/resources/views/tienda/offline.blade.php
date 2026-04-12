<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sin Conexión | LA CIMA</title>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/offline.css">
</head>
<body>
    <div class="offline-container">
        <span class="material-symbols-outlined icon">cloud_off</span>
        <h1>Sin Conexión</h1>
        <p>Parece que no tienes conexión a internet. Verifica tu conexión e intenta nuevamente.</p>
        <button class="retry-btn" onclick="window.location.reload()">
            <span class="material-symbols-outlined" style="vertical-align: middle; margin-right: 8px; font-size: 20px;">refresh</span>
            Reintentar
        </button>
        <a href="{{ url('/tienda/' . 'index') }}" style="display: inline-block; margin-top: 24px; color: #ceff5e; text-decoration: none; font-size: 14px; font-weight: 700;">
            ← Volver al inicio
        </a>
    </div>
</body>
</html>
