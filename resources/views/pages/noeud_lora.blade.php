@extends('layouts.default')
@section('content')
    <br>
    <h1 class="text-center">Noeud Lora</h1>

    <!-- Formulaire pour le noeud_lora -->
    <form method="post" action="/" class="container mb-5">
        @csrf
        <h2>{!! $noeudLoraFind->nom_noeud !!}</h2>

        <div class="form-group">
            <label for="type_noeud">Type de noeud:</label>
            <select id="type_noeud" name="type_noeud" class="form-control">
                @foreach(['Input', 'Output', 'Afficheur'] as $type)
                <option value="{{ $type }}" @if($noeudLoraFind->type_noeud == $type) selected @endif>
                    {{ $type }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dev_eui">Dev EUI:</label>
            <input type="text" id="dev_eui" name="dev_eui" value="{!! $noeudLoraFind->dev_eui !!}" class="form-control">
        </div>
        <div class="form-group">
    <label for="parking_id_{!! $noeudLoraFind->id !!}">Nom du Parking:</label>
    <select id="parking_id_{!! $noeudLoraFind->id !!}" name="parking_id_{!! $noeudLoraFind->id !!}" class="form-control">
        @foreach($parkings as $parking)
            <option value="{!! $parking->id !!}" @if($noeudLoraFind->parking_id == $parking->id) selected @endif>
                {!! $parking->nom_parking !!}
            </option>
        @endforeach
    </select>
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