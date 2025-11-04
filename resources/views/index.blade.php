@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold">Facultades</h2>
    <a href="{{ route('facultades.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Facultad</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($facultades as $facultad)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($facultad->imagen)
            <img src="{{ asset('storage/'.$facultad->imagen) }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                <span class="text-gray-500">Sin imagen</span>
            </div>
        @endif
        <div class="p-4">
            <h3 class="text-xl font-bold mb-2">{{ $facultad->nombre }}</h3>
            <p class="text-gray-600 mb-4">Decano: {{ $facultad->decano }}</p>
            <div class="flex space-x-2">
                <a href="{{ route('facultades.show', $facultad) }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Ver</a>
                <a href="{{ route('facultades.edit', $facultad) }}" class="bg-yellow-600 text-white px-3 py-1 rounded hover:bg-yellow-700">Editar</a>
                <form action="{{ route('facultades.destroy', $facultad) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="return confirm('¿Está seguro?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection