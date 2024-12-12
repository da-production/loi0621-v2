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
      <p>List des Employeur ({{ $employeurs->total() }})</p>
      <div class="element-box-tp">
        
        <!--------------------
        START - Table with actions
        ------------------  -->
        <div class="table-responsive">
          <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
              <tr>
                <th>
                    Wilaya
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
                    Nbr (Subventions / Formations)
                </th>
                <th>
                    Etat
                </th>
                <th>
                    Date d'Inscription
                </th>
                <th>
                    Date d'expiration
                </th>
                <th>
                  <livewire:employeur.search-admin-wire />
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employeurs as $employeur)
              @if (is_null($employeur->employeur))
              <tr class="table-warning">
                <td class="text-center">
                    {{ $employeur->wilaya->des_fr }} - {{ $employeur->wilaya->des_ar }}
                </td>
                <td class="text-center">
                  {{ $employeur->code_employeur }}
                </td>
                <td class="text-center" colspan="8">
                  <span>Inscription non Compete </span>
                </td>
                </td>
              </tr>
              @else
              <tr>
                <td class="text-center">
                    {{ $employeur->wilaya->des_fr }} - {{ $employeur->wilaya->des_ar }}
                </td>
              <td class="text-center">
                {{ $employeur->code_employeur }}
              </td>
              <td class="text-center">
                {{ $employeur->employeur->raison_social }}
              </td>
              <td>
                {{ $employeur->employeur->branche->des_fr  }}
              </td>
              <td class="text-left">
                {{ $employeur->employeur->statuJuridique->des_fr  }}
              </td>
              <td class="text-center">
                  ({{ count($employeur->employeur->subventions) }} / {{ count($employeur->employeur->formations) }})
              </td>
              <td class="text-center">
                <span class="badge badge-{{ !$employeur->employeur->Expired ? 'success' : 'danger'  }}-inverted">{{ !$employeur->employeur->Expired ? 'Activé' : 'Expiré'  }}</span>
              </td>
              <td>
                {{ Carbon\Carbon::parse($employeur->employeur->created_at)->format('Y-m-d') }}
              </td>
              <td class="text-center">
                  {{ Carbon\Carbon::parse($employeur->employeur->created_at)->addYear(3)->format('Y-m-d') }}
              </td>
              <td class="row-actions">
                {{-- <a href="#"><i class="os-icon os-icon-ui-49"></i></a>
                <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a> --}}
                <a href="{{ route('administrateur.employeurs.detail', ['code_employeur' => $employeur->employeur->code_employeur]) }}" class="btn btn-primary btn-sm text-light">
                    <i class="os-icon os-icon-grid-10"></i> Detail
                </a>
              </td>
            </tr>
              @endif
                
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
          {{ $employeurs->links("vendor.pagination.default") }}
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