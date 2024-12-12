<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CNAC | LOI0621 {{ "| " . $pagetitle ?? "|" }}</title>
    <meta name="description" content="{{ $options['description'] }}" />
    <meta name="keywords" content="{{ $options['keywords'] }}" />
    <meta name="author" content="Mebrouki Amine" />

    <link rel="shortcut icon" href="{{ asset('assets/images/logoWithoutTitle.png') }}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/materialdesignicons.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" />

    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/selectize.css') }}" />

    <!--Slider-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}" />

    @yield('styles')

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fix.css') }}" />

</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->
    <section class="section m-0 p-0 banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('assets/images/header.png?v=3') }}" alt="" width="100%">
                </div>
            </div>
        </div>
    </section>
    <br/>
    <div class=" col-12 p-4 text-center rounded">
        <h5 > <b> Plateforme d’inscription en ligne </b></h5>
        <h5><b>au profit des Employeurs</b></h5>
        <h5>Pour le bénéfice des avantages des mesures d’encouragement</h5>
        <h5>et d’appui à la promotion de l’emploi</h5>
    </div>
    
    <header id="topnav" class="defaultscroll scroll-active active">
        <!-- Tagline STart -->

        <!-- Tagline End -->

        <!-- Menu Start -->
        <div class="container">
            <!-- Logo container-->
            {{-- <div>
                <a href="index.html" class="logo">
                    <img src="images/logo-light.png" alt="Cnac Logo light" class="logo-light" height="18">
                    <img src="images/logo-dark.png" alt="Cnac logo dark" class="logo-dark" height="18">
                </a>
            </div> --}}
            {{-- <div class="buy-button">
                <a href="https://www.cnac.dz" target="_blank" class="btn btn-primary"><i class="mdi mdi-glob"></i> www.cnac.dz</a>
            </div> --}}
            <!--end login button-->
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <div id="navigation" class="active">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="active"><a href="{{ route('accueil') }}">Accueil</a></li>
                    {{-- <li class="has-submenu">
                        <a href="javascript:void(0)">Subvention</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="job-list.html">Inscription</a></li>
                            <li><a href="job-list.html">Connexion</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="javascript:void(0)">Formation</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="about.html">Inscription</a></li>
                            <li><a href="services.html">Connexion</a></li>
                        </ul>
                    </li> --}}
                    @if(Auth::check())
                        <li class="active">
                            <a href="{{ route('employeur.profile') }}">Profile</a>
                        </li>
                        <li class="active">
                            <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="os-icon os-icon-ui-15"></i><span>{{ __('se Deconnecter') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="active"><a href="{{ route('login') }}">s'Identifier</a></li>
                    @endif
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
        <!--end end-->
    </header>


    @yield('section-content')

    <!-- footer start -->
    {{-- <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="javascript:void(0)"><img src="{{ asset('assets/images/cnac-light.png') }}" height="20" alt="CNAC LOGO"></a>
                    <p class="mt-4">Mesure d'encouragement d'Aide à l'Emploi</p>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Subvention</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Inscription</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Connexion</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Formation</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Inscription</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Connexion</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title f-17">Contact</p>
                    <ul class="list-unstyled text-foot mt-4 mb-0">
                        <li>TEL: +213 23 37 72 82</li>
                        <li>TEL: +213 23 37 72 91/93/94</li>
                        <li class="mt-2">FAX: 23 37 73 01</li>
                        <li class="mt-2">contact@cnac.dz</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> --}}
    <!-- footer end -->
     {{-- <hr> --}}
    <footer >
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <p class="mb-0">© {{ Date('Y') }} - Mesure d'encouragement d'Aide à l'Emploi - v1.0.0 - Design by DESI. <a href="https://www.cnac.dz">www.cnac.dz</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" class="back-to-top rounded text-center" id="back-to-top">
        <i class="mdi mdi-chevron-up d-block"> </i>
    </a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- selectize js -->
    <script src="{{ asset('assets/js/selectize.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset("assets/js/counter.int.js") }}"></script> --}}

    @yield('before-appjs')

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/js/phonemask.js') }}"></script>

    @yield('script')

    <script>
        // $(function(){

        //     var footerbar = $(".footer-bar");
        //     footerbar.css({
        //         position: 'fixed',
        //         bottom: '0px',
        //         left: '0px'
        //     });
        //     console.log(footerbar);

        //     $(window).on('scroll', function(){
        //         if($(window).offset().top > 0){
        //             footerbar.css('position', 'relative');
        //         }else{
        //             footerbar.css('position', 'fixed');
        //         }
        //     });

        // })
    </script>

</body>
</html>
