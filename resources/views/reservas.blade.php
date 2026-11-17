<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis reservas - AutoPark</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">

    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('components/navbar/navbar.css') }}">

    <!-- Estilos de reservas -->
    <link rel="stylesheet" href="{{ asset('css/reservas.css') }}">
</head>

<body>

    <div id="navbar"></div>

    <main class="reservas-page">

        <header class="reservas-header">
            <h1>Mis reservas</h1>
            <p>Consulta tus reservas activas y tu historial.</p>
        </header>

        <ul class="nav nav-tabs tabs" role="tablist" aria-label="Filtros de reservas">
            <li class="nav-item" role="presentation">
                <button type="button" class="nav-link tab-button active" data-tab="activas" role="tab"
                    aria-selected="true">
                    Activas
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button type="button" class="nav-link tab-button" data-tab="historial" role="tab"
                    aria-selected="false">
                    Historial
                </button>
            </li>
        </ul>

        <section id="reservasContainer" class="reservas-container"></section>

        <div id="emptyState" class="empty-state hidden">
            <h2>No hay reservas</h2>
            <p>Aquí aparecerán tus reservas cuando realices una.</p>
        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Cargar navbar -->
    <script>
        fetch("{{ asset('components/navbar/navbar.html') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error("No se pudo cargar el navbar");
                }

                return response.text();
            })
            .then(data => {
                document.getElementById("navbar").innerHTML = data;

                const script = document.createElement("script");
                script.src = "{{ asset('components/navbar/navbar.js') }}";
                document.body.appendChild(script);
            })
            .catch(error => {
                console.error("Error al cargar el navbar:", error);
            });
    </script>

    <!-- JavaScript de reservas -->
    <script src="{{ asset('js/reservas.js') }}"></script>

</body>

</html>
