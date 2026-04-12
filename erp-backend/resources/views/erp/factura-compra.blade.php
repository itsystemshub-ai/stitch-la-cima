<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="factura-compra - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>factura-compra | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/factura-compra.css">
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
<main class="ml-64 flex-1 flex flex-col min-h-screen">
<!-- TopNavBar (Authority: JSON) -->
<header class="bg-stone-950/80 backdrop-blur-xl flex justify-between items-center w-full px-6 py-4 sticky top-0 z-50">
<div class="flex items-center gap-8">
<div class="text-2xl font-bold tracking-tighter text-lime-400 uppercase headline">METALLIC_CORE_ERP</div>
<nav class="hidden md:flex gap-6">
<a class="font-space-grotesk uppercase tracking-tighter text-stone-400 hover:text-lime-200 transition-colors" href="#">Dashboard</a>
<a class="font-space-grotesk uppercase tracking-tighter text-stone-400 hover:text-lime-200 transition-colors" href="#">Inventario</a>
<a class="font-space-grotesk uppercase tracking-tighter text-lime-400 border-b-2 border-lime-400 pb-1" href="#">Reportes</a>
</nav>
</div>
<div class="flex items-center gap-6">
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-500 text-sm" data-icon="search">search</span>
<input class="bg-stone-900 border-none text-stone-300 text-xs py-2 pl-9 pr-4 rounded-sm focus:ring-1 focus:ring-lime-400 w-64" placeholder="BUSCAR REGISTROS..." type="text"/>
</div>
<div class="flex items-center gap-4 text-stone-400">
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400" data-icon="notifications">notifications</span>
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400" data-icon="settings">settings</span>
<div class="h-8 w-8 bg-stone-800 rounded-full flex items-center justify-center overflow-hidden border border-stone-700">
<img alt="User profile" class="h-full w-full object-cover" data-alt="close-up portrait of a professional engineer in a dark industrial uniform looking forward with a serious expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-fKbbdp0Q_44-_PovpNQ9jcMe-3_K-jvtGbCMTadmppmwtXl30MiGJEGEB9ZYXtmc2FxUZlMEp83GsOk5BFYJf51i8nYfs9M2zSG4-N0zMmDTYc3-Nuy65E1B0Z9RV0_inlJQyyAHYlqtl3NYl6hyxew6Nxnf4Jmrg3LXh3Lbyw9rlyyA_RYHJstNg6xoAoAwsFL1HoSoaRtb7R-JOrvIuS5xhOmTy_rry6O_hQwQramBTKCRlN_clfe88YJZIF2nazOUyUKUmZ8"/>
</div>
</div>
<button class="bg-lime-400 text-stone-950 font-bold px-4 py-2 text-xs uppercase tracking-tighter hover:bg-lime-300 transition-colors active:scale-95 duration-100">
                    Nueva Factura
                </button>
</div>
</header>
<!-- Canvas Area -->
<div class="p-8 space-y-8 max-w-7xl mx-auto w-full">
<!-- Page Title Area -->
<div class="flex justify-between items-end">
<div>
<h2 class="text-4xl font-black uppercase tracking-tighter headline text-on-surface">Registro de Compra</h2>
<p class="text-secondary font-medium uppercase text-xs tracking-widest mt-1">Suministros Industriales &amp; Gestión de Activos</p>
</div>
<div class="text-right">
<div class="bg-surface-container-highest px-4 py-2 inline-block">
<span class="text-[10px] text-tertiary block font-bold uppercase">Estado Fiscal</span>
<span class="text-primary font-bold text-sm">ART. 177 ISLR CUMPLIMIENTO</span>
</div>
</div>
</div>
<!-- Form Shell (Bento Layout) -->
<div class="grid grid-cols-12 gap-6">
<!-- Main Form Body -->
<div class="col-span-12 lg:col-span-8 space-y-6">
<!-- Header Info Card -->
<div class="bg-surface-container-lowest p-8 rounded-lg shadow-sm">
<div class="grid grid-cols-2 gap-8">
<div class="space-y-4">
<label class="block text-[10px] font-bold uppercase text-tertiary tracking-widest">Selección de Proveedor</label>
<div class="relative">
<select class="w-full bg-surface-container-high border-none rounded-sm py-4 px-4 text-sm font-bold focus:ring-2 focus:ring-primary appearance-none">
<option>SIDERÚRGICA DEL SUR C.A. - J-12345678-9</option>
<option>REPUESTOS INDUSTRIALES TITÁN - J-87654321-0</option>
<option>ENGRANAJES &amp; MOTORES VZLA - J-11223344-5</option>
</select>
<span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined pointer-events-none" data-icon="keyboard_arrow_down">keyboard_arrow_down</span>
</div>
</div>
<div class="space-y-4">
<label class="block text-[10px] font-bold uppercase text-tertiary tracking-widest">Nro Factura de Proveedor</label>
<input class="w-full bg-surface-container-high border-none rounded-sm py-4 px-4 text-sm font-mono focus:ring-2 focus:ring-primary" placeholder="FT-000000" type="text"/>
</div>
<div class="space-y-4">
<label class="block text-[10px] font-bold uppercase text-tertiary tracking-widest">Fecha de Emisión</label>
<div class="relative">
<input class="w-full bg-surface-container-high border-none rounded-sm py-4 px-4 text-sm focus:ring-2 focus:ring-primary" type="date"/>
</div>
</div>
<div class="space-y-4">
<label class="block text-[10px] font-bold uppercase text-tertiary tracking-widest">Fecha de Recepción / Almacén</label>
<div class="relative">
<input class="w-full bg-surface-container-high border-none rounded-sm py-4 px-4 text-sm focus:ring-2 focus:ring-primary" type="date"/>
</div>
</div>
</div>
</div>
<!-- Line Items Table -->
<div class="bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden">
<div class="px-8 py-6 flex justify-between items-center border-b border-surface-container">
<h3 class="headline font-bold uppercase text-sm tracking-widest text-on-surface">Detalle de Repuestos y Materiales</h3>
<button class="flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-tighter hover:text-on-primary-container transition-colors">
<span class="material-symbols-outlined text-lg" data-icon="add_circle">add_circle</span>
                                Insertar Fila
                            </button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low">
<tr>
<th class="px-8 py-4 text-[10px] font-bold uppercase text-tertiary tracking-widest">SKU / Código</th>
<th class="px-4 py-4 text-[10px] font-bold uppercase text-tertiary tracking-widest">Descripción Técnica</th>
<th class="px-4 py-4 text-[10px] font-bold uppercase text-tertiary tracking-widest">Cantidad</th>
<th class="px-4 py-4 text-[10px] font-bold uppercase text-tertiary tracking-widest text-right">Precio Unitario</th>
<th class="px-8 py-4 text-[10px] font-bold uppercase text-tertiary tracking-widest text-right">Subtotal</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-8 py-5">
<input class="bg-transparent border-none p-0 w-full font-mono text-sm focus:ring-0" type="text" value="BRG-2024-X1"/>
</td>
<td class="px-4 py-5">
<input class="bg-transparent border-none p-0 w-full text-sm focus:ring-0" type="text" value="Rodamiento de Bolas Alta Velocidad 6205-2Z"/>
</td>
<td class="px-4 py-5">
<input class="bg-transparent border-none p-0 w-20 text-sm focus:ring-0" type="number" value="12"/>
</td>
<td class="px-4 py-5 text-right font-mono text-sm">
                                            45.50
                                        </td>
<td class="px-8 py-5 text-right font-bold text-sm">
                                            546.00
                                        </td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
<td class="px-8 py-5">
<input class="bg-transparent border-none p-0 w-full font-mono text-sm focus:ring-0" type="text" value="VLV-IND-99"/>
</td>
<td class="px-4 py-5">
<input class="bg-transparent border-none p-0 w-full text-sm focus:ring-0" type="text" value="Válvula de Compuerta Acero Inoxidable 2''"/>
</td>
<td class="px-4 py-5">
<input class="bg-transparent border-none p-0 w-20 text-sm focus:ring-0" type="number" value="2"/>
</td>
<td class="px-4 py-5 text-right font-mono text-sm">
                                            1,280.00
                                        </td>
<td class="px-8 py-5 text-right font-bold text-sm">
                                            2,560.00
                                        </td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-6 bg-surface-container-low flex justify-end gap-12">
<div class="text-right">
<p class="text-[10px] font-bold uppercase text-tertiary tracking-widest">Base Imponible Total</p>
<p class="text-xl font-black headline">3,106.00</p>
</div>
</div>
</div>
</div>
<!-- Fiscal Summary Sidebar -->
<div class="col-span-12 lg:col-span-4 space-y-6">
<!-- Industrial Glass Card -->
<div class="bg-stone-900 text-stone-100 p-8 rounded-lg shadow-2xl relative overflow-hidden">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-lime-400 opacity-5 blur-3xl rounded-full"></div>
<h3 class="headline font-bold uppercase text-xs tracking-widest text-lime-400 mb-8 border-b border-stone-800 pb-4">Liquidación de Impuestos</h3>
<div class="space-y-6">
<div class="flex justify-between items-center">
<span class="text-stone-500 text-sm font-medium">Subtotal Operativo</span>
<span class="font-mono text-lg">3,106.00</span>
</div>
<div class="flex justify-between items-center">
<div class="flex items-center gap-2">
<span class="text-stone-500 text-sm font-medium">IVA (16.00%)</span>
<span class="text-[10px] bg-stone-800 px-1.5 py-0.5 rounded text-stone-400">CRED</span>
</div>
<span class="font-mono text-lg">496.96</span>
</div>
<div class="flex justify-between items-center py-4 border-y border-stone-800">
<div>
<span class="text-lime-400/80 text-sm font-bold uppercase">Retención IVA (75%)</span>
<p class="text-[9px] text-stone-500 uppercase tracking-tighter">Sujeto a Agente de Retención</p>
</div>
<span class="font-mono text-lg text-lime-400">- 372.72</span>
</div>
<div class="pt-8">
<span class="text-[10px] font-bold uppercase text-stone-500 tracking-widest block mb-1">Total Neto a Pagar</span>
<div class="flex items-baseline justify-between">
<span class="text-stone-500 text-xl font-light">USD</span>
<span class="text-5xl font-black headline tracking-tighter text-white">3,230.24</span>
</div>
</div>
</div>
<div class="mt-10 p-4 bg-stone-950 rounded border-l-2 border-lime-400">
<div class="flex gap-3">
<span class="material-symbols-outlined text-lime-400 text-sm" data-icon="gavel">gavel</span>
<div>
<p class="text-[10px] font-bold text-stone-300 uppercase">Cumplimiento Fiscal</p>
<p class="text-[10px] text-stone-500 leading-tight mt-1">Este asiento contable genera automáticamente el comprobante de retención y el registro en el Libro de Compras según Providencia Administrativa vigente.</p>
</div>
</div>
</div>
</div>
<!-- Secondary Metadata -->
<div class="bg-surface-container-low p-6 rounded-lg space-y-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary" data-icon="inventory_2">inventory_2</span>
<div>
<p class="text-[10px] font-bold uppercase text-tertiary">Impacto en Stock</p>
<p class="text-xs font-medium text-on-surface">Se cargarán +14 unidades al almacén principal</p>
</div>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary" data-icon="account_balance">account_balance</span>
<div>
<p class="text-[10px] font-bold uppercase text-tertiary">Asiento Contable</p>
<p class="text-xs font-medium text-on-surface">Débito: 1.01.03.01 - Crédito: 2.01.01.01</p>
</div>
</div>
</div>
<!-- Action Button -->
<button class="w-full bg-primary text-on-primary py-5 rounded-lg flex items-center justify-center gap-4 hover:bg-surface-tint transition-all group active:scale-95 duration-100">
<span class="font-space-grotesk font-black uppercase tracking-widest text-lg">Procesar y Aumentar Stock</span>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
</button>
<p class="text-center text-[10px] font-bold uppercase text-tertiary tracking-tighter">
                        PROCESO IRREVERSIBLE TRAS VALIDACIÓN DE ALMACÉN
                    </p>
</div>
</div>
</div>
<!-- Footer / Technical Specs Info -->
<footer class="mt-auto px-8 py-6 border-t border-surface-container flex justify-between items-center text-tertiary">
<div class="flex gap-8 items-center">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span class="text-[10px] font-bold uppercase tracking-widest">Database Linked: LOCAL_DB_01</span>
</div>
<div class="text-[10px] font-bold uppercase tracking-widest">Timestamp: 2024-05-24 14:32:01</div>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="verified_user">verified_user</span>
<span class="text-[10px] font-bold uppercase tracking-widest">Secure Entry Point - SSL High Encryption</span>
</div>
</footer>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/factura-compra.js"></script>
</body>
</html>