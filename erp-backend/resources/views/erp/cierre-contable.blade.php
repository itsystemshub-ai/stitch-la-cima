@extends('layouts.erp')

@section('title', 'Fiscal Closing &amp; Tax Summary - TITAN ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/cierre-contable.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="md:ml-64 pt-24 pb-12 px-8 min-h-screen">
<header class="mb-10 relative">
<div class="absolute -left-8 top-0 w-1 h-16 bg-primary"></div>
<p class="text-primary font-label text-xs font-bold tracking-widest uppercase mb-1">Module: FISCAL_CLOSURE_v4</p>
<h1 class="text-on-background font-headline text-5xl font-bold uppercase tracking-tighter leading-none">Fiscal Closing &amp; <br/><span class="text-primary">Tax Summary</span></h1>
<div class="mt-4 flex gap-4 items-center">
<span class="bg-surface-container-highest px-3 py-1 text-[10px] font-bold tracking-widest uppercase">PERIOD: DEC 2023</span>
<span class="bg-primary/10 text-primary border border-primary/20 px-3 py-1 text-[10px] font-bold tracking-widest uppercase flex items-center gap-2">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span> IN PROGRESS
                </span>
</div>
</header>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6 items-stretch">
<!-- Left Column: Reconciliations & Inventory -->
<div class="col-span-12 lg:col-span-7 space-y-6">
<!-- Pending Reconciliations Card -->
<section class="bg-surface-container-lowest p-8 relative overflow-hidden group">
<div class="absolute top-0 right-0 w-24 h-24 bg-surface-container-low -mr-12 -mt-12 rotate-45 transition-transform group-hover:scale-110"></div>
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-primary" data-icon="account_balance_wallet">account_balance_wallet</span>
<h3 class="font-headline text-xl font-bold uppercase tracking-tight">Pending Reconciliations</h3>
</div>
<div class="space-y-6">
<div class="flex items-start justify-between bg-surface-container-low p-4 relative">
<div class="absolute left-0 top-0 h-full w-1 bg-primary"></div>
<div>
<p class="font-label text-xs font-bold text-secondary uppercase tracking-widest mb-1">Bank vs Ledger</p>
<p class="font-headline text-2xl font-bold">$14,203.45 <span class="text-sm font-medium text-error ml-2 uppercase tracking-normal font-body">Unmatched Variance</span></p>
</div>
<button class="bg-surface-container-highest px-4 py-2 text-[10px] font-bold tracking-widest uppercase hover:bg-primary hover:text-white transition-all">Review Details</button>
</div>
<div class="flex items-start justify-between bg-surface-container-low p-4 relative">
<div class="absolute left-0 top-0 h-full w-1 bg-secondary"></div>
<div>
<p class="font-label text-xs font-bold text-secondary uppercase tracking-widest mb-1">Inventory vs Ledger</p>
<p class="font-headline text-2xl font-bold">$2,840.10 <span class="text-sm font-medium text-primary ml-2 uppercase tracking-normal font-body">Within Margin</span></p>
</div>
<button class="bg-surface-container-highest px-4 py-2 text-[10px] font-bold tracking-widest uppercase hover:bg-primary hover:text-white transition-all">Audit Logs</button>
</div>
</div>
</section>
<!-- Status Progress -->
<section class="bg-surface-container-low p-8 border border-outline-variant/15">
<h3 class="font-headline text-xl font-bold uppercase tracking-tight mb-6">Closure Integrity Checklist</h3>
<div class="grid grid-cols-2 gap-4">
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Asset Depreciation</p>
<p class="text-sm font-bold uppercase">Finalized</p>
</div>
</div>
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Accounts Payable</p>
<p class="text-sm font-bold uppercase">Locked</p>
</div>
</div>
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Payroll Accrual</p>
<p class="text-sm font-bold uppercase">Awaiting HR</p>
</div>
</div>
<div class="bg-surface p-4 flex items-center gap-4">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
<div>
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Inter-Co. Balance</p>
<p class="text-sm font-bold uppercase">Pending Sync</p>
</div>
</div>
</div>
</section>
</div>
<!-- Right Column: Tax Provisions & Auth -->
<div class="col-span-12 lg:col-span-5 space-y-6">
<!-- Tax Provision Card -->
<section class="bg-stone-900 text-stone-100 p-8 flex flex-col justify-between min-h-[400px] relative overflow-hidden">
<div class="absolute top-0 right-0 p-4">
<span class="material-symbols-outlined text-orange-500 text-4xl opacity-20" data-icon="description">description</span>
</div>
<div>
<h3 class="font-headline text-2xl font-bold uppercase tracking-tight mb-8">Tax Provision <span class="text-orange-500">FY2023</span></h3>
<div class="space-y-8">
<div class="border-l-2 border-orange-500/50 pl-6">
<p class="text-stone-400 font-label text-[10px] font-bold uppercase tracking-widest mb-2">ISLR Calculation (34%)</p>
<p class="font-headline text-4xl font-bold text-stone-50!">$184,290.00</p>
<p class="text-stone-500 text-xs mt-1">Estimated Net Taxable Income: $542,029.41</p>
</div>
<div class="border-l-2 border-stone-700 pl-6">
<p class="text-stone-400 font-label text-[10px] font-bold uppercase tracking-widest mb-2">IVA Liquidations (NET)</p>
<p class="font-headline text-3xl font-bold text-stone-300!">$42,105.12</p>
<div class="flex gap-4 mt-2">
<span class="text-[10px] text-stone-500 uppercase">Input: $82K</span>
<span class="text-[10px] text-stone-500 uppercase">Output: $124K</span>
</div>
</div>
</div>
</div>
<div class="mt-12 pt-8 border-t border-stone-800">
<button class="w-full bg-orange-500 text-stone-950 font-bold py-4 uppercase tracking-tighter hover:bg-orange-400 transition-all active:scale-95">
                            PROVISION SETTLEMENT
                        </button>
</div>
</section>
<!-- Certification Section -->
<section class="bg-surface-container-high p-8 border-l-[8px] border-primary">
<div class="flex justify-between items-start mb-6">
<div>
<h3 class="font-headline text-lg font-bold uppercase tracking-tight">Certificate of Integrity</h3>
<p class="text-xs text-secondary mt-1">Validation Hash: 8F-22-E9-01-TITAN</p>
</div>
<span class="material-symbols-outlined text-primary text-3xl" data-icon="verified">verified</span>
</div>
<div class="space-y-4">
<div class="bg-surface-container-lowest p-4 font-mono text-[11px] leading-relaxed border border-outline-variant/30">
<p class="text-on-surface-variant italic mb-2">"I hereby certify that the financial records presented for the period ending DEC-2023 reflect the true industrial fiscal position of TITAN ERP according to International Accounting Standards..."</p>
<div class="flex justify-between items-end border-t border-dashed border-outline-variant pt-2 mt-4">
<div>
<p class="font-bold text-on-surface">DR. ELARA VANCE</p>
<p class="text-[9px] text-secondary">Chief Financial Officer</p>
</div>
<div class="text-right">
<p class="font-bold text-on-surface">SENIAT AUTH CODE</p>
<p class="text-[10px] text-primary tracking-widest">#SNT-2023-X99L-412</p>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
<!-- Analytical Overlay Section -->
<section class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-surface p-6 border-b-2 border-primary/20">
<div class="flex justify-between items-center mb-4">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">EBITDA Margin</p>
<span class="text-primary text-xs font-bold">+2.4%</span>
</div>
<div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary w-[74%]"></div>
</div>
<p class="font-headline text-xl font-bold mt-4">32.4% <span class="text-xs font-medium text-secondary">vs prev. yr</span></p>
</div>
<div class="bg-surface p-6 border-b-2 border-primary/20">
<div class="flex justify-between items-center mb-4">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Liquidity Ratio</p>
<span class="text-error text-xs font-bold">-0.1%</span>
</div>
<div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-secondary w-[62%]"></div>
</div>
<p class="font-headline text-xl font-bold mt-4">1.8 <span class="text-xs font-medium text-secondary">Quick Ratio</span></p>
</div>
<div class="bg-surface p-6 border-b-2 border-primary/20">
<div class="flex justify-between items-center mb-4">
<p class="text-[10px] font-bold text-secondary uppercase tracking-widest">Deferred Taxes</p>
<span class="text-secondary text-xs font-bold">Stable</span>
</div>
<div class="h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary-container w-[45%]"></div>
</div>
<p class="font-headline text-xl font-bold mt-4">$12,400 <span class="text-xs font-medium text-secondary">Asset value</span></p>
</div>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/cierre-contable.js"></script>
@endpush
