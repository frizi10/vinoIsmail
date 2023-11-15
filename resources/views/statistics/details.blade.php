<h1>Statistiques détaillées pour {{ $user->nom }}</h1>

<!-- Tableau pour les celliers -->
@if(count($celliers) > 0)
    <table>
        <thead>
            <tr>
                <th>Nom du Cellier</th>
                <th>Qté bouteilles/Cellier</th>
                <th>Prix total/Cellier</th>
            </tr>
        </thead>
        <tbody>
            @foreach($celliers as $cellier)
                <tr>
                    <td>{{ $cellier->nom }}</td>
                    <td>
                        {{ $cellier->bouteillesCelliers->sum('quantite') }}
                    </td>
                    <td>
                        @php
                            $totalPrixCellier = $cellier->bouteillesCelliers->sum(function ($bouteilleCellier) {
                                return optional($bouteilleCellier->bouteille)->prix * $bouteilleCellier->quantite;
                            });
                        @endphp
                        {{ $totalPrixCellier ?? 0 }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Aucun cellier associé à cet utilisateur.</p>
@endif

<!-- Tableau pour les listes -->
@if(count($listes) > 0)
    <table>
        <thead>
            <tr>
                <th>Nom de la Liste</th>
                <th>Qté bouteilles/Liste</th>
                <th>Prix total/Liste</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listes as $liste)
                <tr>
                    <td>{{ $liste->nom }}</td>
                    <td>
                        {{ $liste->bouteillesListes->sum('quantite') }}
                    </td>
                    <td>
                        @php
                            $totalPrixListe = $liste->bouteillesListes->sum(function ($bouteilleListe) {
                                return optional($bouteilleListe->bouteille)->prix * $bouteilleListe->quantite;
                            });
                        @endphp
                        {{ $totalPrixListe ?? 0 }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Aucune liste associée à cet utilisateur.</p>
@endif




<link rel="stylesheet" type="text/css" href="{{ asset('css/details.css') }}">


