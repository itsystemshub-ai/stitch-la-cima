@extends('erp.layouts.app')

@section('title', 'Portal del Empleado | ERP Zenith')

@section('content')
<!-- Welcome Header -->
<header class="mb-12 relative overflow-hidden bg-stone-900 p-10 text-white rounded-xl shadow-xl">
  <div class="absolute right-0 top-0 w-1/3 h-full opacity-20 pointer-events-none">
    <span class="material-symbols-outlined text-[120px] font-black rotate-12 absolute -right-4 -bottom-4 text-primary">engineering</span>
  </div>
  <div class="relative z-10">
    <span class="inline-block px-3 py-1 bg-primary text-stone-900 font-bold text-[10px] tracking-widest uppercase mb-4 rounded">Panel del Trabajador</span>
    <h1 class="text-4xl font-headline font-black uppercase tracking-tighter mb-2 leading-none">BIENVENIDO, CARLOS ORTEGA</h1>
    <p class="text-stone-400 font-body text-sm max-w-xl">ID: ZENITH-74492 | Operador Senior de Maquinaria Pesada | Planta Central</p>
  </div>
</header>

<!-- Bento Grid Stats -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-12">
  <!-- Vacation Card -->
  <div class="md:col-span-4 bg-white p-8 rounded-xl border border-stone-200 shadow-sm flex flex-col justify-between min-h-[220px]">
    <div>
      <p class="text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-1">Días de Vacaciones</p>
      <h2 class="text-6xl font-headline font-black text-primary leading-tight">18</h2>
      <p class="text-xs font-bold text-stone-500 uppercase tracking-wider">Días Disponibles</p>
    </div>
    <div class="mt-6 flex items-center gap-3">
      <div class="h-2 w-full bg-stone-100 rounded-full overflow-hidden border border-stone-200">
        <div class="h-full bg-primary shadow-[0_0_10px_rgba(206,255,94,0.5)]" style="width: 60%"></div>
      </div>
      <span class="text-[10px] font-bold text-stone-400">60%</span>
    </div>
  </div>

  <!-- Prestaciones Card -->
  <div class="md:col-span-8 bg-stone-900 p-8 rounded-xl shadow-lg border border-stone-800 flex flex-col justify-between">
    <div class="flex justify-between items-start">
      <div>
        <p class="text-stone-500 text-[10px] font-bold uppercase tracking-widest mb-1">Garantía Prestaciones Sociales (Art. 142)</p>
        <h2 class="text-4xl font-headline font-bold text-primary tracking-tighter">USD $12.450,82</h2>
      </div>
      <button class="bg-stone-800 text-primary p-3 rounded-xl hover:brightness-110 transition-colors border border-stone-700">
        <span class="material-symbols-outlined">receipt_long</span>
      </button>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8 border-t border-stone-800 pt-6">
      <div>
        <p class="text-[9px] text-stone-500 uppercase font-black tracking-widest">Acumulado Trimestral</p>
        <p class="text-sm font-bold text-stone-200">$1.200,00</p>
      </div>
      <div>
        <p class="text-[9px] text-stone-500 uppercase font-black tracking-widest">Antigüedad</p>
        <p class="text-sm font-bold text-stone-200">4 Años, 2 Meses</p>
      </div>
      <div>
        <p class="text-[9px] text-stone-500 uppercase font-black tracking-widest">Última Actualización</p>
        <p class="text-sm font-bold text-stone-200">30 SEP 2026</p>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
  <!-- Latest Receipts -->
  <div class="lg:col-span-2 space-y-6">
    <div class="flex items-center justify-between">
      <h3 class="text-xl font-headline font-black uppercase tracking-tight text-stone-900 border-l-4 border-primary pl-4">Últimos Recibos de Nómina</h3>
      <a class="text-primary text-[10px] font-black uppercase tracking-widest hover:brightness-75 transition-all" href="#">Ver Historial</a>
    </div>
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden divide-y divide-stone-100">
      <!-- Receipt Item 1 -->
      <div class="p-5 flex items-center justify-between hover:bg-stone-50 transition-colors">
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400">
            <span class="material-symbols-outlined">description</span>
          </div>
          <div>
            <p class="font-bold text-sm text-stone-900 uppercase tracking-tighter">QUINCENA 2 - OCTUBRE 2026</p>
            <p class="text-[10px] text-stone-500 uppercase tracking-widest">Abonado el 30/10/2026</p>
          </div>
        </div>
        <div class="flex items-center gap-6">
          <p class="font-headline font-black text-stone-900">$1.450,22</p>
          <button class="bg-stone-900 text-primary px-4 py-2 text-[10px] font-bold uppercase tracking-widest rounded-lg hover:brightness-110 transition-all">DESCARGAR</button>
        </div>
      </div>
      <!-- Receipt Item 2 -->
      <div class="p-5 flex items-center justify-between hover:bg-stone-50 transition-colors">
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-400">
            <span class="material-symbols-outlined">description</span>
          </div>
          <div>
            <p class="font-bold text-sm text-stone-900 uppercase tracking-tighter">QUINCENA 1 - OCTUBRE 2026</p>
            <p class="text-[10px] text-stone-500 uppercase tracking-widest">Abonado el 15/10/2026</p>
          </div>
        </div>
        <div class="flex items-center gap-6">
          <p class="font-headline font-black text-stone-900">$1.450,22</p>
          <button class="bg-stone-900 text-primary px-4 py-2 text-[10px] font-bold uppercase tracking-widest rounded-lg hover:brightness-110 transition-all">DESCARGAR</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions / Permissions -->
  <div class="lg:col-span-1 space-y-6">
    <h3 class="text-xl font-headline font-black uppercase tracking-tight text-stone-900 border-l-4 border-stone-900 pl-4">Solicitar Permisos</h3>
    <div class="bg-white p-8 rounded-xl border border-stone-200 shadow-lg">
      <form action="#" class="space-y-6">
        <div class="space-y-2">
          <label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400">Tipo de Permiso</label>
          <select class="w-full bg-stone-50 border-stone-200 rounded-xl text-stone-700 focus:ring-2 focus:ring-primary/50 h-12 text-sm font-bold">
            <option>Día de Vacaciones</option>
            <option>Permiso Médico</option>
            <option>Asuntos Personales</option>
            <option>Familiar</option>
          </select>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="space-y-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400">Desde</label>
            <input class="w-full bg-stone-50 border-stone-200 rounded-xl text-stone-700 focus:ring-2 focus:ring-primary/50 h-12 text-sm px-4" type="date"/>
          </div>
          <div class="space-y-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400">Hasta</label>
            <input class="w-full bg-stone-50 border-stone-200 rounded-xl text-stone-700 focus:ring-2 focus:ring-primary/50 h-12 text-sm px-4" type="date"/>
          </div>
        </div>
        <div class="space-y-2">
          <label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400">Justificación (Opcional)</label>
          <textarea class="w-full bg-stone-50 border-stone-200 rounded-xl text-stone-700 focus:ring-2 focus:ring-primary/50 text-sm p-4 placeholder:text-stone-300" placeholder="Breve explicación..." rows="3"></textarea>
        </div>
        <button class="w-full bg-stone-900 text-primary py-4 rounded-xl font-black uppercase tracking-widest hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10" type="submit">
          ENVIAR SOLICITUD
        </button>
      </form>
      <div class="mt-6 flex items-start gap-3 p-4 bg-amber-50 rounded-xl border border-amber-100">
        <span class="material-symbols-outlined text-amber-600 text-lg">info</span>
        <p class="text-[10px] font-bold leading-relaxed uppercase tracking-tight text-amber-700">Las solicitudes médicas requieren comprobante en 48h hábiles.</p>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/portal-empleado.js') }}"></script>
@endpush
