<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Ventas | ERP La Cima - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Ventas | LA CIMA">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>Ventas | Mayor de Repuesto LA CIMA, C.A.</title>
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
  
    <!-- Busqueda -->
    <div class="px-4 mb-4">
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
          <span class="material-symbols-outlined text-lg">search</span>
        </span>
        <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar..." type="text"/>
      </div>
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
  
      <!-- INVENTARIO -->
      <div class="menu-parent">
        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
          <span class="material-symbols-outlined text-[20px]">inventory_2</span>
          <span>Inventario</span>
          <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
        </div>
        <div class="submenu">
          <a href="{{ url('/erp/inventario') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
          <a href="{{ url('/erp/inventario/productos') }}"><span class="material-symbols-outlined">category</span> Productos</a>
          <a href="{{ url('/erp/inventario/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
          <a href="{{ url('/erp/inventario/auditoria') }}"><span class="material-symbols-outlined">assignment</span> Auditoría Física</a>
        </div>
      </div>
  
      <!-- VENTAS -->
      <div class="menu-parent">
        <div class="menu-item menu-item-active" onclick="toggleDropdown(this)">
          <span class="material-symbols-outlined text-[20px]">payments</span>
          <span>Ventas</span>
          <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
        </div>
        <div class="submenu" style="display: block;">
          <a href="{{ url('/erp/ventas') }}" class="text-primary font-bold"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
          <a href="{{ url('/erp/pos') }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
          <a href="{{ url('/erp/registro-ventas') }}"><span class="material-symbols-outlined">list_alt</span> Registro</a>
          <a href="{{ url('/erp/configuracion') }}"><span class="material-symbols-outlined">settings</span> Parámetros</a>
        </div>
      </div>
  
      <!-- CONTABILIDAD -->
      <div class="menu-parent">
        <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
          <span class="material-symbols-outlined text-[20px]">account_balance</span>
          <span>Contabilidad</span>
          <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
        </div>
        <div class="submenu">
          <a href="{{ url('/erp/contabilidad') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
          <a href="{{ url('/erp/libro-diario') }}"><span class="material-symbols-outlined">menu_book</span> Libro Diario</a>
          <a href="{{ url('/erp/libro-caja') }}"><span class="material-symbols-outlined">savings</span> Libro Caja</a>
        </div>
      </div>
    </nav>
  
    <!-- Boton Cerrar Sesion -->
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
      <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <div class="hidden md:flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-stone-500">
        <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-stone-900">Dashboard de Ventas</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <button class="p-2 text-stone-500 hover:bg-stone-100 rounded-lg relative">
        <span class="material-symbols-outlined">notifications</span>
        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
      </button>
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <div class="text-right hidden md:block">
          <p class="text-sm font-bold text-stone-900 leading-none">Administrador</p>
          <p class="text-[10px] text-stone-500">Rol: Admin</p>
        </div>
        <div class="w-9 h-9 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm">A</div>
      </div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-72 mt-16 p-8 pb-4">
  <!-- Header Section -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">División de Ventas & Facturación</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none uppercase">Control Comercial <span class="text-stone-400">Zenith</span></h2>
      <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
    </div>
    
    <div class="flex items-center gap-3">
      <button class="bg-stone-900 text-white px-5 py-3 rounded-xl flex items-center gap-3 hover:bg-stone-800 transition-all group active:scale-95 shadow-xl shadow-stone-200 border border-stone-800">
        <span class="material-symbols-outlined text-lg text-primary">analytics</span>
        <span class="text-[10px] font-bold uppercase tracking-widest">Generar Forecast</span>
      </button>
      <a href="{{ url('/erp/pos') }}" class="bg-primary text-stone-900 px-6 py-3 rounded-xl flex items-center gap-3 hover:brightness-110 transition-all font-black uppercase text-[10px] tracking-[0.15em] shadow-xl shadow-primary/20">
        <span class="material-symbols-outlined text-lg">point_of_sale</span>
        Nueva Venta <span class="bg-stone-900/10 px-2 py-0.5 rounded text-[8px] ml-1">F10</span>
      </a>
    </div>
  </div>

  <!-- Bento Grid: Key Metrics -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Ventas del Mes -->
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
      <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-green-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-green-200">
            <span class="material-symbols-outlined">payments</span>
          </div>
          <div class="flex flex-col items-end">
            <span class="text-xs font-black text-green-600">+14.2%</span>
            <span class="text-[8px] font-bold text-stone-400 uppercase tracking-widest">vs mes ant.</span>
          </div>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Ingresos Consolidados</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-stone-900">$128,450</span>
          <span class="text-xs font-bold text-stone-400">.00</span>
        </div>
        <div class="mt-4 pt-4 border-t border-stone-50">
          <p class="text-[9px] text-stone-500 leading-relaxed font-medium">842 transacciones aprobadas este ciclo fiscal.</p>
        </div>
      </div>
    </div>

    <!-- Cuentas por Cobrar -->
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
      <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-amber-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-amber-200">
            <span class="material-symbols-outlined">pending_actions</span>
          </div>
          <div class="flex flex-col items-end">
            <span class="text-xs font-black text-amber-600">24 Pendientes</span>
            <span class="text-[8px] font-bold text-stone-400 uppercase tracking-widest">Cartera Crítica</span>
          </div>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Pendiente de Cobro</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-stone-900">$32,180</span>
          <span class="text-xs font-bold text-stone-400">.50</span>
        </div>
        <div class="mt-4 pt-4 border-t border-stone-50">
          <p class="text-[9px] text-stone-500 leading-relaxed font-medium">12 facturas vencidas requieren gestión inmediata.</p>
        </div>
      </div>
    </div>

    <!-- Ticket Promedio -->
    <div class="bg-white rounded-3xl p-8 border border-stone-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden">
      <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-blue-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
            <span class="material-symbols-outlined">show_chart</span>
          </div>
          <div class="flex flex-col items-end">
            <span class="text-xs font-black text-blue-600">$535.00</span>
            <span class="text-[8px] font-bold text-stone-400 uppercase tracking-widest">Promedio Unitario</span>
          </div>
        </div>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2">Ticket de Venta</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-stone-900">$425</span>
          <span class="text-xs font-bold text-stone-400">/ORD</span>
        </div>
        <div class="mt-4 pt-4 border-t border-stone-50">
          <p class="text-[9px] text-stone-500 leading-relaxed font-medium">Incremento del 5% en volumen por cliente.</p>
        </div>
      </div>
    </div>

    <!-- Conversión -->
    <div class="bg-stone-900 rounded-3xl p-8 shadow-2xl relative group overflow-hidden border border-stone-800">
      <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, #ceff5e 0.5px, transparent 0.5px); background-size: 15px 15px;"></div>
      <div class="relative z-10 flex flex-col h-full">
        <div class="flex items-center justify-between mb-8">
          <div class="w-12 h-12 bg-primary text-black rounded-2xl flex items-center justify-center shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined">group</span>
          </div>
          <span class="text-xs font-black text-primary uppercase">342 Activos</span>
        </div>
        <p class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-2 text-white/50">Base de Clientes</p>
        <div class="flex items-baseline gap-2">
          <span class="text-4xl font-headline font-black text-white">85.4%</span>
          <span class="text-xs font-bold text-primary italic">LTV</span>
        </div>
        <div class="mt-4 pt-4 border-t border-white/5">
          <div class="w-full bg-white/10 h-1 rounded-full overflow-hidden">
            <div class="bg-primary h-full w-[85%]"></div>
          </div>
          <p class="text-[9px] text-white/40 mt-3 leading-relaxed font-medium uppercase tracking-widest">Nivel de retención superior</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Section: Transactions & Performance -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-10">
    
    <!-- Recent Transactions -->
    <div class="lg:col-span-8 bg-white rounded-3xl border border-stone-100 shadow-sm p-8">
      <div class="flex justify-between items-center mb-10">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-stone-900 border border-stone-100">
            <span class="material-symbols-outlined">receipt_long</span>
          </div>
          <div>
            <h3 class="text-xl font-headline font-black text-stone-900 tracking-tight uppercase">Ventas Recientes</h3>
            <p class="text-xs text-stone-400 font-bold uppercase tracking-widest">Últimas operaciones del terminal</p>
          </div>
        </div>
        <a href="{{ url('/erp/registro-ventas') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 hover:text-stone-900 transition-colors flex items-center gap-2">
          Ver Registro Completo
          <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full font-body">
          <thead>
            <tr class="text-left border-b border-stone-100 text-[10px] font-black text-stone-400 uppercase tracking-widest">
              <th class="pb-5 pl-2">Folio</th>
              <th class="pb-5">Cliente / Entidad</th>
              <th class="pb-5">Detalle Operativo</th>
              <th class="pb-5 text-right">Total (USD)</th>
              <th class="pb-5 text-center">Estatus</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-50">
            <tr class="group hover:bg-stone-50/50 transition-colors">
              <td class="py-5 pl-2">
                <span class="text-xs font-mono font-bold text-stone-400 group-hover:text-stone-900 transition-colors uppercase">#FAC-9801</span>
              </td>
              <td class="py-5">
                <div class="flex flex-col">
                  <span class="text-xs font-black text-stone-900 uppercase">Transportes Carabobo</span>
                  <span class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter">RIF: J-554210-3</span>
                </div>
              </td>
              <td class="py-5">
                <p class="text-xs text-stone-500 font-medium italic">Filtros Volvo + Turbo VGT</p>
              </td>
              <td class="py-5 text-right">
                <span class="text-sm font-headline font-black text-stone-900 tracking-tight">$1,245.50</span>
              </td>
              <td class="py-5 text-center">
                <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[9px] font-black uppercase tracking-wider border border-green-100">Liquidada</span>
              </td>
            </tr>
            <tr class="group hover:bg-stone-50/50 transition-colors">
              <td class="py-5 pl-2">
                <span class="text-xs font-mono font-bold text-stone-400 group-hover:text-stone-900 transition-colors uppercase">#FAC-9802</span>
              </td>
              <td class="py-5">
                <div class="flex flex-col">
                  <span class="text-xs font-black text-stone-900 uppercase">Industrial Parts S.A.</span>
                  <span class="text-[9px] text-stone-400 font-bold uppercase tracking-tighter">RIF: J-127440-1</span>
                </div>
              </td>
              <td class="py-5">
                <p class="text-xs text-stone-500 font-medium italic">Kit Rodamientos Heavy Duty</p>
              </td>
              <td class="py-5 text-right">
                <span class="text-sm font-headline font-black text-stone-900 tracking-tight">$840.00</span>
              </td>
              <td class="py-5 text-center">
                <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[9px] font-black uppercase tracking-wider border border-amber-100">Por Cobrar</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Category Distribution & Rank -->
    <div class="lg:col-span-4 flex flex-col gap-8">
      <!-- Chart Card -->
      <div class="bg-white rounded-3xl border border-stone-100 shadow-sm p-8 flex-1">
        <h3 class="text-xs font-black text-stone-900 uppercase tracking-widest mb-8 flex items-center gap-3">
          <span class="material-symbols-outlined text-stone-400">pie_chart</span>
          Mix Comercial
        </h3>
        
        <div class="relative w-full aspect-square max-w-[180px] mx-auto mb-8">
          <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90 drop-shadow-sm">
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#f6f6f9" stroke-width="4.5"/>
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#ceff5e" stroke-width="4.5" stroke-dasharray="45, 100"/>
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#1c1c1c" stroke-width="4.5" stroke-dasharray="25, 100" stroke-dashoffset="-45"/>
            <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e2e2e5" stroke-width="4.5" stroke-dasharray="30, 100" stroke-dashoffset="-70"/>
          </svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
            <span class="text-[9px] font-black text-stone-400 uppercase tracking-tighter">Ventas</span>
            <span class="text-xl font-headline font-black text-stone-900">FY26</span>
          </div>
        </div>

        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-2.5 h-2.5 bg-primary rounded-sm"></div>
              <span class="text-[10px] font-bold text-stone-600 uppercase">Repuestos Cummins</span>
            </div>
            <span class="text-[10px] font-black text-stone-900">45%</span>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-2.5 h-2.5 bg-stone-900 rounded-sm"></div>
              <span class="text-[10px] font-bold text-stone-600 uppercase">Filtros Volvo</span>
            </div>
            <span class="text-[10px] font-black text-stone-900">25%</span>
          </div>
        </div>
      </div>

      <!-- Quick Action Card -->
      <div class="bg-stone-900 rounded-3xl p-8 flex flex-col justify-between shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
        <div class="relative z-10">
          <h4 class="text-xs font-black text-primary uppercase tracking-widest mb-2">Soporte Comercial</h4>
          <p class="text-[10px] text-stone-400 font-medium leading-relaxed uppercase">Accede a las herramientas de asistencia técnica avanzada.</p>
        </div>
        <div class="flex gap-3 mt-6 relative z-10">
          <button class="flex-1 bg-white/5 border border-white/10 p-3 rounded-xl transition-all text-[9px] font-black uppercase tracking-widest text-white hover:bg-white/10">FAQ</button>
          <button class="flex-1 bg-primary text-stone-900 p-3 rounded-xl hover:brightness-110 transition-all text-[9px] font-black uppercase tracking-widest">Catálogo</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Corporate Footer Compliance -->
  <footer class="mt-12 pt-8 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-6">
    <div class="flex items-center gap-4">
      <div class="w-8 h-8 bg-stone-900 p-1.5 rounded-lg flex items-center justify-center">
        <img src="{{ asset('assets/images/logo.png') }}" class="w-full h-full object-contain filter invert" alt="Logo Footer">
      </div>
      <div class="text-left">
        <p class="text-[10px] font-black text-stone-900 uppercase tracking-widest leading-none">MAYOR DE REPUESTO LA CIMA, C.A.</p>
        <p class="text-[9px] font-mono text-stone-400 mt-1 uppercase">RIF: J-40308741-5 • Registro Mercantil Primero</p>
      </div>
    </div>
    
    <div class="flex items-center gap-8">
      <a href="{{ url('/erp/reportes-ventas') }}" class="text-[9px] font-black text-stone-400 hover:text-stone-900 uppercase tracking-[0.2em] transition-colors">Analítica</a>
      <a href="{{ url('/erp/configuracion') }}" class="text-[9px] font-black text-stone-400 hover:text-stone-900 uppercase tracking-[0.2em] transition-colors">Fiscal</a>
      <span class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] opacity-30">v2.1 Build 2026.4</span>
    </div>
  </footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Scripts -->
<script src="{{ asset('erp/js/inicio.js') }}"></script>
<script>
    function toggleDropdown(el) {
        const submenu = el.nextElementSibling;
        const arrow = el.querySelector('.dropdown-arrow');
        const allSubmenus = document.querySelectorAll('.submenu');
        const allArrows = document.querySelectorAll('.dropdown-arrow');
        
        allSubmenus.forEach(sub => { if(sub !== submenu) sub.style.display = 'none'; });
        allArrows.forEach(arr => { if(arr !== arrow) arr.style.transform = 'rotate(0deg)'; });

        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
            arrow.style.transform = 'rotate(0deg)';
        } else {
            submenu.style.display = 'block';
            arrow.style.transform = 'rotate(90deg)';
        }
    }
</script>
</body>
</html>
