<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index() { return view('erp.compras.index'); }
    public function proveedores() { return view('erp.compras.proveedores'); }
    public function historial() { return view('erp.compras.historial'); }
    public function factura() { return view('erp.compras.factura'); }
    public function libro() { return view('erp.compras.libro'); }
    public function reportes() { return view('erp.compras.reportes'); }
}
