<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    /**
     * Muestra la página de inicio de la tienda (Landing)
     */
    public function index()
    {
        // Obtener productos destacados (por ahora los últimos 8 que tengan precio)
        $featuredProducts = Product::where('activo', true)
            ->where('precio_mayor', '>', 0)
            ->latest()
            ->take(8)
            ->get();

        return view('tienda.index', compact('featuredProducts'));
    }

    /**
     * Muestra el catálogo general de productos
     */
        public function catalogoGeneral(Request $request)
    {
        $query = Product::where('activo', true);

        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nombre', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('codigo_oem', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('marca', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('codigo_erp', 'LIKE', "%{$searchTerm}%");
            });
        }

        $products = $query->orderBy('nombre')->paginate(24);

        return view('tienda.catalogo_general', compact('products'));
    }

    /**
     * Muestra el catálogo detallado con filtros avanzados
     */
    public function catalogoDetallado(Request $request)
    {
        $query = Product::where('activo', true);

        // Búsqueda simple par las redirecciones del JS
        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nombre', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('codigo_oem', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('marca', 'LIKE', "%{$searchTerm}%");
            });
        }

        $products = $query->paginate(20);

        return view('tienda.catalogo_detallado', compact('products'));
    }

    /**
     * Muestra el detalle de un producto específico
     */
    public function detalleProducto(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);

        if (!$product) {
            return redirect('/tienda/catalogo_general')->with('error', 'Producto no encontrado');
        }

        $relatedProducts = Product::where('categoria', $product->categoria)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('tienda.detalle_productos', compact('product', 'relatedProducts'));
    }

    /**
     * Muestra el carrito de compras
     */
    public function verCarrito(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('tienda.carrito', compact('cart'));
    }

    /**
     * Agrega producto al carrito (API)
     */
    public function agregarCarrito(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if (\Illuminate\Support\Facades\Auth::guard('tienda')->check()) {
            $customer = \Illuminate\Support\Facades\Auth::guard('tienda')->user();
            
            $cartItem = \App\Models\TiendaCart::firstOrNew([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
            ]);

            $cartItem->cantidad = $cartItem->exists ? $cartItem->cantidad + $request->cantidad : $request->cantidad;
            $cartItem->save();

            $cartCount = \App\Models\TiendaCart::where('customer_id', $customer->id)->sum('cantidad');
        } else {
            $cart = $request->session()->get('cart', []);
            $key = 'product_' . $product->id;
            
            if (isset($cart[$key])) {
                $cart[$key]['cantidad'] += $request->cantidad;
            } else {
                $cart[$key] = [
                    'product_id' => $product->id,
                    'nombre' => $product->nombre,
                    'codigo_oem' => $product->codigo_oem,
                    'precio' => $product->precio_mayor,
                    'cantidad' => $request->cantidad,
                ];
            }
            $request->session()->put('cart', $cart);
            $cartCount = array_sum(array_column($cart, 'cantidad'));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Producto agregado al carrito exitosamente.',
            'cart_count' => $cartCount,
        ]);
    }

    /**
     * Muestra la página de checkout
     */
    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect('/tienda/carrito')->with('error', 'El carrito está vacío');
        }

        $customers = Customer::where('activo', true)->get();
        
        $subtotal = array_sum(array_map(function($item) {
            return $item['precio'] * $item['cantidad'];
        }, $cart));

        $impuesto = $subtotal * 0.16;
        $total = $subtotal + $impuesto;

        return view('tienda.checkout', compact('cart', 'customers', 'subtotal', 'impuesto', 'total'));
    }

    /**
     * Procesa el checkout desde la tienda (público)
     */
    public function procesarCheckout(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array|min:1',
        ]);

        $items = $request->items;
        
        try {
            $result = DB::transaction(function () use ($request, $items) {
                $subtotal = 0;
                
                foreach ($items as $item) {
                    $product = Product::find($item['product_id']);
                    if ($product->stock_actual < $item['cantidad']) {
                        throw new \Exception("Stock insuficiente para: {$product->nombre}");
                    }
                    $subtotal += $item['cantidad'] * $item['precio'];
                }

                $impuesto = $subtotal * 0.16;
                $total = $subtotal + $impuesto;

                $order = Order::create([
                    'numero_orden' => 'WEB-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT),
                    'customer_id' => $request->customer_id,
                    'subtotal' => $subtotal,
                    'impuestos' => $impuesto,
                    'total' => $total,
                    'estado' => 'Pendiente',
                    'status' => 'pending',
                    'fecha_emision' => now(),
                ]);

                foreach ($items as $item) {
                    $product = Product::find($item['product_id']);
                    $lineSubtotal = $item['cantidad'] * $item['precio'];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio'],
                        'subtotal' => $lineSubtotal,
                    ]);

                    $product->decrement('stock_actual', $item['cantidad']);

                    StockMovement::create([
                        'product_id' => $product->id,
                        'type' => 'OUT',
                        'quantity' => $item['cantidad'],
                        'reason' => "Venta Web: {$order->numero_orden}",
                        'reference_id' => $order->id,
                    ]);
                }

                return $order;
            });

            $request->session()->forget('cart');

            return response()->json([
                'status' => 'success',
                'message' => 'Pedido procesado exitosamente',
                'order_id' => $result->id,
                'numero_orden' => $result->numero_orden,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Muestra la página de confirmación de pedido
     */
    public function confirmacion(Request $request, $orderId)
    {
        $order = Order::with('items.product', 'customer')->findOrFail($orderId);
        return view('tienda.confirmacion', compact('order'));
    }
}
