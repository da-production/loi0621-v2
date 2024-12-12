<style>
    .t-c{
        color: #334152 !important;
        font-weight: 500;
    }
</style>

<h3 class="text-center">Caisse Nationale d’Assurance Chômage</h3>
<p class="text-center"><img src="{{ asset('assets/images/logoWithoutTitle.png') }}" width="70px" alt="CNAC LOGO" title="CNAC LOGO"></p>
<h4 class="text-center text-danger">Service inscription en ligne de l’employeur</h4>
<br />
<h4 class="text-center">Cher employeur</h4>
<br />

<p class="text-justify">Après examen de votre dossier, nous avons le regret de porter à votre connaissance qu’une suite défavorable a été réservée à votre demande et vous demandons de bien vouloir vous présenter à l’agence CNAC de {{ $employeur->wilaya->des_fr }} à partir du {{ Carbon\Carbon::parse($demande->date_decision)->format("d-m-Y") }} pour retirer votre <b><i>DECISION DE REJET DE REJET DE LA DEMANDE DE REMBOURSEMENT DE LA COTISATION GLOBALE PART PATRONALE DE SECURITE SOCIALE DANS LE CADRE DE LA FORMATION DES TRAVAILLEURS.</i></b> pour motif <i><b> « {{ !is_null($demande->cod_rejet) ? ($demande->cod_rejet == 5 ? $demande->description_rejet : App\Models\Employeur::motifRejet($demande->cod_rejet)) : ""}} ».</i></b></p>
<br />
<p class="text-justify"> <b> Si vous désirez contester la décision de rejet, vous avez la possibilité de déposer un recours adressé à Monsieur le Président de la Commission de Recours territorialement compétente dans les huit jours à compter de la date de réception de votre décision.</b></p>
<br>
<p class="text-right">
    Fait à {{ $employeur->wilaya->des_fr }} <span>Le, {{ Carbon\Carbon::parse($demande->date_decision)->format("d-m-Y") }}</span>
</p>
<p class="text-right">
    <span>Les services de l’Agence CNAC - {{ $employeur->wilaya->des_fr }} - </span>
</p>

<p class="text-right">
    <button type='button' onClick='printFunction()' class="mt-5 btn btn btn-primary dont-print" role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'طباعة' : 'Imprimer'}}
    </button>
</p>