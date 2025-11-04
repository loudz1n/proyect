<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    // IMPORTANTE: Especificar el nombre correcto de la tabla
    protected $table = 'facultades';

    protected $fillable = [
        'nombre',
        'decano',
        'telefono',
        'email',
        'imagen'
    ];

    // Relación: Una facultad tiene muchos cursos
    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}