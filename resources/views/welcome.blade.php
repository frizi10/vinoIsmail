@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')

<div class="container">
    <div class="welcome">
        <h2 class="welcome-title">Bienvenue chez <span class="welcome-vino">vino</span>!</h2>
        <p class="welcome-text">L'outil le plus simple et efficace pour gérer vos celliers et vos achats SAQ.</p>
    </div>
    <img src="{{ asset('assets/img/img_connexion.jpeg') }}" alt="Bouteille au marché" class="welcome-img">
    <div class="welcome-informations">
        <form action="{{ route('login.authentication') }}" method="post" class="welcome-form" id="login">
            @csrf
            <div class="welcome-input-container">
                <label for="email" class="welcome-form-label">EMAIL</label>
                <input type="text" id="email" name="email" class="welcome-form-input">
            </div>
            <div class="welcome-input-container">
                <label for="password" class="welcome-form-label">PASSWORD</label>
                <input type="text" id="password" name="password" class="welcome-form-input">
            </div>
        </form>
        <div class="welcome-forgot-psw">
            <a href="#">MOT DE PASSE OUBLIÉ</a>
        </div>
        <button class="welcome-connection-btn" type="submit" form="login">CONNECTER</button>
        <a href="{{ route('register') }}">CRÉER UN COMPTE</a>
    </div>
</div>

@endsection