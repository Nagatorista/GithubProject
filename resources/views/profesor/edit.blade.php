@extends('template.base')

@section('content')
<div class="container my-4">
    <h2>Editar Profesor</h2>
    <form action="{{ route('profesor.update', $profesor) }}" method="post">
        @csrf
        @method('put')
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $profesor->nombre }}" required maxlength="100">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $profesor->apellidos }}" required maxlength="130">
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ $profesor->especialidad }}" required maxlength="100">
        </div>
        <div class="mb-3">
            <label for="falta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="falta" name="falta" value="{{ $profesor->falta }}" required>
        </div>
        <div class="mb-3">
            <label for="salario" class="form-label">Salario (€)</label>
            <input type="number" class="form-control" id="salario" name="salario" value="{{ $profesor->salario }}" step="0.01" min="0" required>
        </div>
        <button type="submit" class="btn btn-secondary">Actualizar Profesor</button>
    </form>
</div>
@endsection