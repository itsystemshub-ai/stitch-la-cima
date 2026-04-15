<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RrhhController extends Controller
{
    public function index() { return view('erp.rrhh.index'); }
    public function empleados() { return view('erp.rrhh.empleados'); }
    public function nomina() { return view('erp.rrhh.nomina'); }
    public function prestaciones() { return view('erp.rrhh.prestaciones'); }
    public function portalEmpleado() { return view('erp.rrhh.portal-empleado'); }
    public function rendimiento() { return view('erp.rrhh.rendimiento'); }
    public function reportes() { return view('erp.rrhh.reportes'); }
}
