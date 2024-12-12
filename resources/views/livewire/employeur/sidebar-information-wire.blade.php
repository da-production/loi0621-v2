<div class="col-sm-4 dont-print">
    <div data-step="1" data-intro="Espace Employeur, Ici vous trouverez quelques informations vous concernant">
        <div class="element-wrapper">
            <div class="element-box">
                <h6 class="element-header">
                    Espace Employeur
                </h6>
                @if(!is_null($employeur))
                <div class="timed-activities compact">
                    <div class="timed-activity">
                        <div class="ta-date">
                            <span>Information Employeur {{ isset($type) ? $type : '' }}</span>
                        </div>
                        <div class="ta-record-w">
                            <div class="ta-record">
                                <div class="ta-timestamp">
                                    <strong>Date début d'activite</strong>
                                </div>
                                <div class="ta-activity">
                                    {{ $employeur->date_debut_activite }}
                                </div>
                            </div>
                            <div class="ta-record">
                                <div class="ta-timestamp">
                                    <strong>Code Employeur (CNAS)</strong>
                                </div>
                                <div class="ta-activity">
                                    {{ $employeur->code_employeur }}
                                </div>
                            </div>
                            <div class="ta-record">
                                <div class="ta-timestamp">
                                    <strong>Raison sociale</strong>
                                </div>
                                <div class="ta-activity">
                                    {{ $employeur->raison_social }}
                                </div>
                            </div>
                            <div class="ta-record">
                                <div class="ta-timestamp">
                                    <strong>Branche d'activité</strong>
                                </div>
                                <div class="ta-activity">
                                    {{ $employeur->branche->des_fr }}
                                </div>
                            </div>
                            <div class="ta-record">
                                <div class="ta-timestamp">
                                    <strong>Wilaya</strong>
                                </div>
                                <div class="ta-activity">
                                    {{ $employeur->wilaya->des_fr }} -- {{ $employeur->wilaya->des_ar }}
                                </div>
                            </div>
                            <div class="ta-record">
                                <div class="ta-timestamp">
                                    <strong>Etat au niveau de la CNAS</strong>
                                </div>
                                <div class="ta-activity">
                                    {{ $employeur->email_entreprise }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                Vous n'avez pas encore spécifier votre type d'inscription
                @endif
                {{-- <div class="alert alert-danger">
            <p>Pour ouvrir une demande <button class="btn btn-primary">Ouvrire</button></p>
          </div> --}}
            </div>
        </div>
    </div>
</div>
