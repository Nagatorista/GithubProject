<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alumno extends Model
{
    //Este es el modelo que corresponde a la migración de alumnos
    //El nombre del ORM de Laravel es Eloquent

    protected $table='alumno';
    protected $fillable=['bombre', 'apellidos', 'fnac', 'genero', 'nacceso'];

    public function matriculas(): HasMany{
        return $this->hasMany(Matricula::class);
    }
}
