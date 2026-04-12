<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="nomina - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>nomina | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/nomina.css">
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
<main class="md:ml-64 pt-20 p-6 min-h-screen">
<!-- Header Section -->
<header class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="font-headline text-4xl font-extrabold uppercase tracking-tighter text-white">Payroll Calculation</h1>
<p class="text-neutral-500 font-label text-sm uppercase tracking-widest mt-1">Industrial Processing Unit • V.2.4.0</p>
</div>
<!-- Date Selector (Bento Style) -->
<div class="bg-neutral-900 p-1 flex items-center rounded-lg border border-neutral-800">
<div class="px-4 py-2 flex flex-col border-r border-neutral-800">
<span class="text-[10px] text-lime-400 font-bold uppercase tracking-tighter">Period Start</span>
<input class="bg-transparent border-none text-white p-0 text-sm focus:ring-0" type="date" value="2023-11-01"/>
</div>
<div class="px-4 py-2 flex flex-col border-r border-neutral-800">
<span class="text-[10px] text-lime-400 font-bold uppercase tracking-tighter">Period End</span>
<input class="bg-transparent border-none text-white p-0 text-sm focus:ring-0" type="date" value="2023-11-15"/>
</div>
<button class="px-4 py-2 hover:bg-neutral-800 transition-colors">
<span class="material-symbols-outlined text-neutral-400">refresh</span>
</button>
</div>
</header>
<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-neutral-900 p-6 border-l-4 border-lime-500">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Gross Total</p>
<h3 class="text-2xl font-headline font-bold text-white mt-1">245.890,00 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
<div class="bg-neutral-900 p-6 border-l-4 border-neutral-700">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Deductions Sum</p>
<h3 class="text-2xl font-headline font-bold text-white mt-1">12.340,50 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
<div class="bg-neutral-900 p-6 border-l-4 border-lime-500">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Net Payable</p>
<h3 class="text-2xl font-headline font-bold text-lime-400 mt-1">233.549,50 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
<div class="bg-neutral-900 p-6 border-l-4 border-neutral-700">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Patronal Costs</p>
<h3 class="text-2xl font-headline font-bold text-white mt-1">34.120,00 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
</div>
<!-- Employee Payroll Table -->
<div class="bg-neutral-900 rounded-lg overflow-hidden border border-neutral-800 mb-8">
<div class="px-6 py-4 border-b border-neutral-800 flex justify-between items-center">
<h2 class="font-headline font-bold uppercase text-sm tracking-widest text-neutral-300">Detailed Payroll Worksheet</h2>
<div class="flex gap-4">
<button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-lime-400 hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm">filter_alt</span> Filter Employees
                    </button>
<button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-neutral-400 hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm">download</span> CSV Export
                    </button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-neutral-950/50">
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Employee Details</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Base Salary</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">LOTTT Recargos</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Deductions (IVSS/FAOV)</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Cesta Ticket</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Net Total</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-neutral-800">
<!-- Employee Row 1 -->
<tr class="hover:bg-neutral-800/50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-neutral-800 flex items-center justify-center font-bold text-lime-400 text-xs">RM</div>
<div>
<p class="text-sm font-bold text-white">RICARDO MENDOZA</p>
<p class="text-[10px] text-neutral-500 uppercase font-medium">Operations Lead • ID: 402231</p>
</div>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-neutral-300">45.000,00</td>
<td class="px-6 py-4">
<div class="flex flex-col gap-1">
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">OT 50%: 12.5h</span>
<span class="text-[10px] px-2 py-0.5 bg-lime-900/30 text-lime-400 rounded w-fit">Bonus: 5.000,00</span>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-error/80">
<p>-1.250,40 <span class="text-[9px] text-neutral-500 block uppercase">IVSS (0.5%) + FAOV (0.25%)</span></p>
</td>
<td class="px-6 py-4">
<p class="text-sm font-medium text-neutral-300">1.000,00</p>
<p class="text-[9px] text-neutral-500 uppercase">22 Days Active</p>
</td>
<td class="px-6 py-4 font-headline font-bold text-lime-400">49.749,60</td>
<td class="px-6 py-4 text-right">
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="View Details">
<span class="material-symbols-outlined text-sm text-neutral-400">visibility</span>
</button>
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="Download Receipt">
<span class="material-symbols-outlined text-sm text-neutral-400">file_download</span>
</button>
</td>
</tr>
<!-- Employee Row 2 -->
<tr class="hover:bg-neutral-800/50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-neutral-800 flex items-center justify-center font-bold text-lime-400 text-xs">AS</div>
<div>
<p class="text-sm font-bold text-white">ANA SÁNCHEZ</p>
<p class="text-[10px] text-neutral-500 uppercase font-medium">Mechanical Engineer • ID: 402245</p>
</div>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-neutral-300">62.000,00</td>
<td class="px-6 py-4">
<div class="flex flex-col gap-1">
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">OT 75%: 4.0h</span>
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">Comm: 8.500,00</span>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-error/80">
<p>-1.860,00 <span class="text-[9px] text-neutral-500 block uppercase">PF (1%) + IVSS/FAOV</span></p>
</td>
<td class="px-6 py-4">
<p class="text-sm font-medium text-neutral-300">1.000,00</p>
<p class="text-[9px] text-neutral-500 uppercase">22 Days Active</p>
</td>
<td class="px-6 py-4 font-headline font-bold text-lime-400">69.640,00</td>
<td class="px-6 py-4 text-right">
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="View Details">
<span class="material-symbols-outlined text-sm text-neutral-400">visibility</span>
</button>
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="Download Receipt">
<span class="material-symbols-outlined text-sm text-neutral-400">file_download</span>
</button>
</td>
</tr>
<!-- Employee Row 3 -->
<tr class="hover:bg-neutral-800/50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-neutral-800 flex items-center justify-center font-bold text-lime-400 text-xs">JV</div>
<div>
<p class="text-sm font-bold text-white">JOSE VILLALOBOS</p>
<p class="text-[10px] text-neutral-500 uppercase font-medium">Technician II • ID: 402289</p>
</div>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-neutral-300">38.500,00</td>
<td class="px-6 py-4">
<div class="flex flex-col gap-1">
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">OT 100%: 8.0h</span>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-error/80">
<p>-962,50 <span class="text-[9px] text-neutral-500 block uppercase">Full Deductions</span></p>
</td>
<td class="px-6 py-4">
<p class="text-sm font-medium text-neutral-300">850,00</p>
<p class="text-[9px] text-neutral-500 uppercase">18 Days Active</p>
</td>
<td class="px-6 py-4 font-headline font-bold text-lime-400">42.387,50</td>
<td class="px-6 py-4 text-right">
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="View Details">
<span class="material-symbols-outlined text-sm text-neutral-400">visibility</span>
</button>
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="Download Receipt">
<span class="material-symbols-outlined text-sm text-neutral-400">file_download</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Action Panel -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
<!-- Summary Card -->
<div class="bg-neutral-900 p-8 rounded-lg border border-neutral-800 flex flex-col justify-between">
<div>
<h3 class="font-headline font-extrabold text-2xl uppercase tracking-tighter text-white mb-6">Accounting Summary</h3>
<div class="space-y-4">
<div class="flex justify-between items-center text-sm font-medium">
<span class="text-neutral-500 uppercase tracking-widest text-[11px]">Total Basic Wage</span>
<span class="text-white">145.500,00</span>
</div>
<div class="flex justify-between items-center text-sm font-medium">
<span class="text-neutral-500 uppercase tracking-widest text-[11px]">Overtime (50/75/100)</span>
<span class="text-white">28.400,00</span>
</div>
<div class="flex justify-between items-center text-sm font-medium">
<span class="text-neutral-500 uppercase tracking-widest text-[11px]">Legal Deductions</span>
<span class="text-error/80">-12.340,50</span>
</div>
<div class="pt-4 border-t border-neutral-800 flex justify-between items-center">
<span class="font-headline font-black text-lime-400 uppercase tracking-widest">Net Liability</span>
<span class="font-headline font-black text-2xl text-lime-400">233.549,50</span>
</div>
</div>
</div>
</div>
<!-- Global Actions -->
<div class="flex flex-col gap-4">
<button class="flex-1 bg-primary text-on-primary p-6 flex flex-col items-center justify-center gap-2 group hover:scale-[1.01] active:scale-95 transition-all shadow-[0_10px_20px_rgba(73,104,0,0.2)]">
<span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
<span class="font-headline font-bold text-xl uppercase tracking-tight">Process &amp; Generate Accounting Seats</span>
<p class="text-[10px] font-medium uppercase tracking-widest opacity-70">Automatic Ledger Entry Posting</p>
</button>
<div class="grid grid-cols-2 gap-4">
<button class="bg-neutral-800 border border-neutral-700 p-4 flex flex-col items-center gap-2 hover:bg-neutral-700 transition-all uppercase font-headline font-bold text-xs tracking-widest text-white">
<span class="material-symbols-outlined">description</span>
                        Download Receipts
                    </button>
<button class="bg-neutral-800 border border-neutral-700 p-4 flex flex-col items-center gap-2 hover:bg-neutral-700 transition-all uppercase font-headline font-bold text-xs tracking-widest text-white">
<span class="material-symbols-outlined">print</span>
                        Print Summary
                    </button>
</div>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/nomina.js"></script>
</body>
</html>