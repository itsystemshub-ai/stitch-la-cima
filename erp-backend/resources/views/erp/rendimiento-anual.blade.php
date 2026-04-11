@extends('layouts.erp')

@section('title', 'Reporte Anual de Ventas | TITAN ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/rendimiento-anual.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P·gina';
  });
</script>

<main class="lg:ml-64 pt-20 pb-12 px-6">
<header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<nav class="flex text-[10px] uppercase tracking-[0.2em] text-stone-400 mb-2">
<span class="font-bold">Anal√≠ticas</span>
<span class="mx-2">/</span>
<span class="text-lime-600 font-black">Reporte Anual 2023</span>
</nav>
<h1 class="font-headline font-bold text-4xl lg:text-5xl uppercase tracking-tighter text-on-background max-w-2xl leading-none">
                    Reporte Anual de Ventas por <span class="text-primary italic">Vendedor y Cliente</span>
</h1>
</div>
<div class="flex gap-2">
<button class="bg-surface-container-high px-4 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-sm">file_download</span> Export PDF
                </button>
<button class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest flex items-center gap-2 hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined text-sm">calendar_month</span> FY 2023
                </button>
</div>
</header>
<!-- Analytical Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-8">
<!-- Summary Stats -->
<div class="md:col-span-12 grid grid-cols-2 lg:grid-cols-4 gap-4">
<div class="bg-surface-container-lowest p-6 rounded-lg relative overflow-hidden group">
<div class="absolute top-0 right-0 w-24 h-24 bg-lime-500/5 -mr-8 -mt-8 rounded-full transition-transform group-hover:scale-150"></div>
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Revenue Anual Total</p>
<p class="text-3xl font-headline font-bold text-on-background">$4,829,102.50</p>
<div class="flex items-center gap-1 mt-2 text-lime-600">
<span class="material-symbols-outlined text-sm">trending_up</span>
<span class="text-[10px] font-bold">+12.4% vs LY</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-lg relative overflow-hidden group">
<div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/5 -mr-8 -mt-8 rounded-full transition-transform group-hover:scale-150"></div>
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Promedio Cuota</p>
<p class="text-3xl font-headline font-bold text-on-background">94.2%</p>
<div class="flex items-center gap-1 mt-2 text-amber-600">
<span class="material-symbols-outlined text-sm">priority_high</span>
<span class="text-[10px] font-bold">-2.1% Target</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-lg">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Clientes Activos</p>
<p class="text-3xl font-headline font-bold text-on-background">1,204</p>
<div class="flex items-center gap-1 mt-2 text-lime-600">
<span class="material-symbols-outlined text-sm">group_add</span>
<span class="text-[10px] font-bold">+45 Nuevos</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-lg border-l-4 border-primary">
<p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-1">Comisiones Devengadas</p>
<p class="text-3xl font-headline font-bold text-on-background">$241,455</p>
<p class="text-[10px] font-bold text-primary mt-2">Provisionado Oct-Dic</p>
</div>
</div>
<!-- Monthly Trend Chart Mock -->
<div class="md:col-span-8 bg-surface-container-lowest p-8 rounded-lg">
<div class="flex justify-between items-center mb-10">
<h3 class="font-headline font-bold text-xl uppercase tracking-tighter">Monthly Sales Trend</h3>
<div class="flex gap-4">
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-primary rounded-full"></div>
<span class="text-[10px] font-bold uppercase">Actual</span>
</div>
<div class="flex items-center gap-2">
<div class="w-3 h-3 bg-stone-200 rounded-full"></div>
<span class="text-[10px] font-bold uppercase">Forecast</span>
</div>
</div>
</div>
<div class="h-64 flex items-end justify-between gap-2 px-2">
<!-- Simple CSS bar chart visualization -->
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-40 group-hover:bg-primary/20 transition-colors"></div>
<div class="w-full bg-primary rounded-t h-32 absolute bottom-6 group-hover:h-36 transition-all"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">JAN</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-44"></div>
<div class="w-full bg-primary rounded-t h-36 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">FEB</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-48"></div>
<div class="w-full bg-primary rounded-t h-40 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">MAR</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-52"></div>
<div class="w-full bg-primary rounded-t h-48 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">APR</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-40"></div>
<div class="w-full bg-primary rounded-t h-28 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">MAY</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-56"></div>
<div class="w-full bg-primary rounded-t h-52 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">JUN</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-60"></div>
<div class="w-full bg-amber-500 rounded-t h-58 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">JUL</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-52"></div>
<div class="w-full bg-primary rounded-t h-46 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">AUG</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-48"></div>
<div class="w-full bg-primary rounded-t h-42 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">SEP</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-56"></div>
<div class="w-full bg-primary rounded-t h-50 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">OCT</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-44"></div>
<div class="w-full bg-primary rounded-t h-38 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">NOV</span>
</div>
<div class="group relative flex-1 flex flex-col items-center gap-2">
<div class="w-full bg-stone-100 rounded-t h-64"></div>
<div class="w-full bg-primary rounded-t h-60 absolute bottom-6"></div>
<span class="text-[9px] font-bold text-stone-400 absolute -bottom-6">DEC</span>
</div>
</div>
</div>
<!-- Pie Chart Mock -->
<div class="md:col-span-4 bg-surface-container-lowest p-8 rounded-lg flex flex-col">
<h3 class="font-headline font-bold text-xl uppercase tracking-tighter mb-8">Distribution by Seller</h3>
<div class="flex-1 flex flex-col items-center justify-center relative">
<!-- Ring Chart Representation -->
<div class="w-48 h-48 rounded-full border-[20px] border-stone-100 flex items-center justify-center relative">
<div class="absolute inset-0 rounded-full border-[20px] border-primary border-t-transparent border-l-transparent transform -rotate-45"></div>
<div class="absolute inset-0 rounded-full border-[20px] border-amber-500 border-b-transparent border-r-transparent transform rotate-12 opacity-80"></div>
<div class="text-center">
<span class="block text-2xl font-headline font-black">100%</span>
<span class="text-[8px] font-bold uppercase text-stone-400">Quota Reach</span>
</div>
</div>
</div>
<div class="mt-8 space-y-3">
<div class="flex justify-between items-center text-xs">
<div class="flex items-center gap-2">
<div class="w-2 h-2 bg-primary"></div>
<span class="font-medium">V. Rodriguez</span>
</div>
<span class="font-bold">42%</span>
</div>
<div class="flex justify-between items-center text-xs">
<div class="flex items-center gap-2">
<div class="w-2 h-2 bg-amber-500"></div>
<span class="font-medium">M. Delgado</span>
</div>
<span class="font-bold">28%</span>
</div>
<div class="flex justify-between items-center text-xs text-stone-400">
<div class="flex items-center gap-2">
<div class="w-2 h-2 bg-stone-300"></div>
<span class="font-medium">Otros (4)</span>
</div>
<span class="font-bold">30%</span>
</div>
</div>
</div>
<!-- Detailed Table -->
<div class="md:col-span-12 overflow-x-auto">
<div class="bg-surface-container-lowest rounded-lg overflow-hidden">
<div class="px-8 py-6 border-b border-stone-100 flex justify-between items-center">
<h3 class="font-headline font-bold text-xl uppercase tracking-tighter">Performance Breakdown</h3>
<div class="flex gap-2">
<span class="text-[10px] bg-stone-100 px-3 py-1 rounded-full font-bold text-stone-500">Total 12 Sellers</span>
</div>
</div>
<table class="w-full text-left">
<thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-widest text-stone-500">
<tr>
<th class="px-8 py-4">Seller Name</th>
<th class="px-8 py-4">Total Sales (USD)</th>
<th class="px-8 py-4">Quota Achievement %</th>
<th class="px-8 py-4">Top Client</th>
<th class="px-8 py-4 text-right">Commission Earned</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-100 text-sm">
<tr class="hover:bg-stone-50 transition-colors">
<td class="px-8 py-5 flex items-center gap-3">
<div class="w-8 h-8 rounded bg-lime-100 flex items-center justify-center text-primary font-black text-xs">VR</div>
<span class="font-bold">Valentina Rodriguez</span>
</td>
<td class="px-8 py-5 font-mono text-xs">$1,240,500.00</td>
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="flex-1 h-1.5 bg-stone-100 rounded-full overflow-hidden w-24">
<div class="h-full bg-primary w-[115%]"></div>
</div>
<span class="font-bold text-xs text-primary">115%</span>
</div>
</td>
<td class="px-8 py-5 text-stone-600">Industrial Sol. SA</td>
<td class="px-8 py-5 text-right font-black">$62,025</td>
</tr>
<tr class="bg-stone-50/30 hover:bg-stone-50 transition-colors">
<td class="px-8 py-5 flex items-center gap-3">
<div class="w-8 h-8 rounded bg-amber-100 flex items-center justify-center text-amber-600 font-black text-xs">MD</div>
<span class="font-bold">Marcos Delgado</span>
</td>
<td class="px-8 py-5 font-mono text-xs">$985,200.00</td>
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="flex-1 h-1.5 bg-stone-100 rounded-full overflow-hidden w-24">
<div class="h-full bg-amber-500 w-[92%]"></div>
</div>
<span class="font-bold text-xs text-amber-600">92%</span>
</div>
</td>
<td class="px-8 py-5 text-stone-600">Petro-Titan Corp</td>
<td class="px-8 py-5 text-right font-black">$49,260</td>
</tr>
<tr class="hover:bg-stone-50 transition-colors">
<td class="px-8 py-5 flex items-center gap-3">
<div class="w-8 h-8 rounded bg-stone-200 flex items-center justify-center text-stone-600 font-black text-xs">AC</div>
<span class="font-bold">Ana Castellanos</span>
</td>
<td class="px-8 py-5 font-mono text-xs">$820,000.00</td>
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="flex-1 h-1.5 bg-stone-100 rounded-full overflow-hidden w-24">
<div class="h-full bg-primary w-[88%]"></div>
</div>
<span class="font-bold text-xs">88%</span>
</div>
</td>
<td class="px-8 py-5 text-stone-600">Logistics Group LP</td>
<td class="px-8 py-5 text-right font-black">$41,000</td>
</tr>
<tr class="bg-stone-50/30 hover:bg-stone-50 transition-colors">
<td class="px-8 py-5 flex items-center gap-3">
<div class="w-8 h-8 rounded bg-stone-200 flex items-center justify-center text-stone-600 font-black text-xs">JR</div>
<span class="font-bold">Jorge Rivas</span>
</td>
<td class="px-8 py-5 font-mono text-xs">$755,000.00</td>
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="flex-1 h-1.5 bg-stone-100 rounded-full overflow-hidden w-24">
<div class="h-full bg-primary w-[102%]"></div>
</div>
<span class="font-bold text-xs text-primary">102%</span>
</div>
</td>
<td class="px-8 py-5 text-stone-600">Constructora Bolivar</td>
<td class="px-8 py-5 text-right font-black">$37,750</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Decorative Industrial Elements -->
<div class="md:col-span-12 grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
<div class="h-40 relative rounded-lg overflow-hidden grayscale contrast-125 opacity-40">
<img alt="Industrial Infrastructure" class="object-cover w-full h-full" data-alt="dramatic wide shot of precision engine parts assembly line with clinical lighting and sharp steel textures" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA3Bxinnokvtt5oYa7onK8lfHSpcRNqvQdRpj-unX1jcfUPI3EvFJvai8GhN7tt_oNwYnwQwTDd9kuBoc2EhJdx7QQL2QFOhFiYwvoIDKIIIFFxIXXix3ZdDjGTEbRaF158gIpDubtMPGzBohm178iSzK81dHRpkL_LKLRVVcR2fYo5N4THgtEViAlbyZ89S91IezwWJo4B0Op8mtysFB6Ar92yuNGapnvXrfVqEzNAsUMH8coYZY4IudHdXPt-gFvbTK5g2NHhPNo"/>
<div class="absolute inset-0 bg-primary/20 mix-blend-overlay"></div>
</div>
<div class="bg-stone-900 p-8 rounded-lg flex flex-col justify-center border-l-4 border-amber-500">
<div class="flex items-center gap-2 mb-4 text-amber-500">
<span class="material-symbols-outlined">warning</span>
<span class="text-[10px] font-black uppercase tracking-widest">Notice: Year End Review</span>
</div>
<p class="text-stone-300 text-sm font-medium leading-relaxed">
                        Sales commissions are currently in "Pending Review" status for Q4. Final adjustments based on credit note reconciliations will be applied by January 15th.
                    </p>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/rendimiento-anual.js"></script>
@endpush
