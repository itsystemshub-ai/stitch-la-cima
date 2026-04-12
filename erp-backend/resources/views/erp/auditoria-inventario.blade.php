<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Auditoría de Inventario | Mayor de Repuesto LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Auditoría de Almacén | Portal ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/auditoria-inventario.css">
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: { primary: "#ceff5e", secondary: "#1c1c1c", background: "#f6f6f9", surface: "#ffffff", outline: "#e2e2e5" },
        fontFamily: { headline: ["League Spartan", "sans-serif"], body: ["Inter", "sans-serif"] }
      }
    }
  }
</script>

</head>
<body class="bg-background text-stone-900 min-h-screen flex">

<!-- ========== SIDEBAR ========== -->
<aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
  <div class="flex flex-col px-5 pt-6 pb-4">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 bg-stone-900 flex items-center justify-center rounded-lg">
        <img src="{{ asset('assets/images/logo.png') }}" class="w-7 h-7 object-contain" alt="Logo">
      </div>
      <div>
        <h2 class="font-headline font-bold text-sm text-stone-900 leading-none uppercase">LA CIMA, C.A.</h2>
        <span class="text-[10px] font-mono text-stone-400">RIF: J-40308741-5</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Portal ERP Corporativo</p>
  </div>

  <div class="px-4 mb-4">
    <div class="relative">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400"><span class="material-symbols-outlined text-lg">search</span></span>
      <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar..." type="text"/>
    </div>
  </div>

  <nav class="flex-1 px-3 overflow-y-auto no-scrollbar space-y-0.5 pb-20">
    <div class="menu-group">Principal</div>
    <a class="menu-item menu-item-inactive" href="{{ url('/') }}">
      <span class="material-symbols-outlined text-[20px]">storefront</span><span>Tienda Virtual</span>
    </a>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/inicio') }}">
      <span class="material-symbols-outlined text-[20px]">dashboard</span><span>Dashboard Central</span>
    </a>

    <div class="menu-group">Gestión de Inventario</div>
    <div class="menu-parent open">
      <div class="menu-item menu-item-active" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span><span>Almacén Central</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu block static bg-transparent border-none shadow-none opacity-100 visible transform-none p-0 pl-10 pointer-events-auto">
        <a href="{{ url('/erp/inventario') }}"><span class="material-symbols-outlined">analytics</span> Resumen</a>
        <a href="{{ url('/erp/productos') }}"><span class="material-symbols-outlined">category</span> Catálogo Stock</a>
        <a href="{{ url('/erp/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Movimientos (Kardex)</a>
        <a href="{{ url('/erp/auditoria-inventario') }}" class="text-stone-900 font-bold"><span class="material-symbols-filled text-primary">assignment</span> Auditoría F?sica</a>
        <a href="{{ url('/erp/ajustes-inventario') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
      </div>
    </div>

    <div class="menu-group">Operaciones</div>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/ventas') }}">
      <span class="material-symbols-outlined text-[20px]">payments</span><span>Ventas y POS</span>
    </a>
  </nav>

  <div class="mt-auto border-t border-stone-200 p-4 bg-stone-50">
    <a href="{{ url('/auth/login') }}" class="w-full bg-red-50 text-red-600 font-bold py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-[10px] uppercase tracking-widest">
      <span class="material-symbols-outlined text-[16px]">logout</span>
      Salir del ERP
    </a>
  </div>
</aside>

<!-- ========== TOP BAR ========== -->
<header class="fixed top-0 left-72 right-0 bg-white/80 backdrop-blur-xl z-40 border-b border-stone-200">
  <div class="flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-4">
      <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <div class="hidden md:flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-stone-500">
        <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-stone-900" id="breadcrumbPage">Auditoría Física</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <div class="text-right hidden md:block">
          <p class="text-[11px] font-black text-stone-900 leading-none uppercase">Administrador</p>
          <p class="text-[9px] font-bold text-primary uppercase tracking-tighter bg-stone-900 px-1 inline-block mt-1">Control Total</p>
        </div>
        <div class="w-9 h-9 bg-stone-900 rounded-lg flex items-center justify-center text-primary font-black text-sm">LC</div>
      </div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-72 pt-14 min-h-screen relative overflow-hidden">
<!-- TopNavBar Rebranded -->
<header class="w-full bg-stone-900 flex justify-between items-center px-8 h-20 border-b border-primary/30">
<div class="flex items-center gap-6">
<div class="flex flex-col">
<h1 class="font-headline uppercase tracking-tight font-black text-2xl text-stone-50 leading-none">Auditoría de Almacén</h1>
<span class="text-[10px] text-primary font-bold tracking-[0.2em] uppercase mt-1">Conteo Ciego y Conciliación Fiscal</span>
</div>
</div>
<div class="flex items-center gap-4">
<div class="flex flex-col text-right">
<span class="text-[10px] text-stone-500 font-bold uppercase">Estado de Sesión</span>
<div class="flex items-center gap-2 justify-end">
<div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
<span class="text-xs font-bold text-stone-200 uppercase tracking-widest">En Proceso</span>
</div>
</div>
</div>
</header>
<!-- Content Body -->
<div class="pt-24 px-8 pb-12">
<!-- Breadcrumbs / Context -->
<div class="mb-8 flex justify-between items-end">
<div>
<div class="flex items-center gap-2 text-label-md text-secondary mb-2 uppercase tracking-widest font-bold font-body">
<span>MAYOR DE REPUESTO LA CIMA, C.A.</span>
<span class="material-symbols-outlined text-xs">chevron_right</span>
<span>GESTIÓN DE INVENTARIO</span>
</div>
<h2 class="text-4xl font-black uppercase tracking-tighter text-on-surface leading-none font-headline">TOMA FÍSICA<br/><span class="text-stone-900 bg-primary px-2">CONTEO CIEGO</span></h2>
</div>
<div class="flex gap-3">
<button class="bg-surface-container-high px-6 py-3 font-bold uppercase text-xs tracking-widest flex items-center gap-2 hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-sm">download</span> EXPORTAR PDF
                    </button>
<button class="bg-primary text-on-primary px-8 py-3 font-bold uppercase text-xs tracking-widest flex items-center gap-2 shadow-xl hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-sm">sync_alt</span> SINCRONIZAR Y AJUSTAR
                    </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6">
<!-- Selection Panel -->
<div class="col-span-12 lg:col-span-4 space-y-6">
<!-- Location Selector -->
<div class="bg-surface-container-lowest p-6 shadow-sm border-l-4 border-primary">
<h3 class="text-sm font-black uppercase tracking-widest mb-4">Parámetros de Auditoría</h3>
<div class="space-y-4">
<div>
<label class="block text-[10px] font-bold text-secondary uppercase tracking-widest mb-1">Seleccionar Pasillo</label>
<select class="w-full bg-surface-container-low border-none focus:ring-2 focus:ring-primary py-3 text-sm font-semibold">
<option>PASILLO A - MOTOR Y TRANSMISIÓN</option>
<option>PASILLO B - SUSPENSIÓN Y FRENOS</option>
<option>PASILLO C - ELÉCTRICO Y LUCES</option>
<option>PASILLO D - ACCESORIOS Y CARROCERÍA</option>
</select>
</div>
<div>
<label class="block text-[10px] font-bold text-secondary uppercase tracking-widest mb-1">Categoría Crítica</label>
<select class="w-full bg-surface-container-low border-none focus:ring-2 focus:ring-primary py-3 text-sm font-semibold">
<option>TODAS LAS CATEGORÍAS</option>
<option>REPUESTOS DE ALTA ROTACIÓN</option>
<option>VALOR ALTO (PREMIUM)</option>
</select>
</div>
<button class="w-full border-2 border-primary text-primary font-black py-3 uppercase tracking-tighter hover:bg-primary hover:text-on-primary transition-all">
                                INICIAR AUDITORÍA DE ZONA
                            </button>
</div>
</div>
<!-- Stats Card -->
<div class="bg-on-background text-white p-6 relative overflow-hidden group">
<div class="relative z-10">
<h3 class="text-xs font-bold text-primary-container tracking-[0.2em] uppercase mb-6">Resumen de Sesión</h3>
<div class="flex justify-between items-end mb-4">
<span class="text-4xl font-black">42/120</span>
<span class="text-[10px] font-bold text-stone-400">ITEMS CONTADOS</span>
</div>
<div class="w-full bg-stone-800 h-1 mb-6">
<div class="bg-primary-container h-full w-[35%]"></div>
</div>
<div class="flex items-center gap-4">
<div class="bg-stone-800 flex-1 p-3">
<p class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Discrepancias</p>
<p class="text-xl font-black text-error">12%</p>
</div>
<div class="bg-stone-800 flex-1 p-3">
<p class="text-[9px] text-stone-400 uppercase font-bold tracking-widest">Valor Neto Diff</p>
<p class="text-xl font-black">-$420.00</p>
</div>
</div>
</div>
<div class="absolute -right-4 -bottom-4 opacity-10 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-9xl">analytics</span>
</div>
</div>
</div>
<!-- Main Entry Panel -->
<div class="col-span-12 lg:col-span-8 bg-surface-container-lowest p-8">
<div class="flex justify-between items-center mb-6">
<h3 class="text-xl font-black uppercase tracking-tighter">Entrada de Conteo Ciego</h3>
<div class="flex items-center gap-2 bg-error-container text-on-error-container px-3 py-1 text-[10px] font-bold uppercase tracking-widest">
<span class="material-symbols-outlined text-xs">warning</span>
                            Alerta: 3 diferencias críticas detectadas
                        </div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low">
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary">ID Repuesto</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary">Descripción</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary text-center">Teórico</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary w-32">Conteo Físico</th>
<th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-secondary text-right">Diferencia</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1 (Critical Discrepancy) -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">KIT-3422-MX</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-12</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Bomba de Agua Toyota Hilux 2.5</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">24 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-error font-black text-center py-2 text-error" type="number" value="18"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-error font-black">-6</span>
<span class="material-symbols-outlined text-xs text-error ml-1 align-middle">error</span>
</td>
</tr>
<!-- Row 2 (Balanced) -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">FILT-900-OIL</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-04</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Filtro Aceite Premium Genérico</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">150 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary font-black text-center py-2 text-primary" type="number" value="150"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-primary font-black">0</span>
<span class="material-symbols-outlined text-xs text-primary ml-1 align-middle">check_circle</span>
</td>
</tr>
<!-- Row 3 (Excess Discrepancy) -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">FR-8821-PAD</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-09</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Pastillas de Freno Delanteras Ford Explorer</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">42 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary font-black text-center py-2 text-primary" type="number" value="44"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-primary font-black">+2</span>
<span class="material-symbols-outlined text-xs text-primary ml-1 align-middle">trending_up</span>
</td>
</tr>
<!-- Row 4 -->
<tr class="group hover:bg-surface-container-low transition-colors">
<td class="py-5 px-4">
<div class="text-xs font-bold font-mono">RAD-400-ALU</div>
<div class="text-[9px] text-secondary uppercase tracking-tight">Estante A-15</div>
</td>
<td class="py-5 px-4 font-bold text-sm uppercase">Radiador Aluminio Chevrolet Silverado 2018</td>
<td class="py-5 px-4 text-center">
<span class="bg-surface-container px-2 py-1 text-xs font-bold text-secondary">8 UND</span>
</td>
<td class="py-5 px-4">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary font-black text-center py-2" placeholder="--" type="number"/>
</td>
<td class="py-5 px-4 text-right">
<span class="text-stone-400 font-bold italic">Pendiente</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Secondary Panel (Visual Guides & History) -->
<div class="col-span-12 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container p-6 relative">
<div class="flex items-start gap-4">
<div class="p-3 bg-white shadow-sm">
<span class="material-symbols-outlined text-primary text-3xl">qr_code_scanner</span>
</div>
<div>
<h4 class="font-black uppercase tracking-tight text-sm mb-1">Escanear Manual</h4>
<p class="text-[10px] text-secondary leading-relaxed font-medium">Use un escáner industrial para entradas masivas de conteo ciego sin ver teóricos.</p>
</div>
</div>
</div>
<div class="bg-surface-container p-6 relative">
<div class="flex items-start gap-4">
<div class="p-3 bg-white shadow-sm">
<span class="material-symbols-outlined text-error text-3xl">verified_user</span>
</div>
<div>
<h4 class="font-black uppercase tracking-tight text-sm mb-1">Aprobación de Supervisor</h4>
<p class="text-[10px] text-secondary leading-relaxed font-medium">Las discrepancias mayores al 5% o $200 requieren token de seguridad.</p>
</div>
</div>
</div>
<div class="bg-primary/5 p-6 relative border-2 border-dashed border-primary/20">
<div class="flex items-start gap-4">
<div class="p-3 bg-primary text-on-primary shadow-sm">
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">history</span>
</div>
<div>
<h4 class="font-black uppercase tracking-tight text-sm mb-1">Historial de Ajustes</h4>
<p class="text-[10px] text-secondary leading-relaxed font-medium">Ver auditorías pasadas del Pasillo A para detectar patrones de merma.</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- FAB - Only on relevant task screen (Action: Sync) -->
<button class="fixed bottom-10 right-10 w-16 h-16 bg-on-background text-white shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
<span class="material-symbols-outlined text-3xl text-primary-container" style="font-variation-settings: 'FILL' 1;">save</span>
</button>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/auditoria-inventario.js"></script>
</body>
</html>