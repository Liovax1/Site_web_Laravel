<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Les parkings de la ville : {!! $ville->nom !!}</title>
</head>
<body>
    <h1 class="text-center">Les parkings de la ville : {!! $ville->nom !!}</h1><br>

    <!-- Formulaires pour les parkings -->
    <form method="post" action="/save" class="container mb-5">
    @csrf
    <input type="hidden" name="id" value="{!! $ville->id !!}">
    @foreach( $parkings as $parking)
        <h2>{!! $parking->nom_parking !!}</h2>
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="{!! $parking->latitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="{!! $parking->longitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre_place_dispo">Nombre de places disponibles:</label>
            <input type="text" id="nombre_place_dispo" name="nombre_place_dispo" value="{!! $parking->nombre_place_dispo !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre_place_total">Nombre total de places:</label>
            <input type="text" id="nombre_place_total" name="nombre_place_total" value="{!! $parking->nombre_place_total !!}" class="form-control">
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

