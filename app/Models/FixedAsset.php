<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'tipo',
        'fecha_adquisicion',
        'costo_adquisicion',
        'vida_util_meses',
        'valor_residual',
        'estado'
    ];
}
