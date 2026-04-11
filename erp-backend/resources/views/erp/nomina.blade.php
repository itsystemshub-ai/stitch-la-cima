@extends('layouts.erp')

@section('title', 'nomina | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/nomina.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="md:ml-64 pt-20 p-6 min-h-screen">
<!-- Header Section -->
<header class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<h1 class="font-headline text-4xl font-extrabold uppercase tracking-tighter text-white">Payroll Calculation</h1>
<p class="text-neutral-500 font-label text-sm uppercase tracking-widest mt-1">Industrial Processing Unit • V.2.4.0</p>
</div>
<!-- Date Selector (Bento Style) -->
<div class="bg-neutral-900 p-1 flex items-center rounded-lg border border-neutral-800">
<div class="px-4 py-2 flex flex-col border-r border-neutral-800">
<span class="text-[10px] text-lime-400 font-bold uppercase tracking-tighter">Period Start</span>
<input class="bg-transparent border-none text-white p-0 text-sm focus:ring-0" type="date" value="2023-11-01"/>
</div>
<div class="px-4 py-2 flex flex-col border-r border-neutral-800">
<span class="text-[10px] text-lime-400 font-bold uppercase tracking-tighter">Period End</span>
<input class="bg-transparent border-none text-white p-0 text-sm focus:ring-0" type="date" value="2023-11-15"/>
</div>
<button class="px-4 py-2 hover:bg-neutral-800 transition-colors">
<span class="material-symbols-outlined text-neutral-400">refresh</span>
</button>
</div>
</header>
<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-neutral-900 p-6 border-l-4 border-lime-500">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Gross Total</p>
<h3 class="text-2xl font-headline font-bold text-white mt-1">245.890,00 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
<div class="bg-neutral-900 p-6 border-l-4 border-neutral-700">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Deductions Sum</p>
<h3 class="text-2xl font-headline font-bold text-white mt-1">12.340,50 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
<div class="bg-neutral-900 p-6 border-l-4 border-lime-500">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Net Payable</p>
<h3 class="text-2xl font-headline font-bold text-lime-400 mt-1">233.549,50 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
<div class="bg-neutral-900 p-6 border-l-4 border-neutral-700">
<p class="text-[10px] text-neutral-500 font-bold uppercase tracking-widest">Patronal Costs</p>
<h3 class="text-2xl font-headline font-bold text-white mt-1">34.120,00 <span class="text-xs text-neutral-500 uppercase">VED</span></h3>
</div>
</div>
<!-- Employee Payroll Table -->
<div class="bg-neutral-900 rounded-lg overflow-hidden border border-neutral-800 mb-8">
<div class="px-6 py-4 border-b border-neutral-800 flex justify-between items-center">
<h2 class="font-headline font-bold uppercase text-sm tracking-widest text-neutral-300">Detailed Payroll Worksheet</h2>
<div class="flex gap-4">
<button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-lime-400 hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm">filter_alt</span> Filter Employees
                    </button>
<button class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-neutral-400 hover:text-white transition-colors">
<span class="material-symbols-outlined text-sm">download</span> CSV Export
                    </button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-neutral-950/50">
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Employee Details</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Base Salary</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">LOTTT Recargos</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Deductions (IVSS/FAOV)</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Cesta Ticket</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500">Net Total</th>
<th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-neutral-500 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-neutral-800">
<!-- Employee Row 1 -->
<tr class="hover:bg-neutral-800/50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-neutral-800 flex items-center justify-center font-bold text-lime-400 text-xs">RM</div>
<div>
<p class="text-sm font-bold text-white">RICARDO MENDOZA</p>
<p class="text-[10px] text-neutral-500 uppercase font-medium">Operations Lead • ID: 402231</p>
</div>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-neutral-300">45.000,00</td>
<td class="px-6 py-4">
<div class="flex flex-col gap-1">
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">OT 50%: 12.5h</span>
<span class="text-[10px] px-2 py-0.5 bg-lime-900/30 text-lime-400 rounded w-fit">Bonus: 5.000,00</span>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-error/80">
<p>-1.250,40 <span class="text-[9px] text-neutral-500 block uppercase">IVSS (0.5%) + FAOV (0.25%)</span></p>
</td>
<td class="px-6 py-4">
<p class="text-sm font-medium text-neutral-300">1.000,00</p>
<p class="text-[9px] text-neutral-500 uppercase">22 Days Active</p>
</td>
<td class="px-6 py-4 font-headline font-bold text-lime-400">49.749,60</td>
<td class="px-6 py-4 text-right">
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="View Details">
<span class="material-symbols-outlined text-sm text-neutral-400">visibility</span>
</button>
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="Download Receipt">
<span class="material-symbols-outlined text-sm text-neutral-400">file_download</span>
</button>
</td>
</tr>
<!-- Employee Row 2 -->
<tr class="hover:bg-neutral-800/50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-neutral-800 flex items-center justify-center font-bold text-lime-400 text-xs">AS</div>
<div>
<p class="text-sm font-bold text-white">ANA SÁNCHEZ</p>
<p class="text-[10px] text-neutral-500 uppercase font-medium">Mechanical Engineer • ID: 402245</p>
</div>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-neutral-300">62.000,00</td>
<td class="px-6 py-4">
<div class="flex flex-col gap-1">
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">OT 75%: 4.0h</span>
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">Comm: 8.500,00</span>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-error/80">
<p>-1.860,00 <span class="text-[9px] text-neutral-500 block uppercase">PF (1%) + IVSS/FAOV</span></p>
</td>
<td class="px-6 py-4">
<p class="text-sm font-medium text-neutral-300">1.000,00</p>
<p class="text-[9px] text-neutral-500 uppercase">22 Days Active</p>
</td>
<td class="px-6 py-4 font-headline font-bold text-lime-400">69.640,00</td>
<td class="px-6 py-4 text-right">
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="View Details">
<span class="material-symbols-outlined text-sm text-neutral-400">visibility</span>
</button>
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="Download Receipt">
<span class="material-symbols-outlined text-sm text-neutral-400">file_download</span>
</button>
</td>
</tr>
<!-- Employee Row 3 -->
<tr class="hover:bg-neutral-800/50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-neutral-800 flex items-center justify-center font-bold text-lime-400 text-xs">JV</div>
<div>
<p class="text-sm font-bold text-white">JOSE VILLALOBOS</p>
<p class="text-[10px] text-neutral-500 uppercase font-medium">Technician II • ID: 402289</p>
</div>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-neutral-300">38.500,00</td>
<td class="px-6 py-4">
<div class="flex flex-col gap-1">
<span class="text-[10px] px-2 py-0.5 bg-neutral-800 text-neutral-400 rounded w-fit">OT 100%: 8.0h</span>
</div>
</td>
<td class="px-6 py-4 text-sm font-medium text-error/80">
<p>-962,50 <span class="text-[9px] text-neutral-500 block uppercase">Full Deductions</span></p>
</td>
<td class="px-6 py-4">
<p class="text-sm font-medium text-neutral-300">850,00</p>
<p class="text-[9px] text-neutral-500 uppercase">18 Days Active</p>
</td>
<td class="px-6 py-4 font-headline font-bold text-lime-400">42.387,50</td>
<td class="px-6 py-4 text-right">
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="View Details">
<span class="material-symbols-outlined text-sm text-neutral-400">visibility</span>
</button>
<button class="p-2 hover:bg-neutral-700 rounded-lg transition-all" title="Download Receipt">
<span class="material-symbols-outlined text-sm text-neutral-400">file_download</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Action Panel -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
<!-- Summary Card -->
<div class="bg-neutral-900 p-8 rounded-lg border border-neutral-800 flex flex-col justify-between">
<div>
<h3 class="font-headline font-extrabold text-2xl uppercase tracking-tighter text-white mb-6">Accounting Summary</h3>
<div class="space-y-4">
<div class="flex justify-between items-center text-sm font-medium">
<span class="text-neutral-500 uppercase tracking-widest text-[11px]">Total Basic Wage</span>
<span class="text-white">145.500,00</span>
</div>
<div class="flex justify-between items-center text-sm font-medium">
<span class="text-neutral-500 uppercase tracking-widest text-[11px]">Overtime (50/75/100)</span>
<span class="text-white">28.400,00</span>
</div>
<div class="flex justify-between items-center text-sm font-medium">
<span class="text-neutral-500 uppercase tracking-widest text-[11px]">Legal Deductions</span>
<span class="text-error/80">-12.340,50</span>
</div>
<div class="pt-4 border-t border-neutral-800 flex justify-between items-center">
<span class="font-headline font-black text-lime-400 uppercase tracking-widest">Net Liability</span>
<span class="font-headline font-black text-2xl text-lime-400">233.549,50</span>
</div>
</div>
</div>
</div>
<!-- Global Actions -->
<div class="flex flex-col gap-4">
<button class="flex-1 bg-primary text-on-primary p-6 flex flex-col items-center justify-center gap-2 group hover:scale-[1.01] active:scale-95 transition-all shadow-[0_10px_20px_rgba(73,104,0,0.2)]">
<span class="material-symbols-outlined text-3xl">account_balance_wallet</span>
<span class="font-headline font-bold text-xl uppercase tracking-tight">Process &amp; Generate Accounting Seats</span>
<p class="text-[10px] font-medium uppercase tracking-widest opacity-70">Automatic Ledger Entry Posting</p>
</button>
<div class="grid grid-cols-2 gap-4">
<button class="bg-neutral-800 border border-neutral-700 p-4 flex flex-col items-center gap-2 hover:bg-neutral-700 transition-all uppercase font-headline font-bold text-xs tracking-widest text-white">
<span class="material-symbols-outlined">description</span>
                        Download Receipts
                    </button>
<button class="bg-neutral-800 border border-neutral-700 p-4 flex flex-col items-center gap-2 hover:bg-neutral-700 transition-all uppercase font-headline font-bold text-xs tracking-widest text-white">
<span class="material-symbols-outlined">print</span>
                        Print Summary
                    </button>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/nomina.js"></script>
@endpush
