<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="LA CIMA - ADMIN FORGE v2.4 | DB MANAGEMENT - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>LA CIMA - ADMIN FORGE v2.4 | DB MANAGEMENT | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/base-datos.css">
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
<main class="ml-64 mt-16 p-8 min-h-screen">
<!-- Dashboard Header -->
<div class="flex justify-between items-end mb-10">
<div>
<div class="flex items-center gap-3 mb-2">
<span class="px-2 py-0.5 bg-primary-container text-on-primary-container text-[10px] font-bold font-headline tracking-tighter uppercase">Cluster Alpha-9</span>
<span class="text-stone-400 text-xs font-headline">/ ROOT / DATABASE / MANAGEMENT</span>
</div>
<h2 class="text-5xl font-headline font-extrabold uppercase tracking-tighter text-on-surface">DB Engine Forge</h2>
</div>
<div class="flex gap-4">
<button class="bg-surface-container-high hover:bg-surface-container-highest px-6 py-3 font-headline text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm">upload_file</span> Schema Migrations
                </button>
<button class="bg-primary text-on-primary hover:opacity-90 px-6 py-3 font-headline text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm">backup</span> Global Backup
                </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6">
<!-- Quick Stats & Integrity -->
<div class="col-span-12 lg:col-span-4 grid grid-cols-1 gap-6">
<!-- Database Health Card -->
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between group">
<div class="flex justify-between items-start mb-8">
<div>
<h3 class="text-xs font-headline text-secondary uppercase tracking-[0.2em] mb-1">Engine Integrity</h3>
<p class="text-3xl font-headline font-bold text-primary tracking-tighter">99.98%</p>
</div>
<span class="material-symbols-outlined text-lime-500 text-3xl group-hover:scale-110 transition-transform">verified</span>
</div>
<div class="space-y-3">
<div class="flex justify-between items-center text-xs">
<span class="text-stone-500 font-label uppercase">Referential Checks</span>
<span class="text-on-surface font-bold">1,204 PASSED</span>
</div>
<div class="w-full bg-surface-container h-1.5 overflow-hidden">
<div class="bg-primary h-full w-[99%]"></div>
</div>
<div class="flex justify-between items-center text-xs pt-1">
<span class="text-stone-500 font-label uppercase">Foreign Key Orphans</span>
<span class="text-error font-bold">0 DETECTED</span>
</div>
</div>
</div>
<!-- Database Specs -->
<div class="bg-stone-900 text-white p-6 relative overflow-hidden">
<div class="relative z-10">
<h3 class="text-xs font-headline text-stone-500 uppercase tracking-[0.2em] mb-6">Environment Metadata</h3>
<div class="space-y-4">
<div class="flex flex-col">
<span class="text-[10px] text-lime-400 font-headline tracking-widest mb-1 uppercase">PostgreSQL Core</span>
<span class="text-lg code-font text-stone-100">v15.3.0_build82</span>
</div>
<div class="flex flex-col">
<span class="text-[10px] text-lime-400 font-headline tracking-widest mb-1 uppercase">Total Dimensions</span>
<span class="text-lg code-font text-stone-100">42 Tables / 18 Viewports</span>
</div>
<div class="flex flex-col">
<span class="text-[10px] text-lime-400 font-headline tracking-widest mb-1 uppercase">Storage Footprint</span>
<span class="text-lg code-font text-stone-100">1.84 GB</span>
</div>
</div>
</div>
<div class="absolute -right-10 -bottom-10 opacity-10">
<span class="material-symbols-outlined text-[160px]">storage</span>
</div>
</div>
</div>
<!-- Main Table Explorer -->
<div class="col-span-12 lg:col-span-8">
<div class="bg-surface-container-lowest h-full flex flex-col">
<div class="p-6 border-b border-surface-container flex justify-between items-center bg-surface-container-low">
<div class="flex items-center gap-4">
<h3 class="text-sm font-headline font-black uppercase tracking-widest">Active Schema Tables</h3>
<div class="flex items-center gap-2 bg-white px-3 py-1 text-xs border border-surface-container">
<span class="material-symbols-outlined text-sm text-stone-400">search</span>
<input class="border-none focus:ring-0 p-0 text-xs font-headline tracking-wider placeholder:text-stone-300 w-32" placeholder="FILTER BY NAME..." type="text"/>
</div>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-white transition-colors" title="Export JSON">
<span class="material-symbols-outlined text-lg">download</span>
</button>
<button class="p-2 hover:bg-white transition-colors" title="Visual Query Builder">
<span class="material-symbols-outlined text-lg">schema</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-surface-container">
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Table Name</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Fields</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Rows</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Last Sync</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">usuarios</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">id, user_uuid, auth_hash, last_ip</td>
<td class="px-6 py-4 code-font text-xs">842</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">2m ago</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-lime-100 text-lime-700 uppercase">Synced</span>
</td>
</tr>
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">productos</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">sku, part_no, stock_lvl, supplier_id</td>
<td class="px-6 py-4 code-font text-xs">15,204</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">5m ago</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-lime-100 text-lime-700 uppercase">Synced</span>
</td>
</tr>
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">ventas</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">order_id, client_fk, total, tax_v</td>
<td class="px-6 py-4 code-font text-xs">128,490</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">LIVE</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 uppercase">Writing...</span>
</td>
</tr>
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">almacen_logs</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">log_id, shelf_id, event_type, ts</td>
<td class="px-6 py-4 code-font text-xs">1.2M</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">12h ago</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-stone-200 text-stone-600 uppercase">Archived</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Visual Query Builder Section -->
<div class="col-span-12">
<div class="bg-surface-container-high p-1 border-t-4 border-stone-900">
<div class="grid grid-cols-12">
<!-- Query Sidebar -->
<div class="col-span-12 md:col-span-3 bg-white p-6 border-r border-surface-container">
<h4 class="text-xs font-headline font-bold uppercase tracking-widest mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-sm">settings_input_component</span> Node Selector
                            </h4>
<div class="space-y-3">
<div class="bg-surface-container-low p-3 border-l-2 border-primary">
<p class="text-[10px] text-stone-400 font-headline uppercase mb-1">Source Table</p>
<p class="code-font text-xs font-bold">ventas.main</p>
</div>
<div class="bg-surface p-3 flex items-center justify-between">
<span class="code-font text-xs">INNER JOIN</span>
<span class="material-symbols-outlined text-sm text-stone-300">link</span>
</div>
<div class="bg-surface-container-low p-3 border-l-2 border-primary-container">
<p class="text-[10px] text-stone-400 font-headline uppercase mb-1">Target Table</p>
<p class="code-font text-xs font-bold">usuarios.profile</p>
</div>
<div class="pt-6">
<button class="w-full bg-stone-900 text-white font-headline text-[10px] uppercase tracking-[0.2em] py-3 hover:bg-primary transition-colors">Execute Forge</button>
</div>
</div>
</div>
<!-- Visual Canvas -->
<div class="col-span-12 md:col-span-9 bg-surface p-8 relative min-h-[400px] overflow-hidden">
<div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;"></div>
<div class="flex items-center justify-center h-full relative">
<!-- Relationship Map Mockup -->
<div class="flex gap-16 items-center">
<!-- Table Node 1 -->
<div class="w-48 bg-white border border-surface-container shadow-xl">
<div class="bg-stone-900 text-white px-3 py-1 flex justify-between items-center">
<span class="code-font text-[10px] font-bold">ventas</span>
<span class="material-symbols-outlined text-xs">drag_handle</span>
</div>
<div class="p-3 space-y-2">
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-primary font-bold">id (PK)</span>
<span class="text-stone-400">INT4</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-on-surface">order_no</span>
<span class="text-stone-400">STR</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font bg-primary-container/10">
<span class="text-on-surface font-bold">client_id (FK)</span>
<span class="text-stone-400">INT4</span>
</div>
</div>
</div>
<!-- Connector Line -->
<div class="flex flex-col items-center gap-1">
<div class="h-[2px] w-16 bg-primary relative">
<div class="absolute -left-1 -top-1 w-2 h-2 bg-primary rotate-45"></div>
<div class="absolute -right-1 -top-1 w-2 h-2 bg-primary rotate-45"></div>
</div>
<span class="text-[9px] font-headline font-black bg-white px-2 border border-primary text-primary">1:N</span>
</div>
<!-- Table Node 2 -->
<div class="w-48 bg-white border border-surface-container shadow-xl">
<div class="bg-primary text-on-primary px-3 py-1 flex justify-between items-center">
<span class="code-font text-[10px] font-bold uppercase">usuarios</span>
<span class="material-symbols-outlined text-xs">drag_handle</span>
</div>
<div class="p-3 space-y-2">
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-primary font-bold">id (PK)</span>
<span class="text-stone-400">INT4</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-on-surface">full_name</span>
<span class="text-stone-400">STR</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-on-surface">email</span>
<span class="text-stone-400">STR</span>
</div>
</div>
</div>
</div>
</div>
<!-- Floating Action Overlay -->
<div class="absolute bottom-6 left-6 flex gap-2">
<button class="bg-white/90 backdrop-blur px-3 py-1.5 border border-surface-container text-[10px] font-headline font-bold uppercase tracking-widest flex items-center gap-2 hover:bg-white transition-all">
<span class="material-symbols-outlined text-sm">zoom_in</span> Focus
                                </button>
<button class="bg-white/90 backdrop-blur px-3 py-1.5 border border-surface-container text-[10px] font-headline font-bold uppercase tracking-widest flex items-center gap-2 hover:bg-white transition-all">
<span class="material-symbols-outlined text-sm">auto_graph</span> Auto-Arrange
                                </button>
</div>
</div>
</div>
</div>
</div>
<!-- Backup History & Log -->
<div class="col-span-12 lg:col-span-12">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container-lowest p-6 border-l-4 border-lime-500">
<div class="flex justify-between items-start mb-4">
<h4 class="text-xs font-headline font-bold uppercase tracking-widest">Import/Export JSON</h4>
<span class="material-symbols-outlined text-stone-300">save_alt</span>
</div>
<div class="space-y-4">
<div class="group relative bg-surface-container p-4 overflow-hidden">
<div class="relative z-10">
<p class="text-[10px] font-headline text-stone-500 mb-1 uppercase tracking-wider">Scheduled Export</p>
<p class="text-sm code-font font-bold">db_daily_full.json</p>
<p class="text-[10px] font-label text-lime-600 mt-2">AUTO-TRIGGERED 04:00 AM</p>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-6xl text-white opacity-20 group-hover:rotate-12 transition-transform">article</span>
</div>
<button class="w-full bg-surface-container-highest hover:bg-surface-dim py-3 text-[10px] font-headline font-bold uppercase tracking-[0.2em] transition-colors">Import Schema Template</button>
</div>
</div>
<div class="md:col-span-2 bg-stone-900 p-6 text-white flex flex-col">
<div class="flex justify-between items-center mb-4">
<h4 class="text-xs font-headline font-bold uppercase tracking-widest text-lime-400">Migration Pipeline Activity</h4>
<div class="flex gap-4 text-[10px] font-headline tracking-tighter uppercase">
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-lime-500"></span> 24 Success</span>
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-error"></span> 0 Critical</span>
</div>
</div>
<div class="flex-grow space-y-2 overflow-y-auto max-h-48 scrollbar-hide">
<div class="flex items-center gap-4 py-2 border-b border-stone-800">
<span class="code-font text-[10px] text-stone-500">2023-10-24 14:22:01</span>
<span class="code-font text-xs text-lime-500">MIGRATE</span>
<span class="code-font text-xs">CREATE_TABLE warehouse_slots_v2</span>
<span class="ml-auto text-[10px] font-label text-stone-600">ID: #4492</span>
</div>
<div class="flex items-center gap-4 py-2 border-b border-stone-800">
<span class="code-font text-[10px] text-stone-500">2023-10-24 11:05:44</span>
<span class="code-font text-xs text-lime-500">MIGRATE</span>
<span class="code-font text-xs">ADD_COLUMN users.preferences (JSONB)</span>
<span class="ml-auto text-[10px] font-label text-stone-600">ID: #4491</span>
</div>
<div class="flex items-center gap-4 py-2 border-b border-stone-800">
<span class="code-font text-[10px] text-stone-500">2023-10-23 23:59:59</span>
<span class="code-font text-xs text-stone-400">CLEANUP</span>
<span class="code-font text-xs">VACUUM ANALYZE FULL DATABASE</span>
<span class="ml-auto text-[10px] font-label text-stone-600">ID: #4490</span>
</div>
</div>
</div>
</div>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/base-datos.js"></script>
</body>
</html>