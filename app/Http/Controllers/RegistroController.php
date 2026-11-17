<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipoCuenta' => ['required', 'in:conductor,propietario'],
            'terminos' => ['accepted'],
        ], [
            'correo.unique' => 'Este correo ya está registrado.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'terminos.accepted' => 'Debes aceptar los términos y condiciones.',
        ]);

        $usuario = User::create([
            'name' => $datos['nombre'],
            'email' => $datos['correo'],
            'tipo_cuenta' => $datos['tipoCuenta'],
            'password' => Hash::make($datos['password']),
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect()
            ->route('inicio')
            ->with('success', '¡Tu cuenta se creó correctamente!');
    }
}