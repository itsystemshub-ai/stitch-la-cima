<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="TITAN ERP: ACCOUNTING - Chart of Accounts - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>TITAN ERP: ACCOUNTING - Chart of Accounts | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/plan-cuentas.css">
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
<main class="flex-1 md:ml-64 p-8 bg-surface">
<!-- Header Section -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between mb-10 gap-6">
<div class="space-y-1">
<div class="flex items-center gap-2 mb-2">
<span class="bg-primary-container text-on-primary-container text-[10px] px-2 py-0.5 font-bold tracking-widest uppercase">Precision Forge System</span>
</div>
<h1 class="text-4xl font-headline font-bold uppercase tracking-tight text-on-background">Chart of Accounts</h1>
<p class="text-secondary font-medium tracking-tight">MAYOR DE REPUESTO LA CIMA <span class="mx-2">|</span> Plan de Cuentas Jerárquico</p>
</div>
<div class="flex items-center gap-3">
<button class="bg-surface-container-high border-0 px-6 py-2.5 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-on-surface hover:bg-surface-container-highest transition-all active:scale-95">
<span class="material-symbols-outlined text-sm">upload_file</span>
                        Export to Excel
                    </button>
<button class="bg-primary text-on-primary px-6 py-2.5 flex items-center gap-2 text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all active:scale-95 shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-sm">add_circle</span>
                        Add Account
                    </button>
</div>
</div>
<!-- Dashboard Stats Summary (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-1 mb-12">
<div class="bg-surface-container p-6 border-l-4 border-primary">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Total Assets</p>
<p class="text-2xl font-headline font-bold text-on-background">$2,450,892.40</p>
</div>
<div class="bg-surface-container-low p-6">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Total Liabilities</p>
<p class="text-2xl font-headline font-bold text-on-background">$842,110.15</p>
</div>
<div class="bg-surface-container-low p-6">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Total Equity</p>
<p class="text-2xl font-headline font-bold text-on-background">$1,608,782.25</p>
</div>
<div class="bg-surface-container-low p-6">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Account Count</p>
<p class="text-2xl font-headline font-bold text-on-background">142 Entries</p>
</div>
</div>
<!-- Table Section -->
<div class="bg-surface-container-lowest overflow-hidden">
<!-- Table Header -->
<div class="grid grid-cols-12 bg-on-background text-background py-4 px-6 text-[11px] font-bold uppercase tracking-widest">
<div class="col-span-2">Account Code</div>
<div class="col-span-4">Account Name</div>
<div class="col-span-2">Type</div>
<div class="col-span-2 text-right">Current Balance</div>
<div class="col-span-2 text-right">Actions</div>
</div>
<!-- Hierarchical Rows -->
<!-- Level 1 -->
<div class="grid grid-cols-12 py-4 px-6 border-b border-surface-container text-sm font-bold bg-surface-container-low">
<div class="col-span-2 tracking-tighter">1.0.00.00</div>
<div class="col-span-4 uppercase">ACTIVOS</div>
<div class="col-span-2">ASSET</div>
<div class="col-span-2 text-right">$2,450,892.40</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<!-- Level 2 -->
<div class="grid grid-cols-12 py-3.5 px-6 border-b border-surface-container text-sm font-semibold bg-surface-container-lowest pl-10">
<div class="col-span-2 tracking-tighter">1.1.00.00</div>
<div class="col-span-4 uppercase">Activos Corrientes</div>
<div class="col-span-2">ASSET</div>
<div class="col-span-2 text-right">$1,120,440.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<!-- Level 3 (Leaf Nodes) -->
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">1.1.01.01</div>
<div class="col-span-4 font-medium">Caja General - Principal</div>
<div class="col-span-2 text-secondary">LIQUID ASSET</div>
<div class="col-span-2 text-right font-bold">$12,450.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">1.1.01.02</div>
<div class="col-span-4 font-medium">Bancos - Operativo Central</div>
<div class="col-span-2 text-secondary">LIQUID ASSET</div>
<div class="col-span-2 text-right font-bold">$458,990.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">1.1.05.01</div>
<div class="col-span-4 font-medium">Inventario de Repuestos Pesados</div>
<div class="col-span-2 text-secondary">INVENTORY</div>
<div class="col-span-2 text-right font-bold">$649,000.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<!-- Next Group -->
<div class="grid grid-cols-12 py-4 px-6 border-b border-surface-container text-sm font-bold bg-surface-container-low mt-4">
<div class="col-span-2 tracking-tighter">2.0.00.00</div>
<div class="col-span-4 uppercase">PASIVOS</div>
<div class="col-span-2">LIABILITY</div>
<div class="col-span-2 text-right">$842,110.15</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<div class="grid grid-cols-12 py-3.5 px-6 border-b border-surface-container text-sm font-semibold bg-surface-container-lowest pl-10">
<div class="col-span-2 tracking-tighter">2.1.00.00</div>
<div class="col-span-4 uppercase">Pasivos a Corto Plazo</div>
<div class="col-span-2">LIABILITY</div>
<div class="col-span-2 text-right">$312,400.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">2.1.01.01</div>
<div class="col-span-4 font-medium">Proveedores Nacionales</div>
<div class="col-span-2 text-secondary">PAYABLE</div>
<div class="col-span-2 text-right font-bold">$198,000.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">2.1.05.10</div>
<div class="col-span-4 font-medium">Impuestos por Pagar (IVA)</div>
<div class="col-span-2 text-secondary">TAX</div>
<div class="col-span-2 text-right font-bold">$114,400.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
</div>
<!-- Footer Meta -->
<div class="mt-8 flex justify-between items-center text-[10px] font-bold uppercase tracking-[0.2em] text-secondary">
<div class="flex gap-8">
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> DATABASE ONLINE</span>
<span>LAST SYNC: 2023-10-27 09:42:12</span>
</div>
<div>
                    TERMINAL ID: T-XC44-LEGER
                </div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/plan-cuentas.js"></script>
</body>
</html>