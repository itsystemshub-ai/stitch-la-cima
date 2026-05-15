<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendedorController extends Controller
{
    public function dashboard()
    {
        $vendedor = Auth::user();
        
        // Simulación de datos avanzados para el dashboard
        $stats = [
            'ventas_mes' => 12540.50,
            'pedidos_hoy' => 5,
            'clientes_activos' => 48,
            'comision_acumulada' => 627.02
        ];

        $pedidos_recientes = []; // Debería filtrar por el vendedor en una relación real
        
        return view('erp.vendedor.dashboard', compact('stats', 'pedidos_recientes'));
    }

    public function pos()
    {
        return view('erp.vendedor.pos');
    }

    public function clientes()
    {
        // En una implementación real, filtraríamos los clientes asignados a este vendedor
        $clientes = User::where('role', 'cliente')->paginate(15);
        return view('erp.vendedor.clientes', compact('clientes'));
    }

    public function stock()
    {
        $productos = Product::paginate(20);
        return view('erp.vendedor.stock', compact('productos'));
    }

    public function ventas()
    {
        return view('erp.vendedor.ventas');
    }

    public function comisiones()
    {
        return view('erp.vendedor.comisiones');
    }

    public function ayuda()
    {
        return view('erp.vendedor.ayuda');
    }
}