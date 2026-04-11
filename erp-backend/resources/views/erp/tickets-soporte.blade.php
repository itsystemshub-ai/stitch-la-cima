@extends('layouts.erp')

@section('title', 'tickets-soporte | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/tickets-soporte.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="lg:ml-64 pt-24 pb-12 px-6 md:px-10 max-w-7xl">
<!-- Header & Action Row -->
<header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<p class="text-lime-500 font-['Space_Grotesk'] font-bold uppercase tracking-widest text-xs mb-2">Technical Support Center</p>
<h1 class="text-5xl md:text-6xl font-black tracking-tighter uppercase leading-none">Ticket <span class="text-stone-500">Pipeline</span></h1>
</div>
<button class="group relative inline-flex items-center gap-3 bg-gradient-to-b from-primary to-primary-container px-8 py-4 text-on-primary font-bold uppercase tracking-tighter hover:scale-[1.02] transition-transform duration-150">
<span class="material-symbols-outlined">add_task</span>
                CREATE NEW TICKET
                <div class="absolute inset-0 border border-white/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
</button>
</header>
<!-- Metrics Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
<div class="bg-stone-900 p-6 relative overflow-hidden">
<span class="text-stone-600 font-black text-4xl absolute -right-2 -bottom-2 opacity-20">01</span>
<p class="text-xs font-bold text-stone-500 uppercase tracking-widest mb-4">Critical Pulse</p>
<div class="flex items-end gap-2">
<span class="text-4xl font-black text-error">03</span>
<span class="text-xs text-error/60 font-bold mb-2 uppercase">Active</span>
</div>
<div class="h-1 bg-stone-800 mt-4 overflow-hidden">
<div class="h-full bg-error w-[65%]"></div>
</div>
</div>
<div class="bg-stone-900 p-6 relative overflow-hidden">
<span class="text-stone-600 font-black text-4xl absolute -right-2 -bottom-2 opacity-20">02</span>
<p class="text-xs font-bold text-stone-500 uppercase tracking-widest mb-4">In Progress</p>
<div class="flex items-end gap-2">
<span class="text-4xl font-black text-lime-400">12</span>
<span class="text-xs text-lime-400/60 font-bold mb-2 uppercase">Tickets</span>
</div>
<div class="h-1 bg-stone-800 mt-4 overflow-hidden">
<div class="h-full bg-lime-400 w-[42%]"></div>
</div>
</div>
<div class="bg-stone-900 p-6 relative overflow-hidden">
<span class="text-stone-600 font-black text-4xl absolute -right-2 -bottom-2 opacity-20">03</span>
<p class="text-xs font-bold text-stone-500 uppercase tracking-widest mb-4">Response Time</p>
<div class="flex items-end gap-2">
<span class="text-4xl font-black text-white">1.2h</span>
<span class="text-xs text-stone-500 font-bold mb-2 uppercase">Avg</span>
</div>
<div class="h-1 bg-stone-800 mt-4 overflow-hidden">
<div class="h-full bg-white/40 w-[88%]"></div>
</div>
</div>
<div class="bg-stone-900 p-6 relative overflow-hidden">
<span class="text-stone-600 font-black text-4xl absolute -right-2 -bottom-2 opacity-20">04</span>
<p class="text-xs font-bold text-stone-500 uppercase tracking-widest mb-4">Resolution Rate</p>
<div class="flex items-end gap-2">
<span class="text-4xl font-black text-white">94%</span>
<span class="text-xs text-stone-500 font-bold mb-2 uppercase">Weekly</span>
</div>
<div class="h-1 bg-stone-800 mt-4 overflow-hidden">
<div class="h-full bg-lime-600 w-[94%]"></div>
</div>
</div>
</div>
<!-- Ticket Management Interface -->
<div class="bg-stone-900 overflow-hidden">
<div class="p-6 border-b border-stone-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex items-center gap-6">
<button class="text-sm font-bold uppercase tracking-widest text-lime-400 border-b-2 border-lime-400 pb-1">Active Tickets</button>
<button class="text-sm font-bold uppercase tracking-widest text-stone-500 hover:text-stone-300 transition-colors pb-1">Closed Archive</button>
</div>
<div class="flex gap-2">
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-500 text-lg">search</span>
<input class="bg-stone-800 border-none text-[10px] font-bold tracking-widest uppercase pl-10 pr-4 py-2 w-64 focus:ring-1 focus:ring-lime-500" placeholder="SEARCH ID OR MODULE..." type="text"/>
</div>
<button class="bg-stone-800 p-2 text-stone-400 hover:text-white"><span class="material-symbols-outlined">filter_list</span></button>
</div>
</div>
<!-- High-Density Ticket Table -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-800/50">
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Ticket ID</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Status</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Module / System</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Priority</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500">Last Update</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-stone-500 text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-800">
<!-- Critical Ticket -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-5">
<span class="font-['Space_Grotesk'] font-bold text-white">#TKT-4921-X</span>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-error/10 text-error text-[10px] font-black uppercase border border-error/20">
<span class="w-1.5 h-1.5 bg-error rounded-full animate-pulse"></span>
                                    Critical
                                </span>
</td>
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="text-sm font-bold text-white">Assembly Line API</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-tighter">Manufacturing Control Unit</span>
</div>
</td>
<td class="px-6 py-5">
<span class="text-error font-black uppercase text-xs">P0 - Immediate</span>
</td>
<td class="px-6 py-5 text-stone-400 text-xs font-medium">14 mins ago</td>
<td class="px-6 py-5 text-right">
<button class="text-stone-500 hover:text-white transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
<!-- In Progress Ticket -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-5">
<span class="font-['Space_Grotesk'] font-bold text-white">#TKT-4918-B</span>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-lime-500/10 text-lime-400 text-[10px] font-black uppercase border border-lime-500/20">
                                    In Progress
                                </span>
</td>
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="text-sm font-bold text-white">Global Inventory Sync</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-tighter">Warehouse Mgmt System</span>
</div>
</td>
<td class="px-6 py-5">
<span class="text-lime-500 font-black uppercase text-xs">P1 - High</span>
</td>
<td class="px-6 py-5 text-stone-400 text-xs font-medium">2.5 hours ago</td>
<td class="px-6 py-5 text-right">
<button class="text-stone-500 hover:text-white transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
<!-- Open Ticket -->
<tr class="hover:bg-stone-800/30 transition-colors">
<td class="px-6 py-5">
<span class="font-['Space_Grotesk'] font-bold text-white">#TKT-4915-A</span>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-stone-700/30 text-stone-300 text-[10px] font-black uppercase border border-stone-600/50">
                                    Open
                                </span>
</td>
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="text-sm font-bold text-white">Fleet Telemetry Delay</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-tighter">Logistics Engine</span>
</div>
</td>
<td class="px-6 py-5">
<span class="text-stone-400 font-black uppercase text-xs">P2 - Normal</span>
</td>
<td class="px-6 py-5 text-stone-400 text-xs font-medium">Yesterday</td>
<td class="px-6 py-5 text-right">
<button class="text-stone-500 hover:text-white transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
<!-- Resolved Ticket -->
<tr class="hover:bg-stone-800/30 transition-colors opacity-60">
<td class="px-6 py-5">
<span class="font-['Space_Grotesk'] font-bold text-white">#TKT-4912-F</span>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-white/10 text-white text-[10px] font-black uppercase border border-white/20">
                                    Resolved
                                </span>
</td>
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="text-sm font-bold text-white">Payroll Export Failure</span>
<span class="text-[10px] text-stone-500 font-bold uppercase tracking-tighter">Financials Core</span>
</div>
</td>
<td class="px-6 py-5">
<span class="text-stone-600 font-black uppercase text-xs">P2 - Normal</span>
</td>
<td class="px-6 py-5 text-stone-400 text-xs font-medium">2 days ago</td>
<td class="px-6 py-5 text-right">
<button class="text-stone-500 hover:text-white transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-6 border-t border-stone-800 flex items-center justify-between">
<span class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Showing 4 of 128 active cases</span>
<div class="flex gap-4">
<button class="text-xs font-bold text-stone-500 hover:text-white uppercase tracking-widest flex items-center gap-2">
<span class="material-symbols-outlined text-sm">arrow_back_ios</span> Prev
                    </button>
<button class="text-xs font-bold text-lime-400 hover:text-lime-300 uppercase tracking-widest flex items-center gap-2">
                        Next <span class="material-symbols-outlined text-sm">arrow_forward_ios</span>
</button>
</div>
</div>
</div>
<!-- Technical Advisory Block -->
<div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="p-8 bg-gradient-to-br from-stone-900 to-stone-950 border-l-4 border-lime-600">
<h3 class="text-2xl font-black uppercase tracking-tighter mb-4">System <span class="text-lime-500">Status Report</span></h3>
<p class="text-stone-400 text-sm leading-relaxed mb-6 font-medium">
                    All core ERP modules are operating within defined latency parameters. Automated diagnostic routines have been prioritized for assembly line API nodes. No scheduled maintenance for the next 48 hours.
                </p>
<div class="flex items-center gap-4">
<div class="flex items-center gap-2">
<span class="w-2 h-2 bg-lime-500 rounded-full"></span>
<span class="text-[10px] font-bold uppercase tracking-widest text-white">Database Cluster 01: UP</span>
</div>
<div class="flex items-center gap-2">
<span class="w-2 h-2 bg-lime-500 rounded-full"></span>
<span class="text-[10px] font-bold uppercase tracking-widest text-white">API Gateway: ACTIVE</span>
</div>
</div>
</div>
<div class="relative group cursor-pointer overflow-hidden">
<img alt="Technical Team" class="w-full h-full object-cover grayscale opacity-30 group-hover:grayscale-0 group-hover:opacity-60 transition-all duration-700" data-alt="industrial control room with engineers monitoring large glowing screens and high-tech equipment in a dark sleek environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC670IKTO0vUAEpfjmaOaa7jH4ILqV98Lbf7FIjlGJVyTBlRwA5nKK-9nP4LROyivK6S6RLu99naosAzgal1Ppzo59adaP1f95OvA-adwW5qFmFx2GqEPsK-R4tyikAcik_1zMZnlFfNCpska5kf-fkM0vIMu9LTUVYX5xd8Y2GhdtTd-NcdbhUqxbV9JAYBppK7vCITB6ruMxDMrpv9dMdtI6k6Uxd0kJvDNJjTdQ1e8IPt-9nQd1WB5x9DvkmxMQDXEmR8p0R2rE"/>
<div class="absolute inset-0 bg-gradient-to-t from-black to-transparent flex flex-col justify-end p-8">
<p class="text-xs font-bold text-lime-400 uppercase tracking-[0.3em] mb-1">Direct Assistance</p>
<h3 class="text-2xl font-black uppercase tracking-tighter">Contact Field Engineering</h3>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/tickets-soporte.js"></script>
@endpush
