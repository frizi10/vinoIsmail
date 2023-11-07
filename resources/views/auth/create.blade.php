@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')
<!-- <div class="container">
    <div class="welcome">
        <h2 class="welcome-title">Bienvenue chez <span class="welcome-vino">vino</span>!</h2>
        <p class="welcome-text">L'outil le plus simple et efficace pour gérer vos celliers et vos achats SAQ.</p>
    </div>
    <img src="{{ asset('assets/img/img_connexion.jpeg') }}" alt="Bouteille au marché" class="welcome-img">
    <div class="welcome-informations">
        <form action="/register" class="welcome-form" method="post" id="registration">
            @csrf
            <div class="welcome-input-container">
                <label for="nom" class="welcome-form-label">NOM</label>
                <input type="text" id="nom" name="nom" class="welcome-form-input">
            </div>
            <div class="welcome-input-container">
                <label for="prenom" class="welcome-form-label">PRÉNOM</label>
                <input type="text" id="prenom" name="prenom" class="welcome-form-input">
            </div>
            <div class="welcome-input-container">
                <label for="email" class="welcome-form-label">EMAIL</label>
                <input type="text" id="email" name="email" class="welcome-form-input">
            </div>
            <div class="welcome-input-container">
                <label for="password" class="welcome-form-label">PASSWORD</label>
                <input type="password" id="password" name="password" class="welcome-form-input">
            </div>
        </form>
        <div class="welcome-forgot-psw">
            <a href="#">MOT DE PASSE OUBLIÉ</a>
        </div>
        <button class="welcome-connection-btn" type="submit" form="registration">CRÉER UN COMPTE</button>
        <a href="{{ route('login') }}">SE CONNECTER</a>
    </div>
</div> -->
<header>
    vino
</header>
<main class="form-border">
    <h1 class="form-h1">
        Créer un compte
    </h1>
    <div class="form-container">
        <form action="{{ route('register.store') }}" method="post" id="registration">
            @csrf
            <div class="form-input-container">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom">
                @error('prenom')
                    <span class="error-message">{{ $message }}</span>
                @enderror
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
            <a href="{{ route('login') }}" class="btn-submit">connexion</a>
        </form>
    </div>
</main>

@endsection