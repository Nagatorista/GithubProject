<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    public function index(): View
    {
        $profesores = Profesor::all();
        return view('profesor.index', ['profesores' => $profesores]);
    }

    public function create(): View
    {
        return view('profesor.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Profesor::create($request->all());
        return redirect()->route('profesor.index');
    }

    public function show(Profesor $profesor): View
    {
        return view('profesor.show', ['profesor' => $profesor]);
    }

    public function edit(Profesor $profesor): View
    {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    public function update(Request $request, Profesor $profesor): RedirectResponse
    {
        $profesor->update($request->all());
        return redirect()->route('profesor.index');
    }

    public function destroy(Profesor $profesor): RedirectResponse
    {
        $profesor->delete();
        return redirect()->route('profesor.index');
    }
}