<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountingEntry;
use App\Models\Order;
use App\Services\AccountingService;

class ContabilidadController extends Controller
{
    protected AccountingService $accountingService;

    public function __construct(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
    }

    public function index() 
    {
        $balances = $this->accountingService->getBalanceSummary();
        $stats = [
            'ingresos_mes' => Order::where('estado', 'Pagado')->whereMonth('created_at', now()->month)->sum('total'),
            'gastos_mes' => $balances['egresos'],
            'cuentas_count' => Account::count(),
            'asientos_recientes' => AccountingEntry::latest()->take(5)->get(),
        ];
        
        $stats['utilidad_neta'] = $stats['ingresos_mes'] - $stats['gastos_mes'];
        $stats['iva_por_pagar'] = Order::where('estado', 'Pagado')->whereMonth('created_at', now()->month)->sum('impuestos');

        return view('erp.contabilidad.index', compact('stats', 'balances')); 
    }

    public function planCuentas() 
    { 
        $cuentas = Account::orderBy('codigo')->get();
        return view('erp.contabilidad.plan-cuentas', compact('cuentas')); 
    }

    public function libroDiario() 
    { 
        $asientos = AccountingEntry::with('lines.account')->latest()->paginate(20);
        return view('erp.contabilidad.libro-diario', compact('asientos')); 
    }

    public function storeAsiento(Request $request)
    {
        // Lógica para guardar nuevo asiento
        return redirect()->back()->with('success', 'Asiento contable registrado.');
    }

    public function libroVentas() { return view('erp.contabilidad.libro-ventas'); }
    // ... otros métodos
    public function libroCaja() { return view('erp.contabilidad.libro-caja'); }
    public function balanceGeneral() { return view('erp.contabilidad.balance-general'); }
    public function balanceComprobacion() { return view('erp.contabilidad.balance-comprobacion'); }
    public function estadoResultados() { return view('erp.contabilidad.estado-resultados'); }
    public function declaracionIva() { return view('erp.contabilidad.declaracion-iva'); }
    public function cierreContable() { return view('erp.contabilidad.cierre-contable'); }
    public function librosContables() { return view('erp.contabilidad.libros'); }
    public function librosLegales() { return view('erp.contabilidad.libros-legales'); }
    public function reportesContables() { return view('erp.contabilidad.reportes-contables'); }
}
