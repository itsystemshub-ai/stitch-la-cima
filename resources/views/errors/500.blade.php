@extends('erp.layouts.app')

@section('title', 'Estado de Alerta de Sistema')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center p-6">
    <div class="max-w-4xl w-full">
        <div class="bg-white border border-stone-200 rounded-[48px] overflow-hidden shadow-2xl relative">
            <!-- Decorative Accent -->
            <div class="absolute top-0 inset-x-0 h-2 bg-gradient-to-r from-primary via-stone-900 to-primary"></div>
            
            <div class="p-16 text-center">
                <!-- Status Code / Icon -->
                <div class="mb-12 relative inline-block">
                    <div class="w-32 h-32 bg-stone-900 rounded-[40px] flex items-center justify-center text-primary shadow-2xl animate-bounce duration-[2000ms]">
                        <span class="material-symbols-outlined text-6xl font-black">emergency_home</span>
                    </div>
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-primary text-stone-950 rounded-full flex items-center justify-center font-black text-xl shadow-lg">
                        !
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center justify-center gap-4 mb-2">
                        <span class="w-12 h-[2px] bg-stone-100"></span>
                        <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em]">Protocolo de Interrupción de Servicio</p>
                        <span class="w-12 h-[2px] bg-stone-100"></span>
                    </div>

                    <h1 class="text-6xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none italic">
                        Sistema en <span class="text-primary italic">Contingencia</span>
                    </h1>

                    <p class="text-sm text-stone-500 font-bold max-w-lg mx-auto leading-relaxed">
                        Se ha detectado una anomalía técnica no recuperable en la ejecución de la última solicitud. El núcleo del sistema ha sido estabilizado para prevenir pérdida de datos.
                    </p>

                    <div class="pt-12 flex flex-col md:flex-row items-center justify-center gap-6">
                        <a href="{{ url('/erp/dashboard') }}" class="w-full md:w-auto bg-stone-950 text-white px-12 py-6 rounded-[24px] text-[10px] font-black uppercase tracking-[0.3em] hover:scale-105 transition-all shadow-2xl flex items-center justify-center gap-4">
                            <span class="material-symbols-outlined text-primary">dashboard</span>
                            Retornar al Centro de Comando
                        </a>
                        
                        <button onclick="window.location.reload()" class="w-full md:w-auto bg-white border border-stone-200 text-stone-900 px-12 py-6 rounded-[24px] text-[10px] font-black uppercase tracking-[0.3em] hover:border-primary transition-all flex items-center justify-center gap-4">
                            <span class="material-symbols-outlined text-stone-400">restart_alt</span>
                            Reintentar Operación
                        </button>
                    </div>
                </div>
            </div>

            <!-- System Info Footer -->
            <div class="bg-stone-50 p-8 border-t border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-lg bg-stone-200 flex items-center justify-center text-stone-500">
                        <span class="material-symbols-outlined text-sm">terminal</span>
                    </div>
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">ERROR_CODE_STITCH_500 • SISTEMA ESTABILIZADO</p>
                </div>
                <p class="text-[9px] font-black text-stone-300 uppercase tracking-widest leading-none">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
            </div>
        </div>
    </div>
</div>
@endsection
