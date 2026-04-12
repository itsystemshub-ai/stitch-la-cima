<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="TITAN INDUSTRIAL - Registro Histórico de Facturas - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>TITAN INDUSTRIAL - Registro Histórico de Facturas | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/facturas-emitidas.css">
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
<main class="ml-64 min-h-screen bg-surface">
<!-- TopNavBar Shell -->
<header class="bg-stone-50/80 dark:bg-stone-900/80 backdrop-blur-xl flex justify-between items-center w-full px-6 h-16 sticky top-0 z-40">
<div class="flex items-center gap-8">
<h2 class="font-['Space_Grotesk'] tracking-tight uppercase text-xl font-bold tracking-tighter text-stone-900 dark:text-stone-50">REGISTRO HISTÓRICO</h2>
<div class="relative hidden lg:block">
<span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-sm" data-icon="search">search</span>
<input class="bg-surface-container-highest border-none rounded-sm py-1.5 pl-9 pr-4 text-xs w-64 focus:ring-2 focus:ring-primary transition-all" placeholder="Buscar factura o cliente..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-stone-500 hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors rounded">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-stone-500 hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors rounded">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="h-8 w-8 rounded-full bg-stone-200 overflow-hidden ml-2">
<img alt="User profile" data-alt="professional male portrait for user profile in high-end industrial software interface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbXLcVMQbeupxzelt4BVAX0W-gazqyzO0uZk24E5OcEYmxmKI0jHPoJQhOyfBc0I31QcgDkLRuu2xqLeOkr1Jkqe8b_Q9MS_vniL5bA3Xrkf-2Ju0btzE736bF7b298BNtR4tZQSY5rDy1mcvi-ovGblXc0S5kW9UcC6PvlDjXYTx9YSlJ-aFAMqtAmfbVZb5-t4diQ0mr26xUAQoeOd20PtWsmsMJgGSh0K5qIdx6JlAkePjksdd4hhywBgLHYMdo2kHYlGaICP8"/>
</div>
</div>
</header>
<!-- View Content -->
<div class="p-8">
<!-- Filters & Actions Bar -->
<div class="mb-8 flex flex-col md:flex-row md:items-end gap-6 bg-surface-container-low p-6 rounded-lg relative overflow-hidden">
<div class="absolute right-0 top-0 w-1/3 h-full opacity-5 pointer-events-none">
<div class="absolute inset-0 bg-gradient-to-l from-primary to-transparent"></div>
</div>
<div class="flex-1 space-y-2">
<label class="block text-[10px] font-bold uppercase tracking-widest text-stone-500">Rango de Fecha</label>
<div class="flex gap-2">
<input class="bg-surface-container-lowest border-none rounded px-3 py-2 text-sm w-full focus:ring-1 focus:ring-primary shadow-sm" type="date"/>
<span class="self-center text-stone-400">/</span>
<input class="bg-surface-container-lowest border-none rounded px-3 py-2 text-sm w-full focus:ring-1 focus:ring-primary shadow-sm" type="date"/>
</div>
</div>
<div class="flex-1 space-y-2">
<label class="block text-[10px] font-bold uppercase tracking-widest text-stone-500">Filtrar por Cliente</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-sm" data-icon="person">person</span>
<input class="bg-surface-container-lowest border-none rounded pl-10 pr-3 py-2 text-sm w-full focus:ring-1 focus:ring-primary shadow-sm" placeholder="Nombre o RIF..." type="text"/>
</div>
</div>
<div class="flex items-center gap-3">
<button class="bg-stone-900 text-white px-6 py-2 rounded text-xs font-bold uppercase tracking-widest hover:bg-black transition-colors flex items-center gap-2 h-[38px]">
<span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                        Aplicar
                    </button>
<button class="bg-surface-container-high text-stone-700 px-4 py-2 rounded text-xs font-bold uppercase tracking-widest hover:bg-stone-300 transition-colors h-[38px]">
<span class="material-symbols-outlined text-sm" data-icon="refresh">refresh</span>
</button>
</div>
</div>
<!-- Summary Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-surface-container-lowest p-5 rounded border-l-4 border-lime-500">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Total Facturado</p>
<p class="text-2xl font-['Space_Grotesk'] font-bold text-stone-900">$284,930.00</p>
<p class="text-[10px] text-lime-600 font-bold mt-2 flex items-center gap-1">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span> +12% este mes
                    </p>
</div>
<div class="bg-surface-container-lowest p-5 rounded border-l-4 border-stone-300">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Facturas Emitidas</p>
<p class="text-2xl font-['Space_Grotesk'] font-bold text-stone-900">1,248</p>
</div>
<div class="bg-surface-container-lowest p-5 rounded border-l-4 border-red-500">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Anuladas</p>
<p class="text-2xl font-['Space_Grotesk'] font-bold text-stone-900">12</p>
<p class="text-[10px] text-red-600 font-bold mt-2">0.9% del total</p>
</div>
<div class="bg-surface-container-lowest p-5 rounded border-l-4 border-primary">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Impuestos Retenidos</p>
<p class="text-2xl font-['Space_Grotesk'] font-bold text-stone-900">$45,588.80</p>
</div>
</div>
<!-- High Density Table Container -->
<div class="bg-surface-container-lowest rounded overflow-hidden shadow-sm">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-100/50 border-b border-stone-200">
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Fecha</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Nro Control</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Cliente</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">RIF</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500 text-right">Base Imp.</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500 text-right">IVA (16%)</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500 text-right">Total</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500 text-center">Estatus</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500 text-center">Acciones</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-100">
<!-- Row 1 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-4 text-xs font-medium text-stone-600">24/05/2024</td>
<td class="px-6 py-4 text-xs font-bold text-stone-900 font-['Space_Grotesk']">F-0001824</td>
<td class="px-6 py-4 text-xs font-semibold text-stone-800">Aceros del Orinoco C.A.</td>
<td class="px-6 py-4 text-xs text-stone-500">J-30456214-0</td>
<td class="px-6 py-4 text-xs text-right font-mono">$12,450.00</td>
<td class="px-6 py-4 text-xs text-right font-mono">$1,992.00</td>
<td class="px-6 py-4 text-xs text-right font-bold text-stone-900 font-mono">$14,442.00</td>
<td class="px-6 py-4 text-center">
<span class="px-2 py-1 rounded-sm bg-lime-100 text-lime-700 text-[9px] font-black uppercase tracking-tighter">Vigente</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-center gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-600 transition-colors" title="Ver PDF">
<span class="material-symbols-outlined text-lg" data-icon="picture_as_pdf">picture_as_pdf</span>
</button>
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-600 transition-colors" title="Imprimir">
<span class="material-symbols-outlined text-lg" data-icon="print">print</span>
</button>
<button class="p-1.5 rounded hover:bg-red-50 text-red-600 transition-colors" title="Anular">
<span class="material-symbols-outlined text-lg" data-icon="block">block</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-4 text-xs font-medium text-stone-600">23/05/2024</td>
<td class="px-6 py-4 text-xs font-bold text-stone-900 font-['Space_Grotesk']">F-0001823</td>
<td class="px-6 py-4 text-xs font-semibold text-stone-800">Suministros Industriales 2000</td>
<td class="px-6 py-4 text-xs text-stone-500">J-29877452-1</td>
<td class="px-6 py-4 text-xs text-right font-mono">$4,200.00</td>
<td class="px-6 py-4 text-xs text-right font-mono">$672.00</td>
<td class="px-6 py-4 text-xs text-right font-bold text-stone-900 font-mono">$4,872.00</td>
<td class="px-6 py-4 text-center">
<span class="px-2 py-1 rounded-sm bg-lime-100 text-lime-700 text-[9px] font-black uppercase tracking-tighter">Vigente</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-center gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-600 transition-colors" title="Ver PDF">
<span class="material-symbols-outlined text-lg" data-icon="picture_as_pdf">picture_as_pdf</span>
</button>
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-600 transition-colors" title="Imprimir">
<span class="material-symbols-outlined text-lg" data-icon="print">print</span>
</button>
<button class="p-1.5 rounded hover:bg-red-50 text-red-600 transition-colors" title="Anular">
<span class="material-symbols-outlined text-lg" data-icon="block">block</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 (Anulada) -->
<tr class="bg-red-50/20 hover:bg-red-50 transition-colors group">
<td class="px-6 py-4 text-xs font-medium text-stone-400">23/05/2024</td>
<td class="px-6 py-4 text-xs font-bold text-stone-400 font-['Space_Grotesk'] line-through">F-0001822</td>
<td class="px-6 py-4 text-xs font-semibold text-stone-400">Constructora El Faro</td>
<td class="px-6 py-4 text-xs text-stone-400">J-41123300-8</td>
<td class="px-6 py-4 text-xs text-right font-mono text-stone-400">$8,900.00</td>
<td class="px-6 py-4 text-xs text-right font-mono text-stone-400">$1,424.00</td>
<td class="px-6 py-4 text-xs text-right font-bold text-stone-400 font-mono">$10,324.00</td>
<td class="px-6 py-4 text-center">
<span class="px-2 py-1 rounded-sm bg-red-100 text-red-700 text-[9px] font-black uppercase tracking-tighter">Anulada</span>
</td>
<td class="px-6 py-4 text-center">
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-400 transition-colors" title="Ver Log de Anulación">
<span class="material-symbols-outlined text-lg" data-icon="info">info</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-4 text-xs font-medium text-stone-600">22/05/2024</td>
<td class="px-6 py-4 text-xs font-bold text-stone-900 font-['Space_Grotesk']">F-0001821</td>
<td class="px-6 py-4 text-xs font-semibold text-stone-800">Logística Global S.A.</td>
<td class="px-6 py-4 text-xs text-stone-500">J-00122455-9</td>
<td class="px-6 py-4 text-xs text-right font-mono">$45,000.00</td>
<td class="px-6 py-4 text-xs text-right font-mono">$7,200.00</td>
<td class="px-6 py-4 text-xs text-right font-bold text-stone-900 font-mono">$52,200.00</td>
<td class="px-6 py-4 text-center">
<span class="px-2 py-1 rounded-sm bg-lime-100 text-lime-700 text-[9px] font-black uppercase tracking-tighter">Vigente</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-center gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-600 transition-colors" title="Ver PDF">
<span class="material-symbols-outlined text-lg" data-icon="picture_as_pdf">picture_as_pdf</span>
</button>
<button class="p-1.5 rounded hover:bg-stone-200 text-stone-600 transition-colors" title="Imprimir">
<span class="material-symbols-outlined text-lg" data-icon="print">print</span>
</button>
<button class="p-1.5 rounded hover:bg-red-50 text-red-600 transition-colors" title="Anular">
<span class="material-symbols-outlined text-lg" data-icon="block">block</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="bg-stone-50 px-6 py-4 border-t border-stone-200 flex items-center justify-between">
<p class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Mostrando 1 a 25 de 1,248 facturas</p>
<div class="flex gap-1">
<button class="p-1 rounded bg-stone-200 text-stone-600 hover:bg-stone-300 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="px-3 py-1 rounded bg-primary text-on-primary text-[10px] font-bold">1</button>
<button class="px-3 py-1 rounded bg-stone-200 text-stone-600 text-[10px] font-bold hover:bg-stone-300">2</button>
<button class="px-3 py-1 rounded bg-stone-200 text-stone-600 text-[10px] font-bold hover:bg-stone-300">3</button>
<button class="p-1 rounded bg-stone-200 text-stone-600 hover:bg-stone-300 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Additional Context Footer -->
<div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 items-center border-t border-stone-200 pt-8">
<div class="relative group cursor-pointer overflow-hidden rounded-lg">
<img class="w-full h-40 object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-105 group-hover:scale-100" data-alt="industrial warehouse interior with steel structures and precision machinery in a clean engineering environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCVY1zYC4PafKnqVJPrIU_t0NAo7bjoDdk-q6XQElOE7LaeoQZkgITyHOuTZ8BznLVNF6sLoyJejyNi6QojYupY6wLBXYwnVVKbJTgyRrdLbCVxrM2-7zhhCbVMDcXEPO24d9jBRnPcwnfMkNR6eCb2W0SSkjhEYjuNUjMpvjf1UVR7KFjEAH2JjtyrfIpRxpUF9xMAzc3Kmf7MQ7Soo4c73ua2xqqhAaubWTXld5objkdT2McfozhuaNC2_CEF3QqUSNQEe38r7s"/>
<div class="absolute inset-0 bg-stone-900/60 flex flex-col justify-center px-8">
<h4 class="text-lime-400 font-['Space_Grotesk'] font-bold text-lg tracking-tight">SOLICITAR REPORTE MENSUAL</h4>
<p class="text-white/80 text-xs mt-1">Generación automática de libro de ventas en formato SENIAT.</p>
</div>
</div>
<div class="space-y-4">
<h5 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Avisos del Sistema</h5>
<div class="flex gap-4 items-start">
<div class="bg-lime-100 p-2 rounded">
<span class="material-symbols-outlined text-lime-700 text-lg" data-icon="check_circle">check_circle</span>
</div>
<div>
<p class="text-xs font-bold text-stone-800">Conexión SENIAT Activa</p>
<p class="text-[10px] text-stone-500 mt-1">La sincronización con la plataforma fiscal se encuentra operativa y actualizada al día de hoy.</p>
</div>
</div>
<div class="flex gap-4 items-start">
<div class="bg-amber-100 p-2 rounded">
<span class="material-symbols-outlined text-amber-700 text-lg" data-icon="warning">warning</span>
</div>
<div>
<p class="text-xs font-bold text-stone-800">Próximo Cierre de Mes</p>
<p class="text-[10px] text-stone-500 mt-1">Faltan 7 días para el cierre fiscal de Mayo. Revise facturas pendientes por anular.</p>
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
<script src="js/facturas-emitidas.js"></script>
</body>
</html>