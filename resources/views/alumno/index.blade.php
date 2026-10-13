@extends('template.base')
@section('content')
<div class="container">
    <div class=row>
        <div class="col-md-6 mx-auto">
            <table class="table table-hover">
                @foreach($alumnos to $alumno)
                <tr>
                    <td>{{$alumno->id}}</td>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->apellidos}}</td>
                    <td>{{$alumno->nacceso}}</td>
                    <td>{{$alumno->genero}}</td>
                    <td>{{$alumno->fnac}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection