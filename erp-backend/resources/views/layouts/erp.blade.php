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
    <!-- Ajustamos las rutas para apuntar al frontend original -->
    <link rel="icon" type="image/png" href="/frontend/assets/images/logo.png">
    <link rel="apple-touch-icon" href="/frontend/assets/images/logo.png">
    <title>@yield('title', 'ERP | Mayor de Repuesto La Cima, C.A.')</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
    <!-- CSS Absoluto para no perder el diseño -->
    <link rel="stylesheet" href="/frontend/public/erp/css/inicio.css">
    @stack('styles')
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
        <span class="text-[10px] font-mono text-stone-400">v3.0.0 (Blade)</span>
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
  <nav class="flex-1 px-3 space-y-0.5 pb-24 overflow-y-auto">

    <!-- INICIO -->
    <a href="{{ url('/dashboard') }}" class="menu-item {{ request()->is('dashboard') ? 'menu-item-active' : 'menu-item-inactive' }} flex items-center gap-3 px-4 py-2 transition-colors">
      <span class="material-symbols-outlined text-[20px]" aria-hidden="true">dashboard</span>
      <span class="flex-1">Dashboard Central</span>
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
        <a href="#"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-symbols-outlined">category</span> Productos</a>
        <a href="#"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        <a href="#"><span class="material-symbols-outlined">assignment</span> Auditoría Física</a>
        <a href="#"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
        <a href="#"><span class="material-symbols-outlined">analytics</span> Reportes</a>
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
        <a href="#"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/pos') }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
        <a href="#"><span class="material-symbols-outlined">list_alt</span> Registro</a>
        <a href="#"><span class="material-symbols-outlined">receipt</span> Factura Electrónica</a>
        <a href="#"><span class="material-symbols-outlined">description</span> Facturas Emitidas</a>
        <div class="submenu-divider"></div>
        <a href="#"><span class="material-symbols-outlined">redo</span> Notas de Crédito</a>
        <a href="#"><span class="material-symbols-outlined">people</span> Clientes</a>
        <a href="#"><span class="material-symbols-outlined">badge</span> Vendedores</a>
        <a href="#"><span class="material-symbols-outlined">bar_chart</span> Reportes</a>
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
        <a href="#"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-symbols-outlined">local_shipping</span> Proveedores</a>
        <a href="#"><span class="material-symbols-outlined">history</span> Historial</a>
        <a href="#"><span class="material-symbols-outlined">request_quote</span> Factura Compra</a>
        <a href="#"><span class="material-symbols-outlined">book</span> Libro Compras</a>
        <a href="#"><span class="material-symbols-outlined">stacked_bar_chart</span> Reportes</a>
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
        <a href="#"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-symbols-outlined">format_list_numbered</span> Plan Cuentas</a>
        <a href="#"><span class="material-symbols-outlined">menu_book</span> Libro Diario</a>
        <a href="#"><span class="material-symbols-outlined">chrome_reader_mode</span> Libro Ventas</a>
        <a href="#"><span class="material-symbols-outlined">savings</span> Libro Caja</a>
        <div class="submenu-divider"></div>
        <a href="#"><span class="material-symbols-outlined">balance</span> Balance General</a>
        <a href="#"><span class="material-symbols-outlined">scale</span> Balance Comprob.</a>
        <a href="#"><span class="material-symbols-outlined">monitoring</span> Estado Resultados</a>
        <a href="#"><span class="material-symbols-outlined">gavel</span> Declaración IVA</a>
        <a href="#"><span class="material-symbols-outlined">lock_clock</span> Cierre Contable</a>
        <a href="#"><span class="material-symbols-outlined">law</span> Libros Legales</a>
        <a href="#"><span class="material-symbols-outlined">pie_chart</span> Reportes</a>
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
        <a href="#"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-symbols-outlined">corporate_fare</span> Activos Fijos</a>
        <a href="#"><span class="material-symbols-outlined">account_balance_wallet</span> Cuentas Cobrar</a>
        <a href="#"><span class="material-symbols-outlined">show_chart</span> Reportes</a>
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
        <a href="#"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-symbols-outlined">person</span> Empleados</a>
        <a href="#"><span class="material-symbols-outlined">payments</span> Nómina</a>
        <a href="#"><span class="material-symbols-outlined">savings</span> Prestaciones</a>
        <a href="#"><span class="material-symbols-outlined">person_outline</span> Portal Empleado</a>
        <a href="#"><span class="material-symbols-outlined">emoji_events</span> Rendimiento</a>
        <a href="#"><span class="material-symbols-outlined">group_work</span> Reportes</a>
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
        <a href="#"><span class="material-symbols-outlined">business</span> Empresa</a>
        <a href="#"><span class="material-symbols-outlined">tune</span> Parámetros</a>
        <a href="#"><span class="material-symbols-outlined">policy</span> Config Fiscal</a>
        <a href="#"><span class="material-symbols-outlined">admin_panel_settings</span> Usuarios</a>
        <a href="#"><span class="material-symbols-outlined">storage</span> Base Datos</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/sync') }}"><span class="material-symbols-outlined">sync</span> Sincronización Legacy</a>
        <a href="#"><span class="material-symbols-outlined">backup</span> Backups</a>
        <a href="#"><span class="material-symbols-outlined">health_and_safety</span> Estado Sistema</a>
        <a href="#"><span class="material-symbols-outlined">schedule</span> Tareas</a>
        <a href="#"><span class="material-symbols-outlined">security</span> Auditoría</a>
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
        <a href="#"><span class="material-symbols-outlined">help</span> Centro Ayuda</a>
        <a href="#"><span class="material-symbols-outlined">confirmation_number</span> Tickets</a>
        <a href="#"><span class="material-symbols-outlined">add_circle</span> Crear Ticket</a>
        <div class="submenu-divider"></div>
        <a href="#"><span class="material-symbols-outlined">chat</span> Chat</a>
        <a href="#"><span class="material-symbols-outlined">school</span> Conocimiento</a>
        <a href="#"><span class="material-symbols-outlined">description</span> Manual</a>
      </div>
    </div>
  </nav>

  <!-- Boton Cerrar Sesion -->
  <div class="mt-auto border-t border-stone-200 p-4">
    <button class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-sm">
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
        <a href="#" class="hover:text-stone-900">Inicio</a>
        <span>/</span>
        <span class="text-stone-900 font-bold">@yield('breadcrumb_active', 'Dashboard')</span>
      </div>
    </div>

    <!-- Acciones -->
    <div class="flex items-center gap-3">
      <!-- Busqueda Global -->
      <div class="hidden lg:block relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
          <span class="material-symbols-outlined text-lg">search</span>
        </span>
        <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-64 rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar repuestos..." type="text"/>
      </div>
      <!-- Perfil -->
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <div class="text-right hidden md:block">
          <p class="text-sm font-bold text-stone-900 leading-none">Administrador</p>
          <p class="text-[10px] text-stone-500">Rol: Admin</p>
        </div>
        <div class="w-9 h-9 bg-stone-900 rounded-full flex items-center justify-center text-primary font-bold text-sm">
          A
        </div>
      </div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="ml-[288px] w-[calc(100vw-288px)] mt-[65px] p-6 pb-4">
    @yield('content')
</main>

<!-- Overlay para mobile sidebar -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- JavaScript base absoluto -->
<script src="/frontend/public/erp/js/inicio.js"></script>
<script>
  // Dropdown fix
  function toggleDropdown(menuItem) {
    const parent = menuItem.closest('.menu-parent');
    if (!parent) return;
    const wasOpen = parent.classList.contains('open');
    document.querySelectorAll('.menu-parent.open').forEach(el => {
      if (el !== parent) el.classList.remove('open');
    });
    if (!wasOpen) parent.classList.add('open');
  }
</script>
@stack('scripts')
</body>
</html>
