<div x-data="{ 
    openModal: false,
    }">
    <a href="javascript:void(0);" class="ticket-button" @click="openModal = true">
        <i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i>
    </a>
    <div class="modal-container" x-show.transition="openModal" style="display: none;">
        <div class="modal-content" @click.away="openModal = false">
            <div class="container">
                
                <livewire:administrateur.ticket-thread-wire />
            </div>
        </div>
    </div>
</div>
