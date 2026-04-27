<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SystemConfigService;

class ConfiguracionController extends Controller
{
    protected SystemConfigService $configService;

    public function __construct(SystemConfigService $configService)
    {
        $this->configService = $configService;
    }

    public function index() 
    { 
        $health = $this->configService->getSystemHealth();
        return view('erp.configuracion.index', compact('health')); 
    }

    public function estadoSistema() 
    { 
        $health = $this->configService->getSystemHealth();
        $dbStats = $this->configService->getDatabaseStats();
        return view('erp.configuracion.estado-sistema', compact('health', 'dbStats')); 
    }

    public function parametros() { return view('erp.configuracion.parametros'); }
    public function fiscal() { return view('erp.configuracion.fiscal'); }
    public function usuarios() { return view('erp.configuracion.usuarios'); }
    public function baseDatos() { return view('erp.configuracion.base-datos'); }
    public function backups() { return view('erp.configuracion.backups'); }
    public function tareas() { return view('erp.configuracion.tareas'); }
    public function auditoria() { return view('erp.configuracion.auditoria'); }

    public function showSync() { return view('configuracion.sync'); }
}
