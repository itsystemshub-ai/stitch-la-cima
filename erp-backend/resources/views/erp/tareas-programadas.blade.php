<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="TITAN INDUSTRIAL ERP - Cron Jobs - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>TITAN INDUSTRIAL ERP - Cron Jobs | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/tareas-programadas.css">
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
<main class="flex-1 md:ml-64 p-6 lg:p-10">
<!-- Header Section -->
<div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="text-4xl lg:text-5xl font-black uppercase tracking-tighter text-on-surface mb-2">Cron Jobs</h1>
<p class="text-secondary max-w-2xl font-medium border-l-4 border-primary pl-4">Gestión y monitoreo de procesos automatizados de alto rendimiento. Control de redundancia y disparadores manuales del sistema central.</p>
</div>
<div class="flex gap-3">
<button class="bg-surface-container-high text-on-surface font-bold uppercase text-xs px-6 py-3 flex items-center gap-2 hover:scale-[1.02] transition-transform">
<span class="material-symbols-outlined text-lg">refresh</span> Recargar Estados
                    </button>
<button class="bg-primary text-on-primary font-black uppercase text-xs px-6 py-3 flex items-center gap-2 hover:scale-[1.02] transition-transform shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-lg">add</span> Nueva Tarea
                    </button>
</div>
</div>
<!-- Dashboard Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Tareas Activas</div>
<div class="text-4xl font-black headline">12</div>
<div class="absolute -right-4 -bottom-4 opacity-5">
<span class="material-symbols-outlined text-8xl">settings_suggest</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden border-b-4 border-primary">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Éxito Últimas 24h</div>
<div class="text-4xl font-black headline text-primary">99.8%</div>
<div class="absolute -right-4 -bottom-4 opacity-5">
<span class="material-symbols-outlined text-8xl">check_circle</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Próximo Disparo</div>
<div class="text-2xl font-black headline">14:00:00</div>
<div class="text-[10px] text-secondary">SYNC_INV_01</div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-1 relative overflow-hidden">
<div class="text-[10px] font-black text-secondary tracking-widest uppercase">Alertas Sistema</div>
<div class="text-4xl font-black headline text-error">0</div>
<div class="absolute -right-4 -bottom-4 opacity-5">
<span class="material-symbols-outlined text-8xl">warning</span>
</div>
</div>
</div>
<!-- Task Grid Layout -->
<div class="space-y-4">
<!-- Task Row 1 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors relative overflow-hidden">
<div class="w-12 h-12 bg-primary/10 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-3xl">account_balance_wallet</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Cierre de Período Contable</h3>
<span class="px-2 py-0.5 bg-primary/20 text-on-primary-container text-[10px] font-bold uppercase tracking-tighter">Diario</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Consolidación de asientos contables y generación de balance de sumas y saldos.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">0 0 * * *</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                Éxito <span class="text-[10px] font-normal text-secondary">hace 14h</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-primary h-full w-[15%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-900 text-stone-100 text-[10px] font-black uppercase hover:bg-primary hover:text-on-primary transition-all active:scale-95">Disparar</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
<!-- Task Row 2 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors">
<div class="w-12 h-12 bg-stone-200 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-stone-500 text-3xl">cleaning_services</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Purga de Logs de Auditoría</h3>
<span class="px-2 py-0.5 bg-stone-200 text-stone-600 text-[10px] font-bold uppercase tracking-tighter">Semanal</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Eliminación de registros históricos superiores a 180 días según política de privacidad.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">0 2 * * 0</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary"></span>
                                Éxito <span class="text-[10px] font-normal text-secondary">hace 3d</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-primary h-full w-[45%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-900 text-stone-100 text-[10px] font-black uppercase hover:bg-primary hover:text-on-primary transition-all active:scale-95">Disparar</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
<!-- Task Row 3 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors border-l-4 border-primary">
<div class="w-12 h-12 bg-primary/10 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary text-3xl">sync_alt</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Sincronización de Inventario</h3>
<span class="px-2 py-0.5 bg-primary/20 text-on-primary-container text-[10px] font-bold uppercase tracking-tighter">5 Minutos</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Matching de stock entre almacenes centrales y puntos de distribución externos.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">*/5 * * * *</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-ping"></span>
                                En Proceso <span class="text-[10px] font-normal text-secondary">ahora</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-primary h-full w-[82%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-950 text-lime-400 text-[10px] font-black uppercase opacity-50 cursor-not-allowed">Ejecutando</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
<!-- Task Row 4 -->
<div class="bg-surface-container-lowest flex flex-col lg:flex-row items-center gap-6 p-6 group hover:bg-white transition-colors">
<div class="w-12 h-12 bg-stone-200 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-stone-500 text-3xl">mail</span>
</div>
<div class="flex-1 w-full lg:w-auto">
<div class="flex items-center gap-3 mb-1">
<h3 class="text-lg font-bold headline uppercase">Envío de Reportes Automáticos</h3>
<span class="px-2 py-0.5 bg-stone-200 text-stone-600 text-[10px] font-bold uppercase tracking-tighter">Personalizado</span>
</div>
<p class="text-xs text-secondary font-medium uppercase">Distribución de KPIs de producción a la junta directiva y jefes de planta.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-auto text-center lg:text-left">
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Frecuencia</div>
<div class="text-sm font-mono font-bold">0 8 1 * *</div>
</div>
<div>
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Última Ejecución</div>
<div class="text-sm font-bold flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-error"></span>
                                Fallido <span class="text-[10px] font-normal text-secondary">hace 24d</span>
</div>
</div>
<div class="hidden md:block">
<div class="text-[10px] font-bold text-secondary uppercase mb-1">Carga CPU</div>
<div class="w-24 h-2 bg-surface-container rounded-full overflow-hidden mt-2">
<div class="bg-error h-full w-[5%]"></div>
</div>
</div>
</div>
<div class="flex items-center gap-2 w-full lg:w-auto shrink-0">
<button class="flex-1 lg:flex-none px-4 py-2 bg-stone-900 text-stone-100 text-[10px] font-black uppercase hover:bg-primary hover:text-on-primary transition-all active:scale-95">Disparar</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-on-surface">settings_applications</button>
<button class="material-symbols-outlined p-2 text-secondary hover:text-error">history</button>
</div>
</div>
</div>
<!-- Footer Meta Info -->
<footer class="mt-12 pt-8 border-t border-surface-container flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] font-bold text-secondary uppercase tracking-[0.2em]">
<div class="flex gap-6">
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Motor de Cron: Activo</span>
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Queue Worker: 4 Hilos</span>
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-stone-400 rounded-full"></span> Latencia: 14ms</span>
</div>
<div>Titan Systems © 2024 - Industrial Infrastructure Unit</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/tareas-programadas.js"></script>
</body>
</html>