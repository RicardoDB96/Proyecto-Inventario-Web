<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Inventory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $products = Product::latest()->paginate(4);

        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(('products.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' =>'required',
            'is_active' => 'required',
        ]);

        $product = Product::create($request->all());
        
        // Se crea el inventario de manera inmediata cuando se crea el producto
        Inventory::create([
            "amount"=> 0,
            "product_id"=>$product->id,
        ]);
        
        return redirect()->route('products.index')->with('success','Nuevo Producto creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el producto por su ID
        $product = Product::where('id', $id)->first();

        // Pasar los datos del producto a la vista
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' =>'required',
            'is_active' => 'required',
        ]);

        $product = Product::where('id', $id)->first();
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Tu producto se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->route('products.index')->with('success','Tu producto se ha eliminado exitosamente!');
    }
}
