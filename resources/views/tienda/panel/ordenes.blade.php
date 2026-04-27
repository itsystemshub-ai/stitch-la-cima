@extends('tienda.panel.layout')
@section('title', 'Mis Ordenes')
@section('content')
<div class="max-w-7xl mx-auto"><div class="mb-8"><h2 class="text-3xl font-bold text-gray-800">Mis Ordenes</h2></div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100"><table class="w-full"><thead class="bg-gray-50"><tr>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Accion</th></tr></thead><tbody class="divide-y divide-gray-200">
@forelse($orders as $order)
<tr><td class="px-6 py-4 text-sm">#{{ $order->id }}</td>
<td class="px-6 py-4 text-sm">{{ $order->created_at->format('d/m/Y') }}</td>
<td class="px-6 py-4 text-sm">$ {{ number_format($order->total_amount, 2) }}</td>
<td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded-full @if($order->status == 'completed') bg-green-100 text-green-800 @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800 @elseif($order->status == 'cancelled') bg-red-100 text-red-800 @else bg-gray-100 text-gray-800 @endif">{{ ucfirst($order->status) }}</span></td>
<td class="px-6 py-4"><a href="{{ route('tienda.panel.detalle-orden', $order->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Ver</a></td></tr>@empty
<tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No hay ordenes</td></tr>@endforelse
</tbody></table>
<div class="px-6 py-4">{{ $orders->links() }}</div></div></div>
@endsection