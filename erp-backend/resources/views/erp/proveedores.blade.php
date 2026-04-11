@extends('layouts.erp')

@section('title', 'proveedores | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/proveedores.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="flex-1 md:ml-64 relative flex flex-col min-h-screen">
<!-- TopNavBar (Authority Source: JSON) -->
<header class="bg-stone-950/80 backdrop-blur-xl docked full-width top-0 z-50 flex justify-between items-center w-full px-6 py-4">
<div class="flex items-center gap-8">
<div class="text-2xl font-bold tracking-tighter text-lime-400 font-headline uppercase">METALLIC_CORE_ERP</div>
<nav class="hidden lg:flex items-center gap-6">
<a class="text-stone-400 hover:text-lime-200 transition-colors font-space-grotesk uppercase tracking-tighter" href="#">Dashboard</a>
<a class="text-stone-400 hover:text-lime-200 transition-colors font-space-grotesk uppercase tracking-tighter" href="#">Inventario</a>
<a class="text-stone-400 hover:text-lime-200 transition-colors font-space-grotesk uppercase tracking-tighter" href="#">Reportes</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="hidden sm:flex items-center bg-stone-900 px-3 py-1.5 rounded-sm border border-stone-800">
<span class="material-symbols-outlined text-stone-500 text-sm mr-2">search</span>
<input class="bg-transparent border-none text-xs text-stone-300 focus:ring-0 w-48 font-headline" placeholder="BUSCAR PROVEEDOR..." type="text"/>
</div>
<button class="bg-primary text-on-primary px-4 py-1.5 font-headline uppercase text-xs font-bold tracking-widest hover:scale-105 active:scale-95 transition-all">
                    Nueva Factura
                </button>
<div class="flex gap-2 text-stone-400">
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400">notifications</span>
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400">settings</span>
</div>
<div class="w-8 h-8 rounded-full bg-stone-800 border border-stone-700 overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Professional portrait of a male industrial manager wearing a crisp white shirt in a modern office setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDslv3OaStfBGecysrl6PetRuZp0Gn2cWYlwGEuCsvS9r4sbPHcuJKEb9IQR3hPVS3ITP0k92PhvvNb8Uwqe52Ylm_EVphH6HqQAyFV4Lb_Kb01y-ArxKUuY5ncqehm84OZv9fwfaddFWQQT8q6TvljUZlq_qegXXX8doen2qHxtuyaQQxUU5LpJZ0pCyagFHM7r8GZUbNvRhWpJjkgg9RKA-Z4rEC12aA_ErqgJFSvpmGvok0LBykfmbPYhYpI8vEmwWx4c1d4xwQ"/>
</div>
</div>
</header>
<!-- Content Shell -->
<div class="p-8 mt-4">
<!-- Hero / Header Section -->
<section class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="text-5xl font-black uppercase tracking-tighter text-on-surface leading-none mb-2">Proveedores</h1>
<p class="text-secondary font-medium tracking-tight">Gestión centralizada de activos industriales y cadena de suministro.</p>
</div>
<div class="flex gap-4">
<button class="bg-surface-container-high px-6 py-3 font-headline uppercase text-sm font-bold tracking-widest flex items-center gap-2 group transition-all">
<span class="material-symbols-outlined text-primary group-hover:rotate-180 transition-transform">refresh</span>
                        Sincronizar
                    </button>
<button class="bg-primary text-on-primary px-8 py-3 font-headline uppercase text-sm font-bold tracking-widest shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all">
                        Registrar Proveedor
                    </button>
</div>
</section>
<!-- Bento Grid Stats & Action -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
<!-- Main Form Card (Asymmetric Layout) -->
<div class="md:col-span-3 bg-surface-container-lowest p-8 rounded-md relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 -mr-16 -mt-16 rounded-full blur-3xl"></div>
<h2 class="text-xl font-bold uppercase tracking-tight mb-8 flex items-center gap-2">
<span class="w-8 h-1 bg-primary"></span>
                        Editor de Proveedor
                    </h2>
<form class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
<div class="space-y-4">
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1">RIF / Identificación Fiscal</label>
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary p-3 font-mono text-sm" placeholder="J-12345678-9" type="text"/>
</div>
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1">Razón Social</label>
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary p-3 font-headline text-sm font-medium" placeholder="INDUSTRIAS METALÚRGICAS FORGE C.A." type="text"/>
</div>
<div class="flex items-center gap-4 py-2">
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</div>
<span class="text-xs font-bold uppercase tracking-widest">Agente de Retención</span>
</div>
</div>
<div class="space-y-4">
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1">Dirección Fiscal</label>
<textarea class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary p-3 text-sm" placeholder="Zona Industrial II, Av. Principal, Galpón 45..." rows="2"></textarea>
</div>
<div class="grid grid-cols-2 gap-4">
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1">Teléfono</label>
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary p-3 text-sm" placeholder="+58 251 000 0000" type="tel"/>
</div>
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1">Email</label>
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary p-3 text-sm" placeholder="contacto@forge.com" type="email"/>
</div>
</div>
</div>
<div class="md:col-span-2 pt-4 flex justify-end">
<button class="text-secondary font-headline uppercase text-xs font-bold tracking-widest px-6 py-2 hover:text-on-surface transition-colors" type="button">Cancelar</button>
<button class="bg-stone-900 text-lime-400 px-10 py-3 font-headline uppercase text-xs font-bold tracking-widest hover:bg-stone-950 transition-all" type="submit">Guardar Cambios</button>
</div>
</form>
</div>
<!-- Quick Stats / Status -->
<div class="flex flex-col gap-6">
<div class="bg-surface-container-highest p-6 rounded-md flex-1 flex flex-col justify-between border-l-4 border-primary">
<span class="text-[10px] font-bold uppercase tracking-widest text-secondary">Saldo Total Por Pagar</span>
<div>
<div class="text-3xl font-black font-headline tracking-tighter">$142.502,40</div>
<div class="text-[10px] text-primary font-bold uppercase mt-1">▲ 12.4% este mes</div>
</div>
</div>
<div class="bg-stone-950 p-6 rounded-md flex-1 flex flex-col justify-between text-white">
<span class="text-[10px] font-bold uppercase tracking-widest text-stone-500">Proveedores Activos</span>
<div>
<div class="text-5xl font-black font-headline tracking-tighter text-lime-400">84</div>
<div class="text-[10px] text-stone-500 font-bold uppercase mt-1">4 pendientes por revisión</div>
</div>
</div>
</div>
</div>
<!-- Main Data Table -->
<section class="bg-surface-container-low rounded-md overflow-hidden">
<div class="p-6 flex items-center justify-between">
<h3 class="font-headline font-bold uppercase tracking-widest text-sm">Listado de Maestros</h3>
<div class="flex gap-2">
<button class="p-2 hover:bg-surface-container transition-colors"><span class="material-symbols-outlined text-stone-500">filter_list</span></button>
<button class="p-2 hover:bg-surface-container transition-colors"><span class="material-symbols-outlined text-stone-500">download</span></button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container text-[10px] font-bold uppercase tracking-widest text-secondary">
<th class="px-6 py-4">Razón Social / RIF</th>
<th class="px-6 py-4">Contacto</th>
<th class="px-6 py-4">Estado Retención</th>
<th class="px-6 py-4">Última Compra</th>
<th class="px-6 py-4 text-right">Saldo Pendiente</th>
<th class="px-6 py-4"></th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-highest transition-colors group">
<td class="px-6 py-5">
<div class="font-headline font-bold text-on-surface group-hover:text-primary transition-colors">ACEROS DE VENEZUELA S.A.</div>
<div class="text-[10px] font-mono text-secondary">J-30594832-1</div>
</td>
<td class="px-6 py-5">
<div class="text-xs">compras@acerosv.com</div>
<div class="text-[10px] text-secondary">+58 212 993 4001</div>
</td>
<td class="px-6 py-5">
<span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-tighter">Agente Especial</span>
</td>
<td class="px-6 py-5">
<div class="text-xs font-medium uppercase tracking-tighter">14 OCT 2023</div>
<div class="text-[10px] text-secondary">FACT #A-4055</div>
</td>
<td class="px-6 py-5 text-right font-mono text-sm font-bold">
                                    $42,900.00
                                </td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-400 hover:text-on-surface">more_vert</button>
</td>
</tr>
<tr class="bg-surface-container-lowest hover:bg-surface-container-highest transition-colors group">
<td class="px-6 py-5">
<div class="font-headline font-bold text-on-surface group-hover:text-primary transition-colors">QUÍMICOS INDUSTRIALES MARACAIBO</div>
<div class="text-[10px] font-mono text-secondary">J-40112345-0</div>
</td>
<td class="px-6 py-5">
<div class="text-xs">logistica@qimca.com.ve</div>
<div class="text-[10px] text-secondary">+58 261 740 1200</div>
</td>
<td class="px-6 py-5">
<span class="bg-surface-container-highest text-secondary text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-tighter">Ordinario</span>
</td>
<td class="px-6 py-5">
<div class="text-xs font-medium uppercase tracking-tighter">02 NOV 2023</div>
<div class="text-[10px] text-secondary">FACT #B-1120</div>
</td>
<td class="px-6 py-5 text-right font-mono text-sm font-bold">
                                    $12,450.50
                                </td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-400 hover:text-on-surface">more_vert</button>
</td>
</tr>
<tr class="hover:bg-surface-container-highest transition-colors group">
<td class="px-6 py-5">
<div class="font-headline font-bold text-on-surface group-hover:text-primary transition-colors">REPUESTOS PESADOS BOLÍVAR</div>
<div class="text-[10px] font-mono text-secondary">J-00192837-4</div>
</td>
<td class="px-6 py-5">
<div class="text-xs">ventas@rpesados.com</div>
<div class="text-[10px] text-secondary">+58 286 923 0044</div>
</td>
<td class="px-6 py-5">
<span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-tighter">Agente Especial</span>
</td>
<td class="px-6 py-5">
<div class="text-xs font-medium uppercase tracking-tighter">28 OCT 2023</div>
<div class="text-[10px] text-secondary">FACT #Z-9901</div>
</td>
<td class="px-6 py-5 text-right font-mono text-sm font-bold text-error">
                                    $87,151.90
                                </td>
<td class="px-6 py-5 text-right">
<button class="material-symbols-outlined text-stone-400 hover:text-on-surface">more_vert</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-6 bg-surface-container border-t border-surface-container-highest flex items-center justify-between">
<div class="text-[10px] font-bold uppercase tracking-widest text-secondary">Mostrando 1 a 10 de 84 proveedores</div>
<div class="flex gap-2">
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-outline-variant text-stone-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
<button class="w-8 h-8 flex items-center justify-center bg-primary text-on-primary font-headline text-xs font-bold">1</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-outline-variant text-secondary font-headline text-xs hover:bg-surface-container-highest">2</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-outline-variant text-secondary font-headline text-xs hover:bg-surface-container-highest">3</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-outline-variant text-stone-400 hover:text-primary transition-colors"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
</div>
</div>
</section>
</div>
<!-- Footer / Technical Specs Info -->
<footer class="mt-auto p-8 border-t border-surface-container-highest bg-surface-container-low grid grid-cols-1 md:grid-cols-3 gap-8">
<div>
<h4 class="text-[10px] font-bold uppercase tracking-[0.2em] text-secondary mb-4">Módulo de Compras</h4>
<p class="text-xs text-secondary leading-relaxed max-w-xs">Integridad referencial y cumplimiento de normativas fiscales vigentes. Registro de auditoría activo para cada transacción de proveedor.</p>
</div>
<div class="flex flex-col gap-2">
<h4 class="text-[10px] font-bold uppercase tracking-[0.2em] text-secondary mb-2">Conexión de Sistema</h4>
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="text-[10px] font-mono uppercase text-on-surface">Base de Datos Central: ESTABLE</span>
</div>
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span class="text-[10px] font-mono uppercase text-on-surface">Validación RIF SENIAT: ACTIVA</span>
</div>
</div>
<div class="text-right flex flex-col justify-end">
<div class="text-stone-300 font-black text-4xl leading-none font-headline tracking-tighter opacity-10">FORGE_INDUSTRIAL</div>
<div class="text-[10px] text-stone-400 font-mono mt-1">© 2024 METALLIC_CORE SOLUTIONS. ALL RIGHTS RESERVED.</div>
</div>
</footer>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/proveedores.js"></script>
@endpush
