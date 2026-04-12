@extends('erp.layouts.app')

@section('title', 'Rendimiento Anual')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/rrhh') }}" class="hover:text-stone-900 transition-colors">RRHH</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Rendimiento Anual</span>
@endsection

@section('content')
    <!-- Page Header -->
    <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-100 pb-8">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Analíticas de Capital Humano</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Rendimiento <span class="text-stone-400">Anual</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">file_download</span>
                Exportar Reporte
            </button>
            <button class="bg-stone-900 text-primary px-10 py-4 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all">
                Auditoría FY 2023
            </button>
        </div>
    </header>

    <!-- Metrics Bento Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Eficiencia Global</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 uppercase">94.2%</h3>
            <div class="mt-4 flex items-center gap-2 text-green-600 font-bold text-[10px] uppercase">
                <span class="material-symbols-outlined text-xs">trending_up</span>
                +2.1% vs Año Anterior
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm relative overflow-hidden group">
            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Retención de Talento</p>
            <h3 class="text-4xl font-headline font-black text-stone-900 uppercase italic">98.5%</h3>
            <div class="mt-4 flex items-center gap-2 text-stone-400 font-bold text-[10px] uppercase">
                <span class="material-symbols-outlined text-xs">verified</span>
                Estabilidad Crítica Altamente Positiva
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-stone-900 p-8 rounded-[32px] shadow-xl relative overflow-hidden group">
            <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-4">Feedback Promedio</p>
            <h3 class="text-4xl font-headline font-black text-white uppercase tracking-tight">Sobresaliente</h3>
            <div class="mt-4 flex items-center gap-2 text-stone-500 font-bold text-[10px] uppercase">
                <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                Basado en 142 Evaluaciones
            </div>
        </div>
    </div>

    <!-- Main Performance Table -->
    <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Desglose de Desempeño por Departamento</h3>
            <span class="px-4 py-1.5 bg-stone-50 text-[10px] font-black text-stone-400 rounded-full uppercase italic">Datos Consolidados 2023</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-400">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Departamento</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">KPI Alcanzado</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Progreso Anual</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-right">Efectividad</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 font-body text-xs">
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="p-6 font-black text-stone-900 uppercase">Ventas y Comercial</td>
                        <td class="p-6 text-center font-bold">115%</td>
                        <td class="p-6 text-center">
                            <div class="w-full bg-stone-100 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-primary h-full w-[115%]"></div>
                            </div>
                        </td>
                        <td class="p-6 text-right font-headline font-bold text-lg text-primary">A+</td>
                    </tr>
                    <tr class="hover:bg-stone-50 transition-colors">
                        <td class="p-6 font-black text-stone-900 uppercase">Logística y Almacén</td>
                        <td class="p-6 text-center font-bold">92%</td>
                        <td class="p-6 text-center">
                            <div class="w-full bg-stone-100 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-stone-900 h-full w-[92%]"></div>
                            </div>
                        </td>
                        <td class="p-6 text-right font-headline font-bold text-lg text-stone-400">B</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
