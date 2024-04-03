@extends('layouts.default')
@section('content')
    <h1 class="text-center">Ville : {!! $villeFind->nom !!}</h1>

    <!-- Formulaire pour la ville -->
    <form method="post" action="/saveVille" class="container mb-5">
    @csrf
    <input type="hidden" id="id" name="id" value="{!! $villeFind->id !!}">
        <div class="form-group">
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


    <script>
document.querySelector('form').addEventListener('submit', function(e) {
    // Parcourir tous les champs du formulaire
    var inputs = this.querySelectorAll('input[type="text"], select');
    for (var i = 0; i < inputs.length; i++) {
        // Vérifier si le champ est vide
        if (inputs[i].value == '') {
            // Empêcher la soumission du formulaire
            e.preventDefault();
            // Afficher un message d'erreur
            alert('Veuillez remplir tous les champs du formulaire.');
            // Sortir de la boucle
            break;
        }
    }
});
</script>
@stop

