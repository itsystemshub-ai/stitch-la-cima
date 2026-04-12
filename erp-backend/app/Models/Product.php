<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_oem',
        'codigo_interno',
        'nombre',
        'thumbnail',
        'marca',
        'categoria',
        'stock_actual',
        'stock_minimo',
        'costo_compra',
        'precio_mayor',
        'precio_detal',
        'activo',
        'is_development',
        'development_notes',
        'ubicacion_almacen',
    ];

    /**
     * Relación con los movimientos de stock (Kardex)
     */
    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
