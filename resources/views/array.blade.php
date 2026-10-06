@section('content')
    <div class="container d-flex align-items-center flex flex-column">
        <h1>Listado de alumnos</h1>
        <h2>{{ $grupo }}</h2>
    </div>
@endsection
@section('after-content')
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
                @foreach ($alumnos as alumno)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="..." />
                        <br>{{$alumno}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection