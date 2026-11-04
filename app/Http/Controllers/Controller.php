<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

abstract class Controller
{
    public function getCurso(): int
    {
        if (Carbon::now()->month >= 9) {
            return Carbon::now()->year;
        } else {
            return Carbon::now()->year - 1;
        }
    }

    public function getCursoEscolar(): string
    {
        return $this->getCurso() . '/' . ($this->getCurso() + 1);
    }
}
