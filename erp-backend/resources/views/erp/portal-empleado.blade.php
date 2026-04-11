@extends('layouts.erp')

@section('title', 'Portal del Empleado - TITAN INDUSTRIAL ERP | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/portal-empleado.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'P�gina';
  });
</script>

<main class="pl-64 pt-16 min-h-screen">
<div class="max-w-7xl mx-auto p-8">
<!-- Welcome Header -->
<header class="mb-12 relative overflow-hidden bg-stone-950 p-10 text-white rounded-lg">
<div class="absolute right-0 top-0 w-1/3 h-full opacity-20 pointer-events-none">
<img alt="Industrial Blueprint" class="w-full h-full object-cover" data-alt="Technical schematic diagram of an engine part with precise lines and measurements on a dark technical background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKF4RI8MZ9lzBxzxXJA23LBJG2OXjpDJYlb9Qk1-Wdmc15k3TJFbWlklBLM0y88og-ar1IVvNLOFvhtEMKbn67wO3OLLHVO6jvD8JWKSjBmypWeiP8TCykybzmCAu4XREgb7ZvYb_G5674wt673fP3roJPagIPRJlEqSAgP1DF_5VPX-yqM9usEfuy35prd8UUUnuuJK-_kHTdyWGTEasPKuI0MRdEVvNPt3NnEtfwS_Qc2KZaWOnh0HE8aNsirb-ZEJIFxsbv-Vg"/>
</div>
<div class="relative z-10">
<span class="inline-block px-3 py-1 bg-lime-500 text-stone-950 font-bold text-[10px] tracking-widest uppercase mb-4">Panel del Trabajador</span>
<h1 class="text-5xl font-black uppercase tracking-tighter mb-2 leading-none">BIENVENIDO, CARLOS ORTEGA</h1>
<p class="text-stone-400 font-body text-lg max-w-xl">ID: TITAN-74492 | Operador Senior de Maquinaria Pesada | Planta Central</p>
</div>
</header>
<!-- Bento Grid Stats -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-12">
<!-- Vacation Card -->
<div class="md:col-span-4 bg-surface-container-lowest p-8 flex flex-col justify-between min-h-[220px]">
<div>
<p class="text-stone-500 text-xs font-bold uppercase tracking-widest mb-1">Días de Vacaciones</p>
<h2 class="text-6xl font-black text-primary leading-tight">18 <span class="text-lg font-medium text-stone-400 uppercase tracking-normal">Disponibles</span></h2>
</div>
<div class="mt-6 flex items-center gap-2">
<div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 60%"></div>
</div>
<span class="text-[10px] font-bold text-stone-400">60%</span>
</div>
</div>
<!-- Prestaciones Card (Art 142) -->
<div class="md:col-span-8 bg-surface-container p-8 flex flex-col justify-between">
<div class="flex justify-between items-start">
<div>
<p class="text-stone-500 text-xs font-bold uppercase tracking-widest mb-1">Garantía Prestaciones Sociales (Art. 142)</p>
<h2 class="text-4xl font-black text-on-surface tracking-tighter">USD $12.450,82</h2>
</div>
<button class="bg-surface-container-highest p-3 rounded-full hover:bg-primary-container hover:text-on-primary-container transition-colors">
<span class="material-symbols-outlined">receipt_long</span>
</button>
</div>
<div class="grid grid-cols-3 gap-4 mt-8 border-t border-stone-300 pt-6">
<div>
<p class="text-[10px] text-stone-400 uppercase font-bold">Acumulado Trimestral</p>
<p class="text-sm font-black">$1.200,00</p>
</div>
<div>
<p class="text-[10px] text-stone-400 uppercase font-bold">Antigüedad</p>
<p class="text-sm font-black">4 Años, 2 Meses</p>
</div>
<div>
<p class="text-[10px] text-stone-400 uppercase font-bold">Última Actualización</p>
<p class="text-sm font-black">30 SEP 2023</p>
</div>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Latest Receipts Section -->
<div class="lg:col-span-2">
<div class="flex items-center justify-between mb-6">
<h3 class="text-2xl font-black uppercase tracking-tight">ÚLTIMOS RECIBOS DE NÓMINA</h3>
<a class="text-primary text-xs font-bold uppercase tracking-widest hover:underline" href="#">Ver Historial</a>
</div>
<div class="bg-surface-container-lowest overflow-hidden">
<div class="divide-y divide-surface-container">
<!-- Receipt Item -->
<div class="p-5 flex items-center justify-between group hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-stone-400">description</span>
</div>
<div>
<p class="font-black text-sm uppercase tracking-tighter">QUINCENA 2 - OCTUBRE 2023</p>
<p class="text-xs text-stone-500 uppercase tracking-widest">Abonado el 30/10/2023</p>
</div>
</div>
<div class="flex items-center gap-6">
<p class="font-black text-lime-700">$1.450,22</p>
<button class="bg-stone-950 text-white px-4 py-2 text-[10px] font-bold uppercase tracking-widest hover:bg-primary transition-colors">DESCARGAR</button>
</div>
</div>
<!-- Receipt Item -->
<div class="p-5 flex items-center justify-between group hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-stone-400">description</span>
</div>
<div>
<p class="font-black text-sm uppercase tracking-tighter">QUINCENA 1 - OCTUBRE 2023</p>
<p class="text-xs text-stone-500 uppercase tracking-widest">Abonado el 15/10/2023</p>
</div>
</div>
<div class="flex items-center gap-6">
<p class="font-black text-lime-700">$1.450,22</p>
<button class="bg-stone-950 text-white px-4 py-2 text-[10px] font-bold uppercase tracking-widest hover:bg-primary transition-colors">DESCARGAR</button>
</div>
</div>
<!-- Receipt Item -->
<div class="p-5 flex items-center justify-between group hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-stone-400">description</span>
</div>
<div>
<p class="font-black text-sm uppercase tracking-tighter">QUINCENA 2 - SEPTIEMBRE 2023</p>
<p class="text-xs text-stone-500 uppercase tracking-widest">Abonado el 30/09/2023</p>
</div>
</div>
<div class="flex items-center gap-6">
<p class="font-black text-lime-700">$1.485,50</p>
<button class="bg-stone-950 text-white px-4 py-2 text-[10px] font-bold uppercase tracking-widest hover:bg-primary transition-colors">DESCARGAR</button>
</div>
</div>
</div>
</div>
</div>
<!-- Quick Actions / Permissions -->
<div class="lg:col-span-1">
<h3 class="text-2xl font-black uppercase tracking-tight mb-6">SOLICITAR PERMISOS</h3>
<div class="bg-stone-900 p-8 text-white">
<form action="#" class="space-y-6">
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-2">Tipo de Permiso</label>
<select class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-primary h-12 text-sm">
<option>Día de Vacaciones</option>
<option>Permiso Médico</option>
<option>Asuntos Personales</option>
<option>Familiar</option>
</select>
</div>
<div class="grid grid-cols-2 gap-4">
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-2">Desde</label>
<input class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-primary h-12 text-sm px-4" type="date"/>
</div>
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-2">Hasta</label>
<input class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-primary h-12 text-sm px-4" type="date"/>
</div>
</div>
<div>
<label class="block text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-2">Justificación (Opcional)</label>
<textarea class="w-full bg-stone-800 border-none text-white focus:ring-2 focus:ring-primary text-sm p-4" rows="3"></textarea>
</div>
<button class="w-full bg-lime-500 py-4 text-stone-950 font-black uppercase tracking-widest hover:bg-lime-400 transition-all active:scale-95" type="submit">
                                ENVIAR SOLICITUD
                            </button>
</form>
</div>
<div class="mt-6 p-4 border border-stone-200 bg-surface-container-low">
<div class="flex items-center gap-3 text-stone-500">
<span class="material-symbols-outlined">info</span>
<p class="text-[10px] font-medium leading-relaxed uppercase tracking-tight">Las solicitudes de permisos médicos requieren cargar el justificante en un plazo máximo de 48h.</p>
</div>
</div>
</div>
</div>
<!-- Footer / System Info -->
<footer class="mt-20 pt-8 border-t border-stone-200 flex justify-between items-center text-stone-400 text-[10px] font-bold uppercase tracking-widest">
<div>© 2023 TITAN INDUSTRIAL ERP - SECCIÓN RRHH V4.2</div>
<div class="flex gap-6">
<a class="hover:text-stone-950" href="#">Políticas de Empresa</a>
<a class="hover:text-stone-950" href="#">Reglamento Interno</a>
<a class="hover:text-stone-950" href="#">Seguridad Industrial</a>
</div>
</footer>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/portal-empleado.js"></script>
@endpush
