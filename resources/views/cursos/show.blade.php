@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">{{ $curso->nombre }}</h2>
        <a href="{{ route('cursos.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Volver</a>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h3 class="text-xl font-bold mb-2">Facultad:</h3>
            <p class="text-gray-700">{{ $curso->facultad->nombre }}</p>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-2">Créditos:</h3>
            <p class="text-gray-700">{{ $curso->creditos }}</p>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-2">Docente:</h3>
            <p class="text-gray-700">{{ $curso->docente }}</p>
        </div>

        <div>
            <h3 class="text-xl font-bold mb-2">Horario:</h3>
            <p class="text-gray-700">{{ $curso->horario }}</p>
        </div>
    </div>
</div>
@endsection