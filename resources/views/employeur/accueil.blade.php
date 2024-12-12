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
@section('section-content')
<!-- Hero Start -->
<section class="mt-5 mb-5 pb-5">

    <div class="home-center">
        <div class="home-desc-center">
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
                             <div class="row">
                                    <div class="col-lg-12 element-box-tp">
                                        <div class="el-buttons-list full-width text-center">
                                            <a class="btn btn-white btn-lg" 
                                            href="{{ !is_null(auth()->user()->subvention) ? route('subvention.demande.list') : route('employeur.profile') }}"
                                            >
                                                <i class="os-icon os-icon-x-circle"></i>
                                                <span>Subvention</span>
                                            </a>
                                        </div>
                                        <div class="el-buttons-list full-width text-center">
                                            <a class="btn btn-white btn-lg" 
                                            href="{{ !is_null(auth()->user()->formation) ? route('formation.demande.list') : route('employeur.profile') }}">
                                                <i class="os-icon os-icon-x-circle"></i>
                                                <span>Formation</span>
                                            </a>
                                        </div>
                                    </div>

                                    
                                </div>
                        </div><!---->
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </div>
    </div>
</section><!--end section-->
<!-- Hero End -->
@endsection

