<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'rif',
        'razon_social',
        'email',
        'telefono',
        'direccion',
        'tipo_cliente',
        'limite_credito',
        'vendedor_id',
        'activo',
    ];
}
