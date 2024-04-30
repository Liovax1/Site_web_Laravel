@extends('layouts.default')
@section('content')
<br>
<h1 class="text-center">Nouveau Noeud Lora</h1>

<form method="post" action="/ajoutNoeud" class="container mb-5">
    @csrf

    <div class="form-group">
        <label for="nom_noeud">Nom du Noeud :</label>
        <input type="text" id="nom_noeud" name="nom_noeud" class="form-control">
    </div>

    <div class="form-group">
        <label for="type_noeud">Type de noeud:</label>
        <select id="type_noeud" name="type_noeud" class="form-control">
            @foreach(['Input', 'Output', 'Afficheur'] as $type)
            <option value="{{ $type }}">
                {{ $type }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="dev_eui">Dev EUI:</label>
        <input type="text" id="dev_eui" name="dev_eui" class="form-control">
    </div>

    <div class="form-group">
        <label for="parking_id">Nom du Parking:</label>
        <select id="parking_id" name="parking_id" class="form-control">
            @foreach($parkings as $parking)
            <option value="{!! $parking->id !!}">
                {!! $parking->nom_parking !!}
            </option>
            @endforeach
        </select>
        </div><br>

        @if ($errors->any())
        <div class="alert alert-danger">
            Veuillez remplir tous les champs du formulaire.
        </div>
        @endif


        <div class="text-right mt-5">
            <button type="submit" class="btn btn-primary mr-4">Sauvegarder</button>
            <a href="/tousLesNoeudsLoras" class="btn btn-secondary mr">Annuler</a>
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