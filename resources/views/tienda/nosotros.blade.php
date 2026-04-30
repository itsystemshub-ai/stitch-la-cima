@extends('layouts.ecommerce')

@section('title', 'Nosotros | Mayor de Repuesto LA CIMA, C.A.')

@section('content')
<main class="pt-16">
    <!-- Hero Section -->
    <section class="relative min-h-[700px] flex items-center justify-center py-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="Industrial Engineers Team" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=1920&q=80" />
            <div class="absolute inset-0 bg-black/75"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <span class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-4">Quienes Somos</span>
                <h1 class="text-2xl md:text-3xl font-black text-white leading-tight tracking-tighter mb-4 uppercase">
                    MAYOR DE REPUESTO <span class="text-primary">LA CIMA, C.A.</span>
                </h1>
                <p class="text-stone-300 text-lg max-w-2xl mx-auto font-light leading-relaxed">
                    Más de 15 años de excelencia en repuestos industriales para motores Cummins, Volvo y Detroit Diesel.
                </p>
            </div>
        </div>
    </section>

    <!-- Misión / Visión -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
                <div>
                    <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-4 block italic">Nuestra Razón de Ser</span>
                    <h2 class="font-headline text-2xl font-black uppercase tracking-tighter mb-6 text-stone-900">Misión</h2>
                    <p class="text-stone-700 font-bold leading-relaxed mb-6 text-[12px] uppercase tracking-wide">
                        Proveer repuestos industriales de la más alta calidad, garantizando la continuidad operativa de nuestros clientes a través de un servicio ágil, transparente y técnicamente respaldado.
                    </p>
                    <p class="text-stone-700 font-bold leading-relaxed text-[12px] uppercase tracking-wide">
                        Trabajamos directamente con fabricantes y proveedores globales para asegurar autenticidad, trazabilidad completa y cumplimiento de especificaciones OEM.
                    </p>
                </div>
                <div>
                    <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-4 block italic">Hacia Dónde Vamos</span>
                    <h2 class="font-headline text-2xl font-black uppercase tracking-tighter mb-6 text-stone-900">Visión</h2>
                    <p class="text-stone-700 font-bold leading-relaxed mb-6 text-[12px] uppercase tracking-wide">
                        Ser el referente confiable en repuestos para motores industriales en Venezuela, expandiendo cobertura nacional y consolidando alianzas estratégicas globales.
                    </p>
                    <p class="text-stone-700 font-bold leading-relaxed text-[12px] uppercase tracking-wide">
                        Aspiramos a ser el socio tecnológico preferido del sector industrial, ofreciendo soluciones integrales que superen las expectativas de calidad, servicio y valor.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="py-20 bg-stone-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-4 block italic">Lo Que Nos Define</span>
                <h2 class="font-headline text-2xl font-black uppercase tracking-tighter text-stone-900">Principios Rectores</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-[40px] shadow-lg border border-stone-200 text-center">
                    <span class="material-symbols-outlined text-primary text-5xl mb-6">verified</span>
                    <h4 class="text-lg font-black text-stone-900 mb-3 uppercase tracking-tight">Calidad Certificada</h4>
                    <p class="text-stone-500 font-bold text-[11px] uppercase tracking-wide leading-relaxed">
                        Cada repuesto pasa por control de calidad exhaustivo. Garantía documentada en todas nuestras piezas.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-[40px] shadow-lg border border-stone-200 text-center">
                    <span class="material-symbols-outlined text-primary text-5xl mb-6">speed</span>
                    <h4 class="text-lg font-black text-stone-900 mb-3 uppercase tracking-tight">Respuesta Rápida</h4>
                    <p class="text-stone-500 font-bold text-[11px] uppercase tracking-wide leading-relaxed">
                        Despacho nacional en 24-48 horas. Stock permanente en Valencia y Caracas para emergencias.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-[40px] shadow-lg border border-stone-200 text-center">
                    <span class="material-symbols-outlined text-primary text-5xl mb-6">support_agent</span>
                    <h4 class="text-lg font-black text-stone-900 mb-3 uppercase tracking-tight">Soporte Técnico</h4>
                    <p class="text-stone-500 font-bold text-[11px] uppercase tracking-wide leading-relaxed">
                        Asesoramiento especializado gratuito. Ingenieros disponibles para consultas técnicas en vivo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Alianzas -->
    <section class="py-20 bg-stone-950 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-4 block italic">Nuestros Proveedores</span>
                <h2 class="font-headline text-2xl font-black uppercase tracking-tighter text-white italic">Aliados <span class="text-stone-300">Estratégicos</span></h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white/5 p-8 rounded-[40px] border border-white/10 text-center hover:bg-white/10 transition-all">
                    <span class="material-symbols-outlined text-stone-300 text-6xl block mb-4 mx-auto">settings</span>
                    <span class="text-stone-300 font-black text-[12px] uppercase tracking-wide">Cummins</span>
                </div>
                <div class="bg-white/5 p-8 rounded-[40px] border border-white/10 text-center hover:bg-white/10 transition-all">
                    <span class="material-symbols-outlined text-stone-300 text-6xl block mb-4 mx-auto">engineering</span>
                    <span class="text-stone-300 font-black text-[12px] uppercase tracking-wide">Volvo</span>
                </div>
                <div class="bg-white/5 p-8 rounded-[40px] border border-white/10 text-center hover:bg-white/10 transition-all">
                    <span class="material-symbols-outlined text-stone-300 text-6xl block mb-4 mx-auto">dns</span>
                    <span class="text-stone-300 font-black text-[12px] uppercase tracking-wide">Detroit Diesel</span>
                </div>
                <div class="bg-white/5 p-8 rounded-[40px] border border-white/10 text-center hover:bg-white/10 transition-all">
                    <span class="material-symbols-outlined text-stone-300 text-6xl block mb-4 mx-auto">factory</span>
                    <span class="text-stone-300 font-black text-[12px] uppercase tracking-wide">OEM Partners</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Banner -->
    <section class="py-16 bg-primary">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <span class="text-4xl font-black text-black mb-2 block">15+</span>
                    <span class="text-[10px] font-black uppercase tracking-wider text-black/70">Años Experiencia</span>
                </div>
                <div>
                    <span class="text-4xl font-black text-black mb-2 block">500+</span>
                    <span class="text-[10px] font-black uppercase tracking-wider text-black/70">Clientes Activos</span>
                </div>
                <div>
                    <span class="text-4xl font-black text-black mb-2 block">15k+</span>
                    <span class="text-[10px] font-black uppercase tracking-wider text-black/70">SKUs en Stock</span>
                </div>
                <div>
                    <span class="text-4xl font-black text-black mb-2 block">24h</span>
                    <span class="text-[10px] font-black uppercase tracking-wider text-black/70">Despacho Nacional</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-4 block italic">¿Listo para Comenzar?</span>
            <h2 class="font-headline text-2xl font-black uppercase tracking-tighter mb-8 text-stone-900">Conéctese con Nuestro Equipo</h2>
            <a href="/tienda/contacto" class="inline-block bg-black text-primary font-black uppercase py-5 px-12 tracking-[0.2em] text-xs rounded-2xl hover:bg-stone-800 transition-all shadow-xl">
                Contactar Ahora
            </a>
        </div>
    </section>
</main>
@endsection
