@extends('template.base')

@section('content')
<div class="container my-4">
    <h2>Alta de Profesor</h2>
    <form action="{{ route('profesor.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="100" placeholder="Nombre del profesor">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required maxlength="130" placeholder="Apellidos del profesor">
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" class="form-control" id="especialidad" name="especialidad" required maxlength="100" placeholder="Especialidad">
        </div>
        <div class="mb-3">
            <label for="falta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="falta" name="falta" required>
        </div>
        <div class="mb-3">
            <label for="salario" class="form-label">Salario (€)</label>
            <input type="number" class="form-control" id="salario" name="salario" step="0.01" min="0" required placeholder="Ej: 2100.50">
        </div>
        <button type="submit" class="btn btn-secondary">Crear Profesor</button>
    </form>
</div>
@endsection