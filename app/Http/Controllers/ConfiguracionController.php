<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index() { return view('erp.configuracion.index'); }
    public function parametros() { return view('erp.configuracion.parametros'); }
    public function fiscal() { return view('erp.configuracion.fiscal'); }
    public function usuarios() { return view('erp.configuracion.usuarios'); }
    public function baseDatos() { return view('erp.configuracion.base-datos'); }
    public function backups() { return view('erp.configuracion.backups'); }
    public function estadoSistema() { return view('erp.configuracion.estado-sistema'); }
    public function tareas() { return view('erp.configuracion.tareas'); }
    public function auditoria() { return view('erp.configuracion.auditoria'); }

    public function showSync() { return view('configuracion.sync'); }
}
