@extends('layouts.default')
@section('content')

<br>
<div>
    <h1 class="text-center">Liste des Parkings</h1>
</div>
<br>

<div class="container-fluid">
    <div class="row">
        @foreach ($parkings as $parking)
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h4>{{ $parking->nom_parking }}</h4>
                    <p><small><strong>Capacité : {{ $parking->nombre_place_total }} places</strong></small></p>
                    <a class="btn btn-primary">
                        <h2 class="btn btn-primary text-center text-white">
                            {{ $parking->nombre_place_dispo }} places libres
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
