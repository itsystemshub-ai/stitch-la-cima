@extends('layouts.auth')

@section('title', 'Olvido Contraseña | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/auth/css/olvido_contraseña.css">
@endpush

@section('content')
<main class="flex-grow flex items-center justify-center pt-24 pb-12 px-4">

<div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-12 gap-0 overflow-hidden bg-surface-container-lowest shadow-2xl shadow-black/10 rounded-lg">
<!-- Side Panel: Brand Identity -->
<div class="md:col-span-5 bg-stone-900 p-8 flex flex-col justify-between relative overflow-hidden">
<div class="absolute inset-0 opacity-20 pointer-events-none">
<img alt="Industrial machinery texture" class="w-full h-full object-cover grayscale" data-alt="Close-up of industrial heavy machinery parts with metallic textures and dark shadows in an engineering workshop setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTkZtJSSNsIHQErzV1_9XzToxX14snaVh43pqwzxNW6Ysrohl30gc_ET3s2rbj_7xZPTRmQl6vkH5UscwLPkzzpOtsC8WKPHdFedPQRqjs9ltLOdAbPSm9OUkB0jAHwI5AVbjXmmuFCrQBtiUrmD9q5KNpxxK6zXS6ormvjXgxV_NL5LbNwo1zdKtlB8zFOOCA6tzK7QaADLxWIOQccfeV4ZjoVm0mtOIqsFO9_lx9JC9SkXIBSc515ARVcq2IuNoRbZXElNdOh48"/>
</div>
<div class="relative z-10">
<h2 class="font-headline text-3xl font-black text-lime-500 leading-none tracking-tighter uppercase mb-2">
                        MAYOR DE REPUESTO LA CIMA, C.A.
                    </h2>
<div class="w-12 h-1 bg-lime-500 mb-6"></div>
<p class="font-label text-stone-400 uppercase tracking-widest text-[10px] leading-relaxed">
                        Capa de Seguridad: Protocolo 04-B<br/>
                        Gestión de Activos Industriales<br/>
                        Estado del Nodo: Operativo
                    </p>
</div>
<div class="relative z-10">
<div class="p-4 bg-stone-800/50 border-l-4 border-lime-500">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined text-lime-500 text-sm">security</span>
<span class="font-headline text-xs font-bold text-stone-100 tracking-widest uppercase">Cifrado Activo</span>
</div>
<p class="text-[11px] text-stone-400 leading-normal">
                            Todas las solicitudes de recuperación se registran mediante identificadores únicos de hardware y están sujetas a auditoría manual del ERP.
                        </p>
</div>
</div>
</div>
<!-- Form Panel -->
<div class="md:col-span-7 p-8 md:p-12 bg-white">
<div class="mb-8">
<h1 class="font-headline text-4xl font-extrabold text-stone-900 uppercase tracking-tighter mb-4 leading-none">
                        Recuperación de <span class="text-primary italic">Credenciales</span>
</h1>
<p class="text-secondary font-medium text-sm max-w-sm">
                        Ingrese su correo registrado y establezca una nueva contraseña. Su solicitud será revisada por el administrador del sistema.
                    </p>
</div>
<form id="recoveryForm" class="space-y-6" onsubmit="event.preventDefault(); handleRecovery();">
<!-- Email Input -->
<div>
<label class="block font-label text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-2">
                            Correo Electrónico Registrado
                        </label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">alternate_email</span>
<input id="recoveryEmail" name="recoveryEmail" class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-0 text-stone-900 placeholder:text-stone-400 font-body text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="operador@lacima.repuestos.com" type="email" required/>
</div>
</div>

<!-- New Password -->
<div>
<label class="block font-label text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-2">
                            Nueva Contraseña
                        </label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">lock</span>
<input id="newPassword" name="newPassword" class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-0 text-stone-900 placeholder:text-stone-400 font-body text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="Mínimo 6 caracteres" type="password" required minlength="6"/>
</div>
</div>

<!-- Confirm Password -->
<div>
<label class="block font-label text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-2">
                            Confirmar Contraseña
                        </label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-stone-400 text-lg">lock_reset</span>
<input id="confirmPassword" name="confirmPassword" class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-0 text-stone-900 placeholder:text-stone-400 font-body text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="Repetir contraseña" type="password" required minlength="6"/>
</div>
</div>

<!-- Approval Notice -->
<div class="flex gap-4 items-start p-4 bg-primary/10 border border-primary/20 rounded-lg">
<span class="material-symbols-outlined text-primary mt-0.5">approval</span>
<div>
<p class="text-[12px] text-stone-700 leading-relaxed font-medium">
                            <strong>Aprobación Requerida:</strong> Su solicitud será enviada al super usuario para revisión y aprobación manual. Recibirá una notificación cuando su cuenta sea reactivada.
                        </p>
</div>
</div>

<!-- Submit Button -->
<button class="w-full bg-primary py-5 px-6 text-on-primary font-headline font-black uppercase tracking-widest text-sm flex items-center justify-center gap-3 hover:bg-primary-container hover:text-on-primary-container transition-all group" type="submit">
                        Enviar Solicitud de Recuperación
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
</button>
</form>
<div class="mt-8 pt-6 border-t border-stone-100 flex justify-between items-center">
<a class="text-[10px] font-bold text-stone-400 uppercase hover:text-primary tracking-widest flex items-center gap-1 transition-colors" href="/auth/login">
<span class="material-symbols-outlined text-xs">arrow_back</span>
                        Volver al Login
                    </a>
<span class="text-[10px] font-medium text-stone-300 uppercase tracking-tighter">Ref. Sistema: 88-LXC</span>
</div>
</div>
</div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/auth/js/olvido_contraseña.js"></script>
    <script src="/frontend/public/auth/js/olvido_contrase�a.js"></script>
@endpush
