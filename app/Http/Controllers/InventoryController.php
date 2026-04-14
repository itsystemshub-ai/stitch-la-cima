<?php
/**
 * Zenith ERP - Inventory & Stock Engine
 * Manages products, stock movements (Kardex), and mass valuation.
 * MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Notification;
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
     * Carga Masiva de Precios y Stock (Excel)
     */
    public function massUpdate(Request $request)
    {
        if ($request->isMethod('post') && $request->has('excel_data')) {
            $data = json_decode($request->excel_data, true);
            $count = 0;

            if (!$data) {
                return back()->with('error', 'Error al procesar los datos del archivo.');
            }

            DB::transaction(function () use ($data, &$count) {
                foreach ($data as $item) {
                    $sku = trim($item['codigo'] ?? '');
                    if (empty($sku)) continue;

                    $product = Product::updateOrCreate(
                        ['codigo_oem' => $sku],
                        [
                            'foto_path'      => $item['foto'] ?? '',
                            'categoria'      => $item['categoria'] ?? '',
                            'fabricante'     => $item['fabricante'] ?? '',
                            'marca'          => $item['marca'] ?? '',
                            'material'       => $item['material'] ?? '',
                            'espesor'        => $item['espesor'] ?? '',
                            'nombre'         => $item['descripcion'] ?? 'Nuevo Producto',
                            'medidas'        => $item['medidas'] ?? '',
                            'precio_mayor'   => $item['precio'] ?? 0,
                            'stock_actual'   => $item['stock'] ?? 0,
                            'fecha_incorporacion' => !empty($item['incorporacion']) ? date('Y-m-d', strtotime($item['incorporacion'])) : null,
                            'is_development' => false,
                            'activo'         => true,
                        ]
                    );
                    $count++;
                }

                // Generar Notificación Estratégica
                Notification::create([
                    'type' => 'success',
                    'title' => 'Sincronización Exitosa',
                    'message' => "Se han procesado $count items desde el archivo Excel oficial.",
                    'icon' => 'sync',
                    'action_url' => route('erp.inventario.productos')
                ]);
            });

            return back()->with('success', "Sincronización masiva de Excel completada. $count items procesados exitosamente.");
        }

        // Estadísticas Reales para la Vista
        $stats = [
            'total_items' => Product::count(),
            'last_sync' => Product::latest('updated_at')->first()?->updated_at?->format('d/m/Y h:i A') ?? 'N/A',
            'latest_changes' => Product::latest('updated_at')->take(10)->get()
        ];

        return view('erp.inventario.lista-precios', compact('stats'));
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
