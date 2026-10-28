<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Modulo;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatriculaController extends Controller
{

    private const MESSAGES = [
        'alumno_id.required' => 'El alumno es obligatorio.',
        'alumno_id.numeric' => 'El alumno no se ha seleccionado bien.',
        'alumno.exists' => 'El alumno no existe.',
        'modulo_id.required' => 'El módulo es obligatorio.',
        'modulo_id.numeric' => 'El modulo no se ha seleccionado bien.',
        'modulo.exists' => 'El modulo no existe.',
    ];

    private const RULES = [
        'alumno_id' => 'required|numeric|exists:alumno,id',
        'modulo_id' => 'required|numeric|exists:modulo,id'
    ];

    private function getCurso(): int
    {
        if (Carbon::now()->month >= 9) {
            return Carbon::now()->year;
        } else {
            return Carbon__::now()->year - 1;
        }
    }

    private function getCursoEscolar(): string
    {
        return $this->getCurso() . '/' . $this->getCurso() + 1;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista = [
            'uno' => 121,
            121 => 'dos',
            'tres' => 'cuatro'
        ];
        var_dump($lista);
        echo '<pre>' . var_export($lista, true) . '</pre>';
        foreach ($lista as $elemento) {
            echo $elemento . '<br>';
        }
        foreach ($lista as $indice => $elemento) {
            echo $elemento . ' está en la posición ' . $indice . '<br>';
        }
        dd($lista);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('matricula.create', [
            'alumnos' => Alumno::orderBy('apellidos')->orderBy('nombre')->get(),
            'curso_escolar' => $this->getCursoEscolar(),
            'modulos' => modulo::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $matricula = new Matricula(request->all());
        $matricula->curso = $this->getCurso();
        try {
            $matricula->save();
            return redirect()->route('matricula.create')->with(['success' => 'Se ha matriculado correctamente']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al matricular'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}