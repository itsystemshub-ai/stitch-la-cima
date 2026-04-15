<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanzasController extends Controller
{
    public function index() { return view('erp.finanzas.index'); }
    public function activosFijos() { return view('erp.finanzas.activos-fijos'); }
    public function cuentasCobrar() { return view('erp.finanzas.cuentas-cobrar'); }
    public function reportes() { return view('erp.finanzas.reportes'); }
}
