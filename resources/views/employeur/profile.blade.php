{{-- 
    Read the document README.md
    route file: employeur.php
    @Route(
        url: '/employeur/profile'
        name: 'employeur.profile'
    )
    @Controller: EmployeurController
    @action: profile
    @variablies: [
      $employeur: object,
      $subvention: object,
      $formation: object,
      $files: empty Array
    ]
    @RouteCallingAction: [
        employeur.demande.store: POST METHOD
        employeur.profile.update: POST METHOD
        employeur.profile.update.employeur: POST METHOD
    ]
    @Compononents:[
      employeur/espace-employeur-component,
      employeur/demandes-component
      employeur/subvention.list-component
      employeur/formation.list-component
    ]
    @EloquentRelationships: []
    
    WARNING
    Add Comment for each changes you made
--}}
@extends('layouts.employeur')
@section('styles')
<link href="{{ asset('assets/admin/css/chat.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/datepiker.css') }}">
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
@livewireStyles
@endsection

@section('content')
<div class="row">
    {{-- <x-employeur.espace-employeur-component :employeur="$employeur" /> --}}
    <livewire:employeur.sidebar-information-wire />
    <div class="col-sm-8 mw">
        @if(session('sucess'))
            <div class="alert alert-success dont-print">
                <b>{{session('sucess')}}</b>
            </div>
        @endif

        <livewire:employeur.demande-wire />
        <div class="element-wrapper">
          
            <div class="element-box mw" data-step="3" data-intro="Dans cet onglet, vous pouvez modifier et mettre à jour vos informations d'employeur ainsi que celles de votre compte d'accès.">

                <livewire:employeur.update-profile-wire />
                <livewire:employeur.update-information-wire />
            </div>
        </div>
    </div>
</div>
@endsection


@section('sidebar')
<div class="content-panel dont-print" >
    <div class="content-panel-close">
        <i class="os-icon os-icon-close"></i>
    </div>
    {{-- @include('partials.components.mon-espace-rightsidebar')

    @include('partials.components.formation-doc', ['files'=> $files]) --}}
    {{-- <x-employeur.demandes-component /> --}}

    {{-- <x-employeur.subvention.list-component /> --}}
    <livewire:employeur.subvention-liste-wire />

    {{-- <x-employeur.formation.list-component /> --}}
    
    <livewire:employeur.formation-liste-wire />

    {{-- <x-employeur.static-file-component /> --}}
    {{-- @include('partials.components.formation-doc', ['files'=> $files]) --}}

</div>
<a href="javascript:void(0);" onclick="guide();" class="help-button">
    <i class="os-icon os-icon-help-circle"></i>
</a>

{{-- Start Chat Box --}}
{{-- <div id="chatPage" class="chat_page">
  <button onclick="openChatBox()" class="chat_button">
  <i id="chatOpen" class="os-icon os-icon-mail-07"></i>
</button>


<div id="chatbar" class="chat_box animated fadeInUp">
  <div class="chat_box_header">
    Ticket
  </div>
  <div id="chatBody" class="chat_box_body">
      @foreach ($tickets as $ticket)
          @if ($ticket->owner)
              <div class="chat_box_body_self msg mb-4">
                  {{ $ticket->content }}
                  <span class="status {{ App\Models\Ticket::Enum($ticket->status)['classname'] }}">
                      <i class="{{ App\Models\Ticket::Enum($ticket->status)['icon'] }}"></i>
                  </span>
              </div>
          @else
              <div class="chat_box_body_other msg">{{ $ticket->content }}</div>
          @endif
      @endforeach
  </div>
  <form class="chat_box_footer" id="employeur_chat">
    <input type="hidden" id="empID" value="{{ auth()->user()->employeur->id }}">
    <input type="hidden" name="owner" value="1">
    <input type="hidden" name="code_emeployeur" value="{{ auth()->user()->code_employeur }}">
    <input type="text" name="content" id="MsgInput" placeholder="Envoyer la reponse">
    <button><i class="os-icon os-icon-send"></i></button>
  </form>
</div>
</div> --}}
{{-- End Chat Box --}}
@endsection



@section('scripts')
@livewireScripts
{{-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> --}}
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/datepiker.js') }}"></script>
<script src="{{ asset('assets/js/datepiker-fr.js') }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    @if(session()->has('success'))
    swal({
            title: "Succès",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Fermer",
        });
    @endif

    @if(session()->has('error'))
    swal({
            title: "Attention",
            text: "{{ session('error') }}",
            icon: "warning",
            button: "Fermer",
            dangerMode: true
        });
    @endif

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
    $("#type").on('change',function(){
      var nbr = $('#nbr');
      var nbr_t = $('#nbr_t');
      var date_c = $('#date_change');
      if($(this).val() == '1')
      {
        nbr.text('Nombre des effectifs recrutés en CDI ');
        nbr.attr('placeholder','Nombre des effectifs recrutés en CDI ');
        date_c.text("Date de la demande de subvention ");
        nbr_t.attr('readonly',false);
        return true;
      }
      if($(this).val() == '2')
      {
        nbr.text('Nombre des effectifs mis en formation ');
        nbr.attr('placeholder','Nombre des effectifs mis en formation');
        date_c.text("Date de la demande du remboursement de la cotisation globale de sécurité sociale");
        nbr_t.attr('readonly',false);
        return true;
      }
        nbr.text('');
        date_c.text('');
        nbr_t.attr('readonly',true);
      return true;
    });


    //////////////////
    var ischatopen = false;
var ele = document.getElementById("chatbar");

function openChatBox()
{
    
  if(ischatopen == false)
    {
       ele.classList.add("toggle");
       ischatopen = true;
       document.getElementById("chatOpen").classList.remove("fa-comments");
document.getElementById("chatOpen").classList.add("fa-times");
      
    }
  else {
     ele.classList.remove("toggle");
     ischatopen = false;
    document.getElementById("chatOpen").classList.add("fa-comments");
document.getElementById("chatOpen").classList.remove("fa-times");
  }
  const chatbox = document.getElementById('chatBody');
chatbox.scrollTop = chatbox.clientHeight
}



function send()
{
  console.log("Here");
  var chatBody = document.getElementById("chatBody");
  var Clientmsg = document.getElementById("MsgInput").value;  
  document.getElementById('MsgInput').value = '';
  var divClient = document.createElement("div");
  divClient.classList.add("chat_box_body_self");
  
  divClient.innerHTML = Clientmsg;
  
  chatBody.append(divClient);
  
  
  var divBot = document.createElement("div");
  divBot.classList.add("chat_box_body_other");
  
  divBot.innerHTML = Clientmsg;
  setTimeout(function(){
  $('divBot').show();
}, 5000);
  chatBody.append(divBot);
  chatBody.scrollTop = chatBody.scrollHeight;
}
</script>
@endsection
