@extends('layouts.administrateur')

@section('content')


<div class="element-wrapper">
    <div class="element-box-tp">
      <h5 class="form-header">
        Accueil
      </h5>
      <p>Liste des Demandes #Subvention </p>
      <div class="element-box-tp">
        <!--------------------
        START - Controls Above Table
        -------------------->
        {{-- <div class="controls-above-table">
          <div class="row">
            <div class="col-sm-12">
              <form class="form-inline justify-content-sm-end">
                <input class="form-control form-control-sm rounded bright" placeholder="Search" type="text"><select class="form-control form-control-sm rounded bright">
                  <option selected="selected" value="">
                    option
                  </option>
                </select>
              </form>
            </div>
          </div>
        </div> --}}
        <!--------------------
        END - Controls Above Table
        ------------------          --><!--------------------
        START - Table with actions
        ------------------  -->
        <div class="table-responsive">
          <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
              <tr>
                <th>
                    Numero
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
              </tr>
            </thead>
            <tbody>
              @foreach ($employeurs as $employeur)
                <tr>
                  <td>
                    {{ $employeur->cod_demande }}
                  </td>
                  <td class="text-center">
                    {{ $employeur->code_employeur }}
                  </td>
                  <td class="text-center">
                    {{ $employeur->raison_social }}
                  </td>
                  <td>
                    {{ $employeur->branche->des_fr }}
                  </td>
                  <td class="text-left">
                    {{ $employeur->statuJuridique->des_fr }}
                  </td>
                  <td class="row-actions">
                    {{-- <a href="#"><i class="os-icon os-icon-ui-49"></i></a>
                    <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a> --}}
                    <a href="{{ route('administrateur.subventions.detail', ['cod_demande' => $employeur->cod_demande]) }}" class="btn btn-primary btn-sm text-light">
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
          {{ $employeurs->links("vendor.pagination.default") }}
        </div>
        <!--------------------
        END - Controls below table
        -------------------->
      </div>
    </div>
  </div>
@endsection