@extends('layouts.default')
@section('content')
    <br>
    <h1 class="text-center">Parkings</h1><br>

    <!-- Tableau pour les parkings -->
    <div class="container mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Ville</th>
                    <th class="text-center">Latitude</th>
                    <th class="text-center">Longitude</th>
                    <th class="text-center">Places disponibles</th>
                    <th class="text-center">Total de places</th>
                    <th class="text-center"></th>

                    
                </tr>
            </thead>
            <tbody>
                @foreach( $parkings as $parking)
                <tr>
                    <td class="text-center">{!! $parking->nom_parking !!}</td>
                    <td class="text-center">{!! $parking->ville->nom !!}</td>
                    <td class="text-center">{!! $parking->latitude !!}</td>
                    <td class="text-center">{!! $parking->longitude !!}</td>
                    <td class="text-center">{!! $parking->nombre_place_dispo !!}</td>
                    <td class="text-center">{!! $parking->nombre_place_total !!}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary mr-2" data-id="{!! $parking->id !!}">Éditer</button>
                        <form action="/parking/{!! $parking->id !!}/delete" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><div class="d-flex justify-content-end mr-3">
            <a href="/formAjouterParking" class="btn btn-success">Ajouter</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
            $(document).ready(function() {
                $('.btn-primary').click(function() {
                    var parkingId = $(this).data('id');
                    window.location.href = '/parking/' + parkingId;
                });
            });
        </script>

@stop