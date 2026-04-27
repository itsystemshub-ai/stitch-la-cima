@extends('tienda.panel.layout')
@section('title', 'Panel Vendedor')
@section('content')
<div class="max-w-7xl mx-auto"><div class="mb-8"><h2 class="text-3xl font-bold text-gray-800">Panel de Vendedor</h2></div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8"><div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
<div class="flex items-center"><div class="p-3 bg-green-100 rounded-lg"><svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg></div>
<div class="ml-4"><p class="text-sm font-medium text-gray-600">Total Ventas</p><p class="text-2xl font-bold text-gray-900">{{ $totalVentas }}</p></div></div></div>
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100"><div class="flex items-center"><div class="p-3 bg-blue-100 rounded-lg"><svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
<div class="ml-4"><p class="text-sm font-medium text-gray-600">Ventas Mes</p><p class="text-2xl font-bold text-gray-900">{{ $ventasDelMes }}</p></div></div></div>
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100"><div class="flex items-center"><div class="p-3 bg-yellow-100 rounded-lg"><svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
<div class="ml-4"><p class="text-sm font-medium text-gray-600">Comision Total</p><p class="text-2xl font-bold text-gray-900">$ {{ number_format($comisionTotal, 2) }}</p></div></div></div></div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100"><div class="p-6 border-b"><h3 class="text-lg font-semibold text-gray-800">Mis Ventas Recientes</h3></div><table class="w-full"><thead class="bg-gray-50"><tr>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Comision</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th></tr></thead><tbody class="divide-y divide-gray-200">
@forelse($misVentas as $venta)
<tr><td class="px-6 py-4 text-sm">#{{ $venta->id }}</td><td class="px-6 py-4 text-sm">{{ $venta->customer->name ?? 'N/A' }}</td>
<td class="px-6 py-4 text-sm">{{ $venta->created_at->format('d/m/Y') }}</td>
<td class="px-6 py-4 text-sm">$ {{ number_format($venta->total_amount, 2) }}</td>
<td class="px-6 py-4 text-sm text-green-600">$ {{ number_format($venta->commission_amount, 2) }}</td>
<td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded-full @if($venta->status == 'completed') bg-green-100 text-green-800 @elseif($venta->status == 'pending') bg-yellow-100 text-yellow-800 @elseif($venta->status == 'cancelled') bg-red-100 text-red-800 @else bg-gray-100 text-gray-800 @endif">{{ ucfirst($venta->status) }}</span></td></tr>@empty
<tr><td colspan="6" class="px-6 py-8 text-center text-gray-500">No hay ventas registradas</td></tr>@endforelse
</tbody></table></div></div>
@endsection