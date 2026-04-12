<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="FINANCE_ENGINE - Industrial ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>FINANCE_ENGINE - Industrial ERP | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/declaracion-iva.css">
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
<main class="md:pl-64 pt-20 p-6 min-h-screen bg-[#1a1c1c]">
<!-- Header Section -->
<header class="mb-12 relative">
<div class="absolute -top-10 -left-10 w-64 h-64 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 relative z-10">
<div>
<span class="label-md text-amber-500 font-bold uppercase tracking-[0.2em] mb-2 block">Fiscal Oversight</span>
<h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter headline-font text-white leading-none">
                        MAYOR DE REPUESTO <br/><span class="text-zinc-600">LA CIMA, C.A.</span>
</h1>
</div>
<div class="bg-zinc-900 p-4 border-l-4 border-amber-500">
<p class="text-xs text-zinc-500 uppercase tracking-widest font-bold">Tax ID (RIF)</p>
<p class="text-xl font-mono text-zinc-200">J-40592831-0</p>
</div>
</div>
</header>
<!-- Bento Grid Statistics -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<!-- Debt vs Credit Card -->
<div class="md:col-span-2 bg-[#222424] p-8 relative overflow-hidden group">
<div class="relative z-10">
<h3 class="font-['Space_Grotesk'] uppercase text-zinc-400 tracking-wider text-sm mb-6">IVA Balance Analysis</h3>
<div class="flex justify-between items-end gap-4">
<div class="flex-1">
<p class="text-xs text-zinc-500 uppercase mb-1">Debito Fiscal</p>
<p class="text-3xl font-bold headline-font text-white">VES 425.890,00</p>
<div class="w-full bg-zinc-800 h-1 mt-4">
<div class="bg-amber-500 h-1 w-3/4"></div>
</div>
</div>
<div class="flex-1">
<p class="text-xs text-zinc-500 uppercase mb-1 text-right">Credito Fiscal</p>
<p class="text-3xl font-bold headline-font text-amber-400 text-right">VES 312.440,00</p>
<div class="w-full bg-zinc-800 h-1 mt-4">
<div class="bg-zinc-600 h-1 w-1/2 ml-auto"></div>
</div>
</div>
</div>
<div class="mt-8 flex items-center justify-between">
<p class="text-xs uppercase font-bold text-zinc-500">Calculated Differential</p>
<p class="text-lg font-bold headline-font text-white">+VES 113.450,00</p>
</div>
</div>
<!-- Subtle Gradient Pattern -->
<div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-50"></div>
</div>
<!-- Tax Retentions Card -->
<div class="bg-zinc-900 p-8 flex flex-col justify-between border border-zinc-800/50">
<span class="material-symbols-outlined text-amber-500 text-4xl mb-4" style="font-variation-settings: 'FILL' 1;">account_balance</span>
<div>
<h3 class="font-['Space_Grotesk'] uppercase text-zinc-500 tracking-wider text-xs mb-1">IVA Practicadas</h3>
<p class="text-2xl font-bold text-white headline-font">VES 84.120,50</p>
</div>
<div class="mt-4 pt-4 border-t border-zinc-800">
<p class="text-[10px] text-zinc-500 uppercase tracking-tighter">Last Update: May 24, 2024</p>
</div>
</div>
<!-- ISLR Retentions Card -->
<div class="bg-zinc-900 p-8 flex flex-col justify-between border border-zinc-800/50">
<span class="material-symbols-outlined text-zinc-500 text-4xl mb-4">receipt_long</span>
<div>
<h3 class="font-['Space_Grotesk'] uppercase text-zinc-500 tracking-wider text-xs mb-1">ISLR Sufridas</h3>
<p class="text-2xl font-bold text-white headline-font">VES 12.840,00</p>
</div>
<div class="mt-4 pt-4 border-t border-zinc-800">
<p class="text-xs text-amber-500 font-bold uppercase">View Ledger</p>
</div>
</div>
</section>
<!-- Form and Detail Split Layout -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
<!-- Declaration Form (Simulated) -->
<section class="lg:col-span-2 bg-[#222424] p-10">
<div class="flex items-center justify-between mb-10">
<h2 class="text-2xl font-black uppercase headline-font text-white">Formulario 00030: <span class="text-amber-500">IVA Mensual</span></h2>
<span class="px-3 py-1 bg-zinc-800 text-zinc-400 text-[10px] uppercase font-bold tracking-[0.2em]">Period: 05-2024</span>
</div>
<div class="space-y-8">
<!-- Form Section: Sales -->
<div>
<div class="flex items-center gap-4 mb-4">
<div class="h-px bg-zinc-800 flex-1"></div>
<span class="text-xs font-bold text-zinc-500 uppercase">Sección A: Ventas y Debitos</span>
<div class="h-px bg-zinc-800 flex-1"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Ventas Internas Gravadas Alícuota General</label>
<div class="bg-zinc-950 border border-zinc-800 p-4 focus-within:border-amber-500 transition-colors">
<input class="bg-transparent border-none focus:ring-0 text-white font-mono w-full text-lg" type="text" value="2.661.812,50"/>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Débito Fiscal Correspondiente (16%)</label>
<div class="bg-zinc-800/30 border border-zinc-800 p-4">
<input class="bg-transparent border-none focus:ring-0 text-amber-500 font-mono w-full text-lg opacity-80" readonly="" type="text" value="425.890,00"/>
</div>
</div>
</div>
</div>
<!-- Form Section: Purchases -->
<div>
<div class="flex items-center gap-4 mb-4">
<div class="h-px bg-zinc-800 flex-1"></div>
<span class="text-xs font-bold text-zinc-500 uppercase">Sección B: Compras y Créditos</span>
<div class="h-px bg-zinc-800 flex-1"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Compras Internas Gravadas Alícuota General</label>
<div class="bg-zinc-950 border border-zinc-800 p-4 focus-within:border-amber-500 transition-colors">
<input class="bg-transparent border-none focus:ring-0 text-white font-mono w-full text-lg" type="text" value="1.952.750,00"/>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Crédito Fiscal Correspondiente (16%)</label>
<div class="bg-zinc-800/30 border border-zinc-800 p-4">
<input class="bg-transparent border-none focus:ring-0 text-amber-400 font-mono w-full text-lg opacity-80" readonly="" type="text" value="312.440,00"/>
</div>
</div>
</div>
</div>
<!-- Form Footer: Totals -->
<div class="bg-zinc-950 p-8 border-l-8 border-primary mt-12 flex flex-col md:flex-row justify-between items-center gap-8">
<div>
<p class="text-xs text-zinc-500 uppercase font-black mb-1">Total Impuesto a Pagar (Antes de Retenciones)</p>
<p class="text-4xl font-bold headline-font text-white">VES 113.450,00</p>
</div>
<button class="bg-primary hover:bg-primary-container text-white hover:text-on-primary-container px-8 py-4 headline-font font-bold uppercase text-sm tracking-widest transition-all scale-100 hover:scale-[1.02] active:scale-95">
                            Submit To Seniat
                        </button>
</div>
</div>
</section>
<!-- Technical Breakdown Table -->
<aside class="space-y-6">
<div class="bg-zinc-900 overflow-hidden border border-zinc-800">
<div class="p-6 bg-zinc-800/50">
<h3 class="font-['Space_Grotesk'] uppercase text-sm font-bold text-white tracking-widest">Retenciones Sufridas (Detalle)</h3>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-zinc-950 text-[10px] uppercase text-zinc-500 font-black">
<th class="p-4">Provider / Client</th>
<th class="p-4">Type</th>
<th class="p-4 text-right">Amount</th>
</tr>
</thead>
<tbody class="divide-y divide-zinc-800/50">
<tr class="hover:bg-zinc-800/30 transition-colors">
<td class="p-4">
<p class="text-xs font-bold text-zinc-200">TRANS-CARIBE, C.A.</p>
<p class="text-[10px] text-zinc-500">J-30922831-2</p>
</td>
<td class="p-4">
<span class="text-[9px] bg-amber-500/10 text-amber-400 px-2 py-0.5 rounded uppercase font-bold">IVA</span>
</td>
<td class="p-4 text-right font-mono text-xs text-zinc-300">12.500,00</td>
</tr>
<tr class="hover:bg-zinc-800/30 transition-colors">
<td class="p-4">
<p class="text-xs font-bold text-zinc-200">INVERSIONES 2020</p>
<p class="text-[10px] text-zinc-500">J-29833100-1</p>
</td>
<td class="p-4">
<span class="text-[9px] bg-zinc-700 text-zinc-300 px-2 py-0.5 rounded uppercase font-bold">ISLR</span>
</td>
<td class="p-4 text-right font-mono text-xs text-zinc-300">4.200,00</td>
</tr>
<tr class="hover:bg-zinc-800/30 transition-colors">
<td class="p-4">
<p class="text-xs font-bold text-zinc-200">DISTRIBUIDORA METAL</p>
<p class="text-[10px] text-zinc-500">J-10293344-0</p>
</td>
<td class="p-4">
<span class="text-[9px] bg-amber-500/10 text-amber-400 px-2 py-0.5 rounded uppercase font-bold">IVA</span>
</td>
<td class="p-4 text-right font-mono text-xs text-zinc-300">8.950,00</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Industrial Visual Component -->
<div class="h-48 relative overflow-hidden group">
<img alt="Industrial Engine Parts" class="w-full h-full object-cover grayscale opacity-40 group-hover:opacity-60 transition-opacity" data-alt="High-precision industrial engine components made of polished chrome and steel, macro shot with dramatic lighting and dark technical aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuActUuQtgonLoamFibDF_OZe113ue71JMMUoVXBtDr5bGio2Pjl9B8Km5KdxrXUp1xKzzZrwLg0Acw1-qUTKiSIMBnfKP7zo6U0VfvOMllldFvW-2XTxAlx7UKAadC426lEPzXJZwO_lYndUxLRez5y54d20fcenuMil4ojO3pG12NFR8W5tHGkgFAtBhJJk6e1Xjsr4y2ENvNTkqkQip_NAufaaCyvRQJVOasuWHHTIltECZhVKUUGUSkiFlhpb7lhiWv_4BCD5lY"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#1a1c1c] via-transparent to-transparent"></div>
<div class="absolute bottom-4 left-4">
<p class="text-[10px] uppercase font-bold tracking-widest text-amber-500">Precision Asset Log</p>
<p class="text-xs text-white headline-font">Stock Ref: 992-XC-MAX</p>
</div>
</div>
<div class="bg-zinc-900 p-6 border-l border-zinc-800">
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-zinc-500 text-sm">info</span>
<span class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Audit Status</span>
</div>
<p class="text-xs text-zinc-400 leading-relaxed italic">
                        "Documentacion verificada según normativa Gaceta Oficial N° 42.100. Todos los cálculos están sujetos a conciliación bancaria final."
                    </p>
</div>
</aside>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/declaracion-iva.js"></script>
</body>
</html>