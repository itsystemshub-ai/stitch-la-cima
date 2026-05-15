<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\NotaCredito;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Services\SalesService;

class VentasController extends Controller
{
    protected SalesService $salesService;

    public function __construct(SalesService $salesService)
    {
        $this->salesService = $salesService;
    }

    public function index()
    {
        $stats = $this->salesService->getSalesKPIs();
        $stats['categoria_mix'] = $this->salesService->getCategoryMix();

        $recentOrders = Order::with('customer')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('erp.ventas.index', compact('stats', 'recentOrders'));
    }

    public function pos()
    {
        $customers = Customer::where('activo', true)->orderBy('razon_social')->get();
        $products = Product::where('activo', true)->where('is_development', false)
            ->where('stock_actual', '>', 0)
            ->orderBy('nombre')
            ->get();
            
        $currencyService = resolve(\App\Services\CurrencyService::class);
        $currentRate = $currencyService->getCurrentRate();

        return view('erp.ventas.pos', compact('customers', 'products', 'currentRate'));
    }

    public function clientes(Request $request)
    {
        $query = Customer::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('razon_social', 'like', "%{$search}%")
                  ->orWhere('rif', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $customers = $query->orderBy('razon_social')->paginate(20);
        return view('erp.ventas.clientes', compact('customers'));
    }

    public function storeCliente(Request $request)
    {
        $validated = $request->validate([
            'rif' => 'required|string|unique:customers',
            'razon_social' => 'required|string',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
            'tipo_cliente' => 'required|in:B2B,B2C,VIP',
            'limite_credito' => 'nullable|numeric|min:0',
        ]);

        Customer::create($validated);
        return back()->with('success', 'Cliente registrado exitosamente.');
    }

    public function registro()
    {
        $orders = Order::with('customer')
            ->orderByDesc('created_at')
            ->paginate(30);
        return view('erp.ventas.registro', compact('orders'));
    }

    public function facturacion(Request $request)
    {
        $query = Order::with('customer', 'items.product');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('numero_orden', 'like', "%{$search}%");
        }

        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        $orders = $query->orderByDesc('created_at')->paginate(30);
        return view('erp.ventas.facturacion', compact('orders'));
    }

    public function procesarVenta(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.cantidad' => 'required|integer|min:1',
            'items.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        try {
            $result = $this->salesService->processSale($request->customer_id, $request->items);

            return response()->json([
                'status' => 'success',
                'message' => 'Venta procesada exitosamente',
                'data' => $result
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function historial(Request $request)
    {
        $query = Order::with('customer');

        if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
            $query->whereBetween('created_at', [
                $request->fecha_inicio,
                $request->fecha_fin
            ]);
        }

        $orders = $query->orderByDesc('created_at')->paginate(30);
        return view('erp.ventas.historial', compact('orders'));
    }

    public function notasCredito(Request $request)
    {
        $query = NotaCredito::with('order', 'cliente');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('numero_nota', 'like', "%{$search}%");
        }

        $notas = $query->orderByDesc('created_at')->paginate(30);
        return view('erp.ventas.notas-credito', compact('notas'));
    }

    public function crearNotaCredito(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'monto' => 'required|numeric|min:0.01',
            'motivo' => 'required|string',
        ]);

        $order = Order::findOrFail($request->order_id);
        
        if ($request->monto > $order->total) {
            return back()->with('error', 'El monto no puede exceder el total de la orden.');
        }

        $nota = NotaCredito::create([
            'numero_nota' => NotaCredito::generateNextNumber('NC', 'numero_nota'),
            'order_id' => $request->order_id,
            'cliente_id' => $order->customer_id,
            'vendedor_id' => Auth::id(),
            'monto' => $request->monto,
            'motivo' => $request->motivo,
            'estado' => 'Pendiente',
        ]);

        return back()->with('success', 'Nota de crédito creada exitosamente.');
    }

    public function aprobarNotaCredito($id)
    {
        $nota = NotaCredito::findOrFail($id);
        $nota->update(['estado' => 'Aprobada']);
        return back()->with('success', 'Nota de crédito aprobada.');
    }

    public function aplicarNotaCredito($id)
    {
        $nota = NotaCredito::findOrFail($id);
        
        DB::transaction(function () use ($nota) {
            $nota->update(['estado' => 'Aplicada']);
            
            $nota->order->update([
                'estado' => 'Pagado con NC',
            ]);
        });

        return back()->with('success', 'Nota de crédito aplicada a la orden.');
    }

    public function vendedores()
    {
        return view('erp.ventas.vendedores');
    }

    public function reportes(Request $request)
    {
        $periodo = $request->get('periodo', 'mes');
        $reportData = $this->salesService->getSalesReport($periodo);
        
        $ventas = $reportData['ventas'];
        $total_ventas = $reportData['total_ventas'];
        $total_ordenes = $reportData['total_ordenes'];
        $monthlyTrend = $reportData['monthlyTrend'];
        
        $categoryMix = $this->salesService->getCategoryMix();

        return view('erp.ventas.reportes', compact('ventas', 'total_ventas', 'total_ordenes', 'periodo', 'monthlyTrend', 'categoryMix'));
    }

    /**
     * Reporte de Ganancias Mensuales (Inteligencia de Negocio)
     */
    public function reporteGanancias()
    {
        $profitData = $this->salesService->getProfitReport();
        
        $reporte = $profitData['reporte'];
        $ventasGrafico = $profitData['ventasGrafico'];

        return view('erp.ventas.reporte-ganancias', compact('reporte', 'ventasGrafico'));
    }

    public function showOrder($id)
    {
        $order = Order::with('customer', 'items.product', 'vendedor')->findOrFail($id);
        return response()->json($order);
    }

    public function anularOrden($id)
    {
        $order = Order::findOrFail($id);
        
        if ($order->estado === 'Anulada') {
            return back()->with('error', 'La orden ya está anulada.');
        }

        DB::transaction(function () use ($order) {
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                $product->increment('stock_actual', $item->cantidad);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'IN',
                    'quantity' => $item->cantidad,
                    'reason' => "Anulación Orden: {$order->numero_orden}",
                    'user_id' => Auth::id(),
                    'reference_id' => $order->id,
                ]);
            }

            $order->update([
                'estado' => 'Anulada',
                'status' => 'cancelled'
            ]);
        });

        return back()->with('success', 'Orden anulada y stock reintegrado.');
    }
}