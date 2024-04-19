<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $users = User::latest()->paginate(5);

        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(('users.create'));
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

        User::create($request->all());
        return redirect()->route('users.index')->with('success','Nuevo User creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el producto por su ID
        $user = User::where('id', $id)->first();

        // Pasar los datos del producto a la vista
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::where('id', $id)->first();
        return view('users.edit', ['user' => $user]);
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

        $user = User::where('id', $id)->first();
        $user->update($request->all());
        return redirect()->route('users.index')->with('success','Tu User se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('users.index')->with('success','Tu User se ha eliminado exitosamente!');
    }
}
