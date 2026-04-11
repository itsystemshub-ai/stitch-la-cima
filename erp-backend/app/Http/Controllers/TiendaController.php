<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
    public function catalogoGeneral()
    {
        // Obtener todos los productos activos
        $products = Product::where('activo', true)
            ->where('precio_mayor', '>', 0)
            ->orderBy('nombre')
            ->paginate(24);

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

        // Productos relacionados (misma categoría)
        $relatedProducts = Product::where('categoria', $product->categoria)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('tienda.detalle_productos', compact('product', 'relatedProducts'));
    }
}
