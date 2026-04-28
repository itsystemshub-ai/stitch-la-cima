<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VentasExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Order::with('customer')->latest()->get();
    }

    public function headings(): array
    {
        return [
            'ID Orden',
            'Número de Orden',
            'Cliente',
            'Subtotal',
            'Impuestos',
            'Total',
            'Estado',
            'Fecha Emisión',
        ];
    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->numero_orden,
            $order->customer?->nombre ?? 'N/A',
            number_format($order->subtotal, 2),
            number_format($order->impuestos, 2),
            number_format($order->total, 2),
            $order->estado,
            $order->created_at->format('d/m/Y H:i'),
        ];
    }
}
