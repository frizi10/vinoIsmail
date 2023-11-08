<!-- Informations détaillées sur un utilisateur particulier -->
@extends('layouts.app')
@section('title', 'Utilisateur')
@section('content')

@section('content')
<header>
  utilisateur
</header>
<main class="nav-margin">
    <section>
        <h2>Informations de l'utilisateur</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="info-profil"><span>Nom :</span><span class="info-value">{{ $user->nom }}</span></div>
        <div class="info-profil"><span>Courriel :</span><span class="info-value">{{ $user->email }}</span></div>
        <div class="info-profil">
          <span>Courriel vérifié :</span><span class="info-value">
            @if(empty($user->email_verified_at))
              Non
            @else
                {{ $user->email_verified_at }}
            @endif
          </span>
        </div>
        <div class="info-profil"><span>Mot de passe :</span><span class="info-value">{{ $user->password }}</span></div>
        <div class="info-profil"><span>Date de création :</span><span class="info-value" readonly>{{ $user->created_at }}</span></div>
        <div class="info-profil"><span>Date de modification :</span><span class="info-value" readonly>{{ $user->updated_at }}</span></div>

        <div class="btn-container">
            <a href="{{ route('admin.edit-user', $user->id) }}" class="btn-action btn-round btn-mt">
                Modifier le compte
            </a>
        </div>
    </section>
    <section>
        <div class="btn-container">
            <a href="{{ route('admin.destroy-user', $user->id) }}" class="btn-action btn-round btn-red btn-supprimer">
                Supprimer le compte
            </a>
        </div>
    </section>

    <!-- <div class="modal-container"> -->
        <dialog id="modal-supprimer" class="modal">
            <h2>Suppression de compte</h2>
            <hr>
            <p><strong>ATTENTION!</strong> Cette action est irréversible et entraînera la perte de toutes les données associées à ce compte.</p>
            <p>Veuillez entrer votre mot de passe administrateur pour confirmer la suppression du compte</p>
            <form action="" class="form-modal">
                    <div class="form-input-container">
                        <label for="">Mot de passe</label>
                        <input type="password" id="" name="">
                    </div>
                    <div class="btn-modal-container">
                        <button class="btn-modal-action btn-red">supprimer</button>
                        <button class="btn-modal-cancel btn-green">annuler</button>
                    </div>
            </form>
        </dialog>
    <!-- </div> -->
    <script src="{{ asset('js/modalSupprimer.js') }}"></script>
</main>
@endsection