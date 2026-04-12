<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="METALLIC_CORE_ERP - Libro de Compras Fiscal - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>METALLIC_CORE_ERP - Libro de Compras Fiscal | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/libro-compras.css">
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
<main class="lg:ml-64 pt-24 pb-12 px-6 min-h-screen">
<!-- Dashboard Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
<div class="space-y-1">
<h1 class="text-4xl font-headline font-bold uppercase tracking-tighter text-white">Libro de Compras Fiscal</h1>
<p class="text-stone-500 font-mono text-sm">CONTROL FISCAL PERIODICIDAD MENSUAL - ART. 75 RIVA</p>
</div>
<div class="flex gap-3">
<button class="bg-stone-800 hover:bg-stone-700 text-stone-200 px-6 py-2 font-headline uppercase text-xs tracking-widest transition-all scale-95 active:scale-90 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">download</span>
                    Exportar a Excel (SheetJS)
                </button>
<button class="bg-lime-400 hover:bg-lime-300 text-stone-950 px-6 py-2 font-headline font-bold uppercase text-xs tracking-widest transition-all scale-95 active:scale-90 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">lock</span>
                    Cerrar Período Mensual
                </button>
</div>
</div>
<!-- Filter Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-stone-900 p-6 border-l-2 border-lime-400">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">Total Base Imponible</div>
<div class="text-2xl font-headline font-bold text-white">45.290,50 <span class="text-stone-500 text-xs">VED</span></div>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">Total IVA (16%)</div>
<div class="text-2xl font-headline font-bold text-white">7.246,48 <span class="text-stone-500 text-xs">VED</span></div>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">IVA Retenido</div>
<div class="text-2xl font-headline font-bold text-lime-400">5.434,86 <span class="text-stone-500 text-xs">VED</span></div>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-lime-400/50">
<div class="text-stone-500 font-headline uppercase text-[10px] tracking-widest mb-1">Total Compras</div>
<div class="text-2xl font-headline font-bold text-white">52.536,98 <span class="text-stone-500 text-xs">VED</span></div>
</div>
</div>
<!-- Fiscal Table Section -->
<div class="bg-stone-900 shadow-2xl overflow-hidden">
<div class="p-4 border-b border-stone-800 flex justify-between items-center bg-stone-950/40">
<div class="flex gap-4">
<select class="bg-stone-800 border-none text-[10px] font-headline uppercase tracking-widest text-stone-300 focus:ring-1 focus:ring-lime-400 pr-8">
<option>Octubre 2023</option>
<option>Septiembre 2023</option>
</select>
<div class="flex items-center gap-2 px-3 py-1 bg-stone-800 text-[10px] font-headline uppercase tracking-widest text-lime-400">
<span class="w-1.5 h-1.5 bg-lime-400 rounded-full animate-pulse"></span>
                        Estado: Abierto
                    </div>
</div>
<div class="text-stone-500 text-[10px] font-mono">MOSTRANDO 24 REGISTROS DE COMPRA</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-950 text-stone-400 font-headline text-[10px] uppercase tracking-widest">
<th class="px-4 py-4 font-medium border-b border-stone-800">Fecha</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">RIF Proveedor</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Nombre Proveedor</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Nro Factura</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Nro Control</th>
<th class="px-4 py-4 font-medium border-b border-stone-800 text-right">Base Imponible</th>
<th class="px-4 py-4 font-medium border-b border-stone-800 text-right">IVA (16%)</th>
<th class="px-4 py-4 font-medium border-b border-stone-800">Retención</th>
<th class="px-4 py-4 font-medium border-b border-stone-800 text-right">Total</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-800/50 font-mono text-[11px]">
<!-- Row 1 -->
<tr class="hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">12/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">J-31456789-0</td>
<td class="px-4 py-3 text-stone-300 uppercase">Siderúrgica del Turbo C.A.</td>
<td class="px-4 py-3 text-stone-400">00045612</td>
<td class="px-4 py-3 text-stone-400">00-998811</td>
<td class="px-4 py-3 text-right text-stone-300">12.500,00</td>
<td class="px-4 py-3 text-right text-stone-300">2.000,00</td>
<td class="px-4 py-3">
<span class="bg-stone-800 px-2 py-0.5 rounded text-[9px] text-lime-400">2023100045</span>
</td>
<td class="px-4 py-3 text-right text-white font-bold">14.500,00</td>
</tr>
<!-- Row 2 -->
<tr class="bg-stone-950/20 hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">15/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">J-00123456-7</td>
<td class="px-4 py-3 text-stone-300 uppercase">Tecnología de Motores V8</td>
<td class="px-4 py-3 text-stone-400">00008922</td>
<td class="px-4 py-3 text-stone-400">00-004512</td>
<td class="px-4 py-3 text-right text-stone-300">5.200,00</td>
<td class="px-4 py-3 text-right text-stone-300">832,00</td>
<td class="px-4 py-3">
<span class="bg-stone-800 px-2 py-0.5 rounded text-[9px] text-lime-400">2023100046</span>
</td>
<td class="px-4 py-3 text-right text-white font-bold">6.032,00</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">18/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">J-40552147-1</td>
<td class="px-4 py-3 text-stone-300 uppercase">Lubricantes Industriales X</td>
<td class="px-4 py-3 text-stone-400">00012399</td>
<td class="px-4 py-3 text-stone-400">00-112233</td>
<td class="px-4 py-3 text-right text-stone-300">2.100,50</td>
<td class="px-4 py-3 text-right text-stone-300">336,08</td>
<td class="px-4 py-3">
<span class="bg-stone-800 px-2 py-0.5 rounded text-[9px] text-lime-400">2023100047</span>
</td>
<td class="px-4 py-3 text-right text-white font-bold">2.436,58</td>
</tr>
<!-- Row 4 -->
<tr class="bg-stone-950/20 hover:bg-stone-800/40 transition-colors group">
<td class="px-4 py-3 text-stone-300">22/10/2023</td>
<td class="px-4 py-3 text-lime-400 font-bold">G-20000001-1</td>
<td class="px-4 py-3 text-stone-300 uppercase">Alcaldía de Municipio Industrial</td>
<td class="px-4 py-3 text-stone-400">F-88120</td>
<td class="px-4 py-3 text-stone-400">N/A</td>
<td class="px-4 py-3 text-right text-stone-300">800,00</td>
<td class="px-4 py-3 text-right text-stone-300">0,00</td>
<td class="px-4 py-3 text-stone-600 italic">EXENTO</td>
<td class="px-4 py-3 text-right text-white font-bold">800,00</td>
</tr>
</tbody>
<tfoot>
<tr class="bg-stone-950 border-t-2 border-lime-400/50 font-headline uppercase text-[10px] tracking-widest text-white">
<td class="px-4 py-4 text-right font-bold" colspan="5">Totales de Período</td>
<td class="px-4 py-4 text-right font-bold border-l border-stone-800">45.290,50</td>
<td class="px-4 py-4 text-right font-bold border-l border-stone-800">7.246,48</td>
<td class="px-4 py-4 border-l border-stone-800"></td>
<td class="px-4 py-4 text-right font-bold border-l border-stone-800 text-lime-400">52.536,98</td>
</tr>
</tfoot>
</table>
</div>
</div>
<!-- Footnotes / Compliance -->
<div class="mt-8 flex flex-col md:flex-row justify-between items-start gap-6">
<div class="max-w-2xl">
<h3 class="text-xs font-headline font-bold text-stone-400 uppercase tracking-widest mb-2">Declaración de Cumplimiento</h3>
<p class="text-[10px] text-stone-500 leading-relaxed font-body">
                    Este reporte ha sido generado bajo los lineamientos establecidos en la Providencia Administrativa SNAT/2011/00071 dictada por el SENIAT. Los datos aquí contenidos reflejan la operatividad fiscal de la empresa según el Artículo 75 del Reglamento General de la Ley de Impuesto al Valor Agregado. Cualquier modificación posterior al cierre del período requerirá la emisión de una declaración sustitutiva ante el portal fiscal.
                </p>
</div>
<div class="flex items-center gap-4 bg-stone-900 p-4 border border-stone-800">
<div class="text-right">
<div class="text-[9px] text-stone-500 uppercase tracking-widest">Sello Digital de Integridad</div>
<div class="text-[10px] font-mono text-lime-400">SHA256: 8f2a...1e4c</div>
</div>
<div class="w-12 h-12 border border-stone-700 p-1">
<img alt="Digital Seal" class="w-full h-full opacity-50" data-alt="Abstract geometric QR-like code icon in lime green and charcoal gray representing a digital fiscal security seal" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeycSSCDPz1Rn_yViXxosODPq4PPfcufik4ezJTpsLut0PCx8anvncDVqhhltI_Xv3ci2NS7YXEjuRX4CxsC8sYD5tNIE21S-Mejz4iEQ67w5Zj6VcBcoztCJ1Lb1D-mubVuvpbka77_jbTqTEkMIbVOT7VdbzVstM0Km_KiO_DfUIUMehhpkxf7yiRhmf7HKvVO22gpfpgLLvPqpjG-7gACrbNTbAm8tBNYJL86uSsXjOpfNIY9pXijoqVD0Aw0m0504drjhnKDM"/>
</div>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/libro-compras.js"></script>
</body>
</html>