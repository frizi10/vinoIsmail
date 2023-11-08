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
    <div class="form-container">
        <form action="{{ route('register.store') }}" method="post" id="registration">
            @csrf
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
<!-- <main>
    <h1>
        Création d'un utilisateur
    </h1>

    <div>
        <div class="form-container">
            <form action="/register" method="post" id="registration">
                @csrf
                <div class="form-input-container">
                    <label for="nom">NOM</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div class="form-input-container">
                    <label for="prenom">PRÉNOM</label>
                    <input type="text" id="prenom" name="prenom">
                </div>
                <div class="form-input-container">
                    <label for="email">EMAIL</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="form-input-container">
                    <label for="password">MOT DE PASSE</label>
                    <input type="text" id="password" name="password">
                </div>
            </form>
            <button class="btn-submit" type="submit" form="registration">CRÉER UN COMPTE UTILISATEUR</button>
        </div>
    </div>
</main> -->
@endsection