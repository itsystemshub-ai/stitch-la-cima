<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function index()
    {
        return view('erp.compras.index');
    }

    public function proveedores(Request $request)
    {
        $query = \App\Models\Supplier::query();

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

        \App\Models\Supplier::create($validated);
        return back()->with('success', 'Proveedor registrado exitosamente.');
    }

    public function historial(Request $request)
    {
        $query = \App\Models\PurchaseOrder::with('supplier');

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

        $items = $request->items;
        
        try {
            $result = DB::transaction(function () use ($request, $items) {
                $subtotal = 0;
                
                foreach ($items as $item) {
                    $subtotal += $item['cantidad'] * $item['costo_unitario'];
                }

                $impuesto = $subtotal * 0.16;
                $total = $subtotal + $impuesto;

                $orden = \App\Models\PurchaseOrder::create([
                    'numero_orden' => 'OC-' . date('Ymd') . '-' . str_pad(\App\Models\PurchaseOrder::count() + 1, 4, '0', STR_PAD_LEFT),
                    'supplier_id' => $request->supplier_id,
                    'user_id' => Auth::id(),
                    'subtotal' => $subtotal,
                    'impuesto' => $impuesto,
                    'total' => $total,
                    'estado' => 'Recibida',
                    'fecha_recepcion' => now(),
                ]);

                foreach ($items as $item) {
                    $product = Product::find($item['product_id']);
                    
                    $product->increment('stock_actual', $item['cantidad']);
                    $product->update(['costo_compra' => $item['costo_unitario']]);

                    StockMovement::create([
                        'product_id' => $product->id,
                        'type' => 'IN',
                        'quantity' => $item['cantidad'],
                        'reason' => "Compra Proveedor: {$orden->numero_orden}",
                        'user_id' => Auth::id(),
                        'reference_id' => $orden->id,
                    ]);
                }

                return $orden;
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Compra registrada exitosamente',
                'data' => $result
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
        $query = \App\Models\PurchaseOrder::with('supplier')
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
        $compras_mes = \App\Models\PurchaseOrder::whereMonth('created_at', now()->month)->sum('total');
        $compras_anio = \App\Models\PurchaseOrder::whereYear('created_at', now()->year)->sum('total');
        
        return view('erp.compras.reportes', compact('compras_mes', 'compras_anio'));
    }
}