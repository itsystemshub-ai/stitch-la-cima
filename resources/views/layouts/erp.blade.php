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
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: { 
                primary: "#ceff5e", 
                secondary: "#1c1c1c", 
                background: "#f8fafc", 
                surface: "#ffffff", 
                outline: "#e2e8f0" 
            },
            fontFamily: { headline: ["League Spartan", "sans-serif"], body: ["Inter", "sans-serif"] },
            boxShadow: {
                'premium': '0 10px 40px -10px rgba(0,0,0,0.05)',
            }
          }
        }
      }
    </script>
    
    <link rel="stylesheet" href="{{ asset('erp/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('erp/css/premium-erp.css') }}">
    @yield('styles')
</head>
<body class="bg-background text-stone-900 min-h-screen flex">

    <!-- Assets de Lógica y UI -->
    <script src="{{ asset('erp/js/zenith-identity.js') }}"></script>
    <script src="{{ asset('erp/js/common.js') }}"></script>
    <script src="{{ asset('erp/js/zenith-layout.js') }}"></script>
    <script src="{{ asset('erp/js/zenith-data.js') }}"></script>

    <!-- El Sidebar y Header se inyectan via zenith-layout.js -->
    
    @yield('content')

    <!-- Overlay para mobile sidebar -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

    @yield('scripts')
</body>
</html>
