@extends('layouts.erp')

@section('title', 'factura-fiscal | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/factura-fiscal.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="max-w-6xl mx-auto py-12 px-6">
<!-- Invoice Header Area -->
<div class="flex flex-col md:flex-row justify-between items-start gap-8 mb-12">
<div class="space-y-4">
<div class="bg-primary-container inline-block px-4 py-2">
<h1 class="text-2xl font-black text-on-primary-container tracking-tighter uppercase font-headline">MAYOR DE REPUESTO LA CIMA, C.A.</h1>
</div>
<div class="text-secondary font-label space-y-1">
<p class="font-bold text-on-surface">RIF: J-40308741-5</p>
<p>Av. Principal Industrial Norte, Galpón 42</p>
<p>Valencia, Edo. Carabobo - Venezuela</p>
<p class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">phone</span> +58 241 555 0199</p>
</div>
</div>
<div class="w-full md:w-80 bg-surface-container-low p-6 rounded-lg relative overflow-hidden">
<div class="absolute top-0 right-0 w-24 h-24 bg-primary-fixed/20 -rotate-12 translate-x-8 -translate-y-8"></div>
<div class="relative z-10 space-y-4">
<div class="flex justify-between items-center">
<span class="text-xs font-bold uppercase tracking-widest text-secondary">Control Fiscal</span>
<span class="text-primary font-bold">#00-847291</span>
</div>
<div class="border-t border-outline-variant/30 pt-4">
<h2 class="text-3xl font-black tracking-tighter font-headline">FACTURA</h2>
<p class="text-sm text-secondary font-medium">Digital Industrial V-2</p>
</div>
<div class="flex justify-between items-end pt-2">
<div>
<p class="text-[10px] uppercase font-bold text-secondary">Fecha Emisión</p>
<p class="font-bold text-on-surface">24 OCT 2023</p>
</div>
<div class="text-right">
<p class="text-[10px] uppercase font-bold text-secondary">Vence</p>
<p class="font-bold text-on-surface">07 NOV 2023</p>
</div>
</div>
</div>
</div>
</div>
<!-- Client & Project Details Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
<div class="md:col-span-2 bg-surface-container-lowest p-8 rounded-xl shadow-sm">
<div class="flex items-center gap-2 mb-6">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">account_circle</span>
<h3 class="font-headline font-bold uppercase tracking-tight">Datos del Cliente</h3>
</div>
<div class="grid grid-cols-2 gap-y-4">
<div>
<p class="text-[10px] uppercase font-bold text-secondary">Razón Social</p>
<p class="font-medium text-on-surface">CONSTRUCTORA DELTA HIERRO S.A.</p>
</div>
<div>
<p class="text-[10px] uppercase font-bold text-secondary">RIF / Identificación</p>
<p class="font-medium text-on-surface">J-31298455-0</p>
</div>
<div class="col-span-2">
<p class="text-[10px] uppercase font-bold text-secondary">Dirección Fiscal</p>
<p class="font-medium text-on-surface">Zona Industrial Municipal II, Av. Este-Oeste, Parroquia Rafael Urdaneta.</p>
</div>
</div>
</div>
<div class="bg-surface-container-highest p-8 rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-secondary">local_shipping</span>
<h3 class="font-headline font-bold uppercase tracking-tight">Logística</h3>
</div>
<p class="text-[10px] uppercase font-bold text-secondary">Método de Envío</p>
<p class="font-medium text-on-surface">Transporte Propio - Ruta Norte</p>
</div>
<div class="pt-4 border-t border-outline-variant/30">
<p class="text-[10px] uppercase font-bold text-secondary">Orden de Compra</p>
<p class="font-headline font-bold text-primary">OC-2023-4492</p>
</div>
</div>
</div>
<!-- Technical Product Table -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden mb-12">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-high">
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline">SKU/ID</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline">Descripción Técnica del Producto</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline text-center">Cant.</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline text-right">Precio Unit.</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline text-right">Imponible</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-5 font-mono text-sm text-secondary">EP-992-TX</td>
<td class="px-6 py-5">
<p class="font-bold text-on-surface">Pistón Forjado Serie Titan 4500</p>
<p class="text-xs text-secondary italic">Aleación de aluminio reforzado, tratamiento térmico T6</p>
</td>
<td class="px-6 py-5 text-center font-bold">12</td>
<td class="px-6 py-5 text-right font-medium">$ 145.00</td>
<td class="px-6 py-5 text-right font-bold text-on-surface">$ 1,740.00</td>
</tr>
<tr class="bg-surface-container-low/30 hover:bg-surface-container-low transition-colors">
<td class="px-6 py-5 font-mono text-sm text-secondary">GK-441-RG</td>
<td class="px-6 py-5">
<p class="font-bold text-on-surface">Kit de Empacaduras Industriales (Gasket)</p>
<p class="text-xs text-secondary italic">Alta presión, temperatura hasta 400°C, sellado hermético</p>
</td>
<td class="px-6 py-5 text-center font-bold">04</td>
<td class="px-6 py-5 text-right font-medium">$ 82.50</td>
<td class="px-6 py-5 text-right font-bold text-on-surface">$ 330.00</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-5 font-mono text-sm text-secondary">BR-102-HD</td>
<td class="px-6 py-5">
<p class="font-bold text-on-surface">Rodamientos de Carga Pesada (Heavy Duty)</p>
<p class="text-xs text-secondary italic">Acero al cromo, doble hilera de esferas, sellado NBR</p>
</td>
<td class="px-6 py-5 text-center font-bold">08</td>
<td class="px-6 py-5 text-right font-medium">$ 210.00</td>
<td class="px-6 py-5 text-right font-bold text-on-surface">$ 1,680.00</td>
</tr>
</tbody>
</table>
</div>
<!-- Totals & Legal Area -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
<div class="md:col-span-7 space-y-6">
<!-- QR and Validation -->
<div class="flex items-center gap-6 p-6 bg-white border border-outline-variant/20 rounded-xl">
<div class="w-32 h-32 bg-on-surface p-2 flex items-center justify-center">
<img alt="Código QR Fiscal" data-alt="precise geometric black and white QR code used for industrial tax verification and tracking" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDW1nVa49xsB5AocZ0xt6D09eZLP7_vNO2Wp4TyHZLzxoeuGkYpnqtpJHeicaUabppLC6T5duUZiiM6T58PcQr8ZYZOk3edIdHr990H33-ELJNK_a5esxKEHockBv6IbSaScj7sla_hff3Cj_j5mWmfqUMNa1VDEg9AGItriln0CLvU_vZq4njOnSi45qoiEpuLe53dpv6q2n36-rkUewBlNCos7i8Ye6V8e6NGWuqCHe8V5M0HKSlGnHlxenroI57pGMkV44P2Cg0"/>
</div>
<div class="space-y-2">
<h4 class="text-sm font-bold uppercase tracking-tight font-headline">Certificación Fiscal Digital</h4>
<p class="text-xs text-secondary leading-relaxed">Este documento constituye una representación gráfica de una factura digital emitida bajo la normativa vigente de providencias administrativas del SENIAT.</p>
<div class="flex gap-2 pt-2">
<div class="px-2 py-1 bg-surface-container text-[10px] font-bold rounded">HASH: 9928-XA2-LL01</div>
<div class="px-2 py-1 bg-surface-container text-[10px] font-bold rounded">SERVER: TR-NODE-04</div>
</div>
</div>
</div>
<!-- Digital Signature -->
<div class="p-6 border-l-4 border-primary-container bg-surface-container-low rounded-r-xl">
<p class="text-[10px] uppercase font-black text-secondary mb-4 tracking-widest">Firma Digital Autorizada</p>
<div class="h-16 flex items-end">
<span class="font-['Dancing_Script'] text-2xl text-on-surface italic opacity-80 border-b border-on-surface/20 pb-2 px-4">Ing. Marcos Rodriguez - Operaciones</span>
</div>
</div>
</div>
<!-- Financial Calculations -->
<div class="md:col-span-5 bg-on-surface text-surface rounded-xl p-8 space-y-6 relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 rounded-full -translate-y-16 translate-x-16 blur-3xl"></div>
<div class="space-y-4 relative z-10">
<div class="flex justify-between items-center text-sm">
<span class="text-stone-400 font-medium">Subtotal Base Imponible</span>
<span class="font-bold">$ 3,750.00</span>
</div>
<div class="flex justify-between items-center text-sm">
<span class="text-stone-400 font-medium">IVA (16%)</span>
<span class="font-bold">$ 600.00</span>
</div>
<div class="flex justify-between items-center text-sm border-b border-stone-700 pb-4">
<span class="text-lime-400 font-bold">Retención IVA (75%)</span>
<span class="text-lime-400 font-bold">- $ 450.00</span>
</div>
<div class="pt-4 flex flex-col gap-1">
<div class="flex justify-between items-end">
<span class="text-xs uppercase font-black tracking-widest text-stone-500">Total a Pagar</span>
<span class="text-4xl font-black font-headline tracking-tighter text-primary-fixed">$ 3,900.00</span>
</div>
<p class="text-[10px] text-stone-400 text-right mt-2 uppercase font-medium">Sujeto a tasa oficial BCV del día</p>
</div>
</div>
<button class="w-full bg-primary-container hover:bg-primary-fixed-dim text-on-primary-container font-black py-4 uppercase tracking-widest text-sm transition-all active:scale-[0.98] flex items-center justify-center gap-2">
<span class="material-symbols-outlined">download</span>
                    Descargar PDF Certificado
                </button>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/factura-fiscal.js"></script>
@endpush
