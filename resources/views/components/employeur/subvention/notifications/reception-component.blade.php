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

<p class="text-justify">Nous avons l’honneur de vous transmettre ci-après le récépissé de dépôt de votre dossier.</p>
<br>
<br>

<h5  class="text-center">Récépissé de dépôt de dossier N° <b>{{ $demande->ref_reception}}/{{ $employeur->wilaya->des_fr }}/{{ Carbon\Carbon::parse($demande->created_at)->format("Y") }}</b></h5>
<br>
<br>
<ul class="text-justify">
    <li>N° d’enregistrement du dossier : <b>{{ $demande->numero_enrg_registre }}</b></li>
    <li>Nom et prénom : <b>{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</b></li>
    <li>Raison Sociale : <b>{{ $employeur->raison_social }}</b></li>
    <li>Numéro employeur : <b>{{ $employeur->numero }}</b></li>
    <li>Nature de l’avantage demandé : <b>Subvention</b></li>
    <li>Date de dépôt : <b>{{ $demande->date_enrg_registre }}</b></li>
</ul>

<br />
<br>
<br>
<br>
<br><br>
<p class="text-right">
    Fait à {{ $employeur->wilaya->des_fr }} <span>Le, {{ Carbon\Carbon::parse($demande->date_reception_dos)->format("d-m-Y") }}</span>
</p>
<p class="text-right">
    <span>Les services de l’Agence CNAC - {{ $employeur->wilaya->des_fr }} - </span>
</p>

<p class="text-right">
    <button type='button' onClick='printFunction()' class="mt-5 btn btn btn-primary dont-print" role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'طباعة' : 'Imprimer'}}
    </button>
</p>
