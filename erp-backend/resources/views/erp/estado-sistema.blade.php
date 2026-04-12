<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="INDUSTRIAL FORGE ERP - System Status - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>INDUSTRIAL FORGE ERP - System Status | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/estado-sistema.css">
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
<main class="ml-64 min-h-screen">
<!-- TopAppBar (Authority: JSON) -->
<header class="fixed top-0 right-0 left-64 z-50 bg-white/80 dark:bg-stone-950/80 backdrop-blur-xl flex justify-between items-center px-8 py-3">
<div class="flex items-center gap-8">
<span class="font-['Space_Grotesk'] uppercase tracking-tight font-bold text-stone-900 dark:text-white">INDUSTRIAL FORGE ERP</span>
<nav class="hidden md:flex gap-6">
<a class="text-stone-500 dark:text-stone-400 font-medium hover:text-lime-500 dark:hover:text-lime-300 transition-colors uppercase text-xs tracking-widest" href="#">Dashboard</a>
<a class="text-stone-500 dark:text-stone-400 font-medium hover:text-lime-500 dark:hover:text-lime-300 transition-colors uppercase text-xs tracking-widest" href="#">Analytics</a>
<a class="text-stone-500 dark:text-stone-400 font-medium hover:text-lime-500 dark:hover:text-lime-300 transition-colors uppercase text-xs tracking-widest" href="#">Support</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center bg-stone-100 dark:bg-stone-900 px-4 py-1.5 rounded-sm">
<span class="material-symbols-outlined text-stone-500 text-lg mr-2">search</span>
<input class="bg-transparent border-none focus:ring-0 text-[10px] tracking-widest uppercase text-stone-400 w-48" placeholder="SEARCH SYSTEM..." type="text"/>
</div>
<div class="flex gap-2">
<span class="material-symbols-outlined text-stone-500 hover:text-white cursor-pointer p-2">notifications</span>
<span class="material-symbols-outlined text-stone-500 hover:text-white cursor-pointer p-2">settings</span>
<span class="material-symbols-outlined text-stone-500 hover:text-white cursor-pointer p-2">help</span>
</div>
<img alt="User Profile Avatar" class="w-8 h-8 rounded-sm object-cover" data-alt="professional male engineer portrait in workshop environment with dramatic industrial lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYE_ou131N3gmEkKpEI_NAAEAQtDWLZK_118lJkk_H9mJHwoC9y1N2PZNG_PVjZnsoMfF69r72PIUYreDazyN1GctYqeKE7unt-04n9dN45a8YuQpIT_WIVRI48E3n3Kkcj_sPBH4AgFw3ig-bFCnPYxlBHMTZo-T1JVYbUYtWwtSAWt00FBcTiQwtS_RZnrXwNopzOhQVwFG-hUh-BJkWCsqgzf1lgqG8DGpGGyuebA21wOnTUBZ5Qf679Nza0l8NpvmYpPrdmak"/>
</div>
</header>
<!-- Page Content -->
<section class="pt-24 px-12 pb-16">
<!-- Hero Status -->
<div class="relative overflow-hidden mb-12 bg-surface-container-lowest dark:bg-stone-900/50 p-12 rounded-sm border-l-4 border-lime-500">
<div class="absolute top-0 right-0 p-8 opacity-10">
<span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1;">power_settings_new</span>
</div>
<div class="relative z-10">
<p class="font-label text-xs tracking-[0.3em] text-primary uppercase mb-2">Operational Health Indicator</p>
<h2 class="font-headline text-5xl font-black uppercase tracking-tighter mb-4 text-stone-900 dark:text-white">All Systems: <span class="text-primary">Nominal</span></h2>
<div class="flex items-center gap-6 mt-8">
<div class="flex flex-col">
<span class="text-[10px] uppercase tracking-widest text-stone-500 mb-1">Uptime (30d)</span>
<span class="font-headline text-2xl font-bold text-stone-900 dark:text-white">99.98%</span>
</div>
<div class="w-px h-10 bg-stone-800"></div>
<div class="flex flex-col">
<span class="text-[10px] uppercase tracking-widest text-stone-500 mb-1">Avg Latency</span>
<span class="font-headline text-2xl font-bold text-stone-900 dark:text-white">42ms</span>
</div>
<div class="ml-auto">
<button class="bg-error hover:bg-error/90 text-white font-bold py-4 px-8 flex items-center gap-3 transition-transform active:scale-95 group">
<span class="material-symbols-outlined group-hover:rotate-12 transition-transform">report_problem</span>
<span class="uppercase tracking-widest text-xs">Incident Report</span>
</button>
</div>
</div>
</div>
</div>
<!-- Bento Status Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
<!-- Module: Inventory -->
<div class="bg-surface-container-lowest dark:bg-stone-900 p-6 rounded-sm flex flex-col justify-between group hover:bg-stone-800 transition-colors">
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-stone-500 group-hover:text-primary">inventory_2</span>
<div class="h-2 w-2 rounded-full bg-primary animate-pulse"></div>
</div>
<div>
<h3 class="font-headline text-lg font-bold uppercase tracking-tight text-white">Inventario</h3>
<p class="text-[10px] uppercase tracking-widest text-stone-500">Last Synced: 2m ago</p>
</div>
</div>
<!-- Module: Sales -->
<div class="bg-surface-container-lowest dark:bg-stone-900 p-6 rounded-sm flex flex-col justify-between group hover:bg-stone-800 transition-colors">
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-stone-500 group-hover:text-primary">point_of_sale</span>
<div class="h-2 w-2 rounded-full bg-primary"></div>
</div>
<div>
<h3 class="font-headline text-lg font-bold uppercase tracking-tight text-white">Ventas</h3>
<p class="text-[10px] uppercase tracking-widest text-stone-500">Live Transaction Stream</p>
</div>
</div>
<!-- Module: Logistics (Yellow State) -->
<div class="bg-surface-container-lowest dark:bg-stone-900 p-6 rounded-sm border-b-2 border-amber-500 flex flex-col justify-between group hover:bg-stone-800 transition-colors">
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-amber-500">local_shipping</span>
<div class="h-2 w-2 rounded-full bg-amber-500"></div>
</div>
<div>
<h3 class="font-headline text-lg font-bold uppercase tracking-tight text-white">Logística</h3>
<p class="text-[10px] uppercase tracking-widest text-amber-500">High Latency Detected</p>
</div>
</div>
<!-- Module: Finance -->
<div class="bg-surface-container-lowest dark:bg-stone-900 p-6 rounded-sm flex flex-col justify-between group hover:bg-stone-800 transition-colors">
<div class="flex justify-between items-start mb-8">
<span class="material-symbols-outlined text-stone-500 group-hover:text-primary">payments</span>
<div class="h-2 w-2 rounded-full bg-primary"></div>
</div>
<div>
<h3 class="font-headline text-lg font-bold uppercase tracking-tight text-white">Finanzas</h3>
<p class="text-[10px] uppercase tracking-widest text-stone-500">Secure Ledger Verified</p>
</div>
</div>
</div>
<!-- Detailed Logs & Maintenance -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Maintenance Log (Authority: Editorial Table) -->
<div class="lg:col-span-2">
<div class="flex justify-between items-end mb-6">
<h3 class="font-headline text-2xl font-black uppercase tracking-tighter text-white">Maintenance History</h3>
<span class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-500">Audit Trail v2.4</span>
</div>
<div class="bg-stone-900 overflow-hidden">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-950 border-b border-stone-800">
<th class="p-4 text-[10px] uppercase tracking-widest font-bold text-stone-400">Date/Time</th>
<th class="p-4 text-[10px] uppercase tracking-widest font-bold text-stone-400">Module/System</th>
<th class="p-4 text-[10px] uppercase tracking-widest font-bold text-stone-400">Action Type</th>
<th class="p-4 text-[10px] uppercase tracking-widest font-bold text-stone-400">Technician</th>
<th class="p-4 text-[10px] uppercase tracking-widest font-bold text-stone-400">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-800">
<tr class="hover:bg-stone-800 transition-colors">
<td class="p-4 font-label text-xs text-stone-300">2023-10-24 04:00</td>
<td class="p-4 font-label text-xs text-stone-100 font-bold">Main DB Cluster</td>
<td class="p-4 font-label text-xs text-stone-400 italic">Scheduled Optimization</td>
<td class="p-4 font-label text-xs text-stone-300 uppercase">SYS-ADM-01</td>
<td class="p-4">
<span class="text-[9px] font-bold uppercase tracking-widest bg-lime-500/10 text-lime-400 px-2 py-1">Success</span>
</td>
</tr>
<tr class="hover:bg-stone-800 transition-colors">
<td class="p-4 font-label text-xs text-stone-300">2023-10-22 18:15</td>
<td class="p-4 font-label text-xs text-stone-100 font-bold">API Gateway</td>
<td class="p-4 font-label text-xs text-stone-400 italic">Emergency Hotfix</td>
<td class="p-4 font-label text-xs text-stone-300 uppercase">DEV-SEC-09</td>
<td class="p-4">
<span class="text-[9px] font-bold uppercase tracking-widest bg-lime-500/10 text-lime-400 px-2 py-1">Success</span>
</td>
</tr>
<tr class="hover:bg-stone-800 transition-colors">
<td class="p-4 font-label text-xs text-stone-300">2023-10-21 02:00</td>
<td class="p-4 font-label text-xs text-stone-100 font-bold">Inventario Node</td>
<td class="p-4 font-label text-xs text-stone-400 italic">Hardware Migration</td>
<td class="p-4 font-label text-xs text-stone-300 uppercase">INF-OPS-04</td>
<td class="p-4">
<span class="text-[9px] font-bold uppercase tracking-widest bg-stone-700 text-stone-300 px-2 py-1">Deferred</span>
</td>
</tr>
<tr class="hover:bg-stone-800 transition-colors">
<td class="p-4 font-label text-xs text-stone-300">2023-10-18 11:30</td>
<td class="p-4 font-label text-xs text-stone-100 font-bold">RRHH Portal</td>
<td class="p-4 font-label text-xs text-stone-400 italic">Security Patch 8.1</td>
<td class="p-4 font-label text-xs text-stone-300 uppercase">AUT-SYS-01</td>
<td class="p-4">
<span class="text-[9px] font-bold uppercase tracking-widest bg-lime-500/10 text-lime-400 px-2 py-1">Success</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Live Performance Visualizer -->
<div>
<h3 class="font-headline text-2xl font-black uppercase tracking-tighter text-white mb-6">Traffic Load</h3>
<div class="bg-stone-900 p-8 rounded-sm h-[320px] flex flex-col justify-end">
<div class="flex items-end gap-1 h-full mb-4">
<div class="flex-1 bg-stone-800 h-[20%]"></div>
<div class="flex-1 bg-stone-800 h-[35%]"></div>
<div class="flex-1 bg-stone-800 h-[45%]"></div>
<div class="flex-1 bg-stone-800 h-[30%]"></div>
<div class="flex-1 bg-stone-800 h-[60%]"></div>
<div class="flex-1 bg-primary h-[85%]"></div>
<div class="flex-1 bg-primary h-[95%]"></div>
<div class="flex-1 bg-primary h-[75%]"></div>
<div class="flex-1 bg-stone-800 h-[40%]"></div>
<div class="flex-1 bg-stone-800 h-[25%]"></div>
<div class="flex-1 bg-stone-800 h-[35%]"></div>
<div class="flex-1 bg-stone-800 h-[50%]"></div>
</div>
<div class="flex justify-between items-center pt-4 border-t border-stone-800">
<div>
<p class="text-[9px] uppercase tracking-widest text-stone-500">Peak Load</p>
<p class="font-headline text-lg font-bold text-white">842 req/s</p>
</div>
<span class="material-symbols-outlined text-primary">analytics</span>
</div>
</div>
</div>
</div>
<!-- Maintenance Schedule -->
<div class="mt-12">
<div class="bg-primary/5 p-8 border border-primary/20 flex flex-col md:flex-row items-center gap-8">
<div class="flex-1">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined text-primary">calendar_clock</span>
<span class="uppercase tracking-widest text-[10px] font-bold text-primary">Upcoming Window</span>
</div>
<h4 class="font-headline text-2xl font-black uppercase text-white">Core Engine Upgrade - v3.0 Staging</h4>
</div>
<div class="flex flex-col items-center px-8 border-x border-stone-800">
<span class="text-[10px] uppercase tracking-widest text-stone-500">Days Remaining</span>
<span class="font-headline text-4xl font-black text-white">04</span>
</div>
<div class="flex-1 text-right">
<p class="text-stone-400 text-xs mb-4">Scheduled for Saturday, Oct 28 at 02:00 AM UTC. Expected downtime: 15 minutes.</p>
<button class="text-primary hover:text-white transition-colors uppercase text-[10px] font-bold tracking-widest border-b border-primary pb-1">Review Technical Blueprint</button>
</div>
</div>
</div>
</section>
<!-- Industrial Footer -->
<footer class="bg-stone-950 px-12 py-16 mt-auto">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
<div class="col-span-1 md:col-span-2">
<h5 class="font-headline text-3xl font-black uppercase tracking-tighter text-white mb-6">FORGE<span class="text-primary">SYSTEMS</span></h5>
<p class="text-stone-500 text-sm max-w-md leading-relaxed">
                        The definitive operating system for modern heavy-duty manufacturing. Built for the grit of the shop floor and the precision of the executive suite.
                    </p>
</div>
<div>
<h6 class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-400 mb-6">Contact Control</h6>
<ul class="space-y-3 text-stone-500 text-xs font-semibold uppercase tracking-widest">
<li><a class="hover:text-primary" href="#">Tech Support Hot-Line</a></li>
<li><a class="hover:text-primary" href="#">Regional Data Centers</a></li>
<li><a class="hover:text-primary" href="#">Security Protocols</a></li>
</ul>
</div>
<div>
<h6 class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-400 mb-6">Location Authority</h6>
<p class="text-stone-500 text-xs font-semibold uppercase tracking-widest leading-loose">
                        Unit 412, Ironclad Industrial Estate<br/>
                        Sheffield, United Kingdom<br/>
                        S9 2TW
                    </p>
</div>
</div>
<div class="pt-12 border-t border-stone-900 flex justify-between items-center">
<span class="text-[9px] uppercase tracking-[0.3em] text-stone-600">© 2023 INDUSTRIAL FORGE ERP. ALL CORE RIGHTS RESERVED.</span>
<div class="flex gap-8">
<span class="text-[9px] uppercase tracking-[0.3em] text-stone-600 hover:text-white cursor-pointer">PRIVACY_SHIELD</span>
<span class="text-[9px] uppercase tracking-[0.3em] text-stone-600 hover:text-white cursor-pointer">SERVICE_SLA</span>
<span class="text-[9px] uppercase tracking-[0.3em] text-stone-600 hover:text-white cursor-pointer">ISO_27001</span>
</div>
</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/estado-sistema.js"></script>
</body>
</html>