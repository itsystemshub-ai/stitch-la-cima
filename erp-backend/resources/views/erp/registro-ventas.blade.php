<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Registro Global de Ventas | TITAN INDUSTRIAL - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Registro Global de Ventas | TITAN INDUSTRIAL | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/registro-ventas.css">
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
<!-- TopNavBar -->
<header class="bg-stone-50/80 dark:bg-stone-900/80 backdrop-blur-xl sticky top-0 z-40 flex justify-between items-center w-full px-8 h-16">
<div class="flex items-center gap-8">
<h2 class="font-['Space_Grotesk'] tracking-tight uppercase text-stone-900 dark:text-stone-50 font-bold">BITÁCORA DE OPERACIONES</h2>
<div class="hidden md:flex items-center bg-surface-container rounded-full px-4 py-1.5 gap-2">
<span class="material-symbols-outlined text-secondary text-sm">search</span>
<input class="bg-transparent border-none focus:ring-0 text-sm w-64 placeholder:text-secondary" placeholder="Buscar transacción..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors relative">
<span class="material-symbols-outlined text-stone-600">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-primary rounded-full"></span>
</button>
<button class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors">
<span class="material-symbols-outlined text-stone-600">settings</span>
</button>
<div class="w-8 h-8 rounded-full overflow-hidden bg-stone-200">
<img alt="User profile" data-alt="Close-up portrait of a professional male operations manager with a confident look and neutral office background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCk1fwnPMODlvx8XgrSKhrM7ATAY0c-CJYmmRV0PQfKDlOIlktn92IYuCkLJ7DAuWl9uWHkANHi4e3Df2qMqdHtTKsWb-3xcHLJe2swo4h20oKLc6gRVz9yDXFsWU84ZyeZnK8awNvleViZ0AuFoHgu6sBS4Q-zE2LrC_5UVKG9pNtfpvzCmZoLE1PfwwPzAYm1PhvZNSTJcFJLcSFSJW7m3HuJ-1d2X0YRbeSskDQgOFdO_VwD9tIRQOyXPBH1oeeMhlMf5-9rinQ"/>
</div>
</div>
</header>
<div class="p-8">
<!-- Hero / Metrics Overview -->
<section class="editorial-grid mb-12">
<div class="col-span-12 lg:col-span-8 bg-surface-container-low rounded-xl p-8 flex flex-col justify-between relative overflow-hidden group">
<div class="relative z-10">
<span class="font-headline font-bold text-primary tracking-tighter uppercase text-sm mb-2 block">Acumulado Mensual</span>
<h3 class="font-headline font-black text-6xl tracking-tighter text-on-surface mb-4">$428,590.00</h3>
<div class="flex items-center gap-2 text-primary font-bold">
<span class="material-symbols-outlined">trending_up</span>
<span>+12.4% vs mes anterior</span>
</div>
</div>
<!-- Decorative Chart Shape -->
<div class="absolute bottom-0 right-0 w-1/2 h-full opacity-10 pointer-events-none group-hover:opacity-20 transition-opacity">
<img class="w-full h-full object-contain" data-alt="Abstract minimalist line graph showing an upward growth trend with sharp precision lines on a white background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyOpa9eSmsoQE2FmqV2YMJwzF11uB8Nznv6OT4qN3c9NTbUBm91GX18XHRdobQyeJ_rOBCqwgbIPr_VlewSyDSWH3xNZvsZH06HUhjRqJDuNerA-28R6TbIr2fN9ILw1SFAS9DKrXqvkW1XSdAjfFSmbTgDuxUOXvx484S1mQlGN_K-vygQ8goVikr4OVBvHuMoqk8awZlc5rRFDLkzwHYun4dI1BCovfcspN5yoiBETIYJVUr-hUInmmK82OISysnNbs98vFOzXU"/>
</div>
</div>
<div class="col-span-12 lg:col-span-4 space-y-6">
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-l-4 border-primary">
<p class="text-secondary text-xs font-bold uppercase tracking-widest mb-1">Ventas Hoy</p>
<p class="font-headline font-bold text-3xl">$14,203.50</p>
<div class="flex items-center gap-2 mt-2">
<span class="text-[10px] bg-primary-container text-on-primary-container px-2 py-0.5 rounded font-bold">POS ACTIVE</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border-l-4 border-tertiary">
<p class="text-secondary text-xs font-bold uppercase tracking-widest mb-1">Pendiente Cobro</p>
<p class="font-headline font-bold text-3xl text-secondary">$8,940.00</p>
<div class="flex items-center gap-2 mt-2">
<span class="text-[10px] bg-surface-container-highest text-secondary px-2 py-0.5 rounded font-bold text-uppercase">CREDIT LIMIT REACHED</span>
</div>
</div>
</div>
</section>
<!-- Payment Methods & Daily Tendency -->
<section class="editorial-grid mb-12">
<div class="col-span-12 md:col-span-5 bg-surface-container p-8 rounded-xl">
<h4 class="font-headline font-bold text-lg mb-6 uppercase tracking-tight">Resumen Medios de Pago</h4>
<div class="space-y-6">
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-surface-container-lowest rounded flex items-center justify-center">
<span class="material-symbols-outlined text-primary">payments</span>
</div>
<div>
<p class="font-bold text-sm">Efectivo</p>
<p class="text-[10px] text-secondary">USD / Cash</p>
</div>
</div>
<div class="text-right">
<p class="font-bold">$2,450.00</p>
<p class="text-[10px] text-primary font-bold">17% Total</p>
</div>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-surface-container-lowest rounded flex items-center justify-center">
<span class="material-symbols-outlined text-primary">account_balance</span>
</div>
<div>
<p class="font-bold text-sm">Transferencia</p>
<p class="text-[10px] text-secondary">Local Bank / Wire</p>
</div>
</div>
<div class="text-right">
<p class="font-bold">$8,120.00</p>
<p class="text-[10px] text-primary font-bold">57% Total</p>
</div>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-surface-container-lowest rounded flex items-center justify-center">
<span class="material-symbols-outlined text-primary">currency_exchange</span>
</div>
<div>
<p class="font-bold text-sm">Zelle / Digital</p>
<p class="text-[10px] text-secondary">Digital Payments</p>
</div>
</div>
<div class="text-right">
<p class="font-bold">$3,633.50</p>
<p class="text-[10px] text-primary font-bold">26% Total</p>
</div>
</div>
</div>
</div>
<div class="col-span-12 md:col-span-7 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/10">
<div class="flex justify-between items-center mb-8">
<h4 class="font-headline font-bold text-lg uppercase tracking-tight">Tendencia de Ventas (7D)</h4>
<div class="flex gap-2">
<button class="text-[10px] font-bold px-3 py-1 bg-surface-container rounded-full">Día</button>
<button class="text-[10px] font-bold px-3 py-1 hover:bg-surface-container transition-colors rounded-full text-secondary">Semana</button>
</div>
</div>
<div class="h-48 w-full flex items-end justify-between gap-4">
<div class="w-full bg-surface-container-high h-[40%] rounded-t-sm relative group">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 hidden group-hover:block bg-on-surface text-surface text-[10px] py-1 px-2 rounded">6k</div>
</div>
<div class="w-full bg-surface-container-high h-[65%] rounded-t-sm relative group"></div>
<div class="w-full bg-surface-container-high h-[45%] rounded-t-sm relative group"></div>
<div class="w-full bg-primary h-[85%] rounded-t-sm relative group">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 hidden group-hover:block bg-on-surface text-surface text-[10px] py-1 px-2 rounded">12k</div>
</div>
<div class="w-full bg-surface-container-high h-[55%] rounded-t-sm relative group"></div>
<div class="w-full bg-surface-container-high h-[75%] rounded-t-sm relative group"></div>
<div class="w-full bg-primary-container h-[95%] rounded-t-sm relative group">
<div class="absolute -top-6 left-1/2 -translate-x-1/2 hidden group-hover:block bg-on-surface text-surface text-[10px] py-1 px-2 rounded">14.2k</div>
</div>
</div>
<div class="flex justify-between mt-4 text-[10px] font-bold text-secondary uppercase tracking-widest px-1">
<span>Lun</span><span>Mar</span><span>Mie</span><span>Jue</span><span>Vie</span><span>Sab</span><span>Hoy</span>
</div>
</div>
</section>
<!-- Detailed Operations Log -->
<section class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-8">
<div class="px-8 py-6 flex justify-between items-center border-b border-surface-container">
<h4 class="font-headline font-bold text-lg uppercase tracking-tight">Registro de Transacciones</h4>
<div class="flex gap-4">
<button class="flex items-center gap-2 text-xs font-bold text-secondary border border-outline-variant px-4 py-2 rounded transition-colors hover:bg-surface-container">
<span class="material-symbols-outlined text-sm">filter_list</span>
                            Filtrar
                        </button>
<button class="flex items-center gap-2 text-xs font-bold text-secondary border border-outline-variant px-4 py-2 rounded transition-colors hover:bg-surface-container">
<span class="material-symbols-outlined text-sm">download</span>
                            Exportar CSV
                        </button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low">
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">ID Operación</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Tipo</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Cliente / Concepto</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest">Medio Pago</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest text-right">Monto (USD)</th>
<th class="px-8 py-4 text-[10px] font-black text-secondary uppercase tracking-widest text-right">Estatus</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-8 py-4 font-label text-sm font-bold">#TN-90212</td>
<td class="px-8 py-4">
<span class="text-[10px] font-bold bg-blue-100 text-blue-800 px-2 py-0.5 rounded uppercase">Mostrador</span>
</td>
<td class="px-8 py-4">
<p class="text-sm font-medium">Suministros Industriales S.A.</p>
<p class="text-[10px] text-secondary">Venta de repuestos motor CAT3406</p>
</td>
<td class="px-8 py-4 font-label text-xs">Transferencia</td>
<td class="px-8 py-4 text-right font-headline font-bold">$1,240.00</td>
<td class="px-8 py-4 text-right">
<span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-8 py-4 font-label text-sm font-bold">#TN-90213</td>
<td class="px-8 py-4">
<span class="text-[10px] font-bold bg-primary-container text-on-primary-container px-2 py-0.5 rounded uppercase">POS</span>
</td>
<td class="px-8 py-4">
<p class="text-sm font-medium">Cliente Final D. Lopez</p>
<p class="text-[10px] text-secondary">Filtros de aire y aceite x4</p>
</td>
<td class="px-8 py-4 font-label text-xs">Efectivo</td>
<td class="px-8 py-4 text-right font-headline font-bold">$125.50</td>
<td class="px-8 py-4 text-right">
<span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-8 py-4 font-label text-sm font-bold">#TN-90214</td>
<td class="px-8 py-4">
<span class="text-[10px] font-bold bg-amber-100 text-amber-800 px-2 py-0.5 rounded uppercase">Crédito</span>
</td>
<td class="px-8 py-4">
<p class="text-sm font-medium">Logística del Norte S.R.L.</p>
<p class="text-[10px] text-secondary">Mantenimiento preventivo flota A2</p>
</td>
<td class="px-8 py-4 font-label text-xs">Factura 30 Días</td>
<td class="px-8 py-4 text-right font-headline font-bold">$4,890.00</td>
<td class="px-8 py-4 text-right">
<span class="material-symbols-outlined text-amber-500 text-sm">schedule</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-8 py-4 font-label text-sm font-bold">#TN-90215</td>
<td class="px-8 py-4">
<span class="text-[10px] font-bold bg-blue-100 text-blue-800 px-2 py-0.5 rounded uppercase">Mostrador</span>
</td>
<td class="px-8 py-4">
<p class="text-sm font-medium">Constructora Delta</p>
<p class="text-[10px] text-secondary">Válvulas de escape reforzadas</p>
</td>
<td class="px-8 py-4 font-label text-xs">Zelle</td>
<td class="px-8 py-4 text-right font-headline font-bold">$2,100.00</td>
<td class="px-8 py-4 text-right">
<span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-4 bg-surface-container-low flex justify-between items-center">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Mostrando 4 de 142 transacciones hoy</p>
<div class="flex gap-2">
<button class="p-1 rounded hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="p-1 rounded hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
</section>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/registro-ventas.js"></script>
</body>
</html>