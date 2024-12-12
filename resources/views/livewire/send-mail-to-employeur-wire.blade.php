<div class="col-md-6" x-data="{ 
    openModal: false,
    }">
    <button class="btn btn-primary w-100" @click="openModal = true">
        <i class="os-icon os-icon-mail-14"></i>
        Mail
    </button>
    <div class="modal-container" x-show.transition="openModal" style="display: none;">
        <div class="modal-content" @click.away="openModal = false">
            <div class="container">
                <form wire:submit.prevent="send">
                    <div class="col-md-12 form-group mt-3 position-relative" x-show="openModal">
                        
                        <input wire:model.lazy="object" class="form-control" placeholder="Objet">
                        @error('object')
                            <p class="text-danger text-left pb-1 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    

                    <div class="result-items col-md-12">
                        <textarea class="form-control " wire:model.lazy="message" placeholder="Message" cols="30" rows="10"></textarea>
                        @error('message')
                            <p class="text-danger text-left pb-1 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-12 text-right mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
                        <button type="button" class="btn btn-sm btn-warning " @click="openModal = false">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
