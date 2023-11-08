<!-- Informations détaillées sur un utilisateur particulier -->
@extends('layouts.app')
@section('title', 'Utilisateur')
@section('content')
<header>
    utilisateur
</header>
<main>
    <div class="admin-show-container">
        <h1> {{ $user->prenom }} {{ $user->nom }} </h1>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Supprimer un utilisateur</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Confirmez-vous la suppression de l'utilisateur {{ $user->prenom }} {{ $user->nom }}? 
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
@endsection