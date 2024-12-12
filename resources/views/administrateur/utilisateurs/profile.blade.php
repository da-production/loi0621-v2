@extends('layouts.administrateur')

@section('content')
<div class="row">
  <div class="col-sm-5">
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          Statistique
        </h6>
        <div class="row">
          <div class="col-md-12">
          <a class="element-box el-tablo centered trend-in-corner smaller" href="#">
            <div class="label">
              Nombre d'Employeurs Inscrit
            </div>
            <div class="value">
              <table class="table table-lightborder table-bordered table-v-compact mb-0">
                <tbody>
                  <tr>
                    <td>
                      <strong>{{ $employeurs }}</strong>
                      <div class="balance-label smaller lighter text-nowrap">
                        Total
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            {{-- <div class="trending trending-up">
              <span></span><i class="os-icon os-icon-arrow-up6"></i>
            </div> --}}
          </a>
        </div>
          <div class="col-md-6 text-center">
            <div class="col-sm-12 d-none d-xxl-block">
              <div class="element-box less-padding">
                <h6 class="element-box-header text-center">
                  Subvention
                </h6>
                <div class="el-chart-w">
                  <canvas height="120" id="donutChart1" width="120"></canvas>
                  <div class="inside-donut-chart-label">
                    <strong>
                      {{ $sub }}  
                    </strong><span></span>
                  </div>
                </div>
                <div class="el-legend text-left">
                  <div class="legend-value-w">
                    <div class="legend-pin" style="background-color: #87fc57;"></div>
                    <div class="legend-value">
                      Traiter
                    </div>
                  </div>
                  <div class="legend-value-w">
                    <div class="legend-pin" style="background-color: #f86904;"></div>
                    <div class="legend-value">
                      No Traiter
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="col-sm-12 d-none d-xxl-block">
                <div class="element-box less-padding">
                  <h6 class="element-box-header text-center">
                    Formation
                  </h6>
                  <div class="el-chart-w">
                    <canvas height="120" id="donutChart2" width="120"></canvas>
                    <div class="inside-donut-chart-label">
                      <strong>
                        {{ $form }}  
                      </strong><span></span>
                    </div>
                  </div>
                  <div class="el-legend text-left">
                    <div class="legend-value-w">
                      <div class="legend-pin" style="background-color: #87fc57;"></div>
                      <div class="legend-value">
                        Traiter
                      </div>
                    </div>
                    <div class="legend-value-w">
                      <div class="legend-pin" style="background-color: #f86904;"></div>
                      <div class="legend-value">
                        No Traiter
                      </div>
                    </div>
                  </div>
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
          <form id="formValidate" action="{{ route('administrateur.update') }}" method="POST">
            @method('put')
          @csrf
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon os-icon-wallet-loaded"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Nom</label>
                <input class="form-control" name="nom" value="{{ auth()->user()->nom}}" >
              </div>
              @error('nom')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for=""> Prénom</label>
                <input class="form-control" name="prenom" value="{{ auth()->user()->prenom}}" >
              </div>
              @error('prenom')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Fonction</label>
                <input class="form-control" name="fonction" value="{{ auth()->user()->fonction}}" >
              </div>
              @error('fonction')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Role</label>
                <input class="form-control" value="{{ App\Models\Role::display(auth()->user()->role_id) }} " disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Wilaya</label>
                <input class="form-control" value="{{ auth()->user()->wilaya->des_fr }} " disabled>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Etat</label>
                <input class="form-control" value="{{ auth()->user()->status ? "Activé" : "Desactivé" }} " disabled>
              </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Email</label>
                  <input class="form-control" value="{{ auth()->user()->email}}" disabled>
                </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Nom d'Utilisateur</label>
                <input class="form-control" value="{{ auth()->user()->username}}" disabled>
              </div>
            </div>
            
            
            
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Mot de passe</label>
                  <input class="form-control" type="password" name="password" placeholder="************" >
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Confirmer le mot de passe</label>
                  <input class="form-control" type="password" name="password_confirmation" placeholder="************">
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-sm btn-primary">Modifier</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/admin/bower_components/chart.js/dist/Chart.min.js') }}"></script>
<script>
    function printFunction() {
        window.print();
    }
    // -----------------
    // init donut chart if element exists
    // -----------------
    
    if ($("#donutChart1").length) {
      var donutChart1 = $("#donutChart1");

      // donut chart data
      var data1 = {
        labels: [
          "No Traiter", "Traiter",
          ],
        datasets: [{
          data: [
            {{ $sub - $subDecision }}, {{ $subDecision }},
            ],
          backgroundColor: ["#f86904", "#87fc57", "#f86904", "#4ecc48"],
          hoverBackgroundColor: ["#333","#333","#333","#333"],
          borderWidth: 1,
          hoverBorderColor: '#87fc57'
        }]
      };

      // -----------------
      // init donut chart
      // -----------------
      new Chart(donutChart1, {
        type: 'doughnut',
        data: data1,
        options: {
          legend: {
            display: false
          },
          animation: {
            animateScale: true
          },
          cutoutPercentage: 80
        }
      });
    }

    if ($("#donutChart2").length) {
      var donutChart = $("#donutChart2");

      // donut chart data
      var data1 = {
        labels: [
          "No Traiter", "Traiter",
          ],
        datasets: [{
          data: [
            {{ $form }}, {{ $formDecision }},
            ],
          backgroundColor: ["#f86904", "#87fc57", "#f86904", "#4ecc48",],
          hoverBackgroundColor: ["#333","#333","#333","#333"],
          borderWidth: 1,
          hoverBorderColor: '#87fc57'
        }]
      };

      // -----------------
      // init donut chart
      // -----------------
      new Chart(donutChart, {
        type: 'doughnut',
        data: data1,
        options: {
          legend: {
            display: false
          },
          animation: {
            animateScale: true
          },
          cutoutPercentage: 80
        }
      });
    }
</script>
@endsection
