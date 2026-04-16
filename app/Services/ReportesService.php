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
}
