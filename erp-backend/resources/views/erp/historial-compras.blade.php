@extends('layouts.erp')

@section('title', 'historial-compras | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/historial-compras.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="flex-1 md:ml-64 flex flex-col min-h-screen">
<!-- TopNavBar (Authority: JSON) -->
<header class="bg-stone-950/80 backdrop-blur-xl docked full-width top-0 z-50 flex justify-between items-center w-full px-6 py-4 sticky">
<div class="flex items-center gap-8">
<div class="text-2xl font-bold tracking-tighter text-lime-400 font-space-grotesk uppercase">METALLIC_CORE_ERP</div>
<nav class="hidden lg:flex items-center gap-6 font-space-grotesk uppercase tracking-tighter text-sm">
<a class="text-stone-400 hover:text-lime-200 transition-colors" href="#">Dashboard</a>
<a class="text-stone-400 hover:text-lime-200 transition-colors" href="#">Inventario</a>
<a class="text-stone-400 hover:text-lime-200 transition-colors" href="#">Reportes</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-500 text-sm" data-icon="search">search</span>
<input class="bg-stone-900 border-none text-[10px] pl-10 pr-4 py-2 w-64 text-stone-300 focus:ring-1 focus:ring-lime-400 font-space-grotesk" placeholder="BUSCAR ORDEN..." type="text"/>
</div>
<div class="flex items-center gap-2">
<button class="p-2 text-stone-400 hover:text-lime-400 transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-stone-400 hover:text-lime-400 transition-colors">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
</div>
<button class="bg-lime-400 text-stone-950 px-4 py-2 text-[10px] font-bold uppercase tracking-tighter hover:bg-lime-300 transition-all scale-95 active:duration-100">
                    Nueva Factura
                </button>
<img alt="User profile" class="w-8 h-8 rounded-full border border-stone-700" data-alt="Close-up portrait of a professional male engineer in a industrial setting with soft background blur and warm lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAZiYwM9f3lUAkjEzleHBNVK8VYwmGJBlxol-UI0P_vwN8quQ_e8wv-YIneHHKrvOEl4vugTzpFdr6v-9t_ALtxgHLUK0Vr4IclSSV1JVXCG-MlM0BHKlmvP0W6lUsu_6C5VdzJz9mVagnwBBHB9LvUqksWGFxK_Hyp6-zJM5XIKaWxWBr4soRansPQnzygd9U23K5H8N5nYXGx2k4cJJ19mqblwkswdA-tZq7rPu-rpMZxZpHjKwylSpDh_NPfN3xhoIKP1rzNwI"/>
</div>
</header>
<!-- Main Workspace -->
<section class="p-6 lg:p-10 max-w-7xl mx-auto w-full space-y-8">
<!-- Header Section (Editorial Industrial) -->
<div class="relative overflow-hidden bg-stone-950 p-8 rounded-lg shadow-inner">
<div class="absolute top-0 right-0 p-4 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[120px]" data-icon="history">history</span>
</div>
<div class="relative z-10">
<h1 class="text-4xl md:text-5xl font-black text-lime-400 uppercase tracking-tighter font-headline mb-2">Historial de Órdenes</h1>
<p class="text-stone-400 max-w-2xl font-body text-sm leading-relaxed">
                        Control centralizado de adquisiciones y suministros industriales. Gestione el flujo de materiales y servicios con precisión técnica y trazabilidad total.
                    </p>
</div>
</div>
<!-- Advanced Filters (Industrial Controls) -->
<div class="bg-surface-container p-6 rounded-lg flex flex-col lg:flex-row gap-6 items-end">
<div class="flex-1 w-full grid grid-cols-1 md:grid-cols-3 gap-4">
<div class="space-y-2">
<label class="text-[10px] uppercase font-bold tracking-widest text-on-surface-variant block">Rango de Fecha</label>
<div class="flex items-center gap-2">
<input class="flex-1 bg-surface-container-highest border-none text-xs p-3 focus:ring-2 focus:ring-primary" type="date"/>
<span class="text-stone-400">—</span>
<input class="flex-1 bg-surface-container-highest border-none text-xs p-3 focus:ring-2 focus:ring-primary" type="date"/>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase font-bold tracking-widest text-on-surface-variant block">Proveedor</label>
<select class="w-full bg-surface-container-highest border-none text-xs p-3 focus:ring-2 focus:ring-primary">
<option>Todos los Proveedores</option>
<option>Acero Continental S.A.</option>
<option>Logística Global C.A.</option>
<option>Lubricantes del Sur</option>
</select>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase font-bold tracking-widest text-on-surface-variant block">Estatus de Orden</label>
<div class="flex gap-2">
<button class="flex-1 py-3 text-[10px] font-bold uppercase tracking-tighter bg-primary text-on-primary">Todos</button>
<button class="flex-1 py-3 text-[10px] font-bold uppercase tracking-tighter bg-surface-container-highest hover:bg-surface-container-high transition-colors">Recibido</button>
<button class="flex-1 py-3 text-[10px] font-bold uppercase tracking-tighter bg-surface-container-highest hover:bg-surface-container-high transition-colors">Pendiente</button>
</div>
</div>
</div>
<button class="bg-stone-900 text-lime-400 px-8 py-3 h-[46px] text-[10px] font-bold uppercase tracking-widest border border-lime-400/30 hover:bg-stone-800 transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                    Aplicar Filtros
                </button>
</div>
<!-- Order Table (High Density Industrial) -->
<div class="bg-surface-container-lowest rounded-lg overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full border-collapse">
<thead>
<tr class="bg-stone-900 text-stone-400 text-[10px] uppercase tracking-widest font-headline">
<th class="px-6 py-4 text-left">Nro Orden</th>
<th class="px-6 py-4 text-left">Proveedor</th>
<th class="px-6 py-4 text-left">Estatus</th>
<th class="px-6 py-4 text-left">Usuario Registro</th>
<th class="px-6 py-4 text-right">Monto Total</th>
<th class="px-6 py-4 text-center">Acciones</th>
</tr>
</thead>
<tbody class="text-sm font-body">
<!-- Row 1 -->
<tr class="border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0089</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Acero Continental S.A.</span>
<span class="text-[10px] text-stone-500">RIF: J-29384812-0</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-lime-100 text-lime-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-lime-600 rounded-full mr-1.5"></span>
                                        Recibido
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Carlos R. Mendoza</td>
<td class="px-6 py-4 text-right font-mono font-bold">$12,450.00</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
<!-- Row 2 -->
<tr class="border-b border-surface-container bg-surface-container-low hover:bg-surface-container transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0092</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Logística Global C.A.</span>
<span class="text-[10px] text-stone-500">RIF: J-30491823-1</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-amber-600 rounded-full mr-1.5"></span>
                                        Pendiente
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Elena Vasquez</td>
<td class="px-6 py-4 text-right font-mono font-bold">$4,820.50</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
<!-- Row 3 -->
<tr class="border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0075</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Lubricantes del Sur</span>
<span class="text-[10px] text-stone-500">RIF: J-10293485-3</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-rose-600 rounded-full mr-1.5"></span>
                                        Cancelado
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Carlos R. Mendoza</td>
<td class="px-6 py-4 text-right font-mono font-bold">$1,200.00</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
<!-- Row 4 -->
<tr class="border-b border-surface-container bg-surface-container-low hover:bg-surface-container transition-colors group">
<td class="px-6 py-4 font-bold text-stone-900">ORD-2024-0064</td>
<td class="px-6 py-4">
<div class="flex flex-col">
<span class="font-medium text-stone-800">Maquinarias Industriales</span>
<span class="text-[10px] text-stone-500">RIF: J-00123498-5</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-1 bg-lime-100 text-lime-800 text-[10px] font-bold uppercase tracking-tighter rounded">
<span class="w-1.5 h-1.5 bg-lime-600 rounded-full mr-1.5"></span>
                                        Recibido
                                    </span>
</td>
<td class="px-6 py-4 text-stone-600">Admin_Global</td>
<td class="px-6 py-4 text-right font-mono font-bold">$45,000.00</td>
<td class="px-6 py-4 text-center">
<button class="bg-stone-100 text-stone-900 text-[10px] font-bold uppercase tracking-tighter px-3 py-1.5 hover:bg-stone-900 hover:text-lime-400 transition-all">
                                        Ver Detalles
                                    </button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination / Footer Table -->
<div class="px-6 py-4 bg-surface-container-high flex justify-between items-center">
<span class="text-[10px] font-bold uppercase tracking-widest text-stone-500">Mostrando 4 de 156 órdenes</span>
<div class="flex gap-2">
<button class="w-8 h-8 flex items-center justify-center bg-stone-900 text-white hover:bg-lime-400 hover:text-stone-900 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center bg-lime-400 text-stone-900 font-bold text-xs">1</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-stone-600 hover:bg-stone-200 text-xs">2</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-highest text-stone-600 hover:bg-stone-200 text-xs">3</button>
<button class="w-8 h-8 flex items-center justify-center bg-stone-900 text-white hover:bg-lime-400 hover:text-stone-900 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Quick Insights Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-stone-900 p-6 rounded-lg border-l-4 border-lime-400">
<h3 class="text-[10px] uppercase tracking-[0.2em] text-stone-500 font-bold mb-4">Total Mensual</h3>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-black text-white font-headline">$142.8k</span>
<span class="text-lime-400 text-[10px] font-bold">+12% vs mes ant.</span>
</div>
</div>
<div class="bg-surface-container p-6 rounded-lg">
<h3 class="text-[10px] uppercase tracking-[0.2em] text-on-surface-variant font-bold mb-4">Órdenes Pendientes</h3>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-black text-on-surface font-headline">24</span>
<span class="text-amber-600 text-[10px] font-bold">Requieren atención</span>
</div>
</div>
<div class="bg-surface-container p-6 rounded-lg">
<h3 class="text-[10px] uppercase tracking-[0.2em] text-on-surface-variant font-bold mb-4">Eficiencia Proveedor</h3>
<div class="flex items-baseline gap-2">
<span class="text-3xl font-black text-on-surface font-headline">94.2%</span>
<span class="text-stone-500 text-[10px] font-bold">Tiempo entrega prom.</span>
</div>
</div>
</div>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/historial-compras.js"></script>
@endpush
