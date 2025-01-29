@extends('layouts.administrateur')

@section('styles')
<link href="{{ asset('assets/admin/css/chat.css') }}" rel="stylesheet">
@livewireStyles()
@endsection
@section('content')
<livewire:employeur.print-employeur-wire :employeur="$employeur" />
<div class="row dont-print">
    <div class="col-sm-5">
        <div class="user-profile compact">
            
            <div class="up-controls">
                <livewire:employeur.check-employeur-status-cnas-admin-wire :code_employeur="$employeur->code_employeur" />
            </div>
            <div class="up-contents">
                <div class="m-b">
                    <div class="row m-b">
                        <div class="col-sm-6 b-r b-b">
                            <div class="el-tablo centered padded-v">
                                <div class="value">
                                    {{ count($employeur->subventions) }}
                                </div>
                                <div class="label">
                                    Subventions
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 b-b">
                            <div class="el-tablo centered padded-v">
                                <div class="value">
                                    {{ count($employeur->formations) }}
                                </div>
                                <div class="label">
                                    Formation
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="padded">
                        <div class="os-progress-bar primary">
                            {{-- <div class="bar-labels">
                                <div class="bar-label-left">
                                    <span></span><span class="positive"></span>
                                </div>
                                <div class="bar-label-right">
                                    <span class="info">Expiration</span>
                                </div>
                            </div>
                            <div class="bar-level-1" style="width: 100%">
                                <div class="bar-level-2" style="width: {{$devided}}%">
                                </div>
                            </div> --}}
                            
                            <p class="mt-3"><b>Date d'inscription:</b> {{ Carbon\Carbon::parse($employeur->created_at)->format('Y-m-d') }}</p>
                            
                            <p class="mt-2"><b>Date d'expiration:</b> {{ Carbon\Carbon::parse($employeur->created_at)->addYear(3)->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="element-wrapper">
            <div class="element-box">
                <h6 class="element-header">
                    Options
                </h6>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" onclick="window.print();">
                            <i class="os-icon os-icon-printer"></i>
                            Imprimer
                        </button>
                    </div>
                    @can('send-an-email', App\Models\Employeur::class)
                        <livewire:send-mail-to-employeur-wire :code_employeur='$employeur->code_employeur' />
                    @endcan
                </div>
                <livewire:administrateur.employeur-mails-wire :code_employeur="$employeur->code_employeur" />
            </div>
        </div>
        
    </div>
    <div class="col-sm-7">
        <div class="element-wrapper">
            <div class="element-box">
                <form id="formValidate">
                    <div class="element-info">
                        <div class="element-info-with-icon">
                            <div class="element-info-icon">
                                <div class="os-icon os-icon-wallet-loaded"></div>
                            </div>
                            <div class="element-info-text">
                                <h5 class="element-inner-header">
                                    Profil
                                </h5>
                            </div>
                        </div>
                    </div>
                    
                    <legend><span>Information Compte utilisateur</span></legend>
                    <div class="form-group">
                        <label for=""> Email</label>
                        <input class="form-control" placeholder="" required="required" type="email" value="{{ $employeur->user->email }}">
                        <div class="help-block form-text with-errors form-control-feedback"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for=""> Nom</label>
                                <input class="form-control" placeholder="Password" required="required" type="text" value="{{ $employeur->user->nom }}">
                                <div class="help-block form-text text-muted form-control-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Prenom</label>
                                <input class="form-control" equired="required" type="text" value="{{ $employeur->user->prenom }}">
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <select class="form-control">
                            <option value="{{ $employeur->user->cod_wilaya }}">({{ $employeur->user->wilaya->cod_wilaya }}) {{ $employeur->user->wilaya->des_fr }} - {{ $employeur->user->wilaya->des_ar }}</option>
                            @foreach (App\Models\Wilaya::all() as $wilaya)
                                @if ($wilaya->cod_wilaya != $employeur->user->cod_wilaya )
                                    <option value="{{ $wilaya->cod_wilaya  }}">({{ $wilaya->cod_wilaya  }}) {{ $wilaya->des_fr  }} {{ $wilaya->des_ar  }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-buttons-w">
                        <button class="btn btn-primary" type="submit"> Modifier</button>
                    </div>
                </form>
                <form action="">
                    <fieldset class="form-group">
                        <legend><span>Information Compte Employeur</span></legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""> Raison Social</label>
                                    <input class="form-control" placeholder="Password" required="required" type="text" value="{{ $employeur->raison_social }}" name="raison_social">
                                    <div class="help-block form-text text-muted form-control-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Raison Social AR</label>
                                    <input class="form-control" equired="required" type="text" value="{{ $employeur->raison_social_Ar }}" name="raison_social_Ar">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sigle</label>
                                    <input type="text" class="form-control" value="{{ $employeur->sigle }}" name="sigle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Code Employeur</label>
                                    <input type="text" class="form-control" value="{{ $employeur->code_employeur }}" name="code_employeur">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Representant</label>
                                    <input type="text" class="form-control" value="{{ $employeur->representant }}" name="representant">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">representant AR</label>
                                    <input type="text" class="form-control" value="{{ $employeur->representantAr }}" name="representantAr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Qualite</label>
                                    <input type="text" class="form-control" value="{{ $employeur->qualite }}" name="qualite">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Qualite AR</label>
                                    <input type="text" class="form-control" value="{{ $employeur->qualiteAr }}" name="qualiteAr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tel</label>
                                    <input type="text" class="form-control" value="{{ $employeur->tel }}" name="tel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mob</label>
                                    <input type="text" class="form-control" value="{{ $employeur->mob }}" name="mob">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email Entreprise</label>
                                    <input type="text" class="form-control" value="{{ $employeur->email_entreprise }}" name="email_entreprise">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">RIB</label>
                                    <input type="text" class="form-control" value="{{ $employeur->RIB }}" name="RIB">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIF</label>
                                    <input type="text" class="form-control" value="{{ $employeur->NIF }}" name="NIF">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIS</label>
                                    <input type="text" class="form-control" value="{{ $employeur->NIS }}" name="NIS">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">RC</label>
                                    <input type="text" class="form-control" value="{{ $employeur->RC }}" name="RC">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nbr Travailleurs</label>
                                    <input type="text" class="form-control" value="{{ $employeur->nbr_travailleurs }}" name="nbr_travailleurs">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-buttons-w">
                        <button class="btn btn-primary" type="submit"> Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Start Chat Box --}}
{{-- <div id="chatPage" class="chat_page dont-print">
    <button onclick="openChatBox()" class="chat_button">
    <i id="chatOpen" class="os-icon os-icon-mail-07"></i>
  </button>
  
  
  <div id="chatbar" class="chat_box animated fadeInUp">
    <div class="chat_box_header">
      Ticket
    </div>
    <div id="chatBody" class="chat_box_body">
        @foreach ($employeur->tickets as $ticket)
            @if ($ticket->owner)
                <div class="chat_box_body_other msg mb-4">
                    {{ $ticket->content }}
                    <span class="status {{ App\Models\Ticket::Enum($ticket->status)['classname'] }}">
                        <i class="{{ App\Models\Ticket::Enum($ticket->status)['icon'] }}"></i>
                    </span>
                </div>
            @else
                <div class="chat_box_body_self msg">{{ $ticket->content }}</div>
            @endif
        @endforeach
    </div>
    <form class="chat_box_footer" id="employeur_chat">
        <input type="hidden" id="empID" value="{{ $employeur->id }}">
        <input type="hidden" name="owner" value="0">
        <input type="hidden" name="code_emeployeur" value="{{ $employeur->code_employeur }}">
        <input type="text" name="content" id="MsgInput" placeholder="Envoyer la reponse">
        <button><i class="os-icon os-icon-send"></i></button>
    </form>
  </div>
</div> --}}
  
{{-- End Chat Box --}}
@endsection


@section('content-panel')
        <!--------------------
    START - Sidebar
    -------------------->
    <div class="content-panel">
        <div class="content-panel-close">
          <i class="os-icon os-icon-close"></i>
        </div>
        <div class="element-wrapper">
            <h6 class="element-header">
                Liste des demandes Subvention
            </h6>
            <div class="element-box-tp">
                @foreach ($employeur->subventions as $subvention)
                
                    <div class="activity-boxes-w">
                        <div class="activity-box-w">
                        <div class="activity-time">
                            <span>Cree le:</span>
                            {{ $subvention->created_at }}
                        </div>
                        <div class="activity-box border-right-{{ !is_null($subvention->decision_dos) ? ($subvention->decision_dos == 1 ? 'success' : 'danger' ) : 'warning'   }}">
                            <div class="activity-avatar">
                                <a class="btn btn-light btn-sm" href="{{ route('administrateur.subventions.detail', ['cod_demande' => $subvention->cod_demande]) }}"><i class="os-icon os-icon-wallet-loaded"></i> </a>
                            </div>
                            <div class="activity-info">
                            <div class="activity-role">
                                {{ $subvention->cod_demande }}
                            </div>
                            <strong class="activity-title">{{ !is_null($subvention->decision_dos) ? ($subvention->decision_dos == 1 ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'   }}</strong>
                            </div>
                        </div>
                        </div>
                    </div> 
                @endforeach
              
            </div>
        </div>

        <div class="element-wrapper">
            <h6 class="element-header">
                Liste des demandes Formation
            </h6>
            <div class="element-box-tp">
                @foreach ($employeur->formations as $formation)
                
                    <div class="activity-boxes-w">
                        <div class="activity-box-w">
                        <div class="activity-time">
                            <span>Cree le:</span>
                            {{ $formation->created_at }}
                        </div>
                        <div class="activity-box border-right-{{ !is_null($formation->decision_dos) ? ($formation->decision_dos == 1 ? 'success' : 'danger' ) : 'warning'   }}">
                            <div class="activity-avatar">
                                <a class="btn btn-light btn-sm" href="{{ route('administrateur.subventions.detail', ['cod_demande' => $formation->cod_demande]) }}"><i class="os-icon os-icon-wallet-loaded"></i> </a>
                            </div>
                            <div class="activity-info">
                            <div class="activity-role">
                                {{ $formation->cod_demande }}
                            </div>
                            <strong class="activity-title">{{ !is_null($formation->decision_dos) ? ($formation->decision_dos == 1 ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'   }}</strong>
                            </div>
                        </div>
                        </div>
                    </div> 
                @endforeach
              
            </div>
        </div>
      </div>
      <!--------------------
      END - Sidebar
      -------------------->
@endsection


@if (!$employeur->user->Expire)
    @if (Carbon\Carbon::now()->timestamp > Carbon\Carbon::parse($employeur->user->created_at)->addYear(3)->timestamp)
        @section('scripts')
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <script>
            swal({
                text: "l'employeur a atteint le delai de l'expiration",
                icon: "warning",
                button: "Fermer",
                dangerMode: true,
            });
        </script>
        @endsection
    @endif
    
@endif

@section('scripts')
@livewireScripts()
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
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
                
            }else{
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