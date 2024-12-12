<div x-data="{ 
    openModal: false,
  }" class="col-md-4 mx-0 mb-3 px-0 text-right">
    <button class="btn btn-sm btn-primary" @click="openModal = true">
        <i class="os-icon os-icon-plus-circle"></i> Ajouter
    </button>
    <div class="modal-container" x-show.transition="openModal" style="display: none;">
        <div class="modal-content" @click.away="openModal = false">
            <div class="container p-3">
                <form method="post" class="text-left" wire:submit.prevent="store">
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
                                <input class="form-control" placeholder="Nom" wire:model="nom">
                                @error('nom')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Prenom</label>
                                <input class="form-control" placeholder="Prenom" wire:model="prenom" />
                                @error('prenom')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">wilaya</label>
                                <select wire:model="cod_wilaya" id="cod_wilaya" class="form-control">
                                    <option value=""></option>
                                    @foreach ($wilayas as $wilaya)
                                    <option value="{{ $wilaya->cod_wilaya }}">({{ $wilaya->cod_wilaya }}) {{ $wilaya->des_fr }} - {{ $wilaya->des_ar }}</option>
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
                                <input class="form-control" placeholder="Email" wire:model="email" />
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nom d'utilisateur</label>
                                <input class="form-control" placeholder="Nom d'Utilisateur" wire:model="username" />
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Fonction</label>
                                <input class="form-control" placeholder="Fonction" wire:model="fonction" >
                                @error('fonction')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select wire:model="role_id" id="role_id" class="form-control">
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
                                <input class="form-control" type="text"  wire:model="password">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Confirmer le mot de passe</label>
                                <input class="form-control" type="text"  wire:model="password_confirmation">
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
