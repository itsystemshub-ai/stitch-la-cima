<?php

namespace App\Services;

use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchaseService
{
    protected AccountingService $accountingService;

    public function __construct(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
    }

    /**
     * Procesar una orden de compra y actualizar inventario.
     */
    public function registerPurchase(int $supplierId, array $items)
    {
        return DB::transaction(function () use ($supplierId, $items) {
            $subtotal = collect($items)->sum(fn($i) => $i['cantidad'] * $i['costo_unitario']);
            $impuesto = $subtotal * 0.16;
            $total = $subtotal + $impuesto;

            $orden = PurchaseOrder::create([
                'numero_orden' => 'OC-' . date('Ymd') . '-' . str_pad(PurchaseOrder::count() + 1, 4, '0', STR_PAD_LEFT),
                'supplier_id' => $supplierId,
                'user_id' => Auth::id(),
                'subtotal' => $subtotal,
                'impuesto' => $impuesto,
                'total' => $total,
                'estado' => 'Recibida',
                'fecha_recepcion' => now(),
            ]);

            // INTERFAZ CONTABLE: Registro automático del asiento
            $this->accountingService->registerPurchase($subtotal, $impuesto, $orden->numero_orden);

            foreach ($items as $item) {
                $product = Product::find($item['product_id']);
                
                $product->increment('stock_actual', $item['cantidad']);
                $product->update(['costo_compra' => $item['costo_unitario']]);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'IN',
                    'quantity' => $item['cantidad'],
                    'reason' => "Compra Proveedor: {$orden->numero_orden}",
                    'user_id' => Auth::id(),
                    'reference_id' => $orden->id,
                ]);
            }

            return $orden;
        });
    }

    /**
     * Obtener KPIs de compras.
     */
    public function getPurchaseKPIs()
    {
        return [
            'compras_mes' => PurchaseOrder::whereMonth('created_at', now()->month)->where('estado', '!=', 'Anulada')->sum('total'),
            'compras_anio' => PurchaseOrder::whereYear('created_at', now()->year)->where('estado', '!=', 'Anulada')->sum('total'),
            'proveedores_activos' => \App\Models\Supplier::count(),
            'ordenes_pendientes' => PurchaseOrder::where('estado', 'Pendiente')->count(),
            'cuentas_por_pagar' => PurchaseOrder::where('estado', 'Pendiente')->orWhere('estado', 'Recibida_No_Pagada')->sum('total'), // Simplified logic
            'critical_stock' => Product::whereColumn('stock_actual', '<=', 'stock_minimo')->where('activo', true)->orderBy('stock_actual')->limit(3)->get()
        ];
    }
}
