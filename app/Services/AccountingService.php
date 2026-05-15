<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountingEntry;
use App\Models\AccountingEntryLine;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountingService
{
    /**
     * Generar asiento contable automático desde una Orden de Venta.
     */
    public function createEntryFromOrder(Order $order)
    {
        return DB::transaction(function () use ($order) {
            // 1. Crear el Asiento (Cabecera)
            $entry = AccountingEntry::create([
                'numero' => 'AS-V-' . $order->numero_orden,
                'fecha' => now(),
                'concepto' => "Venta de Mercancía - Orden #{$order->numero_orden} - Cliente: {$order->customer->razon_social}",
                'user_id' => Auth::id() ?? 1,
                'tipo' => 'Ingreso',
            ]);

            // 2. Definir Cuentas (Búsqueda o Creación por defecto)
            $ctaIngresos = $this->getAccount('4.1.01.01', 'Ventas de Repuestos', 'Ingreso');
            $ctaCxC = $this->getAccount('1.1.02.01', 'Cuentas por Cobrar Clientes', 'Activo');
            $ctaCosto = $this->getAccount('5.1.01.01', 'Costo de Ventas', 'Egreso');
            $ctaInventario = $this->getAccount('1.2.01.01', 'Inventario de Mercancía', 'Activo');

            // 3. Líneas del Asiento
            
            // Cargo a Cuentas por Cobrar (Debe)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaCxC->id,
                'debe' => $order->total,
                'haber' => 0,
                'referencia' => $order->numero_orden,
            ]);

            // Abono a Ventas (Haber)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaIngresos->id,
                'debe' => 0,
                'haber' => $order->total,
                'referencia' => $order->numero_orden,
            ]);

            // Asiento de Costo de Ventas (Opcional pero recomendado)
            $costoTotal = $order->items->sum(function($item) {
                return $item->cantidad * ($item->product->costo_compra ?? 0);
            });

            if ($costoTotal > 0) {
                // Cargo a Costo de Ventas (Debe)
                AccountingEntryLine::create([
                    'entry_id' => $entry->id,
                    'account_id' => $ctaCosto->id,
                    'debe' => $costoTotal,
                    'haber' => 0,
                    'referencia' => 'COSTO-' . $order->numero_orden,
                ]);

                // Abono a Inventario (Haber)
                AccountingEntryLine::create([
                    'entry_id' => $entry->id,
                    'account_id' => $ctaInventario->id,
                    'debe' => 0,
                    'haber' => $costoTotal,
                    'referencia' => 'COSTO-' . $order->numero_orden,
                ]);
            }

            return $entry;
        });
    }

    /**
     * Registro automático de Nómina.
     */
    public function registerPayroll($neto, $deducciones, $periodo)
    {
        return DB::transaction(function () use ($neto, $deducciones, $periodo) {
            $entry = AccountingEntry::create([
                'numero' => 'AS-NOM-' . date('Ym') . '-' . str_replace(' ', '-', $periodo),
                'fecha' => now(),
                'concepto' => "Pago de Nómina Periodo: {$periodo}",
                'user_id' => Auth::id() ?? 1,
                'tipo' => 'Egreso',
            ]);

            $ctaGasto = $this->getAccount('6.1.01.01', 'Sueldos y Salarios', 'Egreso');
            $ctaPasivo = $this->getAccount('2.1.03.01', 'Retenciones por Pagar', 'Pasivo');
            $ctaBanco = $this->getAccount('1.1.01.01', 'Banco Principal', 'Activo');

            $totalBruto = $neto + $deducciones;

            // Gasto (Debe)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaGasto->id,
                'debe' => $totalBruto,
                'haber' => 0,
                'referencia' => $periodo,
            ]);

            // Retenciones (Haber)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaPasivo->id,
                'debe' => 0,
                'haber' => $deducciones,
                'referencia' => $periodo,
            ]);

            // Salida de Banco (Haber)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaBanco->id,
                'debe' => 0,
                'haber' => $neto,
                'referencia' => $periodo,
            ]);

            return $entry;
        });
    }

    /**
     * Registro automático de Compra de Inventario.
     */
    public function registerPurchase($subtotal, $impuesto, $referencia)
    {
        return DB::transaction(function () use ($subtotal, $impuesto, $referencia) {
            $entry = AccountingEntry::create([
                'numero' => 'AS-COM-' . $referencia,
                'fecha' => now(),
                'concepto' => "Compra de Mercancía - Doc: {$referencia}",
                'user_id' => Auth::id() ?? 1,
                'tipo' => 'Egreso',
            ]);

            $ctaInventario = $this->getAccount('1.2.01.01', 'Inventario de Mercancía', 'Activo');
            $ctaIvaCr = $this->getAccount('1.1.03.01', 'IVA Crédito Fiscal', 'Activo');
            $ctaCxP = $this->getAccount('2.1.01.01', 'Cuentas por Pagar Proveedores', 'Pasivo');

            // Inventario (Debe)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaInventario->id,
                'debe' => $subtotal,
                'haber' => 0,
                'referencia' => $referencia,
            ]);

            // IVA (Debe)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaIvaCr->id,
                'debe' => $impuesto,
                'haber' => 0,
                'referencia' => $referencia,
            ]);

            // Cuenta por Pagar (Haber)
            AccountingEntryLine::create([
                'entry_id' => $entry->id,
                'account_id' => $ctaCxP->id,
                'debe' => 0,
                'haber' => $subtotal + $impuesto,
                'referencia' => $referencia,
            ]);

            return $entry;
        });
    }

    private function getAccount($codigo, $nombre, $tipo)
    {
        return Account::firstOrCreate(
            ['codigo' => $codigo],
            [
                'nombre' => $nombre,
                'tipo' => $tipo,
                'nivel' => 4,
                'movimiento' => true,
                'auxiliar' => false,
            ]
        );
    }
}
