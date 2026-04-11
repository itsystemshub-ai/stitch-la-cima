@extends('layouts.erp')

@section('title', 'Knowledge Base - Industrial Forge ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/base-conocimiento.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="flex-1 p-6 md:p-12 max-w-5xl">
<!-- Breadcrumbs -->
<nav class="flex items-center gap-2 mb-8 text-[10px] uppercase tracking-widest font-bold text-stone-500">
<a class="hover:text-lime-400 transition-colors" href="#">Documentation</a>
<span class="material-symbols-outlined text-[12px]">chevron_right</span>
<a class="hover:text-lime-400 transition-colors" href="#">Financial Systems</a>
<span class="material-symbols-outlined text-[12px]">chevron_right</span>
<span class="text-stone-300">Month-End Protocols</span>
</nav>
<!-- Article Header -->
<header class="relative mb-16">
<div class="absolute -left-12 top-0 h-full w-1 bg-lime-600"></div>
<div class="inline-block bg-lime-900/30 text-lime-400 text-[10px] font-black uppercase tracking-[0.2em] px-2 py-1 mb-4">Procedure FP-042</div>
<h1 class="text-5xl md:text-6xl font-black uppercase tracking-tighter leading-none mb-6">How to close a <span class="text-lime-400">fiscal month</span></h1>
<p class="text-xl text-stone-400 max-w-2xl font-light italic">Ensuring total data integrity across the ledger and sub-ledgers before technical rollover.</p>
</header>
<!-- Tech Requirements Grid -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<span class="material-symbols-outlined text-lime-500 mb-4" style="font-variation-settings: 'FILL' 1;">lock</span>
<h3 class="text-xs font-black uppercase tracking-widest text-stone-300 mb-2">Access Level</h3>
<p class="text-sm font-medium text-stone-400">Financial Administrator (Level 4)</p>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<span class="material-symbols-outlined text-lime-500 mb-4" style="font-variation-settings: 'FILL' 1;">timer</span>
<h3 class="text-xs font-black uppercase tracking-widest text-stone-300 mb-2">Est. Duration</h3>
<p class="text-sm font-medium text-stone-400">45 - 60 Minutes</p>
</div>
<div class="bg-stone-900 p-6 border-l-2 border-stone-700">
<span class="material-symbols-outlined text-lime-500 mb-4" style="font-variation-settings: 'FILL' 1;">inventory</span>
<h3 class="text-xs font-black uppercase tracking-widest text-stone-300 mb-2">Dependencies</h3>
<p class="text-sm font-medium text-stone-400">All inventory batches reconciled</p>
</div>
</section>
<!-- Step-by-Step Instructions -->
<section class="space-y-16 mb-20">
<!-- Step 1 -->
<div class="group">
<div class="flex items-baseline gap-6 mb-6">
<span class="text-4xl font-black text-stone-800 group-hover:text-lime-900 transition-colors">01</span>
<h2 class="text-2xl font-bold uppercase tracking-tight text-white">Reconcile Accounts Payable &amp; Receivable</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
<div class="space-y-4">
<p class="text-stone-400 leading-relaxed">Before initiating the lock, verify that all outstanding invoices for the current period have been matched with purchase orders. Navigate to <code class="bg-stone-800 px-1.5 py-0.5 rounded text-lime-400 font-mono text-xs">Finanzas &gt; AP &gt; Verification</code>.</p>
<ul class="space-y-3">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-lime-600 text-sm mt-1">check_circle</span>
<span class="text-sm text-stone-300">Run the Aging Report for the 30th of the current month.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-lime-600 text-sm mt-1">check_circle</span>
<span class="text-sm text-stone-300">Ensure no "Draft" status invoices remain.</span>
</li>
</ul>
</div>
<div class="bg-stone-900 rounded-sm overflow-hidden aspect-video relative">
<img alt="Financial dashboard screenshot" class="w-full h-full object-cover opacity-60 grayscale hover:grayscale-0 transition-all duration-500" data-alt="close up of a complex data dashboard on a computer screen showing financial charts and tables in a dark interface with lime accents" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmQiBxGainW39ne7cWIcOtQMLk4ovEQ34ThmmEX5RxBc4LHoGwQ1ab4Bnjh6oEuK91Z-INx06-mPAexXEjsBbRDqRy708COrwR1YMi8Lu3QKgxDiH71ars5PmSdrOi7tYgA98RigywFoc9SbU0QdkSdJgM8iKhIzCmTI0VFafw1vWR5EEHh8SIcyapOeydmLwX5G8RPomUrwhL0grVI5aSGVb3kjyWuKaqkbQYZwYMFj-NUZS2_K35BiuhoEY6bNgxBMSX8XdA7i0"/>
<div class="absolute inset-0 border border-stone-800 pointer-events-none"></div>
</div>
</div>
</div>
<!-- Step 2 -->
<div class="group">
<div class="flex items-baseline gap-6 mb-6">
<span class="text-4xl font-black text-stone-800 group-hover:text-lime-900 transition-colors">02</span>
<h2 class="text-2xl font-bold uppercase tracking-tight text-white">Inventory Valuation Snapshot</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
<div class="space-y-4">
<p class="text-stone-400 leading-relaxed">Generate the final stock valuation. The system will lock the inventory ledger for the period after this step. Any adjustments made later will be logged as 'Correction Entries' in the following month.</p>
<div class="bg-stone-900 border-l-4 border-lime-600 p-4">
<p class="text-xs font-bold uppercase text-lime-400 mb-1">PRO-TIP</p>
<p class="text-xs text-stone-300">Run the 'Dead Stock' analyzer before this step to write off obsolete parts in the current fiscal window.</p>
</div>
</div>
<div class="bg-stone-900 rounded-sm overflow-hidden aspect-video relative">
<img alt="Warehouse logistics visualization" class="w-full h-full object-cover opacity-60 grayscale hover:grayscale-0 transition-all duration-500" data-alt="high angle view of an organized industrial warehouse with blue containers and structured metal racks under cold LED lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEcg3OlnwdRGBljBva9hzxBQrIvv9PyLocw5QEFUCNmwF0g0lo_DtwBURIelHMRPmER9DAZqNcbkogUgfzE75v4rc_KVAm19vTIMJQj2Lilmk8fhk0L0XuNpAk4OaP83XqporYFNZVVyy_2vyfgkKOviyVMyoRxdzXF28gWeXUoQ69ndWl-D1X4PhjJTan6d4-TBDy3HiYe-Gk7xCdpEdbch3WjUayhmsLeh1jqie8iNYdZTiWaPBYiYnqK6QOYQZL3QKcMY8eOEU"/>
</div>
</div>
</div>
<!-- Step 3 -->
<div class="group">
<div class="flex items-baseline gap-6 mb-6">
<span class="text-4xl font-black text-stone-800 group-hover:text-lime-900 transition-colors">03</span>
<h2 class="text-2xl font-bold uppercase tracking-tight text-white">The Final Ledger Lock</h2>
</div>
<div class="space-y-6">
<p class="text-stone-400 leading-relaxed max-w-3xl">Once all sub-ledgers are verified, execute the period closure. This process is irreversible and creates a permanent hash on the financial blockchain ledger of Forge ERP.</p>
<div class="flex gap-4">
<button class="bg-stone-100 text-stone-950 px-6 py-2 font-bold uppercase text-xs tracking-widest hover:bg-lime-500 transition-colors">INITIATE CLOSURE</button>
<button class="border border-stone-700 text-stone-400 px-6 py-2 font-bold uppercase text-xs tracking-widest hover:border-stone-500 hover:text-white transition-colors">DOWNLOAD AUDIT LOG</button>
</div>
</div>
</div>
</section>
<!-- Feedback Section -->
<section class="bg-stone-900/50 p-12 border-t border-stone-800 flex flex-col items-center text-center">
<h3 class="text-xl font-bold uppercase tracking-tight mb-4">Was this technical guide helpful?</h3>
<div class="flex gap-4 mb-8">
<button class="flex items-center gap-2 px-6 py-2 bg-stone-800 hover:bg-lime-900/40 border border-stone-700 rounded-sm transition-colors">
<span class="material-symbols-outlined text-lime-500" style="font-variation-settings: 'FILL' 1;">thumb_up</span>
<span class="text-xs font-bold uppercase tracking-widest">Yes, Clear</span>
</button>
<button class="flex items-center gap-2 px-6 py-2 bg-stone-800 hover:bg-error/20 border border-stone-700 rounded-sm transition-colors">
<span class="material-symbols-outlined text-stone-500">thumb_down</span>
<span class="text-xs font-bold uppercase tracking-widest">No, Need Detail</span>
</button>
</div>
<p class="text-[10px] text-stone-500 uppercase tracking-widest">Last updated: OCTOBER 24, 2023 | Version 4.1.0-RE2</p>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/base-conocimiento.js"></script>
@endpush
