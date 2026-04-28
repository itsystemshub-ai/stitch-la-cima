<?php

namespace App\Services;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }

    /**
     * Crear Orden de Pago Real en PayPal
     */
    public function createOrder($amount, $currency = 'USD')
    {
        $data = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $currency,
                        "value" => number_format($amount, 2, '.', '')
                    ]
                ]
            ],
            "application_context" => [
                "cancel_url" => route('tienda.panel.index'),
                "return_url" => route('tienda.panel.index')
            ]
        ];

        $response = $this->provider->createOrder($data);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return [
                        'id' => $response['id'],
                        'status' => 'CREATED',
                        'link' => $link['href']
                    ];
                }
            }
        }

        Log::error("PayPal Order Creation Failed", ['response' => $response]);
        throw new \Exception("No se pudo iniciar el proceso de pago con PayPal.");
    }

    /**
     * Capturar Orden (Confirmación tras retorno del usuario)
     */
    public function captureOrder($orderId)
    {
        $response = $this->provider->capturePaymentOrder($orderId);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            return [
                'status' => 'COMPLETED',
                'transaction_id' => $response['purchase_units'][0]['payments']['captures'][0]['id'] ?? 'S/N'
            ];
        }

        Log::error("PayPal Capture Failed", ['order_id' => $orderId, 'response' => $response]);
        return ['status' => 'FAILED'];
    }
}
