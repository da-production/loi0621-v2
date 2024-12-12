<div class="element-wrapper pb-3" data-step="4" data-intro="Dans cet onglet, vous pouvez consulter vos demandes et leur état grâce aux libellés et aux couleurs.">
    <h6 class="element-header">
        Liste des demandes Subvention
    </h6>
    <div class="element-box-tp">
        @foreach ($subventions as $subvention)
        
            <div class="activity-boxes-w">
                <div class="activity-box-w">
                <div class="activity-time">
                    <span>Cree le:</span>
                    {{ $subvention->created_at }}
                </div>
                <div class="activity-box border-right-{{ !is_null($subvention->decision_dos) ? ($subvention->decision_dos == 1 ? 'success' : 'danger' ) : 'warning'   }}">
                    
                    <div class="activity-info">
                    <div class="activity-role">
                        {{ $subvention->cod_demande }}
                    </div>
                    <strong class="activity-title">{{ !is_null($subvention->decision_dos) ? ($subvention->decision_dos == 1 ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'   }}</strong>
                    </div>
                    <div class="activity-avatar">
                        <a class="btn btn-primary" href="{{ route('subvention.demande.detail', ['num_dossier' => $subvention->cod_demande]) }}"><i class="os-icon os-icon-arrow-right"></i> </a>
                    </div>
                </div>
                </div>
            </div> 
        @endforeach
    </div>
    {{ $subventions->links('vendor.pagination.livewire-paginate-sm') }}
</div>