@extends('layouts.default')
@section('content')

<br>
<div>
    <h1 class="text-center">Liste des Parkings</h1>
</div>
<br>

<div class="col-md-6">
    <div class="card shadow h-100 mb-4">
        <div class="card-body">
            <a href="/parking/Clemenceau">
                <h5 class="name">Allées de la République</h5>
            </a>
            <p><small>Capacité : 200 places</small></p>
            <a href="/parking/Clemenceau" class="btn btn-primary">
                <h2 class="text-center text-white">
                    50 places libres
                </h2>
            </a>
            
            <hr>
            
        </div>
    </div>
</div>


@stop