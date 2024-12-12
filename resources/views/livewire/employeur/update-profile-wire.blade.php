<form action="#" wire:submit.prevent="updateProfile()" >
    @if($success)
        <div class="alert alert-success dont-print" wire:loading.remove>
            <b>le profil a été mis à jour avec succès</b>
        </div>
    @endif
    <div wire:loading.block class=" py-3">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
    </div>
    <div>
        <div class="element-info" >
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon os-icon-user"></div>
              </div>
              <div class="element-info-text">
                <h5 class="element-inner-header">
                  Profil
                </h5>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for=""> Email</label>
            <input class="form-control" placeholder="Enter email" value="{{ auth()->user()->email }}" disabled readonly="readonly" type="email">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Nom</label>
                <input class="form-control" wire:model="nom" type="text">
                @error('nom')
                <div class="help-block text-danger form-text form-control-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Prénom</label>
                <input class="form-control" wire:model="prenom" type="text">
                @error('prenom')
                <div class="help-block text-danger form-text form-control-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Mot de Passe</label>
                  <input class="form-control" wire:model="password" type="text">
                    @error('password')
                        <div class="help-block text-danger form-text form-control-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Confirmer le Mot de Passe</label>
                  <input class="form-control" wire:model="password_confirmation"  type="text">
                  {{-- <div class="help-block form-text with-errors form-control-feedback"></div> --}}
                </div>
              </div>
            </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary"> Modifier</button>
          </div>
    </div>
</form >