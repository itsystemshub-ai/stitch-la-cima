<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Ingreso al sistema - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="MAYOR DE REPUESTO LA CIMA, C.A.">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>Iniciar Sesión | Mayor de Repuesto LA CIMA, C.A.</title>
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
</head>
<body class="bg-surface font-body text-stone-900">

<!-- Top Navigation -->
<nav class="fixed top-0 w-full z-40 bg-white/90 backdrop-blur-md border-b border-outline shadow-sm">
    <div class="flex justify-between items-center px-6 py-3">
        <a href="{{ url('/') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('assets/images/logo.png') }}" alt="MAYOR DE REPUESTO LA CIMA, C.A." class="h-8 md:h-10 w-auto object-contain">
            <div class="flex flex-col">
                <span class="text-xs md:text-sm font-black text-black leading-tight tracking-tighter uppercase whitespace-nowrap">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[8px] md:text-[9px] font-medium text-stone-500 tracking-[0.15em] uppercase leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a class="text-xs uppercase tracking-widest font-bold text-stone-500 hover:text-black transition-colors" href="{{ url('/') }}">Ecommerce</a>
            <a class="text-xs uppercase tracking-widest font-bold text-stone-500 hover:text-black transition-colors" href="{{ url('/tienda/catalogo_general') }}">Catálogo</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ url('/auth/crear_cuenta') }}" class="text-xs font-bold uppercase tracking-widest text-stone-900 hover:underline">Crear Cuenta</a>
        </div>
    </div>
</nav>

<main class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4 bg-background">
    <div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-12 gap-0 overflow-hidden bg-white shadow-2xl rounded-2xl border border-stone-200">
        <!-- Side Panel: Brand Identity -->
        <div class="md:col-span-5 bg-stone-900 p-8 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <img alt="Industrial" class="w-full h-full object-cover grayscale" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTkZtJSSNsIHQErzV1_9XzToxX14snaVh43pqwzxNW6Ysrohl30gc_ET3s2rbj_7xZPTRmQl6vkH5UscwLPkzzpOtsC8WKPHdFedPQRqjs9ltLOdAbPSm9OUkB0jAHwI5AVbjXmmuFCrQBtiUrmD9q5KNpxxK6zXS6ormvjXgxV_NL5LbNwo1zdKtlB8zFOOCA6tzK7QaADLxWIOQccfeV4ZjoVm0mtOIqsFO9_lx9JC9SkXIBSc515ARVcq2IuNoRbZXElNdOh48"/>
            </div>
            <div class="relative z-10">
                <h2 class="font-headline text-3xl font-black text-primary leading-none tracking-tighter uppercase mb-2">
                    MAYOR DE REPUESTO LA CIMA, C.A.
                </h2>
                <div class="w-12 h-1 bg-primary mb-6"></div>
                <p class="font-label text-stone-400 uppercase tracking-widest text-[9px] leading-relaxed">
                    Portal de Gestión Empresarial<br/>
                    Acceso Restringido a Personal<br/>
                    Control de Activos v2.5
                </p>
            </div>
            <div class="relative z-10">
                <div class="p-4 bg-white/5 border-l-4 border-primary rounded-r-lg">
                    <p class="text-[11px] text-stone-300 leading-normal">
                        Inicie sesión para acceder al inventario centralizado, gestión de ventas y reportes fiscales en tiempo real.
                    </p>
                </div>
            </div>
        </div>

        <!-- Form Panel -->
        <div class="md:col-span-7 p-8 md:p-12 bg-white">
            <div class="mb-10 text-center md:text-left">
                <h1 class="font-headline text-4xl font-black text-stone-900 uppercase tracking-tighter mb-2 leading-none">
                    Acceso <span class="text-stone-400 italic font-light">Seguro</span>
                </h1>
                <p class="text-stone-500 font-medium text-sm">Ingrese sus credenciales corporativas</p>
            </div>

            <form class="space-y-6" method="POST" action="{{ url('/auth/login') }}">
                @csrf
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Usuario / Email</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">person</span>
                        <input name="email" class="w-full pl-12 pr-4 py-4 bg-stone-50 border border-stone-100 rounded-xl text-stone-900 placeholder:text-stone-300 text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none @error('email') border-red-500 @enderror" placeholder="nombre.apellido" type="text" value="{{ old('email') }}" required/>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Contraseña</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">lock</span>
                        <input name="password" class="w-full pl-12 pr-4 py-4 bg-stone-50 border border-stone-100 rounded-xl text-stone-900 placeholder:text-stone-300 text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="••••••••" type="password" required/>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input name="remember" type="checkbox" class="w-4 h-4 rounded border-stone-300 text-primary focus:ring-primary">
                        <span class="text-xs text-stone-500 group-hover:text-stone-900 transition-colors">Recordarme</span>
                    </label>
                    <a href="{{ url('/auth/' . 'olvido_contraseña') }}" class="text-xs font-bold text-stone-400 hover:text-stone-900 transition-colors uppercase tracking-tighter">¿Olvidó su clave?</a>
                </div>

                <button class="w-full bg-stone-900 py-5 px-6 text-white font-headline font-black uppercase tracking-[0.2em] text-xs flex items-center justify-center gap-3 hover:bg-black hover:shadow-xl transition-all active:scale-[0.98]" type="submit">
                    ENTRAR AL SISTEMA
                    <span class="material-symbols-outlined text-primary text-sm">login</span>
                </button>
            </form>

            <div class="mt-12 pt-6 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-[9px] font-bold text-stone-300 uppercase tracking-widest">SISTEMA ERP v2.5.0</p>
                <a href="{{ url('/auth/' . 'crear_cuenta') }}" class="text-[10px] font-black text-stone-400 hover:text-stone-900 transition-colors uppercase tracking-widest flex items-center gap-1">
                    Solicitar Cuenta
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</main>

<footer class="bg-black text-white w-full py-12 px-8">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-10 w-auto opacity-80">
            <div class="flex flex-col">
                <span class="text-primary font-black text-xs uppercase tracking-tighter leading-none">MAYOR DE REPUESTO LA CIMA, C.A</span>
                <span class="text-[9px] text-stone-500 uppercase tracking-widest leading-none mt-1">RIF.: J-40308741-5</span>
            </div>
        </div>
        <p class="text-[9px] text-stone-600 uppercase tracking-[0.2em]">© 2026 TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
</footer>

<!-- <script src="{{ asset('js/login.js') }}"></script> -->

</body></html>