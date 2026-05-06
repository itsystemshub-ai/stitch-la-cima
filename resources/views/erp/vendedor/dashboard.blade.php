@extends('erp.layouts.app')

@section('title', 'Dashboard Vendedor | Sistema de Ventas')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard de Ventas</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Panel de Vendedor</h2>
        <p class="text-gray-600">Sistema específico para gestión de ventas y clientes asignados.</p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="font-semibold text-blue-800">Mis Clientes</h3>
                <p class="text-2xl font-bold text-blue-600">0</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <h3 class="font-semibold text-green-800">Ventas del Mes</h3>
                <p class="text-2xl font-bold text-green-600">$0</p>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg">
                <h3 class="font-semibold text-purple-800">Pedidos Pendientes</h3>
                <p class="text-2xl font-bold text-purple-600">0</p>
            </div>
        </div>
    </div>
</div>
@endsection