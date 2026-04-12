<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Bandeja de Entrada de Aprobaciones | INDUSTRIAL FORGE ERP - MAYOR DE REPUESTO LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="../manifest.json">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Bandeja de Entrada de Aprobaciones | INDUSTRIAL FORGE ERP | ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/aprobaciones.css">
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
<main class="md:ml-64 pt-24 pb-12 px-8 min-h-screen">
<!-- Header Section -->
<header class="mb-12 relative">
<div class="absolute -top-10 -left-10 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="text-5xl font-black uppercase tracking-tight text-on-surface mb-2">Administración Central</h1>
<p class="text-lg text-secondary font-medium uppercase tracking-widest flex items-center gap-2">
<span class="w-4 h-[2px] bg-primary"></span> Bandeja de Entrada de Aprobaciones
                    </p>
</div>
<div class="flex gap-4">
<div class="bg-surface-container-high px-6 py-4 flex flex-col items-center">
<span class="text-primary font-black text-3xl">12</span>
<span class="text-[10px] uppercase tracking-tighter font-bold text-secondary">Pendientes</span>
</div>
<div class="bg-surface-container-high px-6 py-4 flex flex-col items-center border-l-4 border-error">
<span class="text-error font-black text-3xl">04</span>
<span class="text-[10px] uppercase tracking-tighter font-bold text-secondary">Críticos</span>
</div>
</div>
</div>
</header>
<!-- Search & Filter Bar -->
<section class="bg-surface-container-low p-2 mb-8 flex flex-wrap items-center gap-4">
<div class="flex-1 relative min-w-[280px]">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-secondary">search</span>
<input class="w-full bg-white border-none py-3 pl-12 pr-4 text-xs font-bold uppercase tracking-widest focus:ring-2 focus:ring-primary" placeholder="BUSCAR SOLICITUD O REFERENCIA..." type="text"/>
</div>
<div class="flex gap-2">
<button class="bg-white px-4 py-3 text-[10px] font-bold uppercase tracking-widest border-b-2 border-primary">Todas</button>
<button class="hover:bg-white px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Compras</button>
<button class="hover:bg-white px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Inventario</button>
<button class="hover:bg-white px-4 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Personal</button>
</div>
</section>
<!-- Bento Grid Layout for Approval Cards -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
<!-- CRITICAL ITEM: Order Over $5000 -->
<div class="xl:col-span-8 bg-surface-container-lowest p-8 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-0.5 h-full bg-error/20"></div>
<div class="flex justify-between items-start mb-8">
<div>
<div class="flex items-center gap-3 mb-4">
<span class="bg-error text-white text-[10px] px-2 py-1 font-black uppercase tracking-tighter">ALTA PRIORIDAD</span>
<span class="text-secondary text-[10px] font-bold uppercase tracking-widest">ORDEN DE COMPRA #OC-29401</span>
</div>
<h3 class="text-3xl font-black uppercase tracking-tight mb-2">Importación Motores Caterpillar 3406</h3>
<p class="text-secondary text-sm max-w-xl">Reposición de stock crítico para contratos mineros zona sur. Proveedor: HeavyEquipment Ltd (Miami).</p>
</div>
<div class="text-right">
<span class="text-4xl font-black text-on-surface">$54,200.00</span>
<p class="text-[10px] font-bold text-secondary uppercase mt-1">Total Neto (Exento IVA)</p>
</div>
</div>
<div class="grid grid-cols-3 gap-8 mb-10 py-6 border-y border-outline-variant/30">
<div>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Solicitado por</p>
<p class="font-bold text-sm">Ing. Marcos Rivas</p>
</div>
<div>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Almacén Destino</p>
<p class="font-bold text-sm">Almacén Central (Puerto Ordaz)</p>
</div>
<div>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Fecha Límite</p>
<p class="font-bold text-sm text-error">24h Restantes</p>
</div>
</div>
<div class="flex flex-wrap justify-between items-center gap-6">
<div class="flex gap-4">
<button class="bg-primary text-on-primary px-8 py-3 font-black text-xs uppercase tracking-widest hover:scale-105 transition-transform flex items-center gap-2">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span> Aprobar
                        </button>
<button class="bg-surface-container-high text-on-surface px-8 py-3 font-black text-xs uppercase tracking-widest border border-outline-variant/20 hover:bg-error hover:text-white transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-sm">cancel</span> Rechazar
                        </button>
</div>
<button class="text-[10px] font-black uppercase tracking-widest text-primary flex items-center gap-2 group">
                        Ver Detalles Técnicos <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</div>
</div>
<!-- SIDE ITEM: New User Access -->
<div class="xl:col-span-4 bg-surface-container-lowest p-8 flex flex-col justify-between">
<div>
<div class="flex items-center gap-3 mb-6">
<span class="bg-primary-container text-on-primary-container text-[10px] px-2 py-1 font-black uppercase tracking-tighter">ACCESO SISTEMA</span>
<span class="text-secondary text-[10px] font-bold uppercase tracking-widest">NUEVO USUARIO</span>
</div>
<div class="flex items-center gap-4 mb-6">
<div class="w-16 h-16 bg-surface-container-highest flex items-center justify-center">
<span class="material-symbols-outlined text-4xl text-secondary">person</span>
</div>
<div>
<h3 class="text-xl font-black uppercase tracking-tight">Celia Ortega</h3>
<p class="text-xs font-bold text-secondary uppercase">Analista de Compras Jr.</p>
</div>
</div>
<div class="space-y-3 mb-8">
<div class="flex items-center gap-2 text-xs font-bold text-on-surface">
<span class="material-symbols-outlined text-primary text-lg" style="font-variation-settings: 'FILL' 1;">verified_user</span> Perfil: Operador Nivel 1
                        </div>
<div class="flex items-center gap-2 text-xs font-bold text-on-surface">
<span class="material-symbols-outlined text-primary text-lg" style="font-variation-settings: 'FILL' 1;">lock</span> Módulos: Inventario, Compras
                        </div>
</div>
</div>
<div class="grid grid-cols-2 gap-2">
<button class="bg-primary-container text-on-primary-container py-3 font-black text-[10px] uppercase tracking-widest">Aprobar</button>
<button class="bg-surface-container-high py-3 font-black text-[10px] uppercase tracking-widest">Detalle</button>
</div>
</div>
<!-- FULL WIDTH ROW: Inventory Adjustment -->
<div class="xl:col-span-12 bg-surface-container-high p-8 flex flex-col md:flex-row items-center gap-12 group">
<div class="w-full md:w-48 h-48 bg-white p-4 shrink-0">
<img class="w-full h-full object-cover" data-alt="Industrial machinery components laid out on a blueprint for technical inspection" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7idQ8PO_25x_MgAF9Ebh6-OGGkL2vPBJ5ZFEb_hI0ZrsXWbjnd6tsbNb47yZigaOEt29RN7gH47_RuVFy7hAPXzYb_VIDu5H-l8JKy65IX4Vupj0FbHXMiGShIJztyuqdjhcKNCQS2oc0aaiazFee9rYaUPoXYnN2leGSZqVBv6AxkQv8ABxZVMl5OKGyha_RfpHbEMqh-gCGJWAMRyL3v0T7Mv0cOOiHDTmswJK4GFVkXsgPTikVZQ4pR-aeQP5GcnLr-zoBnnU"/>
</div>
<div class="flex-1">
<div class="flex items-center gap-3 mb-4">
<span class="bg-secondary text-white text-[10px] px-2 py-1 font-black uppercase tracking-tighter">AJUSTE CRÍTICO</span>
<span class="text-secondary text-[10px] font-bold uppercase tracking-widest">INVENTARIO FISICO VS SISTEMA</span>
</div>
<h3 class="text-2xl font-black uppercase tracking-tight mb-4">Discrepancia Ejes de Transmisión (Z-40)</h3>
<div class="flex flex-wrap gap-12">
<div>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Teórico</p>
<p class="text-2xl font-black">124 Unid.</p>
</div>
<div>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Real Hallado</p>
<p class="text-2xl font-black text-error">98 Unid.</p>
</div>
<div>
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Diferencia Costo</p>
<p class="text-2xl font-black">-$2,860.00</p>
</div>
</div>
</div>
<div class="flex flex-col gap-2 w-full md:w-auto">
<button class="bg-on-surface text-white px-8 py-3 font-black text-xs uppercase tracking-widest hover:bg-primary transition-colors">Aprobar Ajuste</button>
<button class="bg-white text-on-surface px-8 py-3 font-black text-xs uppercase tracking-widest hover:bg-surface-container-highest transition-colors">Solicitar Recuento</button>
<button class="text-[10px] font-black uppercase tracking-widest text-secondary mt-2 text-center">Ver Reporte Auditoría</button>
</div>
</div>
<!-- ROW: Payroll Approval -->
<div class="xl:col-span-12 bg-white p-8 grid grid-cols-1 md:grid-cols-4 gap-8 items-center border-l-[12px] border-primary">
<div class="col-span-1">
<span class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-2 block">CÓMPUTO DE NOMINA</span>
<h3 class="text-xl font-black uppercase tracking-tight">MES: OCTUBRE 2023</h3>
<p class="text-xs text-secondary font-medium">152 Empleados Activos</p>
</div>
<div class="col-span-1 border-l border-outline-variant/30 pl-8">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Monto a Dispersar</p>
<p class="text-2xl font-black">$31,450.00</p>
</div>
<div class="col-span-1 border-l border-outline-variant/30 pl-8">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Estado Revisión</p>
<div class="flex items-center gap-2">
<span class="w-3 h-3 bg-primary rounded-full"></span>
<span class="text-xs font-bold uppercase">Validado por RRHH</span>
</div>
</div>
<div class="col-span-1 flex justify-end gap-3">
<button class="w-full md:w-auto bg-primary text-on-primary px-6 py-4 font-black text-xs uppercase tracking-widest">Emitir Pago</button>
<button class="bg-surface-container-high p-4 flex items-center justify-center">
<span class="material-symbols-outlined">description</span>
</button>
</div>
</div>
</div>
<!-- Pagination or Load More (Editorial Style) -->
<div class="mt-16 flex items-center justify-between border-t-4 border-on-surface pt-6">
<span class="text-[10px] font-black uppercase tracking-[0.2em] text-secondary">MOSTRANDO 04 DE 12 SOLICITUDES</span>
<button class="flex items-center gap-4 group">
<span class="text-xs font-black uppercase tracking-widest">Cargar más registros</span>
<div class="w-10 h-10 bg-on-surface text-white flex items-center justify-center group-hover:bg-primary transition-colors">
<span class="material-symbols-outlined">add</span>
</div>
</button>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/aprobaciones.js"></script>
</body>
</html>