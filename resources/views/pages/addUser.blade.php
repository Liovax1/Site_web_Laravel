@extends('layouts.default')
@section('content')

<br>
<h1 class="text-center">Créer un Utilisateur</h1>
<br>
<form action="{{ url('ajouterUnUtilisateur') }}" method="POST">
    @csrf 
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
            <option value="1">admin</option>
            <option value="4">gestionnaire_parking</option>
            <option value="5">gestionnaire_place_parking</option>
        </select> <br></td>
        <td><select id="ville_id" name="ville_id">
            <option value="1">Castillon-la-Bataille</option>
            <option value="2">Bordeaux</option>
        </select> <br></td>
</tr>
</thread>
</table>
    <input type="submit" value="Ajouter">
</form>

@stop