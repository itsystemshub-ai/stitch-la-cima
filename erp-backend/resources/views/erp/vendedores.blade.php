<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="TITAN ERP | Gestión de Vendedores - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>TITAN ERP | Gestión de Vendedores | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/vendedores.css">
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
<!-- Top App Bar -->
<header class="fixed top-0 right-0 left-64 h-16 glass-panel z-40 flex justify-between items-center px-8 border-b border-outline-variant/10">
<div class="flex items-center gap-4">
<span class="text-white/50 font-label text-xs uppercase tracking-widest">Navigation /</span>
<h2 class="text-white font-headline font-bold text-sm tracking-tight uppercase">Gestión de Vendedores y Comisiones</h2>
</div>
<div class="flex items-center gap-6">
<div class="relative flex items-center bg-white/5 px-4 py-1.5 rounded-lg border border-white/10">
<span class="material-symbols-outlined text-stone-400 text-lg">search</span>
<input class="bg-transparent border-none text-xs text-white focus:ring-0 w-48" placeholder="Search sellers..." type="text"/>
</div>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-stone-400 cursor-pointer hover:text-white transition-colors">notifications</span>
<span class="material-symbols-outlined text-stone-400 cursor-pointer hover:text-white transition-colors">settings</span>
<div class="w-8 h-8 rounded bg-primary/20 border border-primary/30 overflow-hidden">
<img alt="Manager Profile" class="w-full h-full object-cover" data-alt="professional portrait of a manager in a high-tech industrial office setting with soft studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOulNFI4GYXmMfki0DfdUZS0zT55PdZkSYijOggfluE5OZZKnLs1GlfDa34g6onlVdv0kipl9LdzZhbugs2czZM-Rrj_6u7wxHMRxB5ft6fD81WkTuxO6o6W4a7BSMyh0EwyMrq-bfKvI9fN3He-aJOTWJO6IWBtTSHx67zxXitH3_Rq_pxl-FJA59jDkXoxq2fdRuMjfG3JKKC_bdEr6gjUtzVY9SxZoquhz1Z4GYXw2OiCFGznTIyVpZFi6E8eoxJadh1BTMiYk"/>
</div>
</div>
</div>
</header>
<div class="pt-24 pb-12 px-8 max-w-7xl mx-auto">
<!-- Branding Header -->
<div class="mb-10 flex justify-between items-end">
<div>
<h3 class="font-headline text-primary font-black text-4xl uppercase tracking-tighter">MAYOR DE REPUESTO LA CIMA, C.A.</h3>
<p class="font-label text-stone-500 text-sm mt-1">Industrial Distribution Management System</p>
</div>
<div class="text-right">
<p class="font-headline text-stone-400 text-xs tracking-widest uppercase">Registry ID</p>
<p class="font-headline text-white font-bold text-xl">J-40308741-5</p>
</div>
</div>
<div class="grid grid-cols-12 gap-8">
<!-- Registration/Edit Form (Bento Style) -->
<section class="col-span-12 lg:col-span-4 space-y-6">
<div class="p-6 bg-[#1a1c1c] rounded-lg shadow-2xl relative overflow-hidden group">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 -mr-8 -mt-8 rotate-45 group-hover:bg-primary/10 transition-colors"></div>
<h4 class="font-headline text-white font-bold text-lg mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">person_add</span>
                            REPRESENTATIVE REGISTRY
                        </h4>
<form class="space-y-4">
<div class="space-y-1">
<label class="font-label text-[10px] text-stone-500 uppercase tracking-widest">Full Name</label>
<input class="w-full bg-stone-900 border-none rounded p-3 text-white focus:ring-2 focus:ring-primary text-sm font-medium" placeholder="e.g. ALEJANDRO RAMIREZ" type="text"/>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="space-y-1">
<label class="font-label text-[10px] text-stone-500 uppercase tracking-widest">ID / RIF</label>
<input class="w-full bg-stone-900 border-none rounded p-3 text-white focus:ring-2 focus:ring-primary text-sm font-medium" placeholder="V-00.000.000" type="text"/>
</div>
<div class="space-y-1">
<label class="font-label text-[10px] text-stone-500 uppercase tracking-widest">Commission %</label>
<div class="relative">
<input class="w-full bg-stone-900 border-none rounded p-3 text-white focus:ring-2 focus:ring-primary text-sm font-medium" placeholder="5.0" type="number"/>
<span class="absolute right-3 top-3 text-stone-600">%</span>
</div>
</div>
</div>
<div class="space-y-1">
<label class="font-label text-[10px] text-stone-500 uppercase tracking-widest">Assigned Region</label>
<select class="w-full bg-stone-900 border-none rounded p-3 text-white focus:ring-2 focus:ring-primary text-sm font-medium">
<option>Región Central</option>
<option>Región Occidente</option>
<option>Región Oriente</option>
<option>Región Los Andes</option>
</select>
</div>
<div class="space-y-1">
<label class="font-label text-[10px] text-stone-500 uppercase tracking-widest">Active Customers Base</label>
<input class="w-full bg-stone-900 border-none rounded p-3 text-white focus:ring-2 focus:ring-primary text-sm font-medium" placeholder="0" type="number"/>
</div>
<button class="w-full bg-stone-100 hover:bg-primary py-3 rounded text-stone-950 hover:text-white font-headline font-black uppercase text-xs tracking-[0.2em] transition-all mt-4">
                                Save Representative
                            </button>
</form>
</div>
<div class="p-6 bg-primary-container rounded-lg relative overflow-hidden">
<img class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-multiply" data-alt="extreme close up of precision engineered metal gear parts with dramatic industrial lighting and grease texture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVsTqe-D9tiMD8dHYhbCCtdFQGPitHOlk5Tk-np0UAt3wUAaMg43Ocba14N4sGhQw7ImbRBpMOehvND_i9YERvN8TMyXenJdpMcp25x_yf-b9ljlHCoPbpjm-8ssxv4iO7gvenFjOQgPm8G0li-Ne0GDiQ12DA14mTo39VQTtB68S2hLPD-PAF83aGPc_VLfJB37cXbHJsTOTfNKwZ647G0AYgMXAjmfLiC_h2rppAyx2yBAPArD41siWhdopuL5R9XFtf6xM4WCU"/>
<div class="relative z-10">
<h5 class="font-headline text-on-primary-container font-black text-xl uppercase italic tracking-tighter">Performance Targets</h5>
<p class="text-on-primary-container/80 text-xs font-bold uppercase mt-2">Current Quarter: Q3 2024</p>
<div class="mt-4 flex items-baseline gap-1">
<span class="text-3xl font-headline font-black text-on-primary-container">$450K</span>
<span class="text-xs font-bold text-on-primary-container/60 uppercase">Threshold</span>
</div>
</div>
</div>
</section>
<!-- Sellers List (Industrial Table) -->
<section class="col-span-12 lg:col-span-8">
<div class="bg-[#1a1c1c] rounded-lg overflow-hidden border border-white/5">
<div class="px-6 py-4 bg-stone-900/50 flex justify-between items-center border-b border-white/5">
<h4 class="font-headline text-white font-bold text-sm tracking-widest uppercase">Active Sales Force</h4>
<div class="flex gap-2">
<button class="p-1.5 hover:bg-white/10 rounded transition-colors">
<span class="material-symbols-outlined text-stone-400 text-sm">filter_list</span>
</button>
<button class="p-1.5 hover:bg-white/10 rounded transition-colors">
<span class="material-symbols-outlined text-stone-400 text-sm">download</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-stone-900/20 text-[10px] text-stone-500 uppercase tracking-widest font-bold">
<tr>
<th class="px-6 py-4">Seller Details</th>
<th class="px-6 py-4">Region</th>
<th class="px-6 py-4">Commission</th>
<th class="px-6 py-4">Customers</th>
<th class="px-6 py-4">Performance</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-white/5 text-sm">
<!-- Row 1 -->
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-stone-800 flex items-center justify-center font-headline font-bold text-primary">RM</div>
<div>
<p class="text-white font-bold uppercase tracking-tight">Ricardo Mendoza</p>
<p class="text-[10px] text-stone-500">ID: V-14.822.391</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="px-2 py-1 bg-stone-800 text-stone-400 text-[10px] font-bold uppercase tracking-tighter">Región Central</span>
</td>
<td class="px-6 py-5 text-white font-mono">8.5%</td>
<td class="px-6 py-5 text-white font-bold">142</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="flex-1 h-1.5 bg-stone-800 rounded-full overflow-hidden w-24">
<div class="h-full bg-primary w-[82%]"></div>
</div>
<span class="text-[10px] text-primary font-black tracking-tighter">82%</span>
</div>
</td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-600 hover:text-white transition-colors">edit_note</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-stone-800 flex items-center justify-center font-headline font-bold text-primary">SC</div>
<div>
<p class="text-white font-bold uppercase tracking-tight">Sofia Castellanos</p>
<p class="text-[10px] text-stone-500">ID: V-20.119.504</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="px-2 py-1 bg-stone-800 text-stone-400 text-[10px] font-bold uppercase tracking-tighter">Región Oriente</span>
</td>
<td class="px-6 py-5 text-white font-mono">10.0%</td>
<td class="px-6 py-5 text-white font-bold">89</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="flex-1 h-1.5 bg-stone-800 rounded-full overflow-hidden w-24">
<div class="h-full bg-primary w-[95%]"></div>
</div>
<span class="text-[10px] text-primary font-black tracking-tighter">95%</span>
</div>
</td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-600 hover:text-white transition-colors">edit_note</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-stone-800 flex items-center justify-center font-headline font-bold text-primary">JP</div>
<div>
<p class="text-white font-bold uppercase tracking-tight">Javier Peraza</p>
<p class="text-[10px] text-stone-500">ID: V-17.443.109</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="px-2 py-1 bg-stone-800 text-stone-400 text-[10px] font-bold uppercase tracking-tighter">Región Occidente</span>
</td>
<td class="px-6 py-5 text-white font-mono">6.5%</td>
<td class="px-6 py-5 text-white font-bold">215</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="flex-1 h-1.5 bg-stone-800 rounded-full overflow-hidden w-24">
<div class="h-full bg-stone-600 w-[45%]"></div>
</div>
<span class="text-[10px] text-stone-500 font-black tracking-tighter">45%</span>
</div>
</td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-600 hover:text-white transition-colors">edit_note</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-stone-800 flex items-center justify-center font-headline font-bold text-primary">EL</div>
<div>
<p class="text-white font-bold uppercase tracking-tight">Elena Lugo</p>
<p class="text-[10px] text-stone-500">ID: V-23.900.221</p>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="px-2 py-1 bg-stone-800 text-stone-400 text-[10px] font-bold uppercase tracking-tighter">Región Central</span>
</td>
<td class="px-6 py-5 text-white font-mono">7.5%</td>
<td class="px-6 py-5 text-white font-bold">110</td>
<td class="px-6 py-5">
<div class="flex items-center gap-2">
<div class="flex-1 h-1.5 bg-stone-800 rounded-full overflow-hidden w-24">
<div class="h-full bg-primary w-[68%]"></div>
</div>
<span class="text-[10px] text-primary font-black tracking-tighter">68%</span>
</div>
</td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-600 hover:text-white transition-colors">edit_note</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-4 bg-stone-900/50 flex justify-between items-center">
<p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest">Showing 4 of 12 sales agents</p>
<div class="flex gap-2">
<button class="px-3 py-1 bg-stone-800 text-stone-400 text-xs font-bold rounded disabled:opacity-50" disabled="">PREV</button>
<button class="px-3 py-1 bg-stone-800 text-white text-xs font-bold rounded">NEXT</button>
</div>
</div>
</div>
</section>
</div>
</div>
<!-- Footer -->
<footer class="mt-auto border-t border-white/5 py-8 px-8 bg-[#0f1111]">
<div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
<div class="flex flex-col items-center md:items-start">
<p class="font-headline font-black text-white tracking-tight">TITAN INDUSTRIAL FORGE</p>
<p class="text-[10px] text-stone-600 font-medium tracking-[0.2em] uppercase">Supply Chain Precision Engine</p>
</div>
<div class="flex flex-col items-center">
<p class="text-stone-500 text-[10px] uppercase tracking-widest font-bold">Official Registry</p>
<p class="text-primary font-headline font-bold text-sm tracking-widest">RIF J-40308741-5</p>
</div>
<div class="text-right">
<p class="text-stone-600 text-[10px] font-medium">© 2024 MAYOR DE REPUESTO LA CIMA, C.A.</p>
<p class="text-stone-600 text-[10px] font-medium">All rights reserved. Engineering Division.</p>
</div>
</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/vendedores.js"></script>
</body>
</html>