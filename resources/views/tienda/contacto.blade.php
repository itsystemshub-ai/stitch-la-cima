@extends('layouts.ecommerce')

@section('title', 'Contacto Industrial | Mayor de Repuesto LA CIMA, C.A.')

@section('content')
<main class="flex-grow pt-32 pb-12 px-6 max-w-7xl mx-auto w-full">
    
    <div class="text-center mb-16">
        <span class="text-primary font-bold text-xs uppercase tracking-widest block mb-2">Comunicaciones Corporativas</span>
        <h1 class="font-headline text-5xl font-black uppercase tracking-tighter">Conecte con Ingeniería</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
        
        <!-- Información Fija -->
        <div class="space-y-12">
            <div>
                <h3 class="text-2xl font-black uppercase mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-3xl">location_on</span>
                    Centro de Operaciones
                </h3>
                <p class="text-stone-600 font-medium leading-relaxed max-w-md">
                    Zona Industrial Los Ruices, Calle Milán, Edificio Comercial La Cima.<br>
                    Caracas, Miranda. Zona Postal 1071.<br>
                    Venezuela.
                </p>
            </div>

            <div class="h-px w-full bg-stone-200"></div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h4 class="font-bold uppercase text-xs tracking-widest text-stone-500 mb-2">Ventas B2B</h4>
                    <a href="tel:+582121234567" class="text-xl font-black text-black hover:text-primary transition">+58 (212) 123-4567</a>
                </div>
                <div>
                    <h4 class="font-bold uppercase text-xs tracking-widest text-stone-500 mb-2">Soporte Técnico</h4>
                    <a href="tel:+582129876543" class="text-xl font-black text-black hover:text-primary transition">+58 (212) 987-6543</a>
                </div>
            </div>

            <div class="bg-black text-white p-8 rounded-2xl relative overflow-hidden">
                <span class="material-symbols-outlined absolute right-4 bottom-4 text-8xl opacity-10">verified_user</span>
                <h4 class="text-primary font-black uppercase mb-2 relative z-10">Línea Mayorista</h4>
                <p class="text-sm text-stone-300 relative z-10">Si representa a una flotilla pesada o concesionario marítimo, nuestro equipo KAM está disponible 24/7 de forma exclusiva para corporaciones autorizadas.</p>
            </div>
        </div>

        <!-- Formulario Dinámico Backend -->
        <div class="bg-white p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-outline relative">
            
            @if(session('success'))
                <div class="bg-primary/20 border-l-4 border-primary p-4 mb-8 rounded">
                    <p class="font-bold text-black uppercase text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined">check_circle</span>
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <h3 class="text-xl font-black uppercase mb-8">Formulario de Requerimiento</h3>
            
            <form action="{{ url('/tienda/contacto/enviar') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Empresa / Nombre *</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition" required>
                        @error('nombre') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Email Corporativo *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition" required>
                        @error('email') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Asunto *</label>
                        <select name="asunto" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition" required>
                            <option value="">Seleccione Departamento</option>
                            <option value="Ventas" @if(old('asunto') == 'Ventas') selected @endif>Cotización Mayorista</option>
                            <option value="Soporte" @if(old('asunto') == 'Soporte') selected @endif>Soporte Técnico Especializado</option>
                            <option value="RMA/Facturación" @if(old('asunto') == 'RMA/Facturación') selected @endif>RMA y Devoluciones</option>
                            <option value="Directorio" @if(old('asunto') == 'Directorio') selected @endif>Contacto Directorio Ejecutivo</option>
                        </select>
                        @error('asunto') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-500 mb-2">Especificaciones Técnicas del Requerimiento *</label>
                    <textarea name="mensaje" rows="4" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition resiz-none" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase tracking-[0.2em] transition-all flex items-center justify-center gap-3">
                    Transmtir Petición Segura
                    <span class="material-symbols-outlined">send</span>
                </button>
                <p class="text-[10px] text-center text-stone-400 font-bold uppercase tracking-widest mt-4">Información Protegida por cifrado AES-256</p>
            </form>
        </div>
    </div>
</main>
@endsection
