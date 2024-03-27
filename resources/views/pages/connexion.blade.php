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
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Mot
                        de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary">Se
                    connecter</button>
            </form>
        </div>
    </body>
    </html>

    @stop