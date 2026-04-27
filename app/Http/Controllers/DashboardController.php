<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $stats = $this->dashboardService->getGlobalStats();
        $stats['categoria_mix'] = $this->dashboardService->getCategoryMix();
        $trendData = $this->dashboardService->getSalesTrend();

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

        return view('erp.dashboard.index', compact('stats', 'recentOrders', 'trendData'));
    }
}
