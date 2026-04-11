@extends('layouts.erp')

@section('title', 'TITAN ENGINE ERP - Customer Management | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/clientes.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="ml-64 pt-16 min-h-screen bg-stone-950">
<div class="p-8 max-w-7xl mx-auto">
<!-- Hero Header -->
<div class="mb-12 flex justify-between items-end">
<div>
<h1 class="font-headline text-5xl font-extrabold uppercase tracking-tighter text-white leading-none">Customer <span class="text-lime-500">Registry</span></h1>
<p class="text-stone-500 font-mono text-xs mt-4 tracking-widest uppercase">System Core: Engine_Module_v4.02 // B2B Management</p>
</div>
<div class="flex gap-4">
<div class="bg-stone-900 p-4 border-l-2 border-lime-500">
<p class="text-[10px] text-stone-500 uppercase font-bold tracking-widest">Active Accounts</p>
<p class="text-2xl font-headline font-bold text-white">1,429</p>
</div>
<div class="bg-stone-900 p-4 border-l-2 border-stone-700">
<p class="text-[10px] text-stone-500 uppercase font-bold tracking-widest">Retention Ratio</p>
<p class="text-2xl font-headline font-bold text-white">42%</p>
</div>
</div>
</div>
<!-- Bento Layout Content -->
<div class="grid grid-cols-12 gap-6">
<!-- Registration Form - Left Column -->
<div class="col-span-12 lg:col-span-5">
<div class="bg-stone-900 p-8 relative overflow-hidden">
<div class="absolute top-0 right-0 p-4 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-8xl">precision_manufacturing</span>
</div>
<h3 class="font-headline text-xl font-bold uppercase text-white mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-lime-500">person_add</span>
                            Modify Database
                        </h3>
<form class="space-y-6">
<div class="space-y-1">
<label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Full Corporate Name</label>
<input class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-lime-500 p-3 text-sm font-medium" placeholder="E.G. TRANSPORTES VALENCIA C.A." type="text"/>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="space-y-1">
<label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">RIF / Tax ID</label>
<input class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-lime-500 p-3 text-sm font-medium" placeholder="J-12345678-9" type="text"/>
</div>
<div class="space-y-1">
<label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Contact Number</label>
<input class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-lime-500 p-3 text-sm font-medium" placeholder="+58 241-0000" type="text"/>
</div>
</div>
<div class="space-y-1">
<label class="text-[10px] font-bold text-stone-500 uppercase tracking-widest">Operational Address</label>
<textarea class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-lime-500 p-3 text-sm font-medium" placeholder="INDUSTRIAL ZONE II, SECTOR 4..." rows="2"></textarea>
</div>
<!-- Retention Toggles -->
<div class="bg-stone-950 p-6 space-y-4">
<p class="text-[10px] font-bold text-lime-500 uppercase tracking-[0.2em] mb-2">Tax Retention Configuration</p>
<div class="flex items-center justify-between">
<div>
<p class="text-sm font-bold text-white uppercase tracking-tight">Retention Agent</p>
<p class="text-[10px] text-stone-500 uppercase">Global status for Seniat regulations</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-11 h-6 bg-stone-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-lime-600"></div>
</label>
</div>
<div class="h-[1px] bg-stone-800"></div>
<div class="flex items-center justify-between">
<span class="text-xs font-bold text-stone-300 uppercase">VAT / IVA Retention</span>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-10 h-5 bg-stone-800 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-stone-400 after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-lime-500 peer-checked:after:bg-stone-950"></div>
</label>
</div>
<div class="flex items-center justify-between">
<span class="text-xs font-bold text-stone-300 uppercase">ISLR Retention</span>
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox" value=""/>
<div class="w-10 h-5 bg-stone-800 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-stone-400 after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-lime-500 peer-checked:after:bg-stone-950"></div>
</label>
</div>
</div>
<div class="flex gap-4">
<button class="flex-1 border border-stone-700 text-stone-400 font-bold py-3 text-xs tracking-widest hover:bg-stone-800 transition-colors uppercase" type="reset">Discard Changes</button>
<button class="flex-1 bg-lime-500 text-stone-950 font-black py-3 text-xs tracking-widest hover:bg-lime-400 transition-colors uppercase" type="submit">Execute Update</button>
</div>
</form>
</div>
</div>
<!-- Customer List - Right Column -->
<div class="col-span-12 lg:col-span-7 flex flex-col gap-6">
<!-- Search & Filter Bar -->
<div class="bg-stone-900 p-4 flex gap-4 items-center">
<div class="flex-1 flex items-center bg-stone-950 px-4 py-2">
<span class="material-symbols-outlined text-stone-500 mr-3">filter_list</span>
<input class="bg-transparent border-none focus:ring-0 text-xs font-headline uppercase tracking-widest text-stone-200 placeholder-stone-600 w-full" placeholder="FILTER BY NAME, RIF OR SECTOR..." type="text"/>
</div>
<button class="bg-stone-800 p-2 text-stone-400 hover:text-white">
<span class="material-symbols-outlined">download</span>
</button>
</div>
<!-- Customer Cards List -->
<div class="space-y-4">
<!-- Card 1 -->
<div class="bg-stone-900 border-l-4 border-lime-500 group hover:bg-stone-800 transition-colors p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
<div class="flex-1">
<div class="flex items-center gap-3 mb-1">
<h4 class="text-lg font-bold text-white uppercase font-headline leading-none">Transporte Carabobo</h4>
<span class="bg-lime-500/10 text-lime-500 text-[9px] font-black px-2 py-0.5 tracking-tighter uppercase">Retention Agent</span>
</div>
<div class="flex flex-wrap gap-4 text-xs text-stone-500 font-medium">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">id_card</span> J-30492834-0</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">location_on</span> Zona Industrial II, Valencia, Carabobo</span>
</div>
</div>
<div class="flex items-center gap-8 w-full md:w-auto">
<div class="text-right">
<p class="text-[9px] text-stone-500 uppercase font-bold tracking-widest mb-1 text-left md:text-right">Tax ID Status</p>
<div class="flex gap-2">
<div class="flex flex-col items-center">
<span class="text-[10px] font-bold text-lime-500 mb-1">IVA</span>
<div class="w-6 h-1 bg-lime-500"></div>
</div>
<div class="flex flex-col items-center">
<span class="text-[10px] font-bold text-lime-500 mb-1">ISLR</span>
<div class="w-6 h-1 bg-lime-500"></div>
</div>
</div>
</div>
<div class="flex gap-2 ml-auto">
<button class="w-10 h-10 flex items-center justify-center bg-stone-950 text-stone-400 hover:text-lime-500 hover:bg-stone-900 transition-all">
<span class="material-symbols-outlined">edit</span>
</button>
<button class="w-10 h-10 flex items-center justify-center bg-stone-950 text-stone-400 hover:text-white hover:bg-stone-900 transition-all">
<span class="material-symbols-outlined">history</span>
</button>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="bg-stone-900 border-l-4 border-stone-700 group hover:bg-stone-800 transition-colors p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
<div class="flex-1">
<div class="flex items-center gap-3 mb-1">
<h4 class="text-lg font-bold text-white uppercase font-headline leading-none">Servicio El Parral</h4>
<span class="bg-stone-800 text-stone-500 text-[9px] font-black px-2 py-0.5 tracking-tighter uppercase">Standard Entity</span>
</div>
<div class="flex flex-wrap gap-4 text-xs text-stone-500 font-medium">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">id_card</span> J-41223945-2</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">location_on</span> Calle 114, Altos del Parral, Valencia</span>
</div>
</div>
<div class="flex items-center gap-8 w-full md:w-auto">
<div class="text-right">
<p class="text-[9px] text-stone-500 uppercase font-bold tracking-widest mb-1 text-left md:text-right">Tax ID Status</p>
<div class="flex gap-2">
<div class="flex flex-col items-center">
<span class="text-[10px] font-bold text-stone-700 mb-1">IVA</span>
<div class="w-6 h-1 bg-stone-700"></div>
</div>
<div class="flex flex-col items-center">
<span class="text-[10px] font-bold text-stone-700 mb-1">ISLR</span>
<div class="w-6 h-1 bg-stone-700"></div>
</div>
</div>
</div>
<div class="flex gap-2 ml-auto">
<button class="w-10 h-10 flex items-center justify-center bg-stone-950 text-stone-400 hover:text-lime-500 hover:bg-stone-900 transition-all">
<span class="material-symbols-outlined">edit</span>
</button>
<button class="w-10 h-10 flex items-center justify-center bg-stone-950 text-stone-400 hover:text-white hover:bg-stone-900 transition-all">
<span class="material-symbols-outlined">history</span>
</button>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-stone-900 border-l-4 border-lime-500 group hover:bg-stone-800 transition-colors p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
<div class="flex-1">
<div class="flex items-center gap-3 mb-1">
<h4 class="text-lg font-bold text-white uppercase font-headline leading-none">Inversiones Heavy Duty</h4>
<span class="bg-lime-500/10 text-lime-500 text-[9px] font-black px-2 py-0.5 tracking-tighter uppercase">Retention Agent</span>
</div>
<div class="flex flex-wrap gap-4 text-xs text-stone-500 font-medium">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">id_card</span> J-29955883-4</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">location_on</span> Av. Michelena, C.C. Industrial</span>
</div>
</div>
<div class="flex items-center gap-8 w-full md:w-auto">
<div class="text-right">
<p class="text-[9px] text-stone-500 uppercase font-bold tracking-widest mb-1 text-left md:text-right">Tax ID Status</p>
<div class="flex gap-2">
<div class="flex flex-col items-center">
<span class="text-[10px] font-bold text-lime-500 mb-1">IVA</span>
<div class="w-6 h-1 bg-lime-500"></div>
</div>
<div class="flex flex-col items-center">
<span class="text-[10px] font-bold text-stone-700 mb-1">ISLR</span>
<div class="w-6 h-1 bg-stone-700"></div>
</div>
</div>
</div>
<div class="flex gap-2 ml-auto">
<button class="w-10 h-10 flex items-center justify-center bg-stone-950 text-stone-400 hover:text-lime-500 hover:bg-stone-900 transition-all">
<span class="material-symbols-outlined">edit</span>
</button>
<button class="w-10 h-10 flex items-center justify-center bg-stone-950 text-stone-400 hover:text-white hover:bg-stone-900 transition-all">
<span class="material-symbols-outlined">history</span>
</button>
</div>
</div>
</div>
</div>
<!-- Bottom Stats / Information Layer -->
<div class="mt-auto grid grid-cols-2 gap-4">
<div class="bg-stone-900 p-6 flex items-center gap-4">
<div class="w-12 h-12 bg-lime-500/10 flex items-center justify-center">
<span class="material-symbols-outlined text-lime-500">verified</span>
</div>
<div>
<p class="text-[10px] text-stone-500 uppercase font-bold tracking-widest">Database Sync</p>
<p class="text-sm font-bold text-white uppercase">Last verified: 02m ago</p>
</div>
</div>
<div class="bg-stone-900 p-6 flex items-center gap-4">
<div class="w-12 h-12 bg-stone-800 flex items-center justify-center">
<span class="material-symbols-outlined text-stone-400">gavel</span>
</div>
<div>
<p class="text-[10px] text-stone-500 uppercase font-bold tracking-widest">Compliance Status</p>
<p class="text-sm font-bold text-white uppercase">100% Tax Compliant</p>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/clientes.js"></script>
@endpush
