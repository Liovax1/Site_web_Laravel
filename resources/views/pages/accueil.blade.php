@extends('layouts.default')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<br>
<div>
    <h1 class="text-center">Accueil</h1>
</div>

<div class="container mt-5">
    <div class="row justify">
        <div class="col">
            <div id="mapid" class="map-container" style="height: 400px; width: 100%;"></div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var mymap = L.map('mapid').setView([44.84, -0.58], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    @foreach ($parkings as $parking)
        L.marker([{{ $parking->latitude }}, {{ $parking->longitude }}]).addTo(mymap)
            .bindPopup('<b><a href="{{ route('listeDesParkings', ['id' => $parking->ville->id]) }}">{{ $parking->nom_parking }}</a></b><br>Ville: {{ $parking->ville->nom }}<br>Places disponibles: {{ $parking->nombre_place_dispo }}<br>Places totales: {{ $parking->nombre_place_total }}');
    @endforeach
</script>
@stop
