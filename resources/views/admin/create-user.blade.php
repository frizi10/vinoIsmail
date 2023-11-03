@extends('layouts.admin')
@section('title', 'Création d'un utilisateur')
@section('content')
<header>
    utilisateur
</header>
<main>
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
            <button type="submit" form="registration">CRÉER UN COMPTE UTILISATEUR</button>
        </div>
    </div>
</main>
@endsection