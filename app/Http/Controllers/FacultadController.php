<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultadController extends Controller
{
    public function index()
    {
        $facultades = Facultad::withCount('cursos')->paginate(10);
        return view('facultades.index', compact('facultades'));
    }

    public function create()
    {
        return view('facultades.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'decano' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('facultades', 'public');
        }

        Facultad::create($validated);

        return redirect()->route('facultades.index')
            ->with('success', 'Facultad creada exitosamente.');
    }

    public function show(Facultad $facultad)
    {
        $facultad->load('cursos');
        return view('facultades.show', compact('facultad'));
    }

    public function edit(Facultad $facultad)
    {
        return view('facultades.edit', compact('facultad'));
    }

    public function update(Request $request, Facultad $facultad)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'decano' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            if ($facultad->imagen) {
                Storage::disk('public')->delete($facultad->imagen);
            }
            $validated['imagen'] = $request->file('imagen')->store('facultades', 'public');
        }

        $facultad->update($validated);

        return redirect()->route('facultades.index')
            ->with('success', 'Facultad actualizada exitosamente.');
    }

    public function destroy(Facultad $facultad)
    {
        if ($facultad->imagen) {
            Storage::disk('public')->delete($facultad->imagen);
        }
        
        $facultad->delete();

        return redirect()->route('facultades.index')
            ->with('success', 'Facultad eliminada exitosamente.');
    }
}