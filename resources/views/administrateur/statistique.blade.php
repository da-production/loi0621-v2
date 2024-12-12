@extends('layouts.administrateur')

@section('content')


<div class="element-wrapper">
    <div class="element-box-tp">
        <h5 class="form-header">
            Statistique
        </h5>
        <div class="element-box-tp">
            <div class="row">
                <div class="col-sm-12 col-xxxl-9">
                    <div class="element-wrapper">
                        <div class="element-box">
                            <div class="os-tabs-w">
                                <div class="os-tabs-controls">
                                    <ul class="nav nav-tabs smaller">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab_overview">Demandes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#employeur">Employeurs</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_overview">
                                        <div class="el-tablo bigger">
                                            <div class="label">
                                                Total
                                            </div>
                                            <div id="totalDemande" class="value">
                                                
                                            </div>
                                        </div>
                                        <div class="el-chart-w">
                                            <canvas height="150px" id="lineChart2" width="600px"></canvas>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="employeur">
                                        <div class="el-tablo bigger">
                                            <div class="label">
                                                Total
                                            </div>
                                            <div id="totalEmployeur" class="value">
                                                
                                            </div>
                                        </div>
                                        <div class="el-chart-w">
                                            <canvas height="150px" id="employeurChart" width="600px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-xxxl-block col-xxxl-3">
                    <div class="element-wrapper">
                        <h6 class="element-header">
                            Visiteurs par navigateur
                        </h6>
                        <div class="element-box less-padding">
                            <div class="el-chart-w">
                                <canvas height="120" id="donutChart1" width="120"></canvas>
                                <div class="inside-donut-chart-label">
                                    <strong>12</strong><span>Total</span>
                                </div>
                                <p class="text-danger">Widget en maintenance</p>
                            </div>
                            <div class="el-legend condensed">
                                <div class="row">
                                    <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                                        <div class="legend-value-w">
                                            <div class="legend-pin legend-pin-squared"
                                                style="background-color: #6896f9;"></div>
                                            <div class="legend-value">
                                                <span>Safari</span>
                                                <div class="legend-sub-value">
                                                    17%, 12 Visits
                                                </div>
                                            </div>
                                        </div>
                                        <div class="legend-value-w">
                                            <div class="legend-pin legend-pin-squared"
                                                style="background-color: #85c751;"></div>
                                            <div class="legend-value">
                                                <span>Chrome</span>
                                                <div class="legend-sub-value">
                                                    22%, 763 Visits
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-none d-xxxxl-block">
                                        <div class="legend-value-w">
                                            <div class="legend-pin legend-pin-squared"
                                                style="background-color: #806ef9;"></div>
                                            <div class="legend-value">
                                                <span>Firefox</span>
                                                <div class="legend-sub-value">
                                                    3%, 7 Visits
                                                </div>
                                            </div>
                                        </div>
                                        <div class="legend-value-w">
                                            <div class="legend-pin legend-pin-squared"
                                                style="background-color: #d97b70;"></div>
                                            <div class="legend-value">
                                                <span>Explorer</span>
                                                <div class="legend-sub-value">
                                                    15%, 45 Visits
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
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.get("{{ route('administrateur.statistique.api') }}")
    .then(response => {
        console.log(response)
        $("#totalDemande").text(response.data.data.totalDemande);
        $("#totalEmployeur").text(response.data.data.employeurs.reduce((a, b) => a + b));
        // init line chart if element exists
        if ($("#lineChart2").length) {
            let lineChart2 = $("#lineChart2");

            // line chart data
            let lineData2 = {
                labels: response.data.wilayas,
                datasets: [{
                    type: 'line',
                    label: "Subvention",
                    fill: false,
                    lineTension: 0.3,
                    backgroundColor: "#fff",
                    borderColor: "#047bf8",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#141E41",
                    pointBorderWidth: 3,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "#FC2055",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: response.data.data.subventions,
                    spanGaps: false
                },{
                    type: 'line',
                    label: "Formation",
                    fill: false,
                    lineTension: 0.3,
                    backgroundColor: "#000",
                    borderColor: "#ffddee",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#141E41",
                    pointBorderWidth: 3,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "#FC2055",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: response.data.data.formations,
                    spanGaps: false
                }]
            };

            // line chart init
            let myLineChart = new Chart(lineChart2, {
                data: lineData2,
                options: {
                    legend: {
                        display: true
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: '11',
                                fontColor: '#969da5'
                            },
                            gridLines: {
                                color: 'rgba(0,0,0,0.05)',
                                zeroLineColor: 'rgba(0,0,0,0.05)'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                        }]
                    }
                }
            });
        }
        if($("#employeurChart").length){
            let lineChart2 = $("#employeurChart");
            let lineData2 = {
                    labels: response.data.wilayas,
                    datasets: [{
                        type: 'line',
                        label: "Inscription complete",
                        fill: false,
                        lineTension: 0.3,
                        backgroundColor: "#fff",
                        borderColor: "#047bf8",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#141E41",
                        pointBorderWidth: 3,
                        pointHoverRadius: 10,
                        pointHoverBackgroundColor: "#FC2055",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 3,
                        pointRadius: 5,
                        pointHitRadius: 10,
                        data: response.data.data.employeurs,
                        spanGaps: false
                    },{
                    type: 'line',
                    label: "Inscription non complete",
                    fill: false,
                    lineTension: 0.3,
                    backgroundColor: "#000",
                    borderColor: "#ffddee",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#141E41",
                    pointBorderWidth: 3,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "#FC2055",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: response.data.data.usersInactif,
                    spanGaps: false
                }]
                };
            let myLineChart = new Chart(lineChart2, {
                    data: lineData2,
                    options: {
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    fontSize: '11',
                                    fontColor: '#969da5'
                                },
                                gridLines: {
                                    color: 'rgba(0,0,0,0.05)',
                                    zeroLineColor: 'rgba(0,0,0,0.05)'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                }
                            }]
                        }
                    }
                });

        }
    })  
    .catch(err => {
        console.log(err)
    })
    

</script>
@endsection
