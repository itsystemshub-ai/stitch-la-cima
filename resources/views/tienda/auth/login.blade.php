@extends('layouts.ecommerce')

@section('title', 'Iniciar Sesión | MAYOR DE REPUESTO LA CIMA, C.A.')

@section('content')
<div class="min-h-screen bg-stone-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 mt-16">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-black uppercase text-black tracking-tight tracking-widest">
            Ingreso de Clientes
        </h2>
        <p class="mt-2 text-center text-sm text-stone-600">
            ¿No tienes cuenta?
            <a href="/tienda/auth/register" class="font-bold text-primary-dark hover:text-black uppercase tracking-widest transition-colors">
                Regístrate aquí
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 border border-outline">
            
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold text-[10px] uppercase tracking-widest block mb-1">Error</strong>
                    <span class="block sm:inline text-xs">{{ $errors->first() }}</span>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline text-xs font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <form class="space-y-6" action="/tienda/auth/login" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                        Correo Electrónico
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                            class="appearance-none block w-full px-3 py-2 border border-outline rounded-md shadow-sm placeholder-stone-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-stone-700 uppercase tracking-widest">
                        Contraseña
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none block w-full px-3 py-2 border border-outline rounded-md shadow-sm placeholder-stone-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-primary focus:ring-primary border-outline rounded">
                        <label for="remember" class="ml-2 block text-xs text-stone-900">
                            Recordarme
                        </label>
                    </div>

                    <div class="text-xs">
                        <a href="#" class="font-bold text-stone-600 hover:text-black">
                            ¿Olvidaste tu clave?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-[10px] font-black uppercase tracking-[0.2em] text-white bg-black hover:bg-stone-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition-colors">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
