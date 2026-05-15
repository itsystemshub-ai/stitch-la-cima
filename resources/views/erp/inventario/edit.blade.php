@extends('erp.layouts.app')

@section('title', 'Editar Producto | Zenith ERP')
@section('breadcrumb_active', 'Editar Producto')

@section('content')
<div class="px-5 py-6 border-b border-stone-200 bg-white flex justify-between items-center sticky top-0 z-40 shadow-sm rounded-t-2xl">
    <h1 class="text-lg font-headline font-black text-stone-900 flex items-center gap-2">
        <span class="material-symbols-outlined text-primary">edit_square</span>
        Edición Técnica de Producto: <span class="text-primary">{{ $product->codigo_oem }}</span>
    </h1>
    <a href="{{ route('erp.inventario.productos') }}" class="flex items-center gap-2 text-[12px] font-bold text-stone-500 hover:text-stone-900 transition-colors">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Volver al Maestro
    </a>
</div>

<div class="p-6 md:p-10 max-w-5xl">
    <form action="{{ route('erp.inventario.productos.update', $product->id) }}" method="POST" class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
        @csrf
        @method('PUT')
        
        <div class="p-8 space-y-8">
            <!-- Sección 1: Datos Básicos -->
            <div>
                <h3 class="text-[12px] font-black text-stone-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 bg-primary rounded-full"></span>
                    Identificación Primaria
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Código OEM</label>
                        <input type="text" name="codigo_oem" value="{{ $product->codigo_oem }}" required
                            class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="md:col-span-2 space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Nombre Comercial</label>
                        <input type="text" name="nombre" value="{{ $product->nombre }}" required
                            class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] font-bold focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                </div>
            </div>

            <!-- Sección 2: Especificaciones Técnicas -->
            <div>
                <h3 class="text-[12px] font-black text-stone-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 bg-stone-300 rounded-full"></span>
                    Ficha Técnica
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Categoría</label>
                        <input type="text" name="categoria" value="{{ $product->categoria }}"
                            class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Marca</label>
                        <input type="text" name="marca" value="{{ $product->marca }}"
                            class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Material</label>
                        <input type="text" name="material" value="{{ $product->material }}"
                            class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Espesor</label>
                        <input type="text" name="espesor" value="{{ $product->espesor }}"
                            class="w-full bg-stone-50 border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                </div>
            </div>

            <!-- Sección 3: Valores y Stock -->
            <div class="bg-stone-50 p-6 rounded-xl border border-stone-200">
                <h3 class="text-[12px] font-black text-stone-900 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">payments</span>
                    Valores Comerciales y Existencia
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Precio Mayor (USD)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-2.5 text-stone-400 text-[12px]">$</span>
                            <input type="number" step="0.01" name="precio_mayor" value="{{ $product->precio_mayor }}" required
                                class="w-full pl-8 pr-4 py-2.5 bg-white border border-stone-200 rounded-lg text-[14px] font-black text-primary focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Stock Actual</label>
                        <input type="number" name="stock_actual" value="{{ $product->stock_actual }}" required
                            class="w-full bg-white border border-stone-200 rounded-lg px-4 py-2.5 text-[14px] font-black focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Stock Mínimo</label>
                        <input type="number" name="stock_minimo" value="{{ $product->stock_minimo ?? 0 }}"
                            class="w-full bg-white border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[11px] font-bold text-stone-500 uppercase ml-1">Estatus</label>
                        <select name="activo" class="w-full bg-white border border-stone-200 rounded-lg px-4 py-2.5 text-[12px] font-bold focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            <option value="1" {{ $product->activo ? 'selected' : '' }}>ACTIVO</option>
                            <option value="0" {{ !$product->activo ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer: Acciones -->
        <div class="bg-stone-50 px-8 py-5 border-t border-stone-200 flex justify-end gap-3">
            <a href="{{ route('erp.inventario.productos') }}" 
               class="px-6 py-2.5 rounded-lg text-[12px] font-bold text-stone-500 hover:bg-stone-100 transition-all">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-8 py-2.5 rounded-lg text-[12px] font-black shadow-lg shadow-primary/20 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                GUARDAR CAMBIOS ESTRATÉGICOS
            </button>
        </div>
    </form>
</div>
@endsection
