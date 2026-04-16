<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'tipo',
        'nivel',
        'parent_id',
        'movimiento',
        'auxiliar',
    ];

    protected $casts = [
        'movimiento' => 'boolean',
        'auxiliar' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Account::class, 'parent_id');
    }

    public function entryLines()
    {
        return $this->hasMany(AccountingEntryLine::class);
    }
}