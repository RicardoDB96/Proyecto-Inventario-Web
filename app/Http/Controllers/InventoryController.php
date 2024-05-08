<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $inventories = Inventory::latest()->paginate(10);

        return view('inventories.index',['inventories'=>$inventories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(('inventories.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' =>'required',
            'is_active' => 'required',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventories.index')->with('success','New Inventory have been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el producto por su ID
        $inventory = Inventory::where('id', $id)->first();

        // Pasar los datos del producto a la vista
        return $inventory->id.'  '.$inventory->name.'<br>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $inventory = Inventory::where('id', $id)->first();
        return view('inventories.edit', ['inventory' => $inventory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'product_id' =>'required',
            'is_active' => 'required',
        ]);

        $inventory = Inventory::where('id', $id)->first();
        $inventory->update($request->all());
        return redirect()->route('inventories.index')->with('success','The Inventory have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $inventory = Inventory::where('id', $id)->first();
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success','The Inventory have been successfully deleted!');
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $inventories = Inventory::where('amount','LIKE', '%' . $search_text . '%')
        ->orWhereHas('product', function ($query) use ($search_text) {
            $query->where('name', 'LIKE', '%' . $search_text . '%');
        })
        ->paginate(3);

        $inventories->appends(['query' => $search_text]);

        return view('inventories.search',compact('inventories'));
    }
}
