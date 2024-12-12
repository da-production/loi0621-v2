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
<p class="text-justify"><b><u>DISPOSITIF :</u></b> MESURES D'ENCOURAGEMENT ET D'APPUI A LA PROMOTION DE L'EMPLOI </p>
<p class="text-justify"> " PRISE EN CHARGE DE LA COTISATION GLOBALE PART PATRONALE DE LA SECURITE SOCIALE DUE AUX EMPLOYEURS AYANT ORGANISE DES ACTIONS DE FORMATION ET DE PERFECTIONNEMENT AU PROFIT DE LEURS SALARIES "</p>

<br />
<h4 class="text-center">Cher employeur</h4>
<br />

<p>Nous vous informons que votre inscription en ligne a été effectuée et enregistrée avec succès :</p>
<ul>
    <li>Le : <span class="t-c"> {{ Carbon\Carbon::parse($demande->date_demande)->day . '/' . Carbon\Carbon::parse($demande->date_demande)->month . '/' .Carbon\Carbon::parse($demande->date_demande)->year }}</li>
    <li>sous le numéro : <span class="t-c"> {{ $demande->cod_demande }}</li>
</ul>
<p class="text-justify">Aussi, nous vous invitons à compléter votre demande d’inscription, en transmettant via cette   plateforme au niveau de votre espace, les documents (en format PDF) suivants :</p>
<ul class="text-justify">
    <li>La demande de remboursement de la cotisation globale de sécurité sociale, dûment renseignée et visée par vos soins, (selon le spécimen téléchargeable à partir de votre espace dans <a href="javascript:void(0)" class="text-primary toDownload">rubrique telechargement </a>)</li>
    <li>La décision d'octroi des avantages délivrée par la CNAS ;</li>
    <li>La liste des travailleurs concernés par la formation, visée par vos soins, (selon modèle CNAC téléchargeable à partir de votre espace dans <a href="javascript:void(0)" class="text-primary toDownload">rubrique telechargement </a> )</li>
    <li>La copie des contrats de formation dûment visés par le ou les organismes de formation ;</li>
    <li>La ou les copies des attestations de formation des concernés ;</li>
    <li>L’état de versement des cotisations de sécurité sociale au titre des travailleurs concernés dûment visés par vos soins pour la période des trois derniers mois à compter de la date de début de la formation.</li>
</ul>
<br />
<p><b><u>Important :</u></b></p>
<ul class="text-justify">
    <li>Un accusé de réception vous sera notifié via votre espace, dès réception de tous les documents exigés et tout dossier incomplet n’est pas recevable. </li>
    <li>Un traitement à votre demande vous sera assuré dans un délai n’excédant pas un (1) mois à partir de la date de l’accusé réception. </li>
    <li>Une notification vous sera délivrée via votre espace (cas d’accord ou de rejet).</li>
    <li>La remise la décision d’accord par les services de l’Agence CNAC - {{ $employeur->wilaya->des_fr }} - est subordonnée à la présentation obligatoire des documents originaux suivants :
        <ul class="text-justify">
            <li>La demande de remboursement de la cotisation globale de sécurité sociale, dûment renseignée et visée par vos soins ;</li>
            <li>La liste des travailleurs concernés par la formation, visée par vos soins ;</li>
            <li>La ou les attestations de formation des concernés ;</li>
            <li>L’état de versement des cotisations de sécurité sociale au titre des travailleurs concernés dûment visés par vos soins pour la période des trois derniers mois à compter de la date de début de la formation.</li>
        </ul>
    </li>
</ul>
<br />
<p class="text-right">
    <span>Le, {{ Carbon\Carbon::parse($demande->date_demande)->format("d-m-Y") }}</span>
</p>
<p class="text-right">
    <span>Les services de l’Agence CNAC - {{ $employeur->wilaya->des_fr }} - </span>
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
