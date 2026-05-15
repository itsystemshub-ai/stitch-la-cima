<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_code',
        'rate',
        'source',
        'effective_date',
    ];

    protected $casts = [
        'effective_date' => 'datetime',
    ];

    /**
     * Obtener la tasa más reciente para una moneda.
     */
    public static function latestRate($code = 'USD')
    {
        return self::where('currency_code', $code)
            ->orderByDesc('effective_date')
            ->first();
    }
}
