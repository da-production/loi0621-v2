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
            
            @if(session('error'))
                <div class="alert alert-error dont-print">
                    {{session('error')}}
                </div>
            @endif
            @foreach (App\Models\File::TypeFormation() as $key => $tf)
            @php
                $code = true;
            @endphp
            <div class="element-box">
                @if (session()->has($key.'Success'))
                    <div class="alert alert-success">
                        <p>{{ session($key.'Success') }}</p>
                    </div>
                @endif
                <h5 class="form-header">
                    {{ $tf['title'] }}
                </h5>
                @foreach ($formations as $formation)
                    @if ($formation->code_file == $tf['code'])
                        {{ $code = false }}
                    @endif
                @endforeach
                @if ($code)
                <form action="{{ route('formation.upload.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="file-upload form-file-upload mb-1 {{ $key }} ">
                        <label class="file-select form-group rounded-pill" for="{{ $key }}">
                            <div class="file-select-button" id="fileName">Choisir le fichier</div>
                            <div class="file-select-name" id="noFile{{ $key }}">Aucun fichier choisi...</div>
                            <input type="file" name="{{ $key }}" id="{{ $key }}">
                            <input type="hidden" name="code_demande" value="{{ $cod_demande }}" id="">
                            <input type="hidden" name="type" value="{{ $key }}">
                        </label>
                        @error($key)
                            <p class="text-danger text-left">{{ $message }}</p>
                        @enderror
                        @error('code_demande')
                            <p class="text-danger text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </form>
                @else
                <p>le fichier a déjà été inséré</p>
                @endif
            </div>
            @endforeach
        
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
   @foreach (App\Models\File::TypeFormation() as $key => $value )
   uploadFile('{{ $key }}');
   @endforeach
   
</script>
@endsection
