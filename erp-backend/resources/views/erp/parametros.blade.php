@extends('layouts.erp')

@section('title', 'Global System Parameters | LA CIMA ADMIN FORGE | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/parametros.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="flex-1 overflow-y-auto p-8 space-y-8">
<!-- Page Header Section -->
<section class="relative">
<div class="absolute -left-8 top-0 h-full w-1 bg-primary"></div>
<h2 class="text-4xl font-black uppercase tracking-tighter text-on-surface font-headline">Configuración del Sistema</h2>
<p class="text-secondary uppercase text-xs tracking-[0.2em] mt-2">Engineered Precision / Global Parameters</p>
</section>
<!-- Grid Layout (Bento Style) -->
<div class="grid grid-cols-12 gap-6">
<!-- Financial Core Section (Asymmetric) -->
<div class="col-span-12 lg:col-span-8 grid grid-cols-2 gap-6">
<!-- Currency Configuration -->
<div class="col-span-2 md:col-span-1 bg-surface-container-lowest p-6 rounded-lg group transition-all hover:bg-surface-container">
<div class="flex justify-between items-start mb-6">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="currency_exchange">currency_exchange</span>
<span class="text-[10px] bg-primary-container px-2 py-0.5 font-bold text-on-primary-container rounded">LIVE</span>
</div>
<h3 class="text-lg font-bold font-headline uppercase mb-4">Currency Matrix</h3>
<div class="space-y-4">
<div class="flex items-center justify-between p-3 bg-surface-container-low rounded">
<span class="label-md text-secondary">Primary (USD)</span>
<span class="font-mono font-bold">$ 1.00</span>
</div>
<div class="flex items-center justify-between p-3 bg-surface-container-low rounded border-l-4 border-primary">
<span class="label-md text-secondary">Secondary (VES)</span>
<input class="bg-transparent border-none text-right font-mono font-bold focus:ring-0 p-0 w-24" type="text" value="36.42"/>
</div>
</div>
</div>
<!-- Tax Architecture -->
<div class="col-span-2 md:col-span-1 bg-surface-container-lowest p-6 rounded-lg group transition-all hover:bg-surface-container">
<div class="flex justify-between items-start mb-6">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="account_balance">account_balance</span>
</div>
<h3 class="text-lg font-bold font-headline uppercase mb-4">Tax Structure</h3>
<div class="space-y-4">
<div>
<label class="text-[10px] uppercase text-secondary font-bold mb-1 block">IVA General Rate</label>
<div class="flex items-center gap-2">
<input class="flex-1 bg-surface-container-highest border-none focus:ring-2 focus:ring-primary rounded p-3 text-sm font-bold" type="text" value="16.00"/>
<span class="font-bold text-primary">%</span>
</div>
</div>
<div class="flex items-center justify-between p-4 bg-surface-container-low rounded">
<span class="text-xs font-bold uppercase">Special Taxpayer (SPE)</span>
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-11 h-6 bg-secondary-container rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</div>
</div>
</div>
</div>
<!-- E-Invoicing Credentials (SENIAT) -->
<div class="col-span-2 bg-stone-900 p-8 rounded-lg text-white">
<div class="flex items-center gap-4 mb-6">
<div class="p-3 bg-lime-500 rounded-sm">
<span class="material-symbols-outlined text-black" data-icon="terminal" data-weight="fill" style="font-variation-settings: 'FILL' 1;">terminal</span>
</div>
<div>
<h3 class="text-xl font-bold font-headline uppercase leading-tight">SENIAT Auth Protocol</h3>
<p class="text-stone-500 text-[10px] uppercase tracking-widest">Electronic Invoicing Integration</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-[10px] uppercase text-stone-400 font-bold">API KEY / USERNAME</label>
<input class="w-full bg-stone-800 border-none text-lime-400 focus:ring-1 focus:ring-lime-500 rounded p-3 font-mono text-sm" type="text" value="CIMA_ADMIN_V3_PROD"/>
</div>
<div class="space-y-2">
<label class="text-[10px] uppercase text-stone-400 font-bold">Auth Certificate (P12)</label>
<div class="w-full bg-stone-800 border border-dashed border-stone-600 rounded p-3 flex justify-between items-center cursor-pointer hover:bg-stone-700 transition-colors">
<span class="text-xs text-stone-400">cima_cert_2024.p12</span>
<span class="material-symbols-outlined text-stone-500" data-icon="verified">verified</span>
</div>
</div>
</div>
</div>
</div>
<!-- Appearance & Notifications (Asymmetric Right) -->
<div class="col-span-12 lg:col-span-4 space-y-6">
<!-- Branding & Visuals -->
<div class="bg-surface-container-lowest p-6 rounded-lg">
<h3 class="text-sm font-bold font-headline uppercase mb-6 flex items-center gap-2">
<span class="w-4 h-[2px] bg-primary"></span> Visual Identity
                        </h3>
<div class="space-y-6">
<div class="flex items-center justify-between">
<span class="text-xs font-bold uppercase text-secondary">System Theme</span>
<div class="flex bg-surface-container-highest p-1 rounded-sm">
<button class="px-3 py-1 text-[10px] font-bold bg-white text-on-surface shadow-sm rounded-sm">LIGHT</button>
<button class="px-3 py-1 text-[10px] font-bold text-secondary">DARK</button>
</div>
</div>
<div>
<label class="text-[10px] uppercase text-secondary font-bold mb-3 block text-center">Company Logo Upload</label>
<div class="aspect-video bg-surface-container-low rounded-lg border-2 border-dashed border-outline-variant flex flex-col items-center justify-center group cursor-pointer hover:border-primary transition-all overflow-hidden relative">
<img alt="Company Logo placeholder" class="absolute inset-0 w-full h-full object-cover opacity-20 grayscale group-hover:opacity-40 transition-opacity" data-alt="Abstract minimalist industrial logo design with clean geometric lines in black and white on textured paper background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDoG3GNwaIxMdhYR5ORAQq4rEt0pc8B1NMLYnqGTmwRK4W78d0NuLXCDar8OIeykPGappJBJ79x6qxNcyx2xa1JePGIpyMO8yzDaRoROkfgF2dR1D6sggAg6jgML2CLfY1eTuoBIf8_ThmRbuDGzzZfmUiZ2rHWtMI-EU4cE75jgyT4S5MMpo3s6fcDvEpyiU_0KhZUSSTV3efWzTpwp_oLabbUFDRU1A3SI9eaig-OIMhhs_FySSNF6zg3fq2HsUEfHanLIqY5zOI"/>
<span class="material-symbols-outlined text-secondary group-hover:text-primary mb-2" data-icon="cloud_upload">cloud_upload</span>
<p class="text-[10px] font-bold text-secondary uppercase">Drag file or click to browse</p>
</div>
</div>
</div>
</div>
<!-- Alerts & Logic -->
<div class="bg-surface-container-lowest p-6 rounded-lg">
<h3 class="text-sm font-bold font-headline uppercase mb-6 flex items-center gap-2">
<span class="w-4 h-[2px] bg-primary"></span> Threshold Alerts
                        </h3>
<div class="space-y-4">
<div class="p-4 bg-surface-container-low rounded flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary" data-icon="inventory_2">inventory_2</span>
<div>
<p class="text-[10px] font-bold uppercase leading-none">Stock Warning</p>
<p class="text-[9px] text-secondary">Trigger at 15% levels</p>
</div>
</div>
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-8 h-4 bg-secondary-container rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-primary"></div>
</div>
</div>
<div class="p-4 bg-surface-container-low rounded flex items-center justify-between">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary" data-icon="payments">payments</span>
<div>
<p class="text-[10px] font-bold uppercase leading-none">Payroll Cut-off</p>
<p class="text-[9px] text-secondary">Notify 3 days before</p>
</div>
</div>
<div class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-8 h-4 bg-secondary-container rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-primary"></div>
</div>
</div>
</div>
<button class="w-full mt-6 bg-surface-container-highest py-3 text-[10px] font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-colors">Global Notification Log</button>
</div>
</div>
</div>
<!-- Page Footer (System & Corporate Info) -->
<footer class="mt-12 pt-8 border-t-0 bg-surface-container p-8 rounded-t-xl grid grid-cols-1 md:grid-cols-3 gap-8">
<div>
<h4 class="font-headline font-black text-sm uppercase tracking-widest mb-4">LA CIMA CORPORATE</h4>
<p class="text-xs text-secondary leading-relaxed">
                        Calle Industrial Sur, Galpón 42-B<br/>
                        Zona Industrial II, Barquisimeto<br/>
                        Estado Lara, Venezuela.
                    </p>
</div>
<div class="flex flex-col justify-center">
<p class="text-[10px] font-bold uppercase text-secondary mb-1">Tax Registry (RIF)</p>
<p class="text-xl font-headline font-bold text-on-surface">J-30568214-0</p>
</div>
<div class="flex flex-col md:items-end justify-center">
<div class="flex gap-4 mb-4">
<span class="material-symbols-outlined text-primary cursor-pointer" data-icon="language">language</span>
<span class="material-symbols-outlined text-primary cursor-pointer" data-icon="mail">mail</span>
<span class="material-symbols-outlined text-primary cursor-pointer" data-icon="call">call</span>
</div>
<p class="text-[9px] text-secondary uppercase font-bold tracking-[0.2em]">© 2024 MAYOR DE REPUESTO LA CIMA, C.A.</p>
</div>
</footer>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/parametros.js"></script>
@endpush
