<h1>villes :</h1>
<table>
    <thead>
        <tr>
            @foreach($nomsChamps as $nomChamp)
            <th>{!! $nomChamp !!}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    @foreach($villes as $ville)
        <tr>
            <td>{!! $ville->id !!}</td>
            <td>{!! $ville->nom !!}</td>
            <td>{!! $ville->latitude !!}</td>
            <td>{!! $ville->longitude !!}</td>
            <td>{!! $ville->code_postal !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>

