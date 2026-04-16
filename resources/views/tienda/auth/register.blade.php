@extends('layouts.ecommerce')

@section('title', 'Registro | MAYOR DE REPUESTO LA CIMA, C.A.')

@section('content')
<div class="min-h-screen bg-stone-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 mt-16">
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <h2 class="mt-6 text-center text-3xl font-black uppercase text-black tracking-tight tracking-widest">
            Crear Cuenta de Cliente
        </h2>
        <p class="mt-2 text-center text-sm text-stone-600">
            ¿Ya tienes una cuenta?
            <a href="/tienda/auth/login" class="font-bold text-primary-dark hover:text-black uppercase tracking-widest transition-colors">
                Ingresa aquí
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 border border-outline">
            
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold text-[10px] uppercase tracking-widest block mb-1">Por favor verifica los siguientes errores:</strong>
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li class="text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-6" action="/tienda/auth/register" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="tipo_cliente" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Tipo de Cliente
                        </label>
                        <select id="tipo_cliente" name="tipo_cliente" class="mt-1 block w-full pl-3 pr-10 py-2 border-outline focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md shadow-sm">
                            <option value="B2C" {{ old('tipo_cliente') == 'B2C' ? 'selected' : '' }}>Cliente Particular (B2C)</option>
                            <option value="B2B" {{ old('tipo_cliente') == 'B2B' ? 'selected' : '' }}>Empresa / Taller (B2B)</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="razon_social" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Nombre Completo o Razón Social
                        </label>
                        <input type="text" name="razon_social" id="razon_social" value="{{ old('razon_social') }}" required
                            class="mt-1 flex w-full border-outline rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-2 border">
                    </div>

                    <div>
                        <label for="rif" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Cédula o RIF
                        </label>
                        <input type="text" name="rif" id="rif" value="{{ old('rif') }}" required placeholder="V-12345678 o J-12345678-9"
                            class="mt-1 flex w-full border-outline rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-2 border">
                    </div>

                    <div>
                        <label for="telefono" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Teléfono
                        </label>
                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                            class="mt-1 flex w-full border-outline rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-2 border">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Correo Electrónico
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="mt-1 flex w-full border-outline rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-2 border">
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 flex w-full border-outline rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-2 border">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                            Confirmar Contraseña
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1 flex w-full border-outline rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-2 border">
                    </div>

                </div>

                <div class="pt-4 border-t border-outline">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-[10px] font-black uppercase tracking-[0.2em] text-white bg-primary bg-black hover:bg-stone-800 transition-colors">
                        Registrar Cuenta
                    </button>
                    <p class="mt-4 text-center text-xs text-stone-500">
                        Al registrarte, aceptas nuestros <a href="/tienda/terminos_b2b" class="underline">Términos y Condiciones</a>.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
