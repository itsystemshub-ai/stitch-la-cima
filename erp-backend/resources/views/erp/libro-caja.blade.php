<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="TITAN INDUSTRIAL ERP - Finanzas &amp; Bancos - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>TITAN INDUSTRIAL ERP - Finanzas &amp; Bancos | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/libro-caja.css">
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
<main class="ml-64 pt-24 px-8 pb-12">
<!-- Header & Real-Time Balances -->
<div class="flex flex-col gap-6 mb-12">
<div class="flex justify-between items-end">
<div>
<h1 class="text-4xl font-extrabold tracking-tighter uppercase text-on-surface">Gestión Bancaria &amp; Libro Caja</h1>
<p class="text-secondary font-label text-sm uppercase tracking-widest mt-1">Saldos Consolidados a Tiempo Real</p>
</div>
<div class="flex gap-3">
<button class="bg-surface-container-high hover:bg-surface-container-highest px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm" data-icon="file_download">file_download</span> Exportar PDF
                    </button>
<button class="bg-primary hover:bg-primary-container text-on-primary px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm" data-icon="sync_alt">sync_alt</span> Nueva Conciliación
                    </button>
</div>
</div>
<!-- Dashboard Grid (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
<div class="bg-surface-container-lowest p-6 flex flex-col gap-2 border-l-4 border-primary">
<span class="text-[10px] font-bold text-secondary uppercase tracking-widest">Banco Santander - Operativo</span>
<span class="text-3xl font-headline font-bold text-on-surface">$1,452,380.00</span>
<div class="flex items-center gap-1 text-xs text-primary font-bold">
<span class="material-symbols-outlined text-sm" data-icon="arrow_upward">arrow_upward</span> +2.4% vs ayer
                    </div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-2">
<span class="text-[10px] font-bold text-secondary uppercase tracking-widest">BBVA - Reserva</span>
<span class="text-3xl font-headline font-bold text-on-surface">$845,000.50</span>
<div class="flex items-center gap-1 text-xs text-secondary font-bold">
                        Conciliado hace 2h
                    </div>
</div>
<div class="bg-surface-container-lowest p-6 flex flex-col gap-2">
<span class="text-[10px] font-bold text-secondary uppercase tracking-widest">Caja Chica - Planta 1</span>
<span class="text-3xl font-headline font-bold text-on-surface">$12,400.00</span>
<div class="flex items-center gap-1 text-xs text-error font-bold">
<span class="material-symbols-outlined text-sm" data-icon="warning">warning</span> Reponer fondos
                    </div>
</div>
<div class="bg-primary text-on-primary p-6 flex flex-col gap-2">
<span class="text-[10px] font-bold text-on-primary/70 uppercase tracking-widest">Consolidado Total</span>
<span class="text-3xl font-headline font-bold">$2,309,780.50</span>
<div class="flex items-center gap-1 text-xs text-on-primary/80 font-bold uppercase">
                        Auditoría 100% OK
                    </div>
</div>
</div>
</div>
<!-- Section 1: Libro de Movimientos & Conciliación -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
<div class="lg:col-span-2 space-y-4">
<div class="flex justify-between items-center">
<h2 class="text-xl font-bold uppercase tracking-tight">Registro de Movimientos</h2>
<div class="flex gap-2">
<input class="bg-surface-container-high border-none text-xs px-4 py-2 focus:ring-1 focus:ring-primary w-64" placeholder="Filtrar por concepto..." type="text"/>
</div>
</div>
<div class="bg-surface-container-lowest overflow-hidden">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container text-secondary text-[10px] uppercase font-bold tracking-widest">
<tr>
<th class="px-4 py-3">Fecha</th>
<th class="px-4 py-3">Referencia</th>
<th class="px-4 py-3">Concepto</th>
<th class="px-4 py-3">Tipo</th>
<th class="px-4 py-3 text-right">Monto</th>
<th class="px-4 py-3 text-center">Estado</th>
</tr>
</thead>
<tbody class="text-xs font-label">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">24/05/2024</td>
<td class="px-4 py-4 font-mono">#TRF-9023</td>
<td class="px-4 py-4 font-bold">Pago Proveedor Acero Inox</td>
<td class="px-4 py-4"><span class="bg-surface-container-high px-2 py-1 text-[10px]">EGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-error">-$250,000.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-primary text-lg" data-icon="check_circle">check_circle</span></td>
</tr>
<tr class="bg-surface-container-low/50 hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">24/05/2024</td>
<td class="px-4 py-4 font-mono">#CHQ-4451</td>
<td class="px-4 py-4 font-bold">Cobro Factura #V-998 (Cliente Ind.)</td>
<td class="px-4 py-4"><span class="bg-primary-container/20 text-on-primary-container px-2 py-1 text-[10px]">INGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-primary">+$180,500.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-secondary text-lg" data-icon="history">history</span></td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">23/05/2024</td>
<td class="px-4 py-4 font-mono">#INT-0032</td>
<td class="px-4 py-4 font-bold">Rendimientos Cuenta de Ahorro</td>
<td class="px-4 py-4"><span class="bg-primary-container/20 text-on-primary-container px-2 py-1 text-[10px]">INGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-primary">+$12,450.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-primary text-lg" data-icon="check_circle">check_circle</span></td>
</tr>
<tr class="bg-surface-container-low/50 hover:bg-surface-container-low transition-colors">
<td class="px-4 py-4 text-secondary">23/05/2024</td>
<td class="px-4 py-4 font-mono">#TRF-8871</td>
<td class="px-4 py-4 font-bold">Nómina Operarios Planta 2</td>
<td class="px-4 py-4"><span class="bg-surface-container-high px-2 py-1 text-[10px]">EGRESO</span></td>
<td class="px-4 py-4 text-right font-bold text-error">-$412,000.00</td>
<td class="px-4 py-4 text-center"><span class="material-symbols-outlined text-primary text-lg" data-icon="check_circle">check_circle</span></td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Conciliación Rápida & Acciones -->
<div class="space-y-6">
<div class="bg-stone-900 text-stone-100 p-6 rounded-lg relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-lime-500/10 blur-3xl rounded-full -translate-y-1/2 translate-x-1/2"></div>
<h3 class="text-sm font-bold uppercase tracking-widest text-lime-400 mb-4">Conciliación Rápida AI</h3>
<p class="text-xs text-stone-400 leading-relaxed mb-6">Hemos detectado 4 movimientos bancarios que coinciden con facturas pendientes de cobro.</p>
<div class="space-y-3">
<div class="bg-stone-800 p-3 flex justify-between items-center group cursor-pointer hover:bg-stone-700 transition-all">
<div>
<div class="text-[10px] text-stone-500 font-bold uppercase">Match 98%</div>
<div class="text-xs font-bold">Depósito $45,000.00</div>
</div>
<span class="material-symbols-outlined text-lime-500 opacity-0 group-hover:opacity-100 transition-opacity" data-icon="arrow_forward">arrow_forward</span>
</div>
<button class="w-full bg-lime-500 text-stone-950 text-xs font-bold py-3 uppercase tracking-widest mt-2">Ejecutar Auto-Conciliación</button>
</div>
</div>
<div class="bg-surface-container p-6">
<h3 class="text-xs font-bold uppercase tracking-widest text-secondary mb-4">Flujo Mensual</h3>
<div class="h-32 flex items-end gap-2 px-2">
<div class="flex-1 bg-primary/20 h-3/4 hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary/20 h-1/2 hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary/20 h-full hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary/20 h-2/3 hover:bg-primary transition-all"></div>
<div class="flex-1 bg-primary h-5/6"></div>
</div>
<div class="flex justify-between mt-2 text-[10px] text-secondary font-bold uppercase">
<span>Ene</span><span>Feb</span><span>Mar</span><span>Abr</span><span>May</span>
</div>
</div>
</div>
</section>
<!-- Section 2: Antigüedad de Saldos -->
<section class="space-y-6">
<div class="flex justify-between items-center">
<div>
<h2 class="text-xl font-bold uppercase tracking-tight">Antigüedad de Saldos de Clientes</h2>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest">Análisis de cartera vencida y riesgo</p>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-primary"></div>
<span class="text-[10px] font-bold uppercase text-secondary">Corriente</span>
</div>
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-secondary"></div>
<span class="text-[10px] font-bold uppercase text-secondary">30-60 Días</span>
</div>
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-error"></div>
<span class="text-[10px] font-bold uppercase text-secondary">&gt;90 Días</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Cliente 1 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Industrial S.A.</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $1.2M</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[80%] bg-primary"></div>
<div class="w-[15%] bg-secondary"></div>
<div class="w-[5%] bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-primary">80% OK</span>
<span class="text-error">Bajo Riesgo</span>
</div>
</div>
<!-- Cliente 2 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Minera del Norte</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $840k</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[40%] bg-primary"></div>
<div class="w-[40%] bg-secondary"></div>
<div class="w-[20%] bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-secondary">40% Vencido</span>
<span class="text-error">Alerta</span>
</div>
</div>
<!-- Cliente 3 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Logística Global</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $3.5M</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[95%] bg-primary"></div>
<div class="w-[5%] bg-secondary"></div>
<div class="w-0 bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-primary">95% OK</span>
<span class="text-primary">Excelente</span>
</div>
</div>
<!-- Cliente 4 -->
<div class="border-l border-surface-container-high pl-4">
<div class="text-sm font-bold uppercase mb-1">Suministros Ferrosos</div>
<div class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-3">Total Deuda: $150k</div>
<div class="flex gap-1 h-2 mb-2">
<div class="w-[10%] bg-primary"></div>
<div class="w-[20%] bg-secondary"></div>
<div class="w-[70%] bg-error"></div>
</div>
<div class="flex justify-between text-[10px] font-bold">
<span class="text-error">70% &gt;90 Días</span>
<span class="text-success font-bold text-green-500">ACTIVO</span>
</div>
</div>
</div>
<!-- Resumen de Riesgo (Full Width) -->
<div class="bg-surface-container-high p-4 flex justify-between items-center">
<div class="flex gap-8">
<div>
<div class="text-[9px] font-bold text-secondary uppercase tracking-widest">Cartera Corriente</div>
<div class="text-lg font-bold">$12,450,000.00</div>
</div>
<div>
<div class="text-[9px] font-bold text-secondary uppercase tracking-widest">Monto en Riesgo</div>
<div class="text-lg font-bold text-error">$842,000.00</div>
</div>
<div>
<div class="text-[9px] font-bold text-secondary uppercase tracking-widest">Promedio Días Pago</div>
<div class="text-lg font-bold">42 Días</div>
</div>
</div>
<button class="bg-on-surface text-surface px-6 py-3 text-xs font-bold uppercase tracking-widest hover:bg-stone-800 transition-all">Ver Reporte Analítico</button>
</div>
</section>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/libro-caja.js"></script>
</body>
</html>