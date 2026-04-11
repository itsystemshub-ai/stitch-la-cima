@extends('layouts.erp')

@section('title', 'LA CIMA - ADMIN FORGE v2.4 | DB MANAGEMENT | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/base-datos.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="ml-64 mt-16 p-8 min-h-screen">
<!-- Dashboard Header -->
<div class="flex justify-between items-end mb-10">
<div>
<div class="flex items-center gap-3 mb-2">
<span class="px-2 py-0.5 bg-primary-container text-on-primary-container text-[10px] font-bold font-headline tracking-tighter uppercase">Cluster Alpha-9</span>
<span class="text-stone-400 text-xs font-headline">/ ROOT / DATABASE / MANAGEMENT</span>
</div>
<h2 class="text-5xl font-headline font-extrabold uppercase tracking-tighter text-on-surface">DB Engine Forge</h2>
</div>
<div class="flex gap-4">
<button class="bg-surface-container-high hover:bg-surface-container-highest px-6 py-3 font-headline text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm">upload_file</span> Schema Migrations
                </button>
<button class="bg-primary text-on-primary hover:opacity-90 px-6 py-3 font-headline text-xs font-bold uppercase tracking-widest flex items-center gap-2 transition-all">
<span class="material-symbols-outlined text-sm">backup</span> Global Backup
                </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6">
<!-- Quick Stats & Integrity -->
<div class="col-span-12 lg:col-span-4 grid grid-cols-1 gap-6">
<!-- Database Health Card -->
<div class="bg-surface-container-lowest p-6 flex flex-col justify-between group">
<div class="flex justify-between items-start mb-8">
<div>
<h3 class="text-xs font-headline text-secondary uppercase tracking-[0.2em] mb-1">Engine Integrity</h3>
<p class="text-3xl font-headline font-bold text-primary tracking-tighter">99.98%</p>
</div>
<span class="material-symbols-outlined text-lime-500 text-3xl group-hover:scale-110 transition-transform">verified</span>
</div>
<div class="space-y-3">
<div class="flex justify-between items-center text-xs">
<span class="text-stone-500 font-label uppercase">Referential Checks</span>
<span class="text-on-surface font-bold">1,204 PASSED</span>
</div>
<div class="w-full bg-surface-container h-1.5 overflow-hidden">
<div class="bg-primary h-full w-[99%]"></div>
</div>
<div class="flex justify-between items-center text-xs pt-1">
<span class="text-stone-500 font-label uppercase">Foreign Key Orphans</span>
<span class="text-error font-bold">0 DETECTED</span>
</div>
</div>
</div>
<!-- Database Specs -->
<div class="bg-stone-900 text-white p-6 relative overflow-hidden">
<div class="relative z-10">
<h3 class="text-xs font-headline text-stone-500 uppercase tracking-[0.2em] mb-6">Environment Metadata</h3>
<div class="space-y-4">
<div class="flex flex-col">
<span class="text-[10px] text-lime-400 font-headline tracking-widest mb-1 uppercase">PostgreSQL Core</span>
<span class="text-lg code-font text-stone-100">v15.3.0_build82</span>
</div>
<div class="flex flex-col">
<span class="text-[10px] text-lime-400 font-headline tracking-widest mb-1 uppercase">Total Dimensions</span>
<span class="text-lg code-font text-stone-100">42 Tables / 18 Viewports</span>
</div>
<div class="flex flex-col">
<span class="text-[10px] text-lime-400 font-headline tracking-widest mb-1 uppercase">Storage Footprint</span>
<span class="text-lg code-font text-stone-100">1.84 GB</span>
</div>
</div>
</div>
<div class="absolute -right-10 -bottom-10 opacity-10">
<span class="material-symbols-outlined text-[160px]">storage</span>
</div>
</div>
</div>
<!-- Main Table Explorer -->
<div class="col-span-12 lg:col-span-8">
<div class="bg-surface-container-lowest h-full flex flex-col">
<div class="p-6 border-b border-surface-container flex justify-between items-center bg-surface-container-low">
<div class="flex items-center gap-4">
<h3 class="text-sm font-headline font-black uppercase tracking-widest">Active Schema Tables</h3>
<div class="flex items-center gap-2 bg-white px-3 py-1 text-xs border border-surface-container">
<span class="material-symbols-outlined text-sm text-stone-400">search</span>
<input class="border-none focus:ring-0 p-0 text-xs font-headline tracking-wider placeholder:text-stone-300 w-32" placeholder="FILTER BY NAME..." type="text"/>
</div>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-white transition-colors" title="Export JSON">
<span class="material-symbols-outlined text-lg">download</span>
</button>
<button class="p-2 hover:bg-white transition-colors" title="Visual Query Builder">
<span class="material-symbols-outlined text-lg">schema</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-surface-container">
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Table Name</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Fields</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Rows</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Last Sync</th>
<th class="px-6 py-4 font-headline text-[10px] font-bold uppercase tracking-widest text-stone-500">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">usuarios</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">id, user_uuid, auth_hash, last_ip</td>
<td class="px-6 py-4 code-font text-xs">842</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">2m ago</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-lime-100 text-lime-700 uppercase">Synced</span>
</td>
</tr>
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">productos</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">sku, part_no, stock_lvl, supplier_id</td>
<td class="px-6 py-4 code-font text-xs">15,204</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">5m ago</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-lime-100 text-lime-700 uppercase">Synced</span>
</td>
</tr>
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">ventas</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">order_id, client_fk, total, tax_v</td>
<td class="px-6 py-4 code-font text-xs">128,490</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">LIVE</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-700 uppercase">Writing...</span>
</td>
</tr>
<tr class="hover:bg-primary-container/10 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-stone-400 group-hover:text-primary transition-colors">table_rows</span>
<span class="code-font text-sm font-bold">almacen_logs</span>
</div>
</td>
<td class="px-6 py-4 code-font text-xs text-stone-500">log_id, shelf_id, event_type, ts</td>
<td class="px-6 py-4 code-font text-xs">1.2M</td>
<td class="px-6 py-4 text-xs font-label text-stone-500 uppercase">12h ago</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-stone-200 text-stone-600 uppercase">Archived</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Visual Query Builder Section -->
<div class="col-span-12">
<div class="bg-surface-container-high p-1 border-t-4 border-stone-900">
<div class="grid grid-cols-12">
<!-- Query Sidebar -->
<div class="col-span-12 md:col-span-3 bg-white p-6 border-r border-surface-container">
<h4 class="text-xs font-headline font-bold uppercase tracking-widest mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-sm">settings_input_component</span> Node Selector
                            </h4>
<div class="space-y-3">
<div class="bg-surface-container-low p-3 border-l-2 border-primary">
<p class="text-[10px] text-stone-400 font-headline uppercase mb-1">Source Table</p>
<p class="code-font text-xs font-bold">ventas.main</p>
</div>
<div class="bg-surface p-3 flex items-center justify-between">
<span class="code-font text-xs">INNER JOIN</span>
<span class="material-symbols-outlined text-sm text-stone-300">link</span>
</div>
<div class="bg-surface-container-low p-3 border-l-2 border-primary-container">
<p class="text-[10px] text-stone-400 font-headline uppercase mb-1">Target Table</p>
<p class="code-font text-xs font-bold">usuarios.profile</p>
</div>
<div class="pt-6">
<button class="w-full bg-stone-900 text-white font-headline text-[10px] uppercase tracking-[0.2em] py-3 hover:bg-primary transition-colors">Execute Forge</button>
</div>
</div>
</div>
<!-- Visual Canvas -->
<div class="col-span-12 md:col-span-9 bg-surface p-8 relative min-h-[400px] overflow-hidden">
<div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 20px 20px;"></div>
<div class="flex items-center justify-center h-full relative">
<!-- Relationship Map Mockup -->
<div class="flex gap-16 items-center">
<!-- Table Node 1 -->
<div class="w-48 bg-white border border-surface-container shadow-xl">
<div class="bg-stone-900 text-white px-3 py-1 flex justify-between items-center">
<span class="code-font text-[10px] font-bold">ventas</span>
<span class="material-symbols-outlined text-xs">drag_handle</span>
</div>
<div class="p-3 space-y-2">
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-primary font-bold">id (PK)</span>
<span class="text-stone-400">INT4</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-on-surface">order_no</span>
<span class="text-stone-400">STR</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font bg-primary-container/10">
<span class="text-on-surface font-bold">client_id (FK)</span>
<span class="text-stone-400">INT4</span>
</div>
</div>
</div>
<!-- Connector Line -->
<div class="flex flex-col items-center gap-1">
<div class="h-[2px] w-16 bg-primary relative">
<div class="absolute -left-1 -top-1 w-2 h-2 bg-primary rotate-45"></div>
<div class="absolute -right-1 -top-1 w-2 h-2 bg-primary rotate-45"></div>
</div>
<span class="text-[9px] font-headline font-black bg-white px-2 border border-primary text-primary">1:N</span>
</div>
<!-- Table Node 2 -->
<div class="w-48 bg-white border border-surface-container shadow-xl">
<div class="bg-primary text-on-primary px-3 py-1 flex justify-between items-center">
<span class="code-font text-[10px] font-bold uppercase">usuarios</span>
<span class="material-symbols-outlined text-xs">drag_handle</span>
</div>
<div class="p-3 space-y-2">
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-primary font-bold">id (PK)</span>
<span class="text-stone-400">INT4</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-on-surface">full_name</span>
<span class="text-stone-400">STR</span>
</div>
<div class="flex justify-between items-center text-[10px] code-font">
<span class="text-on-surface">email</span>
<span class="text-stone-400">STR</span>
</div>
</div>
</div>
</div>
</div>
<!-- Floating Action Overlay -->
<div class="absolute bottom-6 left-6 flex gap-2">
<button class="bg-white/90 backdrop-blur px-3 py-1.5 border border-surface-container text-[10px] font-headline font-bold uppercase tracking-widest flex items-center gap-2 hover:bg-white transition-all">
<span class="material-symbols-outlined text-sm">zoom_in</span> Focus
                                </button>
<button class="bg-white/90 backdrop-blur px-3 py-1.5 border border-surface-container text-[10px] font-headline font-bold uppercase tracking-widest flex items-center gap-2 hover:bg-white transition-all">
<span class="material-symbols-outlined text-sm">auto_graph</span> Auto-Arrange
                                </button>
</div>
</div>
</div>
</div>
</div>
<!-- Backup History & Log -->
<div class="col-span-12 lg:col-span-12">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface-container-lowest p-6 border-l-4 border-lime-500">
<div class="flex justify-between items-start mb-4">
<h4 class="text-xs font-headline font-bold uppercase tracking-widest">Import/Export JSON</h4>
<span class="material-symbols-outlined text-stone-300">save_alt</span>
</div>
<div class="space-y-4">
<div class="group relative bg-surface-container p-4 overflow-hidden">
<div class="relative z-10">
<p class="text-[10px] font-headline text-stone-500 mb-1 uppercase tracking-wider">Scheduled Export</p>
<p class="text-sm code-font font-bold">db_daily_full.json</p>
<p class="text-[10px] font-label text-lime-600 mt-2">AUTO-TRIGGERED 04:00 AM</p>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-6xl text-white opacity-20 group-hover:rotate-12 transition-transform">article</span>
</div>
<button class="w-full bg-surface-container-highest hover:bg-surface-dim py-3 text-[10px] font-headline font-bold uppercase tracking-[0.2em] transition-colors">Import Schema Template</button>
</div>
</div>
<div class="md:col-span-2 bg-stone-900 p-6 text-white flex flex-col">
<div class="flex justify-between items-center mb-4">
<h4 class="text-xs font-headline font-bold uppercase tracking-widest text-lime-400">Migration Pipeline Activity</h4>
<div class="flex gap-4 text-[10px] font-headline tracking-tighter uppercase">
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-lime-500"></span> 24 Success</span>
<span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-error"></span> 0 Critical</span>
</div>
</div>
<div class="flex-grow space-y-2 overflow-y-auto max-h-48 scrollbar-hide">
<div class="flex items-center gap-4 py-2 border-b border-stone-800">
<span class="code-font text-[10px] text-stone-500">2023-10-24 14:22:01</span>
<span class="code-font text-xs text-lime-500">MIGRATE</span>
<span class="code-font text-xs">CREATE_TABLE warehouse_slots_v2</span>
<span class="ml-auto text-[10px] font-label text-stone-600">ID: #4492</span>
</div>
<div class="flex items-center gap-4 py-2 border-b border-stone-800">
<span class="code-font text-[10px] text-stone-500">2023-10-24 11:05:44</span>
<span class="code-font text-xs text-lime-500">MIGRATE</span>
<span class="code-font text-xs">ADD_COLUMN users.preferences (JSONB)</span>
<span class="ml-auto text-[10px] font-label text-stone-600">ID: #4491</span>
</div>
<div class="flex items-center gap-4 py-2 border-b border-stone-800">
<span class="code-font text-[10px] text-stone-500">2023-10-23 23:59:59</span>
<span class="code-font text-xs text-stone-400">CLEANUP</span>
<span class="code-font text-xs">VACUUM ANALYZE FULL DATABASE</span>
<span class="ml-auto text-[10px] font-label text-stone-600">ID: #4490</span>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/base-datos.js"></script>
@endpush
