<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Inventario | Mayor de Repuesto LA CIMA, C.A. - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Catálogo Stock | Mayor de Repuesto LA CIMA, C.A.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/productos.css">
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
        <a href="{{ url('/erp/productos') }}" class="text-stone-900 font-bold"><span class="material-symbols-filled text-primary">category</span> Catálogo Stock</a>
        <a href="{{ url('/erp/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Movimientos (Kardex)</a>
        <a href="{{ url('/erp/ajustes-inventario') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
      </div>
    </div>

    <div class="menu-group">Operaciones</div>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/ventas') }}">
      <span class="material-symbols-outlined text-[20px]">payments</span><span>Ventas y POS</span>
    </a>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/compras') }}">
      <span class="material-symbols-outlined text-[20px]">shopping_cart</span><span>Compras</span>
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
        <span class="text-stone-900" id="breadcrumbPage">Catálogo de Stock</span>
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
<main class="p-10 flex-1">
        <!-- Page Title -->
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-6xl font-black text-white uppercase tracking-tighter mb-4 leading-none">Inventory Management</h2>
                <div class="flex items-center gap-6">
                    <div class="h-2 w-24 bg-primary"></div>
                    <span class="text-on-surface-variant text-xs font-black uppercase tracking-[0.4em]">Global Stock Control v4.2</span>
                </div>
            </div>
            <button class="bg-white text-black px-10 py-5 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-4 hover:bg-primary transition-all shadow-xl">
                <span class="material-symbols-outlined font-black">add</span>
                New Product Entry
            </button>
        </div>

        <!-- Metric Bento -->
        <div class="grid grid-cols-4 gap-6 mb-10">
            <div class="bg-surface border border-outline p-8 group hover:bg-black transition-all">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Category Filter</p>
                <select class="bg-transparent border-none text-white text-2xl font-black p-0 focus:ring-0 uppercase tracking-tighter w-full cursor-pointer">
                    <option class="bg-surface">ALL MOTOR PARTS</option>
                    <option class="bg-surface">CYLINDER HEADS</option>
                    <option class="bg-surface">PISTON KITS</option>
                    <option class="bg-surface">CRANKSHAFTS</option>
                </select>
            </div>
            <div class="bg-surface border border-outline p-8 group hover:bg-black transition-all">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Brand Line</p>
                <select class="bg-transparent border-none text-white text-2xl font-black p-0 focus:ring-0 uppercase tracking-tighter w-full cursor-pointer">
                    <option class="bg-surface">ANY BRAND</option>
                    <option class="bg-surface">CUMMINS HEAVY</option>
                    <option class="bg-surface">CATERPILLAR GEN</option>
                    <option class="bg-surface">PERKINS IND</option>
                </select>
            </div>
            <div class="bg-surface border border-outline p-8">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Stock Health</p>
                <div class="flex items-center gap-4">
                    <div class="w-3 h-3 rounded-full bg-[#FFB300] animate-pulse"></div>
                    <span class="text-white text-2xl font-black tracking-tighter uppercase">LOW STOCK (4)</span>
                </div>
            </div>
            <div class="bg-black border border-primary/20 p-8 flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 10px 10px;"></div>
                <div class="text-center z-10">
                    <p class="text-[42px] font-black text-primary leading-none tracking-tighter">1,402</p>
                    <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mt-3">Total SKU Count</p>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="bg-surface border border-outline overflow-hidden rounded-sm shadow-2xl">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-black">
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">SKU Code</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Component Name</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Category</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline">Stock Status</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Cost (USD)</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Price + IVA</th>
                            <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline">
                        <!-- Product Row 1 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#CP-8842-12</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Cylinder Head Gasket</p>
                                <p class="text-xs text-on-surface-variant font-bold uppercase tracking-widest mt-1">Cummins ISX Series</p>
                            </td>
                            <td class="p-6">
                                <span class="bg-white/5 border border-white/10 text-on-surface-variant text-xs font-black px-3 py-1 uppercase tracking-widest">Engine Seals</span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-[85%] shadow-[0_0_10px_#ceff5e]"></div>
                                    </div>
                                    <span class="text-[11px] font-black text-white tracking-widest">42 <span class="text-on-surface-variant font-bold text-[9px]">/ 50</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$124.50</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$144.42</td>
                            <td class="p-6">
                                <div class="flex justify-center gap-3">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-all"><span class="material-symbols-outlined text-lg">edit</span></button>
                                    <button class="p-2 text-on-surface-variant hover:text-white transition-all"><span class="material-symbols-outlined text-lg">archive</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Product Row 2 (Critical) -->
                        <tr class="bg-red-500/5 hover:bg-red-500/10 transition-colors border-l-4 border-red-500">
                            <td class="p-6 text-sm font-black text-red-500 tracking-widest">#PK-1102-X</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Main Bearing Set</p>
                                <p class="text-[9px] text-red-500/60 font-medium uppercase tracking-widest mt-1">Perkins 1104D-44TA</p>
                            </td>
                            <td class="p-6">
                                <span class="bg-red-500/10 border border-red-500/20 text-red-500 text-[9px] font-black px-3 py-1 uppercase tracking-widest">Internal Parts</span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full">
                                        <div class="bg-red-500 h-full w-[15%]"></div>
                                    </div>
                                    <span class="text-[11px] font-black text-red-500 tracking-widest">03 <span class="text-red-500/40 font-bold text-[9px]">/ 20</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$82.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$95.12</td>
                            <td class="p-6 text-center">
                                <span class="material-symbols-outlined text-red-500 text-lg animate-pulse" style="font-variation-settings: 'FILL' 1;">error</span>
                            </td>
                        </tr>
                        <!-- Product Row 3 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#FP-9931-B</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Fuel Injection Pump</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Bosch Heavy Duty</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Fuel Systems</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[60%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">08 <span class="text-on-surface-variant font-bold text-[9px]">/ 12</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$1,840.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$2,134.40</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Product Row 4 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#TU-4420-W</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Turbocharger Assembly</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Holset HE351CW</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Air Intake</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[40%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">02 <span class="text-on-surface-variant font-bold text-[9px]">/ 05</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$645.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$748.20</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Row 5 (Warning) -->
                        <tr class="bg-[#FFB300]/5 hover:bg-[#FFB300]/10 transition-colors border-l-4 border-[#FFB300]">
                            <td class="p-6 text-sm font-black text-[#FFB300] tracking-widest">#VL-0012-S</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Exhaust Valve Set</p>
                                <p class="text-[9px] text-[#FFB300]/60 font-medium uppercase tracking-widest mt-1">CAT 3406E Industrial</p>
                            </td>
                            <td class="p-6"><span class="bg-[#FFB300]/10 border border-[#FFB300]/20 text-[#FFB300] text-[9px] font-black px-3 py-1 uppercase tracking-widest">Valve Train</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-[#FFB300] h-full w-[5%]"></div></div>
                                    <span class="text-[11px] font-black text-[#FFB300] tracking-widest">01 <span class="text-[#FFB300]/40 font-bold text-[9px]">/ 24</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$18.40</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$21.34</td>
                            <td class="p-6 text-center text-[#FFB300]"><span class="material-symbols-outlined text-lg">warning</span></td>
                        </tr>
                        <!-- Product Row 6 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#OP-5521-X</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Oil Pump Assembly</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Detroit Diesel Series 60</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Lubrication</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[100%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">12 <span class="text-on-surface-variant font-bold text-[9px]">/ 12</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$312.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$361.92</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Product Row 7 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#RA-2211-L</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">Heavy Duty Radiator</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Kenworth T800 Core</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Cooling</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[30%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">03 <span class="text-on-surface-variant font-bold text-[9px]">/ 10</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$940.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$1,090.40</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                        <!-- Product Row 8 -->
                        <tr class="hover:bg-black/40 transition-colors group">
                            <td class="p-6 text-sm font-black text-primary tracking-widest">#ST-6600-A</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-white uppercase tracking-tight">24V Heavy Starter Motor</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Delco Remy 39MT</p>
                            </td>
                            <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Electrical</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[75%]"></div></div>
                                    <span class="text-[11px] font-black text-white tracking-widest">15 <span class="text-on-surface-variant font-bold text-[9px]">/ 20</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$425.00</td>
                            <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$493.00</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-8 py-6 bg-black border-t border-outline flex justify-between items-center">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em]">Showing 15 of 1,402 line items</p>
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">1</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-primary text-black text-xs font-black">2</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">3</button>
                    <span class="flex items-center px-4 text-outline">...</span>
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">94</button>
                </div>
            </div>
        </div>

        <!-- Summary Statistics -->
        <div class="grid grid-cols-12 gap-8 mt-12">
            <div class="col-span-8 bg-black border-l-8 border-primary p-10 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-[0.02] transform translate-x-1/4 -translate-y-1/4 scale-150">
                    <span class="material-symbols-outlined text-[300px]">precision_manufacturing</span>
                </div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-white uppercase tracking-tighter mb-4">Active Inventory Value</h3>
                    <p class="text-[10px] text-on-surface-variant font-black uppercase tracking-[0.4em] mb-8">Live Warehouse Appraisal System</p>
                    <div class="flex items-baseline gap-4">
                        <span class="text-6xl font-black text-primary tracking-tighter">$1,452,310.00</span>
                        <span class="text-sm font-black text-on-surface-variant uppercase tracking-widest">USD</span>
                    </div>
                    <div class="grid grid-cols-2 gap-10 mt-12">
                        <div class="border-t border-outline pt-6">
                            <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-2">Pre-Tax Warehouse Cost</p>
                            <p class="text-2xl font-black text-white tracking-widest leading-none">$1,219,940.40</p>
                        </div>
                        <div class="border-t border-outline pt-6">
                            <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-2">VAT Liability (16.0%)</p>
                            <p class="text-2xl font-black text-white tracking-widest leading-none">$232,369.60</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-span-4 bg-surface border-l-8 border-[#FFB300] p-10 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-black text-white uppercase tracking-tighter mb-8 leading-none">Restock Pipeline</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-outline pb-4">
                            <span class="text-[10px] text-on-surface-variant font-black uppercase tracking-widest">Critical Low SKUs</span>
                            <span class="bg-[#FFB300] text-black text-[10px] font-black px-3 py-1 uppercase tracking-widest">04 SKUs</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-outline pb-4">
                            <span class="text-[10px] text-on-surface-variant font-black uppercase tracking-widest">Pending Shipments</span>
                            <span class="text-white text-sm font-black uppercase tracking-widest">12 Orders</span>
                        </div>
                    </div>
                </div>
                <button class="w-full py-5 bg-black border border-[#FFB300]/20 text-[10px] font-black uppercase text-[#FFB300] tracking-[0.2em] hover:bg-[#FFB300] hover:text-black transition-all">
                    Generate Restock Report
                </button>
            </div>
        </div>
    </main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/productos.js"></script>
</body>
</html>