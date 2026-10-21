<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use \Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    private const RULES = [
        'nombre' => 'required|string|max:100|min:2',
        'apellidos' => 'required|string|max:130|min:3',
        'fnac' => 'nullable|date|before_or_equal:today',
        'genero' => 'nullable|in:masculino,femenino,otro',
        'nacceso' => 'nullable|numeric|gte:0|lte:10|decimal:0,2'
    ];
    private const MESSAGE = [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
        'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
        'apellidos.required' => 'Los apellidos son obligatorios.',
        'apellidos.min' => 'Los apellidos deben tener al menos 3 caracteres.',
        'apellidos.max' => 'Los apellidos no pueden superar los 130 caracteres.',
        'fnac.date' => 'La fecha de nacimiento no es válida.',
        'fnac.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        'genero.in' => 'El género seleccionado no es válido.',
        'nacceso.numeric' => 'La nota debe ser numérica.',
        'nacceso.gte' => 'La nota no puede ser menor que 0.',
        'nacceso.lte' => 'La nota no puede ser mayor que 10.',
        'nacceso.decimal' => 'La nota puede tener como máximo 2 decimales.',
    ];
    public function create(): View {
        //
        return view('alumno.create', []);
    }
    
    public function destroy(Alumno $alumno): RedirectResponse {
        try {
            $alumno->delet();
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Al borrar el Alumno']);
        }
        return redirect()->route('alumno.index')->with(['success' => 'Se ha borrado el Alumno correctamente']);
    }
        
    public function edit(Alumno $alumno): View {
        //
        return view('alumno.edit', []);
    }
    public function index(): View {
        //
        //$alumnos = 'select * from alumno';
        $alumnos = Alumno::all();
        //dd($alumnos);
        session()->forget('success');
        return view('alumno.index', ['alumnos' => $alumnos]);
    }
        
    public function show(Alumno $alumno): View {
        //dd($alumno);
        return view('alumno.show', ['alumno' => $alumno]);
    }
        
    /*public function store(Request $request): RedirectResponse {
        //
        return redirect()->route('index');
    }*/
    function store(Request $request): RedirectResponse {
        $rules= self::getRules();
        $messages= self::getMessages();
        $validator= Validator::make($request->all(), self::RULES, $messages);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        try {
            $alumno->save();
        } catch (UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada'
            ]);
        } catch (Exception $e) {
            echo ('global');
            dd($e);
        }
        return redirect()->route('alumno.index')->with(['success' => 'Se ha creado el Alumno correctamente']);
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse {
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        try {
            $alumno->update($validator->validated());
        } catch (UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada'
            ]);
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Al editar el Alumno']);
        }
        return redirect()->route('alumno.index');
    }

}