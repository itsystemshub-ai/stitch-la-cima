<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Customer;

class UserPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $user = Auth::user();
        $customer = $user->customer;

        $recentOrders = Order::where("customer_id", $customer->id)
            ->orderBy("created_at", "desc")
            ->take(5)
            ->get();

        $totalOrders = Order::where("customer_id", $customer->id)->count();
        $pendingOrders = Order::where("customer_id", $customer->id)
            ->where("status", "pending")
            ->count();
        $completedOrders = Order::where("customer_id", $customer->id)
            ->where("status", "completed")
            ->count();
        $cancelledOrders = Order::where("customer_id", $customer->id)
            ->where("status", "cancelled")
            ->count();
        
        $totalSpent = Order::where("customer_id", $customer->id)
            ->where("status", "completed")
            ->sum("total_amount");

        return view("tienda.panel.index", compact(
            "user","customer","recentOrders","totalOrders","pendingOrders","completedOrders","cancelledOrders","totalSpent"
        ));
    }

    public function misOrdenes()
    {
        $user = Auth::user();
        $customer = $user->customer;

        $orders = Order::where("customer_id", $customer->id)
            ->orderBy("created_at", "desc")
            ->paginate(10);

        return view("tienda.panel.ordenes", compact("orders","user"));
    }

    public function detalleOrden($id)
    {
        $user = Auth::user();
        $customer = $user->customer;

        $order = Order::where("customer_id", $customer->id)
            ->with("items.product")
            ->findOrFail($id);

        return view("tienda.panel.detalle-orden", compact("order","user"));
    }

    public function miPerfil()
    {
        $user = Auth::user();
        $customer = $user->customer;

        return view("tienda.panel.perfil", compact("user","customer"));
    }

    public function actualizarPerfil(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "phone" => "nullable|string|max:20",
            "address" => "nullable|string",
        ]);

        $user = Auth::user();
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        if ($user->customer) {
            $user->customer->update([
                "phone" => $request->phone,
                "address" => $request->address,
            ]);
        }

        return redirect()->route("tienda.panel.perfil")
            ->with("success", "Perfil actualizado correctamente");
    }

    public function comprasCanceladas()
    {
        $user = Auth::user();
        $customer = $user->customer;

        $cancelledOrders = Order::where("customer_id", $customer->id)
            ->where("status", "cancelled")
            ->orderBy("created_at", "desc")
            ->paginate(10);

        return view("tienda.panel.canceladas", compact("cancelledOrders","user"));
    }

    public function panelVendedor()
    {
        $user = Auth::user();
        
        if ($user->role !== "vendedor") {
            return redirect()->route("tienda.panel.index")
                ->with("error", "No tienes permiso para acceder a esta seccion");
        }

        $misVentas = Order::where("seller_id", $user->id)
            ->orderBy("created_at", "desc")
            ->take(5)
            ->get();

        $totalVentas = Order::where("seller_id", $user->id)->count();
        $ventasDelMes = Order::where("seller_id", $user->id)
            ->whereYear("created_at", now()->year)
            ->whereMonth("created_at", now()->month)
            ->count();

        $comisionTotal = Order::where("seller_id", $user->id)
            ->where("status", "completed")
            ->sum("commission_amount");

        return view("tienda.panel.vendedor", compact(
            "user","misVentas","totalVentas","ventasDelMes","comisionTotal"
        ));
    }
}
