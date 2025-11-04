<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('facultad')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $facultades = Facultad::all();
        return view('cursos.create', compact('facultades'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|unique:cursos,codigo|max:20',
            'creditos' => 'required|integer|min:1|max:10',
            'facultad_id' => 'required|exists:facultades,id',
            'docente' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('cursos', 'public');
        }

        Curso::create($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso creado exitosamente.');
    }

    public function show(Curso $curso)
    {
        $curso->load('facultad');
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $facultades = Facultad::all();
        return view('cursos.edit', compact('curso', 'facultades'));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:20|unique:cursos,codigo,' . $curso->id,
            'creditos' => 'required|integer|min:1|max:10',
            'facultad_id' => 'required|exists:facultades,id',
            'docente' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            if ($curso->imagen) {
                Storage::disk('public')->delete($curso->imagen);
            }
            $validated['imagen'] = $request->file('imagen')->store('cursos', 'public');
        }

        $curso->update($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado exitosamente.');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->imagen) {
            Storage::disk('public')->delete($curso->imagen);
        }
        
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado exitosamente.');
    }
}