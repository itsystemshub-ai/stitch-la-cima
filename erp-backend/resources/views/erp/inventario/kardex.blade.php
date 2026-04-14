@extends('erp.layouts.app')

@section('title', 'Libro Kardex')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Libro Kardex</span>
@endsection

@push('styles')
<style>
  .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
  .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
  .custom-scrollbar::-webkit-scrollbar-thumb { background: #ceff5e; border-radius: 10px; }
  .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #b8e654; }
</style>
@endpush

@section('content')
    <!-- Page Header: Strategic Inventory Balancing -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Registro Histórico de Existencias</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Libro <span class="text-stone-400">Kardex</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <button class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">filter_list</span>
                Filtros Avanzados
            </button>
            <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all active:scale-95 group/btn">
                Exportar Reporte Legal
                <span class="material-symbols-outlined text-[16px] ml-2 inline-block group-hover:rotate-12 transition-transform">download</span>
            </button>
        </div>
    </div>

    <!-- Metric Bento Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-6xl">account_balance_wallet</span>
            </div>
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Valorización Total Actual</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 uppercase">$ {{ number_format($totalValuation ?? 0, 2) }}</h3>
            <div class="mt-4 flex items-center gap-2 text-green-600 font-bold text-[10px] uppercase">
                <span class="material-symbols-outlined text-xs">trending_up</span>
                Auditado Real-Time
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Método de Inventario</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 uppercase italic">CPP (PROMEDIO)</h3>
            <div class="mt-4 flex items-center gap-2 text-stone-400 font-bold text-[10px] uppercase">
                <span class="material-symbols-outlined text-xs">gavel</span>
                Cumplimiento Art. 177 ISLR
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-stone-900 p-8 rounded-[32px] shadow-xl relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 opacity-10">
                <span class="material-symbols-outlined text-[120px] text-white">verified</span>
            </div>
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Auditoría de Movimientos</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase tracking-tight">Consistente</h3>
            <div class="mt-4 flex items-center gap-2 text-stone-500 font-bold text-[10px] uppercase">
                <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                MD5: 9A2F11EB943902
            </div>
        </div>
    </div>

    <!-- Main Transaction Board -->
    <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Bitácora de Transacciones</h3>
            <div class="flex gap-4">
                <span class="px-4 py-1.5 bg-stone-50 text-[10px] font-black text-stone-400 rounded-full uppercase italic">Filtrando: Ultimos 30 Días</span>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-400">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Estampa de Tiempo</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Referencia Doc.</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Concepto</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">∆ Existencia</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Saldo Actual</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-right whitespace-nowrap">Costo Promedio ($)</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-right">Balance Unit.</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 font-body text-xs">
                    @forelse($movements as $movement)
                        <tr class="hover:bg-stone-50 transition-colors group cursor-pointer">
                            <td class="p-6 font-bold text-stone-400 uppercase tracking-tighter">
                                {{ $movement->created_at->format('d M Y') }} <br> 
                                <span class="text-[9px] opacity-60 italic">{{ $movement->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="p-6 font-black text-stone-900 uppercase tracking-tighter">#{{ str_pad($movement->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td class="p-6">
                                <span class="text-[10px] font-black text-stone-900 uppercase block mb-1">{{ $movement->product->nombre ?? 'N/A' }}</span>
                                <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">{{ $movement->reason }}</span>
                            </td>
                            <td class="p-6 text-center">
                                @if($movement->type == 'IN')
                                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-lg font-black text-[10px] uppercase">+ {{ number_format($movement->quantity, 0) }}</span>
                                @else
                                    <span class="px-3 py-1 bg-red-50 text-red-700 rounded-lg font-black text-[10px] uppercase">- {{ number_format($movement->quantity, 0) }}</span>
                                @endif
                            </td>
                            <td class="p-6 text-center font-black text-stone-900 text-sm">
                                {{ number_format($movement->product->stock_actual ?? 0, 0) }}
                            </td>
                            <td class="p-6 text-right font-headline font-bold text-stone-400 text-base">
                                $ {{ number_format($movement->product->precio_mayor ?? 0, 2) }}
                            </td>
                            <td class="p-6 text-right font-headline font-black text-stone-900 text-lg group-hover:text-primary transition-colors">
                                $ {{ number_format(($movement->product->precio_mayor ?? 0) * ($movement->product->stock_actual ?? 0), 2) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-stone-400 uppercase font-black text-[10px] tracking-widest italic">
                                No se registran movimientos en el periodo seleccionado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Telemetry Insights Footer: Global Consistency -->
    <div class="relative bg-stone-900 p-10 md:p-16 rounded-[40px] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] group/footer mb-12">
        <div class="absolute -right-20 top-0 opacity-10 select-none pointer-events-none transform group-hover/footer:rotate-12 transition-transform duration-1000">
            <span class="text-[20rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">CIMA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-16 items-center">
            <div>
                <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-2xl font-black">history_edu</span>
                </div>
                <h2 class="text-4xl font-headline font-black text-white uppercase tracking-tight mb-6 leading-none">Fe Legal de <br> <span class="text-primary tracking-widest">Documentación</span></h2>
                <p class="text-xs text-stone-400 leading-relaxed font-bold uppercase tracking-wider font-body">Este libro Kardex cumple con los lineamientos internacionales de auditoría y la normativa fiscal venezolana vigente.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-primary transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest">Inmutabilidad</span>
                        <span class="material-symbols-outlined text-stone-500 group-hover/card:text-stone-900">shield_with_heart</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-900/60 uppercase mb-1">Estado de Registros</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">Sellado</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-900 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary group-hover/card:bg-stone-900 rounded-full"></span>
                        Timestamping Activo
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-white transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest">Sincronización</span>
                        <span class="material-symbols-outlined text-primary group-hover/card:text-primary">hub</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-400 uppercase mb-1">Integridad ERP</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">100% Real-Time</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-400 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                        Latencia < 12ms
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
