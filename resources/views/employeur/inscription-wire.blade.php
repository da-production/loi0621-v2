{{-- 
    Read the document README.md
    route file: web.php
    @Route(
        url: '/register'
        name: 'register'
    )
    @Controller: Auth\RegisterController
    @action: register
    @variablies: [
        'wilayas' => Array,
    ]
    @RouteCallingAction: [
        register: POST METHOD
    ]
    @Compononents:[
        x-scripts/employeur/register-component
    ]
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
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/landing.css') }}" />
        @livewireStyles()

        <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
        <style>
            .check{
                background-color: #c5c5c5;
            }
            .spinner{
                position: absolute;
                top: 42px;
                width: 20px;
                right: 20px;
                display: none;
            }
        </style>
@endsection

@section('section-content')

        <section class="section py-1">
            <div class="container">
                <div class="row">
                    {{-- <h1 class="col-12 text-center">Mesures d’encouragements d’aide à l’emploi</h1> --}}
                    <h3 class="col-12 text-center">Inscription</h3>
                    {{-- @if ($errors->any())    
                    <div class="col-10 offset-md-1">
                        <div class="alert alert-danger" role="alert"> Merci de compléter tous les champs</div>
                    </div>
                    @endif --}}
                </div>
            </div>
        </section>

        <!-- POST A JOB START -->
        <section class="section pt-2">
            <livewire:employeur.inscription-etape-une-wire />
        </section>
        <!-- POST A JOB END -->
@endsection


@section('before-appjs')
        <!-- selectize js -->
        <script src="{{ asset('assets/js/selectize.min.js') }}"></script>

        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
@endsection

@section('script')
{!! NoCaptcha::renderJs() !!}
@livewireScripts()
<x-scripts.employeur.register-component />
@endsection
