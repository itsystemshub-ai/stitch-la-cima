<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'cargo',
        'salario',
        'fecha_ingreso',
        'tipo_contrato',
        'estatus',
        'direccion',
    ];

    protected $casts = [
        'salario' => 'decimal:2',
        'fecha_ingreso' => 'date',
    ];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }
}