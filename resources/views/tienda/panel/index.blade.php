@extends('tienda.panel.layout')
@section('title', 'Dashboard - Mi Cuenta')
@section('content')
<div class="max-w-7xl mx-auto">
    <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">Bienvenido, {{ $user->name }}</h2></header>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center"><div class="p-3 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg></div><div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total de Ordenes</p>
                <p class="text-2xl font-bold text-gray-900">{{ $totalOrders }}</p></div></div></div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center"><div class="p-3 bg-yellow-100 rounded-lg">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg></div><div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Pendientes</p>
                <p class="text-2xl font-bold text-gray-900">{{ $pendingOrders }}</p></div></div></div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center"><div class="p-3 bg-green-100 rounded-lg">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg></div><div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Completadas</p>
                <p class="text-2xl font-bold text-gray-900">{{ $completedOrders }}</p></div></div></div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center"><div class="p-3 bg-red-100 rounded-lg">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg></div><div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Canceladas</p>
                <p class="text-2xl font-bold text-gray-900">{{ $cancelledOrders }}</p></div></div></div>
    </div>
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-8 mb-8 text-white">
        <h3 class="text-lg font-medium opacity-90">Total Gastado en Compras</h3>
        <p class="text-4xl font-bold mt-2">$ {{ number_format($totalSpent, 2) }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b"><h3 class="text-lg font-semibold text-gray-800">Ordenes Recientes</h3></div>
        <table class="w-full"><thead class="bg-gray-50"><tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Accion</th></tr></thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($recentOrders as $order)
            <tr><td class="px-6 py-4 whitespace-nowrap text-sm">#{{ $order->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $order->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">$ {{ number_format($order->total, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full @if($order->estado == 'Pagado') bg-green-100 text-green-800 @elseif($order->estado == 'Pendiente') bg-yellow-100 text-yellow-800 @elseif($order->estado == 'Cancelado') bg-red-100 text-red-800 @else bg-gray-100 text-gray-800 @endif">{{ $order->estado }}</span></td>
                <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('tienda.panel.detalle-orden', $order->id) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ver detalles</a></td></tr>
            @empty
            <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay ordenes recientes</td></tr>@endforelse
        </tbody></table>
    </div>
</div>
@endsection