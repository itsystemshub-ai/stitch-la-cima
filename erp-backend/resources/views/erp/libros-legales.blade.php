<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="TRUCKPRO ERP - Libros Legales - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>TRUCKPRO ERP - Libros Legales | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/libros-legales.css">
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
<main class="ml-64 flex-1 flex flex-col min-h-screen relative overflow-hidden">
<!-- TopNavBar Anchor -->
<header class="w-full sticky top-0 z-50 bg-stone-50/80 dark:bg-stone-900/80 backdrop-blur-xl flex justify-between items-center px-8 h-16 w-full">
<div class="flex items-center gap-8">
<h1 class="font-['Space_Grotesk'] uppercase tracking-tight text-xl font-bold tracking-tighter text-stone-900 dark:text-stone-50">Libros Legales</h1>
<div class="hidden md:flex items-center bg-stone-200/50 dark:bg-stone-800/50 rounded px-3 py-1.5 gap-2">
<span class="material-symbols-outlined text-stone-400 text-sm">search</span>
<input class="bg-transparent border-none focus:ring-0 text-xs w-48 text-stone-300" placeholder="Buscar registros..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="px-4 py-1.5 bg-lime-600 text-white font-bold text-[10px] uppercase tracking-widest rounded hover:bg-lime-700 transition-all active:scale-95">
                    Legal Alert
                </button>
<div class="flex items-center gap-2 text-stone-500">
<span class="material-symbols-outlined hover:text-lime-400 cursor-pointer transition-colors">notifications</span>
<span class="material-symbols-outlined hover:text-lime-400 cursor-pointer transition-colors">settings</span>
<span class="material-symbols-outlined hover:text-lime-400 cursor-pointer transition-colors">account_circle</span>
</div>
</div>
</header>
<!-- Content Content -->
<section class="p-8 space-y-8 max-w-7xl mx-auto w-full">
<!-- Hero Identity Branding -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end">
<div class="md:col-span-2">
<div class="flex items-center gap-4 mb-2">
<div class="h-[2px] w-12 bg-lime-600"></div>
<span class="text-lime-500 font-headline uppercase tracking-widest text-xs font-bold">Compliance Generator v4.2</span>
</div>
<h2 class="text-5xl font-headline font-bold text-white uppercase leading-none tracking-tighter">
                        MAYOR DE REPUESTO LA CIMA, C.A.
                    </h2>
<p class="text-stone-500 mt-4 max-w-xl font-body text-sm leading-relaxed">
                        Precision reporting module for SENIAT industrial compliance. Ensure all fiscal books are generated according to regional tax authority standards with validated digital signatures.
                    </p>
</div>
<div class="bg-surface-container-low dark:bg-stone-900/50 p-6 rounded-lg border-l-4 border-lime-600">
<div class="flex justify-between items-start mb-4">
<span class="material-symbols-outlined text-lime-400">calendar_month</span>
<span class="text-[10px] bg-lime-600/20 text-lime-400 px-2 py-0.5 rounded font-bold">ACTIVE FISCAL</span>
</div>
<h4 class="text-stone-400 text-xs font-bold uppercase tracking-widest">Current Fiscal Month</h4>
<p class="text-2xl font-headline font-bold text-white uppercase tracking-tight">OCTUBRE 2023</p>
<button class="w-full mt-4 py-2 bg-error text-white font-headline text-xs font-bold uppercase tracking-widest hover:brightness-110 transition-all active:scale-95">
                        Close Fiscal Month
                    </button>
</div>
</div>
<!-- Configuration Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
<!-- Generator Controls -->
<div class="lg:col-span-4 space-y-6">
<div class="bg-stone-900 border border-stone-800 p-6 space-y-6">
<h3 class="font-headline font-bold text-white uppercase tracking-widest text-sm flex items-center gap-2">
<span class="material-symbols-outlined text-lime-400">settings_input_component</span>
                            Export Parameters
                        </h3>
<div class="space-y-4">
<div class="space-y-2">
<label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Date Range Selection</label>
<div class="grid grid-cols-2 gap-2">
<div class="bg-stone-800 p-3 rounded">
<p class="text-[9px] text-stone-500 uppercase mb-1">Start Date</p>
<input class="bg-transparent border-none text-white text-xs w-full p-0 focus:ring-0" type="date" value="2023-10-01"/>
</div>
<div class="bg-stone-800 p-3 rounded">
<p class="text-[9px] text-stone-500 uppercase mb-1">End Date</p>
<input class="bg-transparent border-none text-white text-xs w-full p-0 focus:ring-0" type="date" value="2023-10-31"/>
</div>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Document Type</label>
<div class="space-y-2">
<label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group">
<span class="text-xs text-stone-300 font-medium">Libro Diario</span>
<input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
</label>
<label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group">
<span class="text-xs text-stone-300 font-medium">Libro Mayor</span>
<input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
</label>
<label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group">
<span class="text-xs text-stone-300 font-medium">Libro de Inventarios</span>
<input class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
</label>
<label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group">
<span class="text-xs text-stone-300 font-medium">Libro de Compras (IVA)</span>
<input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
</label>
<label class="flex items-center justify-between p-3 bg-stone-800 hover:bg-stone-700/50 transition-colors cursor-pointer group">
<span class="text-xs text-stone-300 font-medium">Libro de Ventas (IVA)</span>
<input checked="" class="rounded border-stone-600 text-lime-600 focus:ring-lime-600 bg-stone-900" type="checkbox"/>
</label>
</div>
</div>
</div>
<button class="w-full py-4 bg-primary text-white font-headline text-sm font-bold uppercase tracking-[0.2em] shadow-lg shadow-lime-900/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3">
<span class="material-symbols-outlined">print_connect</span>
                            Generate Books
                        </button>
</div>
</div>
<!-- Generation History Table -->
<div class="lg:col-span-8">
<div class="bg-stone-900/30 border border-stone-800/50 rounded overflow-hidden">
<div class="px-6 py-4 border-b border-stone-800 flex justify-between items-center">
<h3 class="font-headline font-bold text-white uppercase tracking-widest text-sm">Recent Activity Log</h3>
<div class="flex gap-2">
<span class="bg-stone-800 text-stone-400 px-2 py-1 rounded text-[10px] font-bold">12 RECORDS FOUND</span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body">
<thead class="bg-stone-800/50">
<tr>
<th class="px-6 py-3 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Timestamp</th>
<th class="px-6 py-3 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Document Title</th>
<th class="px-6 py-3 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Fiscal Period</th>
<th class="px-6 py-3 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Compliance Status</th>
<th class="px-6 py-3 text-[10px] font-bold text-stone-500 uppercase tracking-widest">Digital Auth</th>
<th class="px-6 py-3 text-right"></th>
</tr>
</thead>
<tbody class="divide-y divide-stone-800">
<!-- Row 1 -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-4">
<p class="text-xs text-white font-medium">2023-10-28</p>
<p class="text-[10px] text-stone-500 uppercase">14:22:15 PM</p>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-lime-600 text-lg">description</span>
<p class="text-xs text-white font-bold uppercase">Libro Diario</p>
</div>
</td>
<td class="px-6 py-4 text-[11px] text-stone-400">OCT-23</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                                Validated
                                            </span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-600/10 text-blue-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                                                Signed
                                            </span>
</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-4">
<p class="text-xs text-white font-medium">2023-10-28</p>
<p class="text-[10px] text-stone-500 uppercase">14:22:10 PM</p>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-lime-600 text-lg">folder_shared</span>
<p class="text-xs text-white font-bold uppercase">Libro Mayor</p>
</div>
</td>
<td class="px-6 py-4 text-[11px] text-stone-400">OCT-23</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                                Validated
                                            </span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-600/10 text-blue-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                                                Signed
                                            </span>
</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-4">
<p class="text-xs text-white font-medium">2023-09-30</p>
<p class="text-[10px] text-stone-500 uppercase">18:05:22 PM</p>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-lime-600 text-lg">shopping_cart</span>
<p class="text-xs text-white font-bold uppercase">Libro de Compras</p>
</div>
</td>
<td class="px-6 py-4 text-[11px] text-stone-400">SEP-23</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                                Validated
                                            </span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-stone-700 text-stone-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]">lock</span>
                                                Pending Signature
                                            </span>
</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-4">
<p class="text-xs text-white font-medium">2023-09-30</p>
<p class="text-[10px] text-stone-500 uppercase">18:04:11 PM</p>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-lime-600 text-lg">sell</span>
<p class="text-xs text-white font-bold uppercase">Libro de Ventas</p>
</div>
</td>
<td class="px-6 py-4 text-[11px] text-stone-400">SEP-23</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-lime-600/10 text-lime-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                                Validated
                                            </span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-stone-700 text-stone-400 text-[9px] font-black uppercase tracking-tighter">
<span class="material-symbols-outlined text-[10px]">lock</span>
                                                Pending Signature
                                            </span>
</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-stone-500 hover:text-white transition-colors">download</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Dashboard Footnote & Map Mockup -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
<div class="relative min-h-[300px] overflow-hidden group bg-stone-900 border border-stone-800 rounded">
<img class="absolute inset-0 w-full h-full object-cover opacity-30 grayscale group-hover:scale-110 transition-transform duration-700" data-alt="industrial heavy warehouse with rows of metal shelving and professional logistics lighting, dark aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0eIaJLIqmWhvDUbWOTgQy82wcadTEPV_V9axH1q0YmHgqteQw13KN74NTdbE36ZYUuyv47M1TpZq1EcfF-OvC8a3EBGvYpg1w5VjFk3lSBj0roE3fYtERq2EY_Cy8Cs-ZxVlCZ2JIG0Hn1fKw1dWyxlJS_3DnsVdXC7Nqc_YkQgPMO5uKgVP_bBwHdzFbmR7nhLV4FWSE98hpg1-BvaGLz2DipR-y2UFS8nb9PwgIsI3c3lHJJp0jjEX-QY99cyEoTsZFVDVB0bM"/>
<div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
<div class="absolute bottom-0 left-0 p-8">
<span class="bg-lime-600 text-white px-3 py-1 text-[10px] font-bold uppercase tracking-widest mb-4 inline-block">Operation Status</span>
<h4 class="text-2xl font-headline font-bold text-white uppercase tracking-tight">Active Inventory sync</h4>
<p class="text-sm text-stone-400 mt-2 max-w-sm">Global stock databases are currently synced with local SENIAT legal records. Real-time updates active.</p>
</div>
</div>
<div class="bg-stone-950 p-8 border border-stone-900 relative overflow-hidden flex flex-col justify-between">
<div class="space-y-4">
<h4 class="text-xs font-bold text-stone-500 uppercase tracking-[0.3em]">Compliance Map</h4>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-lime-400">location_on</span>
<span class="text-white font-headline text-lg uppercase tracking-widest">Valencia, Venezuela</span>
</div>
<div class="w-full h-40 bg-stone-900 rounded relative overflow-hidden">
<img alt="Map Location" class="w-full h-full object-cover opacity-40 grayscale" data-alt="abstract satellite view of an industrial city grid in monochrome black and white high contrast" data-location="Valencia, Venezuela" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA77R_c6-kNY8OEIBzPeVbFdefPWhRkDcApyLnOZw8ScojxOCrNOZ2SdU5Kp5SmElSiuyS5yfCSzi8ZgB5pHJpX6oJUpxBuocXyjgTPyXqX2VZZj5mu2e-NLA5JHBGisdZHK3XX2xOCNc46NgF6tCNjbgN9Inqe-_5I08IeihWzfFVQBEhHpHpev67J6WjmkAMUQNLC7wgfISec5bTWNkgIgvAn_yRviobrZBIDJGkuSO0_gHlIzH5XJft7CYpkEpusYiR0MpUvhB4"/>
<div class="absolute inset-0 flex items-center justify-center">
<div class="w-4 h-4 bg-lime-600 rounded-full animate-ping"></div>
<div class="w-2 h-2 bg-lime-400 rounded-full absolute"></div>
</div>
</div>
</div>
<div class="pt-6 flex justify-between items-end border-t border-stone-800">
<div>
<p class="text-[10px] text-stone-500 font-bold uppercase">Legal Entity RIF</p>
<p class="text-white font-headline font-bold tracking-widest">J-12345678-9</p>
</div>
<span class="material-symbols-outlined text-stone-700 text-4xl">factory</span>
</div>
</div>
</div>
</section>
<!-- Signature Visual Element -->
<div class="absolute -bottom-24 -right-24 w-96 h-96 bg-lime-600/5 rounded-full blur-[100px] pointer-events-none"></div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/libros-legales.js"></script>
</body>
</html>