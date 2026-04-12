@extends('erp.layouts.app')

@section('title', 'Reportes de Compras | ERP La Cima')

@section('breadcrumb')
    <a href="{{ url('/erp/compras') }}" class="hover:text-stone-900">Compras</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Reportes de Gestión</span>
@endsection

@section('content')
    <!-- Page Header: Strategic Intelligence -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Inteligencia de Abastecimiento Corporativo</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Centro de <span class="text-stone-400">Reportes</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
            <div class="bg-stone-900 px-6 py-4 flex flex-col items-end rounded-2xl shadow-xl">
                <span class="text-[10px] font-black text-primary uppercase tracking-widest opacity-80">Gasto Mensual Consolidado</span>
                <span class="text-3xl font-headline font-black text-white">$142.8k</span>
            </div>
            <div class="bg-white border border-stone-200 px-6 py-4 flex flex-col items-end rounded-2xl shadow-sm">
                <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Órdenes en Tránsito</span>
                <span class="text-3xl font-headline font-black text-stone-900">142</span>
            </div>
        </div>
    </div>

    <!-- Analytical Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-10">
        <!-- Supplier Performance Index (8 cols) -->
        <section class="md:col-span-8 bg-white border border-stone-200 p-8 rounded-3xl shadow-sm relative overflow-hidden group">
            <div class="flex justify-between items-center mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-8 bg-primary rounded-full"></div>
                    <h3 class="text-xl font-headline font-black text-stone-900 uppercase tracking-tight">Índice de Rendimiento de Proveedores</h3>
                </div>
                <button class="text-[10px] font-black text-primary tracking-widest uppercase border-b-2 border-primary hover:pb-1 transition-all">Análisis Profundo</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Aceros Continental S.A.</span>
                        <span class="text-xs font-black text-stone-900">98.2%</span>
                    </div>
                    <div class="h-1.5 bg-stone-100 w-full rounded-full overflow-hidden">
                        <div class="h-full bg-stone-900 w-[98%]"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Logística Global C.A.</span>
                        <span class="text-xs font-black text-stone-900">84.5%</span>
                    </div>
                    <div class="h-1.5 bg-stone-100 w-full rounded-full overflow-hidden">
                        <div class="h-full bg-stone-400 w-[84%]"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Lubricantes del Sur</span>
                        <span class="text-xs font-black text-stone-900">92.0%</span>
                    </div>
                    <div class="h-1.5 bg-stone-100 w-full rounded-full overflow-hidden">
                        <div class="h-full bg-stone-900 w-[92%]"></div>
                    </div>
                </div>
            </div>

            <!-- Logistics Worldview -->
            <div class="mt-12 h-64 bg-stone-900 rounded-2xl relative overflow-hidden flex items-center justify-center border border-stone-800 shadow-inner group/map">
                <img class="absolute inset-0 w-full h-full object-cover opacity-40 grayscale group-hover/map:grayscale-0 group-hover/map:opacity-60 transition-all duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmn_pQWVBiQ__f820JcLdg4inaYp8sszJJ7cyeP_RszhyeAHvr3kp3cFNLytpeEeam7wAnjFRmVHmJp88O_tmrIxX7UbTutC2cNKjxVgznK9Bq9Z88KP5Lg4nAwqdc1j3NuAYNXc6DruD54Bu9B_wTsC9dUiUMdRgCj3lYIP0Os-YKFRnzq1KuHZZjWkmuadFzncURyxq804cxOlAsShtkoP5HiKuLC3Z7gu_KM3fQSyyzqmmtJoB0ndZeca27DERuYSlWDX6VZ7I" alt="Network Map">
                <div class="relative z-10 bg-white/95 backdrop-blur-md p-6 rounded-xl border-l-4 border-primary shadow-2xl transform group-hover/map:translate-y-[-5px] transition-all">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Estatus Logístico Global</p>
                    <p class="text-sm font-headline font-black text-stone-900 uppercase">3 Suministros Críticos en Tránsito Marítimo</p>
                </div>
            </div>
        </section>

        <!-- Accounts Payable Aging (4 cols) -->
        <section class="md:col-span-4 bg-stone-950 p-8 rounded-3xl shadow-2xl flex flex-col justify-between">
            <div class="space-y-8">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-3xl">account_balance_wallet</span>
                    <h3 class="text-xl font-headline font-black text-white uppercase tracking-tight">Antigüedad de Cuentas</h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex justify-between items-end border-b border-white/5 pb-2">
                        <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest">Corriente</span>
                        <span class="text-lg font-headline font-black text-primary">$412.5K</span>
                    </div>
                    <div class="flex justify-between items-end border-b border-white/5 pb-2">
                        <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest">1-30 Días</span>
                        <span class="text-lg font-headline font-black text-white">$128.2K</span>
                    </div>
                    <div class="flex justify-between items-end border-b border-white/5 pb-2">
                        <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest">31-60 Días</span>
                        <span class="text-lg font-headline font-black text-white">$45.0K</span>
                    </div>
                    <div class="flex justify-between items-end border-b border-white/5 pb-2">
                        <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest">60+ Días</span>
                        <span class="text-lg font-headline font-black text-red-500">CRÍTICO: $12.4K</span>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-white/5">
                <p class="text-[9px] font-black text-stone-500 uppercase tracking-widest mb-4">Requiere Acción: Liquidación de Fletes Programada</p>
                <button class="w-full py-4 bg-primary text-stone-900 font-headline font-black text-xs uppercase tracking-widest hover:bg-white transition-all rounded-xl shadow-lg active:scale-95">
                    Procesar Liquidaciones
                </button>
            </div>
        </section>

        <!-- Cost Variation Analysis (5 cols) -->
        <section class="md:col-span-5 bg-white border border-stone-200 p-8 rounded-3xl shadow-sm flex flex-col gap-8">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-2xl">analytics</span>
                <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight">Variación de Costos Unitarios</h3>
            </div>
            
            <div class="flex-1 flex items-end gap-2 min-h-[180px]">
                <div class="bg-stone-50 border border-stone-100 w-full hover:bg-primary transition-all cursor-pointer group relative h-[40%] rounded-t-lg"></div>
                <div class="bg-stone-50 border border-stone-100 w-full hover:bg-primary transition-all cursor-pointer group relative h-[55%] rounded-t-lg"></div>
                <div class="bg-stone-50 border border-stone-100 w-full hover:bg-primary transition-all cursor-pointer group relative h-[45%] rounded-t-lg"></div>
                <div class="bg-stone-900 w-full hover:bg-primary transition-all cursor-pointer group relative h-[90%] rounded-t-lg shadow-xl">
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-black text-stone-900 opacity-0 group-hover:opacity-100 transition-opacity">MAX</span>
                </div>
                <div class="bg-stone-100 border border-stone-200 w-full hover:bg-primary transition-all cursor-pointer group relative h-[100%] rounded-t-lg">
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 text-[10px] font-black text-primary">SEP</span>
                </div>
            </div>

            <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Costo Promedio de Parte</span>
                    <span class="text-sm font-headline font-black text-stone-900">+14.2% YoY</span>
                </div>
                <p class="text-[9px] text-stone-500 font-bold leading-relaxed">Impulsor principal: Recargo por materia prima en el segmento de aleaciones fundidas.</p>
            </div>
        </section>

        <!-- Purchase History by Category (7 cols) -->
        <section class="md:col-span-7 bg-white border border-stone-200 rounded-3xl shadow-sm overflow-hidden flex flex-col">
            <div class="p-8 pb-4">
                <h3 class="text-lg font-headline font-black text-stone-900 uppercase tracking-tight">Categorización de Adquisiciones</h3>
            </div>
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-stone-50/50">
                            <th class="px-8 py-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Clase de Activo</th>
                            <th class="px-8 py-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Volumen</th>
                            <th class="px-8 py-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Valor Total</th>
                            <th class="px-8 py-4 text-[9px] font-black text-stone-400 uppercase tracking-widest">Estatus</th>
                        </tr>
                    </thead>
                    <tbody class="text-[10px] divide-y divide-stone-50 font-medium">
                        <tr class="hover:bg-primary/5 transition-colors">
                            <td class="px-8 py-4 font-black text-stone-900 uppercase font-headline">Turbocompresores</td>
                            <td class="px-8 py-4 text-stone-500">42 Und.</td>
                            <td class="px-8 py-4 font-bold text-stone-900">$642,000</td>
                            <td class="px-8 py-4"><span class="px-2 py-0.5 bg-primary/10 text-stone-900 text-[8px] font-black uppercase rounded">Estable</span></td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition-colors">
                            <td class="px-8 py-4 font-black text-stone-900 uppercase font-headline">Bombas de Inyección</td>
                            <td class="px-8 py-4 text-stone-500">840 Und.</td>
                            <td class="px-8 py-4 font-bold text-stone-900">$285,120</td>
                            <td class="px-8 py-4"><span class="px-2 py-0.5 bg-red-50 text-red-600 text-[8px] font-black uppercase rounded">Inflación</span></td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition-colors">
                            <td class="px-8 py-4 font-black text-stone-900 uppercase font-headline">Kits de Empacadura</td>
                            <td class="px-8 py-4 text-stone-500">122 Kits</td>
                            <td class="px-8 py-4 font-bold text-stone-900">$154,200</td>
                            <td class="px-8 py-4"><span class="px-2 py-0.5 bg-stone-100 text-stone-400 text-[8px] font-black uppercase rounded">Contrato</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-6 bg-stone-50/50 border-t border-stone-50">
                <button class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] hover:text-stone-900 transition-colors">Descargar Reporte Completo de Activos</button>
            </div>
        </section>
    </div>

    <!-- Telemetry Insights Footer -->
    <div class="relative bg-stone-900 p-10 md:p-16 rounded-[40px] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] group/footer mb-12">
        <div class="absolute -right-20 top-0 opacity-10 select-none pointer-events-none transform group-hover/footer:rotate-12 transition-transform duration-1000">
            <span class="text-[20rem] font-black leading-none font-headline tracking-tighter text-white uppercase italic">CIMA</span>
        </div>
        
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-16 items-center">
            <div>
                <div class="w-12 h-12 bg-primary rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-stone-900 text-2xl font-black">troubleshoot</span>
                </div>
                <h2 class="text-4xl font-headline font-black text-white uppercase tracking-tight mb-6 leading-none">Análisis de <br> <span class="text-primary tracking-widest">Órdenes Abiertas</span></h2>
                <p class="text-xs text-stone-400 leading-relaxed font-bold uppercase tracking-wider">Telemetría en tiempo real de todos los ciclos de adquisición desde el RFQ hasta la entrega final en bodega.</p>
            </div>
            
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-primary transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-900 uppercase tracking-widest">Tránsito Marítimo</span>
                        <span class="material-symbols-outlined text-stone-500 group-hover/card:text-stone-900">sailing</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-900/60 uppercase mb-1">PO-88219-B</p>
                    <h4 class="text-2xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">En Alta Mar</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-900 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary group-hover/card:bg-stone-900 rounded-full animate-pulse"></span>
                        ETA: 48 Horas
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-white transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 group-hover/card:text-stone-400 uppercase tracking-widest">En Aduana</span>
                        <span class="material-symbols-outlined text-red-500 group-hover/card:text-red-600 animate-pulse">emergency</span>
                    </div>
                    <p class="text-[10px] font-black group-hover/card:text-stone-400 uppercase mb-1">PO-89100-D</p>
                    <h4 class="text-2xl font-headline font-black text-white group-hover/card:text-stone-900 uppercase">Retenido Inspección</h4>
                    <div class="mt-4 flex items-center gap-2 group-hover/card:text-stone-400 font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        Revisión de Aranceles
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-xl border border-white/5 p-8 rounded-2xl group/card hover:bg-zinc-800 transition-all duration-500 cursor-pointer shadow-2xl">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-500 uppercase tracking-widest">Listo Despacho</span>
                        <span class="material-symbols-outlined text-primary group-hover/card:text-primary">local_shipping</span>
                    </div>
                    <p class="text-[10px] font-black text-stone-500 uppercase mb-1">PO-88542-C</p>
                    <h4 class="text-2xl font-headline font-black text-white uppercase">Saliendo de Muelle</h4>
                    <div class="mt-4 flex items-center gap-2 text-primary font-bold text-[10px]">
                        <span class="w-1.5 h-1.5 bg-primary rounded-full"></span>
                        Cruce Fronterizo
                    </div>
                </div>

                <div class="bg-primary p-8 rounded-2xl group/card hover:bg-white transition-all duration-500 cursor-pointer shadow-2xl shadow-primary/20">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[10px] font-black text-stone-900/60 uppercase tracking-widest">Fase Producción</span>
                        <span class="material-symbols-outlined text-stone-900">settings_backup_restore</span>
                    </div>
                    <p class="text-[10px] font-black text-stone-900/40 uppercase mb-1">PO-90012-A</p>
                    <h4 class="text-2xl font-headline font-black text-stone-900 uppercase">92% Completado</h4>
                    <div class="mt-4 flex items-center gap-2 text-stone-900 font-bold text-[10px]">
                        <div class="w-full h-1 bg-stone-900/10 rounded-full overflow-hidden">
                            <div class="w-[92%] h-full bg-stone-900"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('erp/js/reportes-compras.js') }}"></script>
    <style>
      .bg-\[\#fbfbfb\] {
        background-color: #fbfbfb;
      }
    </style>
@endpush
