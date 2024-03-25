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
    <br>
    <h1 class="text-center">Villes :</h1><br>

    
    <!-- Formulaire pour chaque ville -->
    <form method="post" action="/saveVille" class="container mb-5">
        @csrf
        @foreach($villes as $ville)
        <input type="hidden" id="id" name="id" value="{!! $ville->id !!}">
        <!-- <div class="form-group">
            <h3>{!! $ville->nom !!}</h3>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="{!! $ville->nom !!}" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="code_postal">Code Postal:</label>
                <input type="text" id="code_postal" name="code_postal" value="{!! $ville->code_postal !!}" class="form-control">
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
        </div><br> -->

        @endforeach

        <table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Code Postal</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Éditer</th>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
        @foreach($villes as $ville)
        <tr>
            <td>{!! $ville->nom !!}</td>
            <td>{!! $ville->code_postal !!}</td>
            <td>{!! $ville->latitude !!}</td>
            <td>{!! $ville->longitude !!}</td>
            <td><button type="button" class="btn btn-primary">Éditer</button></td>
            <td><button type="button" class="btn btn-secondary">Modifier</button></td>
        </tr>
        @endforeach
    </tbody>
</table>




        <br>
        <!-- <div class="form-group text-right">
            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </div> -->
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
</body>

</html>
