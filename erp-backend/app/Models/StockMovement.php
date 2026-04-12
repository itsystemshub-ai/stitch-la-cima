<?php
/**
 * Zenith ERP - Stock Movement Model
 * Tracks every input, output and adjustment of stock.
 * MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type', // IN, OUT, ADJUST
        'quantity',
        'reason',
        'user_id',
        'reference_id', // Para facturas o compras
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
