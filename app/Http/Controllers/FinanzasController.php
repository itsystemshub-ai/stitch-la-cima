<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\FinanceService;
use App\Models\FixedAsset;
use App\Models\Order;

class FinanzasController extends Controller
{
    protected FinanceService $financeService;

    public function __construct(FinanceService $financeService)
    {
        $this->financeService = $financeService;
    }

    public function index() 
    {
        $cashFlow = $this->financeService->getCashFlowSummary();
        $depreciacion = $this->financeService->getDepreciationProjection();
        
        return view('erp.finanzas.index', compact('cashFlow', 'depreciacion')); 
    }

    public function activosFijos() 
    { 
        $activos = FixedAsset::all();
        return view('erp.finanzas.activos-fijos', compact('activos')); 
    }

    public function cuentasCobrar() 
    { 
        $cuentas = Order::where('estado', 'Pendiente')->with('customer')->paginate(20);
        return view('erp.finanzas.cuentas-cobrar', compact('cuentas')); 
    }

    public function reportes() { return view('erp.finanzas.reportes'); }
}
