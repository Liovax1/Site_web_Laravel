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
            <div class="holds-the-iframe">



            <div class="container mt-5">
    <div class="row">
        <div class="col">
            <div id="mapid" style="height: 50px; width: 100px;"></div>
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
            
            
            
            
            
            
            
            </div>
            <p class="text-center" style="font-size: 16px;">
                <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                5 Allée de la République 33350 Castillon-la-Bataille
            </p>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>
                        7 <i class="fas fa-wheelchair" aria-hidden="true"></i> |
                        18 <i class="fa fa-motorcycle" aria-hidden="true"></i> |
                        0 <i class="fa fa-bicycle" aria-hidden="true"></i> |
                        0 <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@stop