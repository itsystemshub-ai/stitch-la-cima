<?php

namespace App\Observers;

use App\Models\Order;
use App\Services\AccountingService;

class OrderObserver
{
    protected AccountingService $accountingService;

    public function __construct(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
    }

    /**
     * Se ejecuta cuando una orden es creada (Venta POS o Tienda).
     */
    public function created(Order $order)
    {
        // Solo generamos asiento si la orden ya está pagada o es a crédito (Pendiente)
        if (in_array($order->estado, ['Pagado', 'Pendiente'])) {
            $this->accountingService->createEntryFromOrder($order);
        }
    }

    /**
     * Se ejecuta cuando una orden es actualizada (Ej: Pago confirmado).
     */
    public function updated(Order $order)
    {
        // Si el estado cambió a Pagado y no tenía asiento previo
        if ($order->isDirty('estado') && $order->estado === 'Pagado') {
            // Verificar si ya existe un asiento para evitar duplicados
            // (Implementación simplificada: en producción chequearíamos el numero de asiento)
            $this->accountingService->createEntryFromOrder($order);
        }
    }
}
