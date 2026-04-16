<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payrolls';

    protected $fillable = [
        'employee_id',
        'periodo',
        'salario_base',
        'horas_extra',
        'bonos',
        'deducciones',
        'total_pagar',
        'estatus',
        'fecha_pago',
    ];

    protected $casts = [
        'salario_base' => 'decimal:2',
        'horas_extra' => 'decimal:2',
        'bonos' => 'decimal:2',
        'deducciones' => 'decimal:2',
        'total_pagar' => 'decimal:2',
        'fecha_pago' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}