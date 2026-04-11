@extends('layouts.erp')

@section('title', 'TITAN ERP: ACCOUNTING - Chart of Accounts | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/plan-cuentas.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P·gina';
  });
</script>

<main class="flex-1 md:ml-64 p-8 bg-surface">
<!-- Header Section -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between mb-10 gap-6">
<div class="space-y-1">
<div class="flex items-center gap-2 mb-2">
<span class="bg-primary-container text-on-primary-container text-[10px] px-2 py-0.5 font-bold tracking-widest uppercase">Precision Forge System</span>
</div>
<h1 class="text-4xl font-headline font-bold uppercase tracking-tight text-on-background">Chart of Accounts</h1>
<p class="text-secondary font-medium tracking-tight">MAYOR DE REPUESTO LA CIMA <span class="mx-2">|</span> Plan de Cuentas Jer√°rquico</p>
</div>
<div class="flex items-center gap-3">
<button class="bg-surface-container-high border-0 px-6 py-2.5 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-on-surface hover:bg-surface-container-highest transition-all active:scale-95">
<span class="material-symbols-outlined text-sm">upload_file</span>
                        Export to Excel
                    </button>
<button class="bg-primary text-on-primary px-6 py-2.5 flex items-center gap-2 text-xs font-bold uppercase tracking-widest hover:scale-105 transition-all active:scale-95 shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-sm">add_circle</span>
                        Add Account
                    </button>
</div>
</div>
<!-- Dashboard Stats Summary (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-1 mb-12">
<div class="bg-surface-container p-6 border-l-4 border-primary">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Total Assets</p>
<p class="text-2xl font-headline font-bold text-on-background">$2,450,892.40</p>
</div>
<div class="bg-surface-container-low p-6">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Total Liabilities</p>
<p class="text-2xl font-headline font-bold text-on-background">$842,110.15</p>
</div>
<div class="bg-surface-container-low p-6">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Total Equity</p>
<p class="text-2xl font-headline font-bold text-on-background">$1,608,782.25</p>
</div>
<div class="bg-surface-container-low p-6">
<p class="text-[10px] text-secondary font-bold uppercase tracking-widest mb-1">Account Count</p>
<p class="text-2xl font-headline font-bold text-on-background">142 Entries</p>
</div>
</div>
<!-- Table Section -->
<div class="bg-surface-container-lowest overflow-hidden">
<!-- Table Header -->
<div class="grid grid-cols-12 bg-on-background text-background py-4 px-6 text-[11px] font-bold uppercase tracking-widest">
<div class="col-span-2">Account Code</div>
<div class="col-span-4">Account Name</div>
<div class="col-span-2">Type</div>
<div class="col-span-2 text-right">Current Balance</div>
<div class="col-span-2 text-right">Actions</div>
</div>
<!-- Hierarchical Rows -->
<!-- Level 1 -->
<div class="grid grid-cols-12 py-4 px-6 border-b border-surface-container text-sm font-bold bg-surface-container-low">
<div class="col-span-2 tracking-tighter">1.0.00.00</div>
<div class="col-span-4 uppercase">ACTIVOS</div>
<div class="col-span-2">ASSET</div>
<div class="col-span-2 text-right">$2,450,892.40</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<!-- Level 2 -->
<div class="grid grid-cols-12 py-3.5 px-6 border-b border-surface-container text-sm font-semibold bg-surface-container-lowest pl-10">
<div class="col-span-2 tracking-tighter">1.1.00.00</div>
<div class="col-span-4 uppercase">Activos Corrientes</div>
<div class="col-span-2">ASSET</div>
<div class="col-span-2 text-right">$1,120,440.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<!-- Level 3 (Leaf Nodes) -->
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">1.1.01.01</div>
<div class="col-span-4 font-medium">Caja General - Principal</div>
<div class="col-span-2 text-secondary">LIQUID ASSET</div>
<div class="col-span-2 text-right font-bold">$12,450.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">1.1.01.02</div>
<div class="col-span-4 font-medium">Bancos - Operativo Central</div>
<div class="col-span-2 text-secondary">LIQUID ASSET</div>
<div class="col-span-2 text-right font-bold">$458,990.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">1.1.05.01</div>
<div class="col-span-4 font-medium">Inventario de Repuestos Pesados</div>
<div class="col-span-2 text-secondary">INVENTORY</div>
<div class="col-span-2 text-right font-bold">$649,000.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<!-- Next Group -->
<div class="grid grid-cols-12 py-4 px-6 border-b border-surface-container text-sm font-bold bg-surface-container-low mt-4">
<div class="col-span-2 tracking-tighter">2.0.00.00</div>
<div class="col-span-4 uppercase">PASIVOS</div>
<div class="col-span-2">LIABILITY</div>
<div class="col-span-2 text-right">$842,110.15</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<div class="grid grid-cols-12 py-3.5 px-6 border-b border-surface-container text-sm font-semibold bg-surface-container-lowest pl-10">
<div class="col-span-2 tracking-tighter">2.1.00.00</div>
<div class="col-span-4 uppercase">Pasivos a Corto Plazo</div>
<div class="col-span-2">LIABILITY</div>
<div class="col-span-2 text-right">$312,400.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary">
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-lg cursor-pointer hover:text-primary">visibility</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">2.1.01.01</div>
<div class="col-span-4 font-medium">Proveedores Nacionales</div>
<div class="col-span-2 text-secondary">PAYABLE</div>
<div class="col-span-2 text-right font-bold">$198,000.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
<div class="account-row grid grid-cols-12 py-3 px-6 border-b border-surface-container text-xs pl-16">
<div class="col-span-2 font-mono text-secondary">2.1.05.10</div>
<div class="col-span-4 font-medium">Impuestos por Pagar (IVA)</div>
<div class="col-span-2 text-secondary">TAX</div>
<div class="col-span-2 text-right font-bold">$114,400.00</div>
<div class="col-span-2 flex justify-end gap-3 text-secondary/50">
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">edit</span>
<span class="material-symbols-outlined text-base cursor-pointer hover:text-primary">delete</span>
</div>
</div>
</div>
<!-- Footer Meta -->
<div class="mt-8 flex justify-between items-center text-[10px] font-bold uppercase tracking-[0.2em] text-secondary">
<div class="flex gap-8">
<span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> DATABASE ONLINE</span>
<span>LAST SYNC: 2023-10-27 09:42:12</span>
</div>
<div>
                    TERMINAL ID: T-XC44-LEGER
                </div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/plan-cuentas.js"></script>
@endpush
