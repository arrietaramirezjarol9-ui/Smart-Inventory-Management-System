<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    // Mostrar todos los productos (con categoría)
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products', compact('products'));
    }

    // Mostrar formulario para crear producto
    public function create()
    {
        $categories = Category::all();

        return view('products_create', compact('categories'));
    }

    // Guardar producto
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect('/products');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products_edit', compact('product', 'categories'));
    }

    // Actualizar producto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect('/products');
    }

    // Eliminar producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }

    // 📄 EXPORTAR PDF
    public function exportPdf()
    {
        $products = Product::with('category')->get();

        $pdf = Pdf::loadView('products_pdf', compact('products'));

        return $pdf->download('productos.pdf');
    }
}