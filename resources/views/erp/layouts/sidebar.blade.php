<aside id="sidebar" class="h-screen w-72 fixed left-0 top-0 z-50 flex flex-col bg-white border-r border-stone-200 sidebar">
  <!-- Logo -->
  <div id="tour-brand" class="flex flex-col px-5 pt-6 pb-4">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 bg-stone-900 flex items-center justify-center rounded-lg">
        <img src="{{ asset('assets/images/logo.png') }}" class="w-7 h-7 object-contain" alt="Logo">
      </div>
      <div>
        <h2 class="font-headline font-bold text-sm text-stone-700 leading-none uppercase">MAYOR DE REPUESTO LA CIMA, C.A</h2>
        <span class="text-[12px] font-mono text-stone-400">RIF: J-40308741-5</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Portal ERP Corporativo</p>
  </div>

  <!-- Busqueda -->
  <div id="tour-sidebar-search" class="px-4 mb-4">
    <div class="relative">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
        <span class="material-symbols-outlined text-lg">search</span>
      </span>
      <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar..." type="text"/>
    </div>
  </div>

  <!-- Menu Principal -->
  <nav id="tour-nav" class="flex-1 px-3 space-y-0.5 pb-24">

    <div class="menu-group">Principal</div>
    <a href="{{ url('/') }}" class="menu-item menu-item-inactive">
      <span class="material-symbols-outlined text-[20px]">storefront</span><span>Tienda Virtual</span>
    </a>
    <a href="{{ url('/erp/dashboard') }}" class="menu-item {{ Request::is('erp/dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}">
      <span class="material-symbols-outlined text-[20px]">dashboard</span><span>Dashboard Central</span>
    </a>

    <!-- INVENTARIO -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/inventario*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span>
        <span>Inventario</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/inventario*') ? 'show' : '' }}">
        <a href="{{ url('/erp/inventario') }}" class="{{ Request::is('erp/inventario') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/inventario/productos') }}" class="{{ Request::is('erp/inventario/productos*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">category</span> Productos</a>
        <a href="{{ url('/erp/inventario/busqueda-ia') }}" class="{{ Request::is('erp/inventario/busqueda-ia*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">psychology</span> Búsqueda IA</a>
        <a href="{{ url('/erp/inventario/desarrollo') }}" class="{{ Request::is('erp/inventario/desarrollo*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">biotech</span> Desarrollo</a>
        <a href="{{ url('/erp/inventario/lista-precios') }}" class="{{ Request::is('erp/inventario/lista-precios*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">payments</span> Lista de Precios</a>
        <a href="{{ url('/erp/inventario/kardex') }}" class="{{ Request::is('erp/inventario/kardex*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">receipt_long</span> Kardex</a>
        <a href="{{ url('/erp/inventario/auditoria') }}" class="{{ Request::is('erp/inventario/auditoria*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">assignment</span> Auditoría Física</a>
        <a href="{{ url('/erp/inventario/ajustes') }}" class="{{ Request::is('erp/inventario/ajustes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">edit_note</span> Ajustes</a>
        <a href="{{ url('/erp/inventario/reportes') }}" class="{{ Request::is('erp/inventario/reportes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">analytics</span> Reportes</a>
      </div>
    </div>

    <!-- VENTAS -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/ventas*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">payments</span>
        <span>Ventas</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/ventas*') ? 'show' : '' }}">
        <a href="{{ url('/erp/ventas') }}" class="{{ Request::is('erp/ventas') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/ventas/pos') }}" id="tour-pos" class="{{ Request::is('erp/ventas/pos*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">point_of_sale</span> Punto de Venta</a>
        <a href="{{ url('/erp/ventas/registro') }}" class="{{ Request::is('erp/ventas/registro*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">list_alt</span> Registro</a>
        <a href="{{ url('/erp/ventas/facturacion') }}" class="{{ Request::is('erp/ventas/facturacion*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">receipt</span> Facturación</a>
        <a href="{{ url('/erp/ventas/historial') }}" class="{{ Request::is('erp/ventas/historial*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">description</span> Historial Facturas</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/ventas/notas-credito') }}" class="{{ Request::is('erp/ventas/notas-credito*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">redo</span> Notas de Crédito</a>
        <a href="{{ url('/erp/ventas/clientes') }}" class="{{ Request::is('erp/ventas/clientes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">people</span> Clientes</a>
        <a href="{{ url('/erp/ventas/vendedores') }}" class="{{ Request::is('erp/ventas/vendedores*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">badge</span> Vendedores</a>
        <a href="{{ url('/erp/ventas/reportes') }}" class="{{ Request::is('erp/ventas/reportes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">bar_chart</span> Reportes Ventas</a>
        <a href="{{ url('/erp/ventas/reporte-ganancias') }}" class="{{ Request::is('erp/ventas/reporte-ganancias*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">analytics</span> Inteligencia de Ganancias</a>
      </div>
    </div>

    <!-- COMPRAS -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/compras*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
        <span>Compras</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/compras*') ? 'show' : '' }}">
        <a href="{{ url('/erp/compras') }}" class="{{ Request::is('erp/compras') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/compras/proveedores') }}" class="{{ Request::is('erp/compras/proveedores*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">local_shipping</span> Proveedores</a>
        <a href="{{ url('/erp/compras/historial') }}" class="{{ Request::is('erp/compras/historial*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">history</span> Historial</a>
        <a href="{{ url('/erp/compras/factura') }}" class="{{ Request::is('erp/compras/factura*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">request_quote</span> Factura Compra</a>
        <a href="{{ url('/erp/compras/libro') }}" class="{{ Request::is('erp/compras/libro*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">book</span> Libro Compras</a>
        <a href="{{ url('/erp/compras/reportes') }}" class="{{ Request::is('erp/compras/reportes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">stacked_bar_chart</span> Reportes</a>
      </div>
    </div>

    <!-- CONTABILIDAD -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/contabilidad*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">account_balance</span>
        <span>Contabilidad</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/contabilidad*') ? 'show' : '' }}">
        <a href="{{ url('/erp/contabilidad') }}" class="{{ Request::is('erp/contabilidad') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/contabilidad/plan-cuentas') }}" class="{{ Request::is('erp/contabilidad/plan-cuentas*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">format_list_numbered</span> Plan Cuentas</a>
        <a href="{{ url('/erp/contabilidad/libros') }}" class="{{ Request::is('erp/contabilidad/libros*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">menu_book</span> Libros Contables</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/contabilidad/balance-general') }}" class="{{ Request::is('erp/contabilidad/balance-general*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">balance</span> Balance General</a>
        <a href="{{ url('/erp/contabilidad/balance-comprobacion') }}" class="{{ Request::is('erp/contabilidad/balance-comprobacion*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">scale</span> Balance Comprob.</a>
        <a href="{{ url('/erp/contabilidad/estado-resultados') }}" class="{{ Request::is('erp/contabilidad/estado-resultados*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">monitoring</span> Estado Resultados</a>
        <a href="{{ url('/erp/contabilidad/declaracion-iva') }}" class="{{ Request::is('erp/contabilidad/declaracion-iva*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">gavel</span> Declaración IVA</a>
        <a href="{{ url('/erp/contabilidad/cierre') }}" class="{{ Request::is('erp/contabilidad/cierre*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">lock_clock</span> Cierre Contable</a>
        <a href="{{ url('/erp/contabilidad/reportes') }}" class="{{ Request::is('erp/contabilidad/reportes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">pie_chart</span> Reportes</a>
      </div>
    </div>

    <!-- FINANZAS -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/finanzas*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">monetization_on</span>
        <span>Finanzas</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/finanzas*') ? 'show' : '' }}">
        <a href="{{ url('/erp/finanzas') }}" class="{{ Request::is('erp/finanzas') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/finanzas/activos-fijos') }}" class="{{ Request::is('erp/finanzas/activos-fijos*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">corporate_fare</span> Activos Fijos</a>
        <a href="{{ url('/erp/finanzas/cuentas-cobrar') }}" class="{{ Request::is('erp/finanzas/cuentas-cobrar*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">account_balance_wallet</span> Cuentas Cobrar</a>
        <a href="{{ url('/erp/finanzas/reportes') }}" class="{{ Request::is('erp/finanzas/reportes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">show_chart</span> Reportes</a>
      </div>
    </div>

    <!-- APROBACIONES -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/aprobaciones*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">verified_user</span>
        <span>Aprobaciones</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/aprobaciones*') ? 'show' : '' }}">
        <a href="{{ url('/erp/aprobaciones') }}" class="{{ Request::is('erp/aprobaciones') ? 'active-link' : '' }}"><span class="material-symbols-outlined">gavel</span> Gestión de Aprobaciones</a>
      </div>
    </div>

    <!-- RRHH -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/rrhh*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">groups</span>
        <span>RRHH</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/rrhh*') ? 'show' : '' }}">
        <a href="{{ url('/erp/rrhh') }}" class="{{ Request::is('erp/rrhh') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/rrhh/empleados') }}" class="{{ Request::is('erp/rrhh/empleados*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">person</span> Empleados</a>
        <a href="{{ url('/erp/rrhh/nomina') }}" class="{{ Request::is('erp/rrhh/nomina*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">payments</span> Nómina</a>
        <a href="{{ url('/erp/rrhh/prestaciones') }}" class="{{ Request::is('erp/rrhh/prestaciones*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">savings</span> Prestaciones</a>
        <a href="{{ url('/erp/rrhh/portal-empleado') }}" class="{{ Request::is('erp/rrhh/portal-empleado*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">person_outline</span> Portal Empleado</a>
        <a href="{{ url('/erp/rrhh/reportes') }}" class="{{ Request::is('erp/rrhh/reportes*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">analytics</span> Reportes</a>
      </div>
    </div>

    <!-- CONFIGURACIÓN -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/configuracion*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">settings</span>
        <span>Configuración</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/configuracion*') ? 'show' : '' }}">
        <a href="{{ url('/erp/configuracion') }}" class="{{ Request::is('erp/configuracion') ? 'active-link' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a>
        <a href="{{ url('/erp/configuracion/parametros') }}" class="{{ Request::is('erp/configuracion/parametros*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">tune</span> Parámetros</a>
        <a href="{{ url('/erp/configuracion/fiscal') }}" class="{{ Request::is('erp/configuracion/fiscal*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">policy</span> Config Fiscal</a>
        <a href="{{ url('/erp/configuracion/usuarios') }}" class="{{ Request::is('erp/configuracion/usuarios*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">admin_panel_settings</span> Usuarios</a>
        <a href="{{ url('/erp/configuracion/base-datos') }}" class="{{ Request::is('erp/configuracion/base-datos*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">storage</span> Base Datos</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/configuracion/backups') }}" class="{{ Request::is('erp/configuracion/backups*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">backup</span> Backups</a>
        <a href="{{ url('/erp/configuracion/estado-sistema') }}" class="{{ Request::is('erp/configuracion/estado-sistema*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">health_and_safety</span> Estado Sistema</a>
        <a href="{{ url('/erp/configuracion/auditoria') }}" class="{{ Request::is('erp/configuracion/auditoria*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">security</span> Auditoría</a>
        <a href="{{ url('/erp/configuracion/tareas') }}" class="{{ Request::is('erp/configuracion/tareas*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">schedule</span> Tareas</a>
      </div>
    </div>

    <!-- AYUDA -->
    <div class="menu-parent">
      <div class="menu-item {{ Request::is('erp/ayuda*') ? 'menu-item-active' : 'menu-item-inactive' }}" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">help</span>
        <span>Ayuda</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu submenu-up {{ Request::is('erp/ayuda*') ? 'show' : '' }}">
        <a href="{{ url('/erp/ayuda') }}" class="{{ Request::is('erp/ayuda') ? 'active-link' : '' }}"><span class="material-symbols-outlined">help</span> Centro Ayuda</a>
        <a href="{{ url('/erp/ayuda/tickets') }}" class="{{ Request::is('erp/ayuda/tickets*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">confirmation_number</span> Mis Tickets</a>
        <a href="{{ url('/erp/ayuda/crear-ticket') }}" class="{{ Request::is('erp/ayuda/crear-ticket*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">add_circle</span> Crear Ticket</a>
        <div class="submenu-divider"></div>
        <a href="{{ url('/erp/ayuda/manual') }}" class="{{ Request::is('erp/ayuda/manual*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">description</span> Manuales</a>
        <a href="{{ url('/erp/ayuda/conocimiento') }}" class="{{ Request::is('erp/ayuda/conocimiento*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">school</span> Conocimiento</a>
        <a href="{{ url('/erp/ayuda/chat') }}" class="{{ Request::is('erp/ayuda/chat*') ? 'active-link' : '' }}"><span class="material-symbols-outlined">chat</span> Chat Asistencia</a>
      </div>
    </div>
  </nav>

  <!-- Boton Cerrar Sesion -->
  <div class="mt-auto border-t border-stone-200 p-4">
    <form method="POST" action="{{ url('/auth/logout') }}">
      @csrf
      <button type="submit" class="w-full bg-red-50 text-red-600 font-medium py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-sm">
        <span class="material-symbols-outlined text-[18px]">logout</span>
        Cerrar Sesión
      </button>
    </form>
  </div>
</aside>
