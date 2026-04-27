<?php

namespace App\Services;

use App\Models\Approval;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardService
{
    /**
     * Obtener estadísticas globales del ERP.
     */
    public function getGlobalStats()
    {
        $stats = [
            'stock_total' => 0,
            'ingresos_mes' => 0,
            'ordenes_pendientes' => 0,
            'clientes_activos' => 0,
            'aprobaciones_count' => 0,
            'stock_risks' => 0,
            'cuentas_por_cobrar' => 0,
            'nomina_total_mes' => 0,
        ];

        try {
            if (Schema::hasTable('products')) {
                $stats['stock_total'] = Product::sum('stock_actual');
                $stats['stock_risks'] = Product::whereColumn('stock_actual', '<=', 'stock_minimo')->count();
            }
            if (Schema::hasTable('orders')) {
                $stats['ingresos_mes'] = Order::where('estado', 'Pagado')
                    ->whereMonth('created_at', now()->month)
                    ->sum('total');
                $stats['ordenes_pendientes'] = Order::whereIn('estado', ['Pendiente', 'Esperando Aprobación'])->count();
                $stats['cuentas_por_cobrar'] = Order::where('estado', 'Pendiente')->sum('total');
            }
            if (Schema::hasTable('customers')) {
                $stats['clientes_activos'] = Customer::where('activo', true)->count();
            }
            if (Schema::hasTable('approvals')) {
                $stats['aprobaciones_count'] = Approval::where('status', 'pending')->count();
            }
            if (Schema::hasTable('salaries')) {
                $stats['nomina_total_mes'] = \App\Models\Salary::whereMonth('created_at', now()->month)->sum('total_a_pagar');
            }
        } catch (\Exception $e) {
            // Log silent
        }

        return $stats;
    }

    /**
     * Obtener tendencia de ventas.
     */
    public function getSalesTrend(int $days = 14)
    {
        if (!Schema::hasTable('orders')) return [];

        return Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total) as total')
            )
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->toArray();
    }

    /**
     * Obtener mezcla de categorías más vendidas.
     */
    public function getCategoryMix()
    {
        if (!Schema::hasTable('order_items')) return collect();

        return OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.categoria', DB::raw('count(*) as total'))
            ->groupBy('products.categoria')
            ->orderByDesc('total')
            ->limit(4)
            ->get();
    }
}
