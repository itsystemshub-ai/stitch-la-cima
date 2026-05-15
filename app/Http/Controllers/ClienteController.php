<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function dashboard()
    {
        $cliente = Auth::user();
        
        $stats = [
            'pedidos_activos' => 2,
            'saldo_pendiente' => 1540.00,
            'puntos_fidelidad' => 450,
            'ultima_compra' => '2026-05-01'
        ];

        return view('erp.cliente.dashboard', compact('stats'));
    }

    public function catalogo()
    {
        $productos = Product::where('is_active', true)->paginate(12);
        return view('erp.cliente.catalogo', compact('productos'));
    }

    public function pedidos()
    {
        $pedidos = []; // Filtrar por el cliente autenticado
        return view('erp.cliente.pedidos', compact('pedidos'));
    }

    public function estadoCuenta()
    {
        return view('erp.cliente.estado-cuenta');
    }

    public function pagos()
    {
        return view('erp.cliente.pagos');
    }

    public function ayuda()
    {
        return view('erp.cliente.ayuda');
    }
}
