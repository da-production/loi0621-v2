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
<br />
<p class="text-justify"><b><u>DISPOSITIF :</u></b> MESURES D'ENCOURAGEMENT ET D'APPUI A LA PROMOTION DE L'EMPLOI - SUBVENTION MENSUELLE A L’EMPLOI  </p>
<br />
<h4 class="text-center">Cher employeur</h4>
<br />

<p class="text-justify">Nous vous informons que votre inscription en ligne a été effectuée et enregistrée avec succès :</p>
<ul >
    <li>Le : <span class="t-c"> {{ Carbon\Carbon::parse($demande->date_demande)->day . '/' . Carbon\Carbon::parse($demande->date_demande)->month . '/' .Carbon\Carbon::parse($demande->date_demande)->year }}</li>
    <li>sous le numéro : <span class="t-c"> {{ $demande->cod_demande }}</li>
</ul>
<p class="text-justify">Aussi, nous vous invitons à compléter votre demande d’inscription, en transmettant via cette   plateforme au niveau de votre espace, les documents (en format PDF) suivants :</p>
<ul class="text-justify">
    <li >La demande d’octroi de la subvention mensuelle à l’emploi, dûment renseignée et visée par vos soins, (selon le spécimen téléchargeable à partir de votre espace dans la <a href="javascript:void(0)" class="text-primary toDownload" >rubrique téléchargement</a>);</li>
    <li >La decision d'octroi des avantages délivrée par la CNAS ;</li>
    <li >La liste des travailleurs recrutés par contrat à durée indéterminée « CDI »,  visé par vos soins, (selon modèle CNAC téléchargeable à partir de votre espace dans la <a href="javascript:void(0)" class="text-primary toDownload">rubrique téléchargement </a>);</li>
    <li>Les copies des contrats à durée indéterminée des salariés ; </li>
    <li>Le Justificatif de l’agence de placement à l’emploi pour les travailleurs recrutés.</li>
</ul>

<br />
<p><b><u>Important :</u></b></p>
<ul class="text-justify">
    <li>Un accusé de réception vous sera notifié via votre espace, dès réception de tous les documents exigés et tout dossier incomplet n’est pas recevable.</li>
    <li>Un traitement à votre demande vous sera assuré dans un délai n’excédant pas un (1) mois à partir de la date de l’accusé réception.</li>
    <li>Une notification vous sera délivrée via votre espace (cas d’accord ou de rejet). </li>
    <li>la remise de la decision d’accord par les services de l’Agence CNAC - {{ $employeur->wilaya->des_fr }} - est subordonnée à la présentation obligatoire des documents originaux suivants :
        <ul class="text-justify">
            <li>La Demande d’octroi de la subvention mensuelle à l’emploi visée par vos soins ;</li>
            <li>La liste des travailleurs recrutés par contrat à durée indéterminée « CDI »,  visé par vos soins;</li>
            <li>La decision d'octroi des avantages délivrée par la CNAS.</li>
        </ul>
    </li>
    <li>La subvention de 1000 DA par travailleur et par mois vous sera versée à la fin de chaque exercice et durant trois années.</li>
</ul>

<br />
<p class="text-right">
    <span>Le, {{ Carbon\Carbon::parse($demande->date_demande)->format("d-m-Y") }}</span>
</p>
<p class="text-right">
    <span>Les services de l’Agence CNAC - {{$employeur->wilaya->des_fr}} - </span>
</p>

<p class="text-right">
    <button type='button' onClick='printFunction()' class="mt-5 btn btn btn-primary dont-print" role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'طباعة' : 'Imprimer'}}
    </button>
    <a 
        href="?lang={{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'fr' : 'ar' }}" 
        class="mt-5 btn btn btn-primary dont-print " role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'Français' : 'العربية' }}
    </a>
</p>



