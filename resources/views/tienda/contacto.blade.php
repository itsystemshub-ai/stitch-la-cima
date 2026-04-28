@extends('layouts.ecommerce')

@section('title', 'Contacto Industrial | Mayor de Repuesto LA CIMA, C.A.')

@section('content')
<main class="flex-grow pt-32 pb-12 px-6 max-w-7xl mx-auto w-full">
    
    <div class="text-center mb-16">
        <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] block mb-2 italic">Protocolo de Enlace Externo</span>
        <h1 class="font-headline text-6xl font-black uppercase tracking-tighter italic">Conecte con <span class="text-stone-300">Ingeniería</span></h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
        
        <!-- Información Fija -->
        <div class="space-y-12">
            <div>
                <h3 class="text-[14px] font-black uppercase tracking-[0.2em] mb-6 flex items-center gap-3 italic">
                    <span class="w-1.5 h-6 bg-primary rounded-full"></span>
                    Centro de Mando Operativo
                </h3>
                <p class="text-stone-900 font-bold uppercase tracking-tight leading-relaxed max-w-md text-[12px]">
                    Zona Industrial Los Ruices, Calle Milán, Edificio Comercial La Cima.<br>
                    Distrito Capital, Caracas. Zona Postal 1071.<br>
                    <span class="text-primary italic">Sede Central - República Bolivariana de Venezuela.</span>
                </p>
            </div>

            <div class="h-px w-full bg-stone-200"></div>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h4 class="font-black uppercase text-[10px] tracking-[0.3em] text-stone-400 mb-2 italic">Enlace Comercial B2B</h4>
                    <a href="tel:+582121234567" class="text-2xl font-headline font-black text-black hover:text-primary transition tracking-tighter">+58 (212) 123-4567</a>
                </div>
                <div>
                    <h4 class="font-black uppercase text-[10px] tracking-[0.3em] text-stone-400 mb-2 italic">Asistencia Técnica Directa</h4>
                    <a href="tel:+582129876543" class="text-2xl font-headline font-black text-black hover:text-primary transition tracking-tighter">+58 (212) 987-6543</a>
                </div>
            </div>

            <div class="bg-stone-900 text-white p-10 rounded-[32px] relative overflow-hidden shadow-2xl">
                <span class="material-symbols-outlined absolute right-4 bottom-4 text-9xl opacity-[0.03] pointer-events-none">verified_user</span>
                <h4 class="text-primary font-black uppercase text-[10px] tracking-[0.4em] mb-4 relative z-10 italic">Línea Prioritaria Mayorista</h4>
                <p class="text-[12px] font-bold text-stone-300 relative z-10 uppercase tracking-tight leading-relaxed">Si representa a una flotilla pesada o concesionario marítimo, nuestro equipo <span class="text-white italic">KAM (Key Account Manager)</span> está disponible 24/7 de forma exclusiva.</p>
            </div>
        </div>

        <!-- Formulario Dinámico Backend -->
        <div class="bg-white p-10 rounded-[40px] shadow-2xl border border-stone-200 relative overflow-hidden">
            <div class="absolute -right-10 -top-10 opacity-[0.02]">
                <span class="material-symbols-outlined text-[200px]">mail</span>
            </div>
            
            @if(session('success'))
                <div class="bg-stone-950 border border-primary/20 p-6 mb-10 rounded-2xl flex items-center gap-4 shadow-xl">
                    <span class="material-symbols-outlined text-primary">verified</span>
                    <p class="font-black text-primary uppercase text-[12px] tracking-widest leading-none">
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <h3 class="text-[14px] font-black uppercase tracking-[0.2em] mb-10 italic flex items-center gap-3">
                <span class="w-1.5 h-6 bg-stone-900 rounded-full"></span>
                Protocolo de Requerimiento
            </h3>
            
            <form action="{{ url('/tienda/contacto/enviar') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 italic ml-2">Identidad Corporativa *</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold" required>
                        @error('nombre') <span class="text-red-500 text-[10px] font-black uppercase tracking-widest mt-2 block italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 italic ml-2">Enlace Electrónico *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold" required>
                        @error('email') <span class="text-red-500 text-[10px] font-black uppercase tracking-widest mt-2 block italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 italic ml-2">Terminal Telefónica</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}" class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 italic ml-2">Departamento Destino *</label>
                        <select name="asunto" class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-black uppercase tracking-widest italic cursor-pointer appearance-none" required>
                            <option value="">Selección de Canal</option>
                            <option value="Ventas" @if(old('asunto') == 'Ventas') selected @endif>Cotización de Flotilla</option>
                            <option value="Soporte" @if(old('asunto') == 'Soporte') selected @endif>Asistencia Ingeniería</option>
                            <option value="RMA/Facturación" @if(old('asunto') == 'RMA/Facturación') selected @endif>Gestión de Garantías (RMA)</option>
                            <option value="Directorio" @if(old('asunto') == 'Directorio') selected @endif>Enlace Institucional</option>
                        </select>
                        @error('asunto') <span class="text-red-500 text-[10px] font-black uppercase tracking-widest mt-2 block italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-stone-400 italic ml-2">Especificaciones Técnicas *</label>
                    <textarea name="mensaje" rows="4" class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold resize-none" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje') <span class="text-red-500 text-[10px] font-black uppercase tracking-widest mt-2 block italic">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-black text-primary hover:bg-stone-800 py-6 px-10 font-black uppercase tracking-[0.3em] text-[10px] rounded-2xl transition-all flex items-center justify-center gap-3 shadow-xl active:scale-95">
                    Transmitir Petición Segura
                    <span class="material-symbols-outlined">send</span>
                </button>
                <div class="flex items-center justify-center gap-2 mt-6">
                    <span class="material-symbols-outlined text-[14px] text-stone-300">encrypted</span>
                    <p class="text-[9px] text-stone-400 font-black uppercase tracking-[0.2em]">Cifrado Activo: TLS 1.3 / AES-256 GCM</p>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
