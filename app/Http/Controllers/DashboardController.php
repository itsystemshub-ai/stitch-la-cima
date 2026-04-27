<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'stock_total' => 0,
            'ingresos_mes' => 0,
            'ordenes_pendientes' => 0,
            'clientes_activos' => 0,
            'aprobaciones_count' => 0,
            'stock_risks' => 0,
        ];

        try {
            if (Schema::hasTable('products')) {
                $stats['stock_total'] = Product::sum('stock_actual');
                $stats['stock_risks'] = Product::whereColumn('stock_actual', '<=', 'stock_minimo')->count();
            }
            if (Schema::hasTable('orders')) {
                // Unificamos a 'Pagado' según el seeder
                $stats['ingresos_mes'] = Order::where('estado', 'Pagado')
                    ->whereMonth('created_at', now()->month)
                    ->sum('total');
                
                // Ordenes que requieren atención inmediata
                $stats['ordenes_pendientes'] = Order::whereIn('estado', ['Pendiente', 'Esperando Aprobación'])->count();
            }
            if (Schema::hasTable('customers')) {
                $stats['clientes_activos'] = Customer::where('activo', true)->count();
            }
            if (Schema::hasTable('approvals')) {
                $stats['aprobaciones_count'] = Approval::where('status', 'pending')->count();
            }
        } catch (\Exception $e) {
            // Log error if needed: \Log::error($e->getMessage());
        }

        // Ultimas ventas para la terminal rápida
        $recentOrders = [];
        try {
            if (Schema::hasTable('orders')) {
                $recentOrders = Order::with('customer')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            }
        } catch (\Exception $e) {
            $recentOrders = collect();
        }

        $stats['categoria_mix'] = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.categoria', DB::raw('count(*) as total'))
            ->groupBy('products.categoria')
            ->orderByDesc('total')
            ->limit(4)
            ->get();

        // Datos para el gráfico de tendencia (Últimos 14 días)
        $trendData = [];
        try {
            if (Schema::hasTable('orders')) {
                $trendData = Order::select(
                        DB::raw('DATE(created_at) as date'),
                        DB::raw('SUM(total) as total')
                    )
                    ->where('created_at', '>=', now()->subDays(14))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get()
                    ->toArray();
            }
        } catch (\Exception $e) {
            $trendData = [];
        }

        return view('erp.dashboard.index', compact('stats', 'recentOrders', 'trendData'));
    }
}
