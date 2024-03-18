<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Tous les parkings</title>
</head>
<body>
    <h1 class="text-center">Tous les parkings</h1><br>

    <!-- Formulaires pour les parkings -->
    <form method="post" action="/save" class="container mb-5">
    @csrf
    @foreach( $parkings as $parking)
        <h2>{!! $parking->nom_parking !!}</h2>
        <input type="hidden" name="id_{!! $parking->id !!}" value="{!! $parking->id !!}">
        <div class="form-group">
            <label for="latitude_{!! $parking->id !!}">Latitude:</label>
            <input type="text" id="latitude_{!! $parking->id !!}" name="latitude_{!! $parking->id !!}" value="{!! $parking->latitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="longitude_{!! $parking->id !!}">Longitude:</label>
            <input type="text" id="longitude_{!! $parking->id !!}" name="longitude_{!! $parking->id !!}" value="{!! $parking->longitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre_place_dispo_{!! $parking->id !!}">Nombre de places disponibles:</label>
            <input type="text" id="nombre_place_dispo_{!! $parking->id !!}" name="nombre_place_dispo_{!! $parking->id !!}" value="{!! $parking->nombre_place_dispo !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre_place_total_{!! $parking->id !!}">Nombre total de places:</label>
            <input type="text" id="nombre_place_total_{!! $parking->id !!}" name="nombre_place_total_{!! $parking->id !!}" value="{!! $parking->nombre_place_total !!}" class="form-control">
        </div>
        <div class="form-group">
    <label for="ville_{!! $parking->id !!}">Ville:</label>
    <select id="ville_{!! $parking->id !!}" name="ville_{!! $parking->id !!}" class="form-control">
    @foreach( $villes as $ville)
        <option value="{!! $ville->id !!}">{!! $ville->nom !!}</option>
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

