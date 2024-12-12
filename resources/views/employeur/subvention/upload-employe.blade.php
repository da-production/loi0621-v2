@extends('layouts.employeur')
@php
    $code_file = [];
@endphp
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
<style>
  .diplay-none{
    display: none;
  }
    @media print {
    
    h*{
        font-size: 1.75rem;
    }

    p, span, b,u, li,a{
        font-size: 1.3rem;
    }
   .Printbutton{
        display:none;
    }
    .dont-print{
        display:none;
    }

    .mw{
        width:27cm !important;
        max-width:27cm !important;
    }
 }
 .help-button{
    position: fixed;
    bottom: 20px;
    left: 20px;
    font-size: 45px;
    text-decoration: none !important;
 }
</style>
<link href="{{ asset('assets/admin/bower_components/dropzone/dist/dropzone.css') }}" rel="stylesheet">
<link href="{{ asset('assets/admin/css/file-upload.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <x-employeur.espace-employeur-component :employeur="auth()->user()->employeur" />
    <div class="col-sm-8 mw">
        @if(session('sucess'))
            <div class="alert alert-success dont-print">
                {{session('sucess')}}
            </div>
        @endif
        <div class="alert alert-warning">
            <h3><i class="os-icon os-icon-alert-circle"></i> Important:</h3>
            <p> Une fois que les fichiers sont insérés, ils ne peuvent plus être modifiés</p>
            <p> Le format autorisé [PDF]</p>
            <p> La taille autorisée 2MO</p>
        </div>
        <div class="element-wrapper">
            <div class="element-box mw" data-step="2" data-intro="Espace reservé aux informations modifiables ...">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Insertion des Fichiers
                    </h6>
                
                    <div class="element-box">
                      @if (session()->has('listeTravailleursSuccess'))
                          <div class="alert alert-success">
                            <p>{{ session('listeTravailleursSuccess') }}</p>
                          </div>
                      @endif
                      <h5 class="form-header">
                        Liste des travailleurs recrutés par contrat à durée indéterminée CDI
                      </h5>
                      @if (is_null(auth()->user()->listeTravailleurs))
                      <form action="{{ route('subvention.upload.static') }}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="file-upload form-file-upload mb-1 listeTravailleurs ">
                              <label class="file-select form-group rounded-pill" for="listeTravailleurs">
                                  <div class="file-select-button" id="fileName">Choisir le fichier</div>
                                  <div class="file-select-name" id="noFilelisteTravailleurs">Aucun fichier choisi...</div>
                                  <input type="file" name="listeTravailleurs" id="listeTravailleurs">
                                  <input type="hidden" name="code_demande" value="{{ auth()->user()->subvention->cod_demande }}">
                              </label>
                          </div>
                          <button class="btn btn-primary" type="submit">Ajouter</button>
                      </form>
                      @else
                      <p>le fichier a déjà été inséré</p>
                      @endif
                    </div>
                
                    <div class="element-box">
                      @if (session()->has('justificatifSuccess'))
                          <div class="alert alert-success">
                            <p>{{ session('justificatifSuccess') }}</p>
                          </div>
                      @endif
                      <h5 class="form-header">
                        Justificatif de l’agence de placement à l’emploi pour les travailleurs recrutés.
                      </h5>
                      @if (is_null(auth()->user()->justificatif))
                      <form action="{{ route('subvention.upload.static') }}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="file-upload form-file-upload mb-1 justificatif ">
                              <label class="file-select form-group rounded-pill" for="justificatif">
                                  <div class="file-select-button" id="fileName">Choisir le fichier</div>
                                  <div class="file-select-name" id="noFilejustificatif">Aucun fichier choisi...</div>
                                  <input type="file" name="justificatif" id="justificatif">
                                  <input type="hidden" name="code_demande" value="{{ auth()->user()->subvention->cod_demande }}">
                              </label>
                          </div>
                          <button class="btn btn-primary" type="submit">Ajouter</button>
                      </form>
                      @else
                      <p>le fichier a déjà été inséré</p>
                      @endif
                    </div>
                
                    
                
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection


@section('sidebar')
<div class="content-panel dont-print">
    <div class="content-panel-close">
        <i class="os-icon os-icon-close"></i>
    </div>
    {{-- @include('partials.components.mon-espace-rightsidebar')

    @include('partials.components.formation-doc', ['files'=> $files]) --}}
    {{-- <x-employeur.demandes-component /> --}}

    <x-employeur.demandes-component />
    
    <x-employeur.subvention.download-component />

    <x-employeur.subvention.upload-component />


    {{-- @include('partials.components.formation-doc', ['files'=> $files]) --}}

</div>
<a href="javascript:void(0);" onclick="guide();" class="help-button">
    <i class="os-icon os-icon-help-circle"></i>
</a>
@endsection

@section('scripts')
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
<script>

    function printFunction() {
        window.print();
    }

    $('#telecharger').on("click", function(){
      $('#telecharger-list').slideToggle('fast');
    });
    function guide()
    {
        introJs().setOptions({
            nextLabel: 'suivant',
            prevLabel: 'précédent',
            doneLabel: 'Fermer',
        }).start();
    }

    
    /*
        Octroi script
    */
   function uploadFile($name){
        $("#"+$name).bind('change', function () {
            var filename = $("#"+$name).val();
            if (/^\s*$/.test(filename)) {
                $("."+$name).removeClass('active');
                $("#noFile"+$name).text("No file chosen...");
            }
            else {
                $("."+$name).addClass('active');
                $("#noFile"+$name).text(filename.replace("C:\\fakepath\\", ""));
            }
        });
   }
   uploadFile('octroi');
   uploadFile('decisionOctroi');
   uploadFile('listeTravailleurs');
   uploadFile('sdiSalaries');
   uploadFile('justificatif');
   
</script>
@endsection
