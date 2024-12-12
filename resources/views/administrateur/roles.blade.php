@extends('layouts.administrateur')

@section('content')


<div class="element-wrapper">
    <div class="element-box-tp">
      <h5 class="form-header">
        Accueil
      </h5>
      <div class="row mx-0 px-0">
        <div class="col-md-8 px-0 mx-0">
            List des Roles 
        </div>
    </div>
      <div class="element-box-tp">
        
        <div class="table-responsive">
          <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
              <tr>
                <th>
                    Role ID
                </th>
                <th>
                    Role
                </th>
                <th>
                    Descirption
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Role::display() as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                        <td>{{ App\Models\Role::description($key) }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
