<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Ventas: Anulaciones y Notas de Crédito - TITAN INDUSTRIAL ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Ventas: Anulaciones y Notas de Crédito - TITAN INDUSTRIAL ERP | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/notas-credito.css">
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
<main class="ml-64 pt-24 px-8 pb-12 min-h-screen">
<!-- Header Section: Editorial Style -->
<header class="mb-12 relative">
<div class="absolute -top-6 -left-6 w-32 h-32 bg-primary-container/10 blur-3xl rounded-full"></div>
<h1 class="text-5xl font-extrabold headline uppercase tracking-tight text-on-surface mb-2">Módulo de Ventas</h1>
<div class="flex items-center gap-4">
<span class="bg-primary px-3 py-1 text-on-primary text-xs font-bold tracking-widest uppercase">Anulaciones</span>
<span class="text-on-surface-variant font-label text-sm uppercase tracking-wider">Gestión de Notas de Crédito Fiscales</span>
</div>
</header>
<!-- Search & Selection Area -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8">
<!-- Left: Search Invoice -->
<section class="lg:col-span-4 bg-surface-container-low p-8 relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl">search</span>
</div>
<h2 class="text-xl font-bold headline uppercase mb-6 tracking-wide">Buscar Factura</h2>
<div class="space-y-4">
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-1">Número de Documento</label>
<div class="relative">
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary py-4 px-4 font-mono text-sm" placeholder="FAC-2024-0042" type="text"/>
<button class="absolute right-2 top-2 p-2 bg-primary text-on-primary">
<span class="material-symbols-outlined">arrow_forward</span>
</button>
</div>
</div>
<div class="pt-4 border-t border-outline-variant/20">
<p class="text-xs text-on-surface-variant mb-4 italic">Resultados recientes</p>
<div class="space-y-2">
<div class="bg-surface-container-lowest p-3 flex justify-between items-center cursor-pointer hover:bg-primary-container/5 transition-colors">
<div>
<p class="font-bold text-sm">FAC-2024-0041</p>
<p class="text-[10px] text-on-surface-variant">CLIENTE: ACERO-TEC S.A.</p>
</div>
<span class="text-primary font-bold text-xs">$12,450.00</span>
</div>
</div>
</div>
</div>
</section>
<!-- Center: Invoice Detail & Reason Selection -->
<section class="lg:col-span-8 bg-surface-container-lowest p-8 border-l-4 border-primary">
<div class="flex justify-between items-start mb-8">
<div>
<h2 class="text-3xl font-bold headline uppercase tracking-tighter">Detalle de Operación</h2>
<p class="text-on-surface-variant font-label text-sm uppercase">Seleccionada: FAC-2024-0042</p>
</div>
<div class="text-right">
<p class="text-[10px] font-bold uppercase text-on-surface-variant">Total Facturado</p>
<p class="text-4xl font-bold headline text-primary tracking-tighter">$45,820.50</p>
</div>
</div>
<div class="grid grid-cols-2 gap-8 mb-8">
<div class="bg-surface-container p-6">
<label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-3">Motivo de Anulación</label>
<select class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary py-3 px-4 text-sm font-medium">
<option>Devolución de Mercancía</option>
<option>Error en Datos Fiscales</option>
<option>Error en Precios/Descuentos</option>
<option>Cancelación de Pedido</option>
</select>
</div>
<div class="bg-surface-container p-6">
<label class="block text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-3">Tipo de Nota</label>
<div class="flex gap-4">
<label class="flex items-center gap-2 cursor-pointer">
<input checked="" class="text-primary focus:ring-primary" name="nt" type="radio"/>
<span class="text-sm font-bold uppercase">Nota de Crédito</span>
</label>
<label class="flex items-center gap-2 cursor-pointer">
<input class="text-primary focus:ring-primary" name="nt" type="radio"/>
<span class="text-sm font-bold uppercase">Anulación Total</span>
</label>
</div>
</div>
</div>
<!-- Product Table for Selective Refund -->
<div class="mb-8 overflow-hidden">
<table class="w-full text-left">
<thead class="bg-surface-container-low">
<tr>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest">Partida / SKU</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest">Cant. Orig</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest">Cant. a Devolver</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest">Precio Unit.</th>
<th class="p-4 text-[10px] font-bold uppercase tracking-widest text-right">Subtotal</th>
</tr>
</thead>
<tbody class="text-sm">
<tr class="bg-surface border-b border-surface-container">
<td class="p-4">
<div class="font-bold">EJE-440-CROMO</div>
<div class="text-[10px] text-on-surface-variant">Eje de transmisión cromado 440mm</div>
</td>
<td class="p-4 font-mono">10 UN</td>
<td class="p-4">
<input class="w-16 bg-surface-container-highest border-none py-1 px-2 text-center text-sm font-bold text-primary" type="number" value="2"/>
</td>
<td class="p-4">$1,200.00</td>
<td class="p-4 text-right font-bold">$2,400.00</td>
</tr>
<tr class="bg-surface-container-low/30 border-b border-surface-container">
<td class="p-4">
<div class="font-bold">BRIDA-ANSI-600</div>
<div class="text-[10px] text-on-surface-variant">Brida industrial acero carbón</div>
</td>
<td class="p-4 font-mono">5 UN</td>
<td class="p-4">
<input class="w-16 bg-surface-container-highest border-none py-1 px-2 text-center text-sm font-bold text-primary" type="number" value="5"/>
</td>
<td class="p-4">$850.00</td>
<td class="p-4 text-right font-bold">$4,250.00</td>
</tr>
</tbody>
</table>
</div>
<div class="flex justify-end gap-4">
<button class="px-8 py-3 bg-surface-container-high text-on-surface font-bold uppercase tracking-wider text-sm hover:bg-surface-container-highest transition-colors">Cancelar</button>
<button class="px-8 py-3 bg-primary text-on-primary font-bold uppercase tracking-wider text-sm shadow-[0_10px_20px_-10px_rgba(73,104,0,0.5)] hover:scale-[1.02] transition-transform flex items-center gap-2">
<span class="material-symbols-outlined text-sm">receipt_long</span>
                        Generar Nota de Crédito
                    </button>
</div>
</section>
</div>
<!-- Inventory Sync Visualizer -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="bg-stone-900 text-stone-100 p-6 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-lime-400" style="font-variation-settings: 'FILL' 1;">inventory</span>
<h3 class="font-bold headline uppercase text-xs tracking-widest">Reingreso a Inventario</h3>
</div>
<p class="text-sm text-stone-400 leading-relaxed mb-6">Procesando actualización automática de stock para Terminal Central - Pasillo A4.</p>
</div>
<div class="flex items-end justify-between">
<div>
<p class="text-[10px] text-lime-500 uppercase font-bold">+7 Unidades</p>
<p class="text-xs text-stone-500">Estado: Sincronizando</p>
</div>
<span class="material-symbols-outlined text-lime-900 text-4xl">sync</span>
</div>
</div>
<div class="bg-surface-container p-6 md:col-span-2 relative overflow-hidden">
<div class="absolute inset-0 bg-gradient-to-r from-transparent via-primary/5 to-transparent -skew-x-12 translate-x-1/2"></div>
<h3 class="font-bold headline uppercase text-xs tracking-widest mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified</span>
                    Validez Fiscal Digital
                </h3>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<div class="border-l-2 border-outline-variant pl-4">
<p class="text-[10px] text-on-surface-variant font-bold uppercase mb-1">Folio Fiscal NC</p>
<p class="text-xs font-mono font-bold">NC-2024-8849-01</p>
</div>
<div class="border-l-2 border-outline-variant pl-4">
<p class="text-[10px] text-on-surface-variant font-bold uppercase mb-1">Estatus SAT</p>
<p class="text-xs font-bold text-primary uppercase">Validado</p>
</div>
<div class="border-l-2 border-outline-variant pl-4">
<p class="text-[10px] text-on-surface-variant font-bold uppercase mb-1">Timbrado</p>
<p class="text-xs font-bold">14/MAY 14:22</p>
</div>
<div class="border-l-2 border-outline-variant pl-4">
<p class="text-[10px] text-on-surface-variant font-bold uppercase mb-1">Certificado</p>
<p class="text-xs font-mono">000010000005</p>
</div>
</div>
</div>
</div>
<!-- Visual Decorative Element -->
<div class="mt-12 h-64 w-full relative overflow-hidden rounded-lg">
<img alt="Professional industrial factory interior with high precision machining and steel structures in soft focus" class="w-full h-full object-cover grayscale opacity-30 mix-blend-multiply" data-alt="dramatic industrial factory floor with machinery and structural steel beams in soft lighting with lime green accents" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAP-xFwXuOLFR9KrqG4Dab4TNSBBJgSVkIRB0SfP1fxKTex8r3VOjHY7TRjKP1IgwrLtTEhBIl2wTyvuokXJL2GULbftvO5R9P0HrkPIzW5DZ3xQFhbVBUpGRsU0ZkaqC5bmVEAHYGCaChAnLHqx_PyMJIdVatXzVoXw78OTl11AZtVAXAoOXwhmtxGKuV-Gx8Y68HDy2vD5Bdd6cacXULIb_ZPtjsxvMh2JwiDUlQGUv23CLwCsvlQBaO6J6GcAuOjW8V-eMizSAM"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent"></div>
<div class="absolute bottom-6 left-8">
<p class="headline font-bold text-4xl opacity-10 uppercase tracking-[0.2em]">Titan Engineering</p>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/notas-credito.js"></script>
</body>
</html>