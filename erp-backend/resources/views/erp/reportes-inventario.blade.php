<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Centro de Reportes de Inventario | Mayor de Repuesto LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Reportes de Almacén | Portal ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/reportes-inventario.css">
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
        <a href="{{ url('/erp/auditoria-inventario') }}"><span class="material-symbols-outlined">assignment</span> Auditoría F?sica</a>
        <a href="{{ url('/erp/ajustes-inventario') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
        <a href="{{ url('/erp/reportes-inventario') }}" class="text-stone-900 font-bold"><span class="material-symbols-filled text-primary">analytics</span> Reportes Estadísticos</a>
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
        <span class="text-stone-900" id="breadcrumbPage">Reportes y Auditoría</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <div class="text-right hidden md:block">
          <p class="text-[11px] font-black text-stone-900 leading-none uppercase">Analista de Inventario</p>
          <p class="text-[9px] font-bold text-primary uppercase tracking-tighter bg-stone-900 px-1 inline-block mt-1">Nivel: Supervisor</p>
        </div>
        <div class="w-9 h-9 bg-stone-900 rounded-lg flex items-center justify-center text-primary font-black text-sm">LC</div>
      </div>
    </div>
  </div>
</header>

<main class="ml-72 pt-14 min-h-screen relative overflow-hidden p-6 lg:p-10 space-y-8">
<!-- Header & Actions -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h2 class="text-4xl font-headline font-black tracking-tight uppercase mb-2">Centro de Reportes</h2>
<p class="text-secondary font-medium max-w-2xl font-body">Cumplimiento Art. 177: Valuación detallada mediante Costo Promedio Ponderado. Auditoría de stock en tiempo real y análisis de rotación cinética.</p>
</div>
<div class="flex items-center gap-3">
<button class="flex items-center gap-2 px-4 py-2.5 bg-stone-900 text-primary font-bold text-[11px] tracking-widest uppercase hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                        Exportar PDF
                    </button>
<button class="flex items-center gap-2 px-4 py-2.5 bg-primary text-stone-900 font-bold text-[11px] tracking-widest uppercase hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-sm">table_view</span>
                        Exportar Excel
                    </button>
</div>
</div>
<!-- Bento Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="md:col-span-2 bg-stone-900 text-white p-8 relative overflow-hidden flex flex-col justify-between min-h-[220px]">
<div class="relative z-10">
<div class="text-[10px] font-black uppercase tracking-[0.2em] mb-1 text-primary opacity-80 font-body">Valuación Total de Inventario</div>
<div class="text-5xl font-black tracking-tighter text-white font-headline">$4.892.450,00</div>
</div>
<div class="relative z-10 flex items-center gap-4 text-stone-400">
<div class="flex items-center gap-1 font-bold text-xs">
<span class="material-symbols-outlined text-sm text-primary" style="font-variation-settings: 'FILL' 1;">trending_up</span>
                            +12.4% vs Último Cuatrimestre
                        </div>
<div class="text-[10px] font-bold uppercase tracking-widest">Lógica de Promedio Ponderado Aplicada</div>
</div>
<div class="absolute -right-10 -bottom-10 opacity-10">
<span class="material-symbols-outlined text-[200px]" style="font-variation-settings: 'wght' 700;">calculate</span>
</div>
</div>
<div class="bg-white border border-stone-200 p-6 flex flex-col justify-between">
<div>
<div class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] mb-4 font-body">Alertas Stock Crítico</div>
<div class="text-4xl font-headline font-black text-red-600">18</div>
</div>
<div class="text-[9px] font-bold text-red-600 bg-red-50 py-1 px-2 w-fit uppercase tracking-widest">Requiere Reposición</div>
</div>
<div class="bg-white border border-stone-200 p-6 flex flex-col justify-between">
<div>
<div class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] mb-4 font-body">Índice de Rotación</div>
<div class="text-4xl font-headline font-black text-stone-900">4.2x</div>
</div>
<div class="text-[9px] font-bold text-primary bg-stone-900 py-1 px-2 w-fit uppercase tracking-widest">Eficiencia Óptima</div>
</div>
</div>
<!-- Kinetic Turnover Chart & Critical Items -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<div class="lg:col-span-2 bg-surface-container-low p-8 rounded-lg relative">
<div class="flex items-center justify-between mb-8">
<h3 class="text-xl font-bold uppercase tracking-tight">Stock Turnover Kinetic Analysis</h3>
<div class="flex items-center gap-2">
<span class="w-3 h-3 bg-primary"></span>
<span class="text-[10px] font-black uppercase tracking-widest">Volume Flux</span>
</div>
</div>
<!-- Placeholder for Chart.js Visual -->
<div class="h-[300px] flex items-end gap-3 px-4 border-b border-outline-variant/30">
<div class="flex-1 bg-stone-300 h-[40%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[60%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[45%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-primary h-[85%] transition-all"></div>
<div class="flex-1 bg-stone-300 h-[70%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[50%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[90%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[55%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[40%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-stone-300 h-[65%] transition-all hover:bg-primary"></div>
<div class="flex-1 bg-primary-container h-[95%] transition-all"></div>
<div class="flex-1 bg-stone-300 h-[60%] transition-all hover:bg-primary"></div>
</div>
<div class="flex justify-between mt-4 text-[10px] font-bold text-stone-500 tracking-widest uppercase">
<span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
</div>
</div>
<div class="bg-inverse-surface text-inverse-on-surface p-8">
<div class="flex items-center justify-between mb-6">
<h3 class="text-lg font-bold uppercase tracking-tight">Priority Reorder</h3>
<span class="material-symbols-outlined text-primary-fixed">warning</span>
</div>
<div class="space-y-6">
<div class="border-l-2 border-primary-fixed pl-4">
<div class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-1">SKU: TRB-902-X</div>
<div class="text-sm font-bold uppercase mb-1">High-Pressure Turbine Seal</div>
<div class="flex justify-between items-center">
<span class="text-xs">Stock: 2 units</span>
<span class="text-xs text-primary-fixed font-bold">Min: 15 units</span>
</div>
</div>
<div class="border-l-2 border-primary-fixed pl-4">
<div class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-1">SKU: GRX-44-LUB</div>
<div class="text-sm font-bold uppercase mb-1">Synthetic Gear Lubricant (50L)</div>
<div class="flex justify-between items-center">
<span class="text-xs">Stock: 5 units</span>
<span class="text-xs text-primary-fixed font-bold">Min: 40 units</span>
</div>
</div>
<div class="border-l-2 border-stone-600 pl-4">
<div class="text-[10px] font-black uppercase tracking-widest opacity-50 mb-1">SKU: CRV-11-FLT</div>
<div class="text-sm font-bold uppercase mb-1">Ind. Grade Carbon Filter</div>
<div class="flex justify-between items-center">
<span class="text-xs">Stock: 12 units</span>
<span class="text-xs text-primary-fixed font-bold">Min: 25 units</span>
</div>
</div>
</div>
<button class="w-full mt-8 py-3 bg-primary-fixed text-on-primary-fixed font-black text-[10px] tracking-widest uppercase">Generate Bulk Order</button>
</div>
</div>
<!-- Kardex & Valuation Table -->
<div class="bg-surface-container-low overflow-hidden">
<div class="p-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h3 class="text-xl font-bold uppercase tracking-tight">Kardex Central Registry</h3>
<p class="text-xs font-medium text-secondary">History of movements and Weighted Average Cost valuation (Art. 177)</p>
</div>
<div class="flex items-center gap-2">
<select class="bg-surface border-none text-[10px] font-bold tracking-widest py-2 px-4 focus:ring-1 focus:ring-primary">
<option>ALL PRODUCT CATEGORIES</option>
<option>RAW MATERIALS</option>
<option>FINISHED GOODS</option>
</select>
<select class="bg-surface border-none text-[10px] font-bold tracking-widest py-2 px-4 focus:ring-1 focus:ring-primary">
<option>LAST 30 DAYS</option>
<option>CURRENT FISCAL YEAR</option>
</select>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-200/50 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
<th class="px-8 py-4">Transaction Date</th>
<th class="px-8 py-4">Item Identification</th>
<th class="px-8 py-4">Type</th>
<th class="px-8 py-4 text-right">Qty Change</th>
<th class="px-8 py-4 text-right">Unit Cost (Avg)</th>
<th class="px-8 py-4 text-right">Total Valuation</th>
<th class="px-8 py-4">Ref. Doc</th>
</tr>
</thead>
<tbody class="text-xs font-semibold divide-y divide-stone-200/30">
<tr class="bg-surface hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-24 09:12</td>
<td class="px-8 py-4">
<div class="font-bold">HEAVY-DUTY PISTON ARM</div>
<div class="text-[9px] text-secondary">SKU: HDPA-1002</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-xs">arrow_downward</span>
                                        PURCHASE
                                    </span>
</td>
<td class="px-8 py-4 text-right">+450</td>
<td class="px-8 py-4 text-right">$1,240.00</td>
<td class="px-8 py-4 text-right font-bold">$558,000.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">PO-88210-FG</td>
</tr>
<tr class="bg-surface-container-low hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-24 11:45</td>
<td class="px-8 py-4">
<div class="font-bold">TITANIUM VALVE ASSEMBLY</div>
<div class="text-[9px] text-secondary">SKU: TVA-009-S</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-orange-600">
<span class="material-symbols-outlined text-xs">arrow_upward</span>
                                        SALE
                                    </span>
</td>
<td class="px-8 py-4 text-right">-120</td>
<td class="px-8 py-4 text-right">$2,890.50</td>
<td class="px-8 py-4 text-right font-bold">$346,860.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">INV-441092</td>
</tr>
<tr class="bg-surface hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-23 15:20</td>
<td class="px-8 py-4">
<div class="font-bold">HYDRAULIC PUMP FLUID (L)</div>
<div class="text-[9px] text-secondary">SKU: HPF-99-B</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-primary">
<span class="material-symbols-outlined text-xs">arrow_downward</span>
                                        PURCHASE
                                    </span>
</td>
<td class="px-8 py-4 text-right">+2,000</td>
<td class="px-8 py-4 text-right">$45.12</td>
<td class="px-8 py-4 text-right font-bold">$90,240.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">PO-88195-FG</td>
</tr>
<tr class="bg-surface-container-low hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-23 16:05</td>
<td class="px-8 py-4">
<div class="font-bold">HEAVY-DUTY PISTON ARM</div>
<div class="text-[9px] text-secondary">SKU: HDPA-1002</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-error">
<span class="material-symbols-outlined text-xs">error</span>
                                        ADJUSTMENT
                                    </span>
</td>
<td class="px-8 py-4 text-right">-5</td>
<td class="px-8 py-4 text-right">$1,240.00</td>
<td class="px-8 py-4 text-right font-bold">$6,200.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">AUDIT-X9</td>
</tr>
<tr class="bg-surface hover:bg-stone-100 transition-colors">
<td class="px-8 py-4">2023-11-22 08:30</td>
<td class="px-8 py-4">
<div class="font-bold">GRAPHITE GASKET PACK</div>
<div class="text-[9px] text-secondary">SKU: GGP-223</div>
</td>
<td class="px-8 py-4">
<span class="inline-flex items-center gap-1 text-orange-600">
<span class="material-symbols-outlined text-xs">arrow_upward</span>
                                        SALE
                                    </span>
</td>
<td class="px-8 py-4 text-right">-500</td>
<td class="px-8 py-4 text-right">$12.50</td>
<td class="px-8 py-4 text-right font-bold">$6,250.00</td>
<td class="px-8 py-4 font-mono text-[10px] opacity-60">INV-441050</td>
</tr>
</tbody>
</table>
</div>
<div class="p-6 bg-stone-200/30 flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
<div class="flex gap-4">
<button class="hover:text-primary transition-colors">First</button>
<button class="hover:text-primary transition-colors">Prev</button>
</div>
<div class="flex items-center gap-2">
<span class="w-6 h-6 bg-primary text-on-primary flex items-center justify-center">1</span>
<span class="w-6 h-6 hover:bg-stone-300 flex items-center justify-center cursor-pointer">2</span>
<span class="w-6 h-6 hover:bg-stone-300 flex items-center justify-center cursor-pointer">3</span>
<span>...</span>
<span class="w-6 h-6 hover:bg-stone-300 flex items-center justify-center cursor-pointer">42</span>
</div>
<div class="flex gap-4">
<button class="hover:text-primary transition-colors">Next</button>
<button class="hover:text-primary transition-colors">Last</button>
</div>
</div>
</div>
<!-- Technical Disclosure Section -->
<div class="bg-surface-container-high p-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
<div>
<h4 class="text-sm font-black uppercase tracking-[0.2em] mb-4">Regulatory Compliance Detail</h4>
<p class="text-xs text-secondary leading-relaxed mb-4">
                        All valuations presented in this report are calculated in strict adherence to <strong>Art. 177 - Weighted Average Cost (Costo Promedio Ponderado)</strong>. This method ensures that the cost of each item is determined from the weighted average of the cost of similar items at the beginning of a period and the cost of similar items purchased or produced during the period.
                    </p>
<p class="text-xs text-secondary leading-relaxed">
                        Audit trail is maintained for every transaction. Adjustments for physical inventory counts are logged separately and require supervisor validation.
                    </p>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Last Audit Date</div>
<div class="text-sm font-bold uppercase">Oct 30, 2023</div>
</div>
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Accuracy Index</div>
<div class="text-sm font-bold uppercase">99.82%</div>
</div>
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Fiscal Status</div>
<div class="text-sm font-bold uppercase text-lime-600">Compliant</div>
</div>
<div class="bg-surface p-4 border-l-4 border-primary">
<div class="text-[9px] font-black uppercase opacity-50 mb-1">Asset Turnover</div>
<div class="text-sm font-bold uppercase">Optimized</div>
</div>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/reportes-inventario.js"></script>
</body>
</html>