@extends('template.base')

@section('content')
<div class="container my-5">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card text-center p-4">
                <div class="card-body">
                    <h5 class="text-muted mb-3"">{{ $profesor->nombre }} {{ $profesor->apellidos }}</h5>
                    <h5 class="text-muted mb-3">Especialidad: {{ $profesor->especialidad }}</h5>
                    <h5 class="text-muted mb-3"><strong>Fecha de alta:</strong> {{ \Carbon\Carbon::parse($profesor->falta)->locale('es')->translatedFormat('d \d\e F \d\e Y') }}</h5>
                    <h5 class="text-muted mb-3"><strong>Salario:</strong> {{ number_format($profesor->salario, 2) }} €</h5>
                    <a href="{{ route('profesor.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection