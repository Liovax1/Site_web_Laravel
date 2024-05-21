@extends('layouts.default')
@section('content')

<br>
<h1 class="text-center">Gestion des Utilisateurs</h1>
<br>

<div class="container">
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>  
              <th scope="col">Nom d'utilisateur</th>    
              <th scope="col">Email</th>
              <th scope="col">Mot de passe</th>
              <th scope="col">Role</th>
              <th scope="col">Ville</th>
              <th scope="col">Modifier</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($users as $user)
                <tr>
                  <th scope="row">{!! $user->id !!}</th>
                  <td>{!! $user->name !!}</td>
                  <td>{!! $user->email !!}</td>
                  <td>{!! $user->password !!}</td>
                  <td>{!! $user->role->name !!}</td>
                  <td>{!! $user->ville_id !!}</td>	      
                   <td>
                        <a class="btn btn-info" href="{!! route('editerUnUtilisateur', ['id' => $user->id ]) !!}" role="button">modifier</a>
                    </td>
                  <td>
                        <a class="btn btn-danger" href="{!! route('supprimerUnUtilisateur', ['id' => $user->id ]) !!}"role="button">supprimer</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <a class="btn btn-success" href="{!! route('ajouterUnUtilisateur') !!}" role="button">Ajouter un Utilisateur</a>
    </div>
</div>

@stop
