<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountingEntry;
use App\Models\AccountingEntryLine;
use Illuminate\Support\Facades\DB;

class AccountingService
{
    /**
     * Crear un asiento contable.
     * $lines: [['account_id' => 1, 'debe' => 100, 'haber' => 0], ...]
     */
    public function createEntry(string $concepto, string $fecha, array $lines)
    {
        return DB::transaction(function () use ($concepto, $fecha, $lines) {
            $entry = AccountingEntry::create([
                'concepto' => $concepto,
                'fecha' => $fecha,
                'total_debe' => collect($lines)->sum('debe'),
                'total_haber' => collect($lines)->sum('haber'),
                'estado' => 'BORRADOR'
            ]);

            foreach ($lines as $line) {
                $entry->lines()->create($line);
                
                // Actualizar saldo de la cuenta
                $account = Account::find($line['account_id']);
                if ($line['debe'] > 0) {
                    $account->increment('saldo', $line['debe']);
                } else {
                    $account->decrement('saldo', $line['haber']);
                }
            }

            return $entry;
        });
    }

    /**
     * Obtener balance general resumido.
     */
    public function getBalanceSummary()
    {
        return [
            'activo' => Account::where('tipo', 'ACTIVO')->sum('saldo'),
            'pasivo' => Account::where('tipo', 'PASIVO')->sum('saldo'),
            'patrimonio' => Account::where('tipo', 'PATRIMONIO')->sum('saldo'),
            'ingresos' => Account::where('tipo', 'INGRESO')->sum('saldo'),
            'egresos' => Account::where('tipo', 'EGRESO')->sum('saldo'),
        ];
    }
}
