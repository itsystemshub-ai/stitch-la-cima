<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotaCredito extends Model
{
    use HasFactory;

    protected $table = 'notas_credito';

    protected $fillable = [
        'numero_nota',
        'order_id',
        'cliente_id',
        'vendedor_id',
        'monto',
        'motivo',
        'estado',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Customer::class, 'cliente_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}