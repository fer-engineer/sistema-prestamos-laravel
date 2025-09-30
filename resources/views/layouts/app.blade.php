<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alertas.js') }}" defer></script>
</head>
<body class="bg-gray-100 flex min-h-screen font-sans">

    <!-- Menú lateral -->
    <aside class="w-64 bg-white shadow-lg fixed inset-y-0 left-0 flex flex-col h-screen">
        <div class="p-6 flex-shrink-0">
            <h2 class="text-3xl font-bold text-blue-600 mb-10">Préstamo Equipos</h2>
        </div>

        <!-- Menú con scroll -->
        <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">📊</span>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('estados.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">📌</span>
                <span class="font-medium">Estados</span>
            </a>

            <a href="{{ route('tipos_usuario.index')}}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">🛡️</span>
                <span class="font-medium">Roles / Tipos</span>
            </a>

            <a href="{{ route('marcas.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">🏷️</span>
                <span class="font-medium">Marcas</span>
            </a>

            <a href="{{ route('empleado.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">👥</span>
                <span class="font-medium">Empleados</span>
            </a>

            <a href="{{ route('detalle_docente.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">👨‍🏫</span>
                <span class="font-medium"> Docentes</span>
            </a>

            <a href="{{ route('detalle_estudiante.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">🧑‍🎓</span>
                <span class="font-medium">Estudiantes</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">🧑‍💼</span>
                <span class="font-medium">Encargados</span>
            </a>

            <a href="{{ route('equipo.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">🎥</span>
                <span class="font-medium">Equipos</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <span class="text-xl mr-3">📄</span>
                <span class="font-medium">Préstamos</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t flex-shrink-0">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center w-full px-4 py-2 text-gray-600 hover:bg-red-100 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
            <span class="text-xl mr-3">🚪</span>
            <span class="font-medium">Cerrar sesión</span>
        </button>
    </form>
</div>

    </aside>

    <!-- Contenido principal -->
    <main class="ml-64 flex-1 p-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Bienvenido</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @yield('content')
    </main>

</body>
</html>