@extends('layouts.administrateur')

@section('content')
{{-- {{ dd($demande->employeur) }} --}}
<div class="row" x-data="{ 
  decisionOpen:  @error('decision') true @else false @enderror,
  rejetOpen: @error('decision') true @else false @enderror,
  descriptionOpen: false,
  receptionOpen: @error('reception_dos') true @else false @enderror,
}">

  {{-- @can('update-dossier', $subvention) --}}
    <div class="element-content col-md-12">
      <div class="tablo-with-chart">
        <div class="row">
          @if ($demande->reception_dos && is_null($demande->decision_dos))
          
          <div class="col-12">
            @if ($demande->getDays())
              <p class=" alert alert-danger">
                <strong>Ref: {{ $demande->ref_reception }}</strong>
                <br>
                <strong>Date Reception du dossier: {{ $demande->date_reception_dos }}</strong>
                <br>
                Le délai de traitement a expiré depuis plus de {{ $demande->getDiffDate() }} jours.
              </p>
            @else
              <p class="alert alert-info">
                <strong>Ref: {{ $demande->ref_reception }}</strong>
                <br>
                <strong>Date Reception du dossier: {{ $demande->date_reception_dos }}</strong>
                <br>
                Le délai restant pour traiter le dossier est de {{ $demande->getDiffDate() }} jours.
              </p>
            @endif
          </div>
          @endif
          <div class="col-sm-12 col-xxl-12">
            <div class="tablos">
              <div class="row mb-xl-2 mb-xxl-3">
                <div class="col">
                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="#">
                    <div class="value mb-1" style="font-size: 1rem;">
                      inscription
                    </div>
                    <div class="label">
                      <img src="{{ asset('assets/admin/icon_fonts_assets/svgs/yes.svg') }}" width="50px" alt="">
                    </div>
                  </a>
                </div>
                <div class="col" 
                {{-- id="receptionDossierOpen"  --}}
                @click="receptionOpen= true"
                >
                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="#">
                    <div class="value mb-1" style="font-size: 1rem;">
                      réception du dossier 
                    </div>
                    <div class="label">
                      <img src="{{ asset('assets/admin/icon_fonts_assets/svgs') }}/{{ $demande->reception_dos ? 'yes.svg' : 'sand-clock.svg'}}" width="50px" alt="">
                    </div>
                  </a>
                </div>

                {{-- <div class="col">
                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="#">
                    <div class="value mb-1" style="font-size: 1rem;">
                      en cours de traitement
                    </div>
                    <div class="label">
                      <img src="{{ asset('assets/admin/icon_fonts_assets/svgs') }}/{{ $demande->reception_dos ? 'yes.svg' : 'sand-clock.svg'}}" width="50px" alt="">
                    </div>
                  </a>
                </div> --}}

                <div class="col " id="test" 
                @if (is_null($demande->decision_dos))
                  @click="decisionOpen = true"
                @endif
                >
                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="#">
                    <div class="value mb-1" style="font-size: 1rem;">
                      Notification d’accord ou de rejet
                    </div>
                    <div class="label">
                      @if (is_null($demande->decision_dos))
                        <img src="{{ asset('assets/admin/icon_fonts_assets/svgs/yes.svg') }}" width="50px" alt=""> 
                        <img src="{{ asset('assets/admin/icon_fonts_assets/svgs/cancel.svg') }}" width="50px" alt="">
                      @else
                        @if ($demande->decision_dos == true)
                          <img src="{{ asset('assets/admin/icon_fonts_assets/svgs/yes.svg') }}" width="50px" alt=""> 
                        @else
                          <img src="{{ asset('assets/admin/icon_fonts_assets/svgs/cancel.svg') }}" width="50px" alt="">
                        @endif
                      @endif
                      
                      
                    </div>
                  </a>
                </div>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  {{-- @endcan --}}
  <div class="col-sm-5">
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          Dossier Employeur
        </h6>
        <div class="timed-activities compact">
          <div class="timed-activity">
            <div class="ta-record-w">
              <div class="ta-record">
                @if (count($demande->files) !=0)
                <div class="element-box-tp" data-step="5" data-intro="Tout vos Documents Insérés, que vous pouvez les retéléchargés" >
                    
                    @foreach ($demande->files as $file)
                    <div class="profile-tile">
                        <a class="profile-tile-box"
                            href="{{ route('administrateur.telechargement',['fileID'=>$file->id]) }}">
                            <div class="pt-avatar-w">
                                <img alt="" src="{{ asset('assets/images/download.svg') }}">
                            </div>
                        </a>
                        <div class="profile-tile-meta">
                            <ul>
                                <li>
                                    <strong> {{ $file->file_type }} : </strong> {{ $file->title }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>Aucun fichier a été ajouter</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
          <h6 class="element-header">
            Information Employeur
          </h6>
          
        <form id="formValidate">
          <div class="row">
            {{-- <div class="col-sm-12">
              <h5>Inscription: {{ ($demande->employeur->type_loi == "sub") ? 'Subvention' : 'Formation' }}</h5>
            </div> --}}
            
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Nom</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->user->nom }}" disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Prenom</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->user->prenom }}" disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Code Employeur</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->code_employeur }}" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Email</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->user->email }}" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Email Entreprise</label>
                <input class="form-control" value="{{ $demande->employeur->email_entreprise }}" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Tel:</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->tel }}" disabled>
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Mob:</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->mob }}" disabled>
              </div>
            </div>

            <hr class="col-md-12">

            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Branche</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->branche->des_fr }}" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Statut Juridique</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->statuJuridique->des_fr }}" disabled>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Representant</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->representant }} - {{ $demande->employeur->representantAr }}" disabled>
              </div>
            </div>

            
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Qualite</label>
                <input class="form-control" value="{{ $demande->employeur->qualite }} - {{ $demande->employeur->qualiteAr }}" disabled>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Nbr Travailleurs</label>
                <input class="form-control" value="{{ $demande->nbr_travailleurs }}" disabled>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Sigle</label>
                <input class="form-control" value="{{ $demande->employeur->sigle }}" disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> NIF</label>
                <input class="form-control" value="{{ $demande->employeur->NIF }}" disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> NIS</label>
                <input class="form-control" value="{{ $demande->employeur->NIS }}" disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> RC</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->RC }}" disabled>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""> Wilaya</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->wilaya->des_fr }}" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Adresse</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->adresse }}" disabled>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""> Wilaya Ar</label>
                <input class="form-control" placeholder="Enter email" value="{{ $demande->employeur->wilaya->des_ar }}" disabled>
              </div>
            </div>
          </div>
        </form>
        <a href="{{ route('administrateur.employeurs.detail', ['code_employeur' => $demande->employeur->code_employeur]) }}" class="btn btn-primary btn-sm text-light">
          <i class="os-icon os-icon-grid-10"></i> Detail
        </a>
      </div>
    </div>
  </div>

  {{-- Modals --}}

@if (is_null($demande->decision_dos))
<div class="modal-container" x-show.transition="decisionOpen" style="display: none;">
  <div class="modal-content" @click.away="decisionOpen = false">
    <div class="container">
      <form class="row" method="post" action="{{ route('administrateur.subventions.store.decision') }}">
        @csrf
        <input type="hidden" name="code_employeur" value="{{ $demande->employeur->code_employeur }}">
        <input type="hidden" name="cod_demande" value="{{ $demande->cod_demande }}">
        <div class="form-group app-label mt-3 col-md-12">
          <div class="form-button">
            <label for="">Notification</label>
            <select class="form-control" name="decision" x-on:change="rejetOpen = ($event.target.value == 'A' ? false : true )">
                <option value="A"> Accorder</option>
                <option value="R" selected="{{ old('decision') == 'R' ? true: false }}"> Rejeter</option>
            </select>
            @error('decision')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        
        <div class="form-group app-label mt-1 col-md-12" x-show="rejetOpen">
          <label for="">Motif</label>
          <select class="form-control" name="motif" id="" x-on:change="descriptionOpen = ($event.target.value == 5) ? true : false">
            <option value="">Selection</option>
            @foreach (App\Models\Employeur::motifRejet() as $key => $motif)
                <option value="{{ $key }}">{{ $motif }}</option>
            @endforeach
          </select>
          @error('motif')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        
        <div class="col-md-12 form-group" x-show="descriptionOpen">
          <label for="description">Description</label>
          <textarea name="description" id="" rows="3" class="form-control"></textarea>
        </div>

        <div class="col-md-12 text-right">
          <button type="button" class="btn btn-sm btn-warning " @click="decisionOpen = false">Annuler</button>
          <button type="submit" class="btn btn-sm btn-primary">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif

@if (is_null($demande->decision_dos) && is_null($demande->employeur->reception_dos))
@if (is_null($demande->reception_dos ))
    
<div class="modal-container" x-show.transition="receptionOpen" style="display: none;">
  <div class="modal-content" @click.away="receptionOpen = false">
    <div class="container">
        <form class="row" method="post" action="{{route('administrateur.subventions.store.receptiondossier')}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="code_employeur" value="{{ $demande->employeur->code_employeur }}">
        <input type="hidden" name="cod_demande" value="{{ $demande->cod_demande }}">
        <input type="hidden" name="type_demande" value="subventions">
        <div class="form-group app-label mt-1 col-md-12">
          <label for="">Nature de depôt du dossier</label>
          <select class="form-control" name="nature_depot_dos" id="" >
            <option value="1">via la plateforme</option>
            <option value="2">Hybride (plateforme et dépôt agence)</option>
            <option value="3">dépôt Agence</option>
          </select>
          @error('nature_depot_dos')
            <p class="help is-danger text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group app-label mt-3 col-md-12">
          <div class="form-button">
            <label for="">Date Registre</label>
            <input type="text" name="date" class="form-control">
          </div>
          @error('nature_depot_dos')
            <p class="help is-danger text-danger">{{ $message }}</p>
          @enderror
        </div>
        
        <div class="form-group app-label mt-3 col-md-12">
          <div class="form-button">
            <label for="">Ref Registre</label>
            <input type="text" name="ref" class="form-control">
          </div>
          @error('nature_depot_dos')
            <p class="help is-danger text-danger">{{ $message }}</p>
          @enderror
        </div>
        <input type="hidden" name="code_employeur" value="{{ $demande->employeur->code_employeur }}">
        <div class="col-md-12 text-right">
          <button type="button" class="btn btn-sm btn-warning " @click="receptionOpen = false">Annuler</button>
          <button type="submit" class="btn btn-sm btn-primary">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif
@endif

{{-- @if (is_null($demande->decision_dos) && is_null($demande->employeur->reception_dos))
  <form action="" method="post" id="receptionDossierForm" style="display: hidden">
    @csrf
    <input type="hidden" name="code_employeur" value="{{ $demande->employeur->code_employeur }}">
  </form>
@endif --}}
  
</div>

@endsection

@section('scripts')
<script>
    function printFunction() {
        window.print();
    }
</script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <script>
        @if(is_null($demande->employeur->reception_dos) && is_null($demande->decision_dos))
        $('#receptionDossierOpen').on('click', function(){
          swal({
            title: "Voulez-vous vraiment mettre à jour la reception du dossier ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $('#receptionDossierForm').submit();
            } 
          });
        });
        @endif

    </script>
    {{-- <script>

      $('#test').on('click', function(){
        swal("décision d’accord ou de rejet", {
          buttons: 
            [
              'Accorder',
              'rejet',
            ],
            cancel: 'Fermer'
        })
        .then((value) => {
          switch (value) {
        
            case ["Accorder"]:
              swal("décision accorder");
              break;
        
            case "rejet":
              swal("Gotcha!", "décision rejeter", "success");
              break;
        
            default:
              swal("Operation Annuler");
          }
        });
      });
        
</script> --}}

@endsection
