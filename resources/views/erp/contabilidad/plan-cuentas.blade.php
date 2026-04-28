@extends('erp.layouts.app')

@section('title', 'TITAN ERP: ACCOUNTING - Chart of Accounts | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Plan de Cuentas</span>
@endsection

@section('content')
<!-- Header Section: Industrial Hierarchical Jurisdiction -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between mb-16 gap-10">
    <div class="space-y-4">
        <div class="flex items-center gap-4 mb-2">
            <span class="w-12 h-1 bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)]"></span>
            <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic leading-none">Fiduciary Structure: Chart_of_Accounts</p>
        </div>
        <h1 class="text-5xl md:text-7xl font-headline font-black uppercase tracking-tighter text-stone-950 leading-none italic">Accounts <span class="text-stone-300 not-italic">Architect</span></h1>
        <p class="text-stone-500 text-[12px] font-black uppercase tracking-[0.3em] border-l-4 border-stone-950 pl-8 italic">MAYOR DE REPUESTO LA CIMA • CORE_FINANCE_STRUCTURE • ARCHIVE_4.0</p>
    </div>
    <div class="flex items-center gap-4">
        <button class="bg-white border border-stone-100 px-8 py-4 rounded-2xl flex items-center gap-4 text-[11px] font-black uppercase tracking-[0.3em] text-stone-500 hover:text-stone-950 hover:border-primary transition-all italic shadow-sm">
            <span class="material-symbols-outlined text-[20px]">upload_file</span>
            Export_XLSX
        </button>
        <button class="bg-primary text-stone-950 px-10 py-4 rounded-2xl flex items-center gap-4 text-[11px] font-black uppercase tracking-[0.3em] hover:brightness-110 transition-all shadow-2xl shadow-primary/20 italic">
            <span class="material-symbols-outlined text-[20px]">add_circle</span>
            Initialize_Account
        </button>
    </div>
</div>

<!-- Dashboard Stats Summary: Monetary Magnitudes -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.4em] mb-4 italic">Total Asset Volume</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$2,450,892.40</p>
        <div class="mt-8 pt-8 border-t border-stone-50">
            <div class="w-full bg-stone-100 h-1 rounded-full overflow-hidden">
                <div class="bg-primary h-full w-[70%]"></div>
            </div>
        </div>
    </div>
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.4em] mb-4 italic">Liability Liability</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$842,110.15</p>
        <div class="mt-8 pt-8 border-t border-stone-50">
            <div class="w-full bg-stone-100 h-1 rounded-full overflow-hidden">
                <div class="bg-red-500 h-full w-[30%]"></div>
            </div>
        </div>
    </div>
    <div class="bg-white border border-stone-100 p-10 rounded-[40px] shadow-sm relative group overflow-hidden transition-all hover:border-primary">
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.4em] mb-4 italic">Equity magnitude</p>
        <p class="text-3xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$1,608,782.25</p>
        <div class="mt-8 pt-8 border-t border-stone-50">
            <div class="w-full bg-stone-100 h-1 rounded-full overflow-hidden">
                <div class="bg-blue-500 h-full w-[40%]"></div>
            </div>
        </div>
    </div>
    <div class="bg-stone-950 border border-stone-800 p-10 rounded-[40px] shadow-2xl relative group overflow-hidden transition-all hover:border-primary/20">
        <div class="absolute inset-0 opacity-[0.03] group-hover:opacity-[0.06] transition-opacity" style="background-image: radial-gradient(#ceff5e 1.5px, transparent 1.5px); background-size: 20px 20px;"></div>
        <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.4em] mb-4 italic relative z-10">Entity count</p>
        <p class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none relative z-10">142 UNITS</p>
        <div class="mt-8 pt-8 border-t border-white/5 relative z-10">
            <p class="text-[9px] text-stone-600 font-black uppercase tracking-[0.3em] italic italic">Database_Indexing_Complete</p>
        </div>
    </div>
</div>

<!-- Table Section: Hierarchical Ledger Protocol -->
<div class="bg-white border border-stone-100 rounded-[40px] overflow-hidden shadow-2xl mb-12">
    <!-- Table Header -->
    <div class="grid grid-cols-12 zenith-table-header bg-stone-950 text-white py-6">
        <div class="col-span-2 px-10 text-[12px] font-black uppercase tracking-[0.3em] italic">Code_Lock</div>
        <div class="col-span-4 px-10 text-[12px] font-black uppercase tracking-[0.3em] italic">Entity_Identity</div>
        <div class="col-span-2 px-10 text-[12px] font-black uppercase tracking-[0.3em] italic">Classification</div>
        <div class="col-span-2 px-10 text-right text-[12px] font-black uppercase tracking-[0.3em] italic">Quantum</div>
        <div class="col-span-2 px-10 text-right text-[12px] font-black uppercase tracking-[0.3em] italic">Logic</div>
    </div>

    <!-- Hierarchical Rows -->
    <div class="divide-y divide-stone-50">
        <!-- Level 1 Assets -->
        <div class="grid grid-cols-12 items-center py-8 px-10 bg-stone-50 hover:bg-primary/5 transition-colors group">
            <div class="col-span-2">
                <span class="font-mono text-[12px] font-black text-stone-950 tracking-tighter italic border-b-2 border-primary leading-none">1.0.00.00</span>
            </div>
            <div class="col-span-4 px-4">
                <h3 class="text-[14px] font-headline font-black text-stone-950 uppercase italic tracking-tighter leading-none">ACTIVOS</h3>
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic italic">Consolidated Master Node</p>
            </div>
            <div class="col-span-2">
                <span class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] italic border border-stone-200 px-4 py-1 rounded-full group-hover:border-primary group-hover:text-stone-950 transition-colors">ASSET_CORE</span>
            </div>
            <div class="col-span-2 text-right">
                <span class="font-mono font-black text-[20px] text-stone-950 italic tracking-tighter leading-none">$2,450,892.40</span>
            </div>
            <div class="col-span-2 flex justify-end gap-6 text-stone-300 group-hover:text-stone-950 transition-colors">
                <span class="material-symbols-outlined text-[20px] cursor-pointer hover:scale-125 transition-transform">visibility</span>
                <span class="material-symbols-outlined text-[20px] cursor-pointer hover:scale-125 transition-transform">add_box</span>
            </div>
        </div>
        
        <!-- Level 2 Assets -->
        <div class="grid grid-cols-12 items-center py-6 px-10 pl-24 bg-white hover:bg-stone-50 transition-colors group">
            <div class="col-span-2">
                <span class="font-mono text-[11px] font-black text-stone-400 group-hover:text-stone-950 transition-colors tracking-tighter italic">1.1.00.00</span>
            </div>
            <div class="col-span-4 px-4">
                <h4 class="text-[12px] font-black text-stone-800 uppercase italic tracking-tight leading-none group-hover:text-stone-950">Activos Corrientes</h4>
                <p class="text-[9px] font-black text-stone-300 uppercase tracking-widest mt-1 italic italic italic">Sub-Level Transmission</p>
            </div>
            <div class="col-span-2">
                <span class="text-[10px] font-black text-stone-300 uppercase tracking-[0.2em] italic">CURRENT_ASSET</span>
            </div>
            <div class="col-span-2 text-right">
                <span class="font-mono font-black text-[14px] text-stone-400 group-hover:text-stone-950 transition-colors italic tracking-tighter leading-none">$1,120,440.00</span>
            </div>
            <div class="col-span-2 flex justify-end gap-6 text-stone-200 group-hover:text-stone-400 transition-colors">
                <span class="material-symbols-outlined text-[18px] cursor-pointer hover:text-stone-950">edit</span>
            </div>
        </div>

        <!-- Level 3 Assets -->
        <div class="grid grid-cols-12 items-center py-4 px-10 pl-32 bg-white hover:bg-primary/5 transition-colors group border-l-8 border-l-stone-50 hover:border-l-primary">
            <div class="col-span-2">
                <span class="font-mono text-[11px] font-black text-stone-300 group-hover:text-stone-950 transition-colors tracking-tighter italic">1.1.01.01</span>
            </div>
            <div class="col-span-4 px-4">
                <h5 class="text-[12px] font-black text-stone-400 group-hover:text-stone-950 transition-colors uppercase italic tracking-tight leading-none">Caja General - Principal</h5>
            </div>
            <div class="col-span-2">
                <span class="text-[10px] font-black text-stone-200 group-hover:text-primary transition-colors uppercase tracking-widest italic">LIQUID_RESERVE</span>
            </div>
            <div class="col-span-2 text-right">
                <span class="font-mono font-black text-[13px] text-stone-300 group-hover:text-stone-950 transition-colors italic tracking-tighter leading-none">$12,450.00</span>
            </div>
            <div class="col-span-2 flex justify-end gap-6 text-stone-100 group-hover:text-stone-300 transition-colors">
                <span class="material-symbols-outlined text-[16px] cursor-pointer hover:text-stone-950">edit</span>
                <span class="material-symbols-outlined text-[16px] cursor-pointer hover:text-red-500">delete</span>
            </div>
        </div>

        <!-- Level 1 Liabilities (Repeat Pattern for consistency) -->
        <div class="grid grid-cols-12 items-center py-8 px-10 bg-stone-50 hover:bg-red-50/30 transition-colors group">
            <div class="col-span-2">
                <span class="font-mono text-[12px] font-black text-stone-950 tracking-tighter italic border-b-2 border-red-500 leading-none">2.0.00.00</span>
            </div>
            <div class="col-span-4 px-4">
                <h3 class="text-[14px] font-headline font-black text-stone-950 uppercase italic tracking-tighter leading-none">PASIVOS</h3>
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic italic">Liability Delta Hub</p>
            </div>
            <div class="col-span-2">
                <span class="text-[11px] font-black text-stone-400 uppercase tracking-[0.3em] italic border border-stone-200 px-4 py-1 rounded-full group-hover:border-red-500 group-hover:text-red-950 transition-colors">LIABIL_CORE</span>
            </div>
            <div class="col-span-2 text-right">
                <span class="font-mono font-black text-[20px] text-stone-950 italic tracking-tighter leading-none">$842,110.15</span>
            </div>
            <div class="col-span-2 flex justify-end gap-6 text-stone-300 group-hover:text-stone-950 transition-colors">
                <span class="material-symbols-outlined text-[20px] cursor-pointer">visibility</span>
                <span class="material-symbols-outlined text-[20px] cursor-pointer">add_box</span>
            </div>
        </div>
    </div>
</div>

<!-- Footer Meta: Industrial Compliance Footer -->
<div class="mt-20 flex flex-col md:flex-row justify-between items-center text-[11px] font-black uppercase tracking-[0.4em] text-stone-400 italic border-t border-stone-100 pt-12 pb-16">
    <div class="flex flex-col md:flex-row gap-12">
        <span class="flex items-center gap-4">
            <span class="w-3 h-3 rounded-full bg-green-500 shadow-[0_0_10px_rgba(34,197,94,0.5)] animate-pulse"></span>
            Fiduciary_Core: Online
        </span>
        <span class="text-stone-300">Integrity_Sync: 2026-10-27_09:42:12</span>
    </div>
    <div class="mt-6 md:mt-0 text-stone-950">
        Terminal_ID: T-XC44-LEGER_NODE_01
    </div>
</div>
>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/plan-cuentas.js') }}"></script>
    <style>
        .account-row { transition: background-color 0.2s; }
    </style>
@endpush
