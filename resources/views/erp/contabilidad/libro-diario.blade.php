@extends('erp.layouts.app')

@section('title', 'Libro Diario | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/contabilidad') }}" class="hover:text-stone-900">Contabilidad</a>
    <span class="material-symbols-outlined text-sm">chevron_right</span>
    <span class="text-stone-900 font-medium">Libro Diario</span>
@endsection

@section('content')
<!-- Header & Stats: Industrial Magnitude Analysis -->
<div class="mb-16 relative z-10">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-12">
        <div>
            <div class="flex items-center gap-4 mb-6">
                <span class="bg-primary/20 text-primary border border-primary/30 px-5 py-1.5 text-[12px] font-black uppercase tracking-[0.4em] italic">JOURNAL_OVERSIGHT_V1</span>
                <span class="text-stone-500 font-mono text-[11px] uppercase tracking-widest italic">STREAM_ID: ERP_TRANS_0x22F4</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-headline font-black tracking-tighter uppercase italic text-white mb-6">GENERAL_JOURNAL</h1>
            <p class="text-[14px] font-black text-stone-500 uppercase tracking-[0.5em] italic">MAYOR DE REPUESTO LA CIMA <span class="text-primary/40 not-italic">•</span> AUDITORÍA_ACTIVA_TRANSMISSION</p>
        </div>
        
        <!-- Total Magnitude Bento Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 bg-stone-900/50 p-6 rounded-[40px] border border-white/5 backdrop-blur-2xl">
            <div class="bg-stone-950/40 p-8 rounded-[30px] border border-white/5 flex flex-col min-w-[200px] group transition-all hover:bg-stone-950 shadow-2xl">
                <span class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] italic mb-4 group-hover:text-stone-400">Total_Debits</span>
                <span class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none">$1.240.502,50</span>
            </div>
            <div class="bg-stone-950/40 p-8 rounded-[30px] border border-white/5 flex flex-col min-w-[200px] group transition-all hover:bg-stone-950 shadow-2xl">
                <span class="text-[12px] font-black text-stone-600 uppercase tracking-[0.4em] italic mb-4 group-hover:text-stone-400">Total_Credits</span>
                <span class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none">$1.240.502,50</span>
            </div>
            <div class="bg-primary/5 p-8 rounded-[30px] border border-primary/20 flex flex-col min-w-[200px] group transition-all hover:bg-primary/10 shadow-2xl">
                <span class="text-[12px] font-black text-primary/60 uppercase tracking-[0.4em] italic mb-4 group-hover:text-primary">Auto_Sync</span>
                <span class="text-3xl font-headline font-black text-primary italic tracking-tighter leading-none">142</span>
            </div>
            <div class="bg-red-500/5 p-8 rounded-[30px] border border-red-500/20 flex flex-col min-w-[200px] group transition-all hover:bg-red-500/10 shadow-2xl">
                <span class="text-[12px] font-black text-red-500/60 uppercase tracking-[0.4em] italic mb-4 group-hover:text-red-500">Manual_Cor</span>
                <span class="text-3xl font-headline font-black text-red-500 italic tracking-tighter leading-none">18</span>
            </div>
        </div>
    </div>
</div>

<!-- Filter Controls: Strategic Observation -->
<div class="bg-stone-900 border border-stone-800 rounded-[40px] p-10 mb-16 flex flex-wrap items-end gap-10 shadow-2xl relative overflow-hidden group">
    <div class="absolute inset-0 bg-primary/2 opacity-0 group-hover:opacity-100 transition-opacity"></div>
    <div class="flex-1 min-w-[400px] relative z-10">
        <label class="block text-[12px] font-black text-stone-500 uppercase mb-4 tracking-[0.4em] italic">Search_Registry_Account_Ref</label>
        <div class="relative">
            <input class="w-full bg-stone-950 border border-stone-800 focus:border-primary focus:ring-0 rounded-2xl h-16 px-14 text-[14px] font-black uppercase tracking-widest placeholder:text-stone-700 transition-all shadow-inner text-white" placeholder="ENTER_TRANSACTION_ID_OR_KEYWORDS..." type="text"/>
            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-stone-700">search</span>
        </div>
    </div>
    <div class="flex gap-6 relative z-10">
        <div class="min-w-[180px]">
            <label class="block text-[12px] font-black text-stone-500 uppercase mb-4 tracking-[0.4em] italic">Start_Cycle</label>
            <input class="w-full bg-stone-950 border border-stone-800 focus:border-primary focus:ring-0 rounded-2xl h-16 px-6 text-[12px] font-black uppercase shadow-inner text-white" type="date"/>
        </div>
        <div class="min-w-[180px]">
            <label class="block text-[12px] font-black text-stone-500 uppercase mb-4 tracking-[0.4em] italic">End_Cycle</label>
            <input class="w-full bg-stone-950 border border-stone-800 focus:border-primary focus:ring-0 rounded-2xl h-16 px-6 text-[12px] font-black uppercase shadow-inner text-white" type="date"/>
        </div>
    </div>
    <button class="bg-primary text-stone-950 h-16 px-12 rounded-2xl text-[12px] font-black uppercase tracking-[0.5em] hover:bg-primary/90 transition-all italic shadow-[0_0_30px_rgba(206,255,94,0.2)] relative z-10">
        EXECUTE_AUDIT
    </button>
</div>

<!-- Journal Entries Table: Fiduciary Feed -->
<div class="bg-stone-950 border border-stone-800 rounded-[40px] shadow-2xl relative overflow-hidden">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-stone-900/80 border-b border-white/5">
                <th class="px-10 py-8 text-left text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Fiscal_Cycle</th>
                <th class="px-10 py-8 text-left text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Node_Ref</th>
                <th class="px-10 py-8 text-left text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Account_Hierarchy</th>
                <th class="px-10 py-8 text-left text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Operational_Log</th>
                <th class="px-10 py-8 text-right text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Debit (+)</th>
                <th class="px-10 py-8 text-right text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Credit (-)</th>
                <th class="px-10 py-8 text-center text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">Proto</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5 font-mono">
            <!-- Seat Group 1 -->
            <tr class="hover:bg-primary/5 transition-all group/row">
                <td class="px-10 py-8">
                    <span class="text-[12px] font-black text-stone-600 group-hover/row:text-stone-300 italic">2026-10-24</span>
                </td>
                <td class="px-10 py-8">
                    <span class="bg-white/5 text-primary text-[12px] font-black px-4 py-2 rounded-xl border border-primary/20 italic uppercase tracking-tighter">#GJ-8842</span>
                </td>
                <td class="px-10 py-8">
                    <div class="flex flex-col">
                        <span class="text-[14px] font-black text-white italic tracking-tighter uppercase">1100-00</span>
                        <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest mt-1 italic group-hover/row:text-primary/60 transition-colors">CASH_BANK_NOD</span>
                    </div>
                </td>
                <td class="px-10 py-8">
                    <p class="text-[12px] font-black text-stone-400 group-hover/row:text-white uppercase italic tracking-tight transition-colors">Sale_Rec: INV-9901 / Customer: ForgeWorks_Ltd</p>
                </td>
                <td class="px-10 py-8 text-right">
                    <span class="text-[18px] font-black text-white italic tracking-tighter leading-none">12.500,00</span>
                </td>
                <td class="px-10 py-8 text-right">
                    <span class="text-[14px] font-black text-stone-800 tracking-widest uppercase italic">—</span>
                </td>
                <td class="px-10 py-8 text-center">
                    <div class="flex justify-center">
                        <span class="bg-primary/10 text-primary text-[11px] font-black px-4 py-1.5 rounded-full tracking-[0.3em] border border-primary/20 italic uppercase">AUTO</span>
                    </div>
                </td>
            </tr>
            <tr class="hover:bg-primary/5 transition-all group/row">
                <td class="px-10 py-8 opacity-0 italic">2026-10-24</td>
                <td class="px-10 py-8 opacity-0 italic">#GJ-8842</td>
                <td class="px-10 py-8">
                    <div class="flex flex-col pl-8 border-l-4 border-stone-800 group-hover/row:border-primary transition-all">
                        <span class="text-[14px] font-black text-white italic tracking-tighter uppercase">4000-01</span>
                        <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest mt-1 italic group-hover/row:text-primary/60">PRODUCT_SALES_DOM</span>
                    </div>
                </td>
                <td class="px-10 py-8">
                    <p class="text-[11px] font-black text-stone-700 uppercase italic tracking-[0.2em] italic group-hover/row:text-stone-500">CORR_CREDIT_ENTRY_MAG</p>
                </td>
                <td class="px-10 py-8 text-right">
                    <span class="text-[14px] font-black text-stone-800 tracking-widest uppercase italic">—</span>
                </td>
                <td class="px-10 py-8 text-right">
                    <span class="text-[18px] font-black text-white italic tracking-tighter leading-none">12.500,00</span>
                </td>
                <td class="px-10 py-8 text-center opacity-0 italic"></td>
            </tr>

            <!-- Manual Entries with warning style -->
            <tr class="bg-red-500/5 hover:bg-red-500/10 transition-all group/row border-y border-red-500/10">
                <td class="px-10 py-10">
                    <span class="text-[12px] font-black text-red-950 bg-red-500/20 px-3 py-1 rounded italic">2026-10-23</span>
                </td>
                <td class="px-10 py-10">
                    <span class="bg-red-500 text-stone-950 text-[12px] font-black px-4 py-2 rounded-xl border border-red-400 italic uppercase shadow-[0_0_20px_rgba(239,68,68,0.2)]">#GJ-8841</span>
                </td>
                <td class="px-10 py-10">
                    <div class="flex flex-col">
                        <span class="text-[14px] font-black text-red-500 italic tracking-tighter uppercase">6100-05</span>
                        <span class="text-[11px] font-black text-red-900 uppercase tracking-widest mt-1 italic">MAINTENANCE_LOG</span>
                    </div>
                </td>
                <td class="px-10 py-10">
                    <p class="text-[12px] font-black text-red-900 uppercase italic tracking-tight">Adjustment_Log: AC_SERVICE_REPAIR / MANUAL_CORRECTION</p>
                </td>
                <td class="px-10 py-10 text-right">
                    <span class="text-[20px] font-black text-red-500 italic tracking-tighter leading-none">850,00</span>
                </td>
                <td class="px-10 py-10 text-right">
                    <span class="text-[14px] font-black text-red-950/20 tracking-widest uppercase italic">—</span>
                </td>
                <td class="px-10 py-10 text-center">
                    <div class="flex justify-center">
                        <span class="bg-red-500 text-stone-950 text-[11px] font-black px-4 py-1.5 rounded-full tracking-[0.3em] italic uppercase">MANUAL</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Pagination / Status Footer -->
<div class="mt-16 flex flex-col md:flex-row items-center justify-between gap-12 border-t border-white/5 pt-12 opacity-80 hover:opacity-100 transition-opacity">
    <div class="flex items-center gap-4">
        <button class="w-16 h-16 flex items-center justify-center border border-stone-800 bg-stone-900 hover:border-primary hover:text-primary text-stone-600 rounded-2xl transition-all shadow-xl group">
            <span class="material-symbols-outlined group-hover:scale-125 transition-transform">chevron_left</span>
        </button>
        <div class="flex gap-3">
            <span class="w-16 h-16 flex items-center justify-center bg-primary text-stone-950 font-black rounded-2xl text-[14px] italic uppercase shadow-[0_0_30px_rgba(206,255,94,0.3)]">01</span>
            <span class="w-16 h-16 flex items-center justify-center bg-stone-900 border border-stone-800 text-stone-600 font-black rounded-2xl text-[14px] hover:border-white/20 hover:text-white cursor-pointer transition-all italic uppercase">02</span>
            <span class="w-16 h-16 flex items-center justify-center bg-stone-900 border border-stone-800 text-stone-600 font-black rounded-2xl text-[14px] hover:border-white/20 hover:text-white cursor-pointer transition-all italic uppercase">03</span>
        </div>
        <button class="w-16 h-16 flex items-center justify-center border border-stone-800 bg-stone-900 hover:border-primary hover:text-primary text-stone-600 rounded-2xl transition-all shadow-xl group">
            <span class="material-symbols-outlined group-hover:scale-125 transition-transform">chevron_right</span>
        </button>
    </div>
    
    <div class="flex items-center gap-12 text-[12px] font-black uppercase tracking-[0.4em] text-stone-500 italic">
        <div class="flex items-center gap-4 bg-stone-900/50 px-6 py-3 rounded-full border border-white/5">
            <div class="w-3 h-3 rounded-full bg-primary animate-pulse shadow-[0_0_10px_#ceff5e]"></div>
            <span class="group-hover:text-primary transition-colors">INTEGRIDAD_SISTEMA_SECURED</span>
        </div>
        <div class="font-mono text-stone-600">Auditing: 50/1.242_entries</div>
        <button class="flex items-center gap-4 text-primary hover:text-white transition-all uppercase italic group">
            <span class="material-symbols-outlined text-[20px] group-hover:scale-125 transition-transform">download</span>
            <span class="border-b border-primary/20 group-hover:border-white transition-colors tracking-[0.5em]">EXPORT_LEDGER (PDF)</span>
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
