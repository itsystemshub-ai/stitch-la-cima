<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
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
                $stats['ingresos_mes'] = Order::where('status', 'completed')
                    ->whereMonth('created_at', now()->month)
                    ->sum('total');
                $stats['ordenes_pendientes'] = Order::where('status', 'pending')->count();
            }
            if (Schema::hasTable('customers')) {
                $stats['clientes_activos'] = Customer::where('activo', true)->count();
            }
            if (Schema::hasTable('approvals')) {
                $stats['aprobaciones_count'] = Approval::where('status', 'pending')->count();
            }
        } catch (\Exception $e) {
            // Silently fail to zeros
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

        return view('erp.dashboard.index', compact('stats', 'recentOrders'));
    }
}
