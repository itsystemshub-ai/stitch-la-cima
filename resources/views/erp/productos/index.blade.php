<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Productos | ERP La Cima - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="MAYOR DE REPUESTO LA CIMA, C.A.">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>Productos | Mayor de Repuesto LA CIMA, C.A.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
<link rel="stylesheet" href="{{ asset('erp/css/inicio.css') }}">
<style>
  .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
  .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
  .custom-scrollbar::-webkit-scrollbar-thumb { background: #ceff5e; border-radius: 10px; }
</style>
</head>
<body class="bg-background text-stone-900 min-h-screen flex">

  <!-- SideNavBar Shell -->
  <aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
    <!-- Logo -->
    <div class="flex flex-col px-5 pt-6 pb-4">
      <div class="flex items-center gap-3 mb-2">
        <div class="w-10 h-10 bg-stone-900 flex items-center justify-center rounded-lg">
          <img src="{{ asset('assets/images/logo.png') }}" class="w-7 h-7 object-contain" alt="Logo">
        </div>
        <div>
          <h2 class="font-headline font-bold text-sm text-stone-700 leading-none uppercase">MAYOR DE REPUESTO LA CIMA, C.A</h2>
          <span class="text-[12px] font-mono text-stone-400">RIF: J-40308741-5</span>
        </div>
      </div>
      <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Portal ERP Corporativo</p>
    </div>
  
    <!-- Menu Principal -->
    <nav class="flex-1 px-3 space-y-0.5 pb-24">
      <div class="menu-group">Principal</div>
      <a href="{{ url('/') }}" class="menu-item menu-item-inactive">
        <span class="material-symbols-outlined text-[20px]">storefront</span><span>Tienda Virtual</span>
      </a>
      <a href="{{ url('/erp/inicio') }}" class="menu-item menu-item-inactive">
        <span class="material-symbols-outlined text-[20px]">dashboard</span><span>Dashboard Central</span>
      </a>
  
      <!-- INVENTARIO (Parent Active) -->
      <div class="menu-parent">
        <div class="menu-item menu-item-active" onclick="toggleDropdown(this)">
          <span class="material-symbols-outlined text-[20px]">inventory_2</span>
          <span>Inventario</span>
          <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
        </div>
        <div class="submenu" style="display: block;">
          <a href="{{ url('/erp/inventario') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
          <a href="{{ url('/erp/productos') }}" class="text-primary font-bold"><span class="material-symbols-outlined">category</span> Productos</a>
          <a href="{{ url('/erp/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        </div>
      </div>
  
      <!-- VENTAS -->
      <div class="menu-parent">
        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
          <span class="material-symbols-outlined text-[20px]">payments</span>
          <span>Ventas</span>
          <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
        </div>
        <div class="submenu">
          <a href="{{ url('/erp/ventas') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
          <a href="{{ url('/erp/pos') }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
        </div>
      </div>
    </nav>
  
    <div class="mt-auto border-t border-stone-200 p-4">
      <button onclick="localStorage.removeItem('erp_session'); window.location.href='{{ url('/auth/login') }}';" class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-sm">
        <span class="material-symbols-outlined text-[18px]">logout</span>
        Cerrar Sesión
      </button>
    </div>
  </aside>

<!-- ========== TOP BAR ========== -->
<header class="fixed top-0 left-72 right-0 bg-white/80 backdrop-blur-xl z-40 border-b border-stone-200">
  <div class="flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-4">
      <div class="hidden md:flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-stone-500">
        <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-stone-900">Maestro de Productos</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm">A</div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-72 mt-16 p-8 pb-4">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Stock Central</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Maestro de <span class="text-stone-400">Productos</span></h2>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <button class="bg-stone-900 text-primary px-8 py-4 text-xs font-black uppercase tracking-[0.2em] flex items-center gap-3 hover:bg-stone-800 transition-all rounded-xl shadow-2xl active:scale-95 group">
            <span class="material-symbols-outlined text-lg group-hover:rotate-90 transition-transform">add</span>
            Nuevo Item
        </button>
    </div>

    <!-- Filters -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white border border-stone-200 p-5 rounded-2xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-3">Filtrar Categoría</p>
            <select class="w-full bg-transparent border-none p-0 text-sm font-black text-stone-900 uppercase tracking-tight focus:ring-0">
                <option>Todos los Repuestos</option>
                <option>Frenado</option>
                <option>Motor</option>
            </select>
        </div>
        <div class="bg-stone-900 border border-stone-800 p-5 rounded-2xl shadow-xl flex items-center justify-center">
            <div class="text-center">
                <p class="text-3xl font-headline font-black text-primary tracking-tight">1,402</p>
                <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest mt-1">Items en Almacén</p>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white border border-stone-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100">
                        <th class="px-6 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest">SKU</th>
                        <th class="px-6 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest">Descripción</th>
                        <th class="px-6 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest">Stock</th>
                        <th class="px-6 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest text-right">Precio</th>
                        <th class="px-6 py-5 text-[10px] font-black text-stone-400 uppercase tracking-widest text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-6 py-5 font-mono text-xs font-black">#OEM-4421-V</td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-black text-stone-900 uppercase">Kit Discos de Freno Ventilados</p>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter">Toyota Hilux / Fortuner</p>
                        </td>
                        <td class="px-6 py-5 text-center font-black text-xs">120</td>
                        <td class="px-6 py-5 text-right font-headline font-black text-sm">$85.00</td>
                        <td class="px-6 py-5 flex justify-center gap-2">
                             <button class="p-2 text-stone-400 hover:text-stone-900 transition-colors"><span class="material-symbols-outlined text-lg">edit</span></button>
                             <button class="p-2 text-stone-400 hover:text-stone-900 transition-colors"><span class="material-symbols-outlined text-lg">visibility</span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Valuation -->
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-stone-900 rounded-2xl p-8 shadow-2xl">
            <h3 class="text-2xl font-headline font-black text-white uppercase tracking-tighter mb-1">Valorización de Almacén</h3>
            <p class="text-[10px] text-primary font-black uppercase tracking-[0.2em] mb-8">Método de Costeo: Promedio Ponderado</p>
            <span class="text-6xl font-headline font-black text-white tracking-tighter">$1,452,310</span>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-12 pt-8 border-t border-stone-100 flex justify-between items-center">
        <span class="text-[10px] font-bold text-stone-400 uppercase">RIF: J-40308741-5 • Zenith ERP V6.0</span>
        <div class="flex gap-4">
          <a href="{{ url('/erp/ayuda') }}" class="text-[10px] font-bold text-stone-500 uppercase">Ayuda</a>
          <a href="{{ url('/erp/manual-tecnico') }}" class="text-[10px] font-bold text-stone-500 uppercase">Manual</a>
        </div>
    </footer>
</main>

<script src="{{ asset('js/inicio.js') }}"></script>
<script>
    function toggleDropdown(el) {
        const submenu = el.nextElementSibling;
        const submenuArrow = el.querySelector('.dropdown-arrow');
        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
            submenuArrow.style.transform = 'rotate(0deg)';
        } else {
            submenu.style.display = 'block';
            submenuArrow.style.transform = 'rotate(90deg)';
        }
    }
</script>
</body>
</html>
