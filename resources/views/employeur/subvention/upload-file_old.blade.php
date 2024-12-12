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
@php
    $se1 = true;
    $se2 = true;
    $se3 = true;
    $se4 = true;
    $se5 = true;
@endphp
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
            <h6 class="element-header">
                Insertion des Fichiers
            </h6>
            <div class="element-box">
                @if (session()->has('octroiSuccess'))
                    <div class="alert alert-success">
                      <p>{{ session('octroiSuccess') }}</p>
                    </div>
                @endif
                <h5 class="form-header">
                  Demande d’octroi de la subvention mensuelle à l’emploi
                </h5>
                @foreach ($subventions as $subvention)
                    @if ($subvention->code_file == "se-1")
                        {{ $se1 = false }}
                    @endif
                @endforeach
                @if ($se1)
                <form action="{{ route('subvention.upload.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="file-upload form-file-upload mb-1 octroi ">
                        <label class="file-select form-group rounded-pill" for="octroi">
                            <div class="file-select-button" id="fileName">Choisir le fichier</div>
                            <div class="file-select-name" id="noFileoctroi">Aucun fichier choisi...</div>
                            <input type="file" name="octroi" id="octroi">
                            <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                            <input type="hidden" name="type" value="octroi">
                        </label>
                    </div>
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>
                @else
                <p class="text-left">le fichier a déjà été inséré
                  {{-- <a href="{{ route('employeur.profile.subvention.files.download') }}">
                  <br>
                    <img src="{{ asset('assets/images/download.svg') }}" width="50px" alt="">
                    <br>
                    Télécharger
                  </a> --}}
                </p>
                @endif
                
            </div>
        
            <div class="element-box">
              @if (session()->has('decisionOctroiSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('decisionOctroiSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                Decision d'octroi des avantages délivrée par la CNAS 
              </h5>
                @foreach ($subventions as $subvention)
                    @if ($subvention->code_file == "se-2")
                        {{ $se2 = false }}
                    @endif
                @endforeach
                @if ($se2)
                <form action="{{ route('subvention.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 decisionOctroi ">
                      <label class="file-select form-group rounded-pill" for="decisionOctroi">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFiledecisionOctroi">Aucun fichier choisi...</div>
                          <input type="file" name="decisionOctroi" id="decisionOctroi">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="decisionOctroi">
                      </label>
                  </div>
                  <button class="btn btn-primary" type="submit">Ajouter</button>
              </form>
              @else
              <p>le fichier a déjà été inséré</p>
              @endif
            </div>
        
            <div class="element-box">
              @if (session()->has('listeTravailleursSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('listeTravailleursSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                Liste des travailleurs recrutés par contrat à durée indéterminée CDI
              </h5>
              @foreach ($subventions as $subvention)
                    @if ($subvention->code_file == "se-3")
                        {{ $se3 = false }}
                    @endif
                @endforeach
                @if ($se3)
              <form action="{{ route('subvention.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 listeTravailleurs ">
                      <label class="file-select form-group rounded-pill" for="listeTravailleurs">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFilelisteTravailleurs">Aucun fichier choisi...</div>
                          <input type="file" name="listeTravailleurs" id="listeTravailleurs">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="listeTravailleurs">
                      </label>
                  </div>
                  <button class="btn btn-primary" type="submit">Ajouter</button>
              </form>
              @else
              <p>le fichier a déjà été inséré</p>
              @endif
            </div>
        
            <div class="element-box">
              @if (session()->has('sdiSalariesSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('sdiSalariesSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                CDI des salariés
              </h5>
              @foreach ($subventions as $subvention)
                    @if ($subvention->code_file == "se-4")
                        {{ $se4 = false }}
                    @endif
                @endforeach
                @if ($se4)
              <form action="{{ route('subvention.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 sdiSalaries ">
                      <label class="file-select form-group rounded-pill" for="sdiSalaries">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFilesdiSalaries">Aucun fichier choisi...</div>
                          <input type="file" name="sdiSalaries" id="sdiSalaries">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="sdiSalaries">
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
              @foreach ($subventions as $subvention)
                    @if ($subvention->code_file == "se-5")
                        {{ $se5 = false }}
                    @endif
                @endforeach
                @if ($se5)
              <form action="{{ route('subvention.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 justificatif ">
                      <label class="file-select form-group rounded-pill" for="justificatif">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFilejustificatif">Aucun fichier choisi...</div>
                          <input type="file" name="justificatif" id="justificatif">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="justificatif">
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
@endsection


@section('sidebar')
<div class="content-panel dont-print">
    <div class="content-panel-close">
        <i class="os-icon os-icon-close"></i>
    </div>

    <x-employeur.demandes-component />
    
    <x-employeur.subvention.download-component />


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
