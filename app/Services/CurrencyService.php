<?php

namespace App\Services;

use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CurrencyService
{
    /**
     * Obtener la tasa actual del BCV.
     * En producción, esto usaría Scraping o una API de confianza.
     */
    public function syncBCV()
    {
        try {
            // Placeholder: En un entorno real usaríamos un crawler sobre bcv.org.ve
            // o un servicio como 've.dolarapi.com'
            $response = Http::get('https://ve.dolarapi.com/v1/dolares/oficial');
            
            if ($response->successful()) {
                $data = $response->json();
                $rate = $data['promedio'] ?? 0;
                
                if ($rate > 0) {
                    ExchangeRate::create([
                        'currency_code' => 'USD',
                        'rate' => $rate,
                        'source' => 'BCV',
                        'effective_date' => now(),
                    ]);
                    return $rate;
                }
            }
            
            return $this->getFallbackRate();

        } catch (\Exception $e) {
            Log::error("Error sincronizando BCV: " . $e->getMessage());
            return $this->getFallbackRate();
        }
    }

    /**
     * Retornar la última tasa conocida o una por defecto si el sistema es nuevo.
     */
    public function getCurrentRate()
    {
        $latest = ExchangeRate::latestRate('USD');
        return $latest ? $latest->rate : 36.50; // Valor de contingencia
    }

    private function getFallbackRate()
    {
        $latest = ExchangeRate::latestRate('USD');
        return $latest ? $latest->rate : 0;
    }

    /**
     * Convertir USD a VES.
     */
    public function toVES($amountUSD)
    {
        return $amountUSD * $this->getCurrentRate();
    }

    /**
     * Convertir VES a USD.
     */
    public function toUSD($amountVES)
    {
        $rate = $this->getCurrentRate();
        return $rate > 0 ? $amountVES / $rate : 0;
    }
}
