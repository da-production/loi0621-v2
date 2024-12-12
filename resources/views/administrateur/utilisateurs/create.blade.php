@extends('layouts.administrateur')

@section('content')

<div class="row justify-content-center">
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          Ajouter
        </h6>
        <form action="{{ route('administrateur.utilisateur.store') }}" method="post">
          @csrf
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
                <input class="form-control" placeholder="Nom" value="{{ old('nom') }}" name="nom">
                @error('nom')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Prenom</label>
                <input class="form-control" placeholder="Prenom" value="{{ old('prenom') }}" name="prenom">
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
                          <option value="{{ $wilaya->cod_wilaya }}">{{ $wilaya->des_fr }} - {{ $wilaya->des_ar }}</option>
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
                  <input class="form-control" placeholder="Email" value="{{ old('email') }}" name="email">
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nom d'utilisateur</label>
                  <input class="form-control" placeholder="Nom d'Utilisateur" value="{{ old('username') }}" name="username">
                  @error('username')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Fonction</label>
                  <input class="form-control" placeholder="Nom d'Utilisateur" value="{{ old('fonction') }}" name="fonction">
                  @error('fonction')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="role_id">Role</label>
                  <select name="role_id" id="role_id" class="form-control">
                      @foreach (App\Models\Role::display() as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
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
                  <input class="form-control" type="password" value="Cn@c*2021" name="password" placeholder="************" >
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Confirmer le mot de passe</label>
                  <input class="form-control" type="password" value="Cn@c*2021" name="password_confirmation" placeholder="************">
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-sm btn-primary">Ajouter</button>
            </div>
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
