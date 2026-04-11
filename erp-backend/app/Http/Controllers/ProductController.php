<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(15);
        
        $stats = [
            'total_sku' => Product::count(),
            'low_stock' => Product::whereColumn('stock_actual', '<=', 'stock_minimo')->count(),
            'total_value' => Product::sum(\DB::raw('stock_actual * costo_compra')),
            'total_markup' => Product::sum(\DB::raw('stock_actual * precio_mayor')),
        ];

        return view('erp.productos', compact('products', 'stats'));
    }
}
