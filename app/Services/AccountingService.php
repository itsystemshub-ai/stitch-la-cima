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
     * $lines: [['codigo' => '1.1.01', 'debe' => 100, 'haber' => 0], ...]
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
                // Si viene codigo, buscamos el id
                if (isset($line['codigo'])) {
                    $account = Account::where('codigo', $line['codigo'])->firstOrFail();
                    $line['account_id'] = $account->id;
                    unset($line['codigo']);
                } else {
                    $account = Account::findOrFail($line['account_id']);
                }

                $entry->lines()->create($line);
                
                // Actualizar saldo de la cuenta (Estrategia: +Debe, -Haber para activos)
                // Dependiendo del tipo de cuenta, el saldo aumenta o disminuye.
                // Simplificación: Incrementamos el saldo contable neto.
                if (in_array($account->tipo, ['Activo', 'Costo', 'Gasto'])) {
                    $neto = $line['debe'] - $line['haber'];
                } else {
                    $neto = $line['haber'] - $line['debe'];
                }
                
                $account->increment('saldo', $neto);
            }

            return $entry;
        });
    }

    /**
     * Registrar Contabilidad de Venta.
     */
    public function registerSale(float $subtotal, float $impuestos, string $referencia)
    {
        $total = $subtotal + $impuestos;
        $lines = [
            ['codigo' => '1.1.01', 'debe' => $total, 'haber' => 0], // Caja
            ['codigo' => '4.1.01', 'debe' => 0, 'haber' => $subtotal], // Ventas
            ['codigo' => '2.1.02', 'debe' => 0, 'haber' => $impuestos], // IVA por Pagar
        ];

        return $this->createEntry("Venta Realizada - REF: $referencia", now()->toDateString(), $lines);
    }

    /**
     * Registrar Contabilidad de Compra.
     */
    public function registerPurchase(float $subtotal, float $impuestos, string $referencia)
    {
        $total = $subtotal + $impuestos;
        $lines = [
            ['codigo' => '1.1.04', 'debe' => $subtotal, 'haber' => 0], // Inventarios
            ['codigo' => '1.1.05', 'debe' => $impuestos, 'haber' => 0], // IVA Acreditable
            ['codigo' => '1.1.01', 'debe' => 0, 'haber' => $total], // Caja (Pago Efectivo)
        ];

        return $this->createEntry("Compra Proveedor - OC: $referencia", now()->toDateString(), $lines);
    }

    /**
     * Registrar Contabilidad de Nómina.
     */
    public function registerPayroll(float $montoTotal, float $deducciones, string $periodo)
    {
        $salarioBruto = $montoTotal + $deducciones;
        $lines = [
            ['codigo' => '6.1.01', 'debe' => $salarioBruto, 'haber' => 0], // Gastos de Personal
            ['codigo' => '1.1.01', 'debe' => 0, 'haber' => $montoTotal], // Caja (Pago Neto)
            ['codigo' => '2.1.03', 'debe' => 0, 'haber' => $deducciones], // Retenciones por Pagar (Pasivo)
        ];

        return $this->createEntry("Pago de Nómina Periodo: $periodo", now()->toDateString(), $lines);
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
