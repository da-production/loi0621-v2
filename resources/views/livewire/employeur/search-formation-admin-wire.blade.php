<div x-data="{ 
    openModal: false,
    filterModal: false
  }">
  <button class="btn btn-sm btn-primary" @click="openModal = true">
    <i class="os-icon os-icon-search"></i>
  </button>
  <button class="btn btn-sm btn-primary" @click="filterModal = true">
    <i class="os-icon os-icon-filter"></i>
  </button>
    <div class="modal-container" x-show.transition="openModal" style="display: none;">
        <div class="modal-content" @click.away="openModal = false">
            <div class="container">
                <form>
                    @csrf

                    <div class="col-md-12 form-group mt-3 position-relative" x-show="openModal">
                        
                        <i class="os-icon os-icon-search position-absolute" style="left: 25px;
                        top: 10px;
                        font-size: 15px;"></i>
                        <input wire:model="s" class="form-control pl-5" placeholder="CODE Demande / CODE EMPLOYEUR (CNAS)">
                        @error('s')
                            <p class="text-danger text-left pb-1 mt-1">{{ $message }}</p>
                        @enderror
                        {{-- <div wire:loading.block class=" py-1 my-1">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                        </div> --}}
                    </div>
                    

                    <div class="result-items col-md-12">
                        @foreach ($formations as $formation)
                            
                            <a class="result-item" href="{{ route('administrateur.formations.detail', ['cod_demande' => $formation->cod_demande]) }}" target="_blank">
                                <span class="icon-w" style="flex:2;font-size:20px"> <i class="os-icon os-icon-folder"></i></span>
                                <span class="code_employeur">
                                    <p class="m-0">{{ $formation->cod_demande }}</p>
                                    <p class="m-0 text-{{ App\Models\Formation::Status($formation->decision_dos)['className'] }}" style="font-size: 12px">{{ App\Models\formation::Status($formation->decision_dos)['label'] }}</p>
                                </span>
                                <span class="ic" style="flex:2">
                                    <i class="os-icon os-icon-arrow-left7"></i>
                                </span>
                            </a>
                        @endforeach
                    </div>

                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-sm btn-warning "
                            @click="openModal = false">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-container" x-show.transition="filterModal" style="display: none;">
        <div class="modal-content" @click.away="filterModal = false">
            <div class="container">
                <form action="?" class="row">
                    <div class="col-md-6 form-group mt-3 position-relative" x-show="filterModal">
                        <select name="reception_dos" class="form-control">
                            <option value="">Réception du dossier</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group mt-3 position-relative" x-show="filterModal">
                        <select name="decision_dos" class="form-control" id="">
                            <option value="">Decesion</option>
                            <option value="1">Accord</option>
                            <option value="0">Rejet</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-sm btn-primary ">Rechercher</button>
                        <button type="button" class="btn btn-sm btn-warning "
                            @click="filterModal = false">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
