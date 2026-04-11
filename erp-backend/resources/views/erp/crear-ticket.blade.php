@extends('layouts.erp')

@section('title', 'New Support Ticket | INDUSTRIAL FORGE ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/crear-ticket.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="md:ml-64 pt-20 min-h-screen">
<div class="max-w-6xl mx-auto p-8">
<!-- Page Header (Editorial Style) -->
<header class="mb-12 relative">
<div class="absolute -top-6 -left-6 w-32 h-32 bg-primary-container/20 -z-10 rounded-full blur-3xl"></div>
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
<div>
<span class="text-accent-industrial font-headline font-black uppercase tracking-[0.3em] text-xs">Support Center</span>
<h1 class="text-5xl md:text-7xl font-headline font-black uppercase tracking-tighter leading-none mt-2">New Support <br/> Ticket</h1>
</div>
<div class="max-w-xs">
<p class="text-secondary font-body text-sm leading-relaxed border-l-2 border-accent-industrial pl-4">
                            Submit a technical inquiry or report a system anomaly. Our engineering team prioritizes tickets based on severity levels.
                        </p>
</div>
</div>
</header>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- Ticket Form Section -->
<section class="lg:col-span-8 bg-surface-container-lowest p-8 rounded-lg shadow-sm ghost-border">
<form class="space-y-8">
<!-- Subject Field -->
<div class="group">
<label class="block font-headline font-bold uppercase text-xs tracking-widest text-secondary mb-3 group-focus-within:text-primary transition-colors">Subject</label>
<input class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary px-4 py-4 font-body text-on-surface placeholder:text-stone-400 transition-all" placeholder="e.g., Inventory synchronization delay in Main Warehouse" type="text"/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<!-- Module Dropdown -->
<div class="group">
<label class="block font-headline font-bold uppercase text-xs tracking-widest text-secondary mb-3 group-focus-within:text-primary transition-colors">Module Affected</label>
<select class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary px-4 py-4 font-body text-on-surface transition-all appearance-none">
<option>Select System Module</option>
<option>Inventario</option>
<option>Ventas</option>
<option>Compras</option>
<option>Finanzas</option>
<option>Contabilidad</option>
<option>RRHH</option>
</select>
</div>
<!-- Severity Dropdown -->
<div class="group">
<label class="block font-headline font-bold uppercase text-xs tracking-widest text-secondary mb-3 group-focus-within:text-primary transition-colors">Severity Level</label>
<select class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary px-4 py-4 font-body text-on-surface transition-all appearance-none">
<option>Low - Minor Question</option>
<option>Medium - Performance Issue</option>
<option>High - Workflow Impeded</option>
<option class="text-error font-bold">Critical - System Down</option>
</select>
</div>
</div>
<!-- Description -->
<div class="group">
<label class="block font-headline font-bold uppercase text-xs tracking-widest text-secondary mb-3 group-focus-within:text-primary transition-colors">Detailed Description</label>
<textarea class="w-full bg-surface-container-highest border-none focus:ring-2 focus:ring-primary px-4 py-4 font-body text-on-surface placeholder:text-stone-400 transition-all" placeholder="Provide a detailed technical explanation of the issue, including steps to reproduce..." rows="6"></textarea>
</div>
<!-- Dropzone for Screenshots -->
<div>
<label class="block font-headline font-bold uppercase text-xs tracking-widest text-secondary mb-3">Supporting Documentation &amp; Screenshots</label>
<div class="border-2 border-dashed border-outline-variant bg-surface rounded-lg p-10 flex flex-col items-center justify-center cursor-pointer hover:bg-surface-container-low transition-colors group">
<span class="material-symbols-outlined text-4xl text-stone-300 group-hover:text-accent-industrial mb-4 transition-colors">cloud_upload</span>
<p class="font-headline font-bold uppercase text-[10px] tracking-widest text-secondary">Drag files here or <span class="text-accent-industrial">browse files</span></p>
<p class="text-[10px] text-stone-400 mt-2 font-label">MAX SIZE: 25MB (PNG, JPG, PDF, ZIP)</p>
</div>
</div>
<!-- Action Button -->
<div class="pt-4">
<button class="w-full bg-primary text-on-primary py-5 font-headline font-black uppercase tracking-[0.25em] text-sm hover:brightness-110 active:scale-[0.99] transition-all flex items-center justify-center gap-3" type="submit">
                                Initialize Support Ticket
                                <span class="material-symbols-outlined">send</span>
</button>
</div>
</form>
</section>
<!-- Information Sidebar -->
<aside class="lg:col-span-4 space-y-8">
<!-- Response Times Card -->
<div class="bg-inverse-surface text-inverse-on-surface p-8 rounded-lg relative overflow-hidden">
<div class="absolute -right-8 -top-8 opacity-10">
<span class="material-symbols-outlined text-9xl">schedule</span>
</div>
<h3 class="font-headline font-black uppercase text-lg tracking-tight mb-6">Service Level <br/>Agreement (SLA)</h3>
<div class="space-y-4">
<div class="flex justify-between items-center py-3 border-b border-white/10">
<span class="font-headline font-bold uppercase text-[10px] tracking-widest opacity-60">CRITICAL</span>
<span class="font-headline font-black text-accent-industrial tracking-tighter">&lt; 2 HOURS</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/10">
<span class="font-headline font-bold uppercase text-[10px] tracking-widest opacity-60">HIGH</span>
<span class="font-headline font-black text-white tracking-tighter">4 - 6 HOURS</span>
</div>
<div class="flex justify-between items-center py-3 border-b border-white/10">
<span class="font-headline font-bold uppercase text-[10px] tracking-widest opacity-60">MEDIUM</span>
<span class="font-headline font-black text-white tracking-tighter">12 - 24 HOURS</span>
</div>
<div class="flex justify-between items-center py-3">
<span class="font-headline font-bold uppercase text-[10px] tracking-widest opacity-60">LOW</span>
<span class="font-headline font-black text-white tracking-tighter">48 HOURS</span>
</div>
</div>
</div>
<!-- Visual Callout -->
<div class="bg-primary-container p-1 rounded-lg">
<div class="bg-surface-container-lowest p-6 rounded-[0.125rem]">
<div class="flex items-start gap-4 mb-4">
<span class="material-symbols-outlined text-accent-industrial">verified_user</span>
<div>
<h4 class="font-headline font-bold uppercase text-xs tracking-widest">Global Expertise</h4>
<p class="text-xs text-secondary mt-1">Our support engineers are available 24/7 for production-halting issues.</p>
</div>
</div>
<img alt="Industrial control room" class="w-full h-32 object-cover rounded grayscale hover:grayscale-0 transition-all duration-500" data-alt="Modern industrial control room with multiple screens and focused technician in distance" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeiDNno_T8bN1U2Ihy0TTkY3g2vFi_l3S9h0u15Rm43oFVWnwnwR9tV4duLtfYI9VG2G-_PIKSH9KdqghrwP5wXiSSevisSebVC389g30GyIuwMY2sqNE39LlLrgOEuUd3BqL4pApPD4oUmyDynZRldSXaX1AiKPczSgzKWedwmS2qXDlxwGWcFlN4OrWQY6Kc5c6vLDzsLgSFJU_oz0q3bf0GZKfkMcDLQyybWwBIqUEojoj08iHba3iijLGzGRI4G2DDH32eOWM"/>
</div>
</div>
</aside>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/crear-ticket.js"></script>
@endpush
