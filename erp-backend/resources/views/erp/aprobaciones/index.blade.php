@extends('erp.layouts.app')

@section('title', 'Control de Aprobaciones | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium italic">Aprobaciones Operativas</span>
@endsection

@section('content')
<div class="space-y-8 animate-in fade-in duration-500">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div>
            <p class="text-[10px] font-black text-primary tracking-[0.3em] uppercase mb-1">Intelligence Workflow</p>
            <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tighter uppercase italic">Control de <span class="text-primary-dim not-italic">Aprobaciones</span></h2>
            <p class="text-stone-500 text-sm mt-1 font-medium italic">Sistema de validación transaccional para operaciones industriales críticas.</p>
        </div>
        <div class="flex gap-4">
            <div class="bg-stone-900 px-6 py-3 rounded-2xl border-l-4 border-primary shadow-lg shadow-stone-900/10">
                <p class="text-[9px] text-stone-400 uppercase tracking-widest font-black mb-1">Pendientes</p>
                <p class="text-xl font-headline font-black text-white">{{ $pendingApprovals->count() }} Solic.</p>
            </div>
        </div>
    </div>

    <!-- PENDING APPROVALS GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @forelse($pendingApprovals as $approval)
            <div class="bg-white border border-stone-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:border-primary/50 transition-all p-8 relative group">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 bg-stone-900 rounded-2xl flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-stone-900 transition-colors shadow-lg">
                            @php
                                $icon = 'description';
                                if(str_contains($approval->approvable_type, 'Order')) $icon = 'shopping_bag';
                                if(str_contains($approval->approvable_type, 'Purchase')) $icon = 'local_shipping';
                            @endphp
                            <span class="material-symbols-outlined text-3xl font-black">{{ $icon }}</span>
                        </div>
                        <div>
                            <h3 class="font-headline font-black text-xl text-stone-900 uppercase tracking-tight">
                                @if(str_contains($approval->approvable_type, 'Order'))
                                    Venta: #ORD-{{ $approval->approvable_id }}
                                @else
                                    Doc: #{{ $approval->approvable_id }}
                                @endif
                            </h3>
                            <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">person</span>
                                Solicitante: {{ $approval->requester->name ?? 'Admin' }}
                            </p>
                        </div>
                    </div>
                    <span class="px-4 py-1.5 bg-amber-100 text-amber-700 text-[9px] font-black uppercase tracking-[0.2em] rounded-full border border-amber-200">
                        En Espera
                    </span>
                </div>

                <div class="bg-stone-50 rounded-2xl p-6 mb-8 border border-stone-100">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Impacto Financiero</p>
                            <p class="text-3xl font-headline font-black text-stone-900 tracking-tighter">
                                ${{ number_format($approval->approvable->total ?? 0, 2) }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Expiración</p>
                            <p class="text-sm font-black text-stone-700 uppercase tracking-tight">{{ $approval->created_at->addDays(2)->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-8 pl-4 border-l-4 border-primary/30">
                    <p class="text-xs text-stone-500 font-medium italic leading-relaxed">
                        "{{ $approval->reason ?? 'Validación de seguridad administrativa requerida por el sistema de control industrial.' }}"
                    </p>
                </div>

                <!-- ACTIONS -->
                <form action="{{ route('erp.aprobaciones.process', $approval) }}" method="POST" class="flex gap-4">
                    @csrf
                    <input type="hidden" name="action" id="action_{{ $approval->id }}" value="approve">
                    
                    <button type="submit" onclick="document.getElementById('action_{{ $approval->id }}').value='approve'" class="flex-1 bg-stone-900 text-primary py-4 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-primary hover:text-stone-900 transition-all shadow-xl shadow-stone-900/10 flex items-center justify-center gap-2 active:scale-95">
                        <span class="material-symbols-outlined text-lg font-black">check_circle</span>
                        Aprobar
                    </button>
                    
                    <button type="button" onclick="showRejectModal('{{ $approval->id }}')" class="flex-1 border border-stone-200 text-stone-400 py-4 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-red-50 hover:border-red-500 hover:text-red-500 transition-all flex items-center justify-center gap-2 active:scale-95">
                        <span class="material-symbols-outlined text-lg">cancel</span>
                        Rechazar
                    </button>
                </form>
            </div>
        @empty
            <div class="lg:col-span-2 py-32 text-center bg-stone-50 rounded-[40px] border-4 border-dashed border-stone-200 relative overflow-hidden">
                <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #000 1px, transparent 1px); background-size: 20px 20px;"></div>
                <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm border border-stone-100">
                    <span class="material-symbols-outlined text-4xl text-primary font-black">verified</span>
                </div>
                <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tight">Cero Pendientes</h3>
                <p class="text-stone-400 text-sm font-medium mt-1 italic">El flujo operativo de Zenith ERP esta sincronizado y al dia.</p>
            </div>
        @endforelse
    </div>

    <!-- HISTORY TABLE -->
    <div class="bg-white border border-stone-200 rounded-[40px] p-10 shadow-sm overflow-hidden relative">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tight italic">Trazabilidad Auditora</h3>
                <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mt-1">Registro Histórico de Decisiones Administrativas</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] border-b border-stone-100">
                        <th class="pb-6 px-4">Documento / Tipo</th>
                        <th class="pb-6 px-4 text-center">Estado Final</th>
                        <th class="pb-6 px-4">Operador Auditor</th>
                        <th class="pb-6 px-4 text-right">Timestamp</th>
                        <th class="pb-6 px-4">Feedback / Razón</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($historyApprovals as $hist)
                    <tr class="border-b border-stone-50 hover:bg-stone-50/50 transition-colors group">
                        <td class="py-6 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400 group-hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">assignment</span>
                                </div>
                                <div>
                                    <p class="font-black text-stone-900 uppercase tracking-tight">#{{ $hist->approvable_id }}</p>
                                    <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">{{ str_replace(['App\\Models\\', 'Order'], ['', 'Orden'], $hist->approvable_type) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-6 px-4 text-center">
                            @if($hist->status == 'approved')
                                <span class="px-3 py-1 bg-primary text-stone-900 text-[8px] font-black uppercase tracking-widest rounded-lg">Autorizado</span>
                            @else
                                <span class="px-3 py-1 bg-red-600 text-white text-[8px] font-black uppercase tracking-widest rounded-lg">Denegado</span>
                            @endif
                        </td>
                        <td class="py-6 px-4 uppercase font-black text-[11px] text-stone-700">
                            {{ $hist->approver->name ?? 'SYSTEM ADMIN' }}
                        </td>
                        <td class="py-6 px-4 text-right text-stone-400 text-[10px] font-black tracking-widest uppercase italic">
                            {{ $hist->updated_at->format('d/m/Y | H:i') }}
                        </td>
                        <td class="py-6 px-4 text-stone-500 italic text-[11px] max-w-[200px] truncate group-hover:text-stone-900 transition-colors">
                            {{ $hist->reason ?? 'Procesado automáticamente por políticas internas.' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Rechazo -->
<div id="rejectModal" class="fixed inset-0 bg-stone-900/40 backdrop-blur-sm z-50 flex items-center justify-center hidden p-6 animate-fade-in">
    <div class="bg-white rounded-[40px] w-full max-w-lg p-10 shadow-2xl relative">
        <div class="absolute -top-4 -right-4">
            <button onclick="closeRejectModal()" class="w-10 h-10 bg-white border border-stone-200 rounded-full flex items-center justify-center text-stone-400 hover:text-stone-900 transition-all shadow-lg">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-3xl text-red-600 font-black">gavel</span>
        </div>
        <h3 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter text-center mb-2 italic">Denegar Operación</h3>
        <p class="text-stone-400 text-sm font-medium text-center mb-8 italic">Se requiere una justificación formal para rechazar esta transacción crítica.</p>
        
        <form id="rejectForm" method="POST">
            @csrf
            <input type="hidden" name="action" value="reject">
            <div class="mb-8">
                <label class="block text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] mb-4 ml-1">Observaciones Administrativas</label>
                <textarea name="reason" rows="4" class="w-full bg-stone-50 border border-stone-200 rounded-3xl p-6 text-xs font-semibold focus:ring-4 focus:ring-primary/20 border-primary/0 focus:border-primary transition-all placeholder:text-stone-300" placeholder="Ej: Discrepancia en lista de precios o falta de aval bancario..." required></textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <button type="button" onclick="closeRejectModal()" class="py-5 text-stone-400 font-black text-[10px] uppercase tracking-widest hover:text-stone-900 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="bg-red-600 text-white py-5 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-xl shadow-red-200 hover:bg-red-700 transition-all active:scale-95">
                    Confirmar Rechazo
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showRejectModal(id) {
        const modal = document.getElementById('rejectModal');
        const form = document.getElementById('rejectForm');
        form.action = `/erp/aprobaciones/${id}/process`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeRejectModal() {
        const modal = document.getElementById('rejectModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endsection
