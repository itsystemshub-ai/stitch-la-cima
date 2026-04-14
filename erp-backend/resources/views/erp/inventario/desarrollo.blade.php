@extends('erp.layouts.app')

@section('title', 'Desarrollo de Nuevos Items')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Desarrollo</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Research & Development -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Pipeline de Nuevas Incorporaciones</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Módulo <span class="text-stone-400">Desarrollo</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all active:scale-95 group/btn">
                Añadir para Investigación
                <span class="material-symbols-outlined text-[16px] ml-2 inline-block group-hover:rotate-12 transition-transform">add_circle</span>
            </button>
        </div>
    </div>

    <!-- R&D Metrics -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Items en Análisis Actual</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 uppercase">{{ $products->count() }} Artículos</h3>
            <div class="mt-4 flex items-center gap-2 text-stone-400 font-bold text-[10px] uppercase">
                <span class="material-symbols-outlined text-xs">biotech</span>
                Fase de Verificación Técnica
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Tasa de Aprobación</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 uppercase">85%</h3>
            <div class="mt-4 flex items-center gap-2 text-green-600 font-bold text-[10px] uppercase">
                <span class="material-symbols-outlined text-xs">check_circle</span>
                Alta Viabilidad de Mercado
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-stone-900 p-8 rounded-[32px] shadow-xl relative overflow-hidden group">
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Presupuesto de Inversión</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase tracking-tight">$ 12,500.00</h3>
            <div class="mt-4 flex items-center gap-2 text-stone-500 font-bold text-[10px] uppercase">
                <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                Proyección Q2 2024
            </div>
        </div>
    </div>

    <!-- Development Pipeline Table -->
    <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 flex justify-between items-center bg-stone-50/30">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Items en Proceso de Incorporación</h3>
            <div class="flex gap-4 text-[10px] font-black uppercase tracking-widest text-stone-400">
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-amber-400 rounded-full"></span> Análisis</span>
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-blue-400 rounded-full"></span> Cotización</span>
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-green-400 rounded-full"></span> Aprobado</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-400">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Referencia / OEM</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Descripción del Item</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Procedencia Expected</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Estatus</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-right">Costo Estimado</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 font-body text-xs">
                    @forelse($products as $product)
                        <tr class="hover:bg-stone-50 transition-colors group">
                            <td class="p-6 font-black text-stone-900 uppercase tracking-tighter">{{ $product->codigo_oem }}</td>
                            <td class="p-6">
                                <span class="text-[10px] font-black text-stone-900 uppercase block mb-1">{{ $product->nombre }}</span>
                                <span class="text-[9px] text-stone-400 font-bold uppercase tracking-widest underline decoration-primary decoration-2">
                                    {{ $product->development_notes ?? 'En espera de especificaciones' }}
                                </span>
                            </td>
                            <td class="p-6 text-stone-400 font-bold uppercase tracking-widest">{{ $product->marca ?? 'N/A' }}</td>
                            <td class="p-6 text-center">
                                <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-lg font-black text-[9px] uppercase border border-amber-100">En Análisis</span>
                            </td>
                            <td class="p-6 text-right font-headline font-black text-stone-900 text-base">$ {{ number_format($product->precio_mayor, 2) }}</td>
                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="w-8 h-8 rounded-full border border-stone-200 flex items-center justify-center hover:bg-stone-900 hover:text-primary transition-all" title="Ver Ficha Técnica">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                    </button>
                                    <form action="{{ route('erp.inventario.desarrollo.promote', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-8 h-8 rounded-full border border-primary/20 bg-primary/5 flex items-center justify-center hover:bg-stone-900 hover:text-primary transition-all text-primary" title="Promover al Maestro">
                                            <span class="material-symbols-outlined text-sm">rocket_launch</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-stone-400 uppercase font-black text-[10px] tracking-widest italic">
                                No hay items en el pipeline de desarrollo actualmente
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Contextual Guidance -->
    <div class="bg-primary/10 border border-primary/20 p-8 rounded-[32px] flex items-center gap-8 mb-12">
        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg shrink-0">
            <span class="material-symbols-outlined text-stone-900 text-3xl">lightbulb</span>
        </div>
        <div>
            <h4 class="text-lg font-headline font-black text-stone-900 uppercase mb-1">Estrategia de Crecimiento de SKU</h4>
            <p class="text-xs text-stone-600 font-medium leading-relaxed">Utilice este módulo para centralizar las investigaciones de mercado. Una vez validada la viabilidad técnica y comercial, el ítem podrá ser promovido al **Maestro de Productos** con un solo clic, garantizando la integridad de la base de datos.</p>
        </div>
    </div>
@endsection
