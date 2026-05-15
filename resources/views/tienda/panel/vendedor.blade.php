@extends('tienda.panel.layout')
@section('title', 'Panel Vendedor')
@section('panel_content')
<div class="animate-reveal">
    <header class="mb-20">
        <div class="flex items-center gap-4 mb-4">
            <span class="w-12 h-[1px] bg-black/10"></span>
            <span class="text-stone-400 font-black text-[10px] uppercase tracking-[0.5em] italic">Comercial Intelligence Division</span>
        </div>
        <h1 class="text-6xl font-display font-black text-black uppercase tracking-tighter leading-none">
            Commercial <span class="font-light text-stone-300 italic">Terminal</span>
        </h1>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-20">
        <!-- Luxury KPI: Total Sales -->
        <div class="bg-white rounded-[48px] p-12 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-stone-100 group hover:scale-[1.02] transition-all duration-700">
            <div class="flex justify-between items-start mb-8">
                <p class="text-[10px] font-black text-stone-300 uppercase tracking-[0.4em] italic leading-none">Accumulated Volume</p>
                <div class="w-10 h-10 rounded-xl bg-stone-50 flex items-center justify-center group-hover:bg-black group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-base">monitoring</span>
                </div>
            </div>
            <p class="text-5xl font-display font-black text-black tracking-tighter leading-none mb-2">{{ $totalVentas }} <span class="text-[11px] text-stone-200 tracking-widest">UNIT</span></p>
            <p class="text-[9px] font-bold text-stone-400 uppercase tracking-widest leading-none">Transacciones Totales</p>
        </div>

        <!-- Luxury KPI: Monthly Sales -->
        <div class="bg-white rounded-[48px] p-12 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-stone-100 group hover:scale-[1.02] transition-all duration-700">
            <div class="flex justify-between items-start mb-8">
                <p class="text-[10px] font-black text-stone-300 uppercase tracking-[0.4em] italic leading-none">Monthly Performance</p>
                <div class="w-10 h-10 rounded-xl bg-stone-50 flex items-center justify-center group-hover:bg-black group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-base">calendar_today</span>
                </div>
            </div>
            <p class="text-5xl font-display font-black text-black tracking-tighter leading-none mb-2">{{ $ventasDelMes }} <span class="text-[11px] text-stone-200 tracking-widest">SALE</span></p>
            <p class="text-[9px] font-bold text-stone-400 uppercase tracking-widest leading-none">Operaciones del Mes</p>
        </div>

        <!-- Luxury KPI: Commissions -->
        <div class="bg-black rounded-[48px] p-12 shadow-2xl group hover:shadow-black/20 transition-all duration-700 relative overflow-hidden">
            <div class="flex justify-between items-start mb-8 relative z-10">
                <p class="text-[10px] font-black text-white/30 uppercase tracking-[0.4em] italic leading-none">Net Incentives</p>
                <span class="material-symbols-outlined text-white/20">payments</span>
            </div>
            <p class="text-4xl font-display font-black text-white tracking-tighter leading-none mb-2 relative z-10">$ {{ number_format($comisionTotal, 2) }}</p>
            <p class="text-[9px] font-bold text-white/30 uppercase tracking-widest leading-none relative z-10">Comisión Acumulada</p>
            
            <div class="absolute -right-4 -bottom-4 opacity-5">
                 <span class="material-symbols-outlined text-8xl text-white">diamond</span>
            </div>
        </div>
    </div>

    <!-- Luxury Sales Table -->
    <div class="bg-white rounded-[64px] shadow-[0_50px_100px_-20px_rgba(0,0,0,0.08)] border border-stone-100 overflow-hidden">
        <div class="p-16 border-b border-stone-50 flex items-center justify-between bg-stone-50/30">
            <div class="flex items-center gap-6">
                <div class="w-1.5 h-12 bg-black rounded-full"></div>
                <div>
                    <h2 class="text-[18px] font-black text-black uppercase tracking-tight italic leading-none">Management Log</h2>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-[0.3em] mt-2 italic">Registro de operaciones comerciales verificadas</p>
                </div>
            </div>
            <button class="text-[10px] font-black text-black uppercase tracking-[0.3em] bg-white border border-stone-200 px-10 py-5 rounded-full hover:bg-black hover:text-white transition-all duration-500 shadow-sm">Export Data</button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-stone-300 uppercase tracking-[0.4em] italic">
                        <th class="py-10 px-16">Transaction</th>
                        <th class="py-10 px-16">Client Entity</th>
                        <th class="py-10 px-16">Timestamp</th>
                        <th class="py-10 px-16 text-right">Investment</th>
                        <th class="py-10 px-16 text-center">Incentive</th>
                        <th class="py-10 px-16 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    @forelse($misVentas as $venta)
                    <tr class="group hover:bg-stone-50/50 transition-all">
                        <td class="py-10 px-16">
                            <span class="font-mono text-[12px] font-black text-stone-300 group-hover:text-black transition-colors">ZN-SL-{{ str_pad($venta->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="py-10 px-16">
                            <div class="flex flex-col">
                                <span class="text-[15px] font-black text-black uppercase tracking-tight leading-none mb-1">{{ $venta->customer->name ?? 'INSTITUTIONAL' }}</span>
                                <span class="text-[9px] font-bold text-stone-300 uppercase tracking-widest leading-none">ID: {{ $venta->customer->document_number ?? '000000' }}</span>
                            </div>
                        </td>
                        <td class="py-10 px-16">
                            <span class="text-[11px] font-black text-stone-400 uppercase tracking-widest">{{ $venta->created_at->format('d/m/Y') }}</span>
                        </td>
                        <td class="py-10 px-16 text-right">
                            <span class="text-2xl font-display font-black text-black tracking-tighter leading-none">$ {{ number_format($venta->total_amount, 2) }}</span>
                        </td>
                        <td class="py-10 px-16 text-center">
                            <span class="inline-flex items-center font-mono text-[11px] font-black text-black bg-stone-100 px-4 py-2 rounded-lg border border-stone-200">+ $ {{ number_format($venta->commission_amount, 2) }}</span>
                        </td>
                        <td class="py-10 px-16 text-center">
                            <span class="inline-flex items-center gap-3 px-6 py-3 rounded-full text-[10px] font-black uppercase tracking-[0.2em] border transition-all
                                @if($venta->status == 'completed') bg-black text-white border-black 
                                @elseif($venta->status == 'pending') bg-stone-50 text-stone-400 border-stone-200 
                                @else bg-white text-red-500 border-red-100 @endif">
                                {{ $venta->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-48 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <span class="material-symbols-outlined text-5xl text-stone-100">receipt</span>
                                <span class="text-[12px] font-black text-stone-200 uppercase tracking-[0.6em] italic">No Transactions Logged</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @keyframes reveal { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .animate-reveal { animation: reveal 1s cubic-bezier(0.2, 1, 0.3, 1) forwards; }
</style>
@endsection