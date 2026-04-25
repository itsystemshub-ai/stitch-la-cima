<?php

/**
 * Zenith ERP - Inventory & Stock Engine
 * Manages products, stock movements (Kardex), and mass valuation.
 * MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5
 */

namespace App\Http\Controllers;

use App\Jobs\ProcessMassUpdate;
use App\Models\Notification;
use App\Models\Product;
use App\Models\StockMovement;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

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
            'featured_products' => Product::where('activo', true)->where('stock_actual', '>', 0)
                ->orderByDesc(DB::raw('stock_actual * costo_compra'))
                ->take(3)
                ->get(),
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
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('codigo_oem', 'like', "%{$search}%")
                    ->orWhere('codigo_interno', 'like', "%{$search}%")
                    ->orWhere('marca', 'like', "%{$search}%")
                    ->orWhere('fabricante', 'like', "%{$search}%")
                    ->orWhere('categoria', 'like', "%{$search}%")
                    ->orWhere('material', 'like', "%{$search}%");
            });
        }

        // Ordenamiento Dinámico Seguro
        $allowedSorts = [
            'id', 'codigo_oem', 'categoria', 'fabricante', 'marca',
            'material', 'espesor', 'nombre', 'medidas', 'precio_mayor', 'stock_actual',
        ];

        $sortBy = in_array($request->sort_by, $allowedSorts) ? $request->sort_by : 'nombre';
        $sortOrder = in_array($request->sort_order, ['asc', 'desc']) ? $request->sort_order : 'asc';

        $products = $query->orderBy($sortBy, $sortOrder)->paginate(100);

        $inventory_value = Product::where('is_development', false)->sum(DB::raw('stock_actual * costo_compra'));
        $low_stock_count = Product::where('is_development', false)->whereColumn('stock_actual', '<=', 'stock_minimo')->count();

        return view('erp.inventario.productos', compact('products', 'inventory_value', 'low_stock_count', 'sortBy', 'sortOrder'));
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

        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'success',
            'title' => 'Nuevo Producto Registrado',
            'message' => "El item {$product->codigo_oem} se ha integrado satisfactoriamente al ecosistema.",
            'icon' => 'inventory_2',
            'action_url' => route('erp.inventario.productos').'?search='.$product->codigo_oem,
        ]);

        return back()->with('success', 'Producto registrado estratégicamente.');
    }

    /**
     * Ajuste Manual de Stock
     */
    public function adjustStock(Request $request, InventoryService $inventoryService)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:IN,OUT,ADJUST',
            'quantity' => 'required|numeric|min:0.01',
            'reason' => 'required|string',
        ]);

        $inventoryService->adjustStock(
            $request->product_id,
            $request->type,
            $request->quantity,
            $request->reason,
            Auth::id()
        );

        return back()->with('success', 'Ajuste de stock procesado y auditado.');
    }

    /**
     * Carga Masiva de Precios y Stock (Excel)
     */
    public function massUpdate(Request $request, InventoryService $inventoryService)
    {
        if ($request->isMethod('post') && $request->has('excel_data')) {
            $data = json_decode($request->excel_data, true);

            if (! $data) {
                return back()->with('error', 'Error al procesar los datos del archivo.');
            }

            // Save the data to a temporary CSV file
            $tempFile = tempnam(sys_get_temp_dir(), 'excel_import_');
            $handle = fopen($tempFile, 'w');

            // Write headers (if the array is not empty)
            if (! empty($data)) {
                $headers = array_keys($data[0]);
                fputcsv($handle, $headers);

                foreach ($data as $row) {
                    fputcsv($handle, $row);
                }
            }

            fclose($handle);

            // Dispatch the job with the temporary file path
            ProcessMassUpdate::dispatch($tempFile, Auth::id());

            return back()->with('success', 'La sincronización masiva ha comenzado en segundo plano. Recibirá una notificación al finalizar.');
        }

        // Estadísticas Reales para la Vista
        $stats = [
            'total_items' => Product::count(),
            'last_sync' => Product::latest('updated_at')->first()?->updated_at?->format('d/m/Y h:i A') ?? 'N/A',
            'latest_changes' => Product::latest('updated_at')->take(10)->get(),
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
            'development_notes' => null,
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
     * Auditoría Global del Sistema
     */
    public function auditoria()
    {
        $activities = Activity::with('causer', 'subject')
            ->latest()
            ->paginate(50);

        return view('erp.inventario.auditoria', compact('activities'));
    }

    /**
     * API para Búsqueda Inteligente (Usada por Smart Navigator)
     */
    public function smartSearch(Request $request)
    {
        $term = $request->q;
        if (empty($term)) {
            return response()->json([]);
        }

        $products = Product::smartSearch($term)
            ->where('activo', true)
            ->limit(5)
            ->get(['id', 'nombre', 'codigo_oem', 'categoria', 'marca', 'precio_mayor', 'stock_actual']);

        return response()->json($products);
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
