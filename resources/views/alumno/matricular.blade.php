@extends('template.base')

@section('content')
<h1>Matricular</h1>
<h1>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1>
<hr>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <table class="table table-hover">
                    @foreach ($modulo as $id => $nombre)
                        <option value="{{ $id }}" @selected(old('modulo_id') == $id)>{{ $nombre }}</option>
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value="" name="" @if($modulo->id==2) checked @endif>
                            </td>
                            <td>{{ $modulo->nombre }}</td>
                            <td>{{ $modulo->abreviatura }}</td>
                            <td>{{ $modulo->horas }}</td>
                            <td>{{ $modulo->creditos }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
<hr>
<div class="container my-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>Curso escolar: {{ $curso_escolar ?? 'sin definir' }}</h2>
                <form action="{{ route('matricula.make', $alumno) }}" method="post">
                    @csrf
                    <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                    <div class="mb-3">
                        <label for="modulo_id" class="form-label">Modulo en el que se matricula</label>
                        <select name="modulo_id" id="modulo_id" class="form-select" required>
                            <option value="" @selected(old('modulo_id') == null)>Selecciona una asignatura</option>
                            @foreach ($modulos as $id => $nombre)
                                <option value="{{ $id }}" @selected(old('modulo_id') == $id)>{{ $nombre }}</option>
                            @endforeach
                        </select>
                        @error('modulo_id')
                            <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-secondary" type="submit">Matricular</button>
                </form>
            </div>
        </div>
    </div>
@endsection