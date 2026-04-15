<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContabilidadController extends Controller
{
    public function index() { return view('erp.contabilidad.index'); }
    public function planCuentas() { return view('erp.contabilidad.plan-cuentas'); }
    public function libroDiario() { return view('erp.contabilidad.libro-diario'); }
    public function libroVentas() { return view('erp.contabilidad.libro-ventas'); }
    public function libroCaja() { return view('erp.contabilidad.libro-caja'); }
    public function balanceGeneral() { return view('erp.contabilidad.balance-general'); }
    public function balanceComprobacion() { return view('erp.contabilidad.balance-comprobacion'); }
    public function estadoResultados() { return view('erp.contabilidad.estado-resultados'); }
    public function declaracionIva() { return view('erp.contabilidad.declaracion-iva'); }
    public function cierreContable() { return view('erp.contabilidad.cierre-contable'); }
    public function librosLegales() { return view('erp.contabilidad.libros-legales'); }
    public function reportesContables() { return view('erp.contabilidad.reportes-contables'); }
}
