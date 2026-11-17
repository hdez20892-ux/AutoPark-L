<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // ==========================================
    // MÉTODO AUXILIAR: PREPARAR DATOS DE LA VISTA
    // ==========================================

    private function datosVista($mostrarFormulario = false, $reservaEditar = null)
    {
        $reservas = session()->get('autopark_reservas', []);

        $activas = array_values(array_filter(
            $reservas,
            fn($reserva) => $reserva['estado'] === 'activa'
        ));

        $historial = array_values(array_filter(
            $reservas,
            fn($reserva) => $reserva['estado'] !== 'activa'
        ));

        $estacionamientos = session()->get('estacionamientos', []);

        return view('reservas', [
            'activas' => $activas,
            'historial' => $historial,
            'estacionamientos' => $estacionamientos,
            'mostrarFormulario' => $mostrarFormulario,
            'reservaEditar' => $reservaEditar
        ]);
    }

    // ==========================================
    // MÉTODO AUXILIAR: BUSCAR ESTACIONAMIENTO
    // ==========================================

    private function buscarEstacionamiento($id)
    {
        $estacionamientos = session()->get('estacionamientos', []);

        foreach ($estacionamientos as $estacionamiento) {
            if ((int) $estacionamiento['id'] === (int) $id) {
                return $estacionamiento;
            }
        }

        return null;
    }

   
    private function hayDisponibilidad(
        $estacionamiento,
        $fecha,
        $horaEntrada,
        $horaSalida,
        $reservas,
        $idExcluir = null
    ) {
        $reservasSimultaneas = 0;

        foreach ($reservas as $reserva) {

            // Ignorar reservas canceladas
            if ($reserva['estado'] !== 'activa') {
                continue;
            }

            // Ignorar la reserva que estamos editando
            if (
                $idExcluir !== null &&
                (int) $reserva['id'] === (int) $idExcluir
            ) {
                continue;
            }

           
            if (
                (int) $reserva['estacionamiento']['id'] !==
                (int) $estacionamiento['id'] ||

                $reserva['fecha'] !== $fecha
            ) {
                continue;
            }

            
            $seSuperponen =
                $reserva['horaEntrada'] < $horaSalida &&
                $reserva['horaSalida'] > $horaEntrada;

            if ($seSuperponen) {
                $reservasSimultaneas++;
            }
        }

       
        return $reservasSimultaneas < (int) $estacionamiento['disponibles'];
    }

    

    private function horaEnPasado($fecha, $horaEntrada)
    {
        if ($fecha < now()->toDateString()) {
            return true;
        }

        if (
            $fecha === now()->toDateString() &&
            $horaEntrada <= now()->format('H:i')
        ) {
            return true;
        }

        return false;
    }

 

    private function construirReserva($id, $estacionamiento, $datos)
    {
        $inicio = strtotime($datos['horaEntrada']);
        $fin = strtotime($datos['horaSalida']);

        $horas = ($fin - $inicio) / 3600;

        $total = round($estacionamiento['precio'] * $horas, 2);

        return [
            'id' => $id,

            'estacionamiento' => [
                'id' => $estacionamiento['id'],
                'nombre' => $estacionamiento['nombre'],
                'ubicacion' => $estacionamiento['ubicacion'],
                'precio' => $estacionamiento['precio']
            ],

            'fecha' => $datos['fecha'],
            'horaEntrada' => $datos['horaEntrada'],
            'horaSalida' => $datos['horaSalida'],
            'total' => $total,
            'estado' => 'activa'
        ];
    }

    

    public function index()
    {
        return $this->datosVista();
    }

   

    public function create()
    {
        return $this->datosVista(true);
    }

   

    public function store(Request $request)
    {
        $datos = $request->validate([
            'estacionamiento_id' => 'required|integer|min:1',
            'fecha' => 'required|date|after_or_equal:today',
            'horaEntrada' => 'required|date_format:H:i',
            'horaSalida' => 'required|date_format:H:i|after:horaEntrada'
        ]);

        // Comprobar que la hora no haya pasado
        if ($this->horaEnPasado($datos['fecha'], $datos['horaEntrada'])) {
            return back()
                ->withErrors([
                    'horaEntrada' => 'La hora de entrada debe ser posterior a la hora actual.'
                ])
                ->withInput();
        }

       
        $estacionamiento = $this->buscarEstacionamiento(
            $datos['estacionamiento_id']
        );

        if (!$estacionamiento) {
            return back()
                ->withErrors([
                    'estacionamiento_id' => 'El estacionamiento seleccionado no existe.'
                ])
                ->withInput();
        }

        $reservas = session()->get('autopark_reservas', []);

       
        if (!$this->hayDisponibilidad(
            $estacionamiento,
            $datos['fecha'],
            $datos['horaEntrada'],
            $datos['horaSalida'],
            $reservas
        )) {
            return back()
                ->withErrors([
                    'estacionamiento_id' =>
                        'No hay espacios disponibles para ese horario.'
                ])
                ->withInput();
        }

        
        $nuevoId = count($reservas) > 0
            ? max(array_column($reservas, 'id')) + 1
            : 1;

        
        $nuevaReserva = $this->construirReserva(
            $nuevoId,
            $estacionamiento,
            $datos
        );

        $reservas[] = $nuevaReserva;

        session()->put('autopark_reservas', $reservas);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva registrada correctamente.');
    }

   

    public function edit($id)
    {
        $reservas = session()->get('autopark_reservas', []);

        $reservaEditar = null;

        foreach ($reservas as $reserva) {
            if (
                (int) $reserva['id'] === (int) $id &&
                $reserva['estado'] === 'activa'
            ) {
                $reservaEditar = $reserva;
                break;
            }
        }

        if (!$reservaEditar) {
            return redirect()
                ->route('reservas.index')
                ->with('error', 'Reserva no encontrada.');
        }

        return $this->datosVista(true, $reservaEditar);
    }

   

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'estacionamiento_id' => 'required|integer|min:1',
            'fecha' => 'required|date|after_or_equal:today',
            'horaEntrada' => 'required|date_format:H:i',
            'horaSalida' => 'required|date_format:H:i|after:horaEntrada'
        ]);

        if ($this->horaEnPasado($datos['fecha'], $datos['horaEntrada'])) {
            return back()
                ->withErrors([
                    'horaEntrada' => 'La hora de entrada debe ser posterior a la hora actual.'
                ])
                ->withInput();
        }

        $reservas = session()->get('autopark_reservas', []);

        
        $indice = null;

        foreach ($reservas as $i => $reserva) {
            if (
                (int) $reserva['id'] === (int) $id &&
                $reserva['estado'] === 'activa'
            ) {
                $indice = $i;
                break;
            }
        }

        if ($indice === null) {
            return redirect()
                ->route('reservas.index')
                ->with('error', 'Reserva no encontrada.');
        }

        $estacionamiento = $this->buscarEstacionamiento(
            $datos['estacionamiento_id']
        );

        if (!$estacionamiento) {
            return back()
                ->withErrors([
                    'estacionamiento_id' => 'El estacionamiento seleccionado no existe.'
                ])
                ->withInput();
        }

       
        if (!$this->hayDisponibilidad(
            $estacionamiento,
            $datos['fecha'],
            $datos['horaEntrada'],
            $datos['horaSalida'],
            $reservas,
            $id
        )) {
            return back()
                ->withErrors([
                    'estacionamiento_id' =>
                        'No hay espacios disponibles para el nuevo horario.'
                ])
                ->withInput();
        }

      
        $reservaActualizada = $this->construirReserva(
            $id,
            $estacionamiento,
            $datos
        );

        
        $reservas[$indice] = array_merge(
            $reservas[$indice],
            $reservaActualizada
        );

        session()->put('autopark_reservas', $reservas);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva actualizada correctamente.');
    }

    

    public function cancel($id)
    {
        $reservas = session()->get('autopark_reservas', []);

        $encontrado = false;

        foreach ($reservas as $indice => $reserva) {

            if (
                (int) $reserva['id'] === (int) $id &&
                $reserva['estado'] === 'activa'
            ) {
                $reservas[$indice]['estado'] = 'cancelada';

                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            return redirect()
                ->route('reservas.index')
                ->with('error', 'Reserva no encontrada.');
        }

        session()->put('autopark_reservas', $reservas);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva cancelada correctamente.');
    }
}


