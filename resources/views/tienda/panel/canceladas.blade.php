@extends('tienda.panel.layout')
@section('title', 'Compras Canceladas')
@section('content')
<div class="max-w-7xl mx-auto"><div class="mb-8"><h2 class="text-3xl font-bold text-gray-800">Compras Canceladas</h2></div>
<div class="bg-white rounded-xl shadow-sm border border-gray-100"><table class="w-full"><thead class="bg-gray-50"><tr>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Motivo</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Accion</th></tr></thead><tbody class="divide-y divide-gray-200">
@forelse($cancelledOrders as $order)
<tr><td class="px-6 py-4 text-sm">#{{ $order->id }}</td><td class="px-6 py-4 text-sm">{{ $order->created_at->format('d/m/Y H:i') }}</td>
<td class="px-6 py-4 text-sm">$ {{ number_format($order->total_amount, 2) }}</td>
<td class="px-6 py-4 text-sm">{{ $order->cancellation_reason ?? 'No especificado' }}</td><td class="px-6 py-4"><a href="{{ route('tienda.panel.detalle-orden', $order->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Ver</a></td></tr>@empty
<tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No hay compras canceladas</td></tr>@endforelse
</tbody></table><div class="px-6 py-4">{{ $cancelledOrders->links() }}</div></div></div>
@endsection