<div x-data="{ 
    openModal: false,
  }">
  <button class="btn btn-sm btn-primary" @click="openModal = true">
    <i class="os-icon os-icon-search"></i>
  </button>
    <div class="modal-container" x-show.transition="openModal" style="display: none;">
        <div class="modal-content" @click.away="openModal = false">
            <div class="container">
                <form class="row">
                    @csrf

                    <div class="col-md-8 form-group mt-3 position-relative" >
                        
                        <i class="os-icon os-icon-search position-absolute" style="left: 25px;
                        top: 10px;
                        font-size: 15px;"></i>
                        <input wire:model.debounce.1000ms="s" class="form-control pl-5" placeholder="{{ $checkbox ? 'CODE EMPLOYEUR / RAISON SOCIALE' : 'CODE EMPLOYEUR / Email' }}">
                        @error('s')
                            <p class="text-danger text-left pb-1 mt-1">{{ $message }}</p>
                        @enderror
                        <div wire:loading.block class=" py-1 my-1">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-1 py-2 form-group mt-3 position-relative">
                        <div class="form-check">
                            <input name="expire" id="expire" class="form-check-input " type="checkbox" wire:model="checkbox">
                            <label class="form-check-label mt-1"  for="expire">
                              Inscription complete
                            </label>
                          </div>
                    </div>
                    

                    <div class="result-items col-md-12">
                        @foreach ($employeurs as $employeur)
                            <a class="result-item " href="{{ $checkbox ? route('administrateur.employeurs.detail', ['code_employeur' => $employeur->code_employeur]) : 'javascript:void(0)' }}" target="_blank">
                                <span class="icon-w" style="flex:2;font-size:20px"> <i class="os-icon os-icon-folder"></i></span>
                                <span class="code_employeur">
                                    <p class="m-0">{{ $employeur->code_employeur }}</p>
                                    <p class="m-0 text-muted" style="font-size: 12px">{{ $checkbox ? $employeur->raison_social : $employeur->email }}</p>
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
</div>
