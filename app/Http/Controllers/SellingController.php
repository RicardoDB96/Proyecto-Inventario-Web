<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Selling;
use App\Models\SellingRows;

class SellingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $products = Product::all();
        return view(('sellings.create'), compact('products'));
    }

    public function store(Request $request) {
        // Validación de datos
        $request->validate([
            'client' => 'required|string',
            'products.*.id' => 'required|exists:products,id',
            'products.*.cantidad' => 'required|integer|min:1'
        ]);

        // Crear la venta en la base de datos
        $selling = Selling::create([
            'client' => $request->client
            // Calcula subtotal, iva y total según sea necesario
        ]);

        // Guardar los detalles de los productos
        foreach ($request->products as $product) {
            $productModel = Product::findOrFail($product['id']);
            $subtotal = $product['cantidad'] * $productModel->base_price;
            $iva = 0.16;
            $row = new SellingRows([
                'product_id' => $product['id'],
                'price' => $productModel->base_price,
                'amount' => $product['cantidad'],
                'subtotal' => $subtotal,
                'iva' => $iva,
                'total' => ($subtotal * $iva) + $subtotal, // En este caso, total es igual a subtotal
            ]);
            $selling->rows()->save($row);
        }

        // Redirigir al usuario a una página de confirmación
        return redirect()->route('sellings.create')->with('success', 'La venta ha sido registrada correctamente.');
    }
}
