<div class="element-wrapper">
    <h6 class="element-header">
        Liste des demandes Formation
    </h6>
    <div class="element-box-tp">
        @foreach (auth()->user()->employeur->formations as $formation)
        
            <div class="activity-boxes-w">
                <div class="activity-box-w">
                <div class="activity-time">
                    <span>Cree le:</span>
                    {{ $formation->created_at }}
                </div>
                <div class="activity-box border-right-{{ !is_null($formation->decision_dos) ? ($formation->decision_dos == 1 ? 'success' : 'danger' ) : 'warning'   }}">
                    
                    <div class="activity-info">
                    <div class="activity-role">
                        {{ $formation->cod_demande }}
                    </div>
                    <strong class="activity-title">{{ !is_null($formation->decision_dos) ? ($formation->decision_dos == 1 ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'   }}</strong>
                    </div>
                    <div class="activity-avatar">
                        <a class="btn btn-primary" href="{{ route('formation.demande.detail', ['num_dossier' => $formation->cod_demande]) }}"><i class="os-icon os-icon-arrow-right"></i> </a>
                    </div>
                </div>
                </div>
            </div> 
        @endforeach
      
    </div>
</div>