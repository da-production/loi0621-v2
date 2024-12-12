@extends('layouts.employeur')

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
        <div class="element-wrapper">
            <div class="element-box mw" data-step="2" data-intro="Espace reservé aux informations modifiables ...">

                <form action="{{ route('formation.demande.store') }}" method="post" class="mt-5">
                    @csrf
                    <div class="element-info">
                      <div class="element-info-with-icon">
                        <div class="element-info-icon">
                          <div class="os-icon os-icon-wallet-loaded"></div>
                        </div>
                        <div class="element-info-text">
                          <h5 class="element-inner-header">
                            Employeur
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre d'employés</label>
                      <input class="form-control" value="{{old('nbr_travailleurs')}}" name="nbr_travailleurs" required="required" type="number">
                    </div>
                    <div class="form-buttons-w">
                      <button class="btn btn-primary" type="submit"> Ajouter</button>
                    </div> 
                </form>
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
    <x-employeur.demandes-component />

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
</script>
@endsection
