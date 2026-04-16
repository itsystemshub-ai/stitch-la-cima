<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class PaymentService
{
    /**
     * Integración Genérica para PayPal (Base)
     * Utilizaría Srmklive\PayPal\Services\PayPal
     */
    public function createOrder($amount, $currency = 'USD')
    {
        // Wrapper de lógica de creación de orden (Simulado para demostración de arquitectura)
        Log::info("Creando orden de pago por $amount $currency");
        
        return [
            'id' => 'PAY-' . strtoupper(uniqid()),
            'status' => 'CREATED',
            'link' => '/api/tienda/paypal/mock-process?amount=' . $amount
        ];
    }

    /**
     * Capturar Orden (Confirmación asíncrona)
     */
    public function captureOrder($orderId)
    {
        Log::info("Capturando pago de orden: $orderId");
        
        return [
            'status' => 'COMPLETED',
            'transaction_id' => 'TXN-' . strtoupper(uniqid())
        ];
    }
}
