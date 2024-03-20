<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Villes</title>
</head>
<body>
    <br><h1 class="text-center">Villes :</h1><br>

    @foreach($villes as $ville)
    <!-- Formulaire pour chaque ville -->
    <form method="post" action="/saveVille" class="container mb-5">
        @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="{!! $ville->id !!}" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="{!! $ville->nom !!}" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="{!! $ville->latitude !!}" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="{!! $ville->longitude !!}" class="form-control">
        </div>
    </div>
        <div class="form-group">
            <label for="code_postal">Code Postal:</label>
            <input type="text" id="code_postal" name="code_postal" value="{!! $ville->code_postal !!}" class="form-control">
        </div>

        @endforeach

        <br><div class="form-group text-right">
            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </div>
    </form>

    



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

