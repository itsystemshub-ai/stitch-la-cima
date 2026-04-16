@extends('erp.layouts.app')

@section('title', 'Ruta No Encontrada')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center p-6">
    <div class="max-w-4xl w-full">
        <div class="bg-white border border-stone-200 rounded-[48px] overflow-hidden shadow-2xl relative">
            <div class="absolute top-0 inset-x-0 h-2 bg-gradient-to-r from-stone-400 via-stone-900 to-stone-400"></div>
            
            <div class="p-16 text-center">
                <div class="mb-12 relative inline-block">
                    <div class="w-32 h-32 bg-stone-100 rounded-[40px] flex items-center justify-center text-stone-300 shadow-xl">
                        <span class="material-symbols-outlined text-6xl font-black">explore_off</span>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center justify-center gap-4 mb-2">
                        <span class="w-12 h-[2px] bg-stone-100"></span>
                        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em]">Protocolo de Ruta Inexistente</p>
                        <span class="w-12 h-[2px] bg-stone-100"></span>
                    </div>

                    <h1 class="text-6xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none italic">
                        Dirección <span class="text-stone-300 italic">No Encontrada</span>
                    </h1>

                    <p class="text-sm text-stone-500 font-bold max-w-lg mx-auto leading-relaxed">
                        El módulo solicitado no se encuentra en el índice de comandos del ERP. Verifique la URL o retorne al panel principal.
                    </p>

                    <div class="pt-12">
                        <a href="{{ url('/erp/dashboard') }}" class="inline-flex items-center gap-4 bg-stone-950 text-primary px-12 py-6 rounded-[24px] text-[10px] font-black uppercase tracking-[0.3em] hover:scale-105 transition-all shadow-2xl active:scale-95">
                            <span class="material-symbols-outlined">first_page</span>
                            Retornar al Inicio
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-stone-50 p-8 border-t border-stone-100 text-center">
                <p class="text-[9px] font-black text-stone-300 uppercase tracking-widest leading-none">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
            </div>
        </div>
    </div>
</div>
@endsection
