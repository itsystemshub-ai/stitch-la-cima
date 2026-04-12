<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Módulo de Activos Fijos - INDUSTRIAL FORGE ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Módulo de Activos Fijos - INDUSTRIAL FORGE ERP | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/activos-fijos.css">
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
<main class="ml-64 pt-20 p-8 min-h-screen">
<header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="text-4xl font-black tracking-tighter uppercase mb-2">Activos Fijos</h1>
<p class="text-secondary font-medium tracking-tight">MAYOR DE REPUESTO LA CIMA, C.A. — Gestión de Maquinaria y Equipos</p>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 bg-surface-container-high text-on-surface font-bold text-xs uppercase tracking-widest border border-outline-variant/15 hover:scale-102 transition-all">Exportar PDF</button>
<button class="px-6 py-2 bg-primary text-white font-black text-xs uppercase tracking-widest flex items-center gap-2 hover:scale-102 transition-all shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span> Nuevo Activo
                </button>
</div>
</header>
<!-- Dashboard Widgets (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
<div class="md:col-span-1 bg-surface-container-lowest p-6 flex flex-col justify-between border-l-4 border-primary">
<span class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-4">Valor Total Activos</span>
<div>
<span class="text-3xl font-black tracking-tighter">$1,240,500.00</span>
<div class="flex items-center gap-1 text-primary mt-1">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
<span class="text-[10px] font-bold uppercase">4.2% vs Año Anterior</span>
</div>
</div>
</div>
<div class="md:col-span-1 bg-surface-container-lowest p-6 flex flex-col justify-between border-l-4 border-stone-800">
<span class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-4">Depreciación Acumulada</span>
<div>
<span class="text-3xl font-black tracking-tighter">$412,280.45</span>
<p class="text-[10px] text-stone-500 font-medium uppercase mt-1">33.2% del Valor Inicial</p>
</div>
</div>
<div class="md:col-span-2 relative overflow-hidden bg-stone-900 p-6 flex flex-col justify-between">
<img alt="Engine block industrial background" class="absolute inset-0 w-full h-full object-cover opacity-20" data-alt="close-up of a high-performance engine block with precision metallic textures and professional industrial lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDq7O27VBFiJ7hre-_UekW37sUGY9gbsCeijCX4wtGdTb8MS9apy31wwRWum97L3U5tdRhRhQEU0PqjSaKHeFU3jqrV-lKd3mpRJZds8wk710C9f6n6yjwNXITn6CBDRGeVGE-mzg9lVK7j7CORv1sPsBI6C54cHq_al0e-CFBtFMeOqKnjKJPp410uPgbx0PHiYvo38kImj8HVj09JWonuCRMTUgcMTD_B0KYi-mHPlHUbZy0NpOd9s5DtGQUYC4zBg5H1QjC-0bQ"/>
<div class="relative z-10 flex flex-col h-full">
<span class="text-[10px] font-bold uppercase tracking-widest text-lime-400 mb-4">Proyección Depreciación Mensual</span>
<div class="flex items-end gap-2">
<span class="text-4xl font-black tracking-tighter text-white">-$12,450</span>
<span class="text-xs font-bold text-stone-400 uppercase tracking-widest pb-1">USD / Mes</span>
</div>
<div class="mt-4 flex items-center gap-4">
<div class="flex-1 h-1.5 bg-stone-700 overflow-hidden">
<div class="h-full bg-lime-500 w-[65%]"></div>
</div>
<span class="text-[10px] font-bold text-stone-400 uppercase">Período Fiscal Q3</span>
</div>
</div>
</div>
</div>
<!-- Section: Inventory Table -->
<div class="bg-surface-container-lowest overflow-hidden">
<div class="p-6 flex items-center justify-between">
<h3 class="text-xl font-black tracking-tighter uppercase">Inventario de Activos</h3>
<div class="flex gap-4">
<div class="bg-surface-container px-3 py-1 flex items-center gap-2">
<span class="material-symbols-outlined text-stone-500 text-sm" data-icon="search">search</span>
<input class="bg-transparent border-none focus:ring-0 text-[10px] font-bold uppercase w-64" placeholder="BUSCAR POR CÓDIGO O NOMBRE..." type="text"/>
</div>
<button class="material-symbols-outlined p-2 text-stone-600 hover:bg-surface-container transition-colors" data-icon="filter_list">filter_list</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant/15">
<tr>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Código</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Descripción</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Fecha Compra</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-right">Valor Inicial</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Método</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-right">Dep. Acumulada</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-right">Valor Libros</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-secondary text-center">Acción</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-bold text-xs">AF-00214</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Torno CNC Precision X-900</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Maquinaria Pesada</span>
</div>
</td>
<td class="px-6 py-4 text-xs">12/05/2021</td>
<td class="px-6 py-4 text-xs font-bold text-right">$125,000.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$31,250.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$93,750.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 font-bold text-xs">AF-00245</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Montacargas Caterpillar 5T</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Equipos de Almacén</span>
</div>
</td>
<td class="px-6 py-4 text-xs">15/09/2022</td>
<td class="px-6 py-4 text-xs font-bold text-right">$45,500.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$8,450.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$37,050.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 font-bold text-xs">AF-00289</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Camión Distribución ISUZU NLR</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Vehículos</span>
</div>
</td>
<td class="px-6 py-4 text-xs">03/01/2023</td>
<td class="px-6 py-4 text-xs font-bold text-right">$68,200.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$6,820.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$61,380.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 font-bold text-xs">AF-00312</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="text-xs font-bold uppercase">Compresor Aire Industrial 500L</span>
<span class="text-[10px] text-stone-500 uppercase font-medium">Herramientas</span>
</div>
</td>
<td class="px-6 py-4 text-xs">22/11/2023</td>
<td class="px-6 py-4 text-xs font-bold text-right">$12,900.00</td>
<td class="px-6 py-4">
<span class="text-[9px] px-2 py-0.5 bg-stone-200 font-black uppercase rounded-sm">Línea Recta</span>
</td>
<td class="px-6 py-4 text-xs font-bold text-right text-error">$430.00</td>
<td class="px-6 py-4 text-xs font-black text-right text-primary">$12,470.00</td>
<td class="px-6 py-4 text-center">
<button class="material-symbols-outlined text-stone-400 hover:text-primary transition-colors text-lg" data-icon="visibility">visibility</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-6 py-4 bg-surface-container-low flex items-center justify-between">
<span class="text-[10px] font-bold uppercase text-stone-500">Mostrando 4 de 128 activos</span>
<div class="flex gap-2">
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant bg-primary text-white text-[10px] font-bold">1</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors text-[10px] font-bold">2</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors text-[10px] font-bold">3</button>
<button class="w-8 h-8 flex items-center justify-center border border-outline-variant hover:bg-primary hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Floating Action Section (Right Overlay) -->
<section class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container-high p-6 flex items-start gap-4">
<div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
</div>
<div>
<h4 class="text-xs font-black uppercase tracking-widest mb-1">Cierre Mensual</h4>
<p class="text-[10px] text-stone-600 font-medium mb-3">Generar asientos automáticos de depreciación para el período actual.</p>
<button class="text-[10px] font-black uppercase text-primary border-b border-primary hover:text-primary-container transition-colors">Procesar Ahora</button>
</div>
</div>
<div class="bg-surface-container-high p-6 flex items-start gap-4">
<div class="w-10 h-10 bg-stone-800 text-white flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="barcode_scanner">barcode_scanner</span>
</div>
<div>
<h4 class="text-xs font-black uppercase tracking-widest mb-1">Auditoría Física</h4>
<p class="text-[10px] text-stone-600 font-medium mb-3">Sincronizar etiquetas QR de activos con la base de datos central.</p>
<button class="text-[10px] font-black uppercase text-stone-900 border-b border-stone-900 hover:text-primary transition-colors">Iniciar Escaneo</button>
</div>
</div>
<div class="bg-primary-container p-6 flex items-start gap-4">
<div class="w-10 h-10 bg-on-primary-container text-primary-container flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="analytics" data-weight="fill" style="font-variation-settings: 'FILL' 1;">analytics</span>
</div>
<div>
<h4 class="text-xs font-black uppercase tracking-widest mb-1 text-on-primary-container">Reporte Fiscal</h4>
<p class="text-[10px] text-on-primary-container/80 font-medium mb-3">Resumen detallado de activos y amortizaciones para declaración de ISLR.</p>
<button class="text-[10px] font-black uppercase text-on-primary-container border-b border-on-primary-container hover:scale-105 transition-transform">Descargar XLSX</button>
</div>
</div>
</section>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/activos-fijos.js"></script>
</body>
</html>