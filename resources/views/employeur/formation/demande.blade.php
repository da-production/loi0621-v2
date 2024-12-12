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
        @if (auth()->user()->employeur->allowed)
        <div class="element-box mw">
            <div class="row">
                <div class="col-md-8">
                    Ajouter une nouvelle demande
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('subvention.demande.create') }}" class="btn btn-primary btn-sm">Ajouter</a>
                </div>
            </div>
        </div>
        @endif
        <div class="element-wrapper">
            <div class="element-box mw" data-step="2" data-intro="Espace reservé aux informations modifiables ...">
                @if (isset($_GET['notification']) && $_GET['notification'] == "accord")
                    @if (!is_null($demande->decision_dos) && $demande->decision_dos)

                        <x-employeur.formation.notifications.decision-accord-component :employeur='auth()->user()->employeur' :demande="$demande" />
                    @else
                        <div class="alert alert-danger">
                            <b>vous n'êtes pas autorisé à accéder à cette page en utilisant l'URL</b>
                        </div>
                    @endif
                @elseif(isset($_GET['notification']) && $_GET['notification'] == "rejet")
                    @if (!is_null($demande->decision_dos) && !$demande->decision_dos)
                        <x-employeur.formation.notifications.decision-rejet-component :employeur='auth()->user()->employeur' :demande="$demande" />
                    @else
                        <div class="alert alert-danger">
                            <b>vous n'êtes pas autorisé à accéder à cette page en utilisant l'URL</b>
                        </div>
                    @endif
                @elseif(isset($_GET['notification']) && $_GET['notification'] == "reception")

                    @if (!is_null($demande->reception_dos))
                        <x-employeur.formation.notifications.reception-component :employeur='auth()->user()->employeur' :demande="$demande" />
                    @else
                        <div class="alert alert-danger">
                            <b>vous n'êtes pas autorisé à accéder à cette page en utilisant l'URL</b>
                        </div>
                    @endif
                @elseif(isset($_GET['notification']) && $_GET['notification'] == "traitement")
                    @if (!is_null($demande->traitement_dos))
                        <x-employeur.formation.notifications.traitement-component :employeur='auth()->user()->employeur' :demande="$demande" />
                    @else
                        <div class="alert alert-danger">
                            <b>vous n'êtes pas autorisé à accéder à cette page en utilisant l'URL</b>
                        </div>
                    @endif
                @else
                
                    @if (isset($_GET['lang']) && $_GET['lang'] == "ar")
                        <x-employeur.formation.notifications.arabe.confirmation-component :employeur='auth()->user()->employeur' :demande="$demande" />
                    @else
                        <x-employeur.formation.notifications.confirmation-component :employeur='auth()->user()->employeur' :demande="$demande" />
                    @endif   
 
                @endif
                {{-- <x-employeur.upload-component /> --}}
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
    
    {{-- @if (is_null(auth()->user()->lastFormation))
    <div class="element-wrapper pb-1" data-step="4" data-intro="Rubrique de Téléchargement et d'Insertion, 
    ici vous trouverez les fichiers à télécharger ainsi que ceux à insérer" >
        <div class="element-box-tp">
            <div class="el-buttons-list full-width">
            <a class="btn btn-primary btn-sm" href="{{ route('formation.demande.create') }}" id="telecharger">
                <i class="os-icon os-icon-plus"></i> <span>Ajouter Une nouvelle demande</span>
            </a>
            </div>
        </div>
    </div>
    @endif --}}

    <x-employeur.subvention.notifications.panel-component :demande="$demande" />

    {{-- <x-employeur.demandes-component /> --}}
    
    <x-employeur.formation.download-component />


    <div class="element-wrapper" data-step="4" data-intro="">
        <div class="element-box-tp">
            <div class="el-buttons-list full-width">
                <div class="profile-tile profile-tile-inlined" >
                    <a class="profile-tile-box faded" style="width: 100%" href="{{ route('formation.upload.employeur.show',['code_demande' => $demande->cod_demande]) }}" >
                    <div class="pt-new-icon">
                        <i class="os-icon os-icon-plus"></i>
                    </div>
                    <div class="pt-user-name">
                        A Inserer
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-employeur.subvention.upload-component /> --}}

    

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
