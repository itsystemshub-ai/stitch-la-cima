@extends('layouts.erp')

@section('title', 'procesar-orden | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/procesar-orden.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="flex-grow flex flex-col items-center justify-center relative overflow-hidden bg-zinc-950 p-6">
<!-- Technical Background Elements -->
<div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
<div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-[#496800]/20 to-transparent"></div>
</div>
<!-- Central Validator Unit -->
<div class="relative z-10 w-full max-w-4xl">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
<!-- Progress Indicator Visual -->
<div class="lg:col-span-5 flex flex-col items-center justify-center">
<div class="relative w-64 h-64 flex items-center justify-center">
<!-- Rotating Circular Rings -->
<div class="absolute inset-0 border-4 border-dashed border-[#9ACD32]/30 rounded-full animate-[spin_10s_linear_infinite]"></div>
<div class="absolute inset-4 border-2 border-primary-container/20 rounded-full animate-[spin_6s_linear_reverse_infinite]"></div>
<!-- Core Icon -->
<div class="relative bg-zinc-900 w-48 h-48 rounded-full border border-white/10 flex items-center justify-center shadow-[0_0_50px_rgba(154,205,50,0.2)] overflow-hidden">
<div class="scan-line absolute w-full top-0 left-0 opacity-50"></div>
<span class="material-symbols-outlined text-6xl text-primary-container animate-subtle-pulse" data-icon="settings_suggest">settings_suggest</span>
</div>
</div>
</div>
<!-- Textual Processing Status -->
<div class="lg:col-span-7 space-y-8">
<div class="space-y-2">
<h1 class="font-headline text-4xl lg:text-5xl text-white font-bold tracking-tighter uppercase leading-none">
                            System <span class="text-primary-container">Validating</span> Order
                        </h1>
<p class="font-body text-zinc-400 text-lg">Transaction ID: <span class="font-mono text-zinc-200">#MX-9982-LC</span></p>
</div>
<!-- Progress List -->
<div class="space-y-4">
<!-- Item 1: Complete -->
<div class="flex items-center space-x-4 p-4 rounded-xl bg-zinc-900/50 border border-white/5">
<div class="flex-shrink-0 w-8 h-8 rounded-full bg-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary-container text-sm" data-icon="check" data-weight="fill" style="font-variation-settings: 'FILL' 1;">check</span>
</div>
<div class="flex-grow">
<div class="text-zinc-200 font-headline uppercase text-sm tracking-widest font-bold">Verifying Stock Availability</div>
<div class="text-zinc-500 text-xs font-body">Global Inventory Database Synced</div>
</div>
<div class="text-[#9ACD32] font-mono text-sm">OK</div>
</div>
<!-- Item 2: Active -->
<div class="flex items-center space-x-4 p-4 rounded-xl bg-zinc-900 border-l-4 border-primary-container shadow-xl">
<div class="flex-shrink-0 w-8 h-8 rounded-full bg-primary-container/10 border border-primary-container flex items-center justify-center">
<div class="w-2 h-2 bg-primary-container rounded-full animate-ping"></div>
</div>
<div class="flex-grow">
<div class="text-white font-headline uppercase text-sm tracking-widest font-bold">Generating Pro-forma Invoice</div>
<div class="text-zinc-400 text-xs font-body">Constructing PDF data structures...</div>
</div>
<div class="flex space-x-1">
<div class="w-1.5 h-1.5 bg-primary-container rounded-full animate-bounce [animation-delay:-0.3s]"></div>
<div class="w-1.5 h-1.5 bg-primary-container rounded-full animate-bounce [animation-delay:-0.15s]"></div>
<div class="w-1.5 h-1.5 bg-primary-container rounded-full animate-bounce"></div>
</div>
</div>
<!-- Item 3: Pending -->
<div class="flex items-center space-x-4 p-4 rounded-xl bg-zinc-900/30 border border-white/5 opacity-50">
<div class="flex-shrink-0 w-8 h-8 rounded-full bg-zinc-800 flex items-center justify-center text-zinc-600">
<span class="material-symbols-outlined text-sm" data-icon="pending">pending</span>
</div>
<div class="flex-grow">
<div class="text-zinc-500 font-headline uppercase text-sm tracking-widest font-bold">Calculating Logistics</div>
<div class="text-zinc-600 text-xs font-body">Queued after invoice generation</div>
</div>
<div class="text-zinc-700 font-mono text-sm">WAIT</div>
</div>
</div>
<!-- Technical Meta Info -->
<div class="pt-4 border-t border-white/10 grid grid-cols-2 gap-4">
<div class="bg-zinc-900/40 p-3 rounded-lg">
<span class="block text-[10px] text-zinc-500 font-bold uppercase tracking-widest">Protocol</span>
<span class="block text-zinc-300 font-mono text-xs">ECC-256 SECURED</span>
</div>
<div class="bg-zinc-900/40 p-3 rounded-lg">
<span class="block text-[10px] text-zinc-500 font-bold uppercase tracking-widest">Gateway</span>
<span class="block text-zinc-300 font-mono text-xs">VAL-NODE-04</span>
</div>
</div>
</div>
</div>
</div>
<!-- Asymmetric Background Component -->
<div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary/20 blur-[100px] rounded-full"></div>
<div class="absolute top-1/4 -left-24 w-64 h-64 bg-primary/10 blur-[80px] rounded-full"></div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/procesar-orden.js"></script>
@endpush
