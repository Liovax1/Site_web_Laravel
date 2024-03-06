<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <br><title>Ville : {!! $villeFind->nom !!}</title>
</head>
<body>
    <h1 class="text-center">Ville : {!! $villeFind->nom !!}</h1>

    <!-- Formulaire pour la ville -->
    <form method="post" action="/save" class="container mb-5">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="{!! $villeFind->id !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="{!! $villeFind->nom !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="{!! $villeFind->latitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="{!! $villeFind->longitude !!}" class="form-control">
        </div>
        <div class="form-group">
            <label for="code_postal">Code Postal:</label>
            <input type="text" id="code_postal" name="code_postal" value="{!! $villeFind->code_postal !!}" class="form-control">
        </div>

        <!-- Boutons avec marge supérieure -->
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

