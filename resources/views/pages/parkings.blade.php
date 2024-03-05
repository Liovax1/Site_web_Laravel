<h1> Les parkings de la ville {!! $ville->nom!!} </h1>
<table>
    <thead>
        <tr>
            <th>nom_parking</th>
            <th>latitude</th>
            <th>longitude</th>
            <th>nombre_place_dispo</th>
            <th>nombre_place_total</th>
            <th>seuil_critique</th>
            <th>seuil_alerte</th>
            <th>horodatage</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $parkings as $parking)
        <tr>
            <td>{!! $parking->nom_parking !!}</td>
            <td>{!! $parking->latitude !!}</td>
            <td>{!! $parking->longitude !!}</td>
            <td>{!! $parking->nombre_place_dispo !!}</td>
            <td>{!! $parking->nombre_place_total !!}</td>
            <!-- <td>{!! $parking->seuil_critique !!}</td>
            <td>{!! $parking->seuil_alerte !!}</td> -->
            <td style="background-color: {!! $parking->seuil_critique !!}"></td>
            <td style="background-color: {!! $parking->seuil_alerte !!}"></td>
            <td>{!! $parking->created_at !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>