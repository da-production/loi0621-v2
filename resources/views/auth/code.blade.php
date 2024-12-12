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
    $pagetitle = "Subvention - Inscription";
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
<style>
    .show {
opacity: 1 !important;
}
.unlocked {
width: 160px !important;
display: flex;
justify-content: center;
align-items: center;
color: #222222;
background-color: #69bd6a !important;
}
.unlocked .text {
opacity: 1 !important;
}
.stateColor {
border-radius: 0.25rem;
transition: all 250ms ease-in-out;
width: 40px;
height: 40px;
background-color: #cf6a6c;
}
.text {
opacity: 0;
color: #222222;
transition: all 250ms ease-in-out;
}
.input {
display: inline-block;
float: left;
background: #a9a9a920;
border: none;
position: relative;
border-radius: 0.25rem;
width: 3.5rem;
height: auto;
color: #0d56a5;
font-size: 2.5rem;
// margin-right: .5rem;
padding: 0.5rem 0.75rem;
text-align: center;
border: 4px solid #efefef;
outline:none;
}
.input:focus{
border-color: #0d56a5;
}
.input:last-child {
margin: 0;
}
.center {
display: flex;
align-items: center;
flex-direction: column;
}
.keys {
display: grid;
grid-template-columns: repeat(4, 1fr);
grid-gap: 20px;
grid-template-rows: 1fr;
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
                <div class="row justify-content-center">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="login-page bg-white shadow rounded p-4">
                            <div class="text-center">
                                <h4 class="mb-4">J'accède à mon espace</h4>  
                            </div>
                            <form class="login-form" action="{{ route('employeur.code.login') }}" id="form-code"  method="POST">
                                @csrf
                                @if (session('error'))
                                <div class="form-group alert alert-danger">
                                    {{session('error')}}
                                </div>
                                @endif
                                <input type="hidden" name="code" id="code">
                                <div class="row">
                                    <div class="alert alert-success col-md-12">
                                        Veuillez saisir un code de validation envoyé à votre adresse e-mail
                                    </div>
                                    <div class="alert alert-warning">
                                        <strong>Important</strong> Si vous n'avez pas reçu le code de validation, veuillez vérifier votre dossier Spam.
                                    </div>
                                    <div class="center col-md-12 mb-3">
                                        <div class="keys">
                                          <input type="text" maxlength="1" max="1" class="input" id="code1">
                                          <input type="text" maxlength="1" max="1" class="input" id="code2">
                                          <input type="text" maxlength="1" max="1" class="input" id="code3">
                                          <input type="text" maxlength="1" max="1" class="input" id="code4">
                                        </div>
                                        
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
    <script>
        $("#code1").focus();
        var code    = "";
        var n       = [0,1,2,3,4,5,6,7,8,9];
        $(".input").on('keyup', function(){
            if($(this).val().length == 1){
                if(n.includes(parseInt($(this).val()))){
                    if($(this).next().length){
                        $(this).next().focus()
                        $(this).next().val('')
                    }else{
                        code = $("#code1").val() + $("#code2").val() + $("#code3").val() + $("#code4").val();
                        $(this).blur()
                        $("#code").val(code);
                        if($("#code").val().length == 4){
                            $("#form-code").submit();
                        }
                    }
                }else{
                    $(this).val('').focus()
                }
                
            }
            
            console.log(code);
        })
    </script>
@endsection
