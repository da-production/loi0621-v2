<div class="element-wrapper " >
    <div data-step="3" data-intro="Rubrique de Suivi des Notifications, ici, vous serez averti lorsque vous aurez une nouvelle Notification" >
        <h6 class="element-header">
            Suivi des Notifications
        </h6>
        <div class="element-box-tp">
            <div class="el-buttons-list full-width">
                <a class="btn btn-success btn-sm" href="{{-- isset($_GET['notification']) ? route('employeur.profile.subvention') : 'javascript:void(0)' --}}"><i class="os-icon os-icon-check-circle"></i><span>Confirmation de l'Inscription</span></a>
                @if (!is_null($demande->reception_dos))
                    <a class="btn btn-success btn-sm" href="?notification=reception"><i class="os-icon os-icon-check-circle"></i><span>Reception du dossier</span></a>
                @else
                    <a class="btn btn-white btn-sm" href="javascript:void(0)"><i class="os-icon os-icon-wallet-loaded"></i><span>Reception du dossier</span></a>
                @endif
                
                @if (!is_null($demande->traitement_dos))
                <a class="btn btn-success btn-sm" href="?notification=traitement"><i class="os-icon os-icon-check-circle"></i><span>Traitement du Dossier</span></a>
                @else
                <a class="btn btn-white btn-sm" href="javascript:void(0)"><i class="os-icon os-icon-wallet-loaded"></i><span>Traitement du Dossier</span></a>
                @endif

                @if (!is_null($demande->decision_dos))
                    @if ($demande->decision_dos)
                    <a class="btn btn-success btn-sm" href="?notification=accord"><i class="os-icon os-icon-check-circle"></i><span>Notification CNAC</span></a>
                    @else
                    <a class="btn btn-danger btn-sm" href="?notification=rejet"><i class="os-icon os-icon-window-content"></i><span>Notification CNAC</span></a>
                    @endif
                @else
                <a class="btn btn-white btn-sm" href="javascript:void(0)"><i class="os-icon os-icon-window-content"></i><span>Notification CNAC</span></a>
                @endif
            </div>
        </div>
    
    </div>
</div>