<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Dashboard ERP - MAYOR DE REPUESTO LA CIMA, C.A. Panel de control empresarial."/>
<meta name="theme-color" content="#ceff5e">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Mayor de Repuesto La Cima, C.A.">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
<title>Dashboard Principal | Mayor de Repuesto La Cima, C.A.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&amp;family=Inter:wght@300..700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
<link rel="stylesheet" href="{{ asset('erp/css/inicio.css') }}">
</head>
<body class="bg-background text-stone-900 min-h-screen flex">

<!-- SideNavBar Shell -->
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
  <a href="{{ url('/erp/dashboard/inicio') }}" class="menu-item menu-item-active flex items-center gap-3 px-4 py-2 transition-colors">
    <span class="material-symbols-outlined text-[20px]" aria-hidden="true">dashboard</span>
    <span class="flex-1 font-bold">Dashboard Central</span>
    <span class="material-symbols-outlined dropdown-arrow text-[18px]">chevron_right</span>
  </a>

    <!-- INVENTARIO -->
    <div class="menu-parent">
      <div class="menu-item menu-item-inactive" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span>
        <span>Inventario</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu">
        <a href="{{ url('/erp/inventario/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/inventario/productos') }}"><span class="material-symbols-outlined">category</span> Productos</a>
        <a href="{{ url('/erp/inventario/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        <a href="{{ url('/erp/inventario/auditoria') }}"><span class="material-symbols-outlined">assignment</span> Auditoría Física</a>
        <a href="{{ url('/erp/inventario/ajustes') }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
        <a href="{{ url('/erp/inventario/reportes') }}"><span class="material-symbols-outlined">analytics</span> Reportes</a>
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
        <a href="{{ url('/erp/ventas/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/ventas/pos') }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
        <a href="{{ url('/erp/ventas/registro') }}"><span class="material-symbols-outlined">list_alt</span> Registro</a>
        <a href="{{ url('/erp/ventas/factura-electronica') }}"><span class="material-symbols-outlined">receipt</span> Factura Electrónica</a>
        <a href="{{ url('/erp/ventas/facturas-emitidas') }}"><span class="material-symbols-outlined">description</span> Facturas Emitidas</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/ventas/notas-credito') }}"><span class="material-symbols-outlined">redo</span> Notas de Crédito</a>
        <a href="{{ url('/erp/ventas/clientes') }}"><span class="material-symbols-outlined">people</span> Clientes</a>
        <a href="{{ url('/erp/ventas/vendedores') }}"><span class="material-symbols-outlined">badge</span> Vendedores</a>
        <a href="{{ url('/erp/ventas/reportes') }}"><span class="material-symbols-outlined">bar_chart</span> Reportes</a>
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
        <a href="{{ url('/erp/compras/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/compras/proveedores') }}"><span class="material-symbols-outlined">local_shipping</span> Proveedores</a>
        <a href="{{ url('/erp/compras/historial') }}"><span class="material-symbols-outlined">history</span> Historial</a>
        <a href="{{ url('/erp/compras/factura') }}"><span class="material-symbols-outlined">request_quote</span> Factura Compra</a>
        <a href="{{ url('/erp/compras/libro') }}"><span class="material-symbols-outlined">book</span> Libro Compras</a>
        <a href="{{ url('/erp/compras/reportes') }}"><span class="material-symbols-outlined">stacked_bar_chart</span> Reportes</a>
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
        <a href="{{ url('/erp/contabilidad/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/contabilidad/plan-cuentas') }}"><span class="material-symbols-outlined">format_list_numbered</span> Plan Cuentas</a>
        <a href="{{ url('/erp/contabilidad/libro-diario') }}"><span class="material-symbols-outlined">menu_book</span> Libro Diario</a>
        <a href="{{ url('/erp/contabilidad/libro-ventas') }}"><span class="material-symbols-outlined">chrome_reader_mode</span> Libro Ventas</a>
        <a href="{{ url('/erp/contabilidad/libro-caja') }}"><span class="material-symbols-outlined">savings</span> Libro Caja</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/contabilidad/balance-general') }}"><span class="material-symbols-outlined">balance</span> Balance General</a>
        <a href="{{ url('/erp/contabilidad/balance-comprobacion') }}"><span class="material-symbols-outlined">scale</span> Balance Comprob.</a>
        <a href="{{ url('/erp/contabilidad/estado-resultados') }}"><span class="material-symbols-outlined">monitoring</span> Estado Resultados</a>
        <a href="{{ url('/erp/contabilidad/declaracion-iva') }}"><span class="material-symbols-outlined">gavel</span> Declaración IVA</a>
        <a href="{{ url('/erp/contabilidad/cierre-contable') }}"><span class="material-symbols-outlined">lock_clock</span> Cierre Contable</a>
        <a href="{{ url('/erp/contabilidad/libros-legales') }}"><span class="material-symbols-outlined">law</span> Libros Legales</a>
        <a href="{{ url('/erp/contabilidad/reportes') }}"><span class="material-symbols-outlined">pie_chart</span> Reportes</a>
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
        <a href="{{ url('/erp/finanzas/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/finanzas/activos-fijos') }}"><span class="material-symbols-outlined">corporate_fare</span> Activos Fijos</a>
        <a href="{{ url('/erp/finanzas/cuentas-cobrar') }}"><span class="material-symbols-outlined">account_balance_wallet</span> Cuentas Cobrar</a>
        <a href="{{ url('/erp/finanzas/reportes') }}"><span class="material-symbols-outlined">show_chart</span> Reportes</a>
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
        <a href="{{ url('/erp/rrhh/dashboard') }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/rrhh/empleados') }}"><span class="material-symbols-outlined">person</span> Empleados</a>
        <a href="{{ url('/erp/rrhh/nomina') }}"><span class="material-symbols-outlined">payments</span> Nómina</a>
        <a href="{{ url('/erp/rrhh/prestaciones') }}"><span class="material-symbols-outlined">savings</span> Prestaciones</a>
        <a href="{{ url('/erp/rrhh/portal-empleado') }}"><span class="material-symbols-outlined">person_outline</span> Portal Empleado</a>
        <a href="{{ url('/erp/rrhh/rendimiento') }}"><span class="material-symbols-outlined">emoji_events</span> Rendimiento</a>
        <a href="{{ url('/erp/rrhh/reportes') }}"><span class="material-symbols-outlined">group_work</span> Reportes</a>
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
        <a href="{{ url('/erp/configuracion/empresa') }}"><span class="material-symbols-outlined">business</span> Empresa</a>
        <a href="{{ url('/erp/configuracion/parametros') }}"><span class="material-symbols-outlined">tune</span> Parámetros</a>
        <a href="{{ url('/erp/configuracion/fiscal') }}"><span class="material-symbols-outlined">policy</span> Config Fiscal</a>
        <a href="{{ url('/erp/configuracion/usuarios') }}"><span class="material-symbols-outlined">admin_panel_settings</span> Usuarios</a>
        <a href="{{ url('/erp/configuracion/base-datos') }}"><span class="material-symbols-outlined">storage</span> Base Datos</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/configuracion/backups') }}"><span class="material-symbols-outlined">backup</span> Backups</a>
        <a href="{{ url('/erp/configuracion/estado') }}"><span class="material-symbols-outlined">health_and_safety</span> Estado Sistema</a>
        <a href="{{ url('/erp/configuracion/tareas') }}"><span class="material-symbols-outlined">schedule</span> Tareas</a>
        <a href="{{ url('/erp/configuracion/auditoria') }}"><span class="material-symbols-outlined">security</span> Auditoría</a>
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
    <!-- Breadcrumb -->
    <div class="flex items-center gap-4">
      <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <div class="hidden md:flex items-center gap-2 text-sm text-stone-500">
        <a href="{{ url('/erp/dashboard/inicio') }}" class="hover:text-stone-900">Inicio</a>
      </div>
    </div>

    <!-- Acciones -->
    <div class="flex items-center gap-3">
      <!-- Busqueda Global -->
      <div class="hidden lg:block relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
          <span class="material-symbols-outlined text-lg">search</span>
        </span>
        <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-64 rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar repuestos, ventas, clientes..." type="text"/>
      </div>

      <!-- Notificaciones -->
      <button class="p-2 text-stone-500 hover:bg-stone-100 rounded-lg relative">
        <span class="material-symbols-outlined">notifications</span>
        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
      </button>

      <!-- Perfil -->
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <div class="text-right hidden md:block">
          <p class="text-sm font-bold text-stone-900 leading-none" id="userName">Administrador</p>
          <p class="text-[10px] text-stone-500">Rol: <span id="userRole">Admin</span></p>
        </div>
        <div class="w-9 h-9 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm" id="userInitial">
          A
        </div>
      </div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-72 mt-[65px] p-6 pb-4">

  <!-- Header Dashboard -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
    <div>
      <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Resumen General</p>
      <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">MAYOR DE REPUESTO LA CIMA, C.A.</h2>
      <p class="text-stone-500 text-sm">RIF: J-40308741-5 • Valencia, Venezuela</p>
    </div>
    <div class="flex gap-3">
      <div class="bg-white border border-stone-200 px-4 py-2 rounded-lg">
        <span class="text-[10px] font-bold text-stone-400 uppercase">Uptime</span>
        <p class="text-xl font-headline font-bold text-stone-900">99.9%</p>
      </div>
      <div class="bg-primary px-4 py-2 rounded-lg text-stone-900">
        <span class="text-[10px] font-bold uppercase">Estado</span>
        <p class="text-xl font-headline font-bold">ÓPTIMO</p>
      </div>
    </div>
  </div>

  <!-- Tarjetas de Resumen -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    <a href="{{ url('/erp/inventario/dashboard') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-blue-600">inventory_2</span></div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+12%</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="stockCount">14,204</p>
      <p class="text-xs text-stone-500 mt-1">Productos en Stock</p>
    </a>
    <a href="{{ url('/erp/ventas/dashboard') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-green-600">payments</span></div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+8.2%</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="salesAmount">$128,450</p>
      <p class="text-xs text-stone-500 mt-1">Ventas del Mes</p>
    </a>
    <a href="{{ url('/erp/compras/dashboard') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-purple-600">shopping_cart</span></div>
        <span class="text-[10px] font-bold text-stone-400 bg-stone-100 px-2 py-0.5 rounded-full">3 activas</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="pendingPurchases">$12,400</p>
      <p class="text-xs text-stone-500 mt-1">Compras Pendientes</p>
    </a>
    <a href="{{ url('/erp/ventas/clientes') }}" class="bg-white border border-stone-200 rounded-xl p-5 hover:shadow-lg transition-all group">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-orange-600">people</span></div>
        <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+5</span>
      </div>
      <p class="text-2xl font-headline font-bold text-stone-900" id="customerCount">342</p>
      <p class="text-xs text-stone-500 mt-1">Clientes Activos</p>
    </a>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white border border-stone-200 rounded-xl p-6">
      <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-blue-600">inventory_2</span></div>
          <div><h3 class="text-lg font-bold text-stone-900">Control de Inventario</h3><p class="text-xs text-stone-500">Resumen general del stock</p></div>
        </div>
        <a href="{{ url('/erp/inventario/dashboard') }}" class="text-xs font-bold text-stone-500 hover:text-stone-900 flex items-center gap-1">Ver completo <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
      </div>
      <div class="grid grid-cols-3 gap-6 mb-6">
        <div class="border-l-4 border-green-500 pl-4"><p class="text-[10px] font-bold text-stone-400 uppercase">Stock Activo</p><p class="text-2xl font-headline font-bold text-stone-900">14,204</p></div>
        <div class="border-l-4 border-red-500 pl-4"><p class="text-[10px] font-bold text-stone-400 uppercase">Alertas Críticas</p><p class="text-2xl font-headline font-bold text-red-500">5</p></div>
        <div class="border-l-4 border-primary pl-4"><p class="text-[10px] font-bold text-stone-400 uppercase">Rotación</p><p class="text-2xl font-headline font-bold text-stone-900">12.4%</p></div>
      </div>
      <div class="h-32 bg-stone-50 rounded-lg flex items-end gap-1 px-3 py-2 overflow-hidden"><div class="flex-1 bg-stone-200 h-[40%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[60%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[55%] rounded-t"></div><div class="flex-1 bg-blue-400 h-[85%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[45%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[30%] rounded-t"></div><div class="flex-1 bg-stone-900 h-[95%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[50%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[70%] rounded-t"></div><div class="flex-1 bg-primary h-[100%] rounded-t"></div><div class="flex-1 bg-stone-200 h-[65%] rounded-t"></div><div class="flex-1 bg-stone-300 h-[75%] rounded-t"></div></div>
    </div>
    <div class="bg-stone-900 text-white rounded-xl p-6 relative overflow-hidden">
      <div class="relative"><p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-2">Ingresos del Mes</p><h3 class="text-4xl font-headline font-black text-primary tracking-tighter mb-4">$128,450</h3></div>
      <div class="space-y-3 mb-6">
        <div class="flex items-center justify-between bg-white/5 rounded-lg p-3"><div><p class="text-xs font-bold">FAC-001</p><p class="text-[10px] text-stone-400">Discos de Freno</p></div><span class="text-sm font-bold">$170.00</span></div>
        <div class="flex items-center justify-between bg-white/5 rounded-lg p-3"><div><p class="text-xs font-bold">FAC-002</p><p class="text-[10px] text-stone-400">Turbo VGT</p></div><span class="text-sm font-bold">$845.00</span></div>
      </div>
      <a href="{{ url('/erp/ventas/dashboard') }}" class="block bg-primary text-stone-900 py-2.5 font-bold text-sm rounded-lg hover:brightness-110 transition-all text-center">VER VENTAS</a>
    </div>
  </div>

  <!-- Footer -->
  <div class="pt-4 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
    <span class="text-[10px] font-bold text-stone-400">RIF: J-40308741-5 • © 2026</span>
    <div class="flex items-center gap-4">
      <a href="#" class="text-[10px] font-bold text-stone-500">Ayuda</a>
      <a href="#" class="text-[10px] font-bold text-stone-500">Manual</a>
    </div>
  </div>
</main>

<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<script src="{{ asset('js/api.js') }}"></script>
<script src="{{ asset('erp/js/inicio.js') }}"></script>
</body>
</html>
