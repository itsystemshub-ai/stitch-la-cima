<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Fiscal Closing &amp; Tax Summary - TITAN ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Fiscal Closing &amp; Tax Summary - TITAN ERP | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/cierre-contable.css">
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
<main class="md:ml-64 pt-24 pb-12 px-8 min-h-screen">
<header class="mb-10 relative">
<div class="absolute -left-8 top-0 w-1 h-16 bg-primary"></div>
<p class="text-primary font-label text-xs font-bold tracking-widest uppercase mb-1">Module: FISCAL_CLOSURE_v4</p>
<h1 class="text-on-background font-headline text-5xl font-bold uppercase tracking-tighter leading-none">Fiscal Closing &amp; <br/><span class="text-primary">Tax Summary</span></h1>
<div class="mt-4 flex gap-4 items-center">
<span class="bg-surface-container-highest px-3 py-1 text-[10px] font-bold tracking-widest uppercase">PERIOD: DEC 2023</span>
<span class="bg-primary/10 text-primary border border-primary/20 px-3 py-1 text-[10px] font-bold tracking-widest uppercase flex items-center gap-2">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span> IN PROGRESS
                </span>
</div>
</header>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6 items-stretch">
<!-- Left Column: Reconciliations & Inventory -->
<div class="col-span-12 lg:col-span-7 space-y-6">
<!-- Pending Reconciliations Card -->
<section class="bg-surface-container-lowest p-8 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-24 h-24 bg-surface-container-low -mr-12 -mt-12 rotate-45 transition-transform group-hover:scale-110"></div>
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-primary" data-icon="account_balance_wallet">account_balance_wallet</span>
<h3 class="font-headline text-xl font-bold uppercase tracking-tight">Pending Reconciliations</h3>
</div>
<div class="space-y-6">
<div class="flex items-start justify-between bg-surface-container-low p-4 relative">
<div class="absolute left-0 top-0 h-full w-1 bg-primary"></div>
<div>
<p class="font-label text-xs font-bold text-secondary uppercase tracking-widest mb-1">Bank vs Ledger</p>
<p class="font-headline text-2xl font-bold">$14,203.45 <span class="text-sm font-medium text-error ml-2 uppercase tracking-normal font-body">Unmatched Variance</span></p>
</div>
<button class="bg-surface-container-highest px-4 py-2 text-[10px] font-bold tracking-widest uppercase hover:bg-primary hover:text-white transition-all">Review Details</button>
</div>
<div class="flex items-start justify-between bg-surface-container-low p-4 relative">
<div class="absolute left-0 top-0 h-full w-1 bg-secondary"></div>
<div>
<p class="font-label text-xs font-bold text-secondary uppercase tracking-widest mb-1">Inventory vs Ledger</p>
<p class="font-headline text-2xl font-bold">$2,840.10 <span class="text-sm font-medium text-primary ml-2 uppercase tracking-normal font-body">Within Margin</span></p>
</div>
<button class="bg-surface-container-highest px-4 py-2 text-[10px] font-bold tracking-widest uppercase hover:bg-primary hover:text-white transition-all">Audit Logs</button>
</div>
</div>
</section>
<!-- Status Progress -->
<section class="bg-surface-container-low p-8 border border-outline-variant/15">
<h3 class="font-headline text-xl font-bold uppercase tracking-tight mb-6">Closure Integrity Checklist</h3>
<div class="grid grid-cols-2 gap-4">
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Asset Depreciation</p>
<p class="text-sm font-bold uppercase">Finalized</p>
</div>
</div>
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Accounts Payable</p>
<p class="text-sm font-bold uppercase">Locked</p>
</div>
</div>
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Payroll Accrual</p>
<p class="text-sm font-bold uppercase">Awaiting HR</p>
</div>
</div>
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Inter-Co. Balance</p>
<p class="text-sm font-bold uppercase">Pending Sync</p>
</div>
</div>
</div>
</section>
</div>
<!-- Right Column: Tax Provisions & Auth -->
<div class="col-span-12 lg:col-span-5 space-y-6">
<!-- Tax Provision Card -->
<section class="bg-stone-900 text-stone-100 p-8 flex flex-col justify-between min-h-[400px] relative overflow-hidden">
<div class="absolute top-0 right-0 p-4">
<span class="material-symbols-outlined text-orange-500 text-4xl opacity-20" data-icon="description">description</span>
</div>
<div>
<h3 class="font-headline text-2xl font-bold uppercase tracking-tight mb-8">Tax Provision <span class="text-orange-500">FY2023</span></h3>
<div class="space-y-8">
<div class="border-l-2 border-orange-500/50 pl-6">
<p class="text-stone-400 font-label text-[10px] font-bold uppercase tracking-widest mb-2">ISLR Calculation (34%)</p>
<p class="font-headline text-4xl font-bold text-stone-50!">$184,290.00</p>
<p class="text-stone-500 text-xs mt-1">Estimated Net Taxable Income: $542,029.41</p>
</div>
<div class="border-l-2 border-stone-700 pl-6">
<p class="text-stone-400 font-label text-[10px] font-bold uppercase tracking-widest mb-2">IVA Liquidations (NET)</p>
<p class="font-headline text-3xl font-bold text-stone-300!">$42,105.12</p>
<div class="flex gap-4 mt-2">
<span class="text-[10px] text-stone-500 uppercase">Input: $82K</span>
<span class="text-[10px] text-stone-500 uppercase">Output: $124K</span>
</div>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-stone-800">
<button class="w-full bg-orange-500 text-stone-950 font-bold py-4 uppercase tracking-tighter hover:bg-orange-400 transition-all active:scale-95">
                            PROVISION SETTLEMENT
                        </button>
</div>
</section>
<!-- Certification Section -->
<section class="bg-surface-container-high p-8 border-l-[8px] border-primary">
<div class="flex justify-between items-start mb-6">
<div>
<h3 class="font-headline text-lg font-bold uppercase tracking-tight">Certificate of Integrity</h3>
<p class="text-xs text-secondary mt-1">Validation Hash: 8F-22-E9-01-TITAN</p>
</div>
<span class="material-symbols-outlined text-primary text-3xl" data-icon="verified">verified</span>
</div>
<div class="space-y-4">
<div class="bg-surface-container-lowest p-4 font-mono text-[11px] leading-relaxed border border-outline-variant/30">
<p class="text-on-surface-variant italic mb-2">"I hereby certify that the financial records presented for the period ending DEC-2023 reflect the true industrial fiscal position of TITAN ERP according to International Accounting Standards..."</p>
<div class="flex justify-between items-end border-t border-dashed border-outline-variant pt-2 mt-4">
<div>
<p class="font-bold text-on-surface">DR. ELARA VANCE</p>
<p class="text-[9px] text-secondary">Chief Financial Officer</p>
</div>
<div class="text-right">
<p class="font-bold text-on-surface">SENIAT AUTH CODE</p>
<p class="text-[10px] text-primary tracking-widest">#SNT-2023-X99L-412</p>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
<!-- Analytical Overlay Section -->
<section class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface p-6 border-b-2 border-primary/20">
<div class="flex justify-between items-center mb-4">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">EBITDA Margin</p>
<span class="text-primary text-xs font-bold">+2.4%</span>
</div>
<div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary w-[74%]"></div>
</div>
<p class="font-headline text-xl font-bold mt-4">32.4% <span class="text-xs font-medium text-secondary">vs prev. yr</span></p>
</div>
<div class="bg-surface p-6 border-b-2 border-primary/20">
<div class="flex justify-between items-center mb-4">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Liquidity Ratio</p>
<span class="text-error text-xs font-bold">-0.1%</span>
</div>
<div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-secondary w-[62%]"></div>
</div>
<p class="font-headline text-xl font-bold mt-4">1.8 <span class="text-xs font-medium text-secondary">Quick Ratio</span></p>
</div>
<div class="bg-surface p-6 border-b-2 border-primary/20">
<div class="flex justify-between items-center mb-4">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Deferred Taxes</p>
<span class="text-secondary text-xs font-bold">Stable</span>
</div>
<div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary-container w-[45%]"></div>
</div>
<p class="font-headline text-xl font-bold mt-4">$12,400 <span class="text-xs font-medium text-secondary">Asset value</span></p>
</div>
</section>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/cierre-contable.js"></script>
</body>
</html>