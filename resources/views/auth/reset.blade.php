{{-- 
    Read the document README.md
    route file: web.php
    @Route(
        url: '/login'
        name: 'login'
    )
    @Controller: Auth\LoginController
    @action: showRegistrationForm
    @variablies: []
    @RouteCallingAction: [
        login: POST METHOD
    ]
    @Compononents:[]
    @EloquentRelationships: []
    
    WARNING
    Add Comment for each changes you made
--}}

@extends('layouts.landing')

@php
    $pagetitle = "Réinitialiser le mot de passe";
@endphp

@section('styles')
        <!-- selectize css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/selectize.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}" />
        
<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css"> 
@endsection

<style>
    .text-muted-2{
        color: #161c2d;
    }
</style>

@section('section-content')
<!-- Hero Start -->
<section class="mt-5">

    <div class="home-center">
        <div class=""> {{-- old class name home-desc-center --}}
            <div class="container">
                    @if(session('error'))
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="alert alert-danger">
                                {{session('error')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="alert alert-success">
                                {{session('success')}}
                                </div>
                            </div>
                        </div>
                    @endif
                <div class="row justify-content-center">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="login-page bg-white shadow rounded p-4">
                            <div class="text-center">
                                <h4 class="mb-4">réinitialiser le mot de passe</h4>  
                            </div>
                            <form class="login-form" action="{{ route('employeur.sendemail') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group position-relative">
                                            <label>Identifiant<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('email') }}" placeholder="Email ou Votre Code Employeur" name="email" required="">
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3" style="direction: rtl;">
                                        {!! NoCaptcha::display() !!}
                                    </div>

                                    <div class="col-lg-12 mb-0">
                                        <button class="btn btn-primary w-100" type="submit">Envoyer</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="mb-0 mt-3">
                                            <a href="{{ route('login') }}" class="text-dark font-weight-bold">retourner à la page de connexion</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div><!---->
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </div>
    </div>
</section><!--end section-->
<!-- Hero End -->
@endsection


@section('before-appjs')
        <!-- selectize js -->
        <script src="{{ asset('assets/js/selectize.min.js') }}"></script>

        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
@endsection

@section('script')
{!! NoCaptcha::renderJs() !!}
    <script src="{{ asset('assets/js/jquery.inputmask.min.js') }}"></script>    
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

        
    <script>
        @if(session()->has('error'))
        swal({
                title: "Attention",
                text: {{ session()->get('error') }},
                icon: "warning",
                button: "Fermer",
                dangerMode: true,
            });
        @endif
        $(document).ready(function(){
            $("#code_employeur").inputmask("99999999"); // 8length
            $("#sigle").inputmask("999999999999999"); // 15length
            $("#nass").inputmask("999999999999"); // 12length
            $("#email-e").inputmask({ alias: "email"});
            $("#email").inputmask({ alias: "email"});
            $("#nif").inputmask("999999999999999");
            $("#nis").inputmask("999999999999999");
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
        });
    </script>
	<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script> 

@endsection
