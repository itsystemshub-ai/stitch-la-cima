@extends('erp.layouts.app')

@section('title', 'Activos Fijos | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <a href="{{ url('/erp/finanzas') }}" class="hover:text-stone-900 transition-colors">Finanzas</a>
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Activos Fijos</span>
@endsection

@section('content')
<section class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <p class="text-[10px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1">Control de Patrimonio Industrial</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tighter uppercase">Gestión de Activos</h2>
            <p class="text-stone-500 text-sm mt-1 font-medium italic">Control de depreciación, ubicación y mantenimiento de bienes capitales.</p>
        </div>
        <div class="flex gap-3">
            <button class="flex items-center gap-2 bg-white border border-stone-200 text-stone-700 px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-stone-50 transition-all active:scale-95 shadow-sm">
                <span class="material-symbols-outlined text-sm">download</span>
                Exportar PDF
            </button>
            <button class="flex items-center gap-2 bg-stone-900 text-white px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-primary hover:text-stone-900 transition-all active:scale-95 shadow-lg shadow-stone-900/10">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                Nuevo Activo
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm border-l-[6px] border-stone-900">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] mb-4">Valor Localizado</p>
            <p class="text-3xl font-headline font-black text-stone-900">$1,240,500.00</p>
            <div class="flex items-center gap-1 text-lime-600 mt-2">
                <span class="material-symbols-outlined text-xs">trending_up</span>
                <span class="text-[9px] font-black uppercase">+4.2% Variación Anual</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm border-l-[6px] border-primary">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] mb-4">Depreciación Acum.</p>
            <p class="text-3xl font-headline font-black text-stone-900">$412,280.45</p>
            <p class="text-[9px] text-stone-500 font-black uppercase mt-2 tracking-widest">33.2% del Valor de Origen</p>
        </div>

        <div class="md:col-span-2 relative overflow-hidden bg-stone-900 p-8 rounded-2xl flex flex-col justify-between shadow-xl shadow-stone-900/20">
            <!-- Decorative Background Element -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            
            <div class="relative z-10">
                <p class="text-[10px] font-black text-primary/60 uppercase tracking-[0.3em] mb-4">Proyección de Cierre Mensual</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-5xl font-headline font-black text-white">-$12,450</span>
                    <span class="text-xs font-black text-stone-400 uppercase tracking-widest">USD / Período</span>
                </div>
                <div class="mt-8">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic">Avance Período Fiscal Q3</span>
                        <span class="text-[10px] font-black text-primary uppercase">65%</span>
                    </div>
                    <div class="h-1.5 bg-stone-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[65%]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Table Section -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-stone-100 flex flex-col md:flex-row justify-between items-center gap-6 bg-stone-50/30">
            <h3 class="text-xl font-headline font-black uppercase tracking-tight text-stone-900">Registro de Patrimonio</h3>
            <div class="flex items-center gap-4 w-full md:w-auto">
                <div class="flex-1 md:w-80 bg-white border border-stone-200 px-4 py-2.5 rounded-xl flex items-center gap-3 focus-within:border-primary transition-all">
                    <span class="material-symbols-outlined text-stone-400 text-lg">search</span>
                    <input type="text" placeholder="BUSCAR POR CÓDIGO O DESCRIPCIÓN..." class="bg-transparent border-none p-0 text-[10px] font-black uppercase tracking-widest text-stone-900 w-full placeholder:text-stone-300 focus:ring-0">
                </div>
                <button class="bg-white border border-stone-200 p-2.5 rounded-xl text-stone-500 hover:text-stone-900 hover:border-stone-900 transition-all">
                    <span class="material-symbols-outlined">filter_list</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-900 text-white">
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest">Activo ID</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest">Detalle Técnico</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest">Incorporación</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-right">Costo Origen</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest">Método</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-right">Dep. Acumulada</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-right">Valor Neto</th>
                        <th class="px-6 py-5 text-[10px] font-black uppercase tracking-widest text-center">Gestión</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <tr class="hover:bg-amber-50/30 transition-all group">
                        <td class="px-6 py-5 text-[11px] font-black text-stone-400 uppercase tracking-tighter">AF-00214</td>
                        <td class="px-6 py-5">
                            <p class="text-[12px] font-black text-stone-900 uppercase tracking-tight">Torno CNC Precision X-900</p>
                            <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Maquinaria Pesada • Línea B</p>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-stone-500">12/05/2021</td>
                        <td class="px-6 py-5 text-[12px] font-black text-stone-900 text-right">$125,000.00</td>
                        <td class="px-6 py-5">
                            <span class="px-2 py-0.5 bg-stone-100 text-stone-600 text-[9px] font-black uppercase rounded-lg border border-stone-200">Línea Recta</span>
                        </td>
                        <td class="px-6 py-5 text-[12px] font-black text-red-600 text-right">-$31,250.00</td>
                        <td class="px-6 py-5 text-[14px] font-black text-stone-900 text-right">$93,750.00</td>
                        <td class="px-6 py-5 text-center">
                            <button class="w-8 h-8 rounded-lg flex items-center justify-center text-stone-300 hover:text-stone-950 hover:bg-white transition-all">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                        </td>
                    </tr>
                    <!-- Repetir patrón para más filas -->
                    <tr class="hover:bg-amber-50/30 transition-all group">
                        <td class="px-6 py-5 text-[11px] font-black text-stone-400 uppercase tracking-tighter">AF-00245</td>
                        <td class="px-6 py-5">
                            <p class="text-[12px] font-black text-stone-900 uppercase tracking-tight">Montacargas Caterpillar 5T</p>
                            <p class="text-[9px] text-stone-400 font-black uppercase tracking-widest">Logística • Almacén Central</p>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-stone-500">15/09/2022</td>
                        <td class="px-6 py-5 text-[12px] font-black text-stone-900 text-right">$45,500.00</td>
                        <td class="px-6 py-5">
                            <span class="px-2 py-0.5 bg-stone-100 text-stone-600 text-[9px] font-black uppercase rounded-lg border border-stone-200">Línea Recta</span>
                        </td>
                        <td class="px-6 py-5 text-[12px] font-black text-red-600 text-right">-$8,450.00</td>
                        <td class="px-6 py-5 text-[14px] font-black text-stone-900 text-right">$37,050.00</td>
                        <td class="px-6 py-5 text-center">
                            <button class="w-8 h-8 rounded-lg flex items-center justify-center text-stone-300 hover:text-stone-950 hover:bg-white transition-all">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="px-8 py-6 bg-stone-50 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Mostrando registros del patrimonio industrial activo</span>
            <div class="flex items-center gap-2">
                <button class="w-10 h-10 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400 hover:border-stone-900 hover:text-stone-900 transition-all"><span class="material-symbols-outlined">chevron_left</span></button>
                <div class="flex gap-1">
                    <button class="w-10 h-10 bg-stone-900 text-white rounded-xl text-xs font-black">1</button>
                    <button class="w-10 h-10 bg-white border border-stone-200 text-stone-900 rounded-xl text-xs font-black hover:border-stone-900">2</button>
                    <button class="w-10 h-10 bg-white border border-stone-200 text-stone-900 rounded-xl text-xs font-black hover:border-stone-900">3</button>
                </div>
                <button class="w-10 h-10 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400 hover:border-stone-900 hover:text-stone-900 transition-all"><span class="material-symbols-outlined">chevron_right</span></button>
            </div>
        </div>
    </div>

    <!-- Specialized Operations -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm flex flex-col justify-between group hover:border-primary transition-all">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-lime-50 rounded-2xl flex items-center justify-center text-lime-600 transition-all group-hover:bg-primary group-hover:text-stone-900">
                    <span class="material-symbols-outlined text-2xl">calendar_month</span>
                </div>
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-stone-900">Cierre Contable</h4>
            </div>
            <p class="text-[11px] text-stone-500 font-medium leading-relaxed mb-6 italic">Generación masiva de asientos de depreciación para el libro diario.</p>
            <button class="w-full py-3 bg-stone-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-stone-800 transition-all active:scale-95">Procesar Amortización</button>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm flex flex-col justify-between group hover:border-stone-900 transition-all">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-stone-100 rounded-2xl flex items-center justify-center text-stone-900 transition-all group-hover:bg-stone-900 group-hover:text-primary">
                    <span class="material-symbols-outlined text-2xl">qr_code_scanner</span>
                </div>
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-stone-900">Auditoría Física</h4>
            </div>
            <p class="text-[11px] text-stone-500 font-medium leading-relaxed mb-6 italic">Validación de activos mediante escaneo de etiquetas QR/Barra.</p>
            <button class="w-full py-3 bg-white border-2 border-stone-900 text-stone-900 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-stone-50 transition-all active:scale-95">Iniciar Inventario</button>
        </div>

        <div class="bg-primary p-8 rounded-3xl shadow-xl shadow-primary/20 flex flex-col justify-between">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center text-primary shadow-lg shadow-stone-900/10">
                    <span class="material-symbols-outlined text-2xl">analytics</span>
                </div>
                <h4 class="text-xs font-black uppercase tracking-[0.2em] text-stone-900">Reporte Fiscal</h4>
            </div>
            <p class="text-[11px] text-stone-900 font-bold leading-relaxed mb-6">Desglose detallado de valorización para balances y declaraciones de impuestos.</p>
            <button class="w-full py-3 bg-white/20 text-stone-900 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-white/40 transition-all border border-stone-900/10">Descargar XLSX</button>
        </div>
    </div>
</section>
@endsection
