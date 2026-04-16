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
            'accdb_file' => 'required|file',
        ]);

        // VERIFICACIÓN DE CAPACIDAD DEL SERVIDOR (Portabilidad Cloud)
        $drivers = PDO::getAvailableDrivers();
        $hasOdbc = in_array('odbc', $drivers);

        if (!$hasOdbc) {
            return response()->json([
                'status' => 'unsupported',
                'message' => 'El entorno de servidor actual no soporta la lectura directa de archivos .accdb.',
                'recommendation' => 'Para despliegues en la nube (Linux/Docker), exporte sus datos de Access a Excel o CSV y utilice nuestro "Cargador Universal" de inventario.',
                'cloud_ready' => true
            ], 422);
        }

        try {
            // Guardar temporalmente el archivo
            $file = $request->file('accdb_file');
            $path = $file->storeAs('temp_imports', 'CIMA_SYNC_' . time() . '.accdb');
            $fullPath = storage_path('app/private/' . $path);

            // Conexión avanzada por ODBC (Solo funcionará en Windows con Driver instalado)
            $connectionString = "odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq={$fullPath};";
            
            try {
                $pdo = new PDO($connectionString);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'driver_error',
                    'message' => 'Driver de Microsoft Access no encontrado o mal configurado en el sistema.',
                    'hint' => 'Este comando requiere el "Microsoft Access Database Engine" instalado en el Sistema Operativo.',
                    'alternative' => 'Recomendamos usar el Cargador Universal para máxima compatibilidad.'
                ], 500);
            }

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT OEM, SKU, Descripcion, Marca, Categoria, StockFinal, CostoPromedio, PrecioMayorista, PrecioDetal FROM Inventario";
            $stmt = $pdo->query($query);

            $importedCount = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                Product::updateOrCreate(
                    ['codigo_oem' => $row['OEM']],
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

            if (file_exists($fullPath)) unlink($fullPath);

            return response()->json([
                'status' => 'success',
                'message' => "Sincronización Avanzada completada. {$importedCount} productos actualizados con éxito."
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error crítico al procesar la base de datos Access: ' . $e->getMessage(),
            ], 500);
        }
    }
}
