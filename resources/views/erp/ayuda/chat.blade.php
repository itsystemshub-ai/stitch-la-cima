@extends('erp.layouts.app')

@section('title', 'Chat de Asistencia')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/ayuda') }}" class="hover:text-stone-900 transition-colors">Ayuda</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Chat de Asistencia</span>
@endsection

@section('content')
    <div class="flex h-[calc(100vh-12rem)] bg-white border border-stone-200 rounded-[32px] overflow-hidden shadow-sm">
        <!-- Chat Sidebar: Knowledge Base -->
        <aside class="hidden lg:flex flex-col w-80 bg-stone-50 border-r border-stone-100 p-8 overflow-y-auto">
            <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-6">Recursos de Apoyo</h3>
            <div class="space-y-4">
                <div class="bg-white p-4 rounded-2xl border border-stone-100 hover:border-primary transition-all cursor-pointer group">
                    <p class="text-[10px] font-black text-primary uppercase mb-1">Guía Técnica</p>
                    <p class="text-sm font-bold text-stone-900">Mantenimiento de Motores v2</p>
                </div>
                <!-- More items can go here -->
            </div>
        </aside>

        <!-- Main Chat Area -->
        <section class="flex-1 flex flex-col relative bg-white">
            <header class="h-20 flex items-center justify-between px-8 border-b border-stone-50">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-stone-900 rounded-full flex items-center justify-center text-primary font-black">MF</div>
                    <div>
                        <h4 class="text-sm font-black text-stone-900 uppercase">Marcus Forge</h4>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Soporte Técnico Especializado</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 p-8 overflow-y-auto space-y-6">
                <!-- Message Example -->
                <div class="flex gap-4 max-w-xl">
                    <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-[10px] font-black">MF</div>
                    <div class="bg-stone-50 p-4 rounded-2xl rounded-tl-none">
                        <p class="text-xs text-stone-700 leading-relaxed">Bienvenido al centro de asistencia técnica. Estoy aquí para ayudarte con cualquier duda sobre la operación del sistema ERP o procesos industriales de La Cima.</p>
                    </div>
                </div>
            </div>

            <footer class="p-6 border-t border-stone-50">
                <div class="flex gap-4 items-center bg-stone-50 p-2 rounded-2xl border border-stone-100">
                    <input type="text" placeholder="Escribe tu consulta técnica aquí..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm px-4">
                    <button class="bg-stone-900 text-primary w-10 h-10 rounded-xl flex items-center justify-center hover:bg-black transition-all">
                        <span class="material-symbols-outlined text-sm">send</span>
                    </button>
                </div>
            </footer>
        </section>
    </div>
@endsection
