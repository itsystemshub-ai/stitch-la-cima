@extends('layouts.ecommerce')

@section('title', 'Términos B2B | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/terminos_b2b.css">
@endpush

@section('content')
<main class="pt-24 pb-12 flex-grow">
    <!-- Hero Section -->
    <section class="relative min-h-[300px] flex items-center overflow-hidden bg-black">
        <div class="absolute inset-0 z-0">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAXDDoopL1vJGvj43_2EcixnT0qcffP-8sugqc3PJmetlM42HxR7EiDaACitBpmwFEGPY-d0LPOMheDO8XJC_vDkZ0NGhadXT3P0f67reZI-WnouLsKv14pyDyoOT8dU2KDqwTVwiQO7apJ_kQ5mUQ43bKNXlPy0n8itI7-GxJBnEoLXqAGm4Lc218ApwlfA93ICa2tzs84XoB3YvCguieK7UMsUIQ6QITRFgZwmKhnd-3jYDRMGtcZ5G-7Alrjd3kFtkJEppsOsA" class="w-full h-full object-cover opacity-40 grayscale mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-4">Acuerdo Comercial Empresarial</span>
                <h1 class="text-5xl md:text-6xl font-headline font-black text-white tracking-tighter uppercase leading-[0.95] mb-6">
                    TÉRMINOS <span class="text-primary">B2B</span>
                </h1>
                <p class="text-stone-300 text-lg max-w-xl leading-relaxed">
                    Condiciones comerciales para empresas, talleres y flotas que deseen establecer una relación comercial con MAYOR DE REPUESTO LA CIMA, C.A.
                </p>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="space-y-16">
                <!-- Section 1 -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">business</span>
                        </div>
                        <h2 class="text-3xl font-headline font-black text-black uppercase tracking-tight">1. Registro Empresarial</h2>
                    </div>
                    <div class="pl-16 space-y-4">
                        <p class="text-stone-600 text-sm leading-relaxed">1.1. Para acceder a los precios y condiciones B2B, la empresa debe registrarse proporcionando documentación válida que acredite su existencia legal (RIF vigente, acta constitutiva).</p>
                        <p class="text-stone-600 text-sm leading-relaxed">1.2. MAYOR DE REPUESTO LA CIMA, C.A. se reserva el derecho de aprobar o rechazar solicitudes de registro B2B según criterios comerciales internos.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">1.3. La información proporcionada durante el registro debe ser verídica y actualizada. Cualquier cambio debe ser notificado dentro de los 15 días hábiles siguientes.</p>
                    </div>
                </div>

                <!-- Section 2 -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">payments</span>
                        </div>
                        <h2 class="text-3xl font-headline font-black text-black uppercase tracking-tight">2. Condiciones de Pago</h2>
                    </div>
                    <div class="pl-16 space-y-4">
                        <p class="text-stone-600 text-sm leading-relaxed">2.1. Los pagos pueden realizarse mediante transferencia bancaria, cheque certificado o efectivo en nuestras oficinas.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">2.2. Para clientes B2B con historial comprobado de al menos 6 meses, se podrán establecer líneas de crédito sujetas a aprobación gerencial.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">2.3. Los pagos fuera de término generarán un interés moratorio del 3% mensual sobre el saldo pendiente.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">2.4. Todos los precios están expresados en dólares estadounidenses (USD) y están sujetos a variación sin previo aviso.</p>
                    </div>
                </div>

                <!-- Section 3 -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">local_shipping</span>
                        </div>
                        <h2 class="text-3xl font-headline font-black text-black uppercase tracking-tight">3. Envíos y Entregas</h2>
                    </div>
                    <div class="pl-16 space-y-4">
                        <p class="text-stone-600 text-sm leading-relaxed">3.1. Los envíos nacionales se realizan a través de empresas de carga certificadas. El tiempo de entrega estimado es de 2 a 5 días hábiles.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">3.2. Los costos de envío corren por cuenta del comprador, salvo promociones específicas que indiquen envío gratuito.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">3.3. MAYOR DE REPUESTO LA CIMA, C.A. no se hace responsable por retrasos causados por terceros (empresas de carga, aduanas, fuerza mayor).</p>
                    </div>
                </div>

                <!-- Section 4 -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">verified</span>
                        </div>
                        <h2 class="text-3xl font-headline font-black text-black uppercase tracking-tight">4. Garantías y Devoluciones</h2>
                    </div>
                    <div class="pl-16 space-y-4">
                        <p class="text-stone-600 text-sm leading-relaxed">4.1. Todos los productos cuentan con garantía de 12 meses contra defectos de fabricación a partir de la fecha de compra.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">4.2. Para aplicar la garantía, el cliente debe presentar la factura de compra original y evidencia fotográfica del defecto.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">4.3. Las devoluciones por error en el pedido deben notificarse dentro de los 5 días hábiles siguientes a la recepción.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">4.4. No se aceptan devoluciones de productos que hayan sido instalados, modificados o cuyo empaque original haya sido alterado.</p>
                    </div>
                </div>

                <!-- Section 5 -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">shield</span>
                        </div>
                        <h2 class="text-3xl font-headline font-black text-black uppercase tracking-tight">5. Confidencialidad</h2>
                    </div>
                    <div class="pl-16 space-y-4">
                        <p class="text-stone-600 text-sm leading-relaxed">5.1. Ambas partes se comprometen a mantener la confidencialidad de la información comercial intercambiada durante la relación contractual.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">5.2. Los datos personales de los contactos empresariales serán tratados conforme a la Ley de Protección de Datos vigente en Venezuela.</p>
                    </div>
                </div>

                <!-- Section 6 -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">gavel</span>
                        </div>
                        <h2 class="text-3xl font-headline font-black text-black uppercase tracking-tight">6. Jurisdicción</h2>
                    </div>
                    <div class="pl-16 space-y-4">
                        <p class="text-stone-600 text-sm leading-relaxed">6.1. Estos términos se rigen por las leyes de la República Bolivariana de Venezuela.</p>
                        <p class="text-stone-600 text-sm leading-relaxed">6.2. Cualquier disputa derivada de estos términos será sometida a los tribunales competentes de Valencia, Estado Carabobo.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Box -->
            <div class="mt-16 bg-stone-50 border border-outline rounded-xl p-8">
                <h3 class="text-xl font-headline font-bold text-black uppercase mb-4">¿Dudas sobre los términos?</h3>
                <p class="text-stone-500 text-sm mb-6">Nuestro equipo comercial está disponible para aclarar cualquier pregunta sobre las condiciones B2B.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="mailto:LACIMA.REPUESTOS@GMAIL.COM" class="bg-primary text-black px-6 py-3 rounded-lg font-bold text-xs uppercase tracking-widest hover:bg-primary-dim transition-colors">Contactar Comercial</a>
                    <a href="tel:+584244582766" class="bg-black text-white px-6 py-3 rounded-lg font-bold text-xs uppercase tracking-widest hover:bg-stone-800 transition-colors">Llamar Ahora</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/terminos_b2b.js"></script>
@endpush
