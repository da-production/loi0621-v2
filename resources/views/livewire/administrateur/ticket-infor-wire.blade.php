<div class="support-ticket-info">
    @if (!is_null($employeur))
    <div class="customer">
        <div class="avatar">
            <img alt="" src="img/avatar1.jpg">
        </div>
        <h4 class="customer-name">
            {{ $employeur->user->nom }} {{ $employeur->user->prenom }}
            <p>{{ $employeur->code_employeur }}</p>
        </h4>
        <div class="customer-tickets">
            {{ $employeur->tickets->count() }} Tickets
        </div>
    </div>
    <h5 class="info-header">
        Derniers Ticket Détails
    </h5>
    <div class="info-section text-center">
        <div class="label">
            Reçus le:
        </div>
        <div class="value">
            {{ $employeur->lastTicket->recule }}
        </div>
        <div class="value">
            <div class="badge badge-primary">
                Depuis l'application
            </div>
        </div>
    </div>
    <h5 class="info-header">
        Agents affectés
    </h5>
    <div class="info-section">
        <ul class="users-list as-tiles">
            @foreach ($employeur->agents as $agent)
            <li style="flex:100% !important">
                <a class="author with-avatar" href="#">
                    <div class="avatar">
                        <span class="info-header" style="font-size: 32px;">{{ $agent->initialname }}</span>
                    </div>
                    <span>{{ strtoupper($agent->nom) }} {{ ucfirst($agent->prenom) }}</span>
                    <span class="text-muted">{{ $agent->role }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <div class="customer">
        <div class="avatar">
            <img alt="" src="img/avatar1.jpg">
        </div>
        <h4 class="customer-name">
            veuillez choisir un employeur
        </h4>
    </div>
    @endif
</div>