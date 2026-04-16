@extends('erp.layouts.app')

@section('title', 'Historial de Auditoría')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Historial de Auditoría</span>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Trazabilidad Total & Compliance</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Bitácora de <span class="text-stone-400">Actividades</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">Registro histórico de cambios en el ecosistema Zenith</p>
        </div>
        <div class="flex gap-3">
             <button class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">download</span>
                Exportar Historial
            </button>
        </div>
    </div>

    <!-- Interface Bento Grid -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <!-- Sidebar Filters (3 cols) -->
        <div class="col-span-12 lg:col-span-3 space-y-6">
            <section class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm">
                <h3 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Filtrar Eventos</h3>
                
                <form action="{{ route('erp.inventario.auditoria') }}" method="GET" class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-stone-400 uppercase">Log Name</label>
                        <select name="log" class="w-full bg-stone-50 border-none rounded-xl py-3 px-4 text-xs font-bold text-stone-900">
                            <option value="">Todos los registros</option>
                            <option value="inventario">Inventario</option>
                            <option value="ventas">Ventas</option>
                            <option value="auth">Seguridad</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-stone-400 uppercase">Tipo de Acción</label>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg text-[10px] font-black uppercase border border-green-100">Created</button>
                            <button type="button" class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-[10px] font-black uppercase border border-blue-100">Updated</button>
                            <button type="button" class="px-3 py-1.5 bg-red-50 text-red-700 rounded-lg text-[10px] font-black uppercase border border-red-100">Deleted</button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-stone-900 text-primary py-4 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-black transition-all mt-4">
                        Refinar Búsqueda
                    </button>
                </form>
            </section>

            <!-- Stats Card -->
            <section class="bg-stone-900 p-8 rounded-[32px] shadow-xl text-white">
                <p class="text-[9px] font-black text-primary uppercase tracking-widest mb-4">Total de Registros</p>
                <h4 class="text-4xl font-headline font-black italic">{{ $activities->total() }}</h4>
                <p class="text-[10px] text-stone-500 mt-2 font-bold uppercase">Eventos auditados</p>
            </section>
        </div>

        <!-- Activity Timeline (9 cols) -->
        <div class="col-span-12 lg:col-span-9 space-y-4">
            @forelse($activities as $activity)
                <div class="bg-white border border-stone-200 rounded-[24px] p-6 hover:border-primary transition-all group shadow-sm">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0
                                {{ $activity->description == 'created' ? 'bg-green-100 text-green-600' : 
                                   ($activity->description == 'updated' ? 'bg-blue-100 text-blue-600' : 
                                   ($activity->description == 'deleted' ? 'bg-red-100 text-red-600' : 'bg-stone-100 text-stone-600')) }}">
                                <span class="material-symbols-outlined">
                                    {{ $activity->description == 'created' ? 'add_circle' : 
                                       ($activity->description == 'updated' ? 'edit_note' : 
                                       ($activity->description == 'deleted' ? 'delete' : 'info')) }}
                                </span>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-[10px] font-black uppercase tracking-widest px-2 py-0.5 bg-stone-100 text-stone-600 rounded">
                                        {{ $activity->log_name ?? 'Default' }}
                                    </span>
                                    <span class="text-[10px] font-black uppercase tracking-widest px-2 py-0.5 
                                        {{ $activity->description == 'created' ? 'bg-green-50 text-green-700' : 
                                           ($activity->description == 'updated' ? 'bg-blue-50 text-blue-700' : 
                                           ($activity->description == 'deleted' ? 'bg-red-50 text-red-700' : 'bg-stone-50 text-stone-700')) }} rounded">
                                        {{ $activity->description }}
                                    </span>
                                </div>
                                <h4 class="text-sm font-black text-stone-900 uppercase">
                                    @if($activity->subject)
                                        {{ class_basename($activity->subject_type) }}: 
                                        <span class="text-stone-400">#{{ $activity->subject->id }}</span>
                                        {{ $activity->subject->nombre ?? $activity->subject->name ?? '' }}
                                    @else
                                        Acción del Sistema
                                    @endif
                                </h4>
                                <p class="text-[10px] text-stone-500 font-bold uppercase tracking-widest mt-1">
                                    Realizado por: <span class="text-stone-900">{{ $activity->causer->name ?? 'Sistema' }}</span> • {{ $activity->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            @if($activity->properties && count($activity->properties) > 0)
                                <button onclick="toggleDetails('activity-{{ $activity->id }}')" class="p-2 text-stone-400 hover:text-stone-900 hover:bg-stone-50 rounded-lg transition-all">
                                    <span class="material-symbols-outlined">analytics</span>
                                </button>
                            @endif
                            <a href="#" class="p-2 text-stone-400 hover:text-primary hover:bg-stone-900 rounded-lg transition-all">
                                <span class="material-symbols-outlined">open_in_new</span>
                            </a>
                        </div>
                    </div>

                    <!-- Details Panel (Hidden by default) -->
                    @if($activity->properties && count($activity->properties) > 0)
                        <div id="activity-{{ $activity->id }}" class="hidden mt-6 pt-6 border-t border-stone-50 overflow-x-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                @if(isset($activity->properties['old']))
                                    <div>
                                        <p class="text-[9px] font-black text-stone-400 uppercase mb-3">Valores Anteriores</p>
                                        <div class="space-y-2">
                                            @foreach($activity->properties['old'] as $key => $value)
                                                <div class="flex justify-between text-[10px] uppercase border-b border-stone-50 pb-1">
                                                    <span class="font-bold text-stone-400 text-[8px]">{{ $key }}</span>
                                                    <span class="font-black text-stone-600 line-clamp-1">{{ is_array($value) ? json_encode($value) : $value }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if(isset($activity->properties['attributes']))
                                    <div>
                                        <p class="text-[9px] font-black text-primary uppercase mb-3">Nuevos Valores / Cambios</p>
                                        <div class="space-y-2">
                                            @foreach($activity->properties['attributes'] as $key => $value)
                                                <div class="flex justify-between text-[10px] uppercase border-b border-stone-50 pb-1">
                                                    <span class="font-bold text-stone-400 text-[8px]">{{ $key }}</span>
                                                    <span class="font-black text-stone-900 line-clamp-1">{{ is_array($value) ? json_encode($value) : $value }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if(!isset($activity->properties['old']) && !isset($activity->properties['attributes']))
                                    <div class="col-span-2">
                                        <p class="text-[9px] font-black text-stone-400 uppercase mb-3">Metadata</p>
                                        <pre class="bg-stone-50 p-4 rounded-xl text-[10px] text-stone-600 font-mono">{{ json_encode($activity->properties, JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="bg-white border border-stone-200 rounded-[32px] p-20 text-center">
                    <span class="material-symbols-outlined text-stone-200 text-6xl">history</span>
                    <p class="text-[10px] text-stone-400 mt-4 font-black uppercase tracking-[0.3em]">No hay actividad registrada aún</p>
                </div>
            @endforelse

            <div class="mt-8">
                {{ $activities->links() }}
            </div>
        </div>
    </div>

    <script>
        function toggleDetails(id) {
            const el = document.getElementById(id);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }
    </script>
@endsection
