@extends('layouts.default')
@section('content')
<br>
<h1 class="text-center">Noeud Lora</h1>

<!-- Formulaire pour le noeud_lora -->
<form method="post" action="/saveNoeud" class="container mb-5">
    @csrf

    <div class="form-group">
        <label for="nom_noeud_{!! $noeudLoraFind->id !!}">Nom du Noeud:</label>
        <input type="text" id="nom_noeud_{!! $noeudLoraFind->id !!}" name="nom_noeud_{!! $noeudLoraFind->id !!}" value="{!! $noeudLoraFind->nom_noeud !!}" class="form-control">
    </div>


    <div class="form-group">
        <label for="type_noeud_">Type de noeud:</label>
        <select id="type_noeud_{{ $noeudLoraFind->id }}" name="type_noeud_{{ $noeudLoraFind->id }}" class="form-control">
            @foreach(['Input', 'Output', 'Afficheur'] as $type)
            <option value="{{ $type }}" @if($noeudLoraFind->type_noeud == $type) selected @endif>
                {{ $type }}
            </option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label for="dev_eui">Dev EUI:</label>
        <input type="string" id="dev_eui_{{ $noeudLoraFind->id }}" name="dev_eui_{{ $noeudLoraFind->id }}" value="{!! $noeudLoraFind->dev_eui !!}" class="form-control">
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
    </div><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            Veuillez remplir tous les champs du formulaire.
        </div>
        @endif

    <!-- Boutons -->
    <div class="text-right mt-5">
        <button type="submit" class="btn btn-primary mr-3">Sauvegarder</button>
        <a href="/tousLesNoeudsLoras" class="btn btn-secondary mr">Annuler</a>

    </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@stop