@extends('layouts.erp')

@section('title', 'Flujo de Aprobaciones | Zenith ERP')

@section('content')
<div class="space-y-8 animate-in fade-in duration-500">
    <!-- Header SEO -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-stone-200 pb-6">
        <div>
            <p class="text-[10px] font-black text-lima-cima tracking-[0.3em] uppercase mb-2 font-headline">Intelligence Workflow</p>
            <h1 class="text-4xl font-headline font-black text-stone-900 tracking-tighter uppercase italic">Control de <span class="text-lima-cima not-italic">Aprobaciones</span></h1>
            <p class="text-stone-500 text-xs font-medium flex items-center gap-2 mt-1">
                <span class="material-symbols-outlined text-sm">verified_user</span> 
                Sistema de validacion transaccional para operaciones criticas.
            </p>
        </div>
        <div class="flex gap-2">
            <div class="bg-white border border-stone-200 px-5 py-3 rounded-xl shadow-sm text-center min-w-[120px]">
                <span class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Pendientes</span>
                <p class="text-2xl font-headline font-black text-stone-900 tracking-tighter">{{ $pendingApprovals->count() }}</p>
            </div>
        </div>
    </div>

    <!-- PENDING APPROVALS GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @forelse($pendingApprovals as $approval)
            <div class="bg-white border border-stone-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:border-lima-cima transition-all group p-8 relative">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 bg-stone-900 rounded-2xl flex items-center justify-center text-lima-cima group-hover:bg-lima-cima group-hover:text-stone-900 transition-colors shadow-lg">
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
                                Requiere: {{ $approval->requester->name ?? 'Admin' }}
                            </p>
                        </div>
                    </div>
                    <span class="px-4 py-1.5 bg-yellow-400 text-stone-900 text-[9px] font-black uppercase tracking-[0.2em] rounded-full shadow-sm">
                        Waiting
                    </span>
                </div>

                <div class="bg-stone-50 rounded-2xl p-6 mb-8 border border-stone-100">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Monto Total</p>
                            <p class="text-3xl font-headline font-black text-stone-900 tracking-tighter">
                                ${{ number_format($approval->approvable->total ?? 0, 2) }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1">Vencimiento</p>
                            <p class="text-sm font-black text-stone-700 uppercase tracking-tight">{{ $approval->created_at->addDays(2)->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-8 pl-4 border-l-2 border-lima-cima/30">
                    <p class="text-xs text-stone-500 font-medium italic leading-relaxed">
                        "{{ $approval->reason ?? 'Validacion de seguridad administrativa requerida por el sistema.' }}"
                    </p>
                </div>

                <!-- ACTIONS -->
                <form action="{{ route('erp.approvals.process', $approval) }}" method="POST" class="flex gap-4">
                    @csrf
                    <input type="hidden" name="action" id="action_{{ $approval->id }}" value="approve">
                    
                    <button type="submit" onclick="document.getElementById('action_{{ $approval->id }}').value='approve'" class="flex-1 bg-stone-900 text-lima-cima py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] hover:bg-lima-cima hover:text-stone-900 transition-all shadow-xl shadow-stone-900/10 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg font-black">check_circle</span>
                        Aprobar
                    </button>
                    
                    <button type="button" onclick="showRejectModal('{{ $approval->id }}')" class="flex-1 border-2 border-stone-100 text-stone-400 py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] hover:bg-stone-50 hover:border-red-500 hover:text-red-500 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">cancel</span>
                        Rechazar
                    </button>
                </form>
            </div>
        @empty
            <div class="lg:col-span-2 py-32 text-center bg-stone-50 rounded-[40px] border-4 border-dashed border-stone-100">
                <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm border border-stone-100">
                    <span class="material-symbols-outlined text-4xl text-lima-cima font-black">verified</span>
                </div>
                <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tight">Cero Pendientes</h3>
                <p class="text-stone-400 text-sm font-medium mt-1">El flujo operativo Zenith esta al dia.</p>
            </div>
        @endforelse
    </div>

    <!-- HISTORY TABLE -->
    <div class="bg-white border border-stone-100 rounded-[40px] p-10 shadow-sm overflow-hidden relative">
        <div class="absolute top-0 right-0 p-8 opacity-5">
            <span class="material-symbols-outlined text-[120px]">manage_search</span>
        </div>
        <div class="flex justify-between items-center mb-10">
            <div>
                <h3 class="text-2xl font-headline font-black text-stone-900 uppercase tracking-tight">Audit Trail</h3>
                <p class="text-xs text-stone-400 font-medium tracking-wide">Registro Historico de Decisiones Administrativas</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] border-b border-stone-50">
                        <th class="pb-6 px-4">Documento</th>
                        <th class="pb-6 px-4">Estado Resultante</th>
                        <th class="pb-6 px-4">Operador</th>
                        <th class="pb-6 px-4">Timestamp</th>
                        <th class="pb-6 px-4">Feedback</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($historyApprovals as $hist)
                    <tr class="border-b border-stone-50/50 hover:bg-stone-50/30 transition-colors group">
                        <td class="py-6 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-stone-50 rounded-lg flex items-center justify-center group-hover:bg-white transition-colors">
                                    <span class="material-symbols-outlined text-stone-400 text-lg">assignment</span>
                                </div>
                                <div>
                                    <p class="font-black text-stone-900 uppercase tracking-tight">#{{ $hist->approvable_id }}</p>
                                    <p class="text-[9px] text-stone-400 font-bold uppercase tracking-widest">{{ str_replace(['App\\Models\\', 'Order'], ['', 'Orden'], $hist->approvable_type) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-6 px-4">
                            @if($hist->status == 'approved')
                                <span class="px-3 py-1 bg-lima-cima text-stone-900 text-[8px] font-black uppercase tracking-widest rounded-full shadow-sm shadow-lima-cima/20">Authorized</span>
                            @else
                                <span class="px-3 py-1 bg-red-500 text-white text-[8px] font-black uppercase tracking-widest rounded-full shadow-sm shadow-red-500/20">Denied</span>
                            @endif
                        </td>
                        <td class="py-6 px-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-stone-900 rounded-full flex items-center justify-center text-[8px] font-bold text-lima-cima">A</div>
                                <span class="text-xs font-black text-stone-700 uppercase tracking-tight">{{ $hist->approver->name ?? 'SYSTEM' }}</span>
                            </div>
                        </td>
                        <td class="py-6 px-4 text-stone-400 text-[10px] font-bold uppercase tracking-widest italic">
                            {{ $hist->updated_at->format('d/m/Y | H:i') }}
                        </td>
                        <td class="py-6 px-4 text-stone-500 italic text-[11px] max-w-[200px] truncate group-hover:text-stone-900 transition-colors">
                            {{ $hist->reason ?? 'Procesado automaticamente por politicas internas.' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Rechazo -->
<div id="rejectModal" class="fixed inset-0 bg-stone-900/60 backdrop-blur-md z-50 flex items-center justify-center hidden p-6 animate-fade-in">
    <div class="bg-white rounded-[40px] w-full max-w-lg p-10 shadow-2xl scale-in-center">
        <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-3xl text-red-600 font-black">gavel</span>
        </div>
        <h3 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter text-center mb-2">Denegar Operacion</h3>
        <p class="text-stone-400 text-sm font-medium text-center mb-8 italic">Se requiere una justificacion formal para rechazar esta transaccion.</p>
        
        <form id="rejectForm" method="POST">
            @csrf
            <input type="hidden" name="action" value="reject">
            <div class="mb-8">
                <label class="block text-[9px] font-black text-stone-400 uppercase tracking-[0.3em] mb-3 ml-1">Observaciones Administrativas</label>
                <textarea name="reason" rows="4" class="w-full bg-stone-50 border-stone-200 rounded-3xl p-5 text-sm font-medium focus:ring-4 focus:ring-lima-cima/20 border-lima-cima/0 focus:border-lima-cima transition-all" placeholder="Ej: Discrepancia en lista de precios o falta de aval bancario..." required></textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <button type="button" onclick="closeRejectModal()" class="py-5 text-stone-400 font-black text-xs uppercase tracking-widest hover:text-stone-900 transition-colors">
                    Abordar
                </button>
                <button type="submit" class="bg-red-600 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-red-200 hover:bg-red-700 transition-all">
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
