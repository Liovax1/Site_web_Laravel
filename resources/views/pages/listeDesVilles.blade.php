@extends('layouts.default')
@section('content')

<br>
<div>
    <h1 class="text-center">Liste des Villes</h1>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($villes as $ville)
        <div class="col-md-5 mb-4">
            <div class="card shadow h-100 ">
                <div class="card-body">
                    <h4 class="text-center">{{ $ville->nom }}</h4>
                    <p class="text-center"><strong>Nombre de Parking : {{ $ville->nombre_total_parkings }}</strong></p>
                    <a class="btn btn-primary d-flex" href="{{ route('listeDesParkings', ['id' => $ville->id]) }}">
                        <h2 class="btn text-white mb-0">
                        Voir les Parkings
                        </h2>
                    </a>
                    <hr>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop
