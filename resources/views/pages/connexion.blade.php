@extends('layouts.default')
@section('content')


    <br><div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header text-center">Connexion</h5>
                    <div class="card-body">
                        <p class="text-center">Connectez-vous !</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
