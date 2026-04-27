@extends('tienda.panel.layout')
@section('title', 'Mi Perfil')
@section('content')
<div class="max-w-4xl mx-auto"><h2 class="text-3xl font-bold text-gray-800 mb-8">Mi Perfil</h2>@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>@endif
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6"><form method="POST" action="{{ route('tienda.panel.perfil.update') }}">@csrf @method('PUT')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6"><div><label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label><input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></div>
<div><label class="block text-sm font-medium text-gray-700 mb-2">Email</label><input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></div>
<div><label class="block text-sm font-medium text-gray-700 mb-2">Telefono</label><input type="text" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
<div><label class="block text-sm font-medium text-gray-700 mb-2">Direccion</label><textarea name="address" rows="2" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('address', $customer->address ?? '') }}</textarea></div></div>
<button type="submit" class="mt-6 bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">Guardar cambios</button></form></div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6"><h3 class="text-lg font-semibold mb-4">Informacion de la cuenta</h3><div class="grid grid-cols-1 md:grid-cols-2 gap-4"><div><p class="text-sm text-gray-600">Email</p><p class="font-medium">{{ $user->email }}</p></div>
<div><p class="text-sm text-gray-600">Rol</p><p class="font-medium capitalize">{{ $user->role }}</p></div><div><p class="text-sm text-gray-600">Miembro desde</p><p class="font-medium">{{ $user->created_at->format('d/m/Y') }}</p></div></div></div></div>
@endsection