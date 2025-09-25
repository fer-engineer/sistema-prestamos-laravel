<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Sistema de Préstamos')  </title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome (para los iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Alpine.js (para la interactividad) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div class="main-container">
        <!-- =============================================================== -->
        <!-- =================== INICIO DEL MENÚ LATERAL =================== -->
        <!-- =============================================================== -->
        <aside class="sidebar">
            <!-- Encabezado con Logo -->
            <div class="sidebar-header">
                <i class="fas fa-rocket logo-icon"></i>
                <span class="logo-text">Sistema de Préstamos</span>
            </div>

            <!-- Navegación Principal -->
            <nav class="sidebar-nav" x-data="{ activeMenu: 'dashboard' }">
                <ul>
                    <!-- Dashboard -->
                    <li>
                        <a href="#" :class="{ 'active': activeMenu === 'dashboard' }">
                            <i class="fas fa-tachometer-alt menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Gestión de Equipos -->
                    <li x-data="{ open: activeMenu.startsWith('equipos') }">
                        <a href="#" @click.prevent="open = !open"
                           :class="{ 'active': activeMenu.startsWith('equipos') }" aria-expanded="open">
                            <i class="fas fa-laptop menu-icon"></i>
                            <span>Gestión de Equipos</span>
                            <i class="fas fa-chevron-right dropdown-icon"></i>
                        </a>
                        <ul class="submenu" x-show="open" x-transition>
                            <li><a href="/marcas/create"><i class="fas fa-plus-circle submenu-icon"></i> Agregar Equipo</a></li>
                            <li><a href="#"><i class="fas fa-list submenu-icon"></i> Listar Equipos</a></li>
                            <li><a href="#"><i class="fas fa-clipboard-check submenu-icon"></i> Estados de Equipos</a></li>
                        </ul>
                    </li>

                    <!-- Gestión de Usuarios -->
                    <li x-data="{ open: activeMenu.startsWith('usuarios') }">
                        <a href="#" @click.prevent="open = !open"
                           :class="{ 'active': activeMenu.startsWith('usuarios') }" aria-expanded="open">
                            <i class="fas fa-users menu-icon"></i>
                            <span>Gestión de Usuarios</span>
                            <i class="fas fa-chevron-right dropdown-icon"></i>
                        </a>
                        <ul class="submenu" x-show="open" x-transition>
                            <li><a href="#"><i class="fas fa-id-badge submenu-icon"></i> Empleados</a></li>
                            <li><a href="#"><i class="fas fa-user-tie submenu-icon"></i> Encargados</a></li>
                            <li><a href="#"><i class="fas fa-user-cog submenu-icon"></i> Tipos de Usuario</a></li>
                        </ul>
                    </li>

                    <!-- Gestión de Préstamos -->
                    <li x-data="{ open: activeMenu.startsWith('prestamos') }">
                        <a href="#" @click.prevent="open = !open"
                           :class="{ 'active': activeMenu.startsWith('prestamos') }" aria-expanded="open">
                            <i class="fas fa-handshake menu-icon"></i>
                            <span>Gestión de Préstamos</span>
                            <i class="fas fa-chevron-right dropdown-icon"></i>
                        </a>
                        <ul class="submenu" x-show="open" x-transition>
                            <li><a href="#"><i class="fas fa-plus submenu-icon"></i> Nuevo Préstamo</a></li>
                            <li><a href="#"><i class="fas fa-undo submenu-icon"></i> Devoluciones</a></li>
                            <li><a href="#"><i class="fas fa-history submenu-icon"></i> Historial</a></li>
                        </ul>
                    </li>

                    <!-- Marcas -->
                    <li x-data="{ open: activeMenu.startsWith('marcas') }">
                        <a href="#" @click.prevent="open = !open"
                           :class="{ 'active': activeMenu.startsWith('marcas') }" aria-expanded="open">
                            <i class="fas fa-tags menu-icon"></i>
                            <span>Marcas</span>
                            <i class="fas fa-chevron-right dropdown-icon"></i>
                        </a>
                        <ul class="submenu" x-show="open" x-transition>
                            <li><a href="#"><i class="fas fa-plus-circle submenu-icon"></i> Agregar Marca</a></li>
                            <li><a href="#"><i class="fas fa-list submenu-icon"></i> Listar Marcas</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- =============================================================== -->
        <!-- =================== INICIO CONTENIDO PRINCIPAL =================== -->
        <!-- =============================================================== -->
        <main class="main-content">
            <h1>Dashboard</h1>
            <p>Aquí iría el contenido principal de tu aplicación.</p>
            <div
                style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                @yield('content')
                Contenido de la página.
                <h5>hola</h5>
                <h5>hola</h5>
            
            </div>
        </main>
    </div>
</body>

</html>
