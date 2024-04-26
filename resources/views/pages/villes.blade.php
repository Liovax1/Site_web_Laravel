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
    @stop