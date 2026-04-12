<!DOCTYPE html>
<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Ajustes de Inventario | Mayor de Repuesto LA CIMA, C.A."/>
<meta name="theme-color" content="#ceff5e">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
<title>Ajustes de Inventario | Portal ERP La Cima</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/ajustes-inventario.css">
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
        <img src="{{ asset('assets/images/logo.png') }}" class="w-7 h-7 object-contain" alt="Logo">
      </div>
      <div>
        <h2 class="font-headline font-bold text-sm text-stone-900 leading-none uppercase">LA CIMA, C.A.</h2>
        <span class="text-[10px] font-mono text-stone-400">RIF: J-40308741-5</span>
      </div>
    </div>
    <p class="text-[10px] font-bold text-stone-400 tracking-wider uppercase">Portal ERP Corporativo</p>
  </div>

  <div class="px-4 mb-4">
    <div class="relative">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400"><span class="material-symbols-outlined text-lg">search</span></span>
      <input class="bg-stone-100 border-none text-sm pl-10 pr-3 py-2 w-full rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-white transition-all" placeholder="Buscar..." type="text"/>
    </div>
  </div>

  <nav class="flex-1 px-3 overflow-y-auto no-scrollbar space-y-0.5 pb-20">
    <div class="menu-group">Principal</div>
    <a class="menu-item menu-item-inactive" href="{{ url('/') }}">
      <span class="material-symbols-outlined text-[20px]">storefront</span><span>Tienda Virtual</span>
    </a>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/inicio') }}">
      <span class="material-symbols-outlined text-[20px]">dashboard</span><span>Dashboard Central</span>
    </a>

    <div class="menu-group">Gestión de Inventario</div>
    <div class="menu-parent open">
      <div class="menu-item menu-item-active" onclick="toggleDropdown(this)">
        <span class="material-symbols-outlined text-[20px]">inventory_2</span><span>Almacén Central</span>
        <span class="material-symbols-outlined dropdown-arrow">chevron_right</span>
      </div>
      <div class="submenu block static bg-transparent border-none shadow-none opacity-100 visible transform-none p-0 pl-10 pointer-events-auto">
        <a href="{{ url('/erp/inventario') }}"><span class="material-symbols-outlined">analytics</span> Resumen</a>
        <a href="{{ url('/erp/productos') }}"><span class="material-symbols-outlined">category</span> Catálogo Stock</a>
        <a href="{{ url('/erp/kardex') }}"><span class="material-symbols-outlined">receipt_long</span> Movimientos (Kardex)</a>
        <a href="{{ url('/erp/ajustes-inventario') }}" class="text-stone-900 font-bold"><span class="material-symbols-filled text-primary">edit_note</span> Ajustes</a>
      </div>
    </div>

    <div class="menu-group">Operaciones</div>
    <a class="menu-item menu-item-inactive" href="{{ url('/erp/ventas') }}">
      <span class="material-symbols-outlined text-[20px]">payments</span><span>Ventas y POS</span>
    </a>
  </nav>

  <div class="mt-auto border-t border-stone-200 p-4 bg-stone-50">
    <a href="{{ url('/auth/login') }}" class="w-full bg-red-50 text-red-600 font-bold py-2.5 px-4 flex items-center justify-center gap-2 hover:bg-red-100 transition-all rounded-lg text-[10px] uppercase tracking-widest">
      <span class="material-symbols-outlined text-[16px]">logout</span>
      Salir del ERP
    </a>
  </div>
</aside>

<!-- ========== TOP BAR ========== -->
<header class="fixed top-0 left-72 right-0 bg-white/80 backdrop-blur-xl z-40 border-b border-stone-200">
  <div class="flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-4">
      <button id="menuToggle" class="lg:hidden p-2 text-stone-500 hover:bg-stone-100 rounded-lg">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <div class="hidden md:flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-stone-500">
        <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-stone-900" id="breadcrumbPage">Ajustes</span>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="flex items-center gap-3 ml-2 pl-4 border-l border-stone-200">
        <div class="text-right hidden md:block">
          <p class="text-[11px] font-black text-stone-900 leading-none uppercase">Administrador</p>
          <p class="text-[9px] font-bold text-primary uppercase tracking-tighter bg-stone-900 px-1 inline-block mt-1">Control Total</p>
        </div>
        <div class="w-9 h-9 bg-stone-900 rounded-lg flex items-center justify-center text-primary font-black text-sm">LC</div>
      </div>
    </div>
  </div>
</header>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<main class="md:ml-64 pt-20 p-6 min-h-screen">
<div class="max-w-7xl mx-auto">
<header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<div class="inline-block px-2 py-1 bg-primary-container text-on-primary-container text-[10px] font-bold uppercase tracking-widest mb-2">Fiscal Compliance</div>
<h1 class="text-4xl font-headline font-extrabold tracking-tighter uppercase leading-none">Ajustes de Inventario</h1>
<p class="text-secondary mt-2 max-w-xl text-sm leading-relaxed">Registro mandatorio de mermas, daños y ajustes físicos. Cumplimiento estricto con el Artículo 177 de la Ley de Impuesto Sobre la Renta (ISLR).</p>
</div>
<div class="flex gap-3">
<div class="bg-surface-container px-4 py-2 flex flex-col items-end">
<span class="text-[10px] text-secondary font-bold uppercase">Último Cierre</span>
<span class="font-headline font-bold">28 OCT 2023</span>
</div>
<div class="bg-surface-container px-4 py-2 flex flex-col items-end">
<span class="text-[10px] text-secondary font-bold uppercase">Variación Acum.</span>
<span class="font-headline font-bold text-error">-2.40%</span>
</div>
</div>
</header>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
<section class="lg:col-span-8 space-y-6">
<div class="bg-surface-container-lowest p-8 shadow-sm">
<div class="flex items-center gap-2 mb-6">
<span class="w-2 h-6 bg-primary"></span>
<h2 class="font-headline font-bold text-xl uppercase tracking-tight">Nuevo Registro de Ajuste</h2>
</div>
<form class="space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="block text-[10px] font-bold text-secondary uppercase tracking-wider">Tipo de Ajuste</label>
<select class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary text-sm p-3 font-medium">
<option>Merma por Operación</option>
<option>Pérdida por Daño/Rotura</option>
<option>Diferencia de Conteo Físico</option>
<option>Vencimiento de Insumo</option>
</select>
</div>
<div class="space-y-2">
<label class="block text-[10px] font-bold text-secondary uppercase tracking-wider">Almacén de Origen</label>
<select class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary text-sm p-3 font-medium">
<option>Planta Principal - A1</option>
<option>Centro Logístico Norte</option>
<option>Depósito Externo</option>
</select>
</div>
</div>
<div class="bg-surface-container-low p-6 space-y-4">
<div class="flex justify-between items-center">
<h3 class="text-xs font-bold uppercase tracking-widest text-secondary">Artículos a Ajustar</h3>
<button class="text-primary text-[10px] font-bold hover:underline flex items-center gap-1" type="button">
<span class="material-symbols-outlined text-xs">add_circle</span> AGREGAR ITEM
                                    </button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="text-[10px] font-bold text-secondary uppercase border-b border-outline-variant/30">
<th class="py-2">SKU / Componente</th>
<th class="py-2">Stock Actual</th>
<th class="py-2">Cant. Ajuste</th>
<th class="py-2">Nuevo Stock</th>
<th class="py-2"></th>
</tr>
</thead>
<tbody class="text-sm">
<tr class="border-b border-surface-container">
<td class="py-4">
<div class="font-bold">ENG-992-TX</div>
<div class="text-[10px] text-secondary">Válvula de Presión Hidráulica</div>
</td>
<td class="py-4">154 units</td>
<td class="py-4">
<input class="w-20 bg-white border border-outline-variant text-xs p-1" type="number" value="-2"/>
</td>
<td class="py-4 font-bold">152</td>
<td class="py-4 text-right">
<button class="text-secondary hover:text-error"><span class="material-symbols-outlined text-sm">delete</span></button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="space-y-2">
<label class="block text-[10px] font-bold text-secondary uppercase tracking-wider">Justificación Administrativa (Art. 177 ISLR)</label>
<textarea class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary text-sm p-3" placeholder="Describa el motivo técnico del ajuste..." rows="3"></textarea>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-4">
<label class="block text-[10px] font-bold text-secondary uppercase tracking-wider">Soporte Digital (Acta PDF)</label>
<div class="border-2 border-dashed border-outline-variant bg-surface-container-low p-6 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined text-3xl text-secondary mb-2">upload_file</span>
<p class="text-[10px] font-bold uppercase">Adjuntar Acta Administrativa</p>
<p class="text-[9px] text-secondary mt-1">PDF, JPG (MAX 5MB)</p>
</div>
</div>
<div class="flex flex-col justify-end gap-3">
<button class="w-full bg-primary text-on-primary py-4 font-headline font-bold uppercase tracking-widest hover:brightness-110 transition-all shadow-lg active:scale-95" type="submit">
                                        Procesar Ajuste Fiscal
                                    </button>
<button class="w-full bg-surface-container-high text-secondary py-3 font-headline font-bold uppercase tracking-widest text-xs border border-transparent hover:border-outline-variant transition-all" type="button">
                                        Guardar Borrador
                                    </button>
</div>
</div>
</form>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="bg-surface-container-lowest p-6 border-l-4 border-primary">
<span class="material-symbols-outlined text-primary mb-2">verified_user</span>
<h4 class="text-[10px] font-bold uppercase text-secondary">Integridad de Datos</h4>
<p class="text-xs mt-1">Todos los ajustes son firmados digitalmente y sellados cronológicamente.</p>
</div>
<div class="bg-surface-container-lowest p-6 border-l-4 border-primary">
<span class="material-symbols-outlined text-primary mb-2">policy</span>
<h4 class="text-[10px] font-bold uppercase text-secondary">Art. 177 ISLR</h4>
<p class="text-xs mt-1">Cumplimiento automático de libros de inventario permanentes.</p>
</div>
<div class="bg-surface-container-lowest p-6 border-l-4 border-primary">
<span class="material-symbols-outlined text-primary mb-2">analytics</span>
<h4 class="text-[10px] font-bold uppercase text-secondary">Trazabilidad Total</h4>
<p class="text-xs mt-1">Historial inmutable desde la creación hasta la aprobación contable.</p>
</div>
</div>
</section>
<section class="lg:col-span-4 space-y-6">
<div class="bg-stone-900 text-white p-6 relative overflow-hidden">
<div class="relative z-10">
<h2 class="font-headline font-bold text-lg uppercase mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-lime-400">history</span>
                                Actas Recientes
                            </h2>
<div class="space-y-4">
<div class="border-l-2 border-lime-500 pl-4 py-1">
<div class="flex justify-between items-start">
<span class="text-[10px] font-bold text-lime-400 uppercase tracking-tighter">AJU-2023-089</span>
<span class="px-2 py-0.5 bg-lime-500/20 text-lime-400 text-[8px] font-bold uppercase rounded-full">Aprobado</span>
</div>
<p class="text-xs font-bold mt-1">Mermas de Producción Q3</p>
<p class="text-[10px] text-stone-400">Responsable: Ing. M. Salazar</p>
</div>
<div class="border-l-2 border-stone-600 pl-4 py-1">
<div class="flex justify-between items-start">
<span class="text-[10px] font-bold text-stone-400 uppercase tracking-tighter">AJU-2023-090</span>
<span class="px-2 py-0.5 bg-stone-700 text-stone-300 text-[8px] font-bold uppercase rounded-full">Pendiente</span>
</div>
<p class="text-xs font-bold mt-1">Ajuste Inventario Anual</p>
<p class="text-[10px] text-stone-400">Responsable: Admin Central</p>
</div>
<div class="border-l-2 border-lime-500 pl-4 py-1">
<div class="flex justify-between items-start">
<span class="text-[10px] font-bold text-lime-400 uppercase tracking-tighter">AJU-2023-087</span>
<span class="px-2 py-0.5 bg-lime-500/20 text-lime-400 text-[8px] font-bold uppercase rounded-full">Aprobado</span>
</div>
<p class="text-xs font-bold mt-1">Daño por Transporte Aéreo</p>
<p class="text-[10px] text-stone-400">Responsable: Logística Int.</p>
</div>
</div>
<button class="w-full mt-6 py-2 border border-stone-700 text-[10px] font-bold uppercase tracking-widest hover:bg-stone-800 transition-colors">
                                Ver Todo el Historial
                            </button>
</div>
<div class="absolute -right-10 -bottom-10 opacity-10">
<span class="material-symbols-outlined text-[160px]">description</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 shadow-sm overflow-hidden group">
<h3 class="font-headline font-bold text-sm uppercase mb-4">Métricas de Control</h3>
<div class="aspect-video bg-surface-container relative">
<img class="w-full h-full object-cover grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700" data-alt="Technical data visualization dashboard with line graphs showing inventory shrinkage trends in a modern dark industrial interface" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAwV04LJtOSEN-d15SJByiTCJIxfQOgTOlDNO4WEgmMNRfUCX_XqbdzsNDSdx_YfGn-T5i6MTHznikyQXEtnxWGZemRXxADtyOfXJ8SM58sH_FAzhGYVu1l2EpE0BN_9XOEFKvYCBWk7TwjehJEiJWHnxqJRE3S7XxYrzaRfNKA0NEY8Rpr5IZj5cJHfjwmebMema3XxKV-AzaVIOb7NMjtEImjYtJ7HxRoOtJmFBS0E5dIT8TiTIvzApEWNIT3VSB5THa2gntm2s"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest to-transparent"></div>
<div class="absolute bottom-4 left-4">
<p class="text-[10px] font-bold uppercase text-secondary">Tasa de Merma Industrial</p>
<p class="text-2xl font-headline font-extrabold">0.84%</p>
</div>
</div>
<div class="mt-4 grid grid-cols-2 gap-2">
<div class="p-3 bg-surface-container-low">
<p class="text-[9px] font-bold text-secondary uppercase">Valor Ajustes</p>
<p class="text-sm font-headline font-bold">$12,450</p>
</div>
<div class="p-3 bg-surface-container-low">
<p class="text-[9px] font-bold text-secondary uppercase">Items Afect.</p>
<p class="text-sm font-headline font-bold">428 pts</p>
</div>
</div>
</div>
<div class="bg-primary-container p-6">
<div class="flex items-start gap-4">
<div class="bg-primary p-2">
<span class="material-symbols-outlined text-white">info</span>
</div>
<div>
<h4 class="text-xs font-bold uppercase text-on-primary-container">Nota de Auditoría</h4>
<p class="text-[10px] text-on-primary-container/80 mt-1 leading-normal italic">"La falta de actas administrativas firmadas para justificar mermas superiores al 2% puede generar reparos fiscales inmediatos."</p>
</div>
</div>
</div>
</section>
</div>
</div>
</main>

<!-- Overlay mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="document.getElementById('sidebar').classList.remove('open'); this.classList.add('hidden');"></div>

<!-- Common Scripts -->
<script src="js/common.js"></script>
<script src="js/ajustes-inventario.js"></script>
</body>
</html>