<?php

namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class InventoryService
{
    /**
     * Obtener estadísticas clave del inventario.
     */
    public function getInventoryStats(): array
    {
        return [
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
    }

    /**
     * Ajuste Manual o Corrección de Stock
     *
     * @param int|string $productId
     * @param string $type
     * @param float $quantity
     * @param string $reason
     * @param int|string $userId
     * @return void
     */
    public function adjustStock(int|string $productId, string $type, float $quantity, string $reason, int|string $userId): void
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

        $product = Product::find($productId);
        Notification::create([
            'user_id' => $userId,
            'type' => 'info',
            'title' => 'Ajuste de Stock Realizado',
            'message' => "Se ha procesado un ajuste ($type) para el item {$product->codigo_oem}.",
            'icon' => 'settings_input_component',
            'action_url' => route('erp.inventario.productos') . '?search=' . $product->codigo_oem
        ]);
    }

    /**
     * Procesamiento masivo de actualización de stock y precios (Estrategia Universal)
     *
     * @param string $filePath
     * @param int|string $userId
     * @return int
     */
    public function processMassUpdateFromFile(string $filePath, int|string $userId): int
    {
        $count = 0;
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        // Estrategia de Extracción de Datos
        $collection = LazyCollection::make(function () use ($filePath, $extension) {
            if ($extension === 'accdb' || $extension === 'mdb') {
                // Si estamos en Windows, intentamos usar el driver ODBC directamente
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    try {
                        $connectionString = "odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq={$filePath};";
                        $pdo = new \PDO($connectionString);
                        $stmt = $pdo->query("SELECT OEM as codigo, Descripcion as descripcion, Marca as marca, Categoria as categoria, StockFinal as stock, PrecioMayorista as precio FROM Inventario");
                        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                            yield $row;
                        }
                    } catch (\Exception $e) {
                        \Log::warning("Fallo en driver ODBC local. Intentando fallback.");
                    }
                }
            }

            // Fallback Universal: CSV / TXT
            if (file_exists($filePath)) {
                $handle = fopen($filePath, 'r');
                $headers = fgetcsv($handle, 0, ','); // Intento con coma
                
                // Si falla, intentamos punto y coma (común en Excel español)
                if (!$headers || count($headers) < 2) {
                    rewind($handle);
                    $headers = fgetcsv($handle, 0, ';');
                }

                if ($headers) {
                    while (($line = fgetcsv($handle, 0, str_contains(implode('', $headers), ';') ? ';' : ',')) !== false) {
                        if (count($headers) === count($line)) {
                            yield array_combine($headers, $line);
                        }
                    }
                }
                fclose($handle);
            }
        });

        // Aplicación de Cambios en Chunks
        $collection->chunk(200)->each(function ($chunk) use ($userId, &$count) {
            DB::transaction(function () use ($chunk, &$count) {
                foreach ($chunk as $item) {
                    $sku = trim($item['codigo'] ?? $item['OEM'] ?? '');
                    if (empty($sku)) continue;

                    Product::updateOrCreate(
                        ['codigo_oem' => $sku],
                        [
                            'nombre'       => $item['descripcion'] ?? $item['Descripcion'] ?? 'Producto Sincronizado',
                            'marca'        => $item['marca'] ?? $item['Marca'] ?? 'N/A',
                            'categoria'    => $item['categoria'] ?? $item['Categoria'] ?? 'General',
                            'precio_mayor' => floatval($item['precio'] ?? $item['PrecioMayorista'] ?? 0),
                            'stock_actual' => floatval($item['stock'] ?? $item['StockFinal'] ?? 0),
                            'activo'       => true,
                        ]
                    );
                    $count++;
                }
            });
        });

        activity('inventario')
            ->withProperties(['count' => $count, 'file' => basename($filePath)])
            ->log("Sincronización masiva de inventario completada: $count items procesados.");

        Notification::create([
            'user_id' => $userId,
            'type' => 'success',
            'title' => 'Sincronización Masiva Completada',
            'message' => "Se han procesado $count items a través de LazyCollection (Chunking optimizado).",
            'icon' => 'sync',
            'action_url' => route('erp.inventario.productos') . '?updated=' . time()
        ]);
        
        return $count;
    }
}
