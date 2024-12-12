@extends('layouts.administrateur')

@section('content')

@section('styles')
@livewireStyles()
@endsection


<div class="element-wrapper">
    <div class="element-box-tp">
      <h5 class="form-header">
        Subventions
      </h5>
      <p>Liste des Demandes #Subvention <strong>{{ $subventions->total() }}</strong> </p>
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
                  <livewire:employeur.search-subvention-admin-wire />
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subventions as $subvention)
                <tr>
                  <td>
                    {{ $subvention->cod_demande }}
                  </td>
                  <td class="text-center">
                    {{ $subvention->code_employeur }}
                  </td>
                  <td class="text-center">
                    {{ is_null($subvention->employeur) ? '' : $subvention->employeur->raison_social }}
                  </td>
                  <td>
                    {{ is_null($subvention->employeur) ? '' : $subvention->employeur->branche->des_fr }}
                  </td>
                  <td class="text-left">
                    {{ is_null($subvention->employeur) ? '' : $subvention->employeur->statuJuridique->des_fr }}
                  </td>
                  <td class="text-center">
                    @php
                        $total = $subvention->files->count()
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
                    <span class="badge badge-{{ !is_null($subvention->decision_dos) ? ( $subvention->decision_dos ? 'success' : 'danger' ) : 'warning'  }}-inverted">{{ !is_null($subvention->decision_dos) ? ( $subvention->decision_dos ? 'Notification accord' : 'Notification rejet' ) : 'En Cours'  }}</span>
                  </td>
                  <td class="row-actions">
                    {{-- <a href="#"><i class="os-icon os-icon-ui-49"></i></a>
                    <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a> --}}
                    <a href="{{ route('administrateur.subventions.detail', ['cod_demande' => $subvention->cod_demande]) }}" class="btn btn-primary btn-sm text-light">
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
          {{ $subventions->links("vendor.pagination.default") }}
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