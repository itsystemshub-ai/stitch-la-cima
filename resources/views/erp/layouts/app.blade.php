<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Zenith ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="MAYOR DE REPUESTO LA CIMA, C.A. - ERP">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>@yield('title', 'Zenith ERP') | MAYOR DE REPUESTO LA CIMA, C.A. - RIF: J-40308741-5</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<script>
    // Sincronización proactiva de sesión Servidor -> Cliente
    localStorage.setItem('erp_session', 'true');
</script>

<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&amp;family=Inter:wght@300..700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@stack('styles')
</head>
<body class="bg-erp text-stone-900 min-h-screen flex">

<x-smart-navigator />

@include('erp.layouts.sidebar')

@include('erp.layouts.header')

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
    @yield('content')

    <!-- Footer Compartido -->
    <div class="pt-4 mt-8 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <span class="text-[10px] font-bold text-stone-400">RIF: J-40308741-5 • Todos los derechos reservados © 2026</span>
        <div class="flex items-center gap-4">
            <a href="{{ url('/erp/ayuda') }}" class="text-[10px] font-bold text-stone-500 hover:text-stone-900">Centro de Ayuda</a>
            <a href="{{ url('/erp/ayuda/manual') }}" class="text-[10px] font-bold text-stone-500 hover:text-stone-900">Manual Técnico</a>
            <a href="{{ url('/erp/configuracion/estado-sistema') }}" class="text-[10px] font-bold text-stone-500 hover:text-stone-900">Estado del Sistema</a>
        </div>
    </div>
</main>

<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('/service-worker.js')
          .then(registration => {
            console.log('App lista para uso Offline en Caja. Scope:', registration.scope);
          })
          .catch(error => {
            console.log('Fallo integración Offline:', error);
          });
      });
    }
</script>
    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed bottom-6 right-6 z-[200] flex flex-col gap-3 w-80"></div>
    @stack('scripts')
</body>
</html>
