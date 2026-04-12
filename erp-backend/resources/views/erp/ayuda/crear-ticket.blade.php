@extends('erp.layouts.app')

@section('title', 'Abrir Ticket de Soporte | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Manejo de Incidentes</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Nuevo Requerimiento</h2>
    <p class="text-stone-500 text-sm mt-1">Describa su solicitud técnica detalladamente • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <a href="{{ url('/erp/ayuda/tickets') }}" class="bg-white border border-stone-200 text-stone-700 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-stone-50 transition-all active:scale-95 shadow-sm">
      Cancelar
    </a>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <!-- Left Column: Form -->
  <div class="lg:col-span-8">
    <div class="bg-white rounded-2xl border border-stone-200 shadow-xl shadow-stone-200/50 overflow-hidden">
      <div class="px-10 py-8 border-b border-stone-100 bg-stone-50/50">
        <h3 class="font-headline font-black text-xl text-stone-900 uppercase tracking-tight">Formulario de Soporte Técnico</h3>
      </div>
      <form class="p-10 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="space-y-2">
            <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">Módulo Afectado</label>
            <select class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-3 text-sm font-bold text-stone-700 focus:ring-2 focus:ring-primary/50 transition-all appearance-none cursor-pointer">
              <option>Seleccione un módulo...</option>
              <option>Inventario & Stock</option>
              <option>Ventas & Facturación (POS)</option>
              <option>RRHH & Nómina</option>
              <option>Finanzas & Contabilidad</option>
              <option>Configuración del Sistema</option>
              <option>Otro / General</option>
            </select>
          </div>
          <div class="space-y-2">
            <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">Nivel de Urgencia</label>
            <div class="grid grid-cols-3 gap-2">
              <button type="button" class="py-2.5 rounded-lg border-2 border-stone-100 text-[10px] font-black uppercase text-stone-400 hover:border-green-500 hover:text-green-700 transition-all">Baja</button>
              <button type="button" class="py-2.5 rounded-lg border-2 border-primary bg-primary/5 text-[10px] font-black uppercase text-stone-900 shadow-sm shadow-primary/20 transition-all">Media</button>
              <button type="button" class="py-2.5 rounded-lg border-2 border-stone-100 text-[10px] font-black uppercase text-stone-400 hover:border-red-500 hover:text-red-700 transition-all">Alta</button>
            </div>
          </div>
        </div>

        <div class="space-y-2">
          <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">Asunto del Ticket</label>
          <input type="text" placeholder="Resuma su solicitud en pocas palabras..." class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-4 text-sm font-bold text-stone-900 focus:ring-2 focus:ring-primary/50 transition-all shadow-inner"/>
        </div>

        <div class="space-y-2">
          <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400">Descripción Detallada</label>
          <textarea rows="6" placeholder="Por favor, explique el paso a paso del incidente o el detalle de su requerimiento funcional..." class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-4 text-sm font-bold text-stone-900 focus:ring-2 focus:ring-primary/50 transition-all shadow-inner"></textarea>
        </div>

        <div class="p-8 border-2 border-dashed border-stone-200 rounded-2xl bg-stone-50 flex flex-col items-center justify-center gap-4 group hover:border-primary hover:bg-white transition-all cursor-pointer">
          <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-stone-300 group-hover:text-primary group-hover:scale-110 transition-all shadow-sm">
            <span class="material-symbols-outlined text-3xl">upload_file</span>
          </div>
          <div class="text-center">
            <p class="text-xs font-black text-stone-700 uppercase">Adjuntar Evidencias</p>
            <p class="text-[10px] text-stone-400 font-bold uppercase tracking-widest mt-1">Suelte archivos aquí o haga clic para buscar (PDF, JPG, PNG)</p>
          </div>
        </div>

        <div class="pt-6">
          <button type="submit" class="w-full bg-stone-900 text-primary py-5 rounded-2xl text-xs font-black uppercase tracking-[0.3em] hover:brightness-110 transition-all shadow-2xl shadow-stone-900/20 active:scale-[0.98] outline-none border-none">
            ENVIAR REQUERIMIENTO A SOPORTE
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Right Column: Security & Tips -->
  <div class="lg:col-span-4 space-y-8">
    <!-- Notice Card -->
    <div class="bg-stone-900 p-8 rounded-2xl shadow-2xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10 space-y-6">
        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary border border-primary/20">
          <span class="material-symbols-outlined text-3xl">psychology</span>
        </div>
        <div>
          <h3 class="text-xl font-headline font-black text-white uppercase tracking-tight mb-2 leading-tight">Tiempo de Respuesta Estimado</h3>
          <p class="text-stone-500 text-xs font-medium leading-relaxed">Nuestro equipo técnico evaluará su requerimiento en un tiempo promedio de <span class="text-primary font-black uppercase">45 Minutos</span> para casos de prioridad ALTA.</p>
        </div>
        <div class="pt-6 border-t border-stone-800">
           <p class="text-[9px] text-stone-500 font-black uppercase tracking-widest mb-4">Consejo Pro</p>
           <p class="text-xs text-stone-300 italic">"Incluya capturas de pantalla de los errores para agilizar el diagnóstico técnico."</p>
        </div>
      </div>
      <span class="material-symbols-outlined absolute -right-16 -bottom-16 text-[250px] opacity-10 text-primary pointer-events-none rotate-12">support_agent</span>
    </div>

    <!-- Links Section -->
    <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">¿Auto-Servicio?</h4>
      <p class="text-[10px] text-stone-500 leading-relaxed mb-6 uppercase font-bold tracking-tight">Tal vez la respuesta esté en nuestros manuales interactivos.</p>
      <div class="space-y-3">
        <a href="{{ url('/erp/ayuda/manuales') }}" class="flex items-center justify-between p-4 bg-stone-50 rounded-xl hover:bg-primary/5 hover:text-primary transition-all font-black text-[10px] text-stone-900 uppercase group">
          Explorar Manuales
          <span class="material-symbols-outlined text-stone-400 group-hover:text-primary group-hover:translate-x-1 transition-all">arrow_forward</span>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/crear-ticket.js') }}"></script>
@endpush
