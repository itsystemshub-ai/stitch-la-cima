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

class VentasController extends Controller
{
    public function index()
    {
        $stats = [
            'ventas_hoy' => Order::whereDate('created_at', today())->sum('total'),
            'ventas_mes' => Order::whereMonth('created_at', now()->month)->sum('total'),
            'ordenes_pendientes' => Order::where('estado', 'Pendiente')->count(),
            'clientes_activos' => Customer::where('activo', true)->count(),
        ];
        return view('erp.ventas.index', compact('stats'));
    }

    public function pos()
    {
        $customers = Customer::where('activo', true)->orderBy('razon_social')->get();
        $products = Product::where('activo', true)->where('is_development', false)
            ->where('stock_actual', '>', 0)
            ->orderBy('nombre')
            ->get();
        return view('erp.ventas.pos', compact('customers', 'products'));
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

        $customer = Customer::findOrFail($request->customer_id);
        $items = $request->items;
        
        try {
            $result = DB::transaction(function () use ($customer, $items) {
                $subtotal = 0;
                
                foreach ($items as $item) {
                    $product = Product::find($item['product_id']);
                    if ($product->stock_actual < $item['cantidad']) {
                        throw new \Exception("Stock insuficiente para: {$product->nombre}");
                    }
                    $subtotal += $item['cantidad'] * $item['precio_unitario'];
                }

                $impuesto = $subtotal * 0.16;
                $total = $subtotal + $impuesto;

                $order = Order::create([
                    'numero_orden' => 'ORD-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT),
                    'customer_id' => $customer->id,
                    'vendedor_id' => Auth::id(),
                    'subtotal' => $subtotal,
                    'impuestos' => $impuesto,
                    'total' => $total,
                    'estado' => 'Pagado',
                    'status' => 'completed',
                    'fecha_emision' => now(),
                ]);

                foreach ($items as $item) {
                    $product = Product::find($item['product_id']);
                    $lineSubtotal = $item['cantidad'] * $item['precio_unitario'];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'],
                        'subtotal' => $lineSubtotal,
                    ]);

                    $product->decrement('stock_actual', $item['cantidad']);

                    StockMovement::create([
                        'product_id' => $product->id,
                        'type' => 'OUT',
                        'quantity' => $item['cantidad'],
                        'reason' => "Venta POS: {$order->numero_orden}",
                        'user_id' => Auth::id(),
                        'reference_id' => $order->id,
                    ]);
                }

                return $order;
            });

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
            'numero_nota' => 'NC-' . date('Ymd') . '-' . str_pad(NotaCredito::count() + 1, 4, '0', STR_PAD_LEFT),
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
        
        $query = Order::query();
        
        switch ($periodo) {
            case 'dia':
                $query->whereDate('created_at', today());
                break;
            case 'semana':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'mes':
            default:
                $query->whereMonth('created_at', now()->month);
                break;
        }

        $ventas = $query->select(
            DB::raw('DATE(created_at) as fecha'),
            DB::raw('COUNT(*) as total_ordenes'),
            DB::raw('SUM(total) as monto_total')
        )
        ->groupBy('fecha')
        ->orderBy('fecha')
        ->get();

        $total_ventas = $query->sum('total');
        $total_ordenes = $query->count();

        return view('erp.ventas.reportes', compact('ventas', 'total_ventas', 'total_ordenes', 'periodo'));
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