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

                // 1. Procesar Líneas y Calcular Totales
                foreach ($items as $item) {
                    $product = Product::where('id', $item['product_id'])->lockForUpdate()->firstOrFail();

                    if ($product->stock_actual < $item['cantidad']) {
                        throw new Exception("Stock Insuficiente para el repuesto: {$product->codigo_oem} ({$product->nombre}).");
                    }

                    $lineSubtotal = $item['cantidad'] * $item['precio_unitario'];
                    $subtotalGlobal += $lineSubtotal;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'],
                        'subtotal' => $lineSubtotal
                    ]);

                    // Deducir stock solo si NO requiere aprobación (se maneja abajo)
                }

                $tax = $subtotalGlobal * 0.16;
                $total = $subtotalGlobal + $tax;

                // 2. Determinar si requiere Aprobación (Ordenes > $1000)
                $requiresApproval = $total > 1000;
                
                if ($requiresApproval) {
                    $order->update([
                        'subtotal' => $subtotalGlobal,
                        'impuestos' => $tax,
                        'total' => $total,
                        'status' => 'pending_approval',
                        'estado' => 'Esperando Aprobación'
                    ]);

                    \App\Models\Approval::create([
                        'approvable_id' => $order->id,
                        'approvable_type' => Order::class,
                        'requester_id' => Auth::id() ?? 1,
                        'status' => 'pending',
                        'reason' => 'Orden excede el límite de aprobación automática ($1,000.00).'
                    ]);
                } else {
                    // Si no requiere aprobación, deducimos el stock ahora
                    foreach ($items as $item) {
                        $product = Product::find($item['product_id']);
                        $product->decrement('stock_actual', $item['cantidad']);
                        
                        // Registrar movimiento en Kardex
                        \App\Models\StockMovement::create([
                            'product_id' => $product->id,
                            'type' => 'OUT',
                            'quantity' => $item['cantidad'],
                            'reason' => "Venta POS: {$order->numero_orden}",
                            'user_id' => Auth::id() ?? 1,
                            'reference_id' => $order->id
                        ]);
                    }

                    $order->update([
                        'subtotal' => $subtotalGlobal,
                        'impuestos' => $tax,
                        'total' => $total,
                        'estado' => 'Pagado'
                    ]);
                }

                return $order;
            });

            $msg = $result->estado === 'Esperando Aprobación' 
                ? 'Orden registrada. Requiere aprobación gerencial por monto elevado.' 
                : 'Facturación procesada correctamente e Inventario Deducido.';

            return response()->json([
                'status' => 'success',
                'message' => $msg,
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
