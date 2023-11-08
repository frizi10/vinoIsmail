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
        <h2>Informations</h2>
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

{{-- <!-- <header>
    utilisateur
</header>
<main>
    <div class="admin-show-container">
        <h1> {{ $user->nom }} </h1>
        <div class="admin-table-container-show">
          <div class="table-row">
              <div class="table-header">Courriel</div>
              <div class="table-data">{{ $user->email }}</div>
          </div>
          <div class="table-row">
              <div class="table-header">Courriel vérifié</div>
              @if(empty($user->email_verified_at))
              <div class="table-data">    
                @if(empty($user->email_verified_at))
                  Non
                @else
                    {{ $user->email_verified_at }}
                @endif
              </div>
          </div>
          <div class="table-row">
              <div class="table-header">Mot de passe</div>
              <div class="table-data">{{ $user->password }}</div>
          </div>
          <div class="table-row">
              <div class="table-header">Date de création</div>
              <div class="table-data">{{ $user->created_at }}</div>
          </div>
          <div class="table-row">
              <div class="table-header">Date de modification</div>
              <div class="table-data">{{ $user->updated_at }}</div>
          </div>
      </div>
    </div>
    <a href="{{ route('admin.edit-user', $user->id) }}" class="btn-submit">Modifier</a>
    <button class="btn-submit" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Supprimer un utilisateur</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Confirmez-vous la suppression de l'utilisateur {{ $user->nom }}? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('admin.destroy-user', $user->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
        </form>
      </div>
    </div>
  </div>
</div>
</main>
@endsection --> --}}