<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="LA CIMA - ADMIN FORGE v2.4 - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>LA CIMA - ADMIN FORGE v2.4 | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/flujos-aprobacion.css">
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
<main class="ml-64 min-h-screen flex flex-col">
<!-- TopAppBar (Execution from JSON) -->
<header class="fixed top-0 right-0 left-64 h-16 bg-stone-950/80 backdrop-blur-md flex justify-between items-center px-8 z-40">
<div class="flex items-center gap-8">
<span class="text-lg font-black tracking-widest text-white uppercase">MAYOR DE REPUESTO LA CIMA, C.A.</span>
<nav class="hidden lg:flex gap-6 font-['Space_Grotesk'] uppercase text-sm tracking-tight">
<a class="text-stone-500 hover:text-stone-200 transition-colors" href="#">Global View</a>
<a class="text-stone-500 hover:text-stone-200 transition-colors" href="#">System Health</a>
<a class="text-lime-400 font-bold border-b-2 border-lime-500 pb-1" href="#">Security Ops</a>
</nav>
</div>
<div class="flex items-center gap-6">
<div class="relative flex items-center bg-stone-900 px-3 py-1.5 rounded-sm">
<span class="material-symbols-outlined text-stone-500 text-sm mr-2">search</span>
<input class="bg-transparent border-none focus:ring-0 text-[10px] text-stone-300 font-mono w-48 uppercase" placeholder="SEARCH SYSTEM..." type="text"/>
</div>
<div class="flex gap-4">
<button class="material-symbols-outlined text-lime-500 hover:text-amber-500 transition-colors">notifications_active</button>
<button class="material-symbols-outlined text-lime-500 hover:text-amber-500 transition-colors">terminal</button>
</div>
<button class="bg-red-950 text-red-500 border border-red-900 px-4 py-1.5 text-[10px] font-black uppercase tracking-tighter hover:bg-red-900 hover:text-red-200 transition-all opacity-80 active:opacity-100">
                    Emergency Shutdown
                </button>
<img alt="Admin Avatar" class="w-8 h-8 rounded-full border-2 border-stone-800" data-alt="Professional headshot of a system administrator in technical attire, neutral lighting, high contrast" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAX2eCKDVIr57X-gwAXgMEMfzOlJhFeDsDhpSGE0BlTF3xQ3H9j8NRRjXeKagDacywzT9lvdkb72wdtw2txh8vUvCqtjvz7enDniPK1A4Sjy-wK0c9uTd8ymJzU8C0H5tMhzXGJENMDfCnq5BgvpmRmYTREHAMABa3vXx53AYG6T_TaU8BjooKpY3cYhjNm4FTlypDbBx6-G7a57Cx-Kq87ZNcwsMdpa7xlepaMQD6S1hSxBVf11p1iRyhDytOKkQ2zAnIH9k27a0c"/>
</div>
</header>
<!-- Canvas Content -->
<section class="mt-16 p-8 flex flex-col gap-8 flex-1">
<!-- Page Header -->
<div class="flex justify-between items-end">
<div>
<h2 class="text-4xl font-black uppercase tracking-tight text-on-surface">Organizational Forge</h2>
<p class="text-secondary font-medium tracking-tight mt-1">DEPARTMENTAL STRUCTURE &amp; APPROVAL TOPOLOGY</p>
</div>
<div class="flex gap-4">
<button class="px-6 py-2 bg-surface-container-high text-on-surface font-bold uppercase text-xs flex items-center gap-2 hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-sm">download</span> Export Schema
                    </button>
<button class="px-6 py-2 bg-primary text-on-primary font-bold uppercase text-xs flex items-center gap-2 hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-sm">add</span> New Department
                    </button>
</div>
</div>
<!-- Bento Grid Content -->
<div class="grid grid-cols-12 gap-6">
<!-- Departments List (CRUD) -->
<div class="col-span-12 lg:col-span-7 bg-surface-container-lowest p-8 flex flex-col gap-6 shadow-sm">
<div class="flex justify-between items-center">
<h3 class="headline text-xl font-bold uppercase tracking-tight">Active Departments</h3>
<span class="text-[10px] bg-primary-container px-2 py-0.5 font-black text-on-primary-container">6 MODULES DETECTED</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-[10px] uppercase font-black text-secondary tracking-widest">
<th class="p-4">Department ID</th>
<th class="p-4">Entity Name</th>
<th class="p-4">Managed By</th>
<th class="p-4">Annual Budget</th>
<th class="p-4 text-right">Utility</th>
</tr>
</thead>
<tbody class="text-sm font-medium text-on-surface">
<tr class="border-b border-surface-container transition-colors hover:bg-surface-container-low">
<td class="p-4 font-mono text-primary">DEP-VNT-01</td>
<td class="p-4">Ventas</td>
<td class="p-4 flex items-center gap-2">
<img alt="Manager" class="w-6 h-6 rounded-full" data-alt="Portrait of a business executive in professional attire" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJlRIUV_aMeyeBhsliUWLkcfpdxiUHxRFQagQ_pFnswEOff30bih_vwxa9iOVlNqw2aIV8RjNctEzWPRtqOJYTgp3PzBJgw8ObNtxqg5uFepadx0hy3NzQEOnQWtNZAuo4E6c2Dvn8gdOIwrAfUeJ6fv1GTvWrcsgI7EVMstBC5Y3daJUrQIQ9n8nfHh--NfWPt-COQHqnOiGMmIRkAcfJEWSV53GNbl9NDEJSiOiSXB1-NPYOeLP25TJp5ba4v2FcMnrxcAneVYQ"/>
                                        Ricardo M.
                                    </td>
<td class="p-4 font-mono">$2.4M</td>
<td class="p-4 text-right">
<button class="material-symbols-outlined text-secondary hover:text-primary transition-colors">edit</button>
<button class="material-symbols-outlined text-secondary hover:text-error transition-colors">delete</button>
</td>
</tr>
<tr class="bg-surface-container-low/30 border-b border-surface-container transition-colors hover:bg-surface-container-low">
<td class="p-4 font-mono text-primary">DEP-FIN-02</td>
<td class="p-4">Finanzas</td>
<td class="p-4 flex items-center gap-2">
<img alt="Manager" class="w-6 h-6 rounded-full" data-alt="Portrait of a female finance director in professional studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDL5Otv2XcxStCXzJzr1Hm5hK5vWhKJfCXMNQjn3clhEIZcKK2wqgqTEegAXE37rIfiEJZYWVdyfEPDD9WqRCjNFusdFRgyMsY46PMw5fzLu00VxEhzFNFxYAQcH0EEY-O6MQTTJSnCUe1AVJSv6gzVfn6hb2PrhAUSonKa_FRXffnoFL5Ilfuhb7hT5HUem-PTWgO0idxFlm8NoCm4gsomcOz1-fpoT5cUBqqDaFv7HaKQ1wKGZ2joqvZgBMs3Yue1cnNFDjmm7Hs"/>
                                        Elena G.
                                    </td>
<td class="p-4 font-mono">$1.1M</td>
<td class="p-4 text-right">
<button class="material-symbols-outlined text-secondary hover:text-primary transition-colors">edit</button>
<button class="material-symbols-outlined text-secondary hover:text-error transition-colors">delete</button>
</td>
</tr>
<tr class="border-b border-surface-container transition-colors hover:bg-surface-container-low">
<td class="p-4 font-mono text-primary">DEP-ALM-03</td>
<td class="p-4">Almacén</td>
<td class="p-4 flex items-center gap-2">
<img alt="Manager" class="w-6 h-6 rounded-full" data-alt="Industrial warehouse manager portrait with high-visibility gear" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTnATtUgD7dIsvFSLwget9WCdq0nxhOgarXxv2B2I1bX8zLKE8LqhtL-drdo2WbPlNwPUULGlsbqw2VWiAbbDlMNa50C0CqNVFDjsZ3IxF1EPboVx-CfAJhIouCOqH-tk8V9kZM2evpnfeqg5IRuKRUwE4hENGFSuV7AY59zC57HjlIaXuNeD4_oI6d1fWhFzA9iMQkF_kGusYCduOUy5IRVb6DepmX3zjry7HgJZWbEkARqlmUoofCkYlfY4M4AQfoEloJ4GKDr8"/>
                                        Oscar L.
                                    </td>
<td class="p-4 font-mono">$3.8M</td>
<td class="p-4 text-right">
<button class="material-symbols-outlined text-secondary hover:text-primary transition-colors">edit</button>
<button class="material-symbols-outlined text-secondary hover:text-error transition-colors">delete</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Approval Flow Visualization -->
<div class="col-span-12 lg:col-span-5 bg-surface-container p-8 flex flex-col gap-6">
<h3 class="headline text-xl font-bold uppercase tracking-tight">Approval Chains</h3>
<div class="relative border-l-2 border-dashed border-primary/30 ml-4 pl-8 py-4 space-y-8">
<!-- Step 1 -->
<div class="relative">
<div class="absolute -left-[41px] top-0 w-4 h-4 rounded-full bg-primary ring-4 ring-background"></div>
<div class="bg-surface-container-lowest p-4 shadow-sm border-l-4 border-primary">
<p class="text-[10px] font-black text-primary uppercase">Trigger Event</p>
<p class="text-sm font-bold mt-1 uppercase">Purchase Requisition &gt; $1,000</p>
</div>
</div>
<!-- Step 2 -->
<div class="relative">
<div class="absolute -left-[41px] top-0 w-4 h-4 rounded-full bg-stone-400 ring-4 ring-background"></div>
<div class="bg-surface-container-lowest p-4 shadow-sm">
<p class="text-[10px] font-black text-secondary uppercase">Level 01 Review</p>
<p class="text-sm font-bold mt-1 uppercase">Direct Supervisor Approval</p>
<p class="text-[10px] text-secondary mt-2">SLA: 24 Hours</p>
</div>
</div>
<!-- Step 3 -->
<div class="relative">
<div class="absolute -left-[41px] top-0 w-4 h-4 rounded-full bg-stone-400 ring-4 ring-background"></div>
<div class="bg-surface-container-lowest p-4 shadow-sm">
<p class="text-[10px] font-black text-secondary uppercase">Level 02 Validation</p>
<p class="text-sm font-bold mt-1 uppercase">Finance Dept. Verification</p>
<p class="text-[10px] text-secondary mt-2">Required for: DEP-VNT, DEP-ALM</p>
</div>
</div>
<!-- Step 4 -->
<div class="relative">
<div class="absolute -left-[41px] top-0 w-4 h-4 rounded-full bg-stone-900 ring-4 ring-background"></div>
<div class="bg-surface-container-highest p-4 shadow-sm">
<p class="text-[10px] font-black text-on-surface uppercase">Final Execution</p>
<p class="text-sm font-bold mt-1 uppercase">System Disbursement</p>
</div>
</div>
</div>
</div>
<!-- RACI Matrix -->
<div class="col-span-12 bg-surface-container-lowest p-8 flex flex-col gap-6 shadow-sm overflow-hidden">
<div class="flex items-center gap-4">
<h3 class="headline text-xl font-bold uppercase tracking-tight">RACI Assignment Matrix</h3>
<div class="flex gap-2">
<span class="text-[9px] px-2 py-0.5 border border-primary text-primary font-bold">R: Responsible</span>
<span class="text-[9px] px-2 py-0.5 border border-stone-300 text-secondary font-bold">A: Accountable</span>
<span class="text-[9px] px-2 py-0.5 border border-stone-300 text-secondary font-bold">C: Consulted</span>
<span class="text-[9px] px-2 py-0.5 border border-stone-300 text-secondary font-bold">I: Informed</span>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-[11px] uppercase tracking-wider border-t border-surface-container">
<thead>
<tr class="bg-surface-container-low">
<th class="p-4 text-left font-black w-1/4">Process Activity</th>
<th class="p-4 text-center">General Manager</th>
<th class="p-4 text-center">Finance Lead</th>
<th class="p-4 text-center">HR Admin</th>
<th class="p-4 text-center">IT Ops</th>
<th class="p-4 text-center">Logistics</th>
</tr>
</thead>
<tbody class="font-medium text-secondary">
<tr class="border-b border-surface-container">
<td class="p-4 text-on-surface font-bold">Strategic Budget Planning</td>
<td class="p-4 text-center font-black text-primary">A</td>
<td class="p-4 text-center font-black text-primary">R</td>
<td class="p-4 text-center">C</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center">C</td>
</tr>
<tr class="border-b border-surface-container bg-surface-container-low/20">
<td class="p-4 text-on-surface font-bold">Inventory Procurement</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center">C</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center">C</td>
<td class="p-4 text-center font-black text-primary">R/A</td>
</tr>
<tr class="border-b border-surface-container">
<td class="p-4 text-on-surface font-bold">Security Audit Protocol</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center font-black text-primary">A</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center font-black text-primary">R</td>
<td class="p-4 text-center">C</td>
</tr>
<tr class="border-b border-surface-container bg-surface-container-low/20">
<td class="p-4 text-on-surface font-bold">Employee Onboarding</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center">I</td>
<td class="p-4 text-center font-black text-primary">R/A</td>
<td class="p-4 text-center">C</td>
<td class="p-4 text-center">I</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Budget Tracking (Technical Visualization) -->
<div class="col-span-12 lg:col-span-6 bg-stone-900 p-8 text-white">
<h3 class="headline text-xl font-bold uppercase tracking-tight text-lime-400 mb-6">Budget Consumption Monitor</h3>
<div class="space-y-6">
<div>
<div class="flex justify-between text-[10px] mb-2 uppercase font-bold tracking-widest">
<span>Ventas (DEP-VNT-01)</span>
<span class="text-lime-400">72% Consumed</span>
</div>
<div class="h-2 bg-stone-800 rounded-full overflow-hidden">
<div class="h-full bg-lime-500" style="width: 72%"></div>
</div>
</div>
<div>
<div class="flex justify-between text-[10px] mb-2 uppercase font-bold tracking-widest">
<span>Almacén (DEP-ALM-03)</span>
<span class="text-amber-500">91% Warning</span>
</div>
<div class="h-2 bg-stone-800 rounded-full overflow-hidden">
<div class="h-full bg-amber-500" style="width: 91%"></div>
</div>
</div>
<div>
<div class="flex justify-between text-[10px] mb-2 uppercase font-bold tracking-widest">
<span>Finanzas (DEP-FIN-02)</span>
<span class="text-blue-400">34% Optimal</span>
</div>
<div class="h-2 bg-stone-800 rounded-full overflow-hidden">
<div class="h-full bg-blue-400" style="width: 34%"></div>
</div>
</div>
</div>
</div>
<!-- Quick Actions / Meta -->
<div class="col-span-12 lg:col-span-6 flex flex-col gap-4">
<div class="bg-primary-container p-6 flex items-center justify-between group cursor-pointer transition-all">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-3xl text-on-primary-container">schema</span>
<div>
<p class="text-xs font-black uppercase text-on-primary-container">Topology View</p>
<p class="text-sm font-medium">Render interactive org chart 3D</p>
</div>
</div>
<span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward_ios</span>
</div>
<div class="bg-surface-container-highest p-6 flex items-center justify-between group cursor-pointer">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-3xl text-secondary">history</span>
<div>
<p class="text-xs font-black uppercase text-secondary">Change Log</p>
<p class="text-sm font-medium">Last modification: 2h ago by r.mercado</p>
</div>
</div>
<span class="material-symbols-outlined">description</span>
</div>
</div>
</div>
</section>
<!-- Footer -->
<footer class="mt-auto bg-stone-950 px-8 py-12 text-stone-500">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12">
<div class="col-span-1 md:col-span-2">
<h4 class="text-white font-black text-xl tracking-tighter uppercase mb-4">MAYOR DE REPUESTO LA CIMA, C.A.</h4>
<p class="text-xs leading-relaxed max-w-md uppercase tracking-tight">
                        Engineered for heavy-duty industrial commerce. Specialized in precision engine parts and logistical excellence. 
                        Operated under Admin Forge v2.4 protocols for maximum organizational efficiency.
                    </p>
</div>
<div>
<h5 class="text-[10px] font-black text-stone-300 uppercase tracking-widest mb-4">Legal Framework</h5>
<ul class="text-[10px] space-y-2 uppercase tracking-tight font-medium">
<li><a class="hover:text-lime-400 transition-colors" href="#">Privacy &amp; Data Governance</a></li>
<li><a class="hover:text-lime-400 transition-colors" href="#">Terms of Digital Operation</a></li>
<li><a class="hover:text-lime-400 transition-colors" href="#">Industrial Compliance 2024</a></li>
</ul>
</div>
<div>
<h5 class="text-[10px] font-black text-stone-300 uppercase tracking-widest mb-4">Registry Info</h5>
<p class="text-[10px] uppercase font-mono">RIF: J-00000000-0</p>
<p class="text-[10px] uppercase font-mono mt-1">SNC Registry: #LM-9942</p>
<div class="mt-6 flex gap-4">
<span class="material-symbols-outlined text-stone-600">verified</span>
<span class="material-symbols-outlined text-stone-600">shield</span>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-stone-900 flex justify-between items-center">
<p class="text-[10px] uppercase tracking-widest">© 2024 LA CIMA. ALL RIGHTS RESERVED. PRECISION SYSTEM INTERFACE.</p>
<div class="flex gap-2">
<div class="w-2 h-2 rounded-full bg-lime-500 animate-pulse"></div>
<span class="text-[9px] uppercase font-bold text-lime-600">Secure Link Established</span>
</div>
</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/flujos-aprobacion.js"></script>
</body>
</html>