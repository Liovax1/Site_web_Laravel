@extends('layouts.default')
@section('content')

<br>
<h1 class="text-center">Créer un Utilisateur</h1>
<br>
<form action="{{ url('ajouterUnUtilisateur') }}" method="POST">
    @csrf 
    <div class="container">
    <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
        <th> <label for="nom">Nom d'utilisateur: </label></th> 
        <th> <label for="nom">Email: </label></th>
        <th> <label for="nom">Mot de passe: </label></th>
        <th> <label for="nom">Role: </label></th>
        <th> <label for="nom">Ville: </label></th>
</tr>
    <tr>
        <td><input type="text" name="name" id="name"> <br></td>
        <td><input type="text" name="email" id="email"> <br></td>
        <td><input type="password" name="password" id="password"> <br></td>
        <td><select id="role_id" name="role_id">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
        </select> <br></td>
        <td><select id="ville_id" name="ville_id">
        <option value="0">Tout</option>
        @foreach ($villes as $ville)
            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
        @endforeach
        </select> <br></td>
</tr>
</thread>
</table>
</div>
    <button class="btn btn-info" type="submit" value="Ajouter">Ajouter</button>
</div>
</form>

@stop