<div class="element-wrapper" data-step="4" data-intro="Rubrique de Téléchargement et d'Insertion, 
    ici vous trouverez les fichiers à télécharger ainsi que ceux à insérer" >
        <h6 class="element-header">
            Type Mesure
        </h6>
        <div class="element-box-tp">
            <div class="el-buttons-list full-width">
            <a class="btn btn-primary btn-sm" href="{{ route('subvention.demande.list') }}" id="telecharger">
                <i class="os-icon os-icon-folder"></i> <span>Subvention{{ count(auth()->user()->subventions) > 1 ? 's' :'' }} ({{ count(auth()->user()->subventions) }})</span>
            </a>
            <a class="btn btn-primary btn-sm" href="{{ route('formation.demande.list') }}">
                <i class="os-icon os-icon-folder"></i><span>Formation{{ count(auth()->user()->formations) > 1 ? 's' :'' }} ({{ count(auth()->user()->formations) }})</span>
            </a>
            </div>
        </div>
    </div>