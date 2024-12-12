@extends('layouts.administrateur')

@section('content')


@section('styles')
@livewireStyles()
@endsection

<div class="element-wrapper">
    <div class="element-box-tp">
      <h5 class="form-header">
        Accueil
      </h5>
      <p>Liste des Demandes #Formation <strong>{{ $formations->total() }}</strong></p>
      <div class="element-box-tp">
        <!--------------------
        START - Controls Above Table
        -------------------->
        <!--------------------
        START - Table with actions
        ------------------  -->
        <div class="table-responsive">
          <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
              <tr>
                <th>
                    CODE DEMANDE
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
                  <livewire:employeur.search-formation-admin-wire />
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($formations as $formation)
                <tr>
                  <td>
                    {{ $formation->cod_demande }}
                  </td>
                  <td class="text-center">
                    {{ $formation->code_employeur }}
                  </td>
                  <td class="text-center">
                    {{ $formation->raison_social }}
                  </td>
                  <td>
                    {{ $formation->employeur->branche->des_fr }}
                  </td>
                  <td class="text-left">
                    {{ $formation->employeur->statuJuridique->des_fr }}
                  </td>
                  <td class="text-center">
                    @php
                        $total = $formation->files->count()
                    @endphp
                    ({{ $total }}/5)
                    @if ($total == 5)
                      <div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div>
                      <br />
                      <a class="badge badge-sm badge-primary" href="javascript:void(0)">Dossier Complet</a>
                    @else
                      <div class="status-pill yellow" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div>
                    @endif
                  </td>
                  <td class="text-center">
                    <span class="badge badge-{{ !is_null($formation->decision_dos) ? ( $formation->decision_dos ? 'success' : 'danger' ) : 'warning'  }}-inverted">{{ !is_null($formation->decision_dos) ? ( $formation->decision_dos ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'  }}</span>
                  </td>
                  <td class="row-actions">
                    {{-- <a href="#"><i class="os-icon os-icon-ui-49"></i></a>
                    <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a> --}}
                    <a href="{{ route('administrateur.formations.detail', ['cod_demande' => $formation->cod_demande]) }}" class="btn btn-primary btn-sm text-light">
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
          {{ $formations->links("vendor.pagination.default") }}
        </div>
        <!--------------------
        END - Controls below table
        -------------------->
      </div>
    </div>
  </div>
@endsection


@section('scripts')
    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection