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

                // 2. Determinar si requiere Aprobación (Ordenes > $1000)
                $requiresApproval = $subtotalGlobal > 1000;
                
                if ($requiresApproval) {
                    $order->update([
                        'subtotal' => $subtotalGlobal,
                        'impuestos' => $subtotalGlobal * 0.16,
                        'total' => $subtotalGlobal * 1.16,
                        'status' => 'pending_approval',
                        'estado' => 'Esperando Aprobación'
                    ]);

                    \App\Models\Approval::create([
                        'approvable_id' => $order->id,
                        'approvable_type' => Order::class,
                        'requester_id' => $request->user()->id ?? 1,
                        'status' => 'pending',
                        'reason' => 'Orden excede el límite de aprobación automática ($1,000.00).'
                    ]);

                    // No deducimos stock hasta que sea aprobada
                    foreach ($items as $item) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item['product_id'],
                            'cantidad' => $item['cantidad'],
                            'precio_unitario' => $item['precio_unitario'],
                            'subtotal' => $item['cantidad'] * $item['precio_unitario']
                        ]);
                    }
                } else {
                    // 3. Procesar Líneas y Deducir Stock (Flujo estándar < $1000)
                    foreach ($items as $item) {
                        $product = Product::where('id', $item['product_id'])->lockForUpdate()->firstOrFail();

                        if ($product->stock_actual < $item['cantidad']) {
                            throw new Exception("Stock Insuficiente para el repuesto: {$product->codigo_oem} ({$product->nombre}).");
                        }

                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'cantidad' => $item['cantidad'],
                            'precio_unitario' => $item['precio_unitario'],
                            'subtotal' => $item['cantidad'] * $item['precio_unitario']
                        ]);

                        $product->stock_actual -= $item['cantidad'];
                        $product->save();
                    }

                    $order->update([
                        'subtotal' => $subtotalGlobal,
                        'impuestos' => $subtotalGlobal * 0.16,
                        'total' => $subtotalGlobal * 1.16
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
