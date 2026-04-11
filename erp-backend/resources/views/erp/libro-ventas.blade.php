@extends('layouts.erp')

@section('title', 'libro-ventas | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/libro-ventas.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="md:ml-64 pt-24 px-6 pb-12">
<!-- Header Section: Editorial Authority -->
<header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div class="max-w-2xl">
<div class="flex items-center gap-2 text-lime-500 mb-2">
<span class="text-xs font-bold uppercase tracking-[0.3em]">Compliance Module</span>
<div class="h-[1px] w-12 bg-lime-500/30"></div>
</div>
<h1 class="text-5xl md:text-6xl font-headline font-bold uppercase tracking-tighter text-on-surface leading-[0.9]">
                    Libro de <span class="text-lime-500">Ventas</span> Fiscal
                </h1>
<p class="mt-4 text-stone-400 font-body text-lg border-l-2 border-stone-800 pl-6">
                    SENIAT Compliance (Art. 58). Chronological record of operations for the fiscal period.
                </p>
</div>
<div class="flex flex-wrap gap-3">
<button class="flex items-center gap-2 bg-stone-900 hover:bg-stone-800 text-stone-200 px-5 py-3 rounded-lg font-['Inter'] text-xs font-bold uppercase tracking-widest transition-all active:scale-95">
<span class="material-symbols-outlined text-sm" data-icon="picture_as_pdf">picture_as_pdf</span>
                    Export PDF
                </button>
<button class="flex items-center gap-2 bg-primary hover:bg-lime-600 text-white px-5 py-3 rounded-lg font-['Inter'] text-xs font-bold uppercase tracking-widest transition-all active:scale-95 shadow-lg shadow-primary/10">
<span class="material-symbols-outlined text-sm" data-icon="table_view">table_view</span>
                    Export Excel
                </button>
</div>
</header>
<!-- Filters & Stats Bento -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<!-- Filter Card -->
<div class="col-span-1 md:col-span-2 bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between">
<div>
<h3 class="font-headline text-xs font-bold uppercase tracking-widest text-stone-500 mb-4">Period Selection</h3>
<div class="flex flex-wrap gap-4">
<div class="flex-1 min-w-[150px]">
<label class="block text-[10px] uppercase font-bold text-stone-500 mb-1">Fiscal Year</label>
<select class="w-full bg-stone-900 border-none rounded-lg text-sm text-white focus:ring-1 focus:ring-lime-500 py-2.5">
<option>2024</option>
<option>2023</option>
</select>
</div>
<div class="flex-1 min-w-[150px]">
<label class="block text-[10px] uppercase font-bold text-stone-500 mb-1">Month</label>
<select class="w-full bg-stone-900 border-none rounded-lg text-sm text-white focus:ring-1 focus:ring-lime-500 py-2.5">
<option>October</option>
<option selected="">November</option>
<option>December</option>
</select>
</div>
</div>
</div>
<div class="mt-6 flex items-center gap-2 text-lime-400 text-xs font-bold">
<span class="material-symbols-outlined text-sm" data-icon="info">info</span>
<span>Currently viewing November 2024 (Art. 58 Validated)</span>
</div>
</div>
<!-- Total Stats -->
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-lime-500">
<h3 class="font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-1">VAT Debit Total</h3>
<p class="text-3xl font-headline font-bold text-white mb-2">Bs. 42.105,50</p>
<div class="text-[10px] text-lime-400 font-bold uppercase flex items-center gap-1">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
                    +12.4% vs prev. month
                </div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-stone-800">
<h3 class="font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-1">Exempt Sales</h3>
<p class="text-3xl font-headline font-bold text-white mb-2">Bs. 8.420,00</p>
<div class="text-[10px] text-stone-500 font-bold uppercase">Representing 16.5% of total</div>
</div>
</section>
<!-- Technical Spec Table: Fiscal Record -->
<section class="bg-surface-container-lowest rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-900/50">
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Invoice No.</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Date</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Customer RIF</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400">Customer Name</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">Exempt</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">Tax Base</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">VAT (16%)</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-400 text-right">Retentions</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-lime-500 text-right">Total</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-900">
<tr class="bg-surface hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-001</td>
<td class="px-6 py-4 text-xs text-stone-400">01/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">J-12345678-9</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Siderúrgica del Turbio S.A.</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">12.500,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">2.000,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">1.500,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">13.000,00</td>
</tr>
<tr class="bg-stone-900/20 hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-002</td>
<td class="px-6 py-4 text-xs text-stone-400">02/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">J-98765432-1</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Corp. Eléctrica Nacional</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">8.420,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">8.420,00</td>
</tr>
<tr class="bg-surface hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-003</td>
<td class="px-6 py-4 text-xs text-stone-400">05/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">G-20001234-5</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Ministerio de Transporte</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">45.200,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">7.232,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">5.424,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">47.008,00</td>
</tr>
<tr class="bg-stone-900/20 hover:bg-stone-900 transition-colors">
<td class="px-6 py-4 font-mono text-xs text-stone-200">INV-2024-004</td>
<td class="px-6 py-4 text-xs text-stone-400">08/11/2024</td>
<td class="px-6 py-4 text-xs text-stone-400">J-55443322-1</td>
<td class="px-6 py-4 text-sm font-semibold text-white">Inversiones Hidráulicas C.A.</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">22.150,00</td>
<td class="px-6 py-4 text-xs text-stone-200 text-right">3.544,00</td>
<td class="px-6 py-4 text-xs text-stone-400 text-right">0,00</td>
<td class="px-6 py-4 text-sm font-bold text-white text-right">25.694,00</td>
</tr>
</tbody>
<tfoot>
<tr class="bg-stone-900/80">
<td class="px-6 py-5 font-headline text-xs font-bold uppercase tracking-widest text-stone-400" colspan="4">Monthly Period Totals</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 8.420,00</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 79.850,00</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 12.776,00</td>
<td class="px-6 py-5 text-xs font-bold text-white text-right">Bs. 6.924,00</td>
<td class="px-6 py-5 text-lg font-headline font-bold text-lime-400 text-right">Bs. 94.122,00</td>
</tr>
</tfoot>
</table>
</div>
</section>
<!-- Footer / Signature Area -->
<footer class="mt-12 flex flex-col md:flex-row justify-between items-start gap-8 opacity-60">
<div class="text-[10px] uppercase font-bold tracking-[0.2em] text-stone-500">
<p>TITAN ENGINE ERP - FISCAL MODULE v4.2.1</p>
<p>Digital Stamp: 0X992-B7F-1120-CC</p>
</div>
<div class="text-[10px] text-right uppercase font-bold tracking-[0.2em] text-stone-500">
<p>Certified Document under Venezuelan Law</p>
<p>Electronic signature valid for SENIAT audits</p>
</div>
</footer>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/libro-ventas.js"></script>
@endpush
