<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function register(Request $request) {
        // Validamos que los datos del ingresados sean validos
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|integer',
            'password' => 'required|confirmed'
        ]);

        // Registro el usuario en la base de datos
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id =$request->role_id;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            'status' => 1,
            'message' => 'Registered user'
        ]);
    }

    public function login(Request $request) {
        // Validamos el ingreso de los datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intentamos iniciar sesion
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerar el token csrf
            return redirect()->intended('/');
        }

        // Lanzar mensaje de error de datos invalidos
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    public function userProfile() {
        return response()->json([
            'status' => 0,
            'message' => 'User info',
            'data' => auth()->user()
        ]);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete(); // Eliminamos el token

        $request->session()->invalidate(); // Invalidamos sesión
        $request->session()->regenerate(); // Regenerar el token csrf

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener todos los productos
        $users = User::with('role')->paginate(4);

        return view('users.index', compact('users'));
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
        // Validamos que los datos del ingresados sean validos
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|integer',
            'password' => 'required'
        ]);

        // Registro el usuario en la base de datos
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id =$request->role_id;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('users.index')->with('success','New User have been successfully created!');
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
        return redirect()->route('users.index')->with('success','The User have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('users.index')->with('success','The User have been successfully deleted!');
    }

    public function search(Request $request)
    {
        $search_text = $request->query('query');;
        $users = User::where('name','LIKE', '%' . $search_text . '%')
        ->orWhere('last_name','LIKE','%'.$search_text.'%')
        ->orWhere('email','LIKE','%'.$search_text.'%')
        ->orWhereHas('role', function ($query) use ($search_text) {
            $query->where('name', 'LIKE', '%' . $search_text . '%');
        })
        ->paginate(3);

        $users->appends(['query' => $search_text]);

        return view('users.search',compact('users'));
    }
}
