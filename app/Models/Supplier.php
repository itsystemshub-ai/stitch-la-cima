<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'rif',
        'email',
        'telefono',
        'direccion',
        'condiciones_pago',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}