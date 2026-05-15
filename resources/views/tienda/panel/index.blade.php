@extends('tienda.panel.layout')
@section('title', 'Dashboard - Mi Cuenta')
@section('panel_content')
<div class="animate-reveal">
    <header class="mb-20">
        <div class="flex items-center gap-4 mb-4">
            <span class="w-12 h-[1px] bg-black/10"></span>
            <span class="text-stone-400 font-black text-[10px] uppercase tracking-[0.5em] italic">Platinum Corporate Terminal</span>
        </div>
        <h1 class="text-6xl font-display font-black text-black uppercase tracking-tighter leading-none">
            Welcome, <span class="font-light text-stone-300 italic">{{ explode(' ', auth()->user()->name)[0] }}</span>
        </h1>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-20">
        <!-- Luxury KPI: Orders -->
        <div class="bg-white rounded-[48px] p-12 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-stone-100 group hover:scale-[1.02] transition-all duration-700">
            <div class="flex justify-between items-start mb-8">
                <p class="text-[10px] font-black text-stone-300 uppercase tracking-[0.4em] italic leading-none">Global Orders</p>
                <span class="material-symbols-outlined text-stone-200 group-hover:text-black transition-colors">shopping_cart</span>
            </div>
            <p class="text-6xl font-display font-black text-black tracking-tighter leading-none mb-2">{{ $ordenesTotales }}</p>
            <p class="text-[9px] font-bold text-stone-400 uppercase tracking-widest leading-none">Unidades Procesadas</p>
        </div>

        <!-- Luxury KPI: Investment -->
        <div class="bg-white rounded-[48px] p-12 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-stone-100 group hover:scale-[1.02] transition-all duration-700">
            <div class="flex justify-between items-start mb-8">
                <p class="text-[10px] font-black text-stone-300 uppercase tracking-[0.4em] italic leading-none">Total Investment</p>
                <span class="material-symbols-outlined text-stone-200 group-hover:text-black transition-colors">account_balance_wallet</span>
            </div>
            <p class="text-4xl font-display font-black text-black tracking-tighter leading-none mb-2">$ {{ number_format($saldoTotal, 2) }}</p>
            <p class="text-[9px] font-bold text-stone-400 uppercase tracking-widest leading-none">Capital Movilizado</p>
        </div>

        <!-- Luxury KPI: Status -->
        <div class="bg-black rounded-[48px] p-12 shadow-2xl group hover:shadow-black/20 transition-all duration-700">
            <div class="flex justify-between items-start mb-8">
                <p class="text-[10px] font-black text-white/30 uppercase tracking-[0.4em] italic leading-none">Account Status</p>
                <span class="material-symbols-outlined text-white/20">verified</span>
            </div>
            <p class="text-3xl font-display font-black text-white tracking-tighter leading-none mb-2 italic">PLATINUM <br/> MEMBER</p>
            <div class="w-full bg-white/10 h-[2px] mt-4 overflow-hidden rounded-full">
                <div class="bg-white h-full w-[85%] animate-pulse"></div>
            </div>
        </div>

        <!-- Luxury KPI: Action -->
        <a href="{{ url('/tienda/index') }}" class="bg-stone-50 rounded-[48px] p-12 border border-dashed border-stone-200 group hover:bg-white hover:border-black transition-all duration-500 flex flex-col justify-between">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] italic">Open Catalog</p>
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-black text-stone-900 uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform">Nueva Orden</span>
                <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center border border-stone-100 group-hover:bg-black group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-base">add</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Luxury Table Section -->
    <div class="bg-white rounded-[64px] shadow-[0_50px_100px_-20px_rgba(0,0,0,0.08)] border border-stone-100 overflow-hidden">
        <div class="p-16 border-b border-stone-50 flex items-center justify-between bg-stone-50/30">
            <div class="flex items-center gap-6">
                <div class="w-1.5 h-12 bg-black rounded-full"></div>
                <div>
                    <h2 class="text-[18px] font-black text-black uppercase tracking-tight italic leading-none">Recent Activity</h2>
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-[0.3em] mt-2 italic">Logística y Despacho en tiempo real</p>
                </div>
            </div>
            <a href="{{ route('tienda.panel.ordenes') }}" class="text-[10px] font-black text-black uppercase tracking-[0.3em] bg-white border border-stone-200 px-10 py-5 rounded-full hover:bg-black hover:text-white transition-all duration-500 shadow-sm">View Archive</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-stone-300 uppercase tracking-[0.4em] italic">
                        <th class="py-10 px-16">Registry ID</th>
                        <th class="py-10 px-16">Date</th>
                        <th class="py-10 px-16">Cargo Info</th>
                        <th class="py-10 px-16 text-right">Investment</th>
                        <th class="py-10 px-16 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    @forelse($ordenes as $orden)
                    <tr class="group hover:bg-stone-50/50 transition-all">
                        <td class="py-10 px-16">
                            <span class="font-mono text-[12px] font-black text-stone-300 group-hover:text-black transition-colors">ZN-{{ str_pad($orden->id, 8, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="py-10 px-16">
                            <span class="text-[11px] font-black text-stone-400 uppercase tracking-widest">{{ $orden->created_at->format('d M, Y') }}</span>
                        </td>
                        <td class="py-10 px-16">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-stone-100"></div>
                                <span class="text-[13px] font-black text-black uppercase tracking-tight">{{ $orden->items_count ?? 0 }} SKUs Procesados</span>
                            </div>
                        </td>
                        <td class="py-10 px-16 text-right">
                            <span class="text-2xl font-display font-black text-black tracking-tighter">$ {{ number_format($orden->total, 2) }}</span>
                        </td>
                        <td class="py-10 px-16 text-center">
                            <span class="inline-flex items-center gap-3 px-6 py-3 rounded-full text-[10px] font-black uppercase tracking-[0.2em] border transition-all
                                @if($orden->estado == 'Entregado') bg-black text-white border-black 
                                @elseif($orden->estado == 'Pendiente') bg-stone-50 text-stone-400 border-stone-200 
                                @else bg-white text-red-500 border-red-100 @endif">
                                {{ $orden->estado }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-48 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <span class="material-symbols-outlined text-5xl text-stone-100">inventory</span>
                                <span class="text-[12px] font-black text-stone-200 uppercase tracking-[0.6em] italic">No Logistics Found</span>
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
    .no-scrollbar::-webkit-scrollbar { display: none; }
</style>
@endsection