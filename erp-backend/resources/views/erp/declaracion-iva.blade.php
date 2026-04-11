@extends('layouts.erp')

@section('title', 'FINANCE_ENGINE - Industrial ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/declaracion-iva.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="md:pl-64 pt-20 p-6 min-h-screen bg-[#1a1c1c]">
<!-- Header Section -->
<header class="mb-12 relative">
<div class="absolute -top-10 -left-10 w-64 h-64 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 relative z-10">
<div>
<span class="label-md text-amber-500 font-bold uppercase tracking-[0.2em] mb-2 block">Fiscal Oversight</span>
<h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter headline-font text-white leading-none">
                        MAYOR DE REPUESTO <br/><span class="text-zinc-600">LA CIMA, C.A.</span>
</h1>
</div>
<div class="bg-zinc-900 p-4 border-l-4 border-amber-500">
<p class="text-xs text-zinc-500 uppercase tracking-widest font-bold">Tax ID (RIF)</p>
<p class="text-xl font-mono text-zinc-200">J-40592831-0</p>
</div>
</div>
</header>
<!-- Bento Grid Statistics -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<!-- Debt vs Credit Card -->
<div class="md:col-span-2 bg-[#222424] p-8 relative overflow-hidden group">
<div class="relative z-10">
<h3 class="font-['Space_Grotesk'] uppercase text-zinc-400 tracking-wider text-sm mb-6">IVA Balance Analysis</h3>
<div class="flex justify-between items-end gap-4">
<div class="flex-1">
<p class="text-xs text-zinc-500 uppercase mb-1">Debito Fiscal</p>
<p class="text-3xl font-bold headline-font text-white">VES 425.890,00</p>
<div class="w-full bg-zinc-800 h-1 mt-4">
<div class="bg-amber-500 h-1 w-3/4"></div>
</div>
</div>
<div class="flex-1">
<p class="text-xs text-zinc-500 uppercase mb-1 text-right">Credito Fiscal</p>
<p class="text-3xl font-bold headline-font text-amber-400 text-right">VES 312.440,00</p>
<div class="w-full bg-zinc-800 h-1 mt-4">
<div class="bg-zinc-600 h-1 w-1/2 ml-auto"></div>
</div>
</div>
</div>
<div class="mt-8 flex items-center justify-between">
<p class="text-xs uppercase font-bold text-zinc-500">Calculated Differential</p>
<p class="text-lg font-bold headline-font text-white">+VES 113.450,00</p>
</div>
</div>
<!-- Subtle Gradient Pattern -->
<div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-50"></div>
</div>
<!-- Tax Retentions Card -->
<div class="bg-zinc-900 p-8 flex flex-col justify-between border border-zinc-800/50">
<span class="material-symbols-outlined text-amber-500 text-4xl mb-4" style="font-variation-settings: 'FILL' 1;">account_balance</span>
<div>
<h3 class="font-['Space_Grotesk'] uppercase text-zinc-500 tracking-wider text-xs mb-1">IVA Practicadas</h3>
<p class="text-2xl font-bold text-white headline-font">VES 84.120,50</p>
</div>
<div class="mt-4 pt-4 border-t border-zinc-800">
<p class="text-[10px] text-zinc-500 uppercase tracking-tighter">Last Update: May 24, 2024</p>
</div>
</div>
<!-- ISLR Retentions Card -->
<div class="bg-zinc-900 p-8 flex flex-col justify-between border border-zinc-800/50">
<span class="material-symbols-outlined text-zinc-500 text-4xl mb-4">receipt_long</span>
<div>
<h3 class="font-['Space_Grotesk'] uppercase text-zinc-500 tracking-wider text-xs mb-1">ISLR Sufridas</h3>
<p class="text-2xl font-bold text-white headline-font">VES 12.840,00</p>
</div>
<div class="mt-4 pt-4 border-t border-zinc-800">
<p class="text-xs text-amber-500 font-bold uppercase">View Ledger</p>
</div>
</div>
</section>
<!-- Form and Detail Split Layout -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
<!-- Declaration Form (Simulated) -->
<section class="lg:col-span-2 bg-[#222424] p-10">
<div class="flex items-center justify-between mb-10">
<h2 class="text-2xl font-black uppercase headline-font text-white">Formulario 00030: <span class="text-amber-500">IVA Mensual</span></h2>
<span class="px-3 py-1 bg-zinc-800 text-zinc-400 text-[10px] uppercase font-bold tracking-[0.2em]">Period: 05-2024</span>
</div>
<div class="space-y-8">
<!-- Form Section: Sales -->
<div>
<div class="flex items-center gap-4 mb-4">
<div class="h-px bg-zinc-800 flex-1"></div>
<span class="text-xs font-bold text-zinc-500 uppercase">Sección A: Ventas y Debitos</span>
<div class="h-px bg-zinc-800 flex-1"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Ventas Internas Gravadas Alícuota General</label>
<div class="bg-zinc-950 border border-zinc-800 p-4 focus-within:border-amber-500 transition-colors">
<input class="bg-transparent border-none focus:ring-0 text-white font-mono w-full text-lg" type="text" value="2.661.812,50"/>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Débito Fiscal Correspondiente (16%)</label>
<div class="bg-zinc-800/30 border border-zinc-800 p-4">
<input class="bg-transparent border-none focus:ring-0 text-amber-500 font-mono w-full text-lg opacity-80" readonly="" type="text" value="425.890,00"/>
</div>
</div>
</div>
</div>
<!-- Form Section: Purchases -->
<div>
<div class="flex items-center gap-4 mb-4">
<div class="h-px bg-zinc-800 flex-1"></div>
<span class="text-xs font-bold text-zinc-500 uppercase">Sección B: Compras y Créditos</span>
<div class="h-px bg-zinc-800 flex-1"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Compras Internas Gravadas Alícuota General</label>
<div class="bg-zinc-950 border border-zinc-800 p-4 focus-within:border-amber-500 transition-colors">
<input class="bg-transparent border-none focus:ring-0 text-white font-mono w-full text-lg" type="text" value="1.952.750,00"/>
</div>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Crédito Fiscal Correspondiente (16%)</label>
<div class="bg-zinc-800/30 border border-zinc-800 p-4">
<input class="bg-transparent border-none focus:ring-0 text-amber-400 font-mono w-full text-lg opacity-80" readonly="" type="text" value="312.440,00"/>
</div>
</div>
</div>
</div>
<!-- Form Footer: Totals -->
<div class="bg-zinc-950 p-8 border-l-8 border-primary mt-12 flex flex-col md:flex-row justify-between items-center gap-8">
<div>
<p class="text-xs text-zinc-500 uppercase font-black mb-1">Total Impuesto a Pagar (Antes de Retenciones)</p>
<p class="text-4xl font-bold headline-font text-white">VES 113.450,00</p>
</div>
<button class="bg-primary hover:bg-primary-container text-white hover:text-on-primary-container px-8 py-4 headline-font font-bold uppercase text-sm tracking-widest transition-all scale-100 hover:scale-[1.02] active:scale-95">
                            Submit To Seniat
                        </button>
</div>
</div>
</section>
<!-- Technical Breakdown Table -->
<aside class="space-y-6">
<div class="bg-zinc-900 overflow-hidden border border-zinc-800">
<div class="p-6 bg-zinc-800/50">
<h3 class="font-['Space_Grotesk'] uppercase text-sm font-bold text-white tracking-widest">Retenciones Sufridas (Detalle)</h3>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-zinc-950 text-[10px] uppercase text-zinc-500 font-black">
<th class="p-4">Provider / Client</th>
<th class="p-4">Type</th>
<th class="p-4 text-right">Amount</th>
</tr>
</thead>
<tbody class="divide-y divide-zinc-800/50">
<tr class="hover:bg-zinc-800/30 transition-colors">
<td class="p-4">
<p class="text-xs font-bold text-zinc-200">TRANS-CARIBE, C.A.</p>
<p class="text-[10px] text-zinc-500">J-30922831-2</p>
</td>
<td class="p-4">
<span class="text-[9px] bg-amber-500/10 text-amber-400 px-2 py-0.5 rounded uppercase font-bold">IVA</span>
</td>
<td class="p-4 text-right font-mono text-xs text-zinc-300">12.500,00</td>
</tr>
<tr class="hover:bg-zinc-800/30 transition-colors">
<td class="p-4">
<p class="text-xs font-bold text-zinc-200">INVERSIONES 2020</p>
<p class="text-[10px] text-zinc-500">J-29833100-1</p>
</td>
<td class="p-4">
<span class="text-[9px] bg-zinc-700 text-zinc-300 px-2 py-0.5 rounded uppercase font-bold">ISLR</span>
</td>
<td class="p-4 text-right font-mono text-xs text-zinc-300">4.200,00</td>
</tr>
<tr class="hover:bg-zinc-800/30 transition-colors">
<td class="p-4">
<p class="text-xs font-bold text-zinc-200">DISTRIBUIDORA METAL</p>
<p class="text-[10px] text-zinc-500">J-10293344-0</p>
</td>
<td class="p-4">
<span class="text-[9px] bg-amber-500/10 text-amber-400 px-2 py-0.5 rounded uppercase font-bold">IVA</span>
</td>
<td class="p-4 text-right font-mono text-xs text-zinc-300">8.950,00</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Industrial Visual Component -->
<div class="h-48 relative overflow-hidden group">
<img alt="Industrial Engine Parts" class="w-full h-full object-cover grayscale opacity-40 group-hover:opacity-60 transition-opacity" data-alt="High-precision industrial engine components made of polished chrome and steel, macro shot with dramatic lighting and dark technical aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuActUuQtgonLoamFibDF_OZe113ue71JMMUoVXBtDr5bGio2Pjl9B8Km5KdxrXUp1xKzzZrwLg0Acw1-qUTKiSIMBnfKP7zo6U0VfvOMllldFvW-2XTxAlx7UKAadC426lEPzXJZwO_lYndUxLRez5y54d20fcenuMil4ojO3pG12NFR8W5tHGkgFAtBhJJk6e1Xjsr4y2ENvNTkqkQip_NAufaaCyvRQJVOasuWHHTIltECZhVKUUGUSkiFlhpb7lhiWv_4BCD5lY"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#1a1c1c] via-transparent to-transparent"></div>
<div class="absolute bottom-4 left-4">
<p class="text-[10px] uppercase font-bold tracking-widest text-amber-500">Precision Asset Log</p>
<p class="text-xs text-white headline-font">Stock Ref: 992-XC-MAX</p>
</div>
</div>
<div class="bg-zinc-900 p-6 border-l border-zinc-800">
<div class="flex items-center gap-2 mb-4">
<span class="material-symbols-outlined text-zinc-500 text-sm">info</span>
<span class="text-[10px] uppercase text-zinc-500 font-bold tracking-widest">Audit Status</span>
</div>
<p class="text-xs text-zinc-400 leading-relaxed italic">
                        "Documentacion verificada según normativa Gaceta Oficial N° 42.100. Todos los cálculos están sujetos a conciliación bancaria final."
                    </p>
</div>
</aside>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/declaracion-iva.js"></script>
@endpush
