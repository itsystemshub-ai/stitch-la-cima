<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="INDUSTRIAL FORGE ERP - HR Reporting Center - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>INDUSTRIAL FORGE ERP - HR Reporting Center | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/reportes-rrhh.css">
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
<main class="flex-1 min-h-screen p-8 lg:p-12 overflow-x-hidden">
<!-- Header Section -->
<div class="mb-12 border-l-8 border-primary pl-6">
<h1 class="text-5xl font-['Space_Grotesk'] font-bold uppercase tracking-tighter text-on-surface mb-2">HR REPORTING CENTER</h1>
<p class="text-secondary font-['Inter'] uppercase text-xs tracking-[0.3em] font-semibold">Industrial Force HR Management / Reporting Suite V2.4</p>
</div>
<!-- Dashboard Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
<!-- Payroll Overview -->
<div class="md:col-span-2 bg-surface-container-lowest p-8 rounded-none relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 -mr-16 -mt-16 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
<div class="flex justify-between items-start relative z-10 mb-8">
<div>
<span class="text-[10px] font-bold tracking-widest text-primary uppercase">Financial Period: OCT 2023</span>
<h3 class="text-2xl font-headline font-bold uppercase mt-1">Payroll Distribution</h3>
</div>
<span class="material-symbols-outlined text-primary text-4xl">payments</span>
</div>
<div class="flex items-end gap-4 mb-6">
<span class="text-5xl font-headline font-bold">$428,950</span>
<span class="text-lime-600 font-bold mb-2 flex items-center text-sm"><span class="material-symbols-outlined text-sm">arrow_upward</span> 3.2%</span>
</div>
<div class="grid grid-cols-2 gap-4 border-t border-surface-container pt-6">
<div>
<p class="text-[10px] text-secondary uppercase font-bold tracking-tighter">Direct Labor</p>
<p class="font-headline font-bold text-lg">$312,400</p>
</div>
<div>
<p class="text-[10px] text-secondary uppercase font-bold tracking-tighter">Administrative</p>
<p class="font-headline font-bold text-lg">$116,550</p>
</div>
</div>
</div>
<!-- Compliance Box -->
<div class="bg-surface-container-high p-8 flex flex-col justify-between">
<div>
<h3 class="text-lg font-headline font-bold uppercase mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified_user</span> 
                            Compliance
                        </h3>
<div class="space-y-4">
<div class="flex justify-between items-center">
<span class="text-xs font-bold font-['Inter']">IVSS</span>
<span class="px-2 py-0.5 bg-lime-500 text-[10px] font-black text-on-primary">VALID</span>
</div>
<div class="flex justify-between items-center">
<span class="text-xs font-bold font-['Inter']">INCES</span>
<span class="px-2 py-0.5 bg-lime-500 text-[10px] font-black text-on-primary">VALID</span>
</div>
<div class="flex justify-between items-center">
<span class="text-xs font-bold font-['Inter']">FAOV</span>
<span class="px-2 py-0.5 bg-amber-500 text-[10px] font-black text-white">RENEWAL</span>
</div>
</div>
</div>
<button class="text-[10px] font-bold text-primary text-left uppercase tracking-widest mt-8 flex items-center gap-2 group">
                        VIEW CERTIFICATES <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</div>
<!-- Turnover Metric -->
<div class="bg-primary text-on-primary p-8 flex flex-col justify-center items-center text-center">
<span class="text-[10px] font-black tracking-[0.2em] uppercase mb-2 opacity-80">Employee Turnover</span>
<span class="text-7xl font-headline font-bold leading-none">4.2%</span>
<span class="text-xs font-medium mt-2 opacity-80 italic">Industry Benchmark: 8.5%</span>
<div class="w-full bg-on-primary/20 h-1 mt-6">
<div class="bg-on-primary h-full w-[42%]"></div>
</div>
</div>
</div>
<!-- Secondary Layout: Performance & Accruals -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Performance Summaries (Asymmetric Layout) -->
<div class="lg:col-span-2 space-y-6">
<div class="flex justify-between items-end mb-4">
<h2 class="text-2xl font-headline font-bold uppercase tracking-tight">Performance Summaries</h2>
<span class="text-xs font-bold text-secondary uppercase tracking-widest">Q3 Engineering Division</span>
</div>
<div class="space-y-4">
<!-- Employee Card 1 -->
<div class="bg-surface-container-low p-6 flex items-center gap-6 group hover:bg-surface-container transition-colors border-l-4 border-transparent hover:border-primary">
<img class="w-16 h-16 object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="close-up portrait of a female industrial engineer wearing safety goggles and a hard hat in a workshop background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcYX_zLz4F-DIHW5ZLEjUqYN4nGjcTEtmmOwH0_DUiakbBAy0CUGvFTaPoZZyGtOxzjzlyWX--jlhduQDi4no6mq7_Un77OIrXmNKwpcdU_BKEOzbYhFcfo0FSDMYOiDPk47P0QXv_CS4QtD-5of3womt9KzZAF6ysXeg3OlTUILC0LxCswoAxkJG32I4_16V1y1ZBPzB67zQi62CN-Ng330sX-J3JBrzEUFdYnMrwpyiVzVy9lGfqx--YA_34tRuz-Z4ybqDx7O8"/>
<div class="flex-1">
<div class="flex justify-between">
<h4 class="font-headline font-bold uppercase text-lg">Elena Rodriguez</h4>
<span class="text-[10px] font-bold text-primary">PROJECT LEAD</span>
</div>
<p class="text-xs text-secondary mt-1 max-w-md">Exceeded Q3 production targets by 15%. Demonstrated exceptional lead in the Forge-X integration project.</p>
</div>
<div class="text-right">
<p class="text-[10px] text-secondary uppercase font-bold">Rating</p>
<p class="text-2xl font-headline font-bold text-primary">4.9</p>
</div>
</div>
<!-- Employee Card 2 -->
<div class="bg-surface-container-low p-6 flex items-center gap-6 group hover:bg-surface-container transition-colors border-l-4 border-transparent hover:border-primary">
<img class="w-16 h-16 object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="professional portrait of a male mechanic in a dark uniform with a focused and serious expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeSVfecYM00jYZTucel3zKrJLOggw7-Mc-j61TF7DzFAhKzOUa4dQb4pyG3CQdNzlUx0BJtOP5RVDFAD3oT2TTTZUFO3oWcE1kLj3elnpLPKHLMF2tatbxnSJOGdRK3S7FKoV5RrdANAi-fRYs_uSpVPoHobyY_KyWmr2YjrKagGQhoczIeG6ELGpbpTCTbPT0CAHSFKEtrYxQbNVbqDZSFYz38y3NFqFoofLLGmXa_yUZORRz1pqkWvA6UoJ-CWV8jd8nAQ2DwlM"/>
<div class="flex-1">
<div class="flex justify-between">
<h4 class="font-headline font-bold uppercase text-lg">Marcus Thorne</h4>
<span class="text-[10px] font-bold text-primary">SENIOR TECHNICIAN</span>
</div>
<p class="text-xs text-secondary mt-1 max-w-md">Consistent performance in maintenance cycles. Instrumental in reducing downtime of the hydraulic press by 20%.</p>
</div>
<div class="text-right">
<p class="text-[10px] text-secondary uppercase font-bold">Rating</p>
<p class="text-2xl font-headline font-bold text-primary">4.7</p>
</div>
</div>
<!-- Employee Card 3 -->
<div class="bg-surface-container-low p-6 flex items-center gap-6 group hover:bg-surface-container transition-colors border-l-4 border-transparent hover:border-primary">
<img class="w-16 h-16 object-cover grayscale group-hover:grayscale-0 transition-all" data-alt="professional portrait of a black woman in business attire with a confident smile in a bright office environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAO5pGRox9jSQmMtsdPOcQymeo4pZLVpq3yvO3kwHC8a7RMvTIWvqyVAbOl9458KGaWo0QjZFFIqjWnRl7lGv_xmtfbCtCKxbOiMRtX6E7ppI0xw-yCcgAl_WAVX_q2kOD16M66-DVNYVavvVHlgcbvb6l9M5ODfhwZJFrsXuU7dZ8Rd3Xb2RzdlF_BU4rbBouW7hU2w4G4vk4r3GuDNVM0NneF0JuMgMRWlvVsgBQO5hLec7tN4vZr1Nm-PYsLxtyQtrQIee1easo"/>
<div class="flex-1">
<div class="flex justify-between">
<h4 class="font-headline font-bold uppercase text-lg">Sarah Jenkins</h4>
<span class="text-[10px] font-bold text-primary">LOGISTICS COORDINATOR</span>
</div>
<p class="text-xs text-secondary mt-1 max-w-md">Optimized supply chain routes during the regional strike. Achieved zero delay in crucial parts delivery.</p>
</div>
<div class="text-right">
<p class="text-[10px] text-secondary uppercase font-bold">Rating</p>
<p class="text-2xl font-headline font-bold text-primary">4.8</p>
</div>
</div>
</div>
</div>
<!-- Vacation Accrual Tracking -->
<div class="bg-inverse-surface text-inverse-on-surface p-8 relative">
<h2 class="text-2xl font-headline font-bold uppercase mb-8 border-b border-white/10 pb-4">Vacation Accruals</h2>
<div class="space-y-8">
<div>
<div class="flex justify-between text-[10px] font-bold uppercase tracking-widest mb-2">
<span>Pending Approval</span>
<span>142 Days Total</span>
</div>
<div class="h-2 bg-white/10">
<div class="h-full bg-primary w-2/3"></div>
</div>
</div>
<div class="space-y-4 overflow-y-auto max-h-[400px] pr-2 no-scrollbar">
<!-- Accrual Item -->
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Industrial Ops Team</p>
<p class="text-[10px] opacity-60">Avg. 12.5 days/person</p>
</div>
<span class="bg-white/10 px-3 py-1 text-[10px] font-bold">HIGH LOAD</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Design Bureau</p>
<p class="text-[10px] opacity-60">Avg. 18.2 days/person</p>
</div>
<span class="bg-primary/20 text-primary-fixed px-3 py-1 text-[10px] font-bold">AVAIL</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Admin &amp; HR</p>
<p class="text-[10px] opacity-60">Avg. 9.1 days/person</p>
</div>
<span class="bg-white/10 px-3 py-1 text-[10px] font-bold">CRITICAL</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/5">
<div>
<p class="font-headline font-bold text-sm">Sales Division</p>
<p class="text-[10px] opacity-60">Avg. 15.0 days/person</p>
</div>
<span class="bg-primary/20 text-primary-fixed px-3 py-1 text-[10px] font-bold">AVAIL</span>
</div>
</div>
<button class="w-full border-2 border-primary text-primary py-3 text-[10px] font-bold uppercase tracking-widest hover:bg-primary hover:text-on-primary transition-all">
                            GENERATE ACCRUAL FORECAST
                        </button>
</div>
</div>
</div>
<!-- Technical Detail Table (No Borders) -->
<div class="mt-16 overflow-hidden">
<div class="flex justify-between items-center mb-6">
<h3 class="text-xl font-headline font-bold uppercase flex items-center gap-3">
<span class="w-3 h-3 bg-primary"></span>
                        Social Benefits Compliance Ledger
                    </h3>
<div class="flex gap-2">
<button class="bg-surface-container-high px-4 py-2 text-[10px] font-bold uppercase tracking-tighter">PDF</button>
<button class="bg-surface-container-high px-4 py-2 text-[10px] font-bold uppercase tracking-tighter">CSV</button>
</div>
</div>
<div class="w-full">
<table class="w-full text-left font-['Inter']">
<thead>
<tr class="bg-surface-container-highest">
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Department</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Employee Count</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">IVSS Contribution</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">INCES (2%)</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">FAOV (1%)</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-secondary">Status</th>
</tr>
</thead>
<tbody class="text-xs">
<tr class="bg-surface hover:bg-surface-container-low transition-colors">
<td class="p-4 font-bold">Engineering - Havy Duty</td>
<td class="p-4">124</td>
<td class="p-4">$12,450.00</td>
<td class="p-4">$2,490.00</td>
<td class="p-4">$1,245.00</td>
<td class="p-4 text-lime-600 font-bold uppercase tracking-tighter">Paid</td>
</tr>
<tr class="bg-surface-container-low hover:bg-surface-container transition-colors">
<td class="p-4 font-bold">Logistics &amp; Warehousing</td>
<td class="p-4">86</td>
<td class="p-4">$8,120.50</td>
<td class="p-4">$1,624.10</td>
<td class="p-4">$812.05</td>
<td class="p-4 text-lime-600 font-bold uppercase tracking-tighter">Paid</td>
</tr>
<tr class="bg-surface hover:bg-surface-container-low transition-colors">
<td class="p-4 font-bold">Administration Headquarters</td>
<td class="p-4">42</td>
<td class="p-4">$9,800.00</td>
<td class="p-4">$1,960.00</td>
<td class="p-4">$980.00</td>
<td class="p-4 text-amber-500 font-bold uppercase tracking-tighter">Pending</td>
</tr>
<tr class="bg-surface-container-low hover:bg-surface-container transition-colors">
<td class="p-4 font-bold">Quality Control (QC)</td>
<td class="p-4">18</td>
<td class="p-4">$2,100.00</td>
<td class="p-4">$420.00</td>
<td class="p-4">$210.00</td>
<td class="p-4 text-lime-600 font-bold uppercase tracking-tighter">Paid</td>
</tr>
</tbody>
</table>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/reportes-rrhh.js"></script>
</body>
</html>