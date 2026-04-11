@extends('layouts.erp')

@section('title', 'Vista Previa de Impresión - TITAN INDUSTRIAL | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/imprimir-factura.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="flex min-h-screen">
<!-- Side Navigation (Suppressed for focused task but included as structural anchor) -->
<aside class="no-print h-screen w-64 fixed left-0 top-0 bg-stone-100 dark:bg-stone-950 flex flex-col h-full py-6 px-4 z-30">
<div class="mb-8">
<div class="text-lime-700 dark:text-lime-500 font-['Space_Grotesk'] font-black text-lg">OPERACIONES</div>
<div class="text-xs text-stone-500 uppercase tracking-widest font-medium">Planta Norte</div>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-3 py-2 text-stone-600 hover:bg-stone-200/50 transition-all rounded" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-medium text-sm">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-stone-900 bg-stone-200 font-bold border-r-4 border-lime-500 transition-all" href="#">
<span class="material-symbols-outlined">payments</span>
<span class="font-medium text-sm">Ventas</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-stone-600 hover:bg-stone-200/50 transition-all rounded" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span class="font-medium text-sm">Facturación</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-stone-600 hover:bg-stone-200/50 transition-all rounded" href="#">
<span class="material-symbols-outlined">inventory_2</span>
<span class="font-medium text-sm">Inventario</span>
</a>
</nav>
<div class="mt-auto pt-6 border-t border-stone-200">
<a class="flex items-center gap-3 px-3 py-2 text-stone-600 hover:bg-stone-200/50 transition-all rounded" href="#">
<span class="material-symbols-outlined">contact_support</span>
<span class="font-medium text-sm">Soporte</span>
</a>
</div>
</aside>
<!-- Content Area -->
<section class="flex-1 ml-0 md:ml-64 p-4 md:p-8 flex flex-col items-center">
<!-- Invoice Wrapper (Original) -->
<div class="print-area bg-white text-on-surface w-full max-w-[210mm] min-h-[297mm] p-8 technical-border shadow-sm mb-12 page-break relative overflow-hidden">
<!-- Watermark for Original -->
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rotate-45 pointer-events-none opacity-[0.03]">
<span class="text-[12rem] font-headline font-black uppercase">ORIGINAL</span>
</div>
<!-- Header Section -->
<div class="flex justify-between items-start mb-8">
<div class="w-1/2">
<h1 class="font-headline font-black text-2xl tracking-tighter mb-1">TITAN INDUSTRIAL C.A.</h1>
<p class="text-[10px] leading-tight font-mono uppercase">
                            RIF: J-12345678-9<br/>
                            AV. INTERCOMUNAL SECTOR LOS PINOS, GALPON 14-B.<br/>
                            VALENCIA, EDO. CARABOBO - VENEZUELA.<br/>
                            TELÉFONOS: (0241) 555-0199 / 555-0200<br/>
                            EMAIL: VENTAS@TITAN-INDUSTRIAL.COM
                        </p>
</div>
<div class="w-1/3 text-right">
<div class="technical-border p-2 mb-2">
<h2 class="font-headline font-bold text-lg uppercase leading-none">FACTURA</h2>
</div>
<div class="space-y-1 text-[11px] font-mono">
<p>FECHA EMISIÓN: <span class="font-bold">24/05/2024</span></p>
<p>Nro. FACTURA: <span class="font-bold">00004582</span></p>
<p class="text-error font-bold">Nro. CONTROL: 00-019284</p>
</div>
</div>
</div>
<!-- Client Info -->
<div class="technical-border p-4 mb-6">
<div class="grid grid-cols-2 gap-4 text-[11px] font-mono uppercase">
<div>
<p class="text-[9px] text-secondary mb-1">RAZÓN SOCIAL / NOMBRE:</p>
<p class="font-bold border-b border-on-surface/20 pb-1">CONSTRUCTORA DEL CENTRO, S.A.</p>
</div>
<div>
<p class="text-[9px] text-secondary mb-1">RIF / C.I.:</p>
<p class="font-bold border-b border-on-surface/20 pb-1">J-98765432-1</p>
</div>
<div class="col-span-2">
<p class="text-[9px] text-secondary mb-1">DIRECCIÓN FISCAL:</p>
<p class="font-bold border-b border-on-surface/20 pb-1">CALLE 12, EDIFICIO INDUSTRIAL BETA, PISO 2, CARACAS.</p>
</div>
<div>
<p class="text-[9px] text-secondary mb-1">TELÉFONO:</p>
<p class="font-bold border-b border-on-surface/20 pb-1">0212-999-0000</p>
</div>
<div>
<p class="text-[9px] text-secondary mb-1">CONDICIÓN DE PAGO:</p>
<p class="font-bold border-b border-on-surface/20 pb-1">CRÉDITO 15 DÍAS</p>
</div>
</div>
</div>
<!-- Items Table -->
<div class="technical-border mb-6 min-h-[400px]">
<table class="w-full text-left text-[11px] font-mono border-collapse">
<thead class="bg-surface-container-low border-b border-on-surface">
<tr>
<th class="p-2 border-r border-on-surface w-16">CÓDIGO</th>
<th class="p-2 border-r border-on-surface">DESCRIPCIÓN</th>
<th class="p-2 border-r border-on-surface text-center w-12">CANT.</th>
<th class="p-2 border-r border-on-surface text-right w-24">P. UNITARIO</th>
<th class="p-2 text-right w-24">TOTAL</th>
</tr>
</thead>
<tbody>
<tr class="border-b border-on-surface/10">
<td class="p-2 border-r border-on-surface/10">ENG-902</td>
<td class="p-2 border-r border-on-surface/10">PISTÓN DE ALTA PRESIÓN - SERIE INDUSTRIAL TITAN</td>
<td class="p-2 border-r border-on-surface/10 text-center">4</td>
<td class="p-2 border-r border-on-surface/10 text-right">450,00</td>
<td class="p-2 text-right">1.800,00</td>
</tr>
<tr class="border-b border-on-surface/10">
<td class="p-2 border-r border-on-surface/10">SL-044</td>
<td class="p-2 border-r border-on-surface/10">EMPACADURA TÉRMICA DE NEOPRENO REFORZADO</td>
<td class="p-2 border-r border-on-surface/10 text-center">2</td>
<td class="p-2 border-r border-on-surface/10 text-right">125,50</td>
<td class="p-2 text-right">251,00</td>
</tr>
<tr class="border-b border-on-surface/10">
<td class="p-2 border-r border-on-surface/10">OIL-MAX</td>
<td class="p-2 border-r border-on-surface/10">LUBRICANTE SINTÉTICO GRADO PESADO (TAMBOR 20L)</td>
<td class="p-2 border-r border-on-surface/10 text-center">1</td>
<td class="p-2 border-r border-on-surface/10 text-right">890,00</td>
<td class="p-2 text-right">890,00</td>
</tr>
<!-- Spacing for aesthetic density -->
<tr>
<td class="p-2 border-r border-on-surface/10 h-64"></td>
<td class="p-2 border-r border-on-surface/10"></td>
<td class="p-2 border-r border-on-surface/10"></td>
<td class="p-2 border-r border-on-surface/10"></td>
<td class="p-2"></td>
</tr>
</tbody>
</table>
</div>
<!-- Totals Section -->
<div class="flex justify-end mb-8">
<div class="w-1/2 space-y-1">
<div class="flex justify-between text-[11px] font-mono">
<span>SUB-TOTAL:</span>
<span class="font-bold">2.941,00</span>
</div>
<div class="flex justify-between text-[11px] font-mono">
<span>BASE IMPONIBLE (G) 16%:</span>
<span class="font-bold">2.941,00</span>
</div>
<div class="flex justify-between text-[11px] font-mono">
<span>I.V.A. (16%):</span>
<span class="font-bold">470,56</span>
</div>
<div class="flex justify-between text-[13px] font-mono border-t border-on-surface pt-1 mt-1">
<span class="font-bold uppercase">TOTAL FACTURA:</span>
<span class="font-bold">3.411,56</span>
</div>
<div class="text-[9px] font-mono text-right text-secondary mt-2">
                            PRECIOS EXPRESADOS EN MONEDA DE CURSO LEGAL (Bs.)
                        </div>
</div>
</div>
<!-- Signatures & Notes -->
<div class="grid grid-cols-2 gap-8 mb-8 mt-12">
<div class="text-center">
<div class="border-t border-on-surface mt-8 mx-auto w-48"></div>
<p class="text-[9px] font-mono uppercase mt-1">RECEPTOR (FIRMA Y SELLO)</p>
</div>
<div class="text-center">
<div class="border-t border-on-surface mt-8 mx-auto w-48"></div>
<p class="text-[9px] font-mono uppercase mt-1">EMISOR (FIRMA Y SELLO)</p>
</div>
</div>
<!-- Footer - Printer Data -->
<footer class="absolute bottom-6 left-8 right-8">
<div class="dashed-divider mb-2"></div>
<div class="flex justify-between items-end text-[8px] font-mono uppercase opacity-70">
<div class="max-w-[70%]">
                            IMPRENTA EL TREBOL AZUL, C.A. RIF: J-000111222-0. PROVIDENCIA ADMINISTRATIVA No. SENIAT/INTI/2023/0014.
                            FECHA DE EMISIÓN: 10/01/2024. DESDE 00004001 HASTA 00005000.
                        </div>
<div class="text-right">
                            ORIGINAL
                        </div>
</div>
</footer>
</div>
<!-- Invoice Wrapper (Copy - Contabilidad) -->
<div class="print-area bg-white text-on-surface w-full max-w-[210mm] min-h-[297mm] p-8 technical-border shadow-sm mb-12 page-break relative overflow-hidden">
<!-- Watermark for Copy -->
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rotate-45 pointer-events-none opacity-[0.03]">
<span class="text-[10rem] font-headline font-black uppercase text-secondary">COPIA</span>
</div>
<!-- Header Repeat -->
<div class="flex justify-between items-start mb-8">
<div class="w-1/2">
<h1 class="font-headline font-black text-2xl tracking-tighter mb-1">TITAN INDUSTRIAL C.A.</h1>
<p class="text-[10px] leading-tight font-mono uppercase">RIF: J-12345678-9</p>
</div>
<div class="w-1/3 text-right">
<h2 class="font-headline font-bold text-lg uppercase leading-none mb-2">FACTURA (COPIA)</h2>
<div class="text-[11px] font-mono">
<p>Nro. FACTURA: <span class="font-bold">00004582</span></p>
</div>
</div>
</div>
<!-- Compressed Body for the Copy -->
<div class="technical-border p-4 mb-4">
<p class="text-[11px] font-mono"><span class="font-bold">CLIENTE:</span> CONSTRUCTORA DEL CENTRO, S.A.</p>
<p class="text-[11px] font-mono"><span class="font-bold">RIF:</span> J-98765432-1</p>
</div>
<div class="technical-border mb-4 min-h-[600px]">
<table class="w-full text-left text-[11px] font-mono border-collapse">
<thead class="bg-surface-container-low border-b border-on-surface">
<tr>
<th class="p-2 border-r border-on-surface">CÓDIGO</th>
<th class="p-2 border-r border-on-surface">DESCRIPCIÓN</th>
<th class="p-2 border-r border-on-surface text-center">CANT.</th>
<th class="p-2 text-right">TOTAL</th>
</tr>
</thead>
<tbody>
<tr class="border-b border-on-surface/10">
<td class="p-2 border-r border-on-surface/10">ENG-902</td>
<td class="p-2 border-r border-on-surface/10">PISTÓN DE ALTA PRESIÓN - SERIE INDUSTRIAL TITAN</td>
<td class="p-2 border-r border-on-surface/10 text-center">4</td>
<td class="p-2 text-right">1.800,00</td>
</tr>
<tr class="border-b border-on-surface/10">
<td class="p-2 border-r border-on-surface/10">SL-044</td>
<td class="p-2 border-r border-on-surface/10">EMPACADURA TÉRMICA DE NEOPRENO REFORZADO</td>
<td class="p-2 border-r border-on-surface/10 text-center">2</td>
<td class="p-2 text-right">251,00</td>
</tr>
<tr class="border-b border-on-surface/10">
<td class="p-2 border-r border-on-surface/10">OIL-MAX</td>
<td class="p-2 border-r border-on-surface/10">LUBRICANTE SINTÉTICO GRADO PESADO (TAMBOR 20L)</td>
<td class="p-2 border-r border-on-surface/10 text-center">1</td>
<td class="p-2 text-right">890,00</td>
</tr>
</tbody>
</table>
</div>
<!-- Footer - Printer Data Repeat -->
<footer class="absolute bottom-6 left-8 right-8">
<div class="dashed-divider mb-2"></div>
<div class="flex justify-between items-end text-[8px] font-mono uppercase opacity-70">
<div>COPIA CONTABILIDAD - SIN VALOR FISCAL PARA EL RECEPTOR</div>
<div class="text-right">COPIA 1</div>
</div>
</footer>
</div>
<!-- Action Floating FAB (Visible only on UI) -->
<button class="no-print fixed bottom-10 right-10 bg-primary-container text-on-primary-container h-16 w-16 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50 group">
<span class="material-symbols-outlined text-3xl group-hover:rotate-12 transition-transform">download</span>
</button>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/imprimir-factura.js"></script>
@endpush
