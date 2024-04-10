@extends('layouts.default')
@section('content')


    <h1 class="text-center">Noeuds Loras</h1><br>

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
                        <button type="button" class="btn btn-danger">Supprimer</button>
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




   


    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            // Parcourir tous les champs du formulaire
            var inputs = this.querySelectorAll('input[type="text"], select');
            for (var i = 0; i < inputs.length; i++) {
                // Vérifier si le champ est vide
                if (inputs[i].value == '') {
                    // Empêcher la soumission du formulaire
                    e.preventDefault();
                    // Afficher un message d'erreur
                    alert('Veuillez remplir tous les champs du formulaire.');
                    // Sortir de la boucle
                    break;
                }
            }
        });
    </script>
@stop