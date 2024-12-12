@extends('layouts.administrateur')

@section('styles')
    @livewireStyles()
@endsection

@section('content')

<div class="element-wrapper">
    <div class="element-box-tp">
      <h5 class="form-header">
        Accueil
      </h5>
      <div class="row mx-0 px-0">
        <div class="col-md-8 px-0 mx-0">
            List des Utilisateurs 
        </div>
        {{-- <div class="col-md-4 mx-0 mb-3 px-0 text-right">
            <a href="{{ route('administrateur.utilisateur.create') }}" class="btn btn-sm btn-primary">Ajouter</a>
        </div> --}}
        @can('create', App\Models\Administrateur::class)
          <livewire:add-user-wire />
        @endcan
    </div>
      <div class="element-box-tp">
        
        <div class="table-responsive">
          <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Wilaya</th>
                <th>
                    Nom Prenom
                </th>
                <th>
                    Nom d'utilisateur
                </th>
                <th>
                    email
                </th>
                <th>
                    Fonction
                </th>
                <th>
                    Role
                </th>
                <th>
                    Etat
                </th>
                <th>
                  <livewire:administrateur.search-user-wire />
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>({{ $user->cod_wilaya }}) {{ $user->wilaya->des_fr }} - {{ $user->wilaya->des_ar }}</td>
                    <td>{{ $user->nom }} {{ $user->prenom }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->fonction }}</td>
                    <td>{{ App\Models\Role::display($user->role_id) }}</td>
                    <td><span class="badge badge-{{ $user->status ? 'success' : 'danger' }}-inverted">{{ $user->status ? 'Actif' : 'non Actif' }}</span></td>
                    <td class="row-actions" width="15%">
                      <livewire:administrateur.toggle-user-status-wire :user="$user" />
                      <a href="{{ route('administrateur.utilisateur.edit', ['username' => $user->username]) }}" class="btn btn-sm btn-primary text-white">Modifier</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!--------------------
        END - Table with actions
        ------------------            --><!--------------------
        START - Controls below table
        ------------------  -->
        <div class="controls-below-table">
          <div class="table-records-info">
            {{-- Showing records 1 - 5 --}}
          </div>
          {{ $users->links("vendor.pagination.default") }}
        </div>
        <!--------------------
        END - Controls below table
        -------------------->
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    @livewireScripts()
    
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection