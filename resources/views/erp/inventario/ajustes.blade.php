@extends('erp.layouts.app')

@section('title', 'Ajustes de Stock')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Ajustes de Stock</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Inventory Balancing -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Módulo de Corrección de Existencias</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Ajustes de <span class="text-stone-400">Stock</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
            <div class="bg-stone-900 px-6 py-4 flex flex-col items-end rounded-2xl shadow-xl">
                <span class="text-[10px] font-black text-primary uppercase tracking-widest opacity-80">Estatus de Auditoría</span>
                <span class="text-xs font-headline font-black text-white uppercase tracking-tighter mt-1 italic">Consistencia: 99.4%</span>
            </div>
        </div>
    </div>

    <!-- Interface Bento Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <!-- Adjustment Form (8 cols) -->
        <div class="col-span-12 lg:col-span-8 space-y-8">
            <section class="bg-white border border-stone-200 p-10 rounded-[32px] shadow-sm relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-2 h-full bg-primary transform origin-bottom scale-y-0 group-hover:scale-y-100 transition-transform duration-500"></div>
                
                <h3 class="text-sm font-black text-stone-400 uppercase tracking-[0.2em] mb-10 border-b border-stone-50 pb-4">Parámetros del Movimiento Interno</h3>
                
                <form action="{{ route('erp.inventario.ajustes.process') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    @csrf
                    <div class="col-span-2 space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Identificación del Producto (SKU / Nombre)</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400 group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">inventory_2</span>
                            </span>
                            <select name="product_id" required class="w-full bg-stone-50 border-none rounded-xl py-4 pl-12 pr-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all appearance-none cursor-pointer">
                                <option value="" disabled selected>Seleccione producto del maestro...</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->codigo_oem }} - {{ $product->nombre }} (Stock: {{ number_format($product->stock_actual, 0) }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Naturaleza del Ajuste</label>
                        <div class="relative group">
                            <select name="type" required class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all appearance-none cursor-pointer">
                                <option value="IN">ENTRADA POR CORRECCIÓN FISCAL (+)</option>
                                <option value="OUT">SALIDA POR MERMA / DAÑO TÉCNICO (-)</option>
                                <option value="ADJUST">ESTABLECER EXISTENCIA REAL (=)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none group-hover:text-primary transition-colors">expand_more</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Cantidad a Afectar</label>
                        <div class="relative">
                            <input name="quantity" required class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-black text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all" type="number" step="0.01" value="0"/>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-stone-300 uppercase tracking-tighter">Unidades (UND)</span>
                        </div>
                    </div>

                    <div class="col-span-2 space-y-3">
                        <label class="block text-[10px] font-black text-stone-400 uppercase tracking-widest">Justificación Técnica (Auditoria Obligatoria)</label>
                        <textarea name="reason" required class="w-full bg-stone-50 border-none rounded-xl py-4 px-5 text-sm font-bold text-stone-900 focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-stone-300 h-32" placeholder="Describa el motivo detallado de esta variación de stock para el registro histórico..."></textarea>
                    </div>

                    <div class="col-span-2 mt-4 flex justify-end gap-4 pt-8 border-t border-stone-50">
                        <button type="reset" class="bg-white text-stone-400 px-8 py-4 text-[10px] font-black uppercase tracking-widest border border-stone-100 rounded-xl hover:bg-stone-50 transition-all">Limpiar</button>
                        <button type="submit" class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all active:scale-95 group/btn">
                            Proceder con el Ajuste
                            <span class="material-symbols-outlined text-[16px] ml-2 inline-block group-hover:rotate-12 transition-transform">published_with_changes</span>
                        </button>
                    </div>
                </form>
            </section>
        </div>

        <!-- Lateral Insights (4 cols) -->
        <div class="col-span-12 lg:col-span-4 space-y-8">
            <!-- Summary Card -->
            <section class="bg-white border border-stone-200 p-10 rounded-[40px] shadow-sm">
                <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-8">Bitácora de Variaciones Recientes</h3>
                <div class="space-y-6">
                    <div class="flex items-center gap-5 group cursor-pointer border-b border-stone-50 pb-6 last:border-0 last:pb-0">
                        <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center shrink-0 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                            <span class="material-symbols-outlined text-xl">remove</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1">
                                <p class="text-[10px] font-black text-stone-900 uppercase">Salida -5 Unidades</p>
                                <span class="text-[8px] font-black text-stone-300 uppercase tracking-widest">En Bodega</span>
                            </div>
                            <p class="text-[9px] font-bold text-stone-400 uppercase leading-none">Bomba de Agua TYT-2024</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-5 group cursor-pointer border-b border-stone-50 pb-6 last:border-0 last:pb-0">
                        <div class="w-12 h-12 rounded-2xl bg-primary/10 text-stone-900 flex items-center justify-center shrink-0 group-hover:bg-stone-900 group-hover:text-primary transition-all duration-300">
                            <span class="material-symbols-outlined text-xl">add</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1">
                                <p class="text-[10px] font-black text-stone-900 uppercase">Entrada +12 Unidades</p>
                                <span class="text-[8px] font-black text-stone-300 uppercase tracking-widest">Recepción</span>
                            </div>
                            <p class="text-[9px] font-bold text-stone-400 uppercase leading-none">Filtro de Aceite Premium Master</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Compliance Policy -->
            <section class="bg-stone-950 p-10 rounded-[40px] shadow-2xl relative overflow-hidden group/policy">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary/5 blur-[100px] rounded-full"></div>
                
                <h3 class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-8 flex items-center gap-3">
                    <span class="material-symbols-outlined text-sm">enhanced_encryption</span>
                    Política de Integridad
                </h3>
                
                <p class="text-[10px] text-stone-400 font-bold leading-relaxed uppercase tracking-wider mb-8">
                    Todo ajuste manual genera una huella de auditoría inalterable. Este proceso afecta el costo promedio y debe ser validado por la gerencia de operaciones según Art. 177 de la Ley de Impuesto sobre la Renta.
                </p>
                
                <div class="bg-white/5 border border-white/5 p-6 rounded-2xl text-center">
                    <span class="text-[8px] font-black text-stone-600 uppercase tracking-widest block mb-1">Próximo Inventario General</span>
                    <p class="text-xl font-headline font-black text-white">12 SEP 2024</p>
                </div>
            </section>
        </div>
    </div>

    <!-- Telemetry Insights Footer: Global Consistency -->
    <div class="relative bg-stone-900 p-10 md:p-16 rounded-[40px] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] group/footer mb-12">
        <div class="absolute -right-20 top-0 opacity-10 select-none pointer-events-none transform group-hover/footer:rotate-12 transition-transform duration-1000">
            <span class="text-[20rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">CIMA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-16 items-center">
            <div>
                <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-2xl font-black">troubleshoot</span>
                </div>
                <h2 class="text-4xl font-headline font-black text-white uppercase tracking-tight mb-6 leading-none">Análisis de <br> <span class="text-primary tracking-widest">Sincronización</span></h2>
                <p class="text-xs text-stone-400 leading-relaxed font-bold uppercase tracking-wider font-body">Monitoreo y normalización automática de discrepancias entre el sistema digital y la realidad física del almacén.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-primary transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest">Precisión Stock</span>
                        <span class="material-symbols-outlined text-stone-500 group-hover:text-stone-900">verified</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-900/60 uppercase mb-1">Índice Global</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">99.42%</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-900 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary group-hover/card:bg-stone-900 rounded-full animate-pulse"></span>
                        Firma Digital Activa
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-white transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest">Auditoría ERP</span>
                        <span class="material-symbols-outlined text-primary group-hover:text-primary">shield_lock</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-400 uppercase mb-1">Transacciones</p>
                    <h4 class="text-3xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">Blindado</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-400 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                        Consistencia SSLv3
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
