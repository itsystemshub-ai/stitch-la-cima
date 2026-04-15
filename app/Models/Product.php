<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_path',
        'codigo_oem',
        'codigo_interno',
        'nombre',
        'marca',
        'categoria',
        'fabricante',
        'material',
        'espesor',
        'medidas',
        'stock_actual',
        'stock_calculado',
        'stock_minimo',
        'costo_compra',
        'precio_mayor',
        'precio_detal',
        'activo',
        'is_development',
        'development_notes',
        'ubicacion_almacen',
        'fecha_incorporacion',
    ];

    /**
     * Relación con los movimientos de stock (Kardex)
     */
    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
