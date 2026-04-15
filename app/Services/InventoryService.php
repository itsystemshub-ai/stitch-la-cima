<?php

namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Notification;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

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
     * Procesamiento masivo de actualización de stock y precios desde archivo físico (Lazy Collection/Chunking)
     */
    public function processMassUpdateFromFile(string $filePath, $userId)
    {
        $count = 0;
        
        // Verifica si es un .accdb (Access origin test) para mock de mdbtools
        $isAccess = pathinfo($filePath, PATHINFO_EXTENSION) === 'accdb';
        
        // Asumiremos que tenemos función que retorna un Generator 
        // yields rows (arrays). Podría usar fgetcsv temporalmente:
        $collection = LazyCollection::make(function () use ($filePath, $isAccess) {
            // Nota de Implementación Avanzada: Si $isAccess === true, aquí se ejecutaría:
            // $process = Process::run("mdb-export $filePath Products");
            // Y leeríamos el standard output iterativamente. Por ahora iteraremos si fuera CSV básico 
            // asumiendo que un puente transformó la metadata a csv estándar.
            
            $handle = fopen($filePath, 'r');
            $headers = fgetcsv($handle); // Leer cabeceras
            
            if ($headers) {
                while (($line = fgetcsv($handle)) !== false) {
                    if(count($headers) === count($line)) {
                        yield array_combine($headers, $line);
                    }
                }
            }
            fclose($handle);
        });

        // Parseo por chunks para DB connection limits
        $collection->chunk(500)->each(function ($chunk) use ($userId, &$count) {
            DB::transaction(function () use ($chunk, &$count) {
                foreach ($chunk as $item) {
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
                            'precio_mayor'   => floatval($item['precio'] ?? 0),
                            'stock_actual'   => intval($item['stock'] ?? 0),
                            'fecha_incorporacion' => !empty($item['incorporacion']) ? date('Y-m-d', strtotime($item['incorporacion'])) : null,
                            'is_development' => false,
                            'activo'         => true,
                        ]
                    );
                    $count++;
                }
            });
        });

        Notification::create([
            'user_id' => $userId,
            'type' => 'success',
            'title' => 'Sincronización Masiva Completada',
            'message' => "Se han procesado $count items a través de LazyCollection (Chunking optimizado).",
            'icon' => 'sync',
            'action_url' => route('erp.inventario.productos')
        ]);
        
        return $count;
    }
}
