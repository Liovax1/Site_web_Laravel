@extends('layouts.default')
@section('content')
<br>
<h1 class="text-center">Nouveau Parking</h1>

<form method="post" action="/ajoutParking" class="container mb-5">
    @csrf

    <div class="form-group">
        <label for="nom_parking">Nom du Parking : </label>
        <input type="text" id="nom_parking" name="nom_parking" class="form-control">
    </div>

    <div class="form-group">
        <label for="ville_id">Villes : </label>
        <select id="ville_id" name="ville_id" class="form-control">
            @foreach($villes as $ville)
            <option value="{!! $ville->id !!}">
                {!! $ville->nom !!}
            </option>
            @endforeach
        </select>
        </div>

    <div class="form-group">
        <label for="latitude">Latitude : </label>
        <input type="text" id="latitude" name="latitude" class="form-control">
    </div>

    <div class="form-group">
        <label for="longitude">Longitude : </label>
        <input type="text" id="longitude" name="longitude" class="form-control">
    </div>

    <div class="form-group">
        <label for="nombre_place_dispo">Nombre place dispo : </label>
        <input type="text" id="nombre_place_dispo" name="nombre_place_dispo" class="form-control">
    </div>

    <div class="form-group">
        <label for="nombre_place_total">Nombre place total : </label>
        <input type="text" id="nombre_place_total" name="nombre_place_total" class="form-control">
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            Veuillez remplir tous les champs du formulaire correctement
        </div>
        @endif

    <div class="text-right mt-5">
            <button type="submit" class="btn btn-primary mr-2">Sauvegarder</button>
            <a href="/tousLesParkings" class="btn btn-secondary mr">Annuler</a>
        </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


@stop