<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Finance Reporting Center | INDUSTRIAL FORGE ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Finance Reporting Center | INDUSTRIAL FORGE ERP | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/reportes-financieros.css">
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
        <span class="material-symbols-outlined text-primary">precision_manufacturing</span>
      </div>
      <div>
        <h2 class="font-headline font-bold text-lg text-stone-900 leading-none">Mayor de Repuesto La Cima, C.A.</h2>
        <span class="text-[10px] font-mono text-stone-400">v2.1.0</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Sistema ERP Industrial</p>
  </div>

  <div class="px-4 mb-4">
    <div class="relative">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400"><span class="material-symbols-outlined text-lg">search</span></span>
      <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar..." type="text"/>
    </div>
  </div>

  <nav class="flex-1 px-3 overflow-y-auto no-scrollbar space-y-0.5">
    <div class="menu-group">Principal</div>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/' . 'inicio') }}">
      <span class="material-symbols-outlined text-[20px]">dashboard</span><span>Inicio</span>
      <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
    </a>

    <div class="menu-group">Inventario</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span><span>Inventario</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'productos') }}"><span class="material-symbols-outlined">category</span> Productos</a>
        <a href="{{ url('/erp/' . 'kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        <a href="{{ url('/erp/' . 'auditoria-inventario') }}"><span class="material-symbols-outlined">assignment</span> Auditoría F?sica</a>
        <a href="{{ url('/erp/' . 'ajustes-inventario') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
        <a href="{{ url('/erp/' . 'reportes-inventario') }}"><span class="material-symbols-outlined">analytics</span> Reportes</a>
      </div>
    </div>

    <div class="menu-group">Ventas</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">payments</span><span>Ventas</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'pos') }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
        <a href="{{ url('/erp/' . 'registro-ventas') }}"><span class="material-symbols-outlined">list_alt</span> Registro</a>
        <a href="{{ url('/erp/' . 'factura-electronica') }}"><span class="material-symbols-outlined">receipt</span> Factura Electrónica</a>
        <a href="{{ url('/erp/' . 'facturas-emitidas') }}"><span class="material-symbols-outlined">description</span> Facturas Emitidas</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/' . 'notas-credito') }}"><span class="material-symbols-outlined">redo</span> Notas de Crédito</a>
        <a href="{{ url('/erp/' . 'clientes') }}"><span class="material-symbols-outlined">people</span> Clientes</a>
        <a href="{{ url('/erp/' . 'vendedores') }}"><span class="material-symbols-outlined">badge</span> Vendedores</a>
        <a href="{{ url('/erp/' . 'reportes-ventas') }}"><span class="material-symbols-outlined">bar_chart</span> Reportes</a>
      </div>
    </div>

    <div class="menu-group">Compras</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">shopping_cart</span><span>Compras</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'proveedores') }}"><span class="material-symbols-outlined">local_shipping</span> Proveedores</a>
        <a href="{{ url('/erp/' . 'historial-compras') }}"><span class="material-symbols-outlined">history</span> Historial</a>
        <a href="{{ url('/erp/' . 'factura-compra') }}"><span class="material-symbols-outlined">request_quote</span> Factura Compra</a>
        <a href="{{ url('/erp/' . 'libro-compras') }}"><span class="material-symbols-outlined">book</span> Libro Compras</a>
        <a href="{{ url('/erp/' . 'reportes-compras') }}"><span class="material-symbols-outlined">stacked_bar_chart</span> Reportes</a>
      </div>
    </div>

    <div class="menu-group">Contabilidad</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">account_balance</span><span>Contabilidad</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'plan-cuentas') }}"><span class="material-symbols-outlined">format_list_numbered</span> Plan Cuentas</a>
        <a href="{{ url('/erp/' . 'libro-diario') }}"><span class="material-symbols-outlined">menu_book</span> Libro Diario</a>
        <a href="{{ url('/erp/' . 'libro-ventas') }}"><span class="material-symbols-outlined">chrome_reader_mode</span> Libro Ventas</a>
        <a href="{{ url('/erp/' . 'libro-caja') }}"><span class="material-symbols-outlined">savings</span> Libro Caja</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/' . 'balance-general') }}"><span class="material-symbols-outlined">balance</span> Balance General</a>
        <a href="{{ url('/erp/' . 'balance-comprobacion') }}"><span class="material-symbols-outlined">scale</span> Balance Comprob.</a>
        <a href="{{ url('/erp/' . 'estado-resultados') }}"><span class="material-symbols-outlined">monitoring</span> Estado Resultados</a>
        <a href="{{ url('/erp/' . 'declaracion-iva') }}"><span class="material-symbols-outlined">gavel</span> Declaración IVA</a>
        <a href="{{ url('/erp/' . 'cierre-contable') }}"><span class="material-symbols-outlined">lock_clock</span> Cierre Contable</a>
        <a href="{{ url('/erp/' . 'libros-legales') }}"><span class="material-symbols-outlined">law</span> Libros Legales</a>
        <a href="{{ url('/erp/' . 'reportes-contables') }}"><span class="material-symbols-outlined">pie_chart</span> Reportes</a>
      </div>
    </div>

    <div class="menu-group">Finanzas</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">monetization_on</span><span>Finanzas</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'activos-fijos') }}"><span class="material-symbols-outlined">corporate_fare</span> Activos Fijos</a>
        <a href="{{ url('/erp/' . 'cuentas-cobrar') }}"><span class="material-symbols-outlined">account_balance_wallet</span> Cuentas Cobrar</a>
        <a href="{{ url('/erp/' . 'reportes-financieros') }}"><span class="material-symbols-outlined">show_chart</span> Reportes</a>
      </div>
    </div>

    <div class="menu-group">Recursos Humanos</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">groups</span><span>RRHH</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'empleados') }}"><span class="material-symbols-outlined">person</span> Empleados</a>
        <a href="{{ url('/erp/' . 'nomina') }}"><span class="material-symbols-outlined">payments</span> Nómina</a>
        <a href="{{ url('/erp/' . 'prestaciones') }}"><span class="material-symbols-outlined">savings</span> Prestaciones</a>
        <a href="{{ url('/erp/' . 'portal-empleado') }}"><span class="material-symbols-outlined">person_outline</span> Portal Empleado</a>
        <a href="{{ url('/erp/' . 'rendimiento-anual') }}"><span class="material-symbols-outlined">emoji_events</span> Rendimiento</a>
        <a href="{{ url('/erp/' . 'reportes-rrhh') }}"><span class="material-symbols-outlined">group_work</span> Reportes</a>
      </div>
    </div>

    <div class="menu-group">Sistema</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">settings</span><span>Configuración</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'parametros') }}"><span class="material-symbols-outlined">tune</span> Parámetros</a>
        <a href="{{ url('/erp/' . 'config-fiscal') }}"><span class="material-symbols-outlined">policy</span> Config Fiscal</a>
        <a href="{{ url('/erp/' . 'usuarios-roles') }}"><span class="material-symbols-outlined">admin_panel_settings</span> Usuarios</a>
        <a href="{{ url('/erp/' . 'base-datos') }}"><span class="material-symbols-outlined">storage</span> Base Datos</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/' . 'backups') }}"><span class="material-symbols-outlined">backup</span> Backups</a>
        <a href="{{ url('/erp/' . 'estado-sistema') }}"><span class="material-symbols-outlined">health_and_safety</span> Estado Sistema</a>
        <a href="{{ url('/erp/' . 'tareas-programadas') }}"><span class="material-symbols-outlined">schedule</span> Tareas</a>
        <a href="{{ url('/erp/' . 'auditoria-seguridad') }}"><span class="material-symbols-outlined">security</span> Auditoría</a>
      </div>
    </div>

    <div class="menu-group">Ayuda</div>
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">help</span><span>Ayuda</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/' . 'ayuda') }}"><span class="material-symbols-outlined">help</span> Centro Ayuda</a>
        <a href="{{ url('/erp/' . 'tickets-soporte') }}"><span class="material-symbols-outlined">confirmation_number</span> Tickets</a>
        <a href="{{ url('/erp/' . 'crear-ticket') }}"><span class="material-symbols-outlined">add_circle</span> Crear Ticket</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/' . 'chat-asistencia') }}"><span class="material-symbols-outlined">chat</span> Chat</a>
        <a href="{{ url('/erp/' . 'base-conocimiento') }}"><span class="material-symbols-outlined">school</span> Conocimiento</a>
        <a href="{{ url('/erp/' . 'manual-tecnico') }}"><span class="material-symbols-outlined">description</span> Manual</a>
      </div>
    </div>
  </nav>

  <div class="mt-auto border-t border-stone-200 p-4">
    <button onclick="logout()" class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-sm">
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
      <div class="hidden md:flex items-center gap-2 text-sm text-stone-500">
        <a href="{{ url('/erp/' . 'inicio') }}" class="hover:text-stone-900">Inicio</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-stone-900 font-medium" id="breadcrumbPage">Página</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="hidden lg:block relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400"><span class="material-symbols-outlined text-lg">search</span></span>
        <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-64 rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar repuestos, ventas, clientes..." type="text"/>
      </div>
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
<main class="flex-1 md:ml-64 relative">
<!-- TopAppBar -->
<header class="sticky top-0 z-50 bg-surface dark:bg-stone-950/80 backdrop-blur-xl flex justify-between items-center w-full px-6 py-4 mx-auto tonal-shift-no-borders bg-stone-100 dark:bg-stone-900">
<div class="flex items-center gap-8">
<span class="font-['Space_Grotesk'] uppercase tracking-tight text-xl font-bold tracking-tighter text-stone-900 dark:text-stone-50">FINANCE REPORTING CENTER</span>
<div class="hidden lg:flex items-center bg-surface-container-high px-4 py-1.5 rounded-full border-none">
<span class="material-symbols-outlined text-stone-400 text-lg mr-2" data-icon="search">search</span>
<input class="bg-transparent border-none focus:ring-0 text-xs font-semibold placeholder:text-stone-400 w-48 uppercase tracking-tighter" placeholder="Search Ledgers..." type="text"/>
</div>
</div>
<nav class="hidden xl:flex items-center gap-6">
<a class="text-stone-500 dark:text-stone-400 font-['Space_Grotesk'] uppercase tracking-tight text-xs font-bold hover:text-lime-500 transition-colors" href="#">Dashboard</a>
<a class="text-stone-500 dark:text-stone-400 font-['Space_Grotesk'] uppercase tracking-tight text-xs font-bold hover:text-lime-500 transition-colors" href="#">Analytics</a>
<a class="text-lime-600 dark:text-lime-400 border-b-2 border-lime-600 dark:border-lime-400 pb-1 font-['Space_Grotesk'] uppercase tracking-tight text-xs font-bold" href="#">Reports</a>
<a class="text-stone-500 dark:text-stone-400 font-['Space_Grotesk'] uppercase tracking-tight text-xs font-bold hover:text-lime-500 transition-colors" href="#">Settings</a>
</nav>
<div class="flex items-center gap-4">
<button class="p-2 text-stone-500 hover:text-lime-600 transition-colors scale-98-on-click relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-1.5 h-1.5 bg-error rounded-full"></span>
</button>
<button class="p-2 text-stone-500 hover:text-lime-600 transition-colors scale-98-on-click">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
</button>
<div class="w-8 h-8 rounded-full overflow-hidden border-2 border-primary-container">
<img alt="User Profile Avatar" class="w-full h-full object-cover" data-alt="professional portrait of a senior financial analyst in a modern office setting with natural lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCe42fUkrjhvmK3DZ3j_jvedDN0Hm8k6ZLgaVaJ02evniV26hestvRuDU6LcNhDHA9XPNynP8SWQoRvDpQb-i3iO96tBWIGJXaQ0AQ9FUd2N_XF4AkHZFjT_XnpC4gguB9voapk8AclBJmSGCoI_JTS_9nbCTgqqciQei_iTtbVjMn5tr4-m5PDecCWClPgH6UGffUFJXa8c99ch-e2Foe6YqzpxXSr05bkGiVbBM7fLp6fDgJrEh_7bwxrYbGzDV2zKKuvIIaiASs"/>
</div>
</div>
</header>
<div class="p-6 lg:p-8 space-y-8">
<!-- Hero Stats / High-Level Ratios -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between shadow-[24px_24px_40px_rgba(26,28,28,0.04)]">
<span class="text-[10px] font-black uppercase tracking-widest text-secondary opacity-70">Current Ratio</span>
<div class="mt-4 flex items-baseline gap-2">
<span class="text-3xl font-headline font-bold">2.41</span>
<span class="text-xs font-bold text-lime-600 uppercase tracking-tighter">+12%</span>
</div>
<div class="mt-2 h-1 w-full bg-surface-container overflow-hidden">
<div class="h-full bg-primary" style="width: 75%"></div>
</div>
<p class="mt-4 text-[10px] font-semibold text-stone-500 uppercase">Optimal Threshold: 2.0</p>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between shadow-[24px_24px_40px_rgba(26,28,28,0.04)] border-l-4 border-primary">
<span class="text-[10px] font-black uppercase tracking-widest text-secondary opacity-70">Quick Ratio (Acid Test)</span>
<div class="mt-4 flex items-baseline gap-2">
<span class="text-3xl font-headline font-bold">1.85</span>
<span class="text-xs font-bold text-lime-600 uppercase tracking-tighter">+4%</span>
</div>
<div class="mt-2 h-1 w-full bg-surface-container overflow-hidden">
<div class="h-full bg-primary-container" style="width: 62%"></div>
</div>
<p class="mt-4 text-[10px] font-semibold text-stone-500 uppercase">Liquidity: Strong</p>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between shadow-[24px_24px_40px_rgba(26,28,28,0.04)]">
<span class="text-[10px] font-black uppercase tracking-widest text-secondary opacity-70">Operating Cash Flow</span>
<div class="mt-4 flex items-baseline gap-2">
<span class="text-3xl font-headline font-bold">$1.2M</span>
<span class="text-xs font-bold text-stone-400 uppercase tracking-tighter">Stable</span>
</div>
<div class="mt-2 h-1 w-full bg-surface-container overflow-hidden">
<div class="h-full bg-stone-400" style="width: 90%"></div>
</div>
<p class="mt-4 text-[10px] font-semibold text-stone-500 uppercase">Monthly Avg Performance</p>
</div>
<div class="bg-error-container/20 p-6 flex flex-col justify-between shadow-[24px_24px_40px_rgba(26,28,28,0.04)] border-l-4 border-error">
<span class="text-[10px] font-black uppercase tracking-widest text-error opacity-70">Budget Deviation</span>
<div class="mt-4 flex items-baseline gap-2">
<span class="text-3xl font-headline font-bold text-error">14.2%</span>
<span class="material-symbols-outlined text-error text-lg" data-icon="warning">warning</span>
</div>
<div class="mt-2 h-1 w-full bg-surface-container overflow-hidden">
<div class="h-full bg-error" style="width: 14%"></div>
</div>
<p class="mt-4 text-[10px] font-bold text-error uppercase">Action Required: R&amp;D Dept</p>
</div>
</section>
<!-- Bento Layout for Analysis -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- Cash Flow Analysis (Main) -->
<div class="lg:col-span-8 bg-surface-container-lowest p-8 shadow-[24px_24px_40px_rgba(26,28,28,0.04)] relative overflow-hidden">
<div class="flex justify-between items-start mb-10">
<div>
<h3 class="text-2xl font-headline font-bold uppercase tracking-tighter">Cash Flow Statement</h3>
<p class="text-xs font-bold text-stone-500 uppercase tracking-widest mt-1">Direct vs Indirect Analysis Method</p>
</div>
<div class="flex gap-2">
<button class="text-[10px] font-bold border border-stone-200 px-3 py-1.5 uppercase hover:bg-stone-50 transition-colors">Direct</button>
<button class="text-[10px] font-bold bg-stone-900 text-stone-50 px-3 py-1.5 uppercase transition-colors">Indirect</button>
</div>
</div>
<!-- Visualization Simulation -->
<div class="relative h-64 w-full flex items-end gap-2 px-2 border-b border-stone-100">
<!-- Bars simulating a complex graph -->
<div class="flex-1 bg-primary/20 h-[60%] group relative transition-all hover:bg-primary/40">
<div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 bg-stone-900 text-white text-[10px] px-2 py-1 hidden group-hover:block">$450k</div>
</div>
<div class="flex-1 bg-primary/40 h-[75%] group relative transition-all hover:bg-primary/60"></div>
<div class="flex-1 bg-primary h-[90%] group relative transition-all"></div>
<div class="flex-1 bg-primary-container h-[45%] group relative transition-all"></div>
<div class="flex-1 bg-primary/30 h-[80%] group relative transition-all"></div>
<div class="flex-1 bg-primary h-[100%] group relative transition-all"></div>
<div class="flex-1 bg-stone-200 h-[30%] group relative transition-all"></div>
<div class="flex-1 bg-stone-300 h-[55%] group relative transition-all"></div>
<div class="flex-1 bg-primary/80 h-[85%] group relative transition-all"></div>
<div class="flex-1 bg-primary/50 h-[65%] group relative transition-all"></div>
<div class="flex-1 bg-primary-container/80 h-[40%] group relative transition-all"></div>
<div class="flex-1 bg-stone-900 h-[70%] group relative transition-all"></div>
</div>
<div class="flex justify-between mt-4">
<span class="text-[9px] font-bold text-stone-400 uppercase">Q3 2023</span>
<span class="text-[9px] font-bold text-stone-400 uppercase">Fiscal Period Finalized Oct 14</span>
<span class="text-[9px] font-bold text-stone-400 uppercase">Current Forecast</span>
</div>
<!-- Technical Detail Inset -->
<div class="mt-8 grid grid-cols-2 gap-8 border-t border-stone-100 pt-8">
<div>
<span class="text-[10px] font-black uppercase text-secondary">Operating Activities</span>
<div class="flex justify-between items-center mt-3">
<span class="text-xs font-semibold text-stone-600">Net Income Adjustment</span>
<span class="text-xs font-bold text-stone-900">+$242,500</span>
</div>
<div class="flex justify-between items-center mt-2">
<span class="text-xs font-semibold text-stone-600">Depreciation / Amortization</span>
<span class="text-xs font-bold text-stone-900">+$88,000</span>
</div>
</div>
<div>
<span class="text-[10px] font-black uppercase text-secondary">Financing Activities</span>
<div class="flex justify-between items-center mt-3">
<span class="text-xs font-semibold text-stone-600">Dividend Payments</span>
<span class="text-xs font-bold text-error">-($45,000)</span>
</div>
<div class="flex justify-between items-center mt-2">
<span class="text-xs font-semibold text-stone-600">Loan Repayments</span>
<span class="text-xs font-bold text-error">-($112,000)</span>
</div>
</div>
</div>
</div>
<!-- Accounts Receivable Aging (Secondary) -->
<div class="lg:col-span-4 space-y-6">
<div class="bg-stone-900 text-stone-50 p-8 shadow-[24px_24px_40px_rgba(0,0,0,0.1)] relative">
<h3 class="text-lg font-headline font-bold uppercase tracking-tighter mb-6">AR Aging Summary</h3>
<div class="space-y-6">
<div class="flex flex-col gap-1">
<div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-stone-400">
<span>Current (0-30 Days)</span>
<span>72%</span>
</div>
<div class="h-1.5 w-full bg-stone-800">
<div class="h-full bg-lime-400" style="width: 72%"></div>
</div>
</div>
<div class="flex flex-col gap-1">
<div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-stone-400">
<span>Overdue (31-60 Days)</span>
<span>18%</span>
</div>
<div class="h-1.5 w-full bg-stone-800">
<div class="h-full bg-lime-600" style="width: 18%"></div>
</div>
</div>
<div class="flex flex-col gap-1">
<div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-stone-400">
<span>Critical (61-90+ Days)</span>
<span>10%</span>
</div>
<div class="h-1.5 w-full bg-stone-800">
<div class="h-full bg-error" style="width: 10%"></div>
</div>
</div>
</div>
<div class="mt-8 pt-6 border-t border-stone-800">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">Total Outstanding Balance</p>
<p class="text-3xl font-headline font-bold">$3,842,900.00</p>
</div>
</div>
<!-- Revenue vs Expenses Widget -->
<div class="bg-surface-container-highest p-8">
<h3 class="text-sm font-headline font-bold uppercase tracking-widest mb-6">Revenue vs Expenses</h3>
<div class="flex items-center gap-4 mb-4">
<div class="flex items-center gap-2">
<span class="w-3 h-3 bg-primary"></span>
<span class="text-[10px] font-bold uppercase">Revenue</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-3 bg-stone-400"></span>
<span class="text-[10px] font-bold uppercase">Expenses</span>
</div>
</div>
<!-- Micro Chart -->
<div class="flex items-end gap-1 h-32">
<div class="w-2 bg-primary" style="height: 40%"></div>
<div class="w-2 bg-stone-400" style="height: 35%"></div>
<div class="w-1"></div>
<div class="w-2 bg-primary" style="height: 60%"></div>
<div class="w-2 bg-stone-400" style="height: 55%"></div>
<div class="w-1"></div>
<div class="w-2 bg-primary" style="height: 80%"></div>
<div class="w-2 bg-stone-400" style="height: 40%"></div>
<div class="w-1"></div>
<div class="w-2 bg-primary" style="height: 95%"></div>
<div class="w-2 bg-stone-400" style="height: 50%"></div>
</div>
<button class="w-full mt-6 py-3 border-2 border-stone-300 text-[10px] font-black uppercase tracking-widest hover:bg-stone-900 hover:text-white hover:border-stone-900 transition-all scale-98-on-click">View Breakdown</button>
</div>
</div>
</section>
<!-- Detailed Accounts Table -->
<section class="bg-surface-container-lowest shadow-[24px_24px_40px_rgba(26,28,28,0.04)] overflow-hidden">
<div class="px-8 py-6 flex justify-between items-center bg-stone-50 border-b border-stone-100">
<h3 class="text-sm font-headline font-bold uppercase tracking-widest">Active Accounts Receivable Aging Ledger</h3>
<div class="flex items-center gap-4">
<span class="text-[10px] font-bold text-stone-400 uppercase">Sort by: Date</span>
<span class="material-symbols-outlined text-stone-400 cursor-pointer" data-icon="filter_list">filter_list</span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-50 border-b border-stone-100">
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Entity Name</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Inv. Number</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Status</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Amount</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest text-right">Age</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-100">
<tr class="hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center font-headline font-bold text-xs">TH</div>
<span class="text-xs font-bold uppercase">Turbine Heavy Industries</span>
</div>
</td>
<td class="px-8 py-4 font-mono text-[11px] text-stone-500">#INV-88219-B</td>
<td class="px-8 py-4">
<span class="px-2 py-0.5 bg-primary-container text-on-primary-container text-[9px] font-black uppercase tracking-tighter">Current</span>
</td>
<td class="px-8 py-4 text-xs font-bold">$124,500.00</td>
<td class="px-8 py-4 text-xs font-mono font-bold text-right">12d</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center font-headline font-bold text-xs">AS</div>
<span class="text-xs font-bold uppercase">Aerospace Solutions Ltd</span>
</div>
</td>
<td class="px-8 py-4 font-mono text-[11px] text-stone-500">#INV-90122-C</td>
<td class="px-8 py-4">
<span class="px-2 py-0.5 bg-primary-container text-on-primary-container text-[9px] font-black uppercase tracking-tighter">Current</span>
</td>
<td class="px-8 py-4 text-xs font-bold">$98,000.00</td>
<td class="px-8 py-4 text-xs font-mono font-bold text-right">18d</td>
</tr>
<tr class="hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center font-headline font-bold text-xs">FM</div>
<span class="text-xs font-bold uppercase">Forge Manufacturing Gmbh</span>
</div>
</td>
<td class="px-8 py-4 font-mono text-[11px] text-stone-500">#INV-77121-A</td>
<td class="px-8 py-4">
<span class="px-2 py-0.5 bg-error text-white text-[9px] font-black uppercase tracking-tighter">Critical</span>
</td>
<td class="px-8 py-4 text-xs font-bold">$442,150.00</td>
<td class="px-8 py-4 text-xs font-mono font-bold text-right text-error">94d</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-surface-container-highest flex items-center justify-center font-headline font-bold text-xs">PC</div>
<span class="text-xs font-bold uppercase">Precision Castings Inc</span>
</div>
</td>
<td class="px-8 py-4 font-mono text-[11px] text-stone-500">#INV-88331-Z</td>
<td class="px-8 py-4">
<span class="px-2 py-0.5 bg-stone-900 text-white text-[9px] font-black uppercase tracking-tighter">30+ Days</span>
</td>
<td class="px-8 py-4 text-xs font-bold">$21,200.00</td>
<td class="px-8 py-4 text-xs font-mono font-bold text-right">42d</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-4 bg-stone-50 border-t border-stone-100 flex justify-end">
<button class="text-[10px] font-black uppercase tracking-widest text-primary flex items-center gap-2 hover:translate-x-2 transition-transform">View Full Ledger <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span></button>
</div>
</section>
</div>
<!-- Sticky Status Footer -->
<footer class="sticky bottom-0 bg-stone-900 text-stone-400 py-2 px-6 flex justify-between items-center z-50">
<div class="flex items-center gap-4">
<div class="flex items-center gap-1.5">
<span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
<span class="text-[9px] font-bold uppercase tracking-widest">System Online</span>
</div>
<span class="text-[9px] font-bold uppercase tracking-widest opacity-50">Last Sync: 14:22:10 EST</span>
</div>
<div class="flex items-center gap-4">
<span class="text-[9px] font-bold uppercase tracking-widest">Forge Engine V2.4.1</span>
<span class="material-symbols-outlined text-sm" data-icon="terminal">terminal</span>
</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/reportes-financieros.js"></script>
</body>
</html>