<!DOCTYPE html>
<html>

<head>
    <title>CNAC - Espace Employeur</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Mebrouki Amine - Oulaceb Sabrina" name="author">
    <meta content="CNAC - Espace Employeur" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" href="{{ asset('assets/images/logoWithoutTitle.png') }}">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/dropzone/dist/dropzone.css" rel="stylesheet') }}">
    <link href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/main.css') }}" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mirza:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/admin/icon_fonts_assets/picons-thin/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fix.css?v=1.0.0') }}" rel="stylesheet">
    @livewireStyles()
    @yield('styles')
</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">

        <div class="layout-w">

            <div class="content-w">
                
                <!--------------------
                START - Top Bar
                -------------------->
                <div class="top-bar color-scheme-transparent dont-print">
                    <!--------------------
                    START - Top Menu Controls
                    -------------------->
                    <div class="ml-4 py-1">
                        <img src="{{ asset('assets/images/logoWithoutTitle.png') }}" width="50px" alt="">
                    </div>
                    <div class="top-menu-controls">
                        <!--------------------
                        START - Messages Link in secondary top menu
                        -------------------->
                        {{-- <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                            <i class="os-icon os-icon-menu"></i>
                            <div class="os-dropdown light message-list">
                                <ul>
                                    <li>
                                        <a href="{{ route('subvention.demande.list') }}">
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                   Subvention
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('formation.demande.list') }}">
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                   Formation
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!--------------------
                        END - Messages Link in secondary top menu
                        -------------------->
                        <!--------------------
                        START - Settings Link in secondary top menu
                        -------------------->
                        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                            <i class="os-icon os-icon-ui-46"></i>
                            <div class="os-dropdown">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-ui-46"></i>
                                </div>
                                <ul>
                                    {{-- <li>
                                        <a href="{{ route('employeur.profile') }}">
                                            <i class="os-icon os-icon-ui-49"></i><span>Profile</span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('employeur.profile') }}">
                                        <i class="os-icon os-icon-user"></i>Profil</a>
                                        <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                             <i class="os-icon os-icon-ui-15"></i><span>Déconnecter</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--------------------
                        END - Settings Link in secondary top menu
                        -------------------->
                                <!--------------------
                        START - User avatar and menu in secondary top menu
                        -------------------->
                        {{-- <div class="logged-user-w">
                            <div class="logged-user-i">
                                <div class="avatar-w">
                                    <img alt="" src="{{ asset('assets/admin/img/avatar1.jpg') }}">
                                </div>
                                <div class="logged-user-menu color-style-bright">
                                    <div class="logged-user-avatar-info">
                                        <div class="avatar-w">
                                            <img alt="" src="img/avatar1.jpg">
                                        </div>
                                        <div class="logged-user-info-w">
                                            <div class="logged-user-name">
                                                Maria Gomez
                                            </div>
                                            <div class="logged-user-role">
                                                Administrator
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-icon">
                                        <i class="os-icon os-icon-wallet-loaded"></i>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="apps_email.html"><i
                                                    class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                                        </li>
                                        <li>
                                            <a href="users_profile_big.html"><i
                                                    class="os-icon os-icon-user-male-circle2"></i><span>Profile
                                                    Details</span></a>
                                        </li>
                                        <li>
                                            <a href="users_profile_small.html"><i
                                                    class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i
                                                    class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <!--------------------
                        END - User avatar and menu in secondary top menu
                        -------------------->
                    </div>
                    <!--------------------
                    END - Top Menu Controls
                    -------------------->
                </div>
                <!--------------------
                END - Top Bar
                -------------------->
                    <!--------------------
                START - Breadcrumbs
                -------------------->
                <ul class="breadcrumb dont-print">
                    <li class="breadcrumb-item">
                        <a href="{{ route('accueil') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span>Profile</span>
                    </li>
                </ul>
                <!--------------------
                END - Breadcrumbs
                -------------------->
                <div class="content-panel-toggler dont-print">
                    <i class="os-icon os-icon-grid-squares-22"></i><span>Menu</span>
                </div>
                <div class="content-i">
                    <div class="content-box">
                        @yield('content')
                        <!--------------------
                        START - Color Scheme Toggler
                        -------------------->

                        <!-- <div class="floated-colors-btn second-floated-btn">
                            <div class="os-toggler-w">
                                <div class="os-toggler-i">
                                    <div class="os-toggler-pill"></div>
                                </div>
                            </div>
                            <span>Mode </span><span>Nuit</span>
                        </div> -->

                        <!--------------------
                        END - Color Scheme Toggler
                        -------------------->
                        
                        <!--------------------
                        START - Chat Popup Box
                        -------------------->

                        <!-- <div class="floated-chat-btn">
                            <i class="os-icon os-icon-mail-07"></i><span>Tickets</span>
                        </div> -->
                        <!-- <div class="floated-chat-w">
                            <div class="floated-chat-i">
                                <div class="chat-close">
                                    <i class="os-icon os-icon-close"></i>
                                </div>
                                <div class="chat-head">
                                    <div class="user-w ">
                                        <div class="user-avatar-w">
                                            <div class="user-avatar">
                                                <img alt="" src="img/avatar1.jpg">
                                            </div>
                                        </div>
                                        <div class="user-name">
                                            <h6 class="user-title">
                                                Ticket
                                            </h6>
                                            <div class="user-role">
                                                Ajouter
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-messages">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Sujet" required="required" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="chat-controls">
                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit"> Ajouter</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!--------------------
                        END - Chat Popup Box
                        -------------------->
                    </div>
                    <!--------------------
                    START - Sidebar
                    -------------------->
                    @yield('sidebar')
                    <!--------------------
              END - Sidebar
              -------------------->
                </div>
            </div>
        </div>
        <div class="display-type dont-print"></div>
        @if ($options['tickets'])
            
        <livewire:employeur.ticket-wire />
        @endif
    </div>
    <script src="{{ asset('assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/moment/moment.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/editable-table/mindmup-editabletable.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}">
    </script>
    <script src="{{ asset('assets/admin/bower_components/tether/dist/js/tether.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/util.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/alert.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/button.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/carousel.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/collapse.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/modal.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/tab.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/tooltip.js')}}"></script>
    <script src="{{ asset('assets/admin/bower_components/bootstrap/js/dist/popover.js')}}"></script>
    <script src="{{ asset('assets/admin/js/demo_customizer.js')}}"></script>
    <script src="{{ asset('assets/admin/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-XXXXXXX-9', 'auto');
        ga('send', 'pageview');

    </script>
    @livewireScripts()
    @yield('scripts')
</body>

</html>
