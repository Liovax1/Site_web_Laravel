<h1>ville : {!! $villeFind->nom !!}</h1>
<table>
    <thead>
        <tr>
            @foreach($nomsChamps as $nomChamp)
            <th>{!! $nomChamp !!}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{!! $villeFind->id !!}</td>
            <td>{!! $villeFind->nom !!}</td>
            <td>{!! $villeFind->latitude !!}</td>
            <td>{!! $villeFind->longitude !!}</td>
            <td>{!! $villeFind->code_postal !!}</td>
        </tr>
    </tbody>
</table>