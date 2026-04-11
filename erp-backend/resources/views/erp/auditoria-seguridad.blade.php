@extends('layouts.erp')

@section('title', 'auditoria-seguridad | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/auditoria-seguridad.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="ml-64 pt-16 min-h-screen">
<div class="p-8 max-w-7xl mx-auto space-y-8">
<!-- HEADER SECTION -->
<div class="relative overflow-hidden bg-stone-950 p-8 rounded-lg flex flex-col md:flex-row justify-between items-end gap-6 border-l-8 border-lime-500">
<div class="z-10">
<span class="text-lime-500 font-headline font-bold text-xs tracking-widest uppercase mb-2 block">Level 4 Authorization Required</span>
<h1 class="text-4xl font-headline font-bold text-white uppercase tracking-tighter leading-none mb-4">Security Audit &amp; Activity Logs</h1>
<p class="text-stone-400 font-body text-sm max-w-xl leading-relaxed">
                        Continuous monitoring of system-wide interactions. All cryptographic hashes and IP handshakes are recorded. Authorized access only. Unauthorized tampering triggers immediate lockout.
                    </p>
</div>
<div class="flex gap-4 z-10">
<div class="bg-stone-900 p-4 min-w-[120px]">
<span class="text-[10px] text-stone-500 font-bold uppercase block mb-1">Live Events</span>
<span class="text-2xl font-headline font-bold text-lime-400">1,204</span>
</div>
<div class="bg-stone-900 p-4 min-w-[120px]">
<span class="text-[10px] text-stone-500 font-bold uppercase block mb-1">Risk Score</span>
<span class="text-2xl font-headline font-bold text-amber-500">LOW</span>
</div>
</div>
<!-- Subtle tech background element -->
<div class="absolute right-0 top-0 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[200px] text-lime-500" data-icon="security" style="font-variation-settings: 'FILL' 1;">security</span>
</div>
</div>
<!-- SEARCH & FILTERS -->
<section class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-surface-container-low p-6 rounded-lg">
<div class="md:col-span-2 relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400" data-icon="search">search</span>
<input class="w-full bg-surface-container-lowest border-none focus:ring-2 focus:ring-primary pl-10 pr-4 py-3 font-headline text-xs tracking-widest uppercase placeholder:text-stone-400" placeholder="SEARCH LOGS BY USER, IP, OR ACTION..." type="text"/>
</div>
<div>
<select class="w-full bg-surface-container-lowest border-none focus:ring-2 focus:ring-primary py-3 font-headline text-xs tracking-widest uppercase">
<option>ALL SEVERITY</option>
<option>CRITICAL</option>
<option>WARNING</option>
<option>INFO</option>
</select>
</div>
<button class="bg-stone-950 text-white font-headline text-xs tracking-widest uppercase py-3 hover:bg-stone-800 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                    Apply Filters
                </button>
</section>
<!-- AUDIT LOG TABLE -->
<div class="bg-surface-container-lowest overflow-hidden shadow-sm">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-900 text-stone-400 font-headline text-[10px] tracking-widest uppercase">
<th class="px-6 py-4 font-bold">Timestamp / Auth ID</th>
<th class="px-6 py-4 font-bold">User Identity</th>
<th class="px-6 py-4 font-bold">Network Vector</th>
<th class="px-6 py-4 font-bold">System Action</th>
<th class="px-6 py-4 font-bold">Payload Delta (JSON)</th>
<th class="px-6 py-4 font-bold text-right">Status</th>
</tr>
</thead>
<tbody class="font-body text-sm">
<!-- Row 1 -->
<tr class="border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="font-bold text-stone-900">2023-10-24 14:22:01</span>
<span class="text-[10px] text-stone-500 font-mono tracking-tighter uppercase">AUTH_X99_221</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="h-8 w-8 bg-primary-container/20 flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-sm" data-icon="person">person</span>
</div>
<div class="flex flex-col">
<span class="font-bold">admin.valencia</span>
<span class="text-[10px] text-stone-500 uppercase">Superuser</span>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="mask-encrypted text-xs font-mono bg-stone-100 px-2 py-1 rounded">192.168.***.***</span>
</td>
<td class="px-6 py-5">
<span class="font-headline text-xs font-bold tracking-tight bg-stone-950 text-lime-400 px-2 py-1 uppercase">LOGIN_SUCCESS</span>
</td>
<td class="px-6 py-5">
<div class="bg-stone-50 p-2 rounded border-l-2 border-primary text-[10px] font-mono leading-tight max-w-[200px]">
<span class="text-stone-400">OLD:</span> null<br/>
<span class="text-stone-900 font-bold">NEW:</span> {"session_id":"S_881"}
                                    </div>
</td>
<td class="px-6 py-5 text-right">
<span class="material-symbols-outlined text-lime-600" data-icon="verified_user">verified_user</span>
</td>
</tr>
<!-- Row 2 -->
<tr class="bg-surface-container-low/30 border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="font-bold text-stone-900">2023-10-24 14:15:44</span>
<span class="text-[10px] text-stone-500 font-mono tracking-tighter uppercase">AUTH_P01_990</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="h-8 w-8 bg-error-container/20 flex items-center justify-center">
<span class="material-symbols-outlined text-error text-sm" data-icon="warning">warning</span>
</div>
<div class="flex flex-col">
<span class="font-bold">inventory.mgr</span>
<span class="text-[10px] text-stone-500 uppercase">Standard Access</span>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="mask-encrypted text-xs font-mono bg-stone-100 px-2 py-1 rounded">201.248.***.***</span>
</td>
<td class="px-6 py-5">
<span class="font-headline text-xs font-bold tracking-tight bg-error text-white px-2 py-1 uppercase">DELETE_PRODUCT</span>
</td>
<td class="px-6 py-5">
<div class="bg-stone-50 p-2 rounded border-l-2 border-error text-[10px] font-mono leading-tight max-w-[200px]">
<span class="text-stone-400">OLD:</span> {"pid":"CMA-502"}<br/>
<span class="text-stone-900 font-bold">NEW:</span> null
                                    </div>
</td>
<td class="px-6 py-5 text-right">
<span class="material-symbols-outlined text-stone-400" data-icon="visibility">visibility</span>
</td>
</tr>
<!-- Row 3 -->
<tr class="border-b border-surface-container hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5">
<div class="flex flex-col">
<span class="font-bold text-stone-900">2023-10-24 13:58:12</span>
<span class="text-[10px] text-stone-500 font-mono tracking-tighter uppercase">AUTH_X99_101</span>
</div>
</td>
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="h-8 w-8 bg-primary-container/20 flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-sm" data-icon="person">person</span>
</div>
<div class="flex flex-col">
<span class="font-bold">sys.architect</span>
<span class="text-[10px] text-stone-500 uppercase">Root</span>
</div>
</div>
</td>
<td class="px-6 py-5">
<span class="mask-encrypted text-xs font-mono bg-stone-100 px-2 py-1 rounded">LOCAL_LOOPBACK</span>
</td>
<td class="px-6 py-5">
<span class="font-headline text-xs font-bold tracking-tight bg-stone-950 text-amber-400 px-2 py-1 uppercase">CONFIG_CHANGE</span>
</td>
<td class="px-6 py-5">
<div class="bg-stone-50 p-2 rounded border-l-2 border-amber-500 text-[10px] font-mono leading-tight max-w-[200px]">
<span class="text-stone-400">OLD:</span> {"encryption":"AES128"}<br/>
<span class="text-stone-900 font-bold">NEW:</span> {"encryption":"AES256"}
                                    </div>
</td>
<td class="px-6 py-5 text-right">
<span class="material-symbols-outlined text-amber-600" data-icon="info">info</span>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Table Footer/Pagination -->
<div class="bg-stone-50 px-6 py-4 flex items-center justify-between border-t border-surface-container">
<span class="text-[10px] font-headline font-bold text-stone-500 uppercase">Showing 3 of 1,204 active audit records</span>
<div class="flex gap-2">
<button class="p-1 hover:bg-stone-200 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<div class="flex items-center gap-1">
<span class="bg-stone-950 text-white text-[10px] font-bold px-2 py-1">1</span>
<span class="text-stone-400 text-[10px] font-bold px-2 py-1">2</span>
<span class="text-stone-400 text-[10px] font-bold px-2 py-1">3</span>
</div>
<button class="p-1 hover:bg-stone-200 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- FORENSIC TOOLS -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-12">
<div class="bg-surface-container-high p-6 rounded-lg relative overflow-hidden group">
<div class="relative z-10">
<h3 class="font-headline font-bold uppercase text-xs tracking-widest mb-4">Integrity Verification</h3>
<p class="text-stone-500 text-xs mb-6">Run a cryptographic hash check against all logs to ensure no tampering has occurred.</p>
<button class="w-full bg-stone-950 text-white font-headline text-[10px] tracking-widest uppercase py-3 group-hover:bg-primary transition-colors">Run SHA-256 Hash Audit</button>
</div>
<span class="material-symbols-outlined absolute -bottom-4 -right-4 text-stone-300 opacity-20 text-7xl group-hover:text-primary-container transition-colors" data-icon="fingerprint">fingerprint</span>
</div>
<div class="bg-surface-container-high p-6 rounded-lg relative overflow-hidden group">
<div class="relative z-10">
<h3 class="font-headline font-bold uppercase text-xs tracking-widest mb-4">Export Forensics</h3>
<p class="text-stone-500 text-xs mb-6">Download activity logs in encrypted CSV or JSON formats for legal or compliance review.</p>
<div class="grid grid-cols-2 gap-2">
<button class="bg-stone-300 text-stone-700 font-headline text-[10px] font-bold uppercase py-2 hover:bg-stone-400">Download CSV</button>
<button class="bg-stone-300 text-stone-700 font-headline text-[10px] font-bold uppercase py-2 hover:bg-stone-400">Download JSON</button>
</div>
</div>
<span class="material-symbols-outlined absolute -bottom-4 -right-4 text-stone-300 opacity-20 text-7xl group-hover:text-amber-500 transition-colors" data-icon="file_download">file_download</span>
</div>
<div class="bg-stone-950 p-6 rounded-lg relative overflow-hidden">
<h3 class="font-headline font-bold uppercase text-xs tracking-widest text-lime-400 mb-4">IP Blocklist Status</h3>
<div class="space-y-3">
<div class="flex justify-between items-center text-[10px] font-headline uppercase">
<span class="text-stone-400">Active Blocks</span>
<span class="text-white">42 Nodes</span>
</div>
<div class="w-full bg-stone-800 h-1">
<div class="bg-lime-500 h-full w-[42%]"></div>
</div>
<div class="flex justify-between items-center text-[10px] font-headline uppercase">
<span class="text-stone-400">Last Synced</span>
<span class="text-white">3 mins ago</span>
</div>
<button class="w-full mt-4 text-lime-500 text-[10px] font-bold uppercase underline underline-offset-4 hover:text-white transition-colors">Manage Global Blocklist</button>
</div>
</div>
</section>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/auditoria-seguridad.js"></script>
@endpush
