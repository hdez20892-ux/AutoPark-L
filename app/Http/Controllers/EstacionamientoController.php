<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstacionamientoController extends Controller
{
    // GET: Mostrar estacionamientos
    public function index()
    {
        if (!session()->has('estacionamientos')) {

            $estacionamientos = [
                [
                    'id' => 1,
                    'nombre' => 'Plaza Juárez',
                    'ubicacion' => 'Centro de Pachuca',
                    'precio' => 22,
                    'disponibles' => 4,
                    'total' => 10
                ],
                [
                    'id' => 2,
                    'nombre' => 'Universidad',
                    'ubicacion' => 'Zona UPP',
                    'precio' => 18,
                    'disponibles' => 8,
                    'total' => 15
                ],
                [
                    'id' => 3,
                    'nombre' => 'Estacionamiento Hidalgo',
                    'ubicacion' => 'Centro de Pachuca',
                    'precio' => 20,
                    'disponibles' => 6,
                    'total' => 12
                ],
                [
                    'id' => 4,
                    'nombre' => 'Campus Norte',
                    'ubicacion' => 'Norte de Pachuca',
                    'precio' => 15,
                    'disponibles' => 12,
                    'total' => 20
                ],
                [
                    'id' => 5,
                    'nombre' => 'Plaza Universidad',
                    'ubicacion' => 'Zona UPP',
                    'precio' => 25,
                    'disponibles' => 3,
                    'total' => 10
                ],
                [
                    'id' => 6,
                    'nombre' => 'Las Torres',
                    'ubicacion' => 'Norte de Pachuca',
                    'precio' => 17,
                    'disponibles' => 9,
                    'total' => 14
                ]
            ];

            session()->put('estacionamientos', $estacionamientos);
        }

        $estacionamientos = session()->get('estacionamientos');

        return view('mis-espacios', compact('estacionamientos'));
    }

    // PUT: Actualizar estacionamiento
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:150',
            'precio' => 'required|numeric|min:1',
            'disponibles' => 'required|integer|min:0',
            'total' => 'required|integer|min:1'
        ]);

        if ($datos['disponibles'] > $datos['total']) {
            return back()->withErrors([
                'disponibles' => 'Los espacios disponibles no pueden superar el total.'
            ])->withInput();
        }

        $estacionamientos = session()->get('estacionamientos', []);

        $encontrado = false;

        foreach ($estacionamientos as $indice => $estacionamiento) {

            if ($estacionamiento['id'] == $id) {

                $estacionamientos[$indice] = array_merge(
                    $estacionamiento,
                    $datos
                );

                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            return back()->with('error', 'Estacionamiento no encontrado.');
        }

        session()->put('estacionamientos', $estacionamientos);

        return redirect()
            ->route('estacionamientos.index')
            ->with('success', 'Estacionamiento actualizado correctamente.');
    }

    // DELETE: Eliminar estacionamiento
    public function destroy($id)
    {
        $estacionamientos = session()->get('estacionamientos', []);

        $estacionamientos = array_filter(
            $estacionamientos,
            function ($estacionamiento) use ($id) {
                return $estacionamiento['id'] != $id;
            }
        );

        session()->put('estacionamientos', array_values($estacionamientos));

        return redirect()
            ->route('estacionamientos.index')
            ->with('success', 'Estacionamiento eliminado correctamente.');
    }
}
