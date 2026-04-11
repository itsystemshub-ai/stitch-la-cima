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
        'marca',
        'categoria',
        'stock_actual',
        'stock_minimo',
        'costo_compra',
        'precio_mayor',
        'precio_detal',
        'activo',
        'ubicacion_almacen',
    ];
}
