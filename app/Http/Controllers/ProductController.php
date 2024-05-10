<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\ProductSupplier;

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
        $suppliers = Supplier::all();
        return view(('products.create'), compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' =>'required',
            'is_active' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');

            $fileName = $image->getClientOriginalName();

            $imageName = $fileName;
            $image->move(public_path('img'), $imageName);

        $productData = $request->except('image');
        $productData['image'] = 'img/' . $imageName;
        $product = Product::create($productData);


        // Se obtienen los IDs de los proveedores asociados al producto
        $supplierIds = $request->suppliers;

        foreach ($request->suppliers as $supplier) {
            // Se crea el inventario de manera inmediata cuando se crea el producto
            Inventory::create([
                "amount"=> 0,
                "product_id"=>$product->id,
                "supplier_id" => $supplier['id'],
            ]);
        }

        return redirect()->route('products.index')->with('success','New Product and its Inventory have been successfully created!');
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
        return redirect()->route('products.index')->with('success','The Product have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->route('products.index')->with('success','The Product have been successfully deleted!');
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $products = Product::where('name','LIKE', '%' . $search_text . '%')
        ->orWhere('category_id','LIKE','%'.$search_text.'%')
        ->orWhereHas('category', function ($query) use ($search_text) {
            $query->where('name', 'LIKE', '%' . $search_text . '%');
        })
        ->paginate(3);

        $products->appends(['query' => $search_text]);

        return view('products.search',compact('products'));
    }

    public function filter(Request $request){
        $startDate=$request->input('start_date');
        $endDate=$request->input('end_date');

        $products = Product::whereBetween('created_at', [$startDate, $endDate])
                            ->paginate(4);
                            $products->appends(['start_date' => $startDate])
                                    ->appends(['end_date'=>$endDate]);

        return view('products.index',compact('products'));
    }


}
