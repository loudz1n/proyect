@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Crear Nuevo Curso</h1>
        <a href="{{ route('cursos.index') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">← Volver a la lista</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Curso *</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('nombre') border-red-500 @enderror" required>
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="codigo" class="block text-sm font-medium text-gray-700 mb-2">Código del Curso *</label>
                    <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('codigo') border-red-500 @enderror" required>
                    @error('codigo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="creditos" class="block text-sm font-medium text-gray-700 mb-2">Créditos *</label>
                    <input type="number" name="creditos" id="creditos" value="{{ old('creditos') }}" min="1" max="10"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('creditos') border-red-500 @enderror" required>
                    @error('creditos')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="facultad_id" class="block text-sm font-medium text-gray-700 mb-2">Facultad *</label>
                    <select name="facultad_id" id="facultad_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('facultad_id') border-red-500 @enderror" required>
                        <option value="">Seleccione una facultad</option>
                        @foreach($facultades as $facultad)
                            <option value="{{ $facultad->id }}" {{ old('facultad_id') == $facultad->id ? 'selected' : '' }}>
                                {{ $facultad->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('facultad_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="docente" class="block text-sm font-medium text-gray-700 mb-2">Docente *</label>
                    <input type="text" name="docente" id="docente" value="{{ old('docente') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('docente') border-red-500 @enderror" required>
                    @error('docente')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="horario" class="block text-sm font-medium text-gray-700 mb-2">Horario *</label>
                    <input type="text" name="horario" id="horario" value="{{ old('horario') }}" placeholder="Ej: Lun-Mie 8:00-10:00"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('horario') border-red-500 @enderror" required>
                    @error('horario')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">Imagen del Curso *</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('imagen') border-red-500 @enderror" required>
                @error('imagen')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Formatos permitidos: JPG, PNG, GIF. Máximo 2MB.</p>
            </div>

            <div class="mt-6 flex gap-4">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg">
                    Guardar Curso
                </button>
                <a href="{{ route('cursos.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection