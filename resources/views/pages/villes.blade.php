@extends('layouts.default')
@section('content')

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
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($villes as $ville)
            <tr>
                <td class="text-center">{!! $ville->nom !!}</td>
                <td class="text-center">{!! $ville->code_postal !!}</td>
                <td class="text-center">{!! $ville->latitude !!}</td>
                <td class="text-center">{!! $ville->longitude !!}</td>
                <td class="text-center">
                        <button type="button" class="btn btn-primary mr-5" data-id="{!! $ville->id !!}">Éditer</button>
                        <form action="/ville/{!! $ville->id !!}/delete" method="POST" style="display: inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer cette ville ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-end m-5">
            <a href="/formAjouterVille" class="btn btn-success mr-4">Ajouter</a>
        </div>


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
    @stop