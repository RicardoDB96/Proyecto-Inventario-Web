<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        // Validación de los datos
        $credentials = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);
    
        $remember = $request->filled('remember'); // Convertir el on/null del checkbox a bool
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate(); // Regenerar el token csrf
            return redirect()->intended('/');
        }
    
        // Lanzar mensaje de error de datos invalidos
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    public function logout(Request $request) 
    {
        Auth::logout(); // Cerramos sesión
        $request->session()->invalidate(); // Invalidamos sesión
        $request->session()->regenerate(); // Regenerar el token csrf

        return redirect('/');
    }
}
