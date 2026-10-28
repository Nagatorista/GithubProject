<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
    protected $table = 'profesores';

    protected $fillable = [
        'nombre',
        'apellidos',
        'especialidad',
        'falta',
        'salario',
    ];
}
