<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Order Confirmation | MAYOR DE REPUESTO LA CIMA, C.A. - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Order Confirmation | MAYOR DE REPUESTO LA CIMA, C.A. | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/orden-confirmada.css">
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
<main class="flex-grow container mx-auto px-4 py-12 max-w-6xl">
<!-- Success Header -->
<section class="mb-12 text-center md:text-left grid md:grid-cols-2 gap-8 items-center">
<div class="order-2 md:order-1">
<div class="inline-flex items-center gap-2 px-3 py-1 bg-primary-container text-on-primary-container rounded-full text-xs font-bold uppercase tracking-widest mb-4">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Order Confirmed
                </div>
<h1 class="text-5xl md:text-7xl font-bold tracking-tighter uppercase mb-4 leading-none">
                    Thank you <br/><span class="text-primary">for your trust.</span>
</h1>
<p class="text-secondary text-lg max-w-md">Your industrial parts order <span class="font-mono font-bold text-on-surface">#LC-99284-Z</span> has been received and is currently being processed by our engineering team.</p>
<div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start">
<button class="bg-primary text-on-primary px-8 py-3 font-bold uppercase text-sm tracking-widest flex items-center gap-2 scale-95 hover:scale-100 active:scale-90 transition-all">
<span class="material-symbols-outlined">download</span>
                        Download PDF Invoice
                    </button>
<button class="bg-surface-container-high border border-outline/15 px-8 py-3 font-bold uppercase text-sm tracking-widest text-on-surface hover:bg-surface-container-highest transition-colors">
                        View My Orders
                    </button>
</div>
</div>
<div class="order-1 md:order-2 relative aspect-square md:aspect-video rounded-xl overflow-hidden shadow-2xl">
<img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" data-alt="High-precision close up of a heavy duty industrial engine part with metallic texture and sharp engineering focus in a dark workshop" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD51TI-510OC6ALCmY7ohD6dU8JfHKqLV8IFlvx7okG-940A0iFx7-Vor4MRuXZgmnmCyUFnIz9lYEQzvS-ZocE6CW_-acXOb4ZmHb7icO9M7z5geBiy2ytqZvfD4er_DGjH12ptMrygl-nmIFcLylBJKx_-BHgGjjClX9VMwCh01lESbYtALnL8dWHzwZgIXSWGANcMOFRbQ7K9EbfhdcFrV65UO00LW5lkTmBYQUeRTq2p60yWRYEyBeoscjWohuM7EraSQoG6OU"/>
<div class="absolute inset-0 bg-gradient-to-t from-zinc-950/60 to-transparent"></div>
<div class="absolute bottom-6 left-6 right-6 flex justify-between items-end">
<div class="text-white">
<p class="text-[10px] uppercase tracking-[0.3em] opacity-70">Inventory Location</p>
<p class="font-headline font-bold">Valencia Hub - VZ</p>
</div>
<div class="text-[#9ACD32] font-headline text-2xl font-black">7 ITEMS</div>
</div>
</div>
</section>
<!-- Bento Grid Summary -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
<!-- Order Details -->
<div class="md:col-span-2 bg-surface-container-low p-8 rounded-lg relative overflow-hidden group">
<div class="relative z-10">
<h2 class="text-2xl font-bold uppercase tracking-tight mb-6 flex items-center gap-3">
<span class="material-symbols-outlined text-primary">inventory_2</span>
                        Parts Summary
                    </h2>
<div class="space-y-1">
<!-- Technical Spec Table Header -->
<div class="grid grid-cols-12 gap-4 pb-2 text-[10px] uppercase tracking-widest text-secondary font-bold px-4">
<div class="col-span-6">Component Description</div>
<div class="col-span-2 text-center">Qty</div>
<div class="col-span-4 text-right">Price (USD)</div>
</div>
<!-- Items -->
<div class="grid grid-cols-12 gap-4 py-4 px-4 bg-surface-container-lowest items-center rounded">
<div class="col-span-6">
<p class="font-bold text-sm">V8 Engine Head Gasket Set</p>
<p class="text-[10px] text-secondary font-mono">PN: HG-882-QX</p>
</div>
<div class="col-span-2 text-center font-mono font-bold">01</div>
<div class="col-span-4 text-right font-bold text-primary">$450.00</div>
</div>
<div class="grid grid-cols-12 gap-4 py-4 px-4 bg-surface-container items-center rounded">
<div class="col-span-6">
<p class="font-bold text-sm">Turbocharger Intercooler Hose</p>
<p class="text-[10px] text-secondary font-mono">PN: TI-004-BL</p>
</div>
<div class="col-span-2 text-center font-mono font-bold">02</div>
<div class="col-span-4 text-right font-bold text-primary">$180.00</div>
</div>
<div class="grid grid-cols-12 gap-4 py-4 px-4 bg-surface-container-lowest items-center rounded">
<div class="col-span-6">
<p class="font-bold text-sm">Heavy Duty Oil Filter - Industrial</p>
<p class="text-[10px] text-secondary font-mono">PN: OF-550-HD</p>
</div>
<div class="col-span-2 text-center font-mono font-bold">04</div>
<div class="col-span-4 text-right font-bold text-primary">$120.00</div>
</div>
</div>
<div class="mt-8 pt-6 border-t border-outline/10 flex justify-between items-end">
<div>
<p class="text-[10px] uppercase tracking-widest text-secondary mb-1">Status</p>
<span class="text-xs font-bold text-primary px-2 py-0.5 bg-primary/10 rounded uppercase">Awaiting Payment</span>
</div>
<div class="text-right">
<p class="text-[10px] uppercase tracking-widest text-secondary">Total Amount Due</p>
<p class="text-4xl font-headline font-black text-on-surface">$750.00</p>
</div>
</div>
</div>
<!-- Decorative Engine SVG Placeholder Background -->
<div class="absolute -bottom-12 -right-12 opacity-[0.03] pointer-events-none group-hover:scale-110 transition-transform duration-1000">
<span class="material-symbols-outlined text-[300px]">engineering</span>
</div>
</div>
<!-- Next Steps -->
<div class="bg-on-surface text-surface p-8 rounded-lg flex flex-col">
<h2 class="text-2xl font-bold uppercase tracking-tight mb-8 text-[#9ACD32]">Next Steps</h2>
<div class="space-y-8 flex-grow">
<div class="flex gap-4">
<div class="h-8 w-8 rounded bg-[#9ACD32] text-on-surface flex items-center justify-center font-black flex-shrink-0">1</div>
<div>
<h3 class="font-bold uppercase text-xs tracking-widest mb-1">Payment Validation</h3>
<p class="text-xs text-secondary leading-relaxed">Submit your transfer receipt to <span class="text-[#9ACD32]">sales@lacima.com</span> or upload via the portal to begin assembly.</p>
</div>
</div>
<div class="flex gap-4">
<div class="h-8 w-8 rounded border border-secondary text-secondary flex items-center justify-center font-black flex-shrink-0">2</div>
<div>
<h3 class="font-bold uppercase text-xs tracking-widest mb-1">Shipping Coordinates</h3>
<p class="text-xs text-secondary leading-relaxed">Once validated, our logistics team will dispatch your items to the registered address in Valencia.</p>
</div>
</div>
<div class="flex gap-4">
<div class="h-8 w-8 rounded border border-secondary text-secondary flex items-center justify-center font-black flex-shrink-0">3</div>
<div>
<h3 class="font-bold uppercase text-xs tracking-widest mb-1">Final Delivery</h3>
<p class="text-xs text-secondary leading-relaxed">Arrival expected within 24-48 business hours via TransporCima Heavy Cargo.</p>
</div>
</div>
</div>
<div class="mt-8 pt-6 border-t border-white/10">
<p class="text-[10px] text-zinc-500 italic">Need immediate help? Call +58 412-5550202</p>
</div>
</div>
</div>
<!-- Shipping Map / Location Block -->
<section class="grid md:grid-cols-4 gap-6">
<div class="md:col-span-1 bg-surface-container-high p-6 rounded-lg">
<h3 class="text-xs font-bold uppercase tracking-widest text-secondary mb-4">Destination</h3>
<p class="font-bold mb-1">Empresas Polar S.A.</p>
<p class="text-sm text-secondary">Avenida Industrial 14-B<br/>Zona Industrial II<br/>Valencia, Carabobo 2001<br/>Venezuela</p>
<button class="mt-6 text-primary font-bold uppercase text-[10px] tracking-widest flex items-center gap-1 group">
                    Change Address
                    <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">chevron_right</span>
</button>
</div>
<div class="md:col-span-3 rounded-lg overflow-hidden h-[200px] relative grayscale brightness-75 hover:grayscale-0 transition-all duration-1000">
<img class="w-full h-full object-cover" data-alt="Modern logistics map visualization showing industrial route hubs with glowing data points on a dark tech background" data-location="Valencia, Venezuela" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmU9ZmFhTOcMc8Yetxn4zYeo2XbTFqcwW0bmPgdTY1k9AWOBIt5hEDAZuZHEo4e8rywNeN4JYEaC5159ISSYOCu8p_yZXxUfUmPIDIKIXzpenh75y2E0DXu49W_7F57YsAic3xr2mS6c3KUUFNgtjgOhgdYcUMkvpf0l49ro0e1qBT4J9bgw_QnX7SrI8UF-PBRbsjX6rqJBiCRVzuX3908JTrGa7PTU0bPcCNed9dL019nA7SlibnH0IVzQa9Tat_gWEzXZWXMnw"/>
<div class="absolute inset-0 flex items-center justify-center">
<div class="bg-primary-container p-4 rounded-full shadow-2xl animate-pulse">
<span class="material-symbols-outlined text-on-primary-container text-3xl" style="font-variation-settings: 'FILL' 1;">local_shipping</span>
</div>
</div>
</div>
</section>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/orden-confirmada.js"></script>
</body>
</html>