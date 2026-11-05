<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AutoPark | Mis espacios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&family=Roboto+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/espacios.css') }}">

    <style>
        .parking-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .btn-edit {
            background: #475467;
            border-color: #475467;
            color: white;
        }

        .btn-edit:hover {
            background: #344054;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #bb2d3b;
            color: white;
        }

        .edit-form {
            margin-top: 20px;
            padding: 18px;
            background: var(--gris-fondo);
            border: 1px solid var(--gris-borde);
            border-radius: 12px;
        }

        .edit-form[hidden] {
            display: none !important;
        }

        .edit-form h5 {
            font-weight: 700;
            margin-bottom: 18px;
        }

        .alert {
            border-radius: 12px;
        }

        .parking-actions form {
            margin: 0;
        }
    </style>
</head>

<body>

    @include('components.navbar')

    <main class="container main-container">

        <header class="page-header">
            <h1>Mis espacios</h1>
            <p>Administra tus estacionamientos publicados en AutoPark.</p>
        </header>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Revisa los siguientes datos:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="results-header">
            <div>
                <h2>Estacionamientos publicados</h2>
                <p>Administra la información de tus espacios.</p>
            </div>

            <span class="available-badge">
                {{ count($estacionamientos) }} espacios
            </span>
        </div>

        <div class="row g-4">

            @forelse($estacionamientos as $estacionamiento)
                <div class="col-12 col-md-6 col-lg-4">

                    <article class="parking-card">

                        <div class="parking-top">

                            <div class="parking-icon">
                                <img src="{{ asset('assets/images/logo-autopark.png') }}" alt="AutoPark">
                            </div>

                            <div class="parking-info">

                                <h3 class="parking-name">
                                    {{ $estacionamiento['nombre'] }}
                                </h3>

                                <p class="parking-location">
                                    {{ $estacionamiento['ubicacion'] }}
                                </p>

                            </div>

                        </div>

                        <div class="parking-details">

                            <div class="detail-item">
                                <span class="detail-label">Precio por hora</span>
                                <span class="detail-value">
                                    ${{ number_format($estacionamiento['precio'], 2) }}
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Disponibles</span>
                                <span class="detail-value">
                                    {{ $estacionamiento['disponibles'] }}
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Capacidad total</span>
                                <span class="detail-value">
                                    {{ $estacionamiento['total'] }}
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Identificador</span>
                                <span class="detail-value">
                                    #{{ $estacionamiento['id'] }}
                                </span>
                            </div>

                        </div>

                        <div class="parking-actions">

                            <button type="button" class="btn btn-edit"
                                onclick="mostrarEdicion({{ $estacionamiento['id'] }})">
                                Editar
                            </button>

                            <form action="{{ route('estacionamientos.destroy', $estacionamiento['id']) }}"
                                method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar este estacionamiento?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-delete">
                                    Eliminar
                                </button>
                            </form>

                        </div>

                        <form id="editar-{{ $estacionamiento['id'] }}" class="edit-form"
                            action="{{ route('estacionamientos.update', $estacionamiento['id']) }}" method="POST"
                            hidden>

                            @csrf
                            @method('PUT')

                            <h5>Editar estacionamiento</h5>

                            <div class="mb-3">
                                <label class="form-label">Nombre</label>

                                <input type="text" name="nombre" class="form-control"
                                    value="{{ $estacionamiento['nombre'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ubicación</label>

                                <input type="text" name="ubicacion" class="form-control"
                                    value="{{ $estacionamiento['ubicacion'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Precio por hora</label>

                                <input type="number" name="precio" class="form-control" min="1" step="0.01"
                                    value="{{ $estacionamiento['precio'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Espacios disponibles</label>

                                <input type="number" name="disponibles" class="form-control" min="0"
                                    value="{{ $estacionamiento['disponibles'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Capacidad total</label>

                                <input type="number" name="total" class="form-control" min="1"
                                    value="{{ $estacionamiento['total'] }}" required>
                            </div>

                            <div class="d-flex gap-2 flex-wrap">

                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>

                                <button type="button" class="btn btn-secondary"
                                    onclick="ocultarEdicion({{ $estacionamiento['id'] }})">
                                    Cancelar
                                </button>

                            </div>

                        </form>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="no-results">
                        <div class="no-results-icon">🚗</div>

                        <h3>No tienes estacionamientos</h3>

                        <p>No hay espacios publicados para administrar.</p>
                    </div>

                </div>
            @endforelse

        </div>

    </main>

    <script>
        function mostrarEdicion(id) {
            document.getElementById('editar-' + id).hidden = false;
        }

        function ocultarEdicion(id) {
            document.getElementById('editar-' + id).hidden = true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
