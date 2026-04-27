<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalesService
{
    protected AccountingService $accountingService;

    public function __construct(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
    }

    /**
     * Procesar una venta desde el POS.
     */
    public function processSale(int $customerId, array $items)
    {
        return DB::transaction(function () use ($customerId, $items) {
            $subtotal = 0;
            
            foreach ($items as $item) {
                $product = Product::find($item['product_id']);
                if ($product->stock_actual < $item['cantidad']) {
                    throw new \Exception("Stock insuficiente para: {$product->nombre}");
                }
                $subtotal += $item['cantidad'] * $item['precio_unitario'];
            }

            $impuesto = $subtotal * 0.16;
            $total = $subtotal + $impuesto;

            $order = Order::create([
                'numero_orden' => 'ORD-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT),
                'customer_id' => $customerId,
                'vendedor_id' => Auth::id(),
                'subtotal' => $subtotal,
                'impuestos' => $impuesto,
                'total' => $total,
                'estado' => 'Pagado',
                'status' => 'completed',
                'fecha_emision' => now(),
            ]);

            // INTERFAZ CONTABLE: Registro automático del asiento
            $this->accountingService->registerSale($subtotal, $impuesto, $order->numero_orden);

            foreach ($items as $item) {
                $product = Product::find($item['product_id']);
                $lineSubtotal = $item['cantidad'] * $item['precio_unitario'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'subtotal' => $lineSubtotal,
                ]);

                $product->decrement('stock_actual', $item['cantidad']);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'OUT',
                    'quantity' => $item['cantidad'],
                    'reason' => "Venta POS: {$order->numero_orden}",
                    'user_id' => Auth::id(),
                    'reference_id' => $order->id,
                ]);
            }

            return $order;
        });
    }

    /**
     * Obtener KPIs de ventas.
     */
    public function getSalesKPIs()
    {
        return [
            'ventas_hoy' => Order::whereDate('created_at', today())->where('estado', 'Pagado')->sum('total'),
            'ventas_mes' => Order::whereMonth('created_at', now()->month)->where('estado', 'Pagado')->sum('total'),
            'ordenes_pendientes' => Order::whereIn('estado', ['Pendiente', 'Esperando Aprobación'])->count(),
            'clientes_activos' => Customer::where('activo', true)->count(),
            'cuentas_por_cobrar' => Order::where('estado', 'Pendiente')->sum('total'),
            'ticket_promedio' => Order::where('estado', 'Pagado')->avg('total') ?? 0,
        ];
    }
}
