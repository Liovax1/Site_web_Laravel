@extends('layouts.default')
@section('content')

<br>
<h1 class="text-center">Modifier un Utilisateur</h1>
<br>
<form action="{{ url('editerUnUtilisateur') }}" method="POST">
    @csrf 
    <input type="hidden" id="id" name="id" value="{!! $userFind->id !!}">
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
            <td><input type="text" name="name" id="name" value="{!! $userFind->name !!}"> <br></td>
            <td><input type="text" name="email" id="email" value="{!! $userFind->email !!}"> <br></td>
            <td><input type="password" name="password" id="password" value=""><br> <br></td>
            <td><select id="role_id" name="role_id" value="{!! $userFind->role_id !!}">
                <option></option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" @if($role->id == $userFind->role_id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select><br></td>
            <td><select id="ville_id" name="ville_id" value="{!! $userFind->ville_id !!}">
            <option value="0">Tout</option>
            @foreach ($villes as $ville)
            <option value="{{ $ville->id }}" @if($ville->id == $userFind->ville_id) selected @endif>{{ $ville->nom }}</option>
            @endforeach
        </select> <br></td>
</tr>
</thread>
</table>
</div>
<button class="btn btn-info" type="submit" value="Modifier">Modifier</button>
</div>
</form>
    
@stop
