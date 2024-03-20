@extends('layouts.default')
@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Formulaire</title>
</head>
<body>

<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <form method="POST" action="{{ route('connexion') }}">
            @csrf
            <div class="form-group">
                <label for="email">Mail</label>
                <input type="text" class="form-control" id="email" placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>

@stop
