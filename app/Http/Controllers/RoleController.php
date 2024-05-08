<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleLogs;
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
        $roles = Role::where('deleted', false)->paginate(4);

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

        $role = Role::create($request->all());

        // Registrar la acción de creación en el log
        RoleLogs::createLog($role->id, auth()->user()->id, 'created', 'Role created');

        return redirect()->route('roles.index')->with('success','New Role have been successfully created!');
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

        $oldName = $role->name;

        $role->update($request->all());

        $newName = $role->name;

        if ($oldName !== $newName) {
            $description = "Role name updated from '{$oldName}' to '{$newName}'";
        } else {
            $description = "Role updated";
        }


        // Registrar la acción de actualización en el log
        RoleLogs::createLog($id, auth()->user()->id, 'updated', $description);

        return redirect()->route('roles.index')->with('success','The Role have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {

        $role = Role::where('id', $id)->first();
        $role->deleted = 1;
        $role->save();


        // Registrar la acción de eliminación en el log
        RoleLogs::createLog($id, auth()->user()->id, 'deleted', 'Role deleted');

        return redirect()->route('roles.index')->with('success','The Role have been successfully deleted!');
    }

    public function logs()
    {
        $logs = RoleLogs::all();
        return view('roles.logs', compact('logs'));
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');
        $roles = Role::where('name','LIKE', '%' . $search_text . '%')
        ->paginate(3);

        $roles->appends(['query' => $search_text]);

        return view('roles.search',compact('roles'));
    }
}
