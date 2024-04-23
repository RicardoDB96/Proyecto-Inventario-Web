<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $roles = Role::latest()->paginate(4);

        return view('roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(('roles.create'));
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

        Role::create($request->all());
        return redirect()->route('roles.index')->with('success','Nuevo Rol creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el producto por su ID
        $role = Role::where('id', $id)->first();

        // Pasar los datos del producto a la vista
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $role = Role::where('id', $id)->first();
        return view('roles.edit', ['role' => $role]);
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

        $role = Role::where('id', $id)->first();
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success','Tu Rol se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $role = Role::where('id', $id)->first();
        $role->delete();
        return redirect()->route('roles.index')->with('success','Tu Rol se ha eliminado exitosamente!');
    }
}
