<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_orden',
        'customer_id',
        'vendedor_id',
        'subtotal',
        'impuestos',
        'total',
        'estado',
        'fecha_emision',
        'fecha_vencimiento',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
