@extends('erp.layouts.app')

@section('title', 'Mi Portal B2B')

@section('content')
<div class="space-y-6">
    <!-- Header de Bienvenida -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
        <div>
            <h1 class="text-2xl font-black text-stone-900 uppercase tracking-tight">Hola, <span class="text-primary-dark">{{ auth()->user()->name }}</span></h1>
            <p class="text-[12px] font-bold text-stone-400 uppercase tracking-widest mt-1">Bienvenido a tu Portal de Autoservicio • {{ now()->format('d M, Y') }}</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('erp.cliente.catalogo') }}" class="bg-primary text-stone-900 px-6 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-primary-dark transition-all shadow-lg flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">shopping_bag</span>
                Hacer Nuevo Pedido
            </a>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Stats Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Saldo Pendiente -->
            <div class="bg-stone-900 p-6 rounded-2xl shadow-xl">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Saldo Pendiente</p>
                <h3 class="text-2xl font-black text-white mt-1">${{ number_format($stats['saldo_pendiente'], 2) }}</h3>
                <a href="{{ route('erp.cliente.pagos') }}" class="mt-4 w-full block text-center bg-white/10 hover:bg-white/20 text-white text-[10px] font-black uppercase py-2 rounded-lg transition-all">Pagar Ahora</a>
            </div>

            <!-- Otros Stats -->
            <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm space-y-6">
                <div>
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Pedidos Activos</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-xl font-black text-stone-900">{{ $stats['pedidos_activos'] }}</span>
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    </div>
                </div>
                <div class="pt-4 border-t border-stone-100">
                    <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Puntos Fidelidad</p>
                    <p class="text-xl font-black text-stone-900 mt-1">{{ $stats['puntos_fidelidad'] }} <span class="text-[10px] text-primary-dark uppercase">pts</span></p>
                </div>
            </div>
        </div>

        <!-- Orders and Activity -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Ultimos Pedidos -->
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-stone-100 flex items-center justify-between">
                    <h3 class="text-[14px] font-black text-stone-900 uppercase tracking-tight">Mis Pedidos Recientes</h3>
                    <a href="{{ route('erp.cliente.pedidos') }}" class="text-[10px] font-black text-primary-dark uppercase hover:underline">Ver Todo</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-stone-50 border-b border-stone-100">
                                <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Orden ID</th>
                                <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Fecha</th>
                                <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Monto</th>
                                <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Estatus</th>
                                <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            <tr>
                                <td class="py-4 px-6 text-[11px] font-bold text-stone-900">#ORD-9920</td>
                                <td class="py-4 px-6 text-[11px] text-stone-500">01 May, 2026</td>
                                <td class="py-4 px-6 text-[11px] font-black text-stone-900">$450.00</td>
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-green-50 text-green-600 text-[9px] font-black uppercase rounded-lg">Entregado</span>
                                </td>
                                <td class="py-4 px-6">
                                    <button class="w-8 h-8 flex items-center justify-center bg-stone-50 text-stone-400 rounded-lg hover:bg-stone-900 hover:text-white transition-all">
                                        <span class="material-symbols-outlined text-base">visibility</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Catalogo Rapido -->
            <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
                <h3 class="text-[14px] font-black text-stone-900 uppercase tracking-tight mb-6">Productos Recomendados</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="group cursor-pointer">
                        <div class="aspect-square bg-stone-100 rounded-xl mb-3 overflow-hidden">
                             <div class="w-full h-full flex items-center justify-center text-stone-300 group-hover:scale-110 transition-all">
                                 <span class="material-symbols-outlined text-4xl">image</span>
                             </div>
                        </div>
                        <p class="text-[11px] font-bold text-stone-900 uppercase group-hover:text-primary-dark transition-colors">Batería Titan 750</p>
                        <p class="text-[10px] font-black text-stone-400">$85.00</p>
                    </div>
                    <!-- Repetir para 2 mas -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
