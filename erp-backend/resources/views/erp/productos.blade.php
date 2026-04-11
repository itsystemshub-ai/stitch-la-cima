<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Inventario | Mayor de Repuesto LA CIMA, C.A. - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Inventario | Mayor de Repuesto LA CIMA, C.A. | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('erp/css/common.css') }}">
<link rel="stylesheet" href="{{ asset('erp/css/productos.css') }}">
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
  <!-- Logo -->
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

  <!-- Busqueda -->
  <div class="px-4 mb-4">
    <div class="relative">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
        <span class="material-symbols-outlined text-lg">search</span>
      </span>
      <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar..." type="text"/>
    </div>
  </div>

  <!-- Menu Principal -->
  <nav class="flex-1 px-3 space-y-0.5 pb-24">

    <!-- INICIO -->
  <a href="{{ url('/erp/inicio') }}" class="menu-item menu-item-inactive flex items-center gap-3 px-4 py-2 transition-colors">
    <span class="material-symbols-outlined text-[20px]" aria-hidden="true">dashboard</span>
    <span class="flex-1">Dashboard</span>
    <span class="material-symbols-outlined dropdown-arrow text-[18px]">chevron_right</span>
  </a>

    <!-- INVENTARIO -->
    <div class="menu-parent">
      <div class="menu-item menu-item-active" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span>
        <span>Inventario</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu block">
        <a href="{{ url('/erp/inventario') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/productos') }}" class="font-bold text-primary"><span class="material-symbols-outlined">category</span> Productos</a>
        <a href="{{ url('/erp/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        <a href="{{ url('/erp/auditoria-inventario') }}"><span class="material-symbols-outlined">assignment</span> Auditoría Física</a>
        <a href="{{ url('/erp/ajustes-inventario') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
        <a href="{{ url('/erp/reportes-inventario') }}"><span class="material-symbols-outlined">analytics</span> Reportes</a>
      </div>
    </div>

    <!-- VENTAS -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">payments</span>
        <span>Ventas</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/ventas') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/pos') }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
        <a href="{{ url('/erp/registro-ventas') }}"><span class="material-symbols-outlined">list_alt</span> Registro</a>
        <a href="{{ url('/erp/factura-electronica') }}"><span class="material-symbols-outlined">receipt</span> Factura Electrónica</a>
        <a href="{{ url('/erp/facturas-emitidas') }}"><span class="material-symbols-outlined">description</span> Facturas Emitidas</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/notas-credito') }}"><span class="material-symbols-outlined">redo</span> Notas de Crédito</a>
        <a href="{{ url('/erp/clientes') }}"><span class="material-symbols-outlined">people</span> Clientes</a>
        <a href="{{ url('/erp/vendedores') }}"><span class="material-symbols-outlined">badge</span> Vendedores</a>
        <a href="{{ url('/erp/reportes-ventas') }}"><span class="material-symbols-outlined">bar_chart</span> Reportes</a>
      </div>
    </div>

    <!-- COMPRAS -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
        <span>Compras</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/compras') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/proveedores') }}"><span class="material-symbols-outlined">local_shipping</span> Proveedores</a>
        <a href="{{ url('/erp/historial-compras') }}"><span class="material-symbols-outlined">history</span> Historial</a>
        <a href="{{ url('/erp/factura-compra') }}"><span class="material-symbols-outlined">request_quote</span> Factura Compra</a>
        <a href="{{ url('/erp/libro-compras') }}"><span class="material-symbols-outlined">book</span> Libro Compras</a>
        <a href="{{ url('/erp/reportes-compras') }}"><span class="material-symbols-outlined">stacked_bar_chart</span> Reportes</a>
      </div>
    </div>

    <!-- CONTABILIDAD -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">account_balance</span>
        <span>Contabilidad</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/contabilidad') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/plan-cuentas') }}"><span class="material-symbols-outlined">format_list_numbered</span> Plan Cuentas</a>
        <a href="{{ url('/erp/libro-diario') }}"><span class="material-symbols-outlined">menu_book</span> Libro Diario</a>
        <a href="{{ url('/erp/libro-ventas') }}"><span class="material-symbols-outlined">chrome_reader_mode</span> Libro Ventas</a>
        <a href="{{ url('/erp/libro-caja') }}"><span class="material-symbols-outlined">savings</span> Libro Caja</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/balance-general') }}"><span class="material-symbols-outlined">balance</span> Balance General</a>
        <a href="{{ url('/erp/balance-comprobacion') }}"><span class="material-symbols-outlined">scale</span> Balance Comprob.</a>
        <a href="{{ url('/erp/estado-resultados') }}"><span class="material-symbols-outlined">monitoring</span> Estado Resultados</a>
        <a href="{{ url('/erp/declaracion-iva') }}"><span class="material-symbols-outlined">gavel</span> Declaración IVA</a>
        <a href="{{ url('/erp/cierre-contable') }}"><span class="material-symbols-outlined">lock_clock</span> Cierre Contable</a>
        <a href="{{ url('/erp/libros-legales') }}"><span class="material-symbols-outlined">law</span> Libros Legales</a>
        <a href="{{ url('/erp/reportes-contables') }}"><span class="material-symbols-outlined">pie_chart</span> Reportes</a>
      </div>
    </div>

    <!-- FINANZAS -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">monetization_on</span>
        <span>Finanzas</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/finanzas') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/activos-fijos') }}"><span class="material-symbols-outlined">corporate_fare</span> Activos Fijos</a>
        <a href="{{ url('/erp/cuentas-cobrar') }}"><span class="material-symbols-outlined">account_balance_wallet</span> Cuentas Cobrar</a>
        <a href="{{ url('/erp/reportes-financieros') }}"><span class="material-symbols-outlined">show_chart</span> Reportes</a>
      </div>
    </div>

    <!-- RRHH -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">groups</span>
        <span>RRHH</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/rrhh') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/empleados') }}"><span class="material-symbols-outlined">person</span> Empleados</a>
        <a href="{{ url('/erp/nomina') }}"><span class="material-symbols-outlined">payments</span> Nómina</a>
        <a href="{{ url('/erp/prestaciones') }}"><span class="material-symbols-outlined">savings</span> Prestaciones</a>
        <a href="{{ url('/erp/portal-empleado') }}"><span class="material-symbols-outlined">person_outline</span> Portal Empleado</a>
        <a href="{{ url('/erp/rendimiento-anual') }}"><span class="material-symbols-outlined">emoji_events</span> Rendimiento</a>
        <a href="{{ url('/erp/reportes-rrhh') }}"><span class="material-symbols-outlined">group_work</span> Reportes</a>
      </div>
    </div>

    <!-- CONFIGURACIÓN -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">settings</span>
        <span>Configuración</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/configuracion') }}"><span class="material-symbols-outlined">business</span> Empresa</a>
        <a href="{{ url('/erp/parametros') }}"><span class="material-symbols-outlined">tune</span> Parámetros</a>
        <a href="{{ url('/erp/config-fiscal') }}"><span class="material-symbols-outlined">policy</span> Config Fiscal</a>
        <a href="{{ url('/erp/usuarios-roles') }}"><span class="material-symbols-outlined">admin_panel_settings</span> Usuarios</a>
        <a href="{{ url('/erp/base-datos') }}"><span class="material-symbols-outlined">storage</span> Base Datos</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/backups') }}"><span class="material-symbols-outlined">backup</span> Backups</a>
        <a href="{{ url('/erp/estado-sistema') }}"><span class="material-symbols-outlined">health_and_safety</span> Estado Sistema</a>
        <a href="{{ url('/erp/tareas-programadas') }}"><span class="material-symbols-outlined">schedule</span> Tareas</a>
        <a href="{{ url('/erp/auditoria-seguridad') }}"><span class="material-symbols-outlined">security</span> Auditoría</a>
      </div>
    </div>

    <!-- AYUDA -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">help</span>
        <span>Ayuda</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/ayuda') }}"><span class="material-symbols-outlined">help</span> Centro Ayuda</a>
        <a href="{{ url('/erp/tickets-soporte') }}"><span class="material-symbols-outlined">confirmation_number</span> Tickets</a>
        <a href="{{ url('/erp/crear-ticket') }}"><span class="material-symbols-outlined">add_circle</span> Crear Ticket</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/chat-asistencia') }}"><span class="material-symbols-outlined">chat</span> Chat</a>
        <a href="{{ url('/erp/base-conocimiento') }}"><span class="material-symbols-outlined">school</span> Conocimiento</a>
        <a href="{{ url('/erp/manual-tecnico') }}"><span class="material-symbols-outlined">description</span> Manual</a>
      </div>
    </div>
  </nav>

  <!-- Boton Cerrar Sesion -->
  <div class="mt-auto border-t border-stone-200 p-4">
    <button onclick="localStorage.removeItem('erp_session'); window.location.href='{{ url('/auth/login') }}';" class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-sm">
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
        <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900">Inicio</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-stone-900 font-medium" id="breadcrumbPage">Productos</span>
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
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-10 flex-1">
        <!-- Page Title -->
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-6xl font-black text-stone-900 uppercase tracking-tighter mb-4 leading-none">Inventory Management</h2>
                <div class="flex items-center gap-6">
                    <div class="h-2 w-24 bg-primary"></div>
                    <span class="text-on-surface-variant text-xs font-black uppercase tracking-[0.4em]">Global Stock Control v4.2</span>
                </div>
            </div>
            <button class="bg-stone-900 text-primary px-10 py-5 text-[10px] font-black uppercase tracking-[0.2em] flex items-center gap-4 hover:bg-primary hover:text-stone-900 transition-all shadow-xl">
                <span class="material-symbols-outlined font-black">add</span>
                New Product Entry
            </button>
        </div>

        <!-- Metric Bento -->
        <div class="grid grid-cols-4 gap-6 mb-10">
            <div class="bg-surface border border-outline p-8 group hover:bg-stone-900 transition-all">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Category Filter</p>
                <select class="bg-transparent border-none text-stone-900 group-hover:text-white text-2xl font-black p-0 focus:ring-0 uppercase tracking-tighter w-full cursor-pointer">
                    <option class="bg-surface">ALL MOTOR PARTS</option>
                    <option class="bg-surface">CYLINDER HEADS</option>
                    <option class="bg-surface">PISTON KITS</option>
                    <option class="bg-surface">CRANKSHAFTS</option>
                </select>
            </div>
            <div class="bg-surface border border-outline p-8 group hover:bg-stone-900 transition-all">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Brand Line</p>
                <select class="bg-transparent border-none text-stone-900 group-hover:text-white text-2xl font-black p-0 focus:ring-0 uppercase tracking-tighter w-full cursor-pointer">
                    <option class="bg-surface">ANY BRAND</option>
                    <option class="bg-surface">CUMMINS HEAVY</option>
                    <option class="bg-surface">CATERPILLAR GEN</option>
                    <option class="bg-surface">PERKINS IND</option>
                </select>
            </div>
            <div class="bg-surface border border-outline p-8">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mb-6">Stock Health</p>
                <div class="flex items-center gap-4">
                    <div class="w-3 h-3 rounded-full bg-[#FFB300] animate-pulse"></div>
                    <span class="text-stone-900 text-2xl font-black tracking-tighter uppercase">LOW STOCK (4)</span>
                </div>
            </div>
            <div class="bg-stone-900 border border-primary/20 p-8 flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#ceff5e 1px, transparent 1px); background-size: 10px 10px;"></div>
                <div class="text-center z-10">
                    <p class="text-[42px] font-black text-primary leading-none tracking-tighter">1,402</p>
                    <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em] mt-3">Total SKU Count</p>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="bg-surface border border-outline overflow-hidden rounded-sm shadow-2xl">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-stone-900">
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline">SKU Code</th>
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline">Component Name</th>
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline">Category</th>
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline">Stock Status</th>
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline text-right">Cost (USD)</th>
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline text-right">Price + IVA</th>
                            <th class="p-6 text-xs font-black text-stone-400 uppercase tracking-[0.2em] border-b border-outline text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline">
                        <!-- Product Row 1 -->
                        <tr class="hover:bg-stone-50 transition-colors group">
                            <td class="p-6 text-sm font-black text-stone-900 tracking-widest">#CP-8842-12</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-stone-900 uppercase tracking-tight">Cylinder Head Gasket</p>
                                <p class="text-xs text-on-surface-variant font-bold uppercase tracking-widest mt-1">Cummins ISX Series</p>
                            </td>
                            <td class="p-6">
                                <span class="bg-stone-100 border border-stone-200 text-on-surface-variant text-xs font-black px-3 py-1 uppercase tracking-widest">Engine Seals</span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-stone-100 h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full">
                                        <div class="bg-primary h-full w-[85%]"></div>
                                    </div>
                                    <span class="text-[11px] font-black text-stone-900 tracking-widest">42 <span class="text-on-surface-variant font-bold text-[9px]">/ 50</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$124.50</td>
                            <td class="p-6 text-right text-sm font-black text-stone-900 tracking-tighter">$144.42</td>
                            <td class="p-6">
                                <div class="flex justify-center gap-3">
                                    <button class="p-2 text-on-surface-variant hover:text-stone-900 transition-all"><span class="material-symbols-outlined text-lg">edit</span></button>
                                    <button class="p-2 text-on-surface-variant hover:text-stone-900 transition-all"><span class="material-symbols-outlined text-lg">archive</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Product Row 2 (Critical) -->
                        <tr class="bg-red-50 hover:bg-red-100 transition-colors border-l-4 border-red-500">
                            <td class="p-6 text-sm font-black text-red-500 tracking-widest">#PK-1102-X</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-stone-900 uppercase tracking-tight">Main Bearing Set</p>
                                <p class="text-[9px] text-red-500/60 font-medium uppercase tracking-widest mt-1">Perkins 1104D-44TA</p>
                            </td>
                            <td class="p-6">
                                <span class="bg-red-500/10 border border-red-500/20 text-red-500 text-[9px] font-black px-3 py-1 uppercase tracking-widest">Internal Parts</span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-stone-100 h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full">
                                        <div class="bg-red-500 h-full w-[15%]"></div>
                                    </div>
                                    <span class="text-[11px] font-black text-red-500 tracking-widest">03 <span class="text-red-500/40 font-bold text-[9px]">/ 20</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$82.00</td>
                            <td class="p-6 text-right text-sm font-black text-stone-900 tracking-tighter">$95.12</td>
                            <td class="p-6 text-center">
                                <span class="material-symbols-outlined text-red-500 text-lg animate-pulse" style="font-variation-settings: 'FILL' 1;">error</span>
                            </td>
                        </tr>
                        <!-- Product Row 3 -->
                        <tr class="hover:bg-stone-50 transition-colors group">
                            <td class="p-6 text-sm font-black text-stone-900 tracking-widest">#FP-9931-B</td>
                            <td class="p-6">
                                <p class="text-sm font-black text-stone-900 uppercase tracking-tight">Fuel Injection Pump</p>
                                <p class="text-[9px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">Bosch Heavy Duty</p>
                            </td>
                            <td class="p-6"><span class="bg-stone-100 border border-stone-200 text-on-surface-variant text-[9px] font-black px-3 py-1 uppercase tracking-widest">Fuel Systems</span></td>
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1 bg-stone-100 h-1.5 max-w-[100px] border border-outline overflow-hidden rounded-full"><div class="bg-primary h-full w-[60%]"></div></div>
                                    <span class="text-[11px] font-black text-stone-900 tracking-widest">08 <span class="text-on-surface-variant font-bold text-[9px]">/ 12</span></span>
                                </div>
                            </td>
                            <td class="p-6 text-right text-sm font-black text-on-surface-variant tracking-tighter">$1,840.00</td>
                            <td class="p-6 text-right text-sm font-black text-stone-900 tracking-tighter">$2,134.40</td>
                            <td class="p-6 text-center text-on-surface-variant"><span class="material-symbols-outlined text-lg">edit</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-8 py-6 bg-stone-50 border-t border-outline flex justify-between items-center">
                <p class="text-[9px] text-on-surface-variant font-black uppercase tracking-[0.3em]">Showing 15 of 1,402 line items</p>
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">1</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-primary text-stone-900 text-xs font-black">2</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">3</button>
                    <span class="flex items-center px-4 text-outline">...</span>
                    <button class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">94</button>
                </div>
            </div>
        </div>

        <!-- Summary Statistics -->
        <div class="grid grid-cols-12 gap-8 mt-12">
            <div class="col-span-8 bg-stone-900 border-l-8 border-primary p-10 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-[0.02] transform translate-x-1/4 -translate-y-1/4 scale-150">
                    <span class="material-symbols-outlined text-[300px]">precision_manufacturing</span>
                </div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black text-white uppercase tracking-tighter mb-4">Active Inventory Value</h3>
                    <p class="text-[10px] text-on-surface-variant font-black uppercase tracking-[0.4em] mb-8">Live Warehouse Appraisal System</p>
                    <div class="flex items-baseline gap-4">
                        <span class="text-6xl font-black text-primary tracking-tighter">$1,452,310.00</span>
                        <span class="text-sm font-black text-on-surface-variant uppercase tracking-widest">USD</span>
                    </div>
                </div>
            </div>
            
            <div class="col-span-4 bg-surface border-l-8 border-[#FFB300] p-10 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-black text-stone-900 uppercase tracking-tighter mb-8 leading-none">Restock Pipeline</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-outline pb-4">
                            <span class="text-[10px] text-on-surface-variant font-black uppercase tracking-widest">Critical Low SKUs</span>
                            <span class="bg-[#FFB300] text-black text-[10px] font-black px-3 py-1 uppercase tracking-widest">04 SKUs</span>
                        </div>
                    </div>
                </div>
                <button class="w-full py-5 bg-stone-900 border border-[#FFB300]/20 text-[10px] font-black uppercase text-[#FFB300] tracking-[0.2em] hover:bg-[#FFB300] hover:text-black transition-all">
                    Generate Restock Report
                </button>
            </div>
        </div>
    </main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="{{ asset('erp/js/common.js') }}"></script>
<script src="{{ asset('erp/js/productos.js') }}"></script>
</body>
</html>
