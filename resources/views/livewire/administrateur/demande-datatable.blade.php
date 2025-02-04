<div class="element-box-tp">
    <div class="mx-0 mb-3 d-flex justify-between" style="gap: 15px">
        
        <div class="col-4  ">
            <h5 class="form-header">
                Accueil
            </h5>
            <p>Liste des Demandes #{{ $entity }} <strong>{{ $demandes->total() }}</strong> </p>
        </div>
        <div class="col-8 d-flex justify-content-end" style="gap: 15px">
            <div >
                <label for="paginate">Per Page</label>
                <select class="form-control" wire:model="paginate">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
            <div>
                <label for="paginate">Etat</label>
                <select class="form-control" wire:model="decision_dos">
                    <option value="">Tous</option>
                    <option value="A">Accord</option>
                    <option value="R">Rejet</option>
                </select>
            </div>
            <div>
                <label for="paginate">Order</label>
                <select class="form-control" wire:model="order">
                    <option value="ASC">ASC</option>
                    <option value="DESC">DESC</option>
                </select>
            </div>
        </div>
    </div>
    <div class="element-box-tp">
      <!--------------------
      START - Table with actions
      ------------------  -->
      <div class="table-responsive">
        <table class="table table-bordered table-lg table-v2 table-striped">
          <thead>
            <tr>
              <th>
                  Code demande
              </th>
              <th>
                  Code Employeur (CNAS)
              </th>
              <th>
                  Raison sociale
              </th>
              <th>
                  Branches
              </th>
              <th>
                  Statut Juridique
              </th>
              <th>
                  Fichiers
              </th>
              <th>
                  Etat
              </th>
              <th>
                  Date
              </th>
              <th>
                @if($model == 'App\Models\Formation')
                <livewire:employeur.search-formation-admin-wire  />
                @else
                <livewire:employeur.search-subvention-admin-wire  />
                @endif
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($demandes as $demande)
                @php
                    $className = '';
                    if ($demande->reception_dos && is_null($demande->decision_dos)){

                        if (now()->gte(Carbon\Carbon::parse($demande->date_reception_dos)->addDays(15))){
                            $className = 'table-warning';
                        }else{
                            $className = 'table-info';
                        }
                    }
          
                @endphp
              <tr class="{{ $className }}">
                <td>
                  {{ $demande->cod_demande }}
                </td>
                <td class="text-center">
                  {{ $demande->code_employeur }}
                </td>
                <td class="text-center">
                  {{ is_null($demande->employeur) ? '' : $demande->employeur->raison_social }}
                </td>
                <td>
                  {{ is_null($demande->employeur) ? '' : $demande->employeur->branche->des_fr }}
                </td>
                <td class="text-left">
                  {{ is_null($demande->employeur) ? '' : $demande->employeur->statuJuridique->des_fr }}
                </td>
                <td class="text-center">
                  ({{ $demande->files->count() }}/5)
                  @if ($demande->files->count() == 5)
                    <div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div>
                    <br />
                    <a class="badge badge-sm badge-primary" href="javascript:void(0)">Dossier Complet</a>
                  @else
                    <div class="status-pill yellow" data-title="Incomplete" data-toggle="tooltip" data-original-title="" title=""></div>
                  @endif
                </td>
                <td class="text-center">
                  @if (is_null($demande->annuler))
                      
                  <span class="badge badge-{{ !is_null($demande->decision_dos) ? ( $demande->decision_dos ? 'success' : 'danger' ) : 'warning'  }}-inverted">{{ !is_null($demande->decision_dos) ? ( $demande->decision_dos ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'  }}</span>
                  @else
                  <span class="badge badge-info">Annuler</span>
                      
                  @endif
                </td>
                <td class="text-center">
                  {{ $demande->getRawOriginal('created_at') }}
                </td>
                <td class="row-actions">
                  
                  <a href="{{ route("administrateur.".$entity."s.detail", ['cod_demande' => $demande->cod_demande]) }}" class="btn btn-primary btn-sm text-light">
                      <i class="os-icon os-icon-grid-10"></i> Suivi
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--------------------
      END - Table with actions
      ------------------            --><!--------------------
      START - Controls below table
      ------------------  -->
      <div class="controls-below-table">
        <div class="table-records-info">
          {{-- Showing records 1 - 5 --}}
        </div>
        {{ $demandes->links() }}
      </div>
      <!--------------------
      END - Controls below table
      -------------------->
    </div>
  </div>