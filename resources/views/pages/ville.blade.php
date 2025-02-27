@extends('layouts.default')
@section('content')
    <br><h1 class="text-center">Ville : {!! $villeFind->nom !!}</h1>

    <!-- Formulaire pour la ville -->
    <form method="post" action="/saveVille" class="container mb-5">
    @csrf
    <input type="hidden" id="id" name="id" value="{!! $villeFind->id !!}">
        <br><div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="{!! $villeFind->nom !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="code_postal">Code Postal:</label>
            <input type="text" id="code_postal" name="code_postal" value="{!! $villeFind->code_postal !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="{!! $villeFind->latitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="{!! $villeFind->longitude !!}" class="form-control">
        </div><br>
    
        @if ($errors->any())
        <div class="alert alert-danger">
            Veuillez remplir tous les champs du formulaire correctement
        </div>
        @endif
        <!-- Boutons -->
        <div class="text-right mt-5">
            <button type="submit" class="btn btn-primary mr-3">Sauvegarder</button>
            <a href="/villes" class="btn btn-secondary mr">Annuler</a>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@stop

