@extends('layouts.erp')

@section('title', 'Ventas: Anulaciones y Notas de Crédito - TITAN INDUSTRIAL ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/notas-credito.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

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
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/notas-credito.js"></script>
@endpush
