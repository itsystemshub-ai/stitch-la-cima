<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountingEntryLine extends Model
{
    use HasFactory;

    protected $table = 'accounting_entry_lines';

    protected $fillable = [
        'entry_id',
        'account_id',
        'debe',
        'haber',
        'referencia',
    ];

    public function entry()
    {
        return $this->belongsTo(AccountingEntry::class, 'entry_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}