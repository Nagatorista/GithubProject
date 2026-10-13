<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('portfolio', [MainController::class, 'portfolio'])->name('portfolio');
Route::get('array', [MainController::class, 'array'])->name('array');
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
Route::get('alumno/edit', [AlumnoController::class, 'edit'])->name('alumno.edit');
Route::post('alumno', [AlumnoController::class, 'store'])->name('alumno.store');
Route::get('alumno', [AlumnoController::class, 'index'])->name('alumno.index');
Route::get('alumno/{alumno}', [AlumnoController::class, 'show'])->name('alumno.show');
Route::put('alumno', [AlumnoController::class, 'update'])->name('alumno.update');