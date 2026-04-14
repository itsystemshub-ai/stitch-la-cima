<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use PDO;

class AccessImportController extends Controller
{
    /**
     * Muestra la vista de configuración para cargar la base de datos CIMA2026.accdb
     */
    public function showImportView()
    {
        // En una implementación final, esto retornaría una vista Blade en resources/views
        return response()->json([
            'status' => 'success',
            'message' => 'Módulo de Sincronización Legacy activo. Listo para recibir CIMA2026.accdb.'
        ]);
    }

    /**
     * Recibe y procesa el archivo .accdb
     */
    public function syncAccessDatabase(Request $request)
    {
        $request->validate([
            'accdb_file' => 'required|file', // Podría validarse extensión mediante rule custom
        ]);

        try {
            // Guardar temporalmente el archivo
            $file = $request->file('accdb_file');
            $path = $file->storeAs('temp_imports', 'CIMA_SYNC_' . time() . '.accdb');
            $fullPath = storage_path('app/private/' . $path);

            // Conexión avanzada por ODBC (Requiere MS Access Driver en el servidor)
            $connectionString = "odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq={$fullPath};";
            $pdo = new PDO($connectionString);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // EJEMPLO: Sincronizar Tabla de Productos (la tabla real se llamaría 'Articulos' o 'Inventario' en Access)
            // Esto es parametrizable dependiendo de cómo se llamen exactamente las tablas en CIMA2026.accdb
            $query = "SELECT OEM, SKU, Descripcion, Marca, Categoria, StockFinal, CostoPromedio, PrecioMayorista, PrecioDetal FROM Inventario";
            $stmt = $pdo->query($query);

            $importedCount = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                // Función avanzada: Upsert (Actualiza si existe, crea si no)
                Product::updateOrCreate(
                    ['codigo_oem' => $row['OEM']], // Llave primaria real de busqueda
                    [
                        'codigo_interno' => $row['SKU'] ?? null,
                        'nombre' => $row['Descripcion'],
                        'marca' => $row['Marca'] ?? 'N/A',
                        'categoria' => $row['Categoria'] ?? 'General',
                        'stock_actual' => (float)($row['StockFinal'] ?? 0),
                        'costo_compra' => (float)($row['CostoPromedio'] ?? 0),
                        'precio_mayor' => (float)($row['PrecioMayorista'] ?? 0),
                        'precio_detal' => (float)($row['PrecioDetal'] ?? 0),
                        'activo' => true
                    ]
                );
                
                $importedCount++;
            }

            // Eliminar archivo temporal por seguridad
            unlink($fullPath);

            return response()->json([
                'status' => 'success',
                'message' => "Sincronización Avanzada completada. {$importedCount} productos actualizados/importados desde Access con éxito."
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error crítico al procesar la base de datos Access: ' . $e->getMessage(),
                'hint' => 'Verifica que el Microsoft Access ODBC Driver esté instalado en el servidor PHP.'
            ], 500);
        }
    }
}
