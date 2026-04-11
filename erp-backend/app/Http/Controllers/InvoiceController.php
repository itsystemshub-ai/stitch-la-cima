<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

class InvoiceController extends Controller
{
    /**
     * Procesa un carrito de compras y emite una factura (Order).
     * Aplica reglas de negocio: Validación Estricta de Inventario y Deducción Autónoma.
     */
    public function processCheckout(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'vendedor_id' => 'nullable|exists:users,id', // Vendedor que emite (en POS)
            'items' => 'required|array|min:1',
            // Validation rules para los items: ['product_id' => 1, 'cantidad' => 2, 'precio_unitario' => 1500]
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.cantidad' => 'required|numeric|min:0.01',
            'items.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        $customerId = $request->input('customer_id');
        $vendedorId = $request->input('vendedor_id');
        $items = $request->input('items');

        try {
            // Utilizamos Transacciones de Base de Datos para Rolback de Emergencia
            // Si algo falla a la mitad (corte luz, stock agotado simultáneo), la bbdd queda intacta.
            $result = DB::transaction(function () use ($customerId, $vendedorId, $items) {

                $subtotalGlobal = 0;

                // 1. Crear el Encabezado de la Orden (en estado Procesando)
                $order = Order::create([
                    'numero_orden' => 'ORD-' . strtoupper(uniqid()),
                    'customer_id' => $customerId,
                    'vendedor_id' => $vendedorId,
                    'subtotal' => 0,
                    'impuestos' => 0,
                    'total' => 0,
                    'estado' => 'Pagado', // Se asume venta inmediata POS/E-comm
                    'fecha_emision' => now(),
                    'fecha_vencimiento' => now()->addDays(15) // Crédito standard B2B
                ]);

                // 2. Procesar Líneas y Deducir Stock
                foreach ($items as $item) {
                    // Lock For Update bloquea preventivamente esta fila de producto
                    // Evitando que dos vendedores vendan el último repuesto a la vez (Race Condition).
                    $product = Product::where('id', $item['product_id'])->lockForUpdate()->firstOrFail();

                    // Regla Fuerte: No permitir venta sin inventario real
                    if ($product->stock_actual < $item['cantidad']) {
                        throw new Exception("Stock Insuficiente para el repuesto: {$product->codigo_oem} ({$product->nombre}). Solicitado: {$item['cantidad']}, Disponible: {$product->stock_actual}.");
                    }

                    // Calcular subtotales
                    $subtotalItem = $item['cantidad'] * $item['precio_unitario'];
                    $subtotalGlobal += $subtotalItem;

                    // Crear Linea
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'],
                        'subtotal' => $subtotalItem
                    ]);

                    // Deducir Stock Crítico
                    $product->stock_actual -= $item['cantidad'];
                    $product->save();
                }

                // 3. Finalizar Matemática de Facturación
                $impuestos = $subtotalGlobal * 0.16; // Asume IVA General
                $order->update([
                    'subtotal' => $subtotalGlobal,
                    'impuestos' => $impuestos,
                    'total' => $subtotalGlobal + $impuestos
                ]);

                return $order;
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Facturación procesada correctamente e Inventario Deducido.',
                'data' => $result
            ]);

        } catch (Exception $e) {
            // Si entra aquí, todo el proceso de factura y resta de inventario se revirtió (Rollback)
            return response()->json([
                'status' => 'error',
                'message' => 'Validación Transaccional Falló.',
                'error' => $e->getMessage()
            ], 422);
        }
    }
}
