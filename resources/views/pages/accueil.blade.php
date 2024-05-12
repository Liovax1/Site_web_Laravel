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
            <div id="mapid" style="height: 400px; width: auto;"></div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var mymap = L.map('mapid').setView([44.849998, -0.03333], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    L.marker([44.849998, -0.03333]).addTo(mymap)
        .bindPopup('Castillon-la-Bataille -<br> Allées de la République.')
        .openPopup();
</script>



@stop