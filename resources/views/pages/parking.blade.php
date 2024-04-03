@extends('layouts.default')
@section('content')
    <br>
    <h1 class="text-center">Parking</h1><br>

<!-- Formulaire pour le parking -->
<form method="post" action="/saveParking" class="container mb-5">
    @csrf
    <input type="hidden" id="id" name="id" value="{!! $parking->id !!}">
    <div class="form-group">
        <label for="nom_parking">Nom du Parking :</label>
        <input type="text" id="nom_parking" name="nom_parking" value="{!! $parking->nom_parking !!}" class="form-control">
    </div>
    <div class="form-group">
    <label for="ville">Ville :</label>
    <select id="ville" name="ville" class="form-control">
        @foreach ($villes as $ville)
            <option value="{{ $ville->nom }}"
                @if ($ville->nom == $parking->ville->nom)
                    selected
                @endif
            >
                {{ $ville->nom }}
            </option>
        @endforeach
    </select>
</div>


    <div class="form-group">
        <label for="latitude">Latitude :</label>
        <input type="text" id="latitude" name="latitude" value="{!! $parking->latitude !!}" class="form-control">
    </div>
    <div class="form-group">
        <label for="longitude">Longitude :</label>
        <input type="text" id="longitude" name="longitude" value="{!! $parking->longitude !!}" class="form-control">
    </div>
    <div class="form-group">
        <label for="nombre_place_dispo">Nombre de places disponibles :</label>
        <input type="text" id="nombre_place_dispo" name="nombre_place_dispo" value="{!! $parking->nombre_place_dispo !!}" class="form-control">
    </div>
    <div class="form-group">
        <label for="nombre_place_total">Nombre total de places :</label>
        <input type="text" id="nombre_place_total" name="nombre_place_total" value="{!! $parking->nombre_place_total !!}" class="form-control">
    </div>

    <!-- Boutons -->
    <div class="text-right mt-5">
        <button type="submit" class="btn btn-primary mr-2">Sauvegarder</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@stop