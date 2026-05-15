@extends('layouts.ecommerce')

@section('content')
<div class="bg-[#fdfdfd] min-h-screen text-[#111]">
    <!-- Luxury Sub-Nav -->
    <div class="bg-white/80 backdrop-blur-2xl border-b border-stone-100 py-6 px-6 md:px-12 sticky top-[68px] z-30 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
        <div class="max-w-[1920px] mx-auto flex flex-wrap items-center justify-between gap-8">
            <div class="flex items-center gap-10 overflow-x-auto no-scrollbar py-2">
                <a href="{{ route('tienda.panel.index') }}" class="flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.25em] {{ request()->routeIs('tienda.panel.index') ? 'text-black border-b-2 border-black' : 'text-stone-400 hover:text-black' }} transition-all pb-2">
                    <span class="material-symbols-outlined text-base">grid_view</span>
                    Dashboard
                </a>
                <a href="{{ route('tienda.panel.ordenes') }}" class="flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.25em] {{ request()->routeIs('tienda.panel.ordenes') ? 'text-black border-b-2 border-black' : 'text-stone-400 hover:text-black' }} transition-all pb-2">
                    <span class="material-symbols-outlined text-base">history_edu</span>
                    Operaciones
                </a>
                @if(auth()->user()->role === 'vendedor')
                <a href="{{ route('tienda.panel.vendedor') }}" class="flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.25em] {{ request()->routeIs('tienda.panel.vendedor') ? 'text-black border-b-2 border-black' : 'text-stone-400 hover:text-black' }} transition-all pb-2">
                    <span class="material-symbols-outlined text-base">query_stats</span>
                    Ventas B2B
                </a>
                @endif
                <a href="{{ route('tienda.panel.perfil') }}" class="flex items-center gap-3 text-[11px] font-black uppercase tracking-[0.25em] {{ request()->routeIs('tienda.panel.perfil') ? 'text-black border-b-2 border-black' : 'text-stone-400 hover:text-black' }} transition-all pb-2">
                    <span class="material-symbols-outlined text-base">settings_accessibility</span>
                    Cuenta
                </a>
            </div>
            
            <div class="flex items-center gap-8">
                <div class="flex flex-col items-end">
                    <span class="text-[8px] font-bold text-stone-300 uppercase tracking-[0.3em] leading-none mb-1.5">Conexión Encriptada</span>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-black rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-black uppercase tracking-tight">VIP Access</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="py-16">
        <div class="max-w-[1920px] mx-auto px-6 md:px-12">
            @yield('panel_content')
        </div>
    </main>
</div>

<style>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection
