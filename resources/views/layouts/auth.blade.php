<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Ingreso al sistema - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="MAYOR DE REPUESTO LA CIMA, C.A.">
<link rel="manifest" href="/manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>@yield('title', 'Acceso | Mayor de Repuesto LA CIMA, C.A.')</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: "#ceff5e",
          secondary: "#1c1c1c",
          background: "#f6f6f9",
          surface: "#ffffff",
          outline: "#e2e2e5"
        },
        fontFamily: {
          headline: ["League Spartan", "sans-serif"],
          body: ["Inter", "sans-serif"]
        }
      }
    }
  }
</script>
@stack('styles')
</head>
<body class="bg-surface font-body text-stone-900">

<!-- Top Navigation -->
<nav class="fixed top-0 w-full z-40 bg-white/90 backdrop-blur-md border-b border-outline shadow-sm">
    <div class="flex justify-between items-center px-6 py-3">
        <a href="/tienda/index" class="flex items-center gap-2 group">
            <img src="{{ asset('assets/images/logo.png') }}" alt="LA CIMA" class="h-8 md:h-10 w-auto object-contain">
            <div class="flex flex-col">
                <span class="text-xs md:text-sm font-black text-black leading-tight tracking-tighter uppercase whitespace-nowrap">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[8px] md:text-[9px] font-medium text-stone-500 tracking-[0.15em] uppercase leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a class="text-xs uppercase tracking-widest font-bold text-stone-500 hover:text-black transition-colors" href="/tienda/index">Ecommerce</a>
            <a class="text-xs uppercase tracking-widest font-bold text-stone-500 hover:text-black transition-colors" href="/tienda/catalogo_general">Catálogo</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="/auth/crear_cuenta" class="text-xs font-bold uppercase tracking-widest text-stone-900 hover:underline">Crear Cuenta</a>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-black text-white w-full py-12 px-8 mt-auto">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-10 w-auto opacity-80">
            <div class="flex flex-col">
                <span class="text-primary font-black text-xs uppercase tracking-tighter leading-none">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[9px] text-stone-500 uppercase tracking-widest leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </div>
        <p class="text-[9px] text-stone-600 uppercase tracking-[0.2em]">&copy; 2026 TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
</footer>

@stack('scripts')
</body></html>
