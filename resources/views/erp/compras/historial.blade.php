@extends('erp.layouts.app')

@section('title', 'Historial de Compras | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/compras') }}" class="hover:text-stone-900">Compras</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Historial de Órdenes</span>
@endsection

@section('content')
    <!-- Header: Strategic Sourcing History -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Logística de Adquisiciones de Repuestos</p>
            </div>
            <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Historial de <span class="text-stone-400">Órdenes</span></h2>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-stone-900 text-primary px-6 py-3 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:bg-stone-800 transition-all rounded-xl shadow-xl active:scale-95">
                <span class="material-symbols-outlined text-sm">download</span>
                Exportar Bitácora
            </button>
            <button class="bg-white border border-stone-200 text-stone-500 hover:text-stone-900 p-3 rounded-xl transition-all shadow-sm">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>
    </div>

    <!-- Analytical Bento Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-stone-900 p-8 rounded-2xl shadow-2xl relative overflow-hidden group">
            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary"></div>
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Gasto Mensual Consolidado</p>
            <div class="flex items-baseline gap-2">
                <h4 class="text-4xl font-headline font-black text-white">$142.8k</h4>
                <span class="text-[10px] text-primary font-bold uppercase tracking-tighter">▲ 12.4%</span>
            </div>
            <p class="text-[9px] text-stone-500 font-bold uppercase mt-4">Corte: Octubre 2026</p>
        </div>
        
        <div class="bg-white border border-stone-200 p-8 rounded-2xl shadow-sm">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Eficiencia en Suministro</p>
            <div class="flex items-baseline gap-2">
                <h4 class="text-4xl font-headline font-black text-stone-900">94.2%</h4>
            </div>
            <div class="w-full bg-stone-100 h-1.5 rounded-full mt-4 overflow-hidden">
                <div class="bg-stone-900 h-full w-[94%]"></div>
            </div>
            <p class="text-[9px] text-stone-400 font-bold uppercase mt-4">Cumplimiento de Entregas</p>
        </div>

        <div class="bg-white border border-stone-200 p-8 rounded-2xl shadow-sm">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Órdenes Pendientes</p>
            <div class="flex items-baseline gap-2">
                <h4 class="text-4xl font-headline font-black text-stone-900">24</h4>
                <span class="text-[10px] text-red-500 font-bold uppercase tracking-tighter">Acción Requerida</span>
            </div>
            <p class="text-[9px] text-stone-400 font-bold uppercase mt-4">Validaciones de Stock Crítico</p>
        </div>
    </div>

    <!-- Main History Table -->
    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
        <div class="p-6 border-b border-stone-50 flex justify-between items-center bg-stone-50/50">
            <div class="flex items-center gap-3">
                <div class="w-2 h-6 bg-primary rounded-full"></div>
                <h3 class="text-sm font-black text-stone-900 uppercase tracking-tighter">Registro Histórico de Adquisiciones</h3>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-stone-50/80">
                        <th class="px-8 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Referencia / Control</th>
                        <th class="px-8 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Aliado Estratégico</th>
                        <th class="px-8 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em]">Estatus Logístico</th>
                        <th class="px-8 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-right">Monto Neto</th>
                        <th class="px-8 py-5 text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-center">Protocolo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100 italic md:not-italic">
                    <tr class="hover:bg-stone-50/80 transition-colors group">
                        <td class="px-8 py-5">
                            <p class="text-xs font-black text-stone-900 uppercase tracking-tight">ORD-2026-0089</p>
                            <p class="text-[9px] font-bold text-stone-400 font-mono mt-1">12 OCT 2026 • 14:20</p>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded bg-stone-900 flex items-center justify-center text-[10px] text-primary font-black">AC</div>
                                <div>
                                    <p class="text-[10px] font-black text-stone-900 uppercase">Aceros Continental S.A.</p>
                                    <p class="text-[9px] text-stone-400 font-mono italic">J-29384812-0</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-primary text-stone-900 text-[9px] font-black uppercase rounded-full shadow-sm">Recibido Total</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <p class="text-[11px] font-black text-stone-900 font-headline">$12,450.00</p>
                            <p class="text-[9px] text-stone-400 font-bold uppercase mt-1">BS. 448,200.00</p>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex justify-center">
                                <button class="bg-stone-900 text-white px-4 py-2 text-[9px] font-black uppercase tracking-widest rounded-lg hover:bg-stone-800 transition-all active:scale-95 shadow-lg group">
                                    Explorar Registro
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-stone-50/80 transition-colors group">
                        <td class="px-8 py-5">
                            <p class="text-xs font-black text-stone-900 uppercase tracking-tight">ORD-2026-0092</p>
                            <p class="text-[9px] font-bold text-stone-400 font-mono mt-1">14 OCT 2026 • 09:45</p>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded bg-stone-100 flex items-center justify-center text-[10px] text-stone-400 font-black border border-stone-200">LG</div>
                                <div>
                                    <p class="text-[10px] font-black text-stone-900 uppercase">Logística Global C.A.</p>
                                    <p class="text-[9px] text-stone-400 font-mono italic">J-30491823-1</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-stone-100 text-stone-400 text-[9px] font-black uppercase rounded-full border border-stone-200">En Tránsito</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <p class="text-[11px] font-black text-stone-900 font-headline">$4,820.50</p>
                            <p class="text-[9px] text-stone-400 font-bold uppercase mt-1">BS. 173,538.00</p>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex justify-center">
                                <button class="bg-white border border-stone-200 text-stone-500 px-4 py-2 text-[9px] font-black uppercase tracking-widest rounded-lg hover:bg-stone-50 transition-all shadow-sm">
                                    Detalles
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Density Industrial Pagination -->
        <div class="p-6 bg-stone-50/50 border-t border-stone-100 flex justify-between items-center">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Lote 1-50 de 156 Órdenes de Compra</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 rounded-lg border border-stone-200 text-stone-400 flex items-center justify-center hover:bg-white hover:text-stone-900 transition-all"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
                <div class="flex items-center px-4 h-8 bg-stone-900 text-primary text-[10px] font-black uppercase rounded-lg">Pág 01</div>
                <button class="w-8 h-8 rounded-lg border border-stone-200 text-stone-400 flex items-center justify-center hover:bg-white hover:text-stone-900 transition-all"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
    </div>

    <!-- Technical Footer -->
    <div class="mt-12 pt-10 border-t border-stone-100 grid grid-cols-1 md:grid-cols-3 gap-12 opacity-50">
        <div>
            <p class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em] mb-4">Registro Operativo de Compras</p>
            <p class="text-[10px] text-stone-500 leading-relaxed font-medium">Cada registro en esta base de datos ha sido sellado criptográficamente para garantizar la inmutabilidad de la cadena de suministro industrial.</p>
        </div>
        <div class="flex flex-col gap-3">
            <p class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em] mb-1">Estatus del Enlace Fiscal</p>
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                <span class="text-[9px] font-black text-stone-500 uppercase tracking-widest font-mono">SENIAT_GATEWAY: ONLINE</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="text-[9px] font-black text-stone-500 uppercase tracking-widest font-mono">RIF_VALIDATION: VERIFIED</span>
            </div>
        </div>
        <div class="text-right flex flex-col justify-end">
            <div class="text-stone-200 font-headline font-black text-4xl leading-none tracking-tighter mix-blend-multiply opacity-20">LA_CIMA_ERP</div>
            <p class="text-[8px] text-stone-400 uppercase font-black tracking-widest mt-2 italic font-mono">Auth Token: ZNTH-HSTR-FB42</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/historial-compras.js') }}"></script>
@endpush
