@extends('erp.layouts.app')

@section('title', 'Analítica de Rendimiento de Ventas')

@section('breadcrumb')
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ventas') }}" class="hover:text-stone-900 transition-colors">Ventas</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Analítica de Rendimiento</span>
@endsection

@section('content')
  <!-- Analytics Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
    <div class="space-y-1">
      <div class="flex items-center gap-2">
        <span class="w-2 h-6 bg-primary rounded-full"></span>
        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Inteligencia de Mercado & Foresight</p>
      </div>
      <h2 class="text-4xl font-headline font-black text-stone-900 tracking-tight leading-none italic uppercase">Analítica de <span class="text-primary-dim">Rendimiento</span></h2>
    </div>
    
    <div class="flex items-center gap-3">
      <div class="bg-stone-50 border border-stone-100 p-1 rounded-xl flex mr-4">
        <button class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest bg-white shadow-sm text-stone-900 transition-all italic">Mensual</button>
        <button class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-all italic">Trimestral</button>
        <button class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest text-stone-400 hover:text-stone-900 transition-all italic">Anual</button>
      </div>
      <a href="{{ route('erp.export.ventas') }}" class="bg-stone-900 text-primary px-8 py-3 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl shadow-xl hover:bg-black transition-all active:scale-95 group/btn flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px]">table_view</span>
        Exportar Excel
      </a>
    </div>
  </div>

  <!-- Bento Analytics Grid -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <!-- Big Chart -->
    <div class="col-span-12 lg:col-span-8 bg-white rounded-3xl border border-stone-100 shadow-sm p-10 overflow-hidden relative group">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h4 class="text-xs font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Fluctuación de Ingresos Brutos</h4>
                <p class="text-sm font-bold text-stone-900 uppercase italic">Tendencia Últimos 12 Meses</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-2xl font-black text-stone-900 tracking-tighter italic block">$ {{ number_format($total_ventas, 2) }}</span>
            </div>
        </div>
        
        <div id="monthlyTrendChart" class="h-64"></div>
    </div>

    <!-- Right Stats Stack -->
    <div class="col-span-12 lg:col-span-4 space-y-8">
        <div class="bg-stone-900 rounded-3xl p-8 relative overflow-hidden group h-full">
            <h4 class="text-[10px] font-black text-stone-500 uppercase tracking-[0.3em] mb-6 italic">Top Categorías</h4>
            <div id="categoryMixChart" class="w-full"></div>
            
            <div class="mt-8 space-y-4">
                @foreach($categoryMix as $mix)
                <div class="flex justify-between items-center text-[10px] uppercase font-black">
                    <span class="text-stone-400">{{ $mix->categoria }}</span>
                    <span class="text-primary">{{ $mix->percentage }}%</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
  </div>

  <!-- Regional & Global Reach -->
  <div class="grid grid-cols-12 gap-8 mb-12">
    <div class="col-span-12 lg:col-span-7 bg-white rounded-3xl border border-stone-100 shadow-sm overflow-hidden p-8">
        <h4 class="text-xs font-black text-stone-400 uppercase tracking-[0.2em] mb-8 italic">Distribución Geográfica de Demanda</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase mb-2">Oriente</span>
                <span class="text-xl font-headline font-black text-stone-900 leading-none">32%</span>
            </div>
            <div class="p-6 bg-stone-900 rounded-3xl border border-stone-800 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-500 uppercase mb-2">Occidente</span>
                <span class="text-xl font-headline font-black text-primary leading-none">41%</span>
            </div>
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase mb-2">Central</span>
                <span class="text-xl font-headline font-black text-stone-900 leading-none">18%</span>
            </div>
            <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 flex flex-col items-center">
                <span class="text-[9px] font-black text-stone-400 uppercase mb-2">Sur</span>
                <span class="text-xl font-headline font-black text-stone-900 leading-none">09%</span>
            </div>
        </div>
    </div>
    
    <div class="col-span-12 lg:col-span-5 bg-white rounded-3xl border border-stone-100 shadow-sm p-8 flex flex-col justify-between text-stone-950">
        <div class="mb-6">
            <h4 class="text-xs font-black text-stone-900 uppercase tracking-[0.2em] italic">Compliance & Legal Audit</h4>
            <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mt-2 leading-relaxed">Verificación trimestral del SENIAT / Contribuyente Especial</p>
        </div>
        <div class="flex items-center gap-6 p-5 bg-stone-50 rounded-3xl border border-stone-100 group hover:border-primary transition-all duration-500">
            <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center text-primary font-black italic shadow-lg group-hover:scale-110 transition-all">RIF</div>
            <div class="space-y-1">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest leading-none">Identidad Fiscal Consolidada</p>
                <p class="text-sm font-black text-stone-900 uppercase tracking-widest">J-40308741-5</p>
                <p class="text-[8px] font-bold text-stone-400 uppercase tracking-tighter">MAYOR DE REPUESTO LA CIMA, C.A.</p>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Trend Chart
            const trendData = @json($monthlyTrend);
            const trendOptions = {
                series: [{
                    name: 'Ventas',
                    data: trendData.map(item => item.total)
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: { show: false },
                    fontFamily: 'Inter, sans-serif'
                },
                colors: ['#ceff5e'],
                plotOptions: {
                    bar: { borderRadius: 8, columnWidth: '60%' }
                },
                xaxis: {
                    categories: trendData.map(item => 'Mes ' + item.mes),
                    labels: { style: { colors: '#a8a29e', fontWeight: 600 } }
                },
                yaxis: {
                    labels: { style: { colors: '#a8a29e', fontWeight: 600 } }
                },
                grid: { borderColor: '#f5f5f4' },
                dataLabels: { enabled: false }
            };
            new ApexCharts(document.querySelector("#monthlyTrendChart"), trendOptions).render();

            // Category Chart
            const categoryData = @json($categoryMix);
            const catOptions = {
                series: categoryData.map(item => item.percentage),
                chart: {
                    type: 'donut',
                    height: 200,
                    fontFamily: 'Inter, sans-serif'
                },
                labels: categoryData.map(item => item.categoria),
                colors: ['#ceff5e', '#a8a29e', '#57534e', '#292524'],
                legend: { show: false },
                dataLabels: { enabled: false },
                stroke: { show: false }
            };
            new ApexCharts(document.querySelector("#categoryMixChart"), catOptions).render();
        });
    </script>
@endpush
