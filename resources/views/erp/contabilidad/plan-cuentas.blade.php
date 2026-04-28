@extends('erp.layouts.app')

@section('title', 'TITAN ERP: ACCOUNTING - Chart of Accounts | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Plan de Cuentas</span>
@endsection

@section('content')
<!-- Header Section -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between mb-10 gap-6">
    <div class="space-y-1">
        <div class="flex items-center gap-2 mb-2">
            <span class="bg-stone-950 text-primary text-[10px] px-3 py-1 font-black tracking-[0.3em] uppercase italic italic">Precision Forge System v4.0</span>
        </div>
        <h1 class="text-4xl font-headline font-black uppercase tracking-tighter text-stone-900 italic">Chart of Accounts</h1>
        <p class="text-stone-400 text-[12px] font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA <span class="mx-2 text-stone-200">|</span> Plan de Cuentas Jerárquico</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="bg-white border border-stone-200 px-6 py-3 flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-stone-500 hover:text-stone-950 hover:border-stone-900 transition-all italic">
            <span class="material-symbols-outlined text-[16px]">upload_file</span>
            Export to Excel
        </button>
        <button class="bg-primary text-stone-950 px-8 py-3 flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] hover:bg-stone-950 hover:text-primary transition-all shadow-xl shadow-primary/20 italic">
            <span class="material-symbols-outlined text-[16px]">add_circle</span>
            Add Account
        </button>
    </div>
</div>

<!-- Dashboard Stats Summary (Bento Style) -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-1 mb-10 shadow-sm border border-stone-200 rounded-[20px] overflow-hidden">
    <div class="bg-white p-8 border-r border-stone-100">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mb-3 italic">Total Assets</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$2,450,892.40</p>
    </div>
    <div class="bg-white p-8 border-r border-stone-100">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mb-3 italic">Total Liabilities</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$842,110.15</p>
    </div>
    <div class="bg-white p-8 border-r border-stone-100">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mb-3 italic">Total Equity</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$1,608,782.25</p>
    </div>
    <div class="bg-stone-50 p-8">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mb-3 italic">Account Entries</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">142 UNITS.</p>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white border border-stone-200 rounded-[24px] overflow-hidden shadow-sm">
    <!-- Table Header -->
    <div class="grid grid-cols-12 zenith-table-header bg-stone-950 py-5">
        <div class="col-span-2 px-8">Account Code</div>
        <div class="col-span-4 px-8">Account Name</div>
        <div class="col-span-2 px-8">Type</div>
        <div class="col-span-2 px-8 text-right">Current Balance</div>
        <div class="col-span-2 px-8 text-right">Actions</div>
    </div>

    <!-- Hierarchical Rows -->
    <!-- Level 1 Assets -->
    <div class="grid grid-cols-12 items-center py-6 px-8 border-b border-stone-100 bg-stone-50/50 group">
        <div class="col-span-2 font-mono text-[11px] font-black text-stone-400 tracking-tighter bg-stone-100 px-3 py-1 rounded inline-block w-fit">1.0.00.00</div>
        <div class="col-span-4 font-headline font-black text-[14px] uppercase italic tracking-tight text-stone-950">ACTIVOS</div>
        <div class="col-span-2 text-[10px] font-black text-stone-300 uppercase tracking-widest italic">ASSET</div>
        <div class="col-span-2 text-right font-headline font-black text-[18px] text-stone-950 italic tracking-tighter">$2,450,892.40</div>
        <div class="col-span-2 flex justify-end gap-3 text-stone-300 group-hover:text-stone-900 transition-colors">
            <span class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">visibility</span>
        </div>
    </div>
    
    <!-- Level 2 Assets -->
    <div class="grid grid-cols-12 items-center py-5 px-8 border-b border-stone-50 pl-16 bg-white group">
        <div class="col-span-2 font-mono text-[11px] font-black text-stone-400 tracking-tighter">1.1.00.00</div>
        <div class="col-span-4 font-black text-[12px] uppercase tracking-tight text-stone-600 italic">Activos Corrientes</div>
        <div class="col-span-2 text-[10px] font-black text-stone-300 uppercase tracking-widest italic">ASSET</div>
        <div class="col-span-2 text-right font-black text-[12px] text-stone-500 italic tracking-tighter">$1,120,440.00</div>
        <div class="col-span-2 flex justify-end gap-3 text-stone-200 group-hover:text-stone-900 transition-colors">
            <span class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">edit</span>
        </div>
    </div>

    <!-- Level 3 Assets -->
    <div class="grid grid-cols-12 items-center py-3 px-8 border-b border-stone-50 pl-24 bg-white hover:bg-stone-50 transition-colors group">
        <div class="col-span-2 font-mono text-[10.5px] font-bold text-stone-400 tracking-tighter">1.1.01.01</div>
        <div class="col-span-4 text-[12px] font-black uppercase tracking-tight text-stone-400 italic">Caja General - Principal</div>
        <div class="col-span-2 text-[10px] font-black text-stone-200 uppercase tracking-widest italic">LIQUID</div>
        <div class="col-span-2 text-right font-black text-[11px] text-stone-400 italic tracking-tighter">$12,450.00</div>
        <div class="col-span-2 flex justify-end gap-4 text-stone-200 group-hover:text-stone-400 transition-colors">
            <span class="material-symbols-outlined text-[14px] cursor-pointer hover:text-stone-900">edit</span>
            <span class="material-symbols-outlined text-[14px] cursor-pointer hover:text-red-500">delete</span>
        </div>
    </div>

    <!-- Level 1 Liabilities -->
    <div class="grid grid-cols-12 items-center py-6 px-8 border-b border-stone-100 bg-stone-50/50 group mt-4 border-t border-t-stone-200">
        <div class="col-span-2 font-mono text-[11px] font-black text-stone-400 tracking-tighter bg-stone-100 px-3 py-1 rounded inline-block w-fit">2.0.00.00</div>
        <div class="col-span-4 font-headline font-black text-[14px] uppercase italic tracking-tight text-stone-950">PASIVOS</div>
        <div class="col-span-2 text-[10px] font-black text-stone-300 uppercase tracking-widest italic">LIABILITY</div>
        <div class="col-span-2 text-right font-headline font-black text-[18px] text-stone-950 italic tracking-tighter">$842,110.15</div>
        <div class="col-span-2 flex justify-end gap-3 text-stone-300 group-hover:text-stone-900 transition-colors">
            <span class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">visibility</span>
        </div>
    </div>

    <!-- Level 2 Liabilities -->
    <div class="grid grid-cols-12 items-center py-5 px-8 border-b border-stone-50 pl-16 bg-white group">
        <div class="col-span-2 font-mono text-[11px] font-black text-stone-400 tracking-tighter">2.1.00.00</div>
        <div class="col-span-4 font-black text-[12px] uppercase tracking-tight text-stone-600 italic">Pasivos a Corto Plazo</div>
        <div class="col-span-2 text-[10px] font-black text-stone-300 uppercase tracking-widest italic">LIABILITY</div>
        <div class="col-span-2 text-right font-black text-[12px] text-stone-500 italic tracking-tighter">$312,400.00</div>
        <div class="col-span-2 flex justify-end gap-3 text-stone-200 group-hover:text-stone-900 transition-colors">
            <span class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">edit</span>
        </div>
    </div>

    <!-- Level 3 Liabilities -->
    <div class="grid grid-cols-12 items-center py-3 px-8 border-b border-stone-50 pl-24 bg-white hover:bg-stone-50 transition-colors group">
        <div class="col-span-2 font-mono text-[10.5px] font-bold text-stone-400 tracking-tighter">2.1.01.01</div>
        <div class="col-span-4 text-[12px] font-black uppercase tracking-tight text-stone-400 italic">Proveedores Nacionales</div>
        <div class="col-span-2 text-[10px] font-black text-stone-200 uppercase tracking-widest italic">PAYABLE</div>
        <div class="col-span-2 text-right font-black text-[11px] text-stone-400 italic tracking-tighter">$198,000.00</div>
        <div class="col-span-2 flex justify-end gap-4 text-stone-200 group-hover:text-stone-400 transition-colors">
            <span class="material-symbols-outlined text-[14px] cursor-pointer hover:text-stone-900">edit</span>
            <span class="material-symbols-outlined text-[14px] cursor-pointer hover:text-red-500">delete</span>
        </div>
    </div>
</div>

<!-- Footer Meta -->
<div class="mt-8 flex justify-between items-center text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 italic">
    <div class="flex gap-8">
        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> CORE DATABASE CONNECTED</span>
        <span>LAST INTEGRITY SYNC: 2026-10-27 09:42:12</span>
    </div>
    <div>
        SECURE TERMINAL ID: T-XC44-LEGER
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/plan-cuentas.js') }}"></script>
    <style>
        .account-row { transition: background-color 0.2s; }
    </style>
@endpush
