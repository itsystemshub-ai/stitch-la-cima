<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="libro-ventas - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>libro-ventas | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/libro-ventas.css">
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
<main class="md:ml-64 pt-24 px-6 pb-12">
<!-- Header Section: Editorial Authority -->
<header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div class="max-w-2xl">
<div class="flex items-center gap-2 text-lime-500 mb-2">
<span class="text-xs font-bold uppercase tracking-[0.3em]">Compliance Module</span>
<div class="h-[1px] w-12 bg-lime-500/30"></div>
</div>
<h1 class="text-5xl md:text-6xl font-headline font-bold uppercase tracking-tighter text-on-surface leading-[0.9]">
                    Libro de <span class="text-lime-500">Ventas</span> Fiscal
                </h1>
<p class="mt-4 text-stone-400 font-body text-lg border-l-2 border-stone-800 pl-6">
                    SENIAT Compliance (Art. 58). Chronological record of operations for the fiscal period.
                </p>
</div>
<div class="flex flex-wrap gap-3">
<button class="flex items-center gap-2 bg-stone-900 hover:bg-stone-800 text-stone-200 px-5 py-3 rounded-lg font-['Inter'] text-xs font-bold uppercase tracking-widest transition-all active:scale-95">
<span class="material-symbols-outlined text-sm" data-icon="picture_as_pdf">picture_as_pdf</span>
                    Export PDF
                </button>
<button class="flex items-center gap-2 bg-primary hover:bg-lime-600 text-white px-5 py-3 rounded-lg font-['Inter'] text-xs font-bold uppercase tracking-widest transition-all active:scale-95 shadow-lg shadow-primary/10">
<span class="material-symbols-outlined text-sm" data-icon="table_view">table_view</span>
                    Export Excel
                </button>
</div>
</header>
<!-- Filters & Stats Bento -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<!-- Filter Card -->
<div class="col-span-1 md:col-span-2 bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between">
<div>
<h3 class="font-headline text-xs font-bold uppercase tracking-widest text-stone-500 mb-4">Period Selection</h3>
<div class="flex flex-wrap gap-4">
<div class="flex-1 min-w-[150px]">
<label class="block text-[10px] uppercase font-bold text-stone-500 mb-1">Fiscal Year</label>
<select class="w-full bg-stone-900 border-none rounded-lg text-sm text-white focus:ring-1 focus:ring-lime-500 py-2.5">
<option>2024</option>
<option>2023</option>
</select>
</div>
<div class="flex-1 min-w-[150px]">
<label class="block text-[10px] uppercase font-bold text-stone-500 mb-1">Month</label>
<select class="w-full bg-stone-900 border-none rounded-lg text-sm text-white focus:ring-1 focus:ring-lime-500 py-2.5">
<option>October</option>
<option selected="">November</option>
<option>December</option>
</select>
</div>
</div>
</div>
<div class="mt-6 flex items-center gap-2 text-lime-400 text-xs font-bold">
<span class="material-symbols-outlined text-sm" data-icon="info">info</span>
<span>Currently viewing November 2024 (Art. 58 Validated)</span>
</div>
</div>
<!-- Total Stats -->
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-lime-500">
<h3 class="font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-1">VAT Debit Total</h3>
<p class="text-3xl font-headline font-bold text-white mb-2">Bs. 42.105,50</p>
<div class="text-[10px] text-lime-400 font-bold uppercase flex items-center gap-1">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
                    +12.4% vs prev. month
                </div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-stone-800">
<h3 class="font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-1">Exempt Sales</h3>
<p class="text-3xl font-headline font-bold text-white mb-2">Bs. 8.420,00</p>
<div class="text-[10px] text-stone-500 font-bold uppercase">Representing 16.5% of total</div>
</div>
</section>
<!-- Technical Spec Table: Fiscal Record -->
<section class="bg-surface-container-lowest rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-900/50">
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Invoice No.</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Date</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Customer RIF</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Customer Name</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">Exempt</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">Tax Base</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">VAT (16%)</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">Retentions</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-lime-500 text-right">Total</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-900">
<tr class="bg-surface hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-001</td>
<td class="px-6 py-4 text-xs text-stone-400">01/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">J-12345678-9</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Siderúrgica del Turbio S.A.</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">12.500,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">2.000,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">1.500,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">13.000,00</td>
</tr>
<tr class="bg-stone-900/20 hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-002</td>
<td class="px-6 py-4 text-xs text-stone-400">02/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">J-98765432-1</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Corp. Eléctrica Nacional</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">8.420,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">8.420,00</td>
</tr>
<tr class="bg-surface hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-003</td>
<td class="px-6 py-4 text-xs text-stone-400">05/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">G-20001234-5</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Ministerio de Transporte</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">45.200,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">7.232,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">5.424,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">47.008,00</td>
</tr>
<tr class="bg-stone-900/20 hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-004</td>
<td class="px-6 py-4 text-xs text-stone-400">08/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">J-55443322-1</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Inversiones Hidráulicas C.A.</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">22.150,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">3.544,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">25.694,00</td>
</tr>
</tbody>
<tfoot>
<tr class="bg-stone-900/80">
<td class="px-6 py-5 font-headline text-xs font-bold uppercase tracking-widest text-stone-400" colspan="4">Monthly Period Totals</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 8.420,00</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 79.850,00</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 12.776,00</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 6.924,00</td>
<td class="px-6 py-5 text-lg font-headline font-bold text-lime-400 text-right">Bs. 94.122,00</td>
</tr>
</tfoot>
</table>
</div>
</section>
<!-- Footer / Signature Area -->
<footer class="mt-12 flex flex-col md:flex-row justify-between items-start gap-8 opacity-60">
<div class="text-[10px] uppercase font-bold tracking-[0.2em] text-stone-500">
<p>TITAN ENGINE ERP - FISCAL MODULE v4.2.1</p>
<p>Digital Stamp: 0X992-B7F-1120-CC</p>
</div>
<div class="text-[10px] text-right uppercase font-bold tracking-[0.2em] text-stone-500">
<p>Certified Document under Venezuelan Law</p>
<p>Electronic signature valid for SENIAT audits</p>
</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/libro-ventas.js"></script>
</body>
</html>