<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex w-full max-w-3xl">
        
        <!-- Imagen lateral izquierda -->
        <div class="w-1/2 hidden md:block">
            <img src="img/logo-sistema.jpg" 
                 alt="Login Imagen" 
                 class="h-full w-full object-cover">
        </div>

        <!-- Formulario a la derecha -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Iniciar Sesión</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Único formulario -->
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Usuario</label>
                    <input type="text" name="usuario" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Ingresar
                </button>
            </form>
        </div>

    </div>

</body>
</html>
