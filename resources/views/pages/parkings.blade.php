<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <br><title>Les parkings de la ville : {!! $ville->nom !!}</title>
</head>
<body>
    <h1 class="text-center">Les parkings de la ville : {!! $ville->nom !!}</h1><br>

    <!-- Formulaires pour les parkings -->
    @foreach( $parkings as $parking)
    <form class="container mb-5">
        <h2>{!! $parking->nom_parking !!}</h2>
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="{!! $parking->latitude !!}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="{!! $parking->longitude !!}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="nombre_place_dispo">Nombre de places disponibles:</label>
            <input type="text" id="nombre_place_dispo" name="nombre_place_dispo" value="{!! $parking->nombre_place_dispo !!}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="nombre_place_total">Nombre total de places:</label>
            <input type="text" id="nombre_place_total" name="nombre_place_total" value="{!! $parking->nombre_place_total !!}" class="form-control" readonly>
        </div>
    </form>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

