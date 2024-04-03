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

    <form method="post" class="container mb-5">

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Code Postal</th>
                    <th class="text-center">Latitude</th>
                    <th class="text-center">Longitude</th>
                </tr>
            </thead>
            <tbody>
                @foreach($villes as $ville)
                <tr>
                    <td class="text-center">{!! $ville->nom !!}</td>
                    <td class="text-center">{!! $ville->code_postal !!}</td>
                    <td class="text-center">{!! $ville->latitude !!}</td>
                    <td class="text-center">{!! $ville->longitude !!}</td>
                    <td class="text-center"><button type="button" class="btn btn-primary" data-id="{!! $ville->id !!}">Éditer</button></td>
                    <td class="text-center"><button type="button" class="btn btn-danger">supprimer</button></td>
                </tr>
                @endforeach

            </tbody>
        </table>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.btn-primary').click(function() {
                    var villeId = $(this).data('id');
                    window.location.href = '/ville/' + villeId;
                });
            });
        </script>

</body>

</html>




<!-- @csrf -->
<!-- @foreach($villes as $ville) -->
<!-- <input type="hidden" id="id" name="id" value="{!! $ville->id !!}"> -->
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

<!-- @endforeach -->