@extends('erp.layouts.app')

@section('title', 'Libro Diario | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libro Diario</span>
@endsection

@section('content')
<!-- Header & Stats -->
<div class="mb-10">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
        <div>
            <p class="text-[12px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1 italic">Protocolo de Registro Contable</p>
            <h1 class="text-4xl md:text-5xl font-headline font-black tracking-tighter uppercase italic text-stone-950">General Journal</h1>
            <p class="text-[12px] font-black text-stone-400 uppercase tracking-[0.2em] mt-2 italic">MAYOR DE REPUESTO LA CIMA • AUDITORÍA ACTIVA</p>
        </div>
        <!-- Quick Filter Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-1 rounded-[20px] overflow-hidden border border-stone-200 shadow-sm">
            <div class="bg-white p-6 flex flex-col min-w-[160px] border-r border-stone-100">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic mb-2">Total Debits</span>
                <span class="text-2xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$1,240,502.50</span>
            </div>
            <div class="bg-white p-6 flex flex-col min-w-[160px] border-r border-stone-100">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic mb-2">Total Credits</span>
                <span class="text-2xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">$1,240,502.50</span>
            </div>
            <div class="bg-primary p-6 flex flex-col min-w-[160px] border-r border-stone-100">
                <span class="text-[10px] font-black text-stone-950 uppercase tracking-widest italic mb-2">Auto-Gen</span>
                <span class="text-2xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">142</span>
            </div>
            <div class="bg-stone-50 p-6 flex flex-col min-w-[160px]">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic mb-2">Manual</span>
                <span class="text-2xl font-headline font-black text-stone-950 italic tracking-tighter leading-none">18</span>
            </div>
        </div>
    </div>
</div>

<!-- Filter Controls Area -->
<div class="bg-white border border-stone-200 rounded-[24px] p-8 mb-10 flex flex-wrap items-end gap-6 shadow-sm">
    <div class="flex-1 min-w-[320px]">
        <label class="block text-[10px] font-black text-stone-400 uppercase mb-3 tracking-[0.3em] italic">Search Registry (Account / Reference)</label>
        <div class="relative">
            <input class="w-full bg-stone-50 border border-stone-100 focus:border-primary focus:ring-0 rounded-xl h-14 px-12 text-[12px] font-black uppercase tracking-tight placeholder:text-stone-300 transition-all shadow-inner" placeholder="ENTER TRANSACTION KEYWORDS..." type="text"/>
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-stone-400">search</span>
        </div>
    </div>
    <div class="flex gap-4">
        <div>
            <label class="block text-[10px] font-black text-stone-400 uppercase mb-3 tracking-[0.3em] italic">Period Start</label>
            <input class="bg-stone-50 border border-stone-100 focus:border-primary focus:ring-0 rounded-xl h-14 px-5 text-[12px] font-black uppercase shadow-inner" type="date"/>
        </div>
        <div>
            <label class="block text-[10px] font-black text-stone-400 uppercase mb-3 tracking-[0.3em] italic">Period End</label>
            <input class="bg-stone-50 border border-stone-100 focus:border-primary focus:ring-0 rounded-xl h-14 px-5 text-[12px] font-black uppercase shadow-inner" type="date"/>
        </div>
    </div>
    <button class="bg-stone-950 text-primary h-14 px-10 rounded-xl text-[10px] font-black uppercase tracking-[0.4em] hover:bg-stone-800 transition-all italic shadow-xl shadow-stone-950/20">
        EXECUTE AUDIT
    </button>
</div>

<!-- Journal Entries Table -->
<div class="overflow-x-auto bg-white border border-stone-200 rounded-[24px] shadow-sm">
    <table class="w-full border-collapse">
        <thead>
            <tr class="zenith-table-header bg-stone-950 py-6">
                <th class="px-8 py-5 text-left">FISCAL DATE</th>
                <th class="px-8 py-5 text-left">ENTRY REF.</th>
                <th class="px-8 py-5 text-left">ACCOUNT STRUCTURE</th>
                <th class="px-8 py-5 text-left">OPERATIONAL DESCRIPTION</th>
                <th class="px-8 py-5 text-right">DEBIT (+)</th>
                <th class="px-8 py-5 text-right">CREDIT (-)</th>
                <th class="px-8 py-5 text-center">PROTOCOL</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-50">
            <!-- Seat Group 1 -->
            <tr class="hover:bg-primary/5 transition-colors group">
                <td class="px-8 py-6">
                    <span class="font-mono text-[11px] font-black text-stone-400 tracking-tighter uppercase italic italic">2026-10-24</span>
                </td>
                <td class="px-8 py-6">
                    <span class="bg-stone-950 text-primary text-[10.5px] font-black px-3 py-1 rounded tracking-tighter font-mono border border-stone-800 italic uppercase">#GJ-8842</span>
                </td>
                <td class="px-8 py-6">
                    <div class="flex flex-col">
                        <span class="font-mono text-[11px] font-black text-stone-900 tracking-tighter uppercase italic italic">1100-00</span>
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">CASH & BANK</span>
                    </div>
                </td>
                <td class="px-8 py-6">
                    <p class="text-[12px] font-black text-stone-950 uppercase italic tracking-tight italic">Sales Receipt: INV-9901 / Customer: ForgeWorks Ltd</p>
                </td>
                <td class="px-8 py-6 text-right">
                    <span class="text-[14px] font-headline font-black text-stone-950 italic tracking-tighter leading-none">$12,500.00</span>
                </td>
                <td class="px-8 py-6 text-right">
                    <span class="text-[12px] font-black text-stone-200 tracking-widest uppercase italic italic">—</span>
                </td>
                <td class="px-8 py-6 text-center">
                    <span class="bg-stone-100 text-stone-400 text-[9px] font-black px-3 py-1 rounded-full tracking-[0.2em] border border-stone-200 group-hover:bg-primary group-hover:text-stone-950 group-hover:border-primary transition-all italic uppercase">AUTOMATIC</span>
                </td>
            </tr>
            <tr class="hover:bg-primary/5 transition-colors group">
                <td class="px-8 py-6 opacity-0 italic">2026-10-24</td>
                <td class="px-8 py-6 opacity-0 italic">#GJ-8842</td>
                <td class="px-8 py-6">
                    <div class="flex flex-col pl-8 border-l-2 border-stone-100 group-hover:border-primary transition-colors">
                        <span class="font-mono text-[11px] font-black text-stone-900 tracking-tighter uppercase italic italic">4000-01</span>
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">PRODUCT SALES - DOMESTIC</span>
                    </div>
                </td>
                <td class="px-8 py-6">
                    <p class="text-[11px] font-black text-stone-300 uppercase italic tracking-[0.1em] italic">CORRESPONDING CREDIT ENTRY</p>
                </td>
                <td class="px-8 py-6 text-right">
                    <span class="text-[12px] font-black text-stone-200 tracking-widest uppercase italic italic">—</span>
                </td>
                <td class="px-8 py-6 text-right">
                    <span class="text-[14px] font-headline font-black text-stone-950 italic tracking-tighter leading-none">$12,500.00</span>
                </td>
                <td class="px-8 py-6 text-center opacity-0 italic italic"></td>
            </tr>

            <!-- Manual Entries with warning style -->
            <tr class="bg-stone-50/50 hover:bg-orange-50/50 transition-colors group">
                <td class="px-8 py-6">
                    <span class="font-mono text-[11px] font-black text-stone-400 tracking-tighter uppercase italic italic">2026-10-23</span>
                </td>
                <td class="px-8 py-6 text-orange-600">
                    <span class="bg-orange-100 border border-orange-200 text-[10.5px] font-black px-3 py-1 rounded tracking-tighter font-mono italic uppercase">#GJ-8841</span>
                </td>
                <td class="px-8 py-6">
                    <div class="flex flex-col">
                        <span class="font-mono text-[11px] font-black text-stone-900 tracking-tighter uppercase italic italic">6100-05</span>
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest mt-1 italic italic">Office Maintenance</span>
                    </div>
                </td>
                <td class="px-8 py-6">
                    <p class="text-[12px] font-black text-stone-950 uppercase italic tracking-tight italic italic">Quarterly AC Service Adjustment - Manual Correction</p>
                </td>
                <td class="px-8 py-6 text-right">
                    <span class="text-[14px] font-headline font-black text-stone-950 italic tracking-tighter leading-none">$850.00</span>
                </td>
                <td class="px-8 py-6 text-right">
                    <span class="text-[12px] font-black text-stone-200 tracking-widest uppercase italic italic">—</span>
                </td>
                <td class="px-8 py-6 text-center italic italic">
                    <span class="bg-orange-600 text-white text-[9px] font-black px-3 py-1 rounded-full tracking-[0.2em] italic uppercase">MANUAL</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Pagination / Status Footer -->
<div class="mt-12 flex flex-col md:flex-row items-center justify-between gap-8">
    <div class="flex items-center gap-6">
        <button class="w-12 h-12 flex items-center justify-center border border-stone-200 bg-white hover:border-stone-950 hover:text-stone-950 text-stone-400 rounded-xl transition-all shadow-sm"><span class="material-symbols-outlined">chevron_left</span></button>
        <div class="flex gap-2">
            <span class="w-12 h-12 flex items-center justify-center bg-stone-950 text-primary font-black rounded-xl text-[12px] italic uppercase">1</span>
            <span class="w-12 h-12 flex items-center justify-center bg-white border border-stone-200 text-stone-400 font-black rounded-xl text-[12px] hover:border-stone-950 hover:text-stone-950 cursor-pointer transition-all italic uppercase">2</span>
            <span class="w-12 h-12 flex items-center justify-center bg-white border border-stone-200 text-stone-400 font-black rounded-xl text-[12px] hover:border-stone-950 hover:text-stone-950 cursor-pointer transition-all italic uppercase">3</span>
        </div>
        <button class="w-12 h-12 flex items-center justify-center border border-stone-200 bg-white hover:border-stone-950 hover:text-stone-950 text-stone-400 rounded-xl transition-all shadow-sm"><span class="material-symbols-outlined">chevron_right</span></button>
    </div>
    <div class="flex items-center gap-10 text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 italic">
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
            <span>System Integrity Secured</span>
        </div>
        <div>Auditing 50 of 1,242 entries</div>
        <button class="flex items-center gap-2 text-primary hover:text-stone-950 transition-colors uppercase italic italic">
            <span class="material-symbols-outlined text-[16px]">download</span>
            <span>Export Ledger (PDF/CSV)</span>
        </button>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('erp/js/libro-diario.js') }}"></script>
    <style>
        .account-row { transition: background-color 0.2s; }
    </style>
@endpush
