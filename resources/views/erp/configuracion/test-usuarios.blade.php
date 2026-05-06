@extends('erp.layouts.app')

@section('title', 'Test Usuarios')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Página de Usuarios - Test</h1>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Usuarios Importados</h2>
        <p class="text-sm text-gray-600 mb-4">Total: {{ $users->count() }}</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($users->take(12) as $user)
            <div class="border rounded-lg p-4">
                <div class="font-semibold">{{ $user->name }}</div>
                <div class="text-sm text-gray-600">{{ $user->email }}</div>
                <div class="text-xs text-gray-500 mt-1">Rol: {{ $user->role }}</div>
            </div>
            @endforeach
        </div>
        
        @if($users->count() > 12)
        <p class="text-sm text-gray-500 mt-4">... y {{ $users->count() - 12 }} más</p>
        @endif
    </div>
</div>
@endsection