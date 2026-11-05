<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    // Mostrar formulario de registro (GET)
    public function create()
    {
        return view('registro');
    }

    // Guardar usuario (POST)
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:150',
            'password' => 'required|string|min:8|confirmed',
            'tipoCuenta' => 'required|in:conductor,propietario',
            'terminos' => 'accepted'
        ]);

        // Obtener usuarios guardados en sesión
        $usuarios = session()->get('autopark_usuarios', []);

        // Comprobar que el correo no esté registrado
        foreach ($usuarios as $usuario) {
            if ($usuario['correo'] === $datos['correo']) {
                return back()
                    ->withInput($request->except('password', 'password_confirmation'))
                    ->with('error', 'Este correo ya está registrado.');
            }
        }

        // Crear nuevo usuario
        $nuevoUsuario = [
            'id' => count($usuarios) > 0
                ? max(array_column($usuarios, 'id')) + 1
                : 1,

            'nombre' => $datos['nombre'],
            'correo' => $datos['correo'],
            'password' => Hash::make($datos['password']),
            'tipoCuenta' => $datos['tipoCuenta']
        ];

        // Guardar en sesión
        $usuarios[] = $nuevoUsuario;

        session()->put('autopark_usuarios', $usuarios);

        return redirect()
            ->route('registro')
            ->with('success', '¡Tu cuenta se creó correctamente!');
    }
}
