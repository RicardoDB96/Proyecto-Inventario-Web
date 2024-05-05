<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $suppliers = Supplier::latest()->paginate(4);

        return view('suppliers.index',['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(('suppliers.create'));
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

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success','New Supplier have been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el producto por su ID
        $supplier = Supplier::where('id', $id)->first();

        // Pasar los datos del producto a la vista
        return view('suppliers.show', ['supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $supplier = Supplier::where('id', $id)->first();
        return view('suppliers.edit', ['supplier' => $supplier]);
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

        $supplier = Supplier::where('id', $id)->first();
        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success','The Supplier have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $supplier = Supplier::where('id', $id)->first();
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success','The Supplier have been successfully deleted!');
    }
}
