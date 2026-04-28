<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InventarioExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::where('activo', true)->get();
    }

    public function headings(): array
    {
        return [
            'Código OEM',
            'Código Interno',
            'Nombre',
            'Categoría',
            'Marca',
            'Precio Mayor',
            'Stock Actual',
            'Stock Mínimo',
            'Costo Compra',
            'Valor Inventario',
        ];
    }

    public function map($product): array
    {
        return [
            $product->codigo_oem,
            $product->codigo_interno,
            $product->nombre,
            $product->categoria,
            $product->marca,
            number_format($product->precio_mayor, 2),
            $product->stock_actual,
            $product->stock_minimo,
            number_format($product->costo_compra, 2),
            number_format($product->stock_actual * $product->costo_compra, 2),
        ];
    }
}
