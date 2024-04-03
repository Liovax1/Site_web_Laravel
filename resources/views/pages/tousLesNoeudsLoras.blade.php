<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <br>
    <title>Noeuds Loras</title>
</head>

<body>


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




    <!-- <h1 class="text-center">Noeuds Loras</h1><br>

    <form method="post" action="/saveNoeud" class="container mb-5">
    @csrf
    @foreach($noeud_loras as $noeud_lora)
        <h2>{!! $noeud_lora->nom_noeud !!}</h2>
        <input type="hidden" name="id_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->id !!}">
        <div class="form-row">
        <div class="form-group col-md-6">
    <label for="nom_noeud_{!! $noeud_lora->id !!}">Nom du Noeud:</label>
    <input type="text" id="nom_noeud_{!! $noeud_lora->id !!}" name="nom_noeud_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->nom_noeud !!}" class="form-control">
</div>


        <div class="form-group col-md-6">
            <label for="type_noeud_{!! $noeud_lora->id !!}">Type de noeud:</label>
            <input type="text" id="type_noeud_{!! $noeud_lora->id !!}" name="type_noeud_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->type_noeud !!}" class="form-control">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dev_eui_{!! $noeud_lora->id !!}">Dev EUI:</label>
            <input type="text" id="dev_eui_{!! $noeud_lora->id !!}" name="dev_eui_{!! $noeud_lora->id !!}" value="{!! $noeud_lora->dev_eui !!}" class="form-control">
        </div>
        
        <div class="form-group col-md-6">
    <label for="parking_id_{!! $noeud_lora->id !!}">Nom du Parking:</label>
    <select id="parking_id_{!! $noeud_lora->id !!}" name="parking_id_{!! $noeud_lora->id !!}" class="form-control">
        @foreach($parkings as $parking)
            <option value="{!! $parking->id !!}" @if($noeud_lora->parking_id == $parking->id) selected @endif>
                {!! $parking->nom_parking !!}
            </option>
        @endforeach
    </select>

    

</div><br>
        </div><br>

    @endforeach

        
        <div class="text-right mt-5">
            <button type="submit" class="btn btn-primary mr-2">Sauvegarder</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->


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
</body>

</html>