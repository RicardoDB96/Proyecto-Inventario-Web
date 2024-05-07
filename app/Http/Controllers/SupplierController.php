<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\SupplierLogs;
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
        $suppliers = Supplier::where('deleted', false)->paginate(4);

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

        $supplier = Supplier::create($request->all());

        // Registrar la acción de creación en el log
        SupplierLogs::createLog($supplier->id, auth()->user()->id, 'created', 'Supplier created');

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

        $oldName = $supplier->name;

        $supplier->update($request->all());

        $newName = $supplier->name;

        if ($oldName !== $newName) {
            $description = "Supplier name updated from '{$oldName}' to '{$newName}'";
        } else {
            $description = "Supplier updated";
        }


        // Registrar la acción de actualización en el log
        SupplierLogs::createLog($id, auth()->user()->id, 'updated', $description);

        return redirect()->route('suppliers.index')->with('success','The Supplier have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {

        $supplier = Supplier::where('id', $id)->first();
        $supplier->deleted = 1;
        $supplier->save();


        // Registrar la acción de eliminación en el log
        SupplierLogs::createLog($id, auth()->user()->id, 'deleted', 'Supplier deleted');

        return redirect()->route('suppliers.index')->with('success','The Supplier have been successfully deleted!');
    }

    public function logs()
    {
        $logs = SupplierLogs::all();
        return view('suppliers.logs', compact('logs'));
    }
}
