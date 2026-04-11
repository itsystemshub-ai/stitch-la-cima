@extends('layouts.erp')

@section('title', 'Sales Reporting Center | INDUSTRIAL FORGE ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/reportes-ventas.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="flex-grow md:ml-64 bg-surface min-h-screen transition-all">
<!-- TopNavBar (Authority: JSON) -->
<header class="bg-surface dark:bg-stone-950/80 backdrop-blur-xl docked full-width top-0 z-50 flex justify-between items-center w-full px-6 py-4 mx-auto sticky top-0">
<div class="flex items-center gap-8">
<span class="text-xl font-bold tracking-tighter text-stone-900 dark:text-stone-50 font-['Space_Grotesk'] uppercase">INDUSTRIAL FORGE ERP</span>
<div class="hidden lg:flex items-center gap-6">
<a class="text-stone-500 dark:text-stone-400 font-['Space_Grotesk'] uppercase tracking-tight hover:text-lime-500 dark:hover:text-lime-300 transition-colors scale-98-on-click duration-200" href="#">Dashboard</a>
<a class="text-lime-600 dark:text-lime-400 border-b-2 border-lime-600 dark:border-lime-400 pb-1 font-['Space_Grotesk'] uppercase tracking-tight transition-colors scale-98-on-click duration-200" href="#">Analytics</a>
<a class="text-stone-500 dark:text-stone-400 font-['Space_Grotesk'] uppercase tracking-tight hover:text-lime-500 dark:hover:text-lime-300 transition-colors scale-98-on-click duration-200" href="#">Reports</a>
<a class="text-stone-500 dark:text-stone-400 font-['Space_Grotesk'] uppercase tracking-tight hover:text-lime-500 dark:hover:text-lime-300 transition-colors scale-98-on-click duration-200" href="#">Settings</a>
</div>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-sm">search</span>
<input class="bg-surface-container-low border-none text-[10px] font-bold tracking-widest pl-10 pr-4 py-2 w-48 focus:ring-2 focus:ring-primary" placeholder="GLOBAL SEARCH..." type="text"/>
</div>
<div class="flex items-center gap-2">
<button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
</button>
<div class="w-8 h-8 rounded-full overflow-hidden ml-2 ring-2 ring-primary/20">
<img alt="User Profile Avatar" class="w-full h-full object-cover" data-alt="portrait of a professional male industrial engineer wearing glasses and a clean work uniform in a modern office" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDatgu__omT88uWFq8ZSBwJ4wRpml1CGtIRMpHL2po55i2CpX4pZD7tOHp9Oqeh-7IRJuCKaNHZ7vEsQLLOc8x3TimMICLIwBvjQHNzZGxBj2x3r2Fe6n9MoNsj53NUmMByTXXYvv5iGLZfSQZUM5mo6Z2svVgUqpAabKmw-YjjxugeyKxpK9uTTPBzLa2pz5Tqe0wovhTslPfGR04IsIdXvHYj1I5iONOz_ZXn_vYh6LfMHk4S3v2VpG-v0Ixthl0teswJvGCrXN0"/>
</div>
</div>
</div>
</header>
<!-- Editorial Content Grid -->
<div class="p-8 space-y-8 max-w-[1600px] mx-auto">
<!-- Hero Performance Header -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
<div class="lg:col-span-8">
<h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter leading-none mb-4 text-stone-900">ANNUAL<br/><span class="text-primary italic">PERFORMANCE</span></h2>
<p class="max-w-xl text-stone-500 leading-relaxed font-body">Fiscal Year 2024 industrial output analysis. High-precision telemetry reflecting a 12.4% increase in heavy machinery turnover and regional market penetration across North American territories.</p>
</div>
<div class="lg:col-span-4 flex flex-col items-end gap-2">
<div class="flex items-baseline gap-2">
<span class="text-xs font-bold text-stone-400 uppercase tracking-widest">Total Revenue</span>
<span class="text-4xl font-bold font-headline">$482.9M</span>
</div>
<div class="flex gap-4">
<div class="bg-primary-container/20 px-4 py-2 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">trending_up</span>
<span class="text-[10px] font-black uppercase tracking-widest text-primary">+12.4% YOY</span>
</div>
<div class="bg-surface-container-high px-4 py-2 flex items-center gap-2">
<span class="text-[10px] font-black uppercase tracking-widest text-stone-500">Q4 PROJECTION: $142M</span>
</div>
</div>
</div>
</section>
<!-- Filters Bar (Precision Actuators) -->
<div class="flex flex-wrap items-center gap-4 py-4 border-y border-stone-200">
<div class="flex items-center gap-3 bg-surface-container-lowest p-1 shadow-sm">
<button class="px-4 py-2 text-[10px] font-bold tracking-widest uppercase bg-primary text-on-primary">All Time</button>
<button class="px-4 py-2 text-[10px] font-bold tracking-widest uppercase text-stone-400 hover:text-stone-900">Yearly</button>
<button class="px-4 py-2 text-[10px] font-bold tracking-widest uppercase text-stone-400 hover:text-stone-900">Monthly</button>
</div>
<div class="h-8 w-[1px] bg-stone-200 mx-2"></div>
<div class="flex items-center gap-3">
<select class="bg-surface-container-high border-none text-[10px] font-bold uppercase tracking-widest py-2 pl-4 pr-10 focus:ring-2 focus:ring-primary">
<option>Global Sales Reps</option>
<option>Alexander Forge</option>
<option>Marcus Sterling</option>
</select>
<select class="bg-surface-container-high border-none text-[10px] font-bold uppercase tracking-widest py-2 pl-4 pr-10 focus:ring-2 focus:ring-primary">
<option>Product Category</option>
<option>Turbines</option>
<option>Hydraulics</option>
</select>
</div>
<div class="ml-auto flex items-center gap-2">
<span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Active Filters: 02</span>
<button class="text-[10px] font-bold text-primary uppercase tracking-widest border-b border-primary hover:border-b-2">Clear All</button>
</div>
</div>
<!-- Dashboard Layout (Bento Grid) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Chart: Monthly Trends -->
<div class="md:col-span-2 lg:col-span-3 bg-surface-container-lowest p-8 relative overflow-hidden flex flex-col justify-between">
<div>
<h3 class="text-xl font-bold uppercase tracking-tight mb-2">Revenue Pulse</h3>
<p class="text-xs text-stone-500 uppercase tracking-widest mb-8">Monthly Sales Velocity / USD Millions</p>
</div>
<!-- SVG Chart Placeholder (Simplified for logic) -->
<div class="h-64 w-full flex items-end gap-2 px-4">
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 40%;">
<div class="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 text-[10px] font-bold bg-on-surface text-surface px-2 py-1 transition-opacity">JAN: 32M</div>
</div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 55%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 45%;"></div>
<div class="flex-1 bg-stone-200 group relative hover:bg-primary-container transition-colors" style="height: 70%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 60%;"></div>
<div class="flex-1 bg-primary group relative hover:bg-primary transition-colors" style="height: 85%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 50%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 65%;"></div>
<div class="flex-1 bg-stone-200 group relative hover:bg-primary-container transition-colors" style="height: 75%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 80%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 90%;"></div>
<div class="flex-1 bg-stone-100 group relative hover:bg-primary-container transition-colors" style="height: 95%;"></div>
</div>
<div class="flex justify-between mt-4 px-4 text-[10px] font-bold text-stone-400 uppercase tracking-widest">
<span>Jan</span><span>Mar</span><span>May</span><span>Jul</span><span>Sep</span><span>Nov</span>
</div>
</div>
<!-- Top Products Ranking -->
<div class="lg:col-span-1 bg-surface-container-high p-8 flex flex-col">
<h3 class="text-xl font-bold uppercase tracking-tight mb-6">Top Engines</h3>
<div class="space-y-6 flex-grow">
<div class="flex items-center gap-4">
<span class="text-3xl font-black text-primary/30">01</span>
<div>
<h4 class="text-xs font-black uppercase tracking-widest">V12 Core-X Turbine</h4>
<p class="text-[10px] text-stone-500 font-bold">$124.2M Rev.</p>
</div>
</div>
<div class="flex items-center gap-4">
<span class="text-3xl font-black text-stone-300">02</span>
<div>
<h4 class="text-xs font-black uppercase tracking-widest">Hydra-Flow P6</h4>
<p class="text-[10px] text-stone-500 font-bold">$98.5M Rev.</p>
</div>
</div>
<div class="flex items-center gap-4">
<span class="text-3xl font-black text-stone-300">03</span>
<div>
<h4 class="text-xs font-black uppercase tracking-widest">Apex Gear-Shift 4</h4>
<p class="text-[10px] text-stone-500 font-bold">$76.1M Rev.</p>
</div>
</div>
<div class="flex items-center gap-4">
<span class="text-3xl font-black text-stone-300">04</span>
<div>
<h4 class="text-xs font-black uppercase tracking-widest">Nano-Lubricant 500</h4>
<p class="text-[10px] text-stone-500 font-bold">$42.8M Rev.</p>
</div>
</div>
</div>
<button class="mt-8 text-[10px] font-black uppercase tracking-[0.2em] text-primary border-b-2 border-primary w-fit">VIEW FULL INVENTORY</button>
</div>
<!-- Geographical Card -->
<div class="lg:col-span-2 bg-stone-900 text-stone-50 p-8 relative overflow-hidden group">
<div class="relative z-10">
<h3 class="text-xl font-bold uppercase tracking-tight mb-2">Regional Density</h3>
<p class="text-[10px] text-lime-400 font-bold uppercase tracking-[0.2em] mb-6">Primary Hub: Chicago, IL</p>
<div class="grid grid-cols-2 gap-4">
<div class="bg-stone-800/50 p-4 border-l-2 border-lime-500">
<p class="text-[10px] text-stone-400 uppercase font-black">Americas</p>
<p class="text-2xl font-bold">$212M</p>
</div>
<div class="bg-stone-800/50 p-4">
<p class="text-[10px] text-stone-400 uppercase font-black">EMEA</p>
<p class="text-2xl font-bold">$148M</p>
</div>
<div class="bg-stone-800/50 p-4">
<p class="text-[10px] text-stone-400 uppercase font-black">APAC</p>
<p class="text-2xl font-bold">$92M</p>
</div>
<div class="bg-stone-800/50 p-4">
<p class="text-[10px] text-stone-400 uppercase font-black">Other</p>
<p class="text-2xl font-bold">$30M</p>
</div>
</div>
</div>
<!-- Abstract Background Map Texture -->
<div class="absolute right-[-10%] top-[-10%] opacity-20 pointer-events-none group-hover:scale-110 transition-transform duration-1000">
<img alt="Map Data Distribution" class="w-96 h-96 object-cover grayscale brightness-150" data-alt="abstract schematic map of global trade routes with glowing cyan connections on a dark industrial background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDz54wfhWAM554GYhoIIkjWPvSi3_EHvDNGYd62uoXSXJc7HK2980_KazfDpoqj16vi8h__1JoN18tSMsclZ0eUdlBaU5Oa2MNhPM68GkakFzpuLqwIeGw9-z-ZpsuRwIL-83uXwdGIynDuVvOBioIe5I2Gdt6jIDghIWVQOURoT5ekWZL6JhDlfh3II4t0amhvSa47SPFa0lk8KRkLrA7YJ9HLFTs2CZ9edvfo0weIUJg1r2R3YFAjAPAUfudSHtFlwWLPwEvceHk"/>
</div>
</div>
<!-- Sales Rep Spotlight -->
<div class="lg:col-span-2 bg-primary p-8 text-on-primary flex flex-col justify-between">
<div class="flex justify-between items-start">
<div>
<h3 class="text-xl font-bold uppercase tracking-tight">Top Performer</h3>
<p class="text-xs font-bold uppercase tracking-widest opacity-80">Q3 Sales Leader</p>
</div>
<span class="material-symbols-outlined text-4xl" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<div class="flex items-center gap-6 mt-8">
<img alt="Top Sales Rep" class="w-20 h-20 object-cover rounded-full border-4 border-on-primary/20 shadow-xl" data-alt="close-up portrait of a confident middle-aged businesswoman in a sharp black suit with industrial office setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtxE9W0zkODwQT3mjcng04hwnJdgwkB6Oj0GTCjb524uL9b4bgw3r37IJFRLmvJaOby0OZfoqQ8E-o1F2f4bk1JcvahMYQYupwXFz0ti8PZFfbtjhku0kF_nZufrhBf7MQn5ibNM8BQ-b3SClEsgvt8pw1WXUc7UWLcueBovj-FVywTZvnKBwxgSumh5AF-FQI-pZrhxi9h2NaQsG2-GJP1I58nUHpsKWrW-KXvmr5cLuIIiG2PXdrqAw1MQmGJm8evjqnCuMYnLg"/>
<div>
<h4 class="text-2xl font-black uppercase tracking-tighter">ELARA VANCE</h4>
<p class="text-xs font-bold uppercase tracking-widest">Senior Accounts Executive</p>
</div>
</div>
<div class="grid grid-cols-3 gap-4 mt-8 border-t border-on-primary/20 pt-6">
<div>
<p class="text-[10px] font-bold uppercase tracking-widest opacity-70">Closed</p>
<p class="text-lg font-bold">$12.4M</p>
</div>
<div>
<p class="text-[10px] font-bold uppercase tracking-widest opacity-70">Pipeline</p>
<p class="text-lg font-bold">$4.8M</p>
</div>
<div>
<p class="text-[10px] font-bold uppercase tracking-widest opacity-70">Win Rate</p>
<p class="text-lg font-bold">84%</p>
</div>
</div>
</div>
</div>
<!-- High-Density Data Table (The "Technical Specification" Table) -->
<section class="bg-surface-container-lowest overflow-hidden">
<div class="px-8 py-6 flex justify-between items-center border-b border-stone-100">
<div>
<h3 class="text-xl font-bold uppercase tracking-tight">TRANSACTION LOG</h3>
<p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest">Detailed Transaction Telemetry / Real-time Sync</p>
</div>
<div class="flex gap-2">
<button class="bg-stone-100 p-2 hover:bg-stone-200 transition-colors">
<span class="material-symbols-outlined text-stone-500">filter_list</span>
</button>
<button class="bg-stone-100 p-2 hover:bg-stone-200 transition-colors">
<span class="material-symbols-outlined text-stone-500">file_download</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-[10px] font-black uppercase tracking-widest text-stone-500">
<th class="px-8 py-4">Transaction ID</th>
<th class="px-8 py-4">Customer Entity</th>
<th class="px-8 py-4">Product Line</th>
<th class="px-8 py-4">Sales Rep</th>
<th class="px-8 py-4">Date Stamp</th>
<th class="px-8 py-4 text-right">Revenue (USD)</th>
<th class="px-8 py-4 text-center">Status</th>
</tr>
</thead>
<tbody class="text-xs font-['Inter'] font-semibold">
<tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-5 text-stone-400">#FT-882109</td>
<td class="px-8 py-5">General Dynamics Corp</td>
<td class="px-8 py-5">V12 Core-X</td>
<td class="px-8 py-5">Elara Vance</td>
<td class="px-8 py-5">OCT 12, 2024</td>
<td class="px-8 py-5 text-right font-bold">$1,240,000.00</td>
<td class="px-8 py-5 text-center">
<span class="bg-lime-100 text-lime-700 px-2 py-1 text-[9px] font-black uppercase">Settled</span>
</td>
</tr>
<tr class="border-b border-stone-50 bg-stone-50/20 hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-5 text-stone-400">#FT-882110</td>
<td class="px-8 py-5">Boeing Industrial</td>
<td class="px-8 py-5">Hydra-Flow P6</td>
<td class="px-8 py-5">Marcus Sterling</td>
<td class="px-8 py-5">OCT 11, 2024</td>
<td class="px-8 py-5 text-right font-bold">$845,200.00</td>
<td class="px-8 py-5 text-center">
<span class="bg-lime-100 text-lime-700 px-2 py-1 text-[9px] font-black uppercase">Settled</span>
</td>
</tr>
<tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-5 text-stone-400">#FT-882111</td>
<td class="px-8 py-5">SpaceX Heavy Fab</td>
<td class="px-8 py-5">Apex Gear-Shift 4</td>
<td class="px-8 py-5">Alexander Forge</td>
<td class="px-8 py-5">OCT 10, 2024</td>
<td class="px-8 py-5 text-right font-bold">$2,100,500.00</td>
<td class="px-8 py-5 text-center">
<span class="bg-amber-100 text-amber-700 px-2 py-1 text-[9px] font-black uppercase">Pending</span>
</td>
</tr>
<tr class="border-b border-stone-50 bg-stone-50/20 hover:bg-stone-50/50 transition-colors">
<td class="px-8 py-5 text-stone-400">#FT-882112</td>
<td class="px-8 py-5">Tesla Gigafactory</td>
<td class="px-8 py-5">Nano-Lubricant 500</td>
<td class="px-8 py-5">Elara Vance</td>
<td class="px-8 py-5">OCT 09, 2024</td>
<td class="px-8 py-5 text-right font-bold">$312,000.00</td>
<td class="px-8 py-5 text-center">
<span class="bg-lime-100 text-lime-700 px-2 py-1 text-[9px] font-black uppercase">Settled</span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-4 bg-surface-container-low flex justify-between items-center">
<span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Showing 4 of 2,841 Entries</span>
<div class="flex gap-1">
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-stone-200 text-stone-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center bg-primary text-on-primary font-bold text-[10px]">1</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-stone-200 text-stone-600 font-bold text-[10px] hover:bg-stone-100 transition-colors">2</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-stone-200 text-stone-600 font-bold text-[10px] hover:bg-stone-100 transition-colors">3</button>
<button class="w-8 h-8 flex items-center justify-center bg-surface-container-lowest border border-stone-200 text-stone-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
</section>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/reportes-ventas.js"></script>
@endpush
