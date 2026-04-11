<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Inventario | Mayor de Repuesto LA CIMA, C.A. - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Inventario | Mayor de Repuesto LA CIMA, C.A. | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('erp/css/common.css') }}">
<link rel="stylesheet" href="{{ asset('erp/css/productos.css') }}">
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: { 
            primary: "#ceff5e", 
            secondary: "#1c1c1c", 
            background: "#0c0e10", 
            surface: "#16181a", 
            outline: "#2a2c2e",
            "on-surface": "#ffffff",
            "on-surface-variant": "#a0a0ab"
        },
        fontFamily: { headline: ["League Spartan", "sans-serif"], body: ["Inter", "sans-serif"] }
      }
    }
  }
</script>
</head>
<body class="bg-background text-stone-900 min-h-screen flex">

<!-- SideNavBar Shell -->
<aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
  <!-- Logo -->
  <div class="flex flex-col px-5 pt-6 pb-4">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 bg-stone-900 flex items-center justify-center rounded-lg">
        <span class="material-symbols-outlined text-primary">precision_manufacturing</span>
      </div>
      <div>
        <h2 class="font-headline font-bold text-lg text-stone-900 leading-none">Mayor de Repuesto La Cima, C.A.</h2>
        <span class="text-[10px] font-mono text-stone-400">v2.1.0</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Sistema ERP Industrial</p>
  </div>

  <nav class="flex-1 px-3 space-y-0.5 pb-24">
    <a href="{{ url('/erp/dashboard/inicio') }}" class="menu-item menu-item-inactive flex items-center gap-3 px-4 py-2">
      <span class="material-symbols-outlined text-[20px]">dashboard</span>
      <span class="flex-1">Dashboard</span>
      <span class="material-symbols-outlined dropdown-arrow text-[18px]">chevron_right</span>
    </a>

    <div class="menu-parent open">
      <div class="menu-item menu-item-active" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span>
        <span>Inventario</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/inventario/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/inventario/productos') }}" class="font-bold text-primary"><span class="material-symbols-outlined">category</span> Productos</a>
        <a href="{{ url('/erp/inventario/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        <a href="{{ url('/erp/inventario/auditoria') }}"><span class="material-symbols-outlined">assignment</span> Auditoría</a>
        <a href="{{ url('/erp/inventario/ajustes') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
      </div>
    </div>
  </nav>

  <div class="mt-auto border-t border-stone-200 p-4">
    <button onclick="logout()" class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 rounded-lg text-sm">
      <span class="material-symbols-outlined text-[18px]">logout</span> Cerrar Sesión
    </button>
  </div>
</aside>

<!-- ========== TOP BAR ========== -->
<header class="fixed top-0 left-72 right-0 bg-white/80 backdrop-blur-xl z-40 border-b border-stone-200">
  <div class="flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-4">
      <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg"><span class="material-symbols-outlined">menu</span></button>
      <div class="hidden md:flex items-center gap-2 text-sm text-stone-500">
        <a href="{{ url('/erp/dashboard/inicio') }}" class="hover:text-stone-900">Inicio</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-stone-900 font-medium">Productos</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm">A</div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-72 mt-[65px] p-6 pb-4">
    <div class="flex justify-between items-end mb-12">
        <div>
            <h2 class="text-6xl font-black text-white uppercase tracking-tighter mb-4 leading-none">Inventory Management</h2>
            <div class="flex items-center gap-6">
                <div class="h-2 w-24 bg-primary"></div>
                <span class="text-on-surface-variant text-xs font-black uppercase tracking-[0.4em]">Global Stock Control v4.2</span>
            </div>
        </div>
        <button class="bg-white text-black px-10 py-5 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-4 hover:bg-primary transition-all shadow-xl">
            <span class="material-symbols-outlined font-black">add</span> New Product Entry
        </button>
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
                        <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-right">Price + IVA</th>
                        <th class="p-6 text-xs font-black text-on-surface-variant uppercase tracking-[0.2em] border-b border-outline text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline" id="inventoryTableBody">
                    <!-- Dynamic rows will be inserted here if needed, showing static example for 1:1 -->
                    <tr class="hover:bg-black/40 transition-colors group">
                        <td class="p-6 text-sm font-black text-primary tracking-widest">#CP-8842-12</td>
                        <td class="p-6">
                            <p class="text-sm font-black text-white uppercase tracking-tight">Cylinder Head Gasket</p>
                            <p class="text-xs text-on-surface-variant font-bold uppercase tracking-widest mt-1">Cummins ISX Series</p>
                        </td>
                        <td class="p-6"><span class="bg-white/5 border border-white/10 text-on-surface-variant text-xs font-black px-3 py-1 uppercase tracking-widest">Engine Seals</span></td>
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div class="flex-1 bg-black h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[85%] shadow-[0_0_10px_#ceff5e]"></div></div>
                                <span class="text-[11px] font-black text-white tracking-widest">42 / 50</span>
                            </div>
                        </td>
                        <td class="p-6 text-right text-sm font-black text-primary tracking-tighter">$144.42</td>
                        <td class="p-6"><div class="flex justify-center gap-3"><button class="p-2 text-on-surface-variant hover:text-primary transition-all"><span class="material-symbols-outlined text-lg">edit</span></button></div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="{{ asset('erp/js/common.js') }}"></script>
<script src="{{ asset('erp/js/productos.js') }}"></script>
</body>
</html>
