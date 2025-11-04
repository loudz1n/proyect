@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Cursos</h1>
        <div class="flex gap-4">
            <a href="{{ route('facultades.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Ver Facultades
            </a>
            <a href="{{ route('cursos.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                + Nuevo Curso
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Imagen</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Código</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Facultad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Créditos</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Docente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($cursos as $curso)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        @if($curso->imagen)
                            <img src="{{ asset('storage/' . $curso->imagen) }}" alt="{{ $curso->nombre }}" class="w-16 h-16 object-cover rounded">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400 text-xs">Sin imagen</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $curso->codigo }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $curso->nombre }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $curso->facultad->nombre }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $curso->creditos }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $curso->docente }}</td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex gap-2">
                            <a href="{{ route('cursos.show', $curso) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                            <a href="{{ route('cursos.edit', $curso) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este curso?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">No hay cursos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $cursos->links() }}
    </div>
</div>
@endsection