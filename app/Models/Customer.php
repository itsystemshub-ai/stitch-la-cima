<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rif',
        'razon_social',
        'telefono',
        'direccion',
        'tipo_cliente',
        'limite_credito',
        'vendedor_id',
        'activo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
