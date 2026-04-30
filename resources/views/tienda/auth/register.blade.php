@extends('layouts.ecommerce')

@section('title', 'Registro | MAYOR DE REPUESTO LA CIMA, C.A.')

@section('content')
<div class="min-h-screen bg-stone-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 mt-24">
    <div class="sm:mx-auto sm:w-full sm:max-w-xl text-center px-6">
        <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-2 block italic">Protocolo de Incorporación B2B</span>
         <h2 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">Crear Cuenta <span class="text-stone-300">Corporativa</span></h2>
        <p class="mt-4 text-center text-[12px] text-stone-500 font-bold uppercase tracking-tight">
            ¿Ya posee credenciales activas?
            <a href="/tienda/auth/login" class="text-primary hover:text-stone-900 transition-colors italic">Inicie Sesión Aquí</a>
        </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-xl px-4 sm:px-0">
        <div class="bg-white py-12 px-10 shadow-2xl rounded-[40px] border border-stone-200 relative overflow-hidden">
            <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
                <span class="material-symbols-outlined text-[300px]">assignment_ind</span>
            </div>
            
            @if ($errors->any())
                <div class="mb-10 bg-stone-950 border border-red-500/30 p-6 rounded-2xl flex flex-col gap-3 shadow-xl">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-red-500">report</span>
                        <strong class="font-black text-[10px] text-white uppercase tracking-widest italic">Discrepancia en Protocolo de Datos</strong>
                    </div>
                    <ul class="list-none space-y-1 ml-9">
                        @foreach($errors->all() as $error)
                            <li class="text-[10px] text-red-400 font-black uppercase tracking-tight italic">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-8" action="/tienda/auth/register" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                    <div class="sm:col-span-2 space-y-2">
                        <label for="tipo_cliente" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Asignación de Perfil</label>
                        <select id="tipo_cliente" name="tipo_cliente" class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-black uppercase tracking-widest italic cursor-pointer appearance-none">
                            <option value="B2C" {{ old('tipo_cliente') == 'B2C' ? 'selected' : '' }}>Particular / Usuario Final (B2C)</option>
                            <option value="B2B" {{ old('tipo_cliente') == 'B2B' ? 'selected' : '' }}>Empresa / Aliado Comercial (B2B)</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2 space-y-2">
                        <label for="razon_social" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Identidad Fiscal o Personal</label>
                        <input type="text" name="razon_social" id="razon_social" value="{{ old('razon_social') }}" required
                            class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold">
                    </div>

                    <div class="space-y-2">
                        <label for="rif" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Registro de Información Fiscal (RIF)</label>
                        <input type="text" name="rif" id="rif" value="{{ old('rif') }}" required placeholder="J-12345678-9"
                            class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-mono font-bold">
                    </div>

                    <div class="space-y-2">
                        <label for="telefono" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Terminal de Contacto</label>
                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                            class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold">
                    </div>

                    <div class="sm:col-span-2 space-y-2">
                        <label for="email" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Correo Electrónico de Enlace</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold">
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Código de Acceso</label>
                        <input type="password" name="password" id="password" required
                            class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold">
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] italic ml-2">Confirmación Técnica</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="w-full bg-stone-50 border border-stone-200 p-5 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition text-[12px] font-bold">
                    </div>
                </div>

                <div class="pt-10 border-t border-stone-100 space-y-6">
                    <button type="submit"
                        class="w-full bg-black text-primary hover:bg-stone-800 py-6 font-black uppercase tracking-[0.3em] text-[10px] rounded-2xl transition-all shadow-xl active:scale-95 flex items-center justify-center gap-3">
                        Establecer Credenciales
                        <span class="material-symbols-outlined">how_to_reg</span>
                    </button>
                    <p class="text-center text-[9px] text-stone-400 font-black uppercase tracking-[0.2em] leading-relaxed italic">
                        Al tramitar su registro, usted confirma los <a href="/tienda/terminos_b2b" class="text-stone-900 underline underline-offset-4">protocolos de seguridad y términos de uso corporativo</a> de Zenith ERP.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
