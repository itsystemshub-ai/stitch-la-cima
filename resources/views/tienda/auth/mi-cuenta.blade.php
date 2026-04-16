@extends('layouts.ecommerce')

@section('title', 'Mi Cuenta | MAYOR DE REPUESTO LA CIMA, C.A.')

@section('content')
<div class="min-h-screen bg-background mt-16 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between border-b border-outline pb-6">
            <div>
                <h1 class="text-3xl font-black text-black uppercase tracking-tighter">Mi Cuenta</h1>
                <p class="text-stone-500 font-bold uppercase tracking-widest text-[10px] mt-2">Bienvenido, {{ $customer->razon_social }}</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex gap-4">
                @if($customer->tipo_cliente == 'B2B' || $customer->tipo_cliente == 'Mayor')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-primary/20 text-black border border-primary">
                        Cuenta B2B - Mayorista
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-stone-200 text-stone-800">
                        Cuenta Estándar
                    </span>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 bg-primary/20 border border-primary text-black px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline text-xs font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Sidebar / Acciones -->
            <div class="col-span-1 space-y-4">
                <div class="bg-white border border-outline rounded-xl p-6 shadow-sm">
                    <h3 class="font-black text-xs uppercase tracking-widest border-b border-outline pb-3 mb-4">Información Fiscal</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Cédula / RIF</p>
                            <p class="text-sm font-medium">{{ $customer->rif }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Email</p>
                            <p class="text-sm font-medium">{{ $customer->email }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">Teléfono</p>
                            <p class="text-sm font-medium">{{ $customer->telefono ?? 'No registrado' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-black border border-black text-white rounded-xl p-6 shadow-sm">
                    <h3 class="font-black text-xs uppercase tracking-widest text-primary border-b border-stone-800 pb-3 mb-4">Límite de Crédito</h3>
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-3xl font-black tracking-tighter">${{ number_format($customer->limite_credito ?? 0, 2) }}</p>
                            <p class="text-[9px] text-stone-400 uppercase tracking-widest">Disponible</p>
                        </div>
                        <span class="material-symbols-outlined text-stone-500 text-4xl">credit_card</span>
                    </div>
                </div>
            </div>

            <!-- Contenido Principal: Historial de Órdenes -->
            <div class="col-span-1 md:col-span-2">
                <div class="bg-white border border-outline rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-outline flex justify-between items-center bg-stone-50">
                        <h3 class="font-black text-sm uppercase tracking-widest">Historial de Pedidos</h3>
                        <a href="#" class="text-[10px] font-bold text-primary-dark uppercase hover:underline">Ver Todos</a>
                    </div>
                    
                    <div class="p-6">
                        <div class="text-center py-12">
                            <span class="material-symbols-outlined text-6xl text-stone-200 mb-4">receipt_long</span>
                            <p class="text-stone-500 font-bold text-sm">Aún no has realizado pedidos.</p>
                            <a href="/tienda/catalogo_general" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded-md font-black uppercase text-[10px] tracking-widest hover:bg-stone-800 transition-colors">
                                Explorar Catálogo
                            </a>
                        </div>
                        <!-- Futuro: foreach para órdenes -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
