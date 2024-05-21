@extends('layouts.default')
@section('content')

<br>
<div>
    <h1 class="text-center">Liste des Parkings de {{ $ville->nom }}</h1>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($parkings as $parking)
        <div class="col-md-5 mb-4">
            <div class="card shadow h-100 ">
                <div class="card-body">
                    <h4 class="text-center">{{ $parking->nom_parking }}</h4>
                    <p class="text-center"><strong>Capacité : {{ $parking->nombre_place_total }} places</strong></p>
                    <a class="btn btn-primary d-flex">
                        <h2 class="btn text-white mb-0">
                            {{ $parking->nombre_place_dispo }} places libres
                        </h2>
                    </a>
                    <hr>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br><div class="d-flex justify-content-end mr-5">
            <a href="{{ route('listeDesVilles') }}" class="btn btn-success">Retour</a>
        </div>
</div>


@stop
