@extends('layouts.administrateur')

@section('content')


<div class="element-wrapper">
    <div class="element-box-tp">
      <h5 class="form-header">
        Accueil
      </h5>
      <div class="row mx-0 px-0">
        <div class="col-md-8 px-0 mx-0">
            List des Branches 
        </div>
    </div>
      <div class="element-box-tp">
        
        <div class="table-responsive">
          <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
              <tr>
                <th>
                    Code Branche
                </th>
                <th>
                    Descirption FR
                </th>
                <th>
                    Descirption AR
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($branches as $branche)
                    <tr>
                        <td>{{ $branche->cod_branche }}</td>
                        <td>{{ $branche->des_fr }}</td>
                        <td>{{ is_null($branche->des_Ar) ? 'nul' : $branche->des_Ar }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
