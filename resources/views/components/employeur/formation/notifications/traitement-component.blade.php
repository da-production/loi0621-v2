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

<p class="text-justify">« {{ $employeur->wilaya->des_fr }} » le, « {{ Carbon\Carbon::parse($demande->date_traitement_dos)->format("d-m-Y") }} »</p>
<p class="text-justify">Nous vous informons que votre demande est en cours de traitement. </p>
<br />
<br>
<br>
<br>
<br><br>
<p class="text-right">
    <span>Les services de l’Agence CNAC - {{ $employeur->wilaya->des_fr }} - </span>
</p>

<p class="text-right">
    <button type='button' onClick='printFunction()' class="mt-5 btn btn btn-primary dont-print" role='button'>
        {{ (isset($_GET['lang']) && $_GET['lang'] == 'ar') ? 'طباعة' : 'Imprimer'}}
    </button>
</p>