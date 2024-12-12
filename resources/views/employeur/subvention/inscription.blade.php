@extends('layouts.landing')

@php
    $pagetitle = "Subvention - Inscription";
@endphp

@section('styles')
        <!-- selectize css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/selectize.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}" />
        <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
        <link rel="stylesheet" href="{{ asset('assets/css/datepiker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/keyboard-arabic.css') }}">
@endsection

@section('section-content')

        <section class="section py-1">
            <div class="container">
                <div class="row justify-content-center">
                    {{-- <h3 class="col-12 text-center">MESURES D'ENCOURAGEMENT ET D'APPUI A LA PROMOTION DE L'EMPLOI</h3> --}}
                    <h3 class="col-12 text-center">Subvention mensuelle à l'emploi accordée aux employeurs</h3>
                    @if (session()->has('success'))
                        <div class="col-10">
                            <div class="alert alert-success" role="alert"> {{ session('success') }}</div>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="col-10">
                            <div class="alert alert-danger" role="alert"> {{ session('error') }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- POST A JOB START -->
        <section class="section pt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="rounded shadow bg-white p-4">
                            <div class="custom-form">
                                <div id="message3"></div>
                                <x-employeur.inscription2-component type="subvention" :status="$status" :branches="$branches" :wilaya="$wilaya" :employeur="auth()->user()->employeur"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- POST A JOB END -->
@endsection


@section('before-appjs')
        <!-- selectize js -->
        <script src="{{ asset('assets/js/selectize.min.js') }}"></script>

        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inputmask.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#employeur").inputmask("9999999999"); // 10length
            $("#code_employeur_cnas").inputmask("9999999999") // 10length
            $("#nass").inputmask("999999999999"); // 12length
            $("#email-e").inputmask({ alias: "email"});
            $("#email").inputmask({ alias: "email"});
            $("#NIF").inputmask("999999999999999");  // 15length
            $("#NIS").inputmask("999999999999999");  // 15length
            $("#RIB").inputmask("99999999999999999999");  // 20length
            $('.password').on('mouseenter', function(){
                $(this).attr('type','text');
            });
            $('.password').on("mouseleave", function(){
                $(this).attr('type','password');
                });

            // $('#check').on('click',function(){
            //     var input = $('input');
            //     $('input').each(function(){
            //         console.log('\n',$(this).val());
            //     });
            // });
            var wilayaFr = $('#wilaya-fr');
            var wilayaAr = $('#wilaya-ar');
            wilayaFr.on('change', function(){
                wilayaAr.val($(this).val());
                console.log(wilayaAr.val());
            });
            wilayaAr.on('change', function(){
                wilayaFr.val($(this).val());
                console.log(wilayaFr.val());
            });
        });
        @if($errors->any())
        swal({
                title: "Attention",
                text: "Veuillez remplir tous les champs, \n et respecter le formatage des champs",
                icon: "warning",
                button: "Fermer",
                dangerMode: true,
            });
        @endif
    </script>
    <script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>
    <script src="{{ asset('assets/js/datepiker.js') }}"></script>
    <script src="{{ asset('assets/js/datepiker-fr.js') }}"></script>
    <script>
        // $('.datepicker').datepicker({
        //     format: 'yyyy-mm-dd'
        // });
    </script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        axios.post('https://teledeclaration.cnas.dz/srv/cnas/cotisant/cnac/'+ {{ auth()->user()->code_employeur }} + '?usr=cnac&pwd=FD@85_GKwsD01', {
            usr: 'cnac',
            pwd: 'FD@85_GKwsD01'
        })
        .then(function (response) {
            if(response.data.message == "00"){
                xdata = response.data.cotisant;
                $("#raison_social").val(xdata.companyNameLt);
                // $('#adresse').val(xdata.adressInAlgeriaLt);
                $("#installationDate").val(xdata.installationDate);
                console.log(response);
            }else{
                
            }
        });
    </script>
@endsection
