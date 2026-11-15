<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estacionamiento - AutoPark</title>
    <!-- Tailwind CSS CDN para mantener el diseño limpio -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <div class="max-w-xl mx-auto mt-12 p-6 bg-white rounded-xl shadow-md border border-gray-100">
        
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <h1 class="text-xl font-bold text-gray-800">Agregar Nuevo Estacionamiento</h1>
            <a href="{{ route('estacionamientos.index') }}" class="text-sm text-blue-600 hover:underline font-medium">
                &larr; Volver
            </a>
        </div>

        <!-- Mensajes de Error de Validación -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded">
                <p class="font-bold">Por favor corrige los siguientes errores:</p>
                <ul class="list-disc list-inside mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('estacionamientos.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Estacionamiento</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Plaza Central" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Ubicación -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación / Zona</label>
                <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ej. Zona Centro de Pachuca" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Precio por hora -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Precio por hora ($)</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="Ej. 20" min="1" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Espacios Disponibles -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Espacios Disponibles</label>
                    <input type="number" name="disponibles" value="{{ old('disponibles') }}" placeholder="Ej. 5" min="0" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Capacidad Total -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Capacidad Total</label>
                    <input type="number" name="total" value="{{ old('total') }}" placeholder="Ej. 10" min="1" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Botón de Envío -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-200 shadow-sm">
                    Guardar Estacionamiento
                </button>
            </div>
        </form>
    </div>

</body>
</html>