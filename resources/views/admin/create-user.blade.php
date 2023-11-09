@extends('layouts.app')
@section('title', "Création d'un utilisateur")
@section('content')
<header>
    utilisateur
</header>
<main class="form-border">
    <h1 class="form-h1">
        Créer un compte utilisateur
    </h1>
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
        <form action="/admin/users-create/" method="post" id="registration">
            @csrf
            <div class="form-input-container">
                <label for="role">Rôle</label>
                <select name="role" id="role">
                    <option value="utilisateur" selected>Utilisateur</option>
                    <option value="administrateur">Administrateur</option>
                </select>
            </div>
            <div class="form-input-container">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom">
                @error('nom')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-input-container">
                <label for="email">Courriel</label>
                <input type="text" id="email" name="email">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-input-container">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-input-container">
                <label for="repeat-password">Répéter mot de passe</label>
                <input type="password" id="repeat-password" name="password_confirmation">
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-button">
                <button type="submit" class="btn-submit">créer</button>
            </div>
        </form>
    </div>
</main>
@endsection