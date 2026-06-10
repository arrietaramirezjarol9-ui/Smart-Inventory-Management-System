<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $lowStock = Product::where('stock', '<=', 5)->count();

        // 🔴 NUEVO: lista de productos con stock bajo
        $lowStockProducts = Product::where('stock', '<=', 5)->get();

        $inventoryValue = Product::sum(DB::raw('price * stock'));

        $categories = Category::withCount('products')->get();

        return view('dashboard', compact(
            'totalProducts',
            'lowStock',
            'inventoryValue',
            'categories',
            'lowStockProducts'
        ));
    }
}