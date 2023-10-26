@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')

<div class="container">
    <div class="welcome">
        <h2 class="welcome-title">Bienvenue <br> chez <span class="welcome-vino">vino</span>!</h2>
        <p class="welcome-text">L'outil le plus simple et efficace pour gérer vos celliers et vos achats SAQ.</p>
    </div>

    <div class="welcome-informations">
        <form action="" class="welcome-form">
            <div class="welcome-input-container">
                <label for="email" class="welcome-form-label">EMAIL</label>
                <input type="text" id="email" class="welcome-form-input">
            </div>
            <div class="welcome-input-container">
                <label for="password" class="welcome-form-label">PASSWORD</label>
                <input type="text" id="password" class="welcome-form-input">
            </div>
        </form>
        <div class="welcome-forgot-psw">
            <a href="#">MOT DE PASSE OUBLIÉ</a>
        </div>
        <a href="#">
            <button class="welcome-connection-btn">CONNECTER</button>
        </a>
        <a href="#">CRÉER UN COMPTE</a>
    </div>
</div>

@endsection