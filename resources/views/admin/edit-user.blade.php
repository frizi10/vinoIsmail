<!-- Modification d'un utilisateur existant et suppression -->
@extends('layouts.app')
@section('title', 'Modification d'utilisateur')
@section('content')
<header>
    utilisateur
</header>
<main>
    <h1>
        Modification d'un utilisateur
    </h1>
    <div>
        <p></p>
        <div class="form-container">
            <form action="" method="post">
                @method('put')
                @csrf
                    <div class="form-input-container">
                        <label for="prenom">PRÉNOM</label>
                        <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">
                    </div>
                    <div class="form-input-container">
                        <label for="nom">NOM</label>
                        <input type="text" id="nom" name="nom" value="{{ $user->nom }}">
                    </div>
                    <div class="form-input-container">
                        <label for="email">COURRIEL</label>
                        <input id="email" name="email" value="{{ $user->email }}"></input>
                    </div>
                    <div class="form-input-container">
                        <label for="email_verified">COURRIEL VÉRIFIÉ</label>
                        <input id="email_verified" name="email_verified_at" value="{{ $user->email_verified_at }}"></input>
                    </div>
                    <div class="form-input-container">
                        <label for="password">MOT DE PASSE</label>
                        <input id="password" name="password" value="{{ $user->password }}"></input>
                    </div>
                    <div class="form-input-container">
                        <label for="creation">DATE DE CRÉATION</label>
                        <input id="creation" name="created_at" value="{{ $user->created_at }}" readonly></input>
                    </div>
                    <div class="form-input-container">
                        <label for="update">DATE DE MODIFICATION</label>
                        <input id="update" name="updated_at" value="{{ $user->updated_at }}" readonly></input>
                    </div>
                <div>
                    <input type="submit" class="btn btn-success" value="Enregistrer">
                </div>
            </form>
        </div>
    </div>
</main>
@endsection