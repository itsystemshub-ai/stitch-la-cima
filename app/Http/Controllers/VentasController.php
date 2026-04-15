<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index() { return view('erp.ventas.index'); }
    public function pos() { return view('erp.pos.index'); }
    public function clientes() { return view('erp.ventas.clientes'); }
    public function registro() { return view('erp.ventas.registro'); }
    public function facturacion() { return view('erp.ventas.facturacion'); }
    public function historial() { return view('erp.ventas.historial'); }
    public function notasCredito() { return view('erp.ventas.notas-credito'); }
    public function vendedores() { return view('erp.ventas.vendedores'); }
    public function reportes() { return view('erp.ventas.reportes'); }
}
