<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional, Laravel lo detecta automáticamente como 'cursos')
    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'codigo',
        'creditos',
        'facultad_id',
        'docente',
        'horario',
        'descripcion',
        'imagen'
    ];

    // Relación: Un curso pertenece a una facultad
    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }
}