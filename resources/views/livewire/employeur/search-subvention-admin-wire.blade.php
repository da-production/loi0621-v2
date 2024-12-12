<div x-data="{ 
    openModal: false,
    filterModal: false
  }">
  <button class="btn btn-sm btn-primary" @click="openModal = true">
    <i class="os-icon os-icon-search"></i>
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
                    </div>
                    

                    <div class="result-items col-md-12">
                        @foreach ($subventions as $subvention)
                            
                            <a class="result-item" href="{{ route('administrateur.subventions.detail', ['cod_demande' => $subvention->cod_demande]) }}" target="_blank">
                                <span class="icon-w" style="flex:2;font-size:20px"> <i class="os-icon os-icon-folder"></i></span>
                                <span class="code_employeur">
                                    <p class="m-0">{{ $subvention->cod_demande }}</p>
                                    <p class="m-0 text-{{ App\Models\Subvention::Status($subvention->decision_dos)['className'] }}" style="font-size: 12px">{{ App\Models\Subvention::Status($subvention->decision_dos)['label'] }}</p>
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
