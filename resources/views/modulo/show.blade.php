@extends('template.base')

@section('css')
<link href="{{ asset('assets/style/show.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container my-5">
    <div class="row g-4">
        <div class="col-12 col-md-4">
            <div class="card text-center">
                <img src="{{ asset('fotos/1.png') }}" class="card-img-top" alt="Juan">
                <div class="card-body">
                    <h4 class="card-title">{{Carbon\Carbon::parse($alumno->fnac)->locale('es')->translatedFormat('J \d\e F \d\e Y')}}</h4>
                    <h4 class="card-title">{{ $alumno -> genero}}</h4>
                    <h4 class="card-title">{{ $alumno -> nacceso}}</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a> <!--Ruta previa-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection