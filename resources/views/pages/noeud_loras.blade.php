<h1>Liste des Noeud Loras</h1>
<table>
    <thead>
        <tr>
        @foreach($nomsChamps as $nomChamp)
            <th>{!! $nomChamp !!}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
            @foreach($noeud_loras as $noeud_lora)
            <tr>
                <td>{!! $noeud_lora->id !!}</td>
                <td>{!! $noeud_lora->parking_id !!}</td>
                <td>{!! $noeud_lora->nom_noeud !!}</td>
                <td>{!! $noeud_lora->type_noeud !!}</td>
                <td>{!! $noeud_lora->appEUI !!}</td>
                <td>{!! $noeud_lora->appKey !!}</td>
            <tr>
            @endforeach
        </tbody>
</table>