@extends('layouts.app')
@section("title", "Liste d'utilisateurs")
@section('content')
<header>
    utilisateurs
</header>
<main>
    <div class="btn-submit">
        <a href="{{ route('admin.create-user') }}">ajouter un utilisateur</a>
    </div>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        <form action="">
            <div class="form-input-container">
                <label for="search_users">RECHERCHE</label>
                <input type="text" id="search_users">
            </div>
        </form>
    </div>
    <div class="admin-table-container">
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    @if($user->hasRole('Admin'))
                        <p>Role: Administrateur</p>
                    @else
                        <p>Role: Utilisateur</p>
                    @endif
                    <td><a href="{{ route('admin.show-user', $user->id) }}"><button class="btn-ajouter">Mettre à jour</button></a></td>
                </tr>
                @empty
                <p>Aucun utilisateur</p>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection