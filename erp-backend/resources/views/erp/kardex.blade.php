@extends('layouts.erp')

@section('title', 'Kardex Valorizado - TRUCKPRO ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/kardex.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P·gina';
  });
</script>

<main class="ml-64 min-h-screen">
<!-- TopAppBar -->
<header class="w-full sticky top-0 z-40 bg-stone-50/80 dark:bg-stone-900/80 backdrop-blur-xl flex justify-between items-center px-6 h-16 w-full">
<div class="flex items-center gap-4">
<h1 class="font-['Space_Grotesk'] uppercase tracking-tight font-bold text-lg text-stone-900 dark:text-stone-50">Kardex Valorizado <span class="text-lime-500">Art. 177 ISLR</span></h1>
</div>
<div class="flex items-center gap-6">
<div class="hidden md:flex items-center bg-stone-200 dark:bg-stone-800 rounded-lg px-3 py-1.5 gap-2">
<span class="material-symbols-outlined text-stone-500 text-sm">search</span>
<input class="bg-transparent border-none focus:ring-0 text-sm text-stone-300 w-48 font-['Inter']" placeholder="Search components..." type="text"/>
</div>
<button class="bg-lime-600 hover:bg-lime-500 text-white px-4 py-1.5 text-xs font-bold uppercase tracking-widest transition-all scale-95 active:duration-100">
                    Legal Alert
                </button>
<div class="flex items-center gap-4 text-stone-400">
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400">settings</span>
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400">notifications</span>
<span class="material-symbols-outlined cursor-pointer hover:text-lime-400">account_circle</span>
</div>
</div>
</header>
<div class="p-8 space-y-8">
<!-- Header Identity Section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="md:col-span-2 bg-stone-900 p-8 border-l-4 border-lime-600 relative overflow-hidden">
<div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none">
<span class="material-symbols-outlined text-[120px]">engineering</span>
</div>
<h2 class="text-3xl font-black font-['Space_Grotesk'] text-stone-50 mb-2">MAYOR DE REPUESTO LA CIMA, C.A.</h2>
<p class="text-stone-400 font-['Inter'] tracking-widest text-xs uppercase mb-6">RIF: J-00000000-0 | Industrial Engine Parts Division</p>
<div class="grid grid-cols-2 gap-8 pt-6 border-t border-stone-800">
<div>
<span class="block text-[10px] text-lime-500 font-bold uppercase tracking-tighter mb-1">Product Description</span>
<span class="text-lg font-medium">PISTON KIT - CATERPILLAR C15</span>
</div>
<div>
<span class="block text-[10px] text-lime-500 font-bold uppercase tracking-tighter mb-1">Accounting Method</span>
<span class="text-lg font-medium">COSTO PROMEDIO PONDERADO (CPP)</span>
</div>
</div>
</div>
<div class="bg-stone-900 p-8 flex flex-col justify-between">
<div>
<span class="block text-[10px] text-stone-500 font-bold uppercase tracking-tighter mb-4">Total Inventory Value</span>
<div class="text-4xl font-black text-lime-400 font-['Space_Grotesk']">$ 42,850.25</div>
<div class="mt-2 flex items-center gap-2 text-xs text-stone-400">
<span class="material-symbols-outlined text-sm text-lime-500">trending_up</span>
<span>+4.2% vs previous month</span>
</div>
</div>
<div class="flex gap-2 mt-6">
<button class="flex-1 bg-stone-800 hover:bg-stone-700 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Export PDF</button>
<button class="flex-1 bg-stone-800 hover:bg-stone-700 py-3 text-[10px] font-bold uppercase tracking-widest transition-colors">Export XML</button>
</div>
</div>
</section>
<!-- Technical Ledger Filter Bar -->
<div class="flex items-center justify-between bg-stone-900 px-6 py-4 border-b border-stone-800">
<div class="flex items-center gap-8">
<div class="flex flex-col">
<label class="text-[9px] uppercase font-bold text-stone-500 mb-1">Fiscal Period</label>
<select class="bg-stone-950 border-none text-xs font-bold text-stone-200 focus:ring-1 ring-lime-600 py-1">
<option>OCTUBRE 2023</option>
<option>NOVIEMBRE 2023</option>
</select>
</div>
<div class="h-8 w-px bg-stone-800"></div>
<div class="flex flex-col">
<label class="text-[9px] uppercase font-bold text-stone-500 mb-1">Transaction Type</label>
<div class="flex gap-2">
<span class="px-2 py-0.5 rounded-sm bg-lime-900/30 text-lime-400 text-[10px] font-bold border border-lime-800/50">Purchases</span>
<span class="px-2 py-0.5 rounded-sm bg-stone-800 text-stone-400 text-[10px] font-bold border border-stone-700">Sales</span>
<span class="px-2 py-0.5 rounded-sm bg-stone-800 text-stone-400 text-[10px] font-bold border border-stone-700">Adjustments</span>
</div>
</div>
</div>
<div class="text-[10px] text-stone-500 font-mono">SYSTEM_VER: 4.8.2-STABLE</div>
</div>
<!-- Kardex Detailed Grid -->
<div class="bg-stone-900 overflow-hidden">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-800/50 text-stone-400">
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest border-r border-stone-800">Date</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest border-r border-stone-800">Reference / ID</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest border-r border-stone-800">Operation Type</th>
<th class="px-6 py-2 text-[10px] font-black uppercase tracking-widest text-center border-b border-stone-800" colspan="3">Unit Movement (Qty)</th>
<th class="px-6 py-2 text-[10px] font-black uppercase tracking-widest text-center border-b border-stone-800" colspan="3">Valuation (CPP)</th>
</tr>
<tr class="bg-stone-900 text-stone-500 border-b border-stone-800">
<th class="border-r border-stone-800" colspan="3"></th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">In</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Out</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Bal</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Unit Cost</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase border-r border-stone-800">Debit</th>
<th class="px-4 py-2 text-[9px] font-bold text-center uppercase">Total Balance</th>
</tr>
</thead>
<tbody class="font-mono text-xs">
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-01</td>
<td class="px-6 py-4 font-bold text-lime-500">INV-INIT-001</td>
<td class="px-6 py-4 uppercase">Inventario Inicial</td>
<td class="px-4 py-4 text-center bg-stone-800/20">150</td>
<td class="px-4 py-4 text-center">--</td>
<td class="px-4 py-4 text-center font-bold">150</td>
<td class="px-4 py-4 text-right">$ 180.00</td>
<td class="px-4 py-4 text-right text-lime-400 font-bold">$ 27,000.00</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 27,000.00</td>
</tr>
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-05</td>
<td class="px-6 py-4 font-bold text-lime-500">FAC-PUR-8822</td>
<td class="px-6 py-4 uppercase">Compra Nacional</td>
<td class="px-4 py-4 text-center bg-stone-800/20">50</td>
<td class="px-4 py-4 text-center">--</td>
<td class="px-4 py-4 text-center font-bold">200</td>
<td class="px-4 py-4 text-right">$ 195.00</td>
<td class="px-4 py-4 text-right text-lime-400 font-bold">$ 9,750.00</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 36,750.00</td>
</tr>
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-12</td>
<td class="px-6 py-4 font-bold text-lime-500">SAL-009121</td>
<td class="px-6 py-4 uppercase">Venta Contado</td>
<td class="px-4 py-4 text-center bg-stone-800/20">--</td>
<td class="px-4 py-4 text-center text-red-400">30</td>
<td class="px-4 py-4 text-center font-bold">170</td>
<td class="px-4 py-4 text-right">$ 183.75</td>
<td class="px-4 py-4 text-right text-stone-500">$ (5,512.50)</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 31,237.50</td>
</tr>
<tr class="border-b border-stone-800 hover:bg-stone-800/30 transition-colors group">
<td class="px-6 py-4 text-stone-500 group-hover:text-stone-300">2023-10-20</td>
<td class="px-6 py-4 font-bold text-lime-500">ADJ-PHYS-02</td>
<td class="px-6 py-4 uppercase text-yellow-500">Ajuste de Auditor√≠a</td>
<td class="px-4 py-4 text-center bg-stone-800/20">5</td>
<td class="px-4 py-4 text-center">--</td>
<td class="px-4 py-4 text-center font-bold">175</td>
<td class="px-4 py-4 text-right">$ 183.75</td>
<td class="px-4 py-4 text-right text-lime-400 font-bold">$ 918.75</td>
<td class="px-4 py-4 text-right bg-stone-800/20 font-bold">$ 32,156.25</td>
</tr>
</tbody>
</table>
</div>
<!-- Bottom Asymmetric Meta Section -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="md:col-span-1 bg-stone-900 p-6 flex flex-col justify-between">
<span class="block text-[10px] text-stone-500 font-bold uppercase tracking-tighter mb-4">Current CPP</span>
<div class="text-2xl font-black text-stone-50 font-['Space_Grotesk']">$ 183.75</div>
<div class="mt-4 p-3 bg-stone-950 border border-stone-800 text-[10px] text-stone-400">
                        Calculated based on 175 units on hand.
                    </div>
</div>
<div class="md:col-span-3 grid grid-cols-3 gap-1">
<div class="bg-stone-900/50 p-6">
<span class="block text-[10px] text-stone-500 font-bold uppercase mb-2">Total Entries</span>
<span class="text-xl font-bold">205 Units</span>
</div>
<div class="bg-stone-900/50 p-6">
<span class="block text-[10px] text-stone-500 font-bold uppercase mb-2">Total Exits</span>
<span class="text-xl font-bold">30 Units</span>
</div>
<div class="bg-lime-600 p-6 text-white">
<span class="block text-[10px] font-black uppercase mb-2">Inventory Status</span>
<span class="text-xl font-bold italic uppercase tracking-tighter">Compliant</span>
</div>
</div>
</section>
<!-- Legal Compliance Footer -->
<footer class="flex flex-col md:flex-row justify-between items-start md:items-center py-6 border-t border-stone-800 gap-4">
<div class="flex items-center gap-6">
<div class="flex items-center gap-2">
<div class="w-3 h-3 rounded-full bg-lime-500"></div>
<span class="text-[10px] font-bold uppercase text-stone-400">Fiscal System Active</span>
</div>
<div class="text-[10px] text-stone-600 font-mono">HASH: 9a2f-11eb-9439-0242ac130002</div>
</div>
<div class="flex gap-4">
<button class="text-[10px] font-bold uppercase text-stone-400 hover:text-lime-500 transition-colors">Privacy Policy</button>
<button class="text-[10px] font-bold uppercase text-stone-400 hover:text-lime-500 transition-colors">Audit Log</button>
<button class="text-[10px] font-bold uppercase text-stone-400 hover:text-lime-500 transition-colors">Help Desk</button>
</div>
</footer>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/kardex.js"></script>
@endpush
