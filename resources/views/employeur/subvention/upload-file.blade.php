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
            <p> Le format autorisé [{{ $options['mime_types'] }}]</p>
            <p> La taille autorisée {{ $options['max_user_file_upload'] }}MO</p>
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
            @foreach (App\Models\File::TypeSubvention() as $key => $ts)
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
                    {{ $ts['title'] }}
                </h5>
                @foreach ($subventions as $subvention)
                    @if ($subvention->code_file == $ts['code'])
                        {{ $code = false }}
                    @endif
                @endforeach
                <livewire:file-upload typedemande="subventions" :fileName="$key" :code_demande="$cod_demande" :type="$key" :code_employeur="auth()->user()->employeur->code_employeur" />

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
    @foreach (App\Models\File::TypeSubvention() as $key => $value )
        uploadFile('{{ $key }}');
    @endforeach
</script>
@endsection
