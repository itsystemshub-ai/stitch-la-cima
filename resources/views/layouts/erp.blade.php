<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="@yield('description', 'Dashboard ERP - MAYOR DE REPUESTO LA CIMA, C.A.')"/>
    <meta name="theme-color" content="#ceff5e">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Mayor de Repuesto La Cima, C.A.">
    
    <title>@yield('title', 'ERP') | Mayor de Repuesto La Cima, C.A.</title>
    
    <!-- Core Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    @yield('styles')
</head>
<body class="bg-erp text-stone-900 min-h-screen flex">
    <x-smart-navigator />

    <!-- Assets de Lógica y UI -->
    <script src="{{ asset('erp/js/zenith-identity.js') }}"></script>
    <script src="{{ asset('erp/js/common.js') }}"></script>
    <script src="{{ asset('erp/js/zenith-layout.js') }}"></script>
    <script src="{{ asset('erp/js/zenith-data.js') }}"></script>

    <!-- El Sidebar y Header se inyectan via zenith-layout.js -->
    
    @yield('content')

    <!-- Overlay para mobile sidebar -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed bottom-6 right-6 z-[200] flex flex-col gap-3 w-80"></div>

    @yield('scripts')
</body>
</html>
