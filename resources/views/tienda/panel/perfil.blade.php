@extends('tienda.panel.layout')
@section('title', 'Mi Perfil')
@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <div class="mb-12">
        <span class="text-primary font-black text-[10px] uppercase tracking-[0.4em] mb-2 block italic">Protocolo de Identidad</span>
         <h2 class="text-3xl font-headline font-black text-stone-900 uppercase tracking-tighter italic">Mi Perfil <span class="text-stone-300">Corporativo</span></h2>
    </div>

    @if(session('success'))
    <div class="bg-stone-950 border border-primary/20 text-primary px-6 py-4 rounded-2xl mb-10 flex items-center gap-4 shadow-xl">
        <span class="material-symbols-outlined">verified</span>
        <span class="text-[12px] font-black uppercase tracking-widest">{{ session('success') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-[40px] shadow-2xl border border-stone-200 p-10 mb-8 relative overflow-hidden">
        <div class="absolute -right-20 -top-20 opacity-[0.02] pointer-events-none">
            <span class="material-symbols-outlined text-[300px]">person_edit</span>
        </div>

        <form method="POST" action="{{ route('tienda.panel.perfil.update') }}">
            @csrf 
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="block text-[12px] font-black text-stone-900 uppercase tracking-widest italic ml-2">Nombre Completo / Razón Social</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                           class="w-full px-6 py-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all text-[12px] font-bold text-stone-900" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-[12px] font-black text-stone-900 uppercase tracking-widest italic ml-2">Correo Electrónico Corporativo</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                           class="w-full px-6 py-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all text-[12px] font-bold text-stone-900" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-[12px] font-black text-stone-900 uppercase tracking-widest italic ml-2">Teléfono de Contacto Técnico</label>
                    <input type="text" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" 
                           class="w-full px-6 py-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all text-[12px] font-bold text-stone-900">
                </div>

                <div class="space-y-2">
                    <label class="block text-[12px] font-black text-stone-900 uppercase tracking-widest italic ml-2">Dirección de Despacho B2B</label>
                    <textarea name="address" rows="2" 
                              class="w-full px-6 py-4 bg-stone-50 border border-stone-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all text-[12px] font-bold text-stone-900">{{ old('address', $customer->address ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-stone-100 flex justify-end">
                <button type="submit" class="bg-black text-primary font-black uppercase py-5 px-12 rounded-2xl tracking-[0.3em] text-[10px] hover:bg-stone-800 transition-all shadow-xl shadow-primary/5 flex items-center gap-3 active:scale-95">
                    <span class="material-symbols-outlined text-lg">save_as</span>
                    Actualizar Protocolo
                </button>
            </div>
        </form>
    </div>

    <!-- Security Info Summary -->
    <div class="bg-stone-50 rounded-[40px] border border-stone-200 p-10">
        <h3 class="text-[12px] font-black text-stone-900 uppercase tracking-[0.2em] mb-8 italic flex items-center gap-3">
            <span class="material-symbols-outlined text-primary">security</span>
            Metadatos de Seguimiento
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2 italic">Credencial Activa</p>
                <p class="text-[12px] font-black text-stone-800 group-hover:text-primary transition-colors tracking-tight">{{ $user->email }}</p>
            </div>

            <div>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2 italic">Nivel de Privilegios</p>
                <p class="text-[12px] font-black text-stone-800 capitalize tracking-tight">{{ $user->role }}</p>
            </div>

            <div>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] mb-2 italic">Fecha de Incorporación</p>
                <p class="text-[12px] font-black text-stone-800 tracking-tight">{{ $user->created_at->format('d/M/Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection