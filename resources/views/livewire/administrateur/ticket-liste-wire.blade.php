<div class="support-tickets">
    <div class="support-tickets-header">
        <div class="tickets-control">
            <h5>
                Tickets
            </h5>
            <div class="element-search">
                <input placeholder="Filtrer par employeur..." type="text" wire:model.debounce1000="code_employeur">
            </div>
        </div>
        <div class="tickets-filter">
            <div class="form-group mr-3">
                <label class="d-none d-md-inline-block mr-2">Statut</label>
                <select class="form-control-sm" wire:model="status">
                    <option value="">Tous</option>
                    <option value="1">
                        Clôturer
                    </option>
                    <option value="0">
                        En attente
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div>
        @foreach ($employeurs as $employeur)
        <div class="support-ticket" wire:click="$emit('employeurTicket', '{{ $employeur->code_employeur }}')">
            <div class="st-meta">
                <div class="badge badge-{{ $employeur->lastTicket->status ? 'danger' : 'success' }}-inverted">
                    {{ $employeur->lastTicket->stat }}
                </div>
                <i class="os-icon os-icon-ui-09"></i>
                <div class="status-pill {{ $employeur->lastTicket->classname }}"></div>
            </div>
            <div class="st-body">
                <div class="avatar">
                    <img alt="" src="img/avatar1.jpg">
                </div>
                <div class="ticket-content">
                    <h6 class="ticket-title">
                        {{ $employeur->lastTicket->object }}
                    </h6>
                    <div class="ticket-description">
                        {{ $employeur->lastTicket->sujet }}
                    </div>
                </div>
            </div>
            <div class="st-foot">
                <span class="label">Employeur:</span>
                <a class="value with-avatar" href="#">
                    <span>{{ $employeur->user->nom }} {{ $employeur->user->prenom }}</span>
                </a>
                <span class="label">reçus le:</span><span class="value">{{ $employeur->lastTicket->recule }}</span>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="load-more-tickets tikets">
        {{ $employeurs->links() }}
        {{-- <a href="#"><span>Charger plus de Tickets...</span></a> --}}
    </div>
</div>