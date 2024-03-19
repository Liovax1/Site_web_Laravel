<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <br><title>Liste des Noeud Loras</title>
</head>
<body>
    <h1 class="text-center">Liste des Noeud Loras</h1><br>

    <!-- Formulaires pour les noeud_loras -->
    <form method="post" action="/saveNoeud" class="container mb-5">
    @csrf
    @foreach($noeud_loras as $noeud_lora)
        <h2>{!! $noeud_lora->nom_noeud !!}</h2>
        <input type="hidden" name="id_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->id !!}">
        <div class="form-group">
    <label for="nom_noeud_{!! $noeud_lora->id !!}">Nom du Noeud:</label>
    <input type="text" id="nom_noeud_{!! $noeud_lora->id !!}" name="nom_noeud_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->nom_noeud !!}" class="form-control">
</div>


        <div class="form-group">
            <label for="type_noeud_{!! $noeud_lora->id !!}">Type de noeud:</label>
            <input type="text" id="type_noeud_{!! $noeud_lora->id !!}" name="type_noeud_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->type_noeud !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="dev_eui_{!! $noeud_lora->id !!}">Dev EUI:</label>
            <input type="text" id="dev_eui_{!! $noeud_lora->id !!}" name="dev_eui_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->dev_eui !!}" class="form-control">
        </div>
        <div class="form-group">
    <label for="parking_id_{!! $noeud_lora->id !!}">Nom du Parking:</label>
    <select id="parking_id_{!! $noeud_lora->id !!}" name="parking_id_{!! $noeud_lora->id !!}" class="form-control">
        @foreach($parkings as $parking)
            <option value="{!! $parking->id !!}" @if($noeud_lora->parking_id == $parking->id) selected @endif>
                {!! $parking->nom_parking !!}
            </option>
        @endforeach
    </select>
</div><br>

    @endforeach

        
        <div class="text-right mt-5">
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

