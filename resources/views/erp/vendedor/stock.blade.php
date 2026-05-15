@extends('erp.layouts.app')

@section('title', 'Consulta de Stock')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between bg-white p-6 rounded-2xl border border-stone-200 shadow-sm">
        <h1 class="text-xl font-black text-stone-900 uppercase tracking-tight">Consulta de Existencias</h1>
        <div class="flex gap-4">
             <input type="text" placeholder="BUSCAR PRODUCTO..." class="bg-stone-50 border border-stone-200 px-4 py-2 rounded-xl text-[12px] font-bold outline-none focus:border-primary w-64">
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-stone-50 border-b border-stone-100">
                    <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Producto</th>
                    <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Categoría</th>
                    <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Precio</th>
                    <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Stock</th>
                    <th class="py-4 px-6 text-[9px] font-black uppercase text-stone-400">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @foreach($productos as $producto)
                <tr class="hover:bg-stone-50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-stone-100 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-stone-400 text-lg">image</span>
                            </div>
                            <span class="text-[11px] font-bold text-stone-900 uppercase">{{ $producto->name }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-[10px] font-black text-stone-400 uppercase">{{ $producto->category ?? 'General' }}</td>
                    <td class="py-4 px-6 text-[11px] font-black text-stone-900">${{ number_format($producto->price, 2) }}</td>
                    <td class="py-4 px-6">
                        <span class="text-[11px] font-black {{ $producto->stock > 10 ? 'text-stone-900' : 'text-red-500' }}">{{ $producto->stock }}</span>
                    </td>
                    <td class="py-4 px-6">
                        @if($producto->stock > 0)
                            <span class="px-2 py-1 bg-green-50 text-green-600 text-[9px] font-black uppercase rounded-lg">Disponible</span>
                        @else
                            <span class="px-2 py-1 bg-red-50 text-red-600 text-[9px] font-black uppercase rounded-lg">Agotado</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4 bg-stone-50 border-t border-stone-100">
            {{ $productos->links() }}
        </div>
    </div>
</div>
@endsection
