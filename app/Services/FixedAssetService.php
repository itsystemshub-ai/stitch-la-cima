<?php

namespace App\Services;

use Carbon\Carbon;

class FixedAssetService
{
    /**
     * Calcula la depreciación de línea recta mensual
     *
     * @param float $purchaseValue
     * @param float $salvageValue
     * @param int $usefulLifeYears
     * @return float
     */
    public function calculateMonthlyStraightLineDepreciation($purchaseValue, $salvageValue, $usefulLifeYears)
    {
        if ($usefulLifeYears <= 0) return 0;

        $depreciableAmount = $purchaseValue - $salvageValue;
        $totalMonths = $usefulLifeYears * 12;

        return round($depreciableAmount / $totalMonths, 2);
    }
}
