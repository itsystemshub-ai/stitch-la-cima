<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Kardex Valorizado - Mayor de Repuesto LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Kardex Valorizado | Mayor de Repuesto LA CIMA, C.A.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/kardex.css">
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
        <a href="{{ url('/erp/kardex') }}" class="text-stone-900 font-bold"><span class="material-symbols-filled text-primary">receipt_long</span> Movimientos (Kardex)</a>
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
        <span class="text-stone-900" id="breadcrumbPage">Kardex Valorizado</span>
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

</header>
<main class="ml-72 pt-14 min-h-screen">
<!-- Top Bar de Identidad (Interno) -->
<header class="w-full bg-stone-900 flex justify-between items-center px-8 h-20 border-b border-lime-600/30">
<div class="flex items-center gap-6">
<div class="flex flex-col">
<h1 class="font-headline uppercase tracking-tight font-black text-2xl text-stone-50 leading-none">Kardex Valorizado</h1>
<span class="text-[10px] text-lime-500 font-bold tracking-[0.2em] uppercase mt-1">Marco Legal: Art. 177 ISLR</span>
</div>
</div>
<div class="flex items-center gap-4">
<div class="flex flex-col text-right">
<span class="text-[10px] text-stone-500 font-bold uppercase">Estado Fiscal</span>
<div class="flex items-center gap-2 justify-end">
<div class="w-2 h-2 rounded-full bg-lime-500 animate-pulse"></div>
<span class="text-xs font-bold text-stone-200 uppercase tracking-widest">Sincronizado</span>
</div>
</div>
</div>
</header>
<div class="p-8 space-y-8">
<!-- Header Identity Section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="md:col-span-2 bg-stone-900 p-8 border-l-4 border-lime-600 relative overflow-hidden">
<div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none">
<span class="material-symbols-outlined text-[120px]">engineering</span>
</div>
<h2 class="text-3xl font-black font-headline text-stone-50 mb-2">MAYOR DE REPUESTO LA CIMA, C.A.</h2>
<p class="text-stone-400 font-body tracking-[0.3em] text-[10px] uppercase mb-6 italic">RIF: J-40308741-5 | DIVISIÓN DE REPUESTOS INDUSTRIALES</p>
<div class="grid grid-cols-2 gap-8 pt-6 border-t border-stone-800">
<div>
<span class="block text-[10px] text-lime-500 font-bold uppercase tracking-tighter mb-1">Product Description</span>
<span class="text-lg font-medium">PISTON KIT - CATERPILLAR C15</span>
</div>
<div>
<span class="block text-[10px] text-lime-500 font-bold uppercase tracking-tighter mb-1">Accounting Method</span>
<span class="text-lg font-medium">COSTO PROMEDIO PONDERADO (CPP)</span>
</div>
</div>
</div>
<div class="bg-stone-900 p-8 flex flex-col justify-between">
<div>
<span class="block text-[10px] text-stone-500 font-bold uppercase tracking-tighter mb-4">Total Inventory Value</span>
<div class="text-4xl font-black text-lime-400 font-['Space_Grotesk']">$ 42,850.25</div>
<div class="mt-2 flex items-center gap-2 text-xs text-stone-400">
<span class="material-symbols-outlined text-sm text-lime-500">trending_up</span>
<span>+4.2% vs previous month</span>
</div>
</div>
<div class="flex gap-2 mt-6">
<button class="flex-1 bg-stone-800 hover:bg-stone-700 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Export PDF</button>
<button class="flex-1 bg-stone-800 hover:bg-stone-700 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Export XML</button>
</div>
</div>
</section>
<!-- Technical Ledger Filter Bar -->
<div class="flex items-center justify-between bg-stone-900 px-6 py-4 border-b border-stone-800">
<div class="flex items-center gap-8">
<div class="flex flex-col">
<label class="text-[9px] uppercase font-bold text-stone-500 mb-1">Fiscal Period</label>
<select class="bg-stone-950 border-none text-xs font-bold text-stone-200 focus:ring-1 ring-lime-600 py-1">
<option>OCTUBRE 2023</option>
<option>NOVIEMBRE 2023</option>
</select>
</div>
<div class="h-8 w-px bg-stone-800"></div>
<div class="flex flex-col">
<label class="text-[9px] uppercase font-bold text-stone-500 mb-1">Transaction Type</label>
<div class="flex gap-2">
<span class="px-2 py-0.5 rounded-sm bg-lime-900/30 text-lime-400 text-[10px] font-bold border border-lime-800/50">Purchases</span>
<span class="px-2 py-0.5 rounded-sm bg-stone-800 text-stone-400 text-[10px] font-bold border border-stone-700">Sales</span>
<span class="px-2 py-0.5 rounded-sm bg-stone-800 text-stone-400 text-[10px] font-bold border border-stone-700">Adjustments</span>
</div>
</div>
</div>
<div class="text-[10px] text-stone-500 font-mono">SYSTEM_VER: 4.8.2-STABLE</div>
</div>
<!-- Kardex Detailed Grid -->
<div class="bg-stone-900 overflow-hidden">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-800/50 text-stone-400">
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest border-r border-stone-800">Date</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest border-r border-stone-800">Reference / ID</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest border-r border-stone-800">Operation Type</th>
<th class="px-6 py-2 text-[10px] font-black uppercase tracking-widest text-center border-b border-stone-800" colspan="3">Unit Movement (Qty)</th>
<th class="px-6 py-2 text-[10px] font-black uppercase tracking-widest text-center border-b border-stone-800" colspan="3">Valuation (CPP)</th>
</tr>
<tr class="bg-stone-900 text-stone-500 border-b border-stone-800">
<th class="border-r border-stone-800" colspan="3"></th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">In</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Out</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Bal</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Unit Cost</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Debit</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase">Total Balance</th>
</tr>
</thead>
<tbody class="font-mono text-xs">
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-01</td>
<td class="px-6 py-4 font-bold text-lime-500">INV-INIT-001</td>
<td class="px-6 py-4 uppercase">Inventario Inicial</td>
<td class="px-4 py-4 text-center bg-stone-800/20">150</td>
<td class="px-4 py-4 text-center">--</td>
<td class="px-4 py-4 text-center font-bold">150</td>
<td class="px-4 py-4 text-right">$ 180.00</td>
<td class="px-4 py-4 text-right text-lime-400 font-bold">$ 27,000.00</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 27,000.00</td>
</tr>
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-05</td>
<td class="px-6 py-4 font-bold text-lime-500">FAC-PUR-8822</td>
<td class="px-6 py-4 uppercase">Compra Nacional</td>
<td class="px-4 py-4 text-center bg-stone-800/20">50</td>
<td class="px-4 py-4 text-center">--</td>
<td class="px-4 py-4 text-center font-bold">200</td>
<td class="px-4 py-4 text-right">$ 195.00</td>
<td class="px-4 py-4 text-right text-lime-400 font-bold">$ 9,750.00</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 36,750.00</td>
</tr>
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-12</td>
<td class="px-6 py-4 font-bold text-lime-500">SAL-009121</td>
<td class="px-6 py-4 uppercase">Venta Contado</td>
<td class="px-4 py-4 text-center bg-stone-800/20">--</td>
<td class="px-4 py-4 text-center text-red-400">30</td>
<td class="px-4 py-4 text-center font-bold">170</td>
<td class="px-4 py-4 text-right">$ 183.75</td>
<td class="px-4 py-4 text-right text-stone-500">$ (5,512.50)</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 31,237.50</td>
</tr>
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-20</td>
<td class="px-6 py-4 font-bold text-lime-500">ADJ-PHYS-02</td>
<td class="px-6 py-4 uppercase text-yellow-500">Ajuste de Auditoría</td>
<td class="px-4 py-4 text-center bg-stone-800/20">5</td>
<td class="px-4 py-4 text-center">--</td>
<td class="px-4 py-4 text-center font-bold">175</td>
<td class="px-4 py-4 text-right">$ 183.75</td>
<td class="px-4 py-4 text-right text-lime-400 font-bold">$ 918.75</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 32,156.25</td>
</tr>
</tbody>
</table>
</div>
<!-- Bottom Asymmetric Meta Section -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="md:col-span-1 bg-stone-900 p-6 flex flex-col justify-between">
<span class="block text-[10px] text-stone-500 font-bold uppercase tracking-tighter mb-4">Current CPP</span>
<div class="text-2xl font-black text-stone-50 font-['Space_Grotesk']">$ 183.75</div>
<div class="mt-4 p-3 bg-stone-950 border border-stone-800 text-[10px] text-stone-400">
                        Calculated based on 175 units on hand.
                    </div>
</div>
<div class="md:col-span-3 grid grid-cols-3 gap-1">
<div class="bg-stone-900/50 p-6">
<span class="block text-[10px] text-stone-500 font-bold uppercase mb-2">Total Entries</span>
<span class="text-xl font-bold">205 Units</span>
</div>
<div class="bg-stone-900/50 p-6">
<span class="block text-[10px] text-stone-500 font-bold uppercase mb-2">Total Exits</span>
<span class="text-xl font-bold">30 Units</span>
</div>
<div class="bg-lime-600 p-6 text-white">
<span class="block text-[10px] font-black uppercase mb-2">Inventory Status</span>
<span class="text-xl font-bold italic uppercase tracking-tighter">Compliant</span>
</div>
</div>
</section>
<!-- Legal Compliance Footer -->
<footer class="flex flex-col md:flex-row justify-between items-start md:items-center py-6 border-t border-stone-800 gap-4">
<div class="flex items-center gap-6">
<div class="flex items-center gap-2">
<div class="w-3 h-3 rounded-full bg-lime-500"></div>
<span class="text-[10px] font-bold uppercase text-stone-400">Fiscal System Active</span>
</div>
<div class="text-[10px] text-stone-600 font-mono">HASH: 9a2f-11eb-9439-0242ac130002</div>
</div>
<div class="flex gap-4">
<button class="text-[10px] font-bold uppercase text-stone-400 hover:text-lime-500 transition-colors">Privacy Policy</button>
<button class="text-[10px] font-bold uppercase text-stone-400 hover:text-lime-500 transition-colors">Audit Log</button>
<button class="text-[10px] font-bold uppercase text-stone-400 hover:text-lime-500 transition-colors">Help Desk</button>
</div>
</footer>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/kardex.js"></script>
</body>
</html>