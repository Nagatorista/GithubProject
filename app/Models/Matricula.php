<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table='matricula';
    protected $fillable = [
        'alumno_id',
        'curso',
        'modulo_id',
        'nota',
    ];
}
