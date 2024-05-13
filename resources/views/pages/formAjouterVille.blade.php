@extends('layouts.default')
@section('content')
<br>
<h1 class="text-center">Nouvelle Ville</h1>

<form method="post" action="/ajoutVille" class="container mb-5">
    @csrf

    <div class="form-group">
        <label for="nom">Ville : </label>
        <input type="text" id="nom" name="nom" class="form-control">
    </div>

    <!-- Faites de même pour les autres champs -->


    <div class="form-group">
        <label for="code_postal">Code postal : </label>
        <input type="string" id="code_postal" name="code_postal" class="form-control">
    </div>

    <div class="form-group">
        <label for="latitude">Latitude : </label>
        <input type="string" id="latitude" name="latitude" class="form-control">
    </div>

    <div class="form-group">
        <label for="longitude">Longitude : </label>
        <input type="string" id="longitude" name="longitude" class="form-control">
    </div><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            Veuillez remplir tous les champs du formulaire.
        </div>
        @endif

    <div class="text-right mt-5">
        <button type="submit" class="btn btn-primary mr-3">Sauvegarder</button>
        <a href="/villes" class="btn btn-secondary mr">Annuler</a>
    </div><br>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@stop