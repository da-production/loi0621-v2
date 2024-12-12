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
    $fe1 = true;
    $fe2 = true;
    $fe3 = true;
    $fe4 = true;
    $fe5 = true;
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
                @if (session()->has('remboursementSuccess'))
                    <div class="alert alert-success">
                      <p>{{ session('remboursementSuccess') }}</p>
                    </div>
                @endif
                <h5 class="form-header">
                    Demande de remboursement de la cotisation globale de sécurité sociale
                </h5>
                @foreach ($formations as $formation)
                    @if ($formation->code_file == "fe-1")
                        {{ $fe1 = false }}
                    @endif
                @endforeach
                @if ($fe1)
                <form action="{{ route('formation.upload.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="file-upload form-file-upload mb-1 remboursement ">
                        <label class="file-select form-group rounded-pill" for="remboursement">
                            <div class="file-select-button" id="fileName">Choisir le fichier</div>
                            <div class="file-select-name" id="noFileremboursement">Aucun fichier choisi...</div>
                            <input type="file" name="remboursement" id="remboursement">
                            <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                            <input type="hidden" name="type" value="remboursement">
                        </label>
                    </div>
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>
                @else
                <p class="text-left">le fichier a déjà été inséré
                  {{-- <a href="{{ route('employeur.profile.formation.files.download') }}">
                  <br>
                    <img src="{{ asset('assets/images/download.svg') }}" width="50px" alt="">
                    <br>
                    Télécharger
                  </a> --}}
                </p>
                @endif
                
            </div>
        
            <div class="element-box">
              @if (session()->has('listeTravailleursSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('listeTravailleursSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                Liste des travailleurs concernés par la formation
              </h5>
                @foreach ($formations as $formation)
                    @if ($formation->code_file == "fe-2")
                        {{ $fe2 = false }}
                    @endif
                @endforeach
                @if ($fe2)
                <form action="{{ route('formation.upload.store') }}" enctype="multipart/form-data" method="POST">
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
              @if (session()->has('contratsSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('contratsSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                Contrats de formation 
              </h5>
              @foreach ($formations as $formation)
                    @if ($formation->code_file == "fe-3")
                        {{ $fe3 = false }}
                    @endif
                @endforeach
                @if ($fe3)
              <form action="{{ route('formation.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 contrats ">
                      <label class="file-select form-group rounded-pill" for="contrats">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFilecontrats">Aucun fichier choisi...</div>
                          <input type="file" name="contrats" id="contrats">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="contrats">
                      </label>
                  </div>
                  <button class="btn btn-primary" type="submit">Ajouter</button>
              </form>
              @else
              <p>le fichier a déjà été inséré</p>
              @endif
            </div>
        
            <div class="element-box">
              @if (session()->has('attestationsFormationSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('attestationsFormationSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                Attestations de formation 
              </h5>
              @foreach ($formations as $formation)
                    @if ($formation->code_file == "fe-4")
                        {{ $fe4 = false }}
                    @endif
                @endforeach
                @if ($fe4)
              <form action="{{ route('formation.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 attestationsFormation ">
                      <label class="file-select form-group rounded-pill" for="attestationsFormation">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFileattestationsFormation">Aucun fichier choisi...</div>
                          <input type="file" name="attestationsFormation" id="attestationsFormation">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="attestationsFormation">
                      </label>
                  </div>
                  <button class="btn btn-primary" type="submit">Ajouter</button>
              </form>
              @else
                <p>le fichier a déjà été inséré</p>
              @endif
            </div>
        
            <div class="element-box">
              @if (session()->has('etatVersementSuccess'))
                  <div class="alert alert-success">
                    <p>{{ session('etatVersementSuccess') }}</p>
                  </div>
              @endif
              <h5 class="form-header">
                Etat de versement des cotisations de sécurité sociale au titre des travailleurs concernés
              </h5>
              @foreach ($formations as $formation)
                    @if ($formation->code_file == "fe-5")
                        {{ $fe5 = false }}
                    @endif
                @endforeach
                @if ($fe5)
              <form action="{{ route('formation.upload.store') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="file-upload form-file-upload mb-1 etatVersementv ">
                      <label class="file-select form-group rounded-pill" for="etatVersementv">
                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                          <div class="file-select-name" id="noFileetatVersementv">Aucun fichier choisi...</div>
                          <input type="file" name="etatVersementv" id="etatVersementv">
                          <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                          <input type="hidden" name="type" value="etatVersementv">
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
    
    <x-employeur.formation.download-component />


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
   uploadFile('remboursement');
   uploadFile('listeTravailleurs');
   uploadFile('contrats');
   uploadFile('attestationsFormation');
   uploadFile('etatVersementv');
   
</script>
@endsection
