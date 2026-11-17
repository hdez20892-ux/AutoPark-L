
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis reservas - AutoPark</title>

    
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">

    
    <link rel="stylesheet"
        href="{{ asset('css/reservas.css') }}">
</head>

<body>

    
    @include('components.navbar')

    <main class="reservas-page">

        
        <header class="reservas-header">

            <h1>Mis reservas</h1>

            <p>
                Consulta y administra tus reservaciones
                de estacionamiento en AutoPark.
            </p>

        </header>



<div class="reservas-toolbar">

    <a href="{{ route('reservas.create') }}" class="btn-nueva-reserva">
        + Nueva reserva
    </a>

</div>



@if ($mostrarFormulario)

    <section class="formulario-reserva">

        <h2>
            {{ $reservaEditar ? 'Editar reserva' : 'Nueva reserva' }}
        </h2>

        <p>
            {{ $reservaEditar
                ? 'Modifica los datos de tu reservación.'
                : 'Completa los datos para reservar un espacio.' }}
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (count($estacionamientos) > 0)

            <form
        action="{{ $reservaEditar
        ? route('reservas.update', $reservaEditar['id'])
        : route('reservas.store') }}"
        method="POST">

         @csrf

        @if ($reservaEditar)
        @method('PUT')
        @endif

               
                <div class="campo-reserva">

                    <label for="estacionamiento_id">
                        Estacionamiento
                    </label>

                    <select
                        name="estacionamiento_id"
                        id="estacionamiento_id"
                        required>

                        <option value="">
                            Selecciona un estacionamiento
                        </option>

                        @foreach ($estacionamientos as $espacio)

                            <option
                                value="{{ $espacio['id'] }}"
                                data-precio="{{ $espacio['precio'] }}"
                                {{ old('estacionamiento_id', $reservaEditar['estacionamiento']['id'] ?? '') == $espacio['id'] ? 'selected' : '' }}
                                {{ $espacio['disponibles'] <= 0 ? 'disabled' : '' }}>

                                {{ $espacio['nombre'] }}
                                - {{ $espacio['ubicacion'] }}
                                - ${{ number_format($espacio['precio'], 2) }}/hora
                                ({{ $espacio['disponibles'] }} disponibles)

                            </option>

                        @endforeach

                    </select>

                </div>

                
                <div class="campo-reserva">

                    <label for="fecha">
                        Fecha de reserva
                    </label>

                    <input
                        type="date"
                        name="fecha"
                        id="fecha"
                        min="{{ date('Y-m-d') }}"
                        value="{{ old('fecha', $reservaEditar['fecha'] ?? '') }}"
                        required>

                </div>

                
                <div class="horarios-reserva">

                    <div class="campo-reserva">

                        <label for="horaEntrada">
                            Hora de entrada
                        </label>

                        <input
                            type="time"
                            name="horaEntrada"
                            id="horaEntrada"
                            value="{{ old('horaEntrada', $reservaEditar['horaEntrada'] ?? '') }}"
                            required>

                    </div>

                    <div class="campo-reserva">

                        <label for="horaSalida">
                            Hora de salida
                        </label>

                        <input
                            type="time"
                            name="horaSalida"
                            id="horaSalida"
                            value="{{ old('horaSalida', $reservaEditar['horaSalida'] ?? '') }}"
                            required>

                    </div>

                </div>

                
                <div class="precio-reserva">

                    <span>Precio estimado:</span>

                    <strong id="precioEstimado">
                        $0.00 MXN
                    </strong>

                </div>

                
                <div class="acciones-formulario">

                    <a href="{{ route('reservas.index') }}">
                        Cancelar
                    </a>
                    
                    <button type="submit">
                    {{ $reservaEditar ? 'Guardar cambios' : 'Confirmar reserva' }}
                    </button>
                    

                </div>

            </form>

        @else

            <div class="alert alert-warning">
                No hay estacionamientos disponibles para reservar.
                Visita Mis espacios para comprobar los registros existentes.
            </div>

        @endif

    </section>

@endif


       
        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        
        <section class="tabs" role="tablist">

            <button
                type="button"
                class="tab-button active"
                id="tabActivas"
                data-tab="activas"
                role="tab"
                aria-selected="true">

                Activas

            </button>

            <button
                type="button"
                class="tab-button"
                id="tabHistorial"
                data-tab="historial"
                role="tab"
                aria-selected="false">

                Historial

            </button>

        </section>

       
        <section
            class="reservas-panel"
            id="panelActivas"
            role="tabpanel">

            <div class="reservas-container">

                @forelse ($activas as $reserva)

                    <article class="reserva-card">

                        
                        <div class="reserva-image">
                            P
                        </div>

                        <!-- INFORMACIÓN -->
                        <div class="reserva-info">

                            <h2>
                                {{ $reserva['estacionamiento']['nombre'] }}
                            </h2>

                            <p>
                                Ubicación:
                                {{ $reserva['estacionamiento']['ubicacion'] }}
                            </p>

                            <p>
                                Fecha:
                                {{ \Carbon\Carbon::parse($reserva['fecha'])->format('d/m/Y') }}
                            </p>

                            <p>
                                Horario:
                                {{ $reserva['horaEntrada'] }}
                                -
                                {{ $reserva['horaSalida'] }}
                            </p>

                            <p>
                                Total:
                                ${{ number_format($reserva['total'], 2) }} MXN
                            </p>

                        </div>

                        <!-- ACCIONES -->
                        <div class="reserva-actions">

                            <a
                        href="{{ route('reservas.edit', $reserva['id']) }}"
                        class="btn-edit">

                            Editar

                            </a>

                            <span class="status-badge">
                                Confirmada
                            </span>

                            <form
                                action="{{ route('reservas.cancel', $reserva['id']) }}"
                                method="POST"
                                onsubmit="return confirm('¿Deseas cancelar esta reserva?')">

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="btn-cancel">

                                    Cancelar

                                </button>

                            </form>

                        </div>

                    </article>

                @empty

                    <div class="empty-state">

                        <h2>No tienes reservas activas</h2>

                        <p>
                            Cuando realices una reservación,
                            aparecerá aquí.
                        </p>

                    </div>

                @endforelse

            </div>

        </section>

        
        <section
            class="reservas-panel"
            id="panelHistorial"
            role="tabpanel"
            hidden>

            <div class="reservas-container">

                @forelse ($historial as $reserva)

                    <article class="reserva-card">

                        
                        <div class="reserva-image">
                            P
                        </div>

                       
                        <div class="reserva-info">

                            <h2>
                                {{ $reserva['estacionamiento']['nombre'] }}
                            </h2>

                            <p>
                                Ubicación:
                                {{ $reserva['estacionamiento']['ubicacion'] }}
                            </p>

                            <p>
                                Fecha:
                                {{ \Carbon\Carbon::parse($reserva['fecha'])->format('d/m/Y') }}
                            </p>

                            <p>
                                Horario:
                                {{ $reserva['horaEntrada'] }}
                                -
                                {{ $reserva['horaSalida'] }}
                            </p>

                            <p>
                                Total:
                                ${{ number_format($reserva['total'], 2) }} MXN
                            </p>

                        </div>

                       
                        <div class="reserva-actions">

                            <span class="status-badge {{ $reserva['estado'] }}">
                                {{ $reserva['estado'] === 'cancelada'
                                    ? 'Cancelada'
                                    : 'Finalizada' }}
                            </span>

                        </div>

                    </article>

                @empty

                    <div class="empty-state">

                        <h2>Tu historial está vacío</h2>

                        <p>
                            Aquí aparecerán tus reservas
                            canceladas o finalizadas.
                        </p>

                    </div>

                @endforelse

            </div>

        </section>

    </main>

    
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    
    <script src="{{ asset('js/reservas.js') }}"></script>

</body>
</html>

