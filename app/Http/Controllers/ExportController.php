<?php

namespace App\Http\Controllers;

use App\Exports\InventarioExport;
use App\Exports\VentasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Exportar Ventas a Excel
     */
    public function ventasExcel()
    {
        return Excel::download(new VentasExport, 'reporte_ventas_'.date('YmdHis').'.xlsx');
    }

    /**
     * Exportar Inventario a Excel
     */
    public function inventarioExcel()
    {
        return Excel::download(new InventarioExport, 'reporte_inventario_'.date('YmdHis').'.xlsx');
    }
}
