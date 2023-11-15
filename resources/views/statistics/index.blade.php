<form action="">
    <div class="form-input-container">
        <label for="select_user">Statistiques des utilisateurs</label>
        <select name="user" id="select_user">
            <option value="">Choisir des options</option>
            @foreach($userData as $user)
                <option value="{{ $user['id_key'] }}">{{ $user['email_key'] }}</option>
            @endforeach
        </select>
    </div>
</form>

@foreach($userData as $user)
    <table class="user-table" style="display: none;" data-user-id="{{ $user['id_key'] }}">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nombre de Celliers</th>
                <th>Nombre de Listes</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="user-id">{{ $user['id_key'] }}</td>
                <td class="user-email">{{ $user['email_key'] }}</td>
                <td class="user-cellier">{{ $user['celliers_count_key'] }}</td>
                <td class="user-list">{{ $user['listes_count_key'] }}</td>
                <td class="user-details">
                    <a href="{{ route('statistics.details', ['user' => $user['id_key']]) }}">Afficher les détails</a>
                </td>
            </tr>
        </tbody>
    </table>
@endforeach

<!-- Ajouter les liens vers les fichiers CSS et JS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/statUser.css') }}">
<script src="{{ asset('js/statUser.js') }}"></script>
