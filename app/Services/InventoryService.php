<?php

namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class InventoryService
{
    /**
     * Ajuste Manual o Corrección de Stock
     */
    public function adjustStock($productId, $type, $quantity, $reason, $userId)
    {
        DB::transaction(function () use ($productId, $type, $quantity, $reason, $userId) {
            $product = Product::findOrFail($productId);

            if ($type === 'IN') {
                $product->increment('stock_actual', $quantity);
            } elseif ($type === 'OUT') {
                $product->decrement('stock_actual', $quantity);
            } else {
                // ADJUST (Establecer valor absoluto)
                $product->update(['stock_actual' => $quantity]);
            }

            StockMovement::create([
                'product_id' => $product->id,
                'type' => $type,
                'quantity' => $quantity,
                'reason' => $reason,
                'user_id' => $userId,
            ]);
        });
    }

    /**
     * Procesamiento masivo de actualización de stock y precios
     */
    public function processMassUpdate(array $data, $userId)
    {
        $count = 0;

        DB::transaction(function () use ($data, $userId, &$count) {
            foreach ($data as $item) {
                $sku = trim($item['codigo'] ?? '');
                if (empty($sku)) continue;

                Product::updateOrCreate(
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
                'user_id' => $userId,
                'type' => 'success',
                'title' => 'Sincronización Exitosa',
                'message' => "Se han procesado $count items desde la importación.",
                'icon' => 'sync',
                'action_url' => route('erp.inventario.productos')
            ]);
        });
        
        return $count;
    }
}
