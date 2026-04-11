@extends('layouts.erp')

@section('title', 'ajustes-inventario | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/ajustes-inventario.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

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
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/ajustes-inventario.js"></script>
@endpush
