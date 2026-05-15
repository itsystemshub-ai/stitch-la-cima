<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Services\PurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    protected PurchaseService $purchaseService;

    public function __construct(PurchaseService $purchaseService)
    {
        $this->purchaseService = $purchaseService;
    }

    public function index()
    {
        $stats = $this->purchaseService->getPurchaseKPIs();
        $recentOrders = PurchaseOrder::with('supplier')->latest()->take(5)->get();
        return view('erp.compras.index', compact('stats', 'recentOrders'));
    }

    public function proveedores(Request $request)
    {
        $query = Supplier::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('rif', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $proveedores = $query->orderBy('nombre')->paginate(20);
        return view('erp.compras.proveedores', compact('proveedores'));
    }

    public function storeProveedor(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'rif' => 'required|string|unique:suppliers',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
            'condiciones_pago' => 'nullable|string',
        ]);

        Supplier::create($validated);
        return back()->with('success', 'Proveedor registrado exitosamente.');
    }

    public function historial(Request $request)
    {
        $query = PurchaseOrder::with('supplier');

        if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
            $query->whereBetween('created_at', [
                $request->fecha_inicio,
                $request->fecha_fin
            ]);
        }

        $compras = $query->orderByDesc('created_at')->paginate(30);
        return view('erp.compras.historial', compact('compras'));
    }

    public function registrarCompra(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.cantidad' => 'required|integer|min:1',
            'items.*.costo_unitario' => 'required|numeric|min:0',
        ]);
        
        try {
            $orden = $this->purchaseService->registerPurchase(
                $request->supplier_id,
                $request->items
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Compra registrada exitosamente y auditada contablemente.',
                'data' => $orden
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function factura()
    {
        return view('erp.compras.factura');
    }

    public function libro(Request $request)
    {
        $query = PurchaseOrder::with('supplier')
            ->where('estado', 'Recibida');

        if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
            $query->whereBetween('created_at', [
                $request->fecha_inicio,
                $request->fecha_fin
            ]);
        }

        $compras = $query->orderBy('created_at')->get();
        
        $total_compras = $compras->sum('total');
        $total_impuestos = $compras->sum('impuesto');

        return view('erp.compras.libro', compact('compras', 'total_compras', 'total_impuestos'));
    }

    public function reportes()
    {
        $compras_mes = PurchaseOrder::whereMonth('created_at', now()->month)->sum('total');
        $compras_anio = PurchaseOrder::whereYear('created_at', now()->year)->sum('total');
        
        return view('erp.compras.reportes', compact('compras_mes', 'compras_anio'));
    }
}