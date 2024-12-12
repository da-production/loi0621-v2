<div class="ticket-thread {{ auth()->guard('web')->check() ? 'profile' : '' }}">
    @if (!is_null($tickets))
    @foreach ($tickets as $ticket)
    <div class="ticket-reply {{ $ticket->owner ? '' : 'highlight' }}">
        <div class="ticket-reply-info {{ $ticket->owner ? 'h-0' : '' }}">
            @if (!$ticket->owner)
                <span class="info-data">
                    <span class="label">
                        @if (auth()->guard('admin')->check())
                        <strong class="text-info">{{ $ticket->administrateur->username }}</strong> a répondu le
                        @endif
                    </span>
                    <span class="value">{{ $ticket->updated_at }}</span>
                </span>
                <span class="badge badge-success">support agent</span>
            @else
            <a class="author with-avatar" href="#">
                <span>{{ $ticket->object }}</span>
            </a>
            @endif
            @if (auth()->guard('admin')->check())
                @can('reply',App\Models\Ticket::class)
                    @if (!$ticket->status)
                        <form class="actions" wire:submit.prevent="closeTicket('{{ $ticket->id }}')">
                            <i class="os-icon os-icon-ui-46"></i>
                            <div class="actions-list">
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="os-icon os-icon-ui-15"></i><span>Clôturer</span>
                                </button>
                            </div>
                        </form>
                    @endif
                @endcan
                
            @endif
        </div>
        <div class="ticket-reply-content">
            @if ($ticket->status)
                <p>etat: <span class="danger">Clôturer</span></p>
            @endif
            {{ $ticket->sujet }}
        </div>

    </div>
    @endforeach
    @if (auth()->guard('admin')->check())
        @can('reply',App\Models\Ticket::class)
        <form wire:submit.prevent="send" class="mt-3">
            <input type="hidden" wire:model="code">
            <div class="form-group">
                <label> Sujet</label>
                <input class="form-control" wire:model="object" />
                @error('object')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label> Message</label><textarea class="form-control" rows="3" wire:model="message"></textarea>
                @error('message')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
            <div class="form-buttons-w">
                <button class="btn btn-primary" type="submit"> Envoyer</button>
                <button class="btn btn-info" type="button" wire:click="resetAll"> Actualiser</button>
            </div>
        </form>
        @endcan
    @else
    <form wire:submit.prevent="send" class="mt-3">
        <input type="hidden" wire:model="code">
        <div class="form-group">
            <label> Sujet</label>
            <input class="form-control" wire:model="object" />
            @error('object')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label> Message</label><textarea class="form-control" rows="3" wire:model="message"></textarea>
            @error('message')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>
        <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Envoyer</button>
            <button class="btn btn-info" type="button" wire:click="resetAll"> Actualiser</button>
        </div>
    </form>
    @endif
    @else
    <h4 class="customer-name">
        veuillez choisir un employeur
    </h4>
    @endif
</div>