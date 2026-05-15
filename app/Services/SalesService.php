<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            $productMap = [];
            
            foreach ($items as $item) {
                $product = Product::findOrFail($item['product_id']);
                if ($product->stock_actual < $item['cantidad']) {
                    throw new \Exception("Stock insuficiente para: {$product->nombre}");
                }
                $subtotal += $item['cantidad'] * $item['precio_unitario'];
                $productMap[$product->id] = $product;
            }

            $impuesto = $subtotal * 0.16;
            $total = $subtotal + $impuesto;

            $order = Order::create([
                'numero_orden' => Order::generateNextNumber('ORD', 'numero_orden'),
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
            $this->accountingService->createEntryFromOrder($order);

            foreach ($items as $item) {
                $product = $productMap[$item['product_id']];
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

    /**
     * Obtener mezcla de categorías más vendidas.
     */
    public function getCategoryMix()
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('order_items')) return collect();

        $totalItems = OrderItem::count();

        $mix = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.categoria', DB::raw('count(*) as count'))
            ->groupBy('products.categoria')
            ->orderByDesc('count')
            ->limit(4)
            ->get();

        foreach ($mix as $item) {
            $item->percentage = $totalItems > 0 ? round(($item->count / $totalItems) * 100) : 0;
        }

        return $mix;
    }

    /**
     * Obtener reporte de ventas por período.
     */
    public function getSalesReport(string $periodo = 'mes')
    {
        $query = Order::query();
        
        switch ($periodo) {
            case 'dia':
                $query->whereDate('created_at', today());
                break;
            case 'semana':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'mes':
            default:
                $query->whereMonth('created_at', now()->month);
                break;
        }

        $ventas = $query->select(
            DB::raw('created_at'),
            DB::raw('total')
        )
        ->orderBy('created_at')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        })
        ->map(function($day) {
            return [
                'fecha' => Carbon::parse($day[0]->created_at)->format('Y-m-d'),
                'total_ordenes' => $day->count(),
                'monto_total' => $day->sum('total')
            ];
        })
        ->values();

        $total_ventas = $query->sum('total');
        $total_ordenes = $query->count();

        // Tendencia mensual (últimos 12 meses) - Refactorizado para ser agnóstico (Procesado en PHP)
        $monthlyTrend = Order::where('created_at', '>=', now()->subYear())
            ->get()
            ->groupBy(function($order) {
                return $order->created_at->format('m');
            })
            ->map(function($month, $key) {
                return (object)[
                    'mes' => $key,
                    'total' => $month->sum('total')
                ];
            })
            ->values();

        return compact('ventas', 'total_ventas', 'total_ordenes', 'monthlyTrend');
    }

    /**
     * Obtener reporte detallado de ganancias (BI).
     */
    public function getProfitReport()
    {
        $mesActual = now()->month;
        $anioActual = now()->year;

        $reporte = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereMonth('orders.created_at', $mesActual)
            ->whereYear('orders.created_at', $anioActual)
            ->where('orders.estado', 'Pagado')
            ->select(
                DB::raw('SUM(order_items.subtotal) as ingresos_brutos'),
                DB::raw('SUM(order_items.cantidad * products.costo_compra) as total_costo'),
                DB::raw('SUM(order_items.subtotal - (order_items.cantidad * products.costo_compra)) as ganancia_neta'),
                DB::raw('COUNT(DISTINCT orders.id) as total_ventas')
            )
            ->first();

        $ventasGrafico = Order::whereMonth('created_at', $mesActual)
            ->whereYear('created_at', $anioActual)
            ->where('estado', 'Pagado')
            ->get()
            ->groupBy(function($order) {
                return $order->created_at->format('Y-m-d');
            })
            ->map(function($day, $key) {
                return (object)[
                    'fecha' => $key,
                    'total' => $day->sum('total')
                ];
            })
            ->values();

        return compact('reporte', 'ventasGrafico');
    }
}
