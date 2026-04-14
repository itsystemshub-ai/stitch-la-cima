@extends('erp.layouts.app')

@section('title', 'Procesar Orden')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Procesamiento de Orden</span>
@endsection

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Progress Steps -->
        <div class="flex items-center justify-between mb-12 px-12">
            <div class="flex flex-col items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-stone-900 font-black shadow-[0_0_20px_rgba(255,215,0,0.3)]">1</div>
                <span class="text-[9px] font-black text-stone-900 uppercase tracking-widest">Validación</span>
            </div>
            <div class="flex-1 h-[2px] bg-stone-100 mx-4"></div>
            <div class="flex flex-col items-center gap-3">
                <div class="w-10 h-10 bg-stone-100 rounded-full flex items-center justify-center text-stone-400 font-black">2</div>
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Facturación</span>
            </div>
            <div class="flex-1 h-[2px] bg-stone-100 mx-4"></div>
            <div class="flex flex-col items-center gap-3">
                <div class="w-10 h-10 bg-stone-100 rounded-full flex items-center justify-center text-stone-400 font-black">3</div>
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Despacho</span>
            </div>
        </div>

        <!-- Main Form Grid -->
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 lg:col-span-8 space-y-8">
                <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm">
                    <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em] mb-8 border-b border-stone-50 pb-4 italic">Detalle de Transacción</h3>
                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Número de Orden</label>
                                <p class="text-xl font-headline font-black text-stone-900">#ORD-2023-9941</p>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Fecha Estimada</label>
                                <p class="text-xl font-headline font-black text-stone-400">15 ABR 2023</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-stone-900 p-10 rounded-[40px] shadow-2xl relative overflow-hidden">
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <p class="text-[10px] font-black text-primary uppercase tracking-[0.3em] mb-2">Total a Procesar</p>
                            <h2 class="text-5xl font-headline font-black text-white">$1,450.<span class="text-stone-500">00</span></h2>
                        </div>
                        <button class="bg-primary text-stone-900 px-12 py-5 text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:scale-105 transition-all shadow-xl">
                            Generar Factura
                        </button>
                    </div>
                    <!-- Decorative background element -->
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
                </div>
            </div>

            <!-- Summary Sidebar -->
            <div class="col-span-12 lg:col-span-4 bg-stone-50 border border-stone-100 p-8 rounded-[32px]">
                <h4 class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mb-6 border-b border-stone-200 pb-4">Resumen de Cliente Rápido</h4>
                <div class="space-y-4">
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-stone-400 uppercase">RIF</span>
                        <span class="text-sm font-bold text-stone-900 uppercase">J-40308741-5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
