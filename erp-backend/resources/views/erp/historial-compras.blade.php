<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="historial-compras - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>historial-compras | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/historial-compras.css">
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
<main class="flex-1 md:ml-64 flex flex-col min-h-screen">
<!-- TopNavBar (Authority: JSON) -->
<header class="bg-stone-950/80 backdrop-blur-xl docked full-width top-0 z-50 flex justify-between items-center w-full px-6 py-4 sticky">
<div class="flex items-center gap-8">
<div class="text-2xl font-bold tracking-tighter text-lime-400 font-space-grotesk uppercase">METALLIC_CORE_ERP</div>
<nav class="hidden lg:flex items-center gap-6 font-space-grotesk uppercase tracking-tighter text-sm">
<a class="text-stone-400 hover:text-lime-200 transition-colors" href="#">Dashboard</a>
<a class="text-stone-400 hover:text-lime-200 transition-colors" href="#">Inventario</a>
<a class="text-stone-400 hover:text-lime-200 transition-colors" href="#">Reportes</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-500 text-sm" data-icon="search">search</span>
<input class="bg-stone-900 border-none text-[10px] pl-10 pr-4 py-2 w-64 text-stone-300 focus:ring-1 focus:ring-lime-400 font-space-grotesk" placeholder="BUSCAR ORDEN..." type="text"/>
</div>
<div class="flex items-center gap-2">
<button class="p-2 text-stone-400 hover:text-lime-400 transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-stone-400 hover:text-lime-400 transition-colors">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
</div>
<button class="bg-lime-400 text-stone-950 px-4 py-2 text-[10px] font-bold uppercase tracking-tighter hover:bg-lime-300 transition-all scale-95 active:duration-100">
                    Nueva Factura
                </button>
<img alt="User profile" class="w-8 h-8 rounded-full border border-stone-700" data-alt="Close-up portrait of a professional male engineer in a industrial setting with soft background blur and warm lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAZiYwM9f3lUAkjEzleHBNVK8VYwmGJBlxol-UI0P_vwN8quQ_e8wv-YIneHHKrvOEl4vugTzpFdr6v-9t_ALtxgHLUK0Vr4IclSSV1JVXCG-MlM0BHKlmvP0W6lUsu_6C5VdzJz9mVagnwBBHB9LvUqksWGFxK_Hyp6-zJM5XIKaWxWBr4soRansPQnzygd9U23K5H8N5nYXGx2k4cJJ19mqblwkswdA-tZq7rPu-rpMZxZpHjKwylSpDh_NPfN3xhoIKP1rzNwI"/>
</div>
</header>
<!-- Main Workspace -->
<section class="p-6 lg:p-10 max-w-7xl mx-auto w-full space-y-8">
<!-- Header Section (Editorial Industrial) -->
<div class="relative overflow-hidden bg-stone-950 p-8 rounded-lg shadow-inner">
<div class="absolute top-0 right-0 p-4 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[120px]" data-icon="history">history</span>
</div>
<div class="relative z-10">
<h1 class="text-4xl md:text-5xl font-black text-lime-400 uppercase tracking-tighter font-headline mb-2">Historial de Órdenes</h1>
<p class="text-stone-400 max-w-2xl font-body text-sm leading-relaxed">
                        Control centralizado de adquisiciones y suministros industriales. Gestione el flujo de materiales y servicios con precisión técnica y trazabilidad total.
                    </p>
</div>
</div>
<!-- Advanced Filters (Industrial Controls) -->
<div class="bg-surface-container p-6 rounded-lg flex flex-col lg:flex-row gap-6 items-end">
<div class="flex-1 w-full grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="space-y-2">
<label class="text-[10px] uppercase font-bold tracking-widest text-on-surface-variant block">Rango de Fecha</label>
<div class="flex items-center gap-2">
<input class="flex-1 bg-surface-container-highest border-none text-xs p-3 focus:ring-2 focus:ring-primary" type="date"/>
<span class="text-stone-400">—</span>
<input class="flex-1 bg-surface-container-highest border-none text-xs p-3 focus:ring-2 focus:ring-primary" type="date"/>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase font-bold tracking-widest text-on-surface-variant block">Proveedor</label>
<select class="w-full bg-surface-container-highest border-none text-xs p-3 focus:ring-2 focus:ring-primary">
<option>Todos los Proveedores</option>
<option>Acero Continental S.A.</option>
<option>Logística Global C.A.</option>
<option>Lubricantes del Sur</option>
</select>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase font-bold tracking-widest text-on-surface-variant block">Estatus de Orden</label>
<div class="flex gap-2">
<button class="flex-1 py-3 text-[10px] font-bold uppercase tracking-tighter bg-primary text-on-primary">Todos</button>
<button class="flex-1 py-3 text-[10px] font-bold uppercase tracking-tighter bg-surface-container-highest hover:bg-surface-container-high transition-colors">Recibido</button>
<button class="flex-1 py-3 text-[10px] font-bold uppercase tracking-tighter bg-surface-container-highest hover:bg-surface-container-high transition-colors">Pendiente</button>
</div>
</div>
</div>
<button class="bg-stone-900 text-lime-400 px-8 py-3 h-[46px] text-[10px] font-bold uppercase tracking-widest border border-lime-400/30 hover:bg-stone-800 transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                    Aplicar Filtros
                </button>
</div>
<!-- Order Table (High Density Industrial) -->
<div class="bg-surface-container-lowest rounded-lg overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full border-collapse">
<thead>
<tr class="bg-stone-900 text-stone-400 text-[10px] uppercase tracking-widest font-headline">
<th class="px-6 py-4 text-left">Nro Orden</th>
<th class="px-6 py-4 text-left">Proveedor</th>
<th class="px-6 py-4 text-left">Estatus</th>
<th class="px-6 py-4 text-left">Usuario Registro</th>
<th class="px-6 py-4 text-right">Monto Total</th>
<th class="px-6 py-4 text-center">Acciones</th>
</tr>
</thead>
<tbody class="text-sm font-body">
<!-- Row 1 -->
<tr class="border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0089</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Acero Continental S.A.</span>
<span class="text-[10px] text-stone-500">RIF: J-29384812-0</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-lime-100 text-lime-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-lime-600 rounded-full mr-1.5"></span>
                                        Recibido
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Carlos R. Mendoza</td>
<td class="px-6 py-4 text-right font-mono font-bold">$12,450.00</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
<!-- Row 2 -->
<tr class="border-b border-surface-container bg-surface-container-low hover:bg-surface-container transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0092</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Logística Global C.A.</span>
<span class="text-[10px] text-stone-500">RIF: J-30491823-1</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-amber-600 rounded-full mr-1.5"></span>
                                        Pendiente
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Elena Vasquez</td>
<td class="px-6 py-4 text-right font-mono font-bold">$4,820.50</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
<!-- Row 3 -->
<tr class="border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0075</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Lubricantes del Sur</span>
<span class="text-[10px] text-stone-500">RIF: J-10293485-3</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-rose-600 rounded-full mr-1.5"></span>
                                        Cancelado
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Carlos R. Mendoza</td>
<td class="px-6 py-4 text-right font-mono font-bold">$1,200.00</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
<!-- Row 4 -->
<tr class="border-b border-surface-container bg-surface-container-low hover:bg-surface-container transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0064</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Maquinarias Industriales</span>
<span class="text-[10px] text-stone-500">RIF: J-00123498-5</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-lime-100 text-lime-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-lime-600 rounded-full mr-1.5"></span>
                                        Recibido
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Admin_Global</td>
<td class="px-6 py-4 text-right font-mono font-bold">$45,000.00</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination / Footer Table -->
<div class="px-6 py-4 bg-surface-container-high flex justify-between items-center">
<span class="text-[10px] font-bold uppercase tracking-widest text-stone-500">Mostrando 4 de 156 órdenes</span>
<div class="flex gap-2">
<button class="w-8 h-8 flex items-center justify-center bg-stone-900 text-white hover:bg-lime-400 hover:text-stone-900 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center bg-lime-400 text-stone-900 font-bold text-xs">1</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-stone-600 hover:bg-stone-200 text-xs">2</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-stone-600 hover:bg-stone-200 text-xs">3</button>
<button class="w-8 h-8 flex items-center justify-center bg-stone-900 text-white hover:bg-lime-400 hover:text-stone-900 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Quick Insights Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-stone-900 p-6 rounded-lg border-l-4 border-lime-400">
<h3 class="text-[10px] uppercase tracking-[0.2em] text-stone-500 font-bold mb-4">Total Mensual</h3>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-black text-white font-headline">$142.8k</span>
<span class="text-lime-400 text-[10px] font-bold">+12% vs mes ant.</span>
</div>
</div>
<div class="bg-surface-container p-6 rounded-lg">
<h3 class="text-[10px] uppercase tracking-[0.2em] text-on-surface-variant font-bold mb-4">Órdenes Pendientes</h3>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-black text-on-surface font-headline">24</span>
<span class="text-amber-600 text-[10px] font-bold">Requieren atención</span>
</div>
</div>
<div class="bg-surface-container p-6 rounded-lg">
<h3 class="text-[10px] uppercase tracking-[0.2em] text-on-surface-variant font-bold mb-4">Eficiencia Proveedor</h3>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-black text-on-surface font-headline">94.2%</span>
<span class="text-stone-500 text-[10px] font-bold">Tiempo entrega prom.</span>
</div>
</div>
</div>
</section>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/historial-compras.js"></script>
</body>
</html>