<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Balance General - MAYOR DE REPUESTO LA CIMA, C.A. - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Balance General - MAYOR DE REPUESTO LA CIMA, C.A. | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/balance-general.css">
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
<main class="md:ml-64 p-4 md:p-12 min-h-screen bg-[#1a1c1c] relative overflow-hidden">
<!-- Technical Blueprint Decoration -->
<div class="absolute top-0 right-0 w-1/2 h-full opacity-5 pointer-events-none">
<svg class="w-full h-full" viewbox="0 0 100 100">
<pattern height="10" id="grid" patternunits="userSpaceOnUse" width="10">
<path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"></path>
</pattern>
<rect fill="url(#grid)" height="100%" width="100%"></rect>
</svg>
</div>
<!-- Header Section -->
<header class="relative z-10 mb-12 flex flex-col md:flex-row justify-between items-end border-b border-white/10 pb-8">
<div class="max-w-2xl">
<div class="flex items-center gap-3 mb-4">
<span class="bg-primary px-3 py-1 text-[10px] font-black uppercase tracking-widest text-white">Reporte Oficial</span>
<span class="text-zinc-500 font-mono text-[10px]">FIN_ENG_v2.0.4</span>
</div>
<h1 class="text-4xl md:text-6xl font-bold uppercase tracking-tighter leading-none mb-4">MAYOR DE REPUESTO LA CIMA, C.A.</h1>
<p class="text-primary-container font-medium uppercase tracking-[0.3em] text-sm">Estado de Situación Financiera</p>
<p class="text-zinc-500 text-xs mt-4 font-mono uppercase">Cierre de Periodo Fiscal: 31 de Octubre, 2023 | Moneda: Unidades Monetarias (UM)</p>
</div>
<div class="mt-8 md:mt-0 flex gap-4">
<div class="text-right">
<p class="text-zinc-500 text-[10px] uppercase tracking-widest">Uptime Operativo</p>
<p class="text-2xl font-['Space_Grotesk'] font-bold text-primary-container">99.8%</p>
</div>
</div>
</header>
<!-- Financial Dashboard Summary -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 relative z-10">
<div class="bg-zinc-900/50 backdrop-blur-md p-6 border-l-4 border-primary relative overflow-hidden">
<div class="absolute -right-4 -top-4 opacity-10">
<span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">trending_up</span>
</div>
<p class="text-zinc-500 text-[10px] uppercase tracking-widest mb-1">Total Activos</p>
<h3 class="text-3xl font-bold tracking-tighter">4.852.200,45</h3>
</div>
<div class="bg-zinc-900/50 backdrop-blur-md p-6 border-l-4 border-error relative overflow-hidden">
<div class="absolute -right-4 -top-4 opacity-10">
<span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">account_balance</span>
</div>
<p class="text-zinc-500 text-[10px] uppercase tracking-widest mb-1">Total Pasivos</p>
<h3 class="text-3xl font-bold tracking-tighter">1.240.550,12</h3>
</div>
<div class="bg-zinc-900/50 backdrop-blur-md p-6 border-l-4 border-zinc-500 relative overflow-hidden">
<div class="absolute -right-4 -top-4 opacity-10">
<span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">shield</span>
</div>
<p class="text-zinc-500 text-[10px] uppercase tracking-widest mb-1">Patrimonio Neto</p>
<h3 class="text-3xl font-bold tracking-tighter text-primary-container">3.611.650,33</h3>
</div>
</section>
<!-- Main Balance Table -->
<div class="space-y-12 relative z-10">
<!-- SECTION: ACTIVOS -->
<section>
<div class="flex items-baseline gap-4 mb-4">
<h2 class="text-2xl font-bold uppercase tracking-tighter text-white">01 / Activos</h2>
<div class="h-[1px] flex-1 bg-white/10"></div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
<!-- Activo Corriente -->
<div class="bg-zinc-900/30 p-6">
<h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Activo Corriente</h3>
<table class="w-full text-xs font-mono">
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Caja y Bancos</td>
<td class="py-3 text-right tabular-nums">450.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Cuentas por Cobrar Comerciales</td>
<td class="py-3 text-right tabular-nums">820.500,45</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group bg-primary/5">
<td class="py-3 text-primary-container font-bold">Inventario de Repuestos (Valorizado)</td>
<td class="py-3 text-right tabular-nums font-bold">1.840.300,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">IVA Crédito Fiscal</td>
<td class="py-3 text-right tabular-nums">98.400,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Retenciones de IVA por Recuperar</td>
<td class="py-3 text-right tabular-nums">42.000,00</td>
</tr>
</tbody>
<tfoot>
<tr class="border-t-2 border-primary/20">
<td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Activo Corriente</td>
<td class="pt-4 text-right text-lg font-bold tracking-tight">3.251.200,45</td>
</tr>
</tfoot>
</table>
</div>
<!-- Activo No Corriente -->
<div class="bg-zinc-900/30 p-6">
<h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Activo No Corriente</h3>
<table class="w-full text-xs font-mono">
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Propiedad, Planta y Equipo</td>
<td class="py-3 text-right tabular-nums">1.450.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Mobiliario y Equipos de Oficina</td>
<td class="py-3 text-right tabular-nums21">320.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Depreciación Acumulada</td>
<td class="py-3 text-right tabular-nums text-error">(-169.000,00)</td>
</tr>
</tbody>
<tfoot>
<tr class="border-t-2 border-primary/20">
<td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Activo No Corriente</td>
<td class="pt-4 text-right text-lg font-bold tracking-tight">1.601.000,00</td>
</tr>
</tfoot>
</table>
</div>
</div>
</section>
<!-- SECTION: PASIVOS -->
<section>
<div class="flex items-baseline gap-4 mb-4">
<h2 class="text-2xl font-bold uppercase tracking-tighter text-white">02 / Pasivos</h2>
<div class="h-[1px] flex-1 bg-white/10"></div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
<!-- Pasivo Corriente -->
<div class="bg-zinc-900/30 p-6">
<h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Pasivo Corriente</h3>
<table class="w-full text-xs font-mono">
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Cuentas por Pagar Proveedores</td>
<td class="py-3 text-right tabular-nums">680.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group text-primary-container">
<td class="py-3 font-bold">IVA por Pagar</td>
<td class="py-3 text-right tabular-nums font-bold">124.550,12</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Retenciones de ISLR por Pagar</td>
<td class="py-3 text-right tabular-nums">15.200,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Pasivos Laborales Acumulados</td>
<td class="py-3 text-right tabular-nums">220.800,00</td>
</tr>
</tbody>
<tfoot>
<tr class="border-t-2 border-error/20">
<td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Pasivo Corriente</td>
<td class="pt-4 text-right text-lg font-bold tracking-tight">1.040.550,12</td>
</tr>
</tfoot>
</table>
</div>
<!-- Pasivo No Corriente -->
<div class="bg-zinc-900/30 p-6">
<h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 mb-6 border-b border-white/5 pb-2">Pasivo No Corriente</h3>
<table class="w-full text-xs font-mono">
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-3 text-zinc-400 group-hover:text-white">Préstamos Bancarios Largo Plazo</td>
<td class="py-3 text-right tabular-nums">200.000,00</td>
</tr>
</tbody>
<tfoot class="h-24">
<!-- Empty space to align with the taller left table -->
<tr class="border-t-2 border-error/20 align-bottom">
<td class="pt-4 text-[10px] uppercase tracking-widest text-zinc-500">Subtotal Pasivo No Corriente</td>
<td class="pt-4 text-right text-lg font-bold tracking-tight">200.000,00</td>
</tr>
</tfoot>
</table>
</div>
</div>
</section>
<!-- SECTION: PATRIMONIO -->
<section>
<div class="flex items-baseline gap-4 mb-4">
<h2 class="text-2xl font-bold uppercase tracking-tighter text-white">03 / Patrimonio</h2>
<div class="h-[1px] flex-1 bg-white/10"></div>
</div>
<div class="bg-zinc-900/30 p-8 border border-white/5">
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
<div>
<table class="w-full text-xs font-mono">
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-4 text-zinc-400 group-hover:text-white uppercase tracking-wider">Capital Social Suscrito y Pagado</td>
<td class="py-4 text-right tabular-nums text-sm">2.000.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-4 text-zinc-400 group-hover:text-white uppercase tracking-wider">Reserva Legal</td>
<td class="py-4 text-right tabular-nums text-sm">200.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group">
<td class="py-4 text-zinc-400 group-hover:text-white uppercase tracking-wider">Utilidades Acumuladas</td>
<td class="py-4 text-right tabular-nums text-sm">950.000,00</td>
</tr>
<tr class="hover:bg-white/5 transition-colors group bg-primary/10">
<td class="py-4 text-primary-container font-bold uppercase tracking-wider">Utilidad del Ejercicio</td>
<td class="py-4 text-right tabular-nums text-sm font-bold">461.650,33</td>
</tr>
</tbody>
</table>
</div>
<div class="flex flex-col items-center justify-center p-8 bg-zinc-950/50 rounded-lg border border-primary/20">
<span class="text-[10px] text-zinc-500 uppercase tracking-[0.3em] mb-2">Total Capital y Reservas</span>
<div class="text-5xl font-bold tracking-tighter text-primary-container mb-2">3.611.650,33</div>
<div class="flex items-center gap-2 text-zinc-500 italic text-[10px]">
<span class="material-symbols-outlined text-xs">verified</span>
                                Certificado por el departamento contable
                            </div>
</div>
</div>
</div>
</section>
</div>
<!-- Technical Footnote -->
<footer class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 opacity-40 hover:opacity-100 transition-opacity">
<div class="flex items-center gap-8">
<div class="flex flex-col">
<span class="text-[9px] uppercase tracking-widest font-black">Preparado por</span>
<span class="text-xs uppercase">Dpto. Contabilidad Central</span>
</div>
<div class="flex flex-col">
<span class="text-[9px] uppercase tracking-widest font-black">Revisado por</span>
<span class="text-xs uppercase">Dirección de Finanzas</span>
</div>
</div>
<div class="text-[9px] text-right max-w-sm uppercase leading-relaxed font-mono">
                Este documento es una representación técnica de la salud financiera de MAYOR DE REPUESTO LA CIMA, C.A. La integridad de los datos de inventario está vinculada directamente al sistema ERP FINANCE_ENGINE Core.
            </div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/balance-general.js"></script>
</body>
</html>