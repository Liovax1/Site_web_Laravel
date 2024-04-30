@extends('layouts.default')
@section('content')

    <br><h1 class="text-center">Noeuds Loras</h1><br>

    <!-- Tableau pour les noeud_loras -->
    <div class="container mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Nom du Noeud</th>
                    <th class="text-center">Type de noeud</th>
                    <th class="text-center">Dev EUI</th>
                    <th class="text-center">Nom du Parking</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noeud_loras as $noeud_lora)
                <tr>
                    <td class="text-center">{!! $noeud_lora->nom_noeud !!}</td>
                    <td class="text-center">{!! $noeud_lora->type_noeud !!}</td>
                    <td class="text-center">{!! $noeud_lora->dev_eui !!}</td>
                    <td class="text-center">
                        @foreach($parkings as $parking)
                        @if($noeud_lora->parking_id == $parking->id)
                        {!! $parking->nom_parking !!}
                        @endif
                        @endforeach
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary mr-4" data-id="{!! $noeud_lora->id !!}">Éditer</button>
                        <form action="/noeud_lora/{!! $noeud_lora->id !!}/delete" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><div class="d-flex justify-content-end mr-5">
            <a href="/formAjouterNoeud" class="btn btn-success">Ajouter</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-primary').click(function() {
                var noeud_loraId = $(this).data('id');
                window.location.href = '/noeud_lora/' + noeud_loraId;
            });
        });
    </script>
@stop
