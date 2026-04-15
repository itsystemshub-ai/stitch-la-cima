@extends('layouts.ecommerce')

@section('title', 'Soporte Técnico | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/soporte.css">
@endpush

@section('content')
<main class="pt-24 pb-12 flex-grow">
    <!-- Hero Section -->
    <section class="relative min-h-[400px] flex items-center overflow-hidden bg-black">
        <div class="absolute inset-0 z-0">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAXDDoopL1vJGvj43_2EcixnT0qcffP-8sugqc3PJmetlM42HxR7EiDaACitBpmwFEGPY-d0LPOMheDO8XJC_vDkZ0NGhadXT3P0f67reZI-WnouLsKv14pyDyoOT8dU2KDqwTVwiQO7apJ_kQ5mUQ43bKNXlPy0n8itI7-GxJBnEoLXqAGm4Lc218ApwlfA93ICa2tzs84XoB3YvCguieK7UMsUIQ6QITRFgZwmKhnd-3jYDRMGtcZ5G-7Alrjd3kFtkJEppsOsA" class="w-full h-full object-cover opacity-40 grayscale mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-4">Asistencia Técnica Especializada</span>
                <h1 class="text-5xl md:text-7xl font-headline font-black text-white tracking-tighter uppercase leading-[0.95] mb-6">
                    SOPORTE <span class="text-primary">TÉCNICO</span>
                </h1>
                <p class="text-stone-300 text-lg max-w-xl leading-relaxed">
                    Nuestro equipo de ingenieros especializados está disponible para asistirle en la selección, instalación y mantenimiento de repuestos industriales.
                </p>
            </div>
        </div>
    </section>

    <!-- Support Channels -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-headline font-black text-black uppercase tracking-tighter mb-4">Canales de Atención</h2>
                <div class="h-1.5 w-24 bg-primary mx-auto mb-6"></div>
                <p class="text-on-surface-variant font-medium max-w-2xl mx-auto">Seleccione el canal que mejor se adapte a sus necesidades. Nuestro tiempo de respuesta promedio es de 2 horas hábiles.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Email Support -->
                <div class="bg-stone-50 border border-outline rounded-xl p-8 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-primary/20 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-3xl">mail</span>
                    </div>
                    <h3 class="text-xl font-headline font-bold text-black uppercase mb-2">Correo Electrónico</h3>
                    <p class="text-stone-500 text-sm mb-6">Ideal para consultas técnicas detalladas y solicitudes de cotización.</p>
                    <a href="mailto:soporte@lacima.com" class="text-primary font-bold text-sm hover:underline">soporte@lacima.com</a>
                    <p class="text-stone-400 text-xs mt-2">Respuesta en 2-4 horas hábiles</p>
                </div>

                <!-- Phone Support -->
                <div class="bg-stone-50 border border-outline rounded-xl p-8 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-primary/20 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-3xl">call</span>
                    </div>
                    <h3 class="text-xl font-headline font-bold text-black uppercase mb-2">Teléfono</h3>
                    <p class="text-stone-500 text-sm mb-6">Atención directa con ingenieros técnicos para consultas urgentes.</p>
                    <a href="tel:+584244582766" class="text-primary font-bold text-sm hover:underline">+58 424-4582766</a>
                    <p class="text-stone-400 text-xs mt-2">Lun-Vie: 8:00 AM - 5:00 PM</p>
                </div>

                <!-- WhatsApp Support -->
                <div class="bg-stone-50 border border-outline rounded-xl p-8 hover:shadow-lg transition-all">
                    <div class="w-14 h-14 bg-primary/20 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-3xl">chat</span>
                    </div>
                    <h3 class="text-xl font-headline font-bold text-black uppercase mb-2">WhatsApp</h3>
                    <p class="text-stone-500 text-sm mb-6">Envíe fotos, números de parte y reciba asistencia rápida.</p>
                    <a href="https://wa.me/584244582766" class="text-primary font-bold text-sm hover:underline">+58 424-4582766</a>
                    <p class="text-stone-400 text-xs mt-2">Respuesta en 30 minutos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-stone-50">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-headline font-black text-black uppercase tracking-tighter mb-4">Preguntas Frecuentes</h2>
                <div class="h-1.5 w-24 bg-primary mx-auto"></div>
            </div>

            <div class="space-y-6">
                <div class="bg-white border border-outline rounded-xl p-6">
                    <h3 class="text-lg font-headline font-bold text-black uppercase mb-3">¿Cómo identifico el número de parte correcto?</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">El número de parte (OEM) se encuentra generalmente grabado en la pieza original. También puede consultarnos con el modelo de su motor y año de fabricación para identificarlo correctamente.</p>
                </div>
                <div class="bg-white border border-outline rounded-xl p-6">
                    <h3 class="text-lg font-headline font-bold text-black uppercase mb-3">¿Realizan envíos a nivel nacional?</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">Sí. Realizamos envíos a toda Venezuela a través de empresas de carga certificadas. El tiempo de entrega varía entre 2-5 días hábiles según la ubicación.</p>
                </div>
                <div class="bg-white border border-outline rounded-xl p-6">
                    <h3 class="text-lg font-headline font-bold text-black uppercase mb-3">¿Las piezas tienen garantía?</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">Todas nuestras piezas cuentan con garantía de 12 meses contra defectos de fabricación. Para componentes OEM, la garantía puede extenderse según el fabricante.</p>
                </div>
                <div class="bg-white border border-outline rounded-xl p-6">
                    <h3 class="text-lg font-headline font-bold text-black uppercase mb-3">¿Ofrecen asesoría técnica para instalación?</h3>
                    <p class="text-stone-500 text-sm leading-relaxed">Sí. Nuestro equipo de ingenieros proporciona asesoría técnica gratuita para la selección e instalación correcta de cada componente.</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    <script src="js/soporte.js"></script>
@endpush
