@extends('layouts.default')
@section('content')

<<h1>Ajouter un utilisateur</h1>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="role_id">Rôle :</label>
            <select name="role_id" id="role_id" required>
                <!-- Options pour les rôles (vous pouvez les récupérer depuis la base de données) -->
                <option value="1">Administrateur</option>
                <option value="2">Utilisateur</option>
            </select>
        </div>
        <button type="submit">Ajouter</button>
    </form>

@stop