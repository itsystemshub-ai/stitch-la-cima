<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountingEntry extends Model
{
    use HasFactory;

    protected $table = 'accounting_entries';

    protected $fillable = [
        'numero',
        'fecha',
        'concepto',
        'user_id',
        'tipo',
    ];

    public function lines()
    {
        return $this->hasMany(AccountingEntryLine::class, 'entry_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}