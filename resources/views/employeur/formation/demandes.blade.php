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
    {{-- <x-employeur.espace-employeur-component :employeur="auth()->user()->employeur" /> --}}
      <livewire:employeur.sidebar-information-wire />
    <div class="col-sm-8 mw">
        @if(session('sucess'))
            <div class="alert alert-success dont-print">
                {{session('sucess')}}
            </div>
        @endif
        @if (count(auth()->user()->employeur->formations) == 0)
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

              <table class="table">
                <thead>
                  <tr>
                    <th>Code Demande</th>
                    <th>Nbr des Travailleurs</th>
                    <th>Etat</th>
                    <th></th>
                  </tr>
                </thead>
                @foreach ($formations as $formation)
                  <tr>
                    <td>{{ $formation->cod_demande }}</td>
                    <td>{{ $formation->nbr_travailleurs }}</td>
                    <td><span class="badge badge-{{ !is_null($formation->decision_dos) ? 'danger' : 'success' }}-inverted">{{ !is_null($formation->decision_dos) ? 'Cloturé' : 'En cours' }}</span></td>
                    <td><a href="{{ route('formation.demande.detail', ['num_dossier' => $formation->cod_demande]) }}">Detail</a></td>
                  </tr>
                @endforeach
              </table>
                
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
