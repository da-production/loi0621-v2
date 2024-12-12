<div class="row">
    <div class="col-sm-6">
        <div class="value-pair">
            <div class="value badge badge badge-{{ $status ? 'success' : 'danger'  }} p-2">
                @if (is_null($status))
                <span aria-hidden="true">
                    <i class="os-icon os-icon-help-circle animated-icon-1"></i>
                </span> charger l'etat
                @elseif ($status)
                <span aria-hidden="true">
                    <i class="os-icon os-icon-check animated-icon-1"></i>
                </span> {{ $message }}
                @else
                    {{ $message }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-right">
        <button class="btn btn-primary btn-sm" wire:click="fetch">
            <i class="os-icon os-icon-refresh-ccw"></i>
        </button>
    </div>
    <div class="col-md-12">
        <div wire:loading.block class=" py-1 my-1">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>