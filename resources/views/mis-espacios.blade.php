<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AutoPark | Mis espacios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&family=Roboto+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/espacios.css') }}">

    <style>
        :root {
            --morado: #6842a6;
            --morado-oscuro: #523184;
            --fondo: #f8f9fc;
            --gris: #667085;
            --borde: #e4e7ec;
            --blanco: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: var(--fondo);
            color: #202124;
            margin: 0;
        }

        .main-container {
            max-width: 1200px;
            padding-top: 35px;
            padding-bottom: 60px;
        }

        /* ENCABEZADO */

        .page-header {
            margin-bottom: 35px;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #252136;
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--gris);
            margin: 0;
        }

        /* ALERTAS */

        .alert {
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 20px;
        }

        /* RESULTADOS */

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 25px;
        }

        .results-title h2 {
            font-size: 1.45rem;
            font-weight: 800;
            color: #252136;
            margin-bottom: 6px;
        }

        .results-title p {
            color: var(--gris);
            margin: 0;
        }

        .results-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .available-badge {
            background: #eee8f8;
            color: var(--morado);
            padding: 9px 15px;
            border-radius: 30px;
            font-size: .85rem;
            font-weight: 700;
            white-space: nowrap;
        }

        /* BOTÓN AGREGAR */

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 11px 20px;
            background: var(--morado);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: .95rem;
            border: 1px solid var(--morado);
            transition: all .2s ease;
        }

        .btn-add:hover {
            background: var(--morado-oscuro);
            color: white;
            transform: translateY(-2px);
        }

        .add-icon {
            font-size: 21px;
            line-height: 1;
        }

        /* TARJETAS */

        .parking-card {
            background: var(--blanco);
            border: 1px solid var(--borde);
            border-radius: 16px;
            padding: 22px;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 3px 12px rgba(16, 24, 40, .04);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .parking-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(16, 24, 40, .08);
        }

        /* CONTENEDOR DEL LOGO */

        .parking-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
            min-width: 0;
        }

        .parking-card .parking-top .parking-icon {
            width: 55px !important;
            height: 55px !important;
            min-width: 55px !important;
            max-width: 55px !important;
            min-height: 55px !important;
            max-height: 55px !important;
            flex: 0 0 55px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            padding: 8px !important;
            margin: 0 !important;
            overflow: hidden !important;

            background: #f1ecf9;
            border-radius: 13px;
            position: relative;
        }

        /* TAMAÑO FORZADO DE LA IMAGEN */

        .parking-card .parking-top .parking-icon img {
            width: 30px !important;
            height: 30px !important;

            min-width: 30px !important;
            max-width: 30px !important;

            min-height: 30px !important;
            max-height: 30px !important;

            object-fit: contain !important;
            display: block !important;

            margin: 0 !important;
            padding: 0 !important;

            position: static !important;
            transform: none !important;
        }

        .parking-info {
            min-width: 0;
            flex: 1;
            overflow-wrap: anywhere;
        }

        .parking-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: #252136;
            margin: 0 0 5px;
            overflow-wrap: anywhere;
        }

        .parking-location {
            color: var(--gris);
            font-size: .85rem;
            margin: 0;
            overflow-wrap: anywhere;
        }

        /* DETALLES */

        .parking-details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            padding: 17px 0;
            border-top: 1px solid var(--borde);
            border-bottom: 1px solid var(--borde);
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
            min-width: 0;
        }

        .detail-label {
            color: var(--gris);
            font-size: .78rem;
        }

        .detail-value {
            color: #252136;
            font-size: .95rem;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        /* BOTONES DE ACCIONES */

        .parking-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .parking-actions form {
            margin: 0;
        }

        .parking-actions .btn {
            border-radius: 9px;
            padding: 9px 17px;
            font-weight: 700;
            font-size: .85rem;
        }

        .btn-edit {
            background: #475467;
            border-color: #475467;
            color: white;
        }

        .btn-edit:hover {
            background: #344054;
            border-color: #344054;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #bb2d3b;
            border-color: #bb2d3b;
            color: white;
        }

        /* FORMULARIO DE EDICIÓN */

        .edit-form {
            margin-top: 20px;
            padding: 18px;
            background: #f8f7fb;
            border: 1px solid var(--borde);
            border-radius: 12px;
            width: 100%;
        }

        .edit-form[hidden] {
            display: none !important;
        }

        .edit-form h5 {
            font-weight: 800;
            font-size: 1rem;
            margin-bottom: 18px;
            color: #252136;
        }

        .edit-form .form-label {
            font-weight: 700;
            font-size: .85rem;
        }

        .edit-form .form-control {
            border-radius: 8px;
            padding: 10px 12px;
        }

        .edit-form .form-control:focus {
            border-color: var(--morado);
            box-shadow: 0 0 0 .2rem rgba(104, 66, 166, .12);
        }

        /* SIN RESULTADOS */

        .no-results {
            background: white;
            border: 1px dashed #d0c5e3;
            border-radius: 16px;
            padding: 55px 20px;
            text-align: center;
        }

        .no-results-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .no-results h3 {
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .no-results p {
            color: var(--gris);
            margin-bottom: 20px;
        }

        /* TABLETS */

        @media (max-width: 768px) {
            .main-container {
                padding-top: 25px;
                padding-left: 18px;
                padding-right: 18px;
            }

            .page-header h1 {
                font-size: 1.7rem;
            }

            .results-header {
                align-items: flex-start;
            }

            .results-actions {
                width: 100%;
                justify-content: space-between;
            }

            .parking-card {
                padding: 18px;
            }
        }

        /* CELULARES */

        @media (max-width: 480px) {
            .main-container {
                padding: 22px 14px 40px;
            }

            .page-header {
                margin-bottom: 25px;
            }

            .page-header h1 {
                font-size: 1.55rem;
            }

            .results-title h2 {
                font-size: 1.2rem;
            }

            .results-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .results-actions .available-badge {
                align-self: flex-start;
            }

            .btn-add {
                width: 100%;
                padding: 12px;
            }

            .parking-card {
                padding: 17px;
            }

            .parking-actions {
                flex-direction: column;
            }

            .parking-actions .btn,
            .parking-actions form,
            .parking-actions form .btn {
                width: 100%;
            }

            .edit-form {
                padding: 14px;
            }

            .edit-form .d-flex {
                flex-direction: column;
            }

            .edit-form .btn {
                width: 100%;
            }

            .no-results {
                padding: 40px 15px;
            }
        }
    </style>
</head>

<body>

    @include('components.navbar')

    <main class="container main-container">

        <!-- ENCABEZADO -->

        <header class="page-header">
            <h1>Mis espacios</h1>
            <p>Administra tus estacionamientos publicados en AutoPark.</p>
        </header>

        <!-- MENSAJES -->

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

        <!-- ENCABEZADO DE RESULTADOS -->

        <div class="results-header">

            <div class="results-title">
                <h2>Estacionamientos publicados</h2>
                <p>Administra la información de tus espacios.</p>
            </div>

            <div class="results-actions">

                <span class="available-badge">
                    {{ count($estacionamientos) }} espacios
                </span>

                <a href="{{ route('estacionamientos.create') }}" class="btn-add">
                    <span class="add-icon">+</span>
                    Agregar espacio
                </a>

            </div>

        </div>

        <!-- LISTADO -->

        <div class="row g-4">

            @forelse($estacionamientos as $estacionamiento)
                <div class="col-12 col-md-6 col-lg-4">

                    <article class="parking-card">

                        <!-- INFORMACIÓN PRINCIPAL -->

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

                        <!-- DETALLES -->

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

                        <!-- ACCIONES -->

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

                        <!-- FORMULARIO DE EDICIÓN -->

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

                        <a href="{{ route('estacionamientos.create') }}" class="btn-add">
                            <span class="add-icon">+</span>
                            Agregar mi primer espacio
                        </a>

                    </div>

                </div>
            @endforelse

        </div>

    </main>

    <!-- JAVASCRIPT -->

    <script>
        function mostrarEdicion(id) {
            const formulario = document.getElementById('editar-' + id);

            if (formulario) {
                formulario.hidden = false;

                formulario.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
            }
        }

        function ocultarEdicion(id) {
            const formulario = document.getElementById('editar-' + id);

            if (formulario) {
                formulario.hidden = true;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
