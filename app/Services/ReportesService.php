<?php

namespace App\Services;

use App\Models\Order;
use App\Models\StockMovement;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportesService
{
    /**
     * Obtiene las métricas generales para el dashboard principal del ERP
     */
    public function obtenerMetricasDashboard()
    {
        $hoy = Carbon::today();
        $mesActual = Carbon::now()->startOfMonth();

        $ventasMes = Order::where('status', 'completed')
            ->where('created_at', '>=', $mesActual)
            ->sum('total');

        $pedidosPendientes = Order::where('status', 'pending')->count();
        
        $nuevosClientes = Customer::where('created_at', '>=', $mesActual)->count();

        $movimientosHoy = StockMovement::whereDate('created_at', $hoy)->count();

        return [
            'ventas_mes' => $ventasMes,
            'pedidos_pendientes' => $pedidosPendientes,
            'nuevos_clientes' => $nuevosClientes,
            'movimientos_hoy' => $movimientosHoy,
        ];
    }

    /**
     * Obtiene el flujo de ventas de la última semana (Para gráficos)
     */
    public function obtenerFlujoVentasSemanal()
    {
        $dias = [];
        $totales = [];

        for ($i = 6; $i >= 0; $i--) {
            $fecha = Carbon::today()->subDays($i);
            $totalCerrado = Order::whereDate('created_at', $fecha)
                ->where('status', 'completed')
                ->sum('total');

            $dias[] = $fecha->format('D, d');
            $totales[] = $totalCerrado;
        }

        return [
            'labels' => $dias,
            'data' => $totales
        ];
    }

    /**
     * Obtiene ventas por categoría de producto (Para gráficos de torta)
     */
    public function obtenerVentasPorCategoria()
    {
        return DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.categoria', DB::raw('SUM(order_items.subtotal) as total'))
            ->groupBy('products.categoria')
            ->orderByDesc('total')
            ->take(5)
            ->get();
    }

    /**
     * Tendencia de Ventas Mensual (Últimos 6 meses)
     */
    public function obtenerTendenciaMensual()
    {
        $meses = [];
        $data = [];

        for ($i = 5; $i >= 0; $i--) {
            $fecha = Carbon::now()->subMonths($i);
            $total = Order::whereMonth('created_at', $fecha->month)
                ->whereYear('created_at', $fecha->year)
                ->where('status', 'completed')
                ->sum('total');

            $meses[] = $fecha->translatedFormat('F');
            $data[] = $total;
        }

        return [
            'labels' => $meses,
            'data' => $data
        ];
    }
}
