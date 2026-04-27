<?php

namespace App\Services;

use App\Models\FixedAsset;
use App\Models\Order;
use App\Models\PurchaseOrder;

class FinanceService
{
    /**
     * Obtener resumen de flujos de caja.
     */
    public function getCashFlowSummary()
    {
        return [
            'por_cobrar' => Order::where('estado', 'Pendiente')->sum('total'),
            'por_pagar' => PurchaseOrder::where('estado', 'Pendiente')->sum('total'),
            'disponible' => \App\Models\Account::where('codigo', 'like', '1.1.01%')->sum('saldo'), // Cuentas de banco/caja
        ];
    }

    /**
     * Calcular depreciación proyectada.
     */
    public function getDepreciationProjection()
    {
        $assets = FixedAsset::where('estado', 'ACTIVO')->get();
        $mensual = 0;

        foreach ($assets as $asset) {
            $baseDepreciable = $asset->costo_adquisicion - $asset->valor_residual;
            if ($asset->vida_util_meses > 0) {
                $mensual += $baseDepreciable / $asset->vida_util_meses;
            }
        }

        return $mensual;
    }
}
