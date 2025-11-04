<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\FacultadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cursos.index');
});

// Rutas para Facultades
Route::resource('facultades', FacultadController::class);

// Rutas para Cursos
Route::resource('cursos', CursoController::class);