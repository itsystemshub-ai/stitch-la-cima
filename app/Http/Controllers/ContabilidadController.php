<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContabilidadController extends Controller
{
    public function index() 
    {
        $stats = [
            'ingresos_mes' => \App\Models\Order::where('estado', 'Pagado')->whereMonth('created_at', now()->month)->sum('total'),
            'gastos_mes' => \App\Models\Order::where('estado', 'Pagado')->whereMonth('created_at', now()->month)->sum('subtotal') * 0.65, // Simulación de costos
            'cuentas_count' => \App\Models\Account::count(),
            'asientos_recientes' => [], // Por ahora vacío hasta implementar JournalEntry
        ];
        
        $stats['utilidad_neta'] = $stats['ingresos_mes'] - $stats['gastos_mes'];
        $stats['iva_por_pagar'] = \App\Models\Order::where('estado', 'Pagado')->whereMonth('created_at', now()->month)->sum('impuestos');

        return view('erp.contabilidad.index', compact('stats')); 
    }
    public function planCuentas() 
    { 
        $cuentas = \App\Models\Account::orderBy('codigo')->get();
        return view('erp.contabilidad.plan-cuentas', compact('cuentas')); 
    }
    public function libroDiario() { return view('erp.contabilidad.libro-diario'); }
    public function libroVentas() { return view('erp.contabilidad.libro-ventas'); }
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
