@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Crear Nueva Facultad</h1>
        <a href="{{ route('facultades.index') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">← Volver a la lista</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('facultades.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre de la Facultad *</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('nombre') border-red-500 @enderror" required>
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="decano" class="block text-sm font-medium text-gray-700 mb-2">Decano *</label>
                    <input type="text" name="decano" id="decano" value="{{ old('decano') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('decano') border-red-500 @enderror" required>
                    @error('decano')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('telefono') border-red-500 @enderror">
                    @error('telefono')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">Logo de la Facultad</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('imagen') border-red-500 @enderror">
                @error('imagen')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Formatos permitidos: JPG, PNG, GIF. Máximo 2MB.</p>
            </div>

            <div class="mt-6 flex gap-4">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg">
                    Guardar Facultad
                </button>
                <a href="{{ route('facultades.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection