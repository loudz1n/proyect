<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cursos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-800">Sistema de Cursos</h1>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('cursos.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('cursos.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                        Cursos
                    </a>
                    <a href="{{ route('facultades.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('facultades.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                        Facultades
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-8">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <p class="text-center text-gray-600 text-sm">
                © {{ date('Y') }} Sistema de Gestión de Cursos Universitarios
            </p>
        </div>
    </footer>
</body>
</html>