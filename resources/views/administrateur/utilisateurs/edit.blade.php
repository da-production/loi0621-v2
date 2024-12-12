@extends('layouts.administrateur')

@section('content')

<div class="row justify-content-center">
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          Ajouter
        </h6>
        <form action="{{ route('administrateur.utilisateur.update',['user'=>$user->username]) }}" method="post">
          @csrf
          @method('PUT')
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon os-icon-wallet-loaded"></div>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Nom</label>
                <input class="form-control" placeholder="Nom" value="{{ $user->nom }}" name="nom">
                @error('nom')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Prénom</label>
                <input class="form-control" placeholder="Prenom" value="{{ $user->prenom }}" name="prenom">
                @error('prenom')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                  <label for="">wilaya</label>
                  <select name="cod_wilaya" id="cod_wilaya" class="form-control">
                    @foreach ($wilayas as $wilaya)
                      <option value="{{ $wilaya->cod_wilaya }}" selected="{{ $user->cod_wilaya == $wilaya->cod_wilaya ? 'true' : 'false' }}">{{ $wilaya->des_fr }} - {{ $wilaya->des_ar }}</option>
                    @endforeach
                  </select>
                  @error('cod_wilaya')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input class="form-control" placeholder="Email" value="{{ $user->email }}" name="email">
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nom d'utilisateur</label>
                  <input class="form-control" placeholder="Nom d'Utilisateur" value="{{ $user->username }}" name="username">
                  @error('username')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Fonction</label>
                  <input class="form-control" placeholder="Nom d'Utilisateur" value="{{ $user->fonction }}" name="fonction">
                  @error('fonction')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="role_id">Role</label>
                  <select name="role_id" id="role_id" class="form-control">
                      <option value="{{ $user->role_id }}">{{ App\Models\Role::display($user->role_id) }}</option>
                      @foreach (App\Models\Role::display() as $key => $value)
                          @if ($key != $user->role_id)
                            <option value="{{ $key }}">{{ $value }}</option>
                          @endif
                      @endforeach
                  </select>
                  @error('role_id')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Mot de passe</label>
                  <input class="form-control" type="password" name="password" placeholder="************" >
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Confirmer le mot de passe</label>
                  <input class="form-control" type="password" name="password_confirmation" placeholder="************">
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-sm btn-primary">Modifier</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          Sécurité
        </h6>
        <form action="{{ route('administrateur.utilisateur.security') }}" method="post">
          @csrf
          @method('PUT')
          <input type="hidden" readonly value="{{ $user->id }}" name="id">
          <div class="col-sm-6  ">
            <div class="form-check">
              <input name="expire" id="expire" class="form-check-input" type="checkbox" value="1" {{ $user->expire ? "checked" : "" }}>
              <label class="form-check-label" for="expire">
                Mot de passe expire
              </label>
            </div>
          </div>
          <div class="col-sm-6  ">
            <div class="form-check">
              <input name="double_auth" id="double_auth" class="form-check-input" type="checkbox" value="1" {{ $user->double_auth ? "checked" : "" }}>
              <label class="form-check-label" for="double_auth">
                authentification a deux facteur
              </label>
            </div>
          </div>
          <div class="col-md-12 text-right">
              <button  class="btn btn-sm btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script>
    @if(session()->has('success'))
      swal({
          text: "{{ session()->get('success') }}",
          icon: "success",
          button: "Fermer",
          dangerMode: false,
      });
    @endif
    function printFunction() {
        window.print();
    }
</script>
@endsection
