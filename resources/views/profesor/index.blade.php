@extends('template.base')

@section('before-content')
<div class="container my-3">
    <a href="{{ route('profesor.create') }}" class="btn btn-secondary">Crear Profesor</a>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Especialidad</th>
                        <th>Fecha de Alta</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor->id }}</td>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->apellidos }}</td>
                        <td>{{ $profesor->especialidad }}</td>
                        <td>{{ \Carbon\Carbon::parse($profesor->falta)->locale('es')->translatedFormat('d/m/Y') }}</td>
                        <td>{{ number_format($profesor->salario, 2) }} €</td>
                        <td>
                            <a href="{{ route('profesor.show', $profesor) }}" class="btn btn-secondary btn-sm">View</a>
                            <a href="{{ route('profesor.edit', $profesor) }}" class="btn btn-secondary btn-sm">Edit</a>
                            
                            <form action="{{ route('profesor.destroy', $profesor) }}" method="post" class="d-inline confirm-dialog" data-message="{{ $profesor->nombre }} {{ $profesor->apellidos }}">
                                @csrf
                                @method('delete')
                                <input class="btn btn-secondary btn-sm" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.querySelectorAll('form.confirm-dialog').forEach(form => {
    form.addEventListener('submit', e => {
        const message = "¿Seguro que quieres borrar al profesor " + form.dataset.message + "?";
        if (!confirm(message)) {
            e.preventDefault();
        }
    });
});
</script>
@endsection