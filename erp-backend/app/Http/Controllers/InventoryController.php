<?php
/**
 * Zenith ERP - Inventory & Stock Engine
 * Manages products, stock movements (Kardex), and mass valuation.
 * MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Dashboard Principal de Inventario
     */
    public function index()
    {
        $stats = [
            'total_sku' => Product::where('activo', true)->count(),
            'low_stock' => Product::where('activo', true)->whereColumn('stock_actual', '<=', 'stock_minimo')->count(),
            'valuation' => Product::where('activo', true)->sum(DB::raw('stock_actual * costo_compra')),
            'potential_revenue' => Product::where('activo', true)->sum(DB::raw('stock_actual * precio_mayor')),
            'recent_movements' => StockMovement::with('product')->latest()->take(5)->get(),
        ];

        return view('erp.inventario.index', compact('stats'));
    }

    /**
     * Maestro de Productos (Producción)
     */
    public function productos(Request $request)
    {
        $query = Product::where('is_development', false);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('codigo_oem', 'like', "%{$search}%")
                  ->orWhere('codigo_interno', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('nombre')->paginate(15);
        
        $inventory_value = Product::where('is_development', false)->sum(DB::raw('stock_actual * costo_compra'));
        $low_stock_count = Product::where('is_development', false)->whereColumn('stock_actual', '<=', 'stock_minimo')->count();

        return view('erp.inventario.productos', compact('products', 'inventory_value', 'low_stock_count'));
    }

    /**
     * Gestión de Items en Desarrollo
     */
    public function desarrollo()
    {
        $items = Product::where('is_development', true)->latest()->get();
        return view('erp.inventario.desarrollo', compact('items'));
    }

    /**
     * Almacenar nuevo producto
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_oem' => 'required|string|unique:products',
            'precio_mayor' => 'required|numeric',
            'stock_actual' => 'required|numeric',
        ]);

        $product = Product::create($request->all());

        // Registrar movimiento inicial si hay stock
        if ($product->stock_actual > 0) {
            StockMovement::create([
                'product_id' => $product->id,
                'type' => 'IN',
                'quantity' => $product->stock_actual,
                'reason' => 'Carga inicial de inventario',
                'user_id' => Auth::id(),
            ]);
        }

        return back()->with('success', 'Producto registrado estratégicamente.');
    }

    /**
     * Ajuste Manual de Stock
     */
    public function adjustStock(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:IN,OUT,ADJUST',
            'quantity' => 'required|numeric|min:0.01',
            'reason' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::find($request->product_id);
            $qty = $request->quantity;

            if ($request->type === 'IN') {
                $product->increment('stock_actual', $qty);
            } elseif ($request->type === 'OUT') {
                $product->decrement('stock_actual', $qty);
            } else {
                // ADJUST (Establecer valor absoluto)
                $product->update(['stock_actual' => $qty]);
            }

            StockMovement::create([
                'product_id' => $product->id,
                'type' => $request->type,
                'quantity' => $qty,
                'reason' => $request->reason,
                'user_id' => Auth::id(),
            ]);
        });

        return back()->with('success', 'Ajuste de stock procesado y auditado.');
    }

    /**
     * Carga Masiva de Precios y Stock
     */
    public function massUpdate(Request $request)
    {
        if ($request->isMethod('post') && $request->has('bulk_data')) {
            $data = $request->bulk_data;
            $lines = explode("\n", str_replace(["\r", "\t"], ["", ","], $data));
            $count = 0;

            DB::transaction(function () use ($lines, &$count) {
                foreach ($lines as $line) {
                    $parts = array_map('trim', explode(',', $line));
                    if (count($parts) < 2) continue;

                    $sku = $parts[0];
                    $price = $parts[1];
                    $stock = $parts[2] ?? null;

                    $product = Product::where('codigo_oem', $sku)->first();
                    if ($product) {
                        $oldPrice = $product->precio_mayor;
                        $oldStock = $product->stock_actual;

                        $product->update([
                            'precio_mayor' => $price,
                            'stock_actual' => $stock ?? $product->stock_actual,
                        ]);

                        // Log stock change if provided
                        if ($stock !== null && $stock != $oldStock) {
                            StockMovement::create([
                                'product_id' => $product->id,
                                'type' => $stock > $oldStock ? 'IN' : 'OUT',
                                'quantity' => abs($stock - $oldStock),
                                'reason' => 'Carga Masiva de Inventario',
                                'user_id' => Auth::id(),
                            ]);
                        }
                        $count++;
                    }
                }
            });

            return back()->with('success', "Sincronización masiva completada. $count items actualizados.");
        }

        return view('erp.inventario.lista-precios');
    }

    /**
     * Promover item de Desarrollo a Maestro
     */
    public function promoteToMaster($id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'is_development' => false,
            'development_notes' => null
        ]);

        return redirect()->route('erp.inventario.productos')
            ->with('success', "Producto [{$product->codigo_oem}] promovido exitosamente al Maestro.");
    }

    /**
     * Ver Kardex (Historial)
     */
    public function kardex(Request $request)
    {
        $movements = StockMovement::with('product', 'user')->latest()->paginate(50);
        return view('erp.inventario.kardex', compact('movements'));
    }

    /**
     * Reportes de Inventario
     */
    public function reportes()
    {
        return view('erp.inventario.reportes');
    }

    /**
     * Auditoría
     */
    public function auditoria()
    {
        return view('erp.inventario.auditoria');
    }

    /**
     * Ajustes (Vista)
     */
    public function ajustesView()
    {
        $products = Product::where('activo', true)->orderBy('nombre')->get();
        return view('erp.inventario.ajustes', compact('products'));
    }
}
