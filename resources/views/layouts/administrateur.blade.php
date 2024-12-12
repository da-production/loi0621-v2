<!DOCTYPE html>
<html>
  <head>
    <title>CNAC :: LOI0621 :: ADMIN</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/dropzone/dist/dropzone.css" rel="stylesheet') }}">
    <link href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/icon_fonts_assets/themefy/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/icon_fonts_assets/picons-thin/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/newrules.css') }}" rel="stylesheet">
    <style>
    @media print {
        .dont-print{
            display:none;
        }
        .mw{
            width:27cm !important;
            max-width:27cm !important;
        }
    }
    </style>
    @yield('styles')
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <!-- Preloader -->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <div class="all-wrapper with-side-panel solid-bg-all">
      <div aria-hidden="true" class="onboarding-modal modal fade animated hide-on-load dont-print" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered" role="document">
          <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Skip Intro</span><span class="os-icon os-icon-close"></span></button>
            <div class="onboarding-slider-w">
              <div class="onboarding-slide">
                <div class="onboarding-media">
                  <img alt="" src="img/bigicon2.png" width="200px">
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Example of onboarding screen!
                  </h4>
                  <div class="onboarding-text">
                    This is an example of a multistep onboarding screen, you can use it to introduce your customers to your app, or collect additional information from them before they start using your app.
                  </div>
                </div>
              </div>
              <div class="onboarding-slide">
                <div class="onboarding-media">
                  <img alt="" src="img/bigicon5.png" width="200px">
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Example Request Information
                  </h4>
                  <div class="onboarding-text">
                    In this example you can see a form where you can request some additional information from the customer when they land on the app page.
                  </div>
                  <form>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Your Full Name</label><input class="form-control" placeholder="Enter your full name..." type="text" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Your Role</label><select class="form-control">
                            <option>
                              Web Developer
                            </option>
                            <option>
                              Business Owner
                            </option>
                            <option>
                              Other
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="onboarding-slide">
                <div class="onboarding-media">
                  <img alt="" src="img/bigicon6.png" width="200px">
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Showcase App Features
                  </h4>
                  <div class="onboarding-text">
                    In this example you can showcase some of the features of your application, it is very handy to make new users aware of your hidden features. You can use boostrap columns to split them up.
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <ul class="features-list">
                        <li>
                          Fully Responsive design
                        </li>
                        <li>
                          Pre-built app layouts
                        </li>
                        <li>
                          Incredible Flexibility
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6">
                      <ul class="features-list">
                        <li>
                          Boxed & Full Layouts
                        </li>
                        <li>
                          Based on Bootstrap 4
                        </li>
                        <li>
                          Developer Friendly
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- @include('partials.admin.top-searchbar') --}}
      
      <div class="layout-w">

        <x-administrateur.main-menu-component />
        <div class="content-w">
          <!--------------------
          START - Top Bar
          -------------------->
          <div class="top-bar color-scheme-transparent dont-print">
            <!--------------------
            START - Top Menu Controls
            -------------------->
            <div class="top-menu-controls">
              {{-- <div class="element-search autosuggest-search-activator">
                <input placeholder="Start typing to search..." type="text">
              </div> --}}

              <!--------------------
              START - Settings Link in secondary top menu
              -------------------->
              <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                <i class="os-icon os-icon-ui-46" onclick="zoomIn()"></i>
              </div>
              {{-- <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                <i class="os-icon os-icon-ui-46"></i>
                <div class="os-dropdown">
                  <div class="icon-w">
                    <i class="os-icon os-icon-ui-46"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                    </li>
                  </ul>
                </div>
              </div> --}}
              <!--------------------
              END - Settings Link in secondary top menu
              --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
              <div class="logged-user-w">
                <div class="logged-user-i">
                  <div class="avatar-w">
                    <img alt="" src="img/avatar1.jpg">
                  </div>
                  <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="img/avatar1.jpg">
                      </div>
                      <div class="logged-user-info-w">
                        <div class="logged-user-name">
                          Admin
                        </div>
                        <div class="logged-user-role">
                          Admin
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                      <li>
                        <a href="javascript:void(0)"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile</span></a>
                      </li>
                      <li>
                        <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Déconnecter</span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
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
          --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb dont-print">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <span>Accueil</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-panel-toggler dont-print">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Dashboard</span>
          </div>
          <div class="content-i">
            <div class="content-box">
              @yield('content')
              <!--------------------
              START - Color Scheme Toggler
              -------------------->
              <div class="floated-colors-btn second-floated-btn dont-print" style="right:0px !important;">
                <div class="os-toggler-w">
                  <div class="os-toggler-i">
                    <div class="os-toggler-pill"></div>
                  </div>
                </div>
                <span>Mode </span><span>Sombre </span>
              </div>
              <!--------------------
              END - Color Scheme Toggler
              -------------------->
              <!--------------------
              START - Chat Popup Box
              -------------------->
              {{-- <div class="floated-chat-btn dont-print">
                <i class="os-icon os-icon-mail-07"></i><span>Tickets</span>
              </div>
              <div class="floated-chat-w dont-print">
                <div class="floated-chat-i">
                  <div class="chat-close">
                    <i class="os-icon os-icon-close"></i>
                  </div>
                  <div class="chat-head">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar1.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          John Mayers
                        </h6>
                        <div class="user-role">
                          Account Manager
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-messages">
                    <div class="message">
                      <div class="message-content">
                        Hi, how can I help you?
                      </div>
                    </div>
                    <div class="date-break">
                      Mon 10:20am
                    </div>
                    <div class="message">
                      <div class="message-content">
                        Hi, my name is Mike, I will be happy to assist you
                      </div>
                    </div>
                    <div class="message self">
                      <div class="message-content">
                        Hi, I tried ordering this product and it keeps showing me error code.
                      </div>
                    </div>
                  </div>
                  <div class="chat-controls">
                    <input class="message-input" placeholder="Type your message here..." type="text">
                    <div class="chat-extra">
                      <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
                    </div>
                  </div>
                </div>
              </div> --}}
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
            @yield('content-panel')
          </div>
        </div>
      </div>
      <div class="display-type"></div>
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
    <script src="{{ asset('assets/admin/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
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
    <script src="{{ asset('assets/admin/js/main.js?v=1.0.0')}}"></script>
    <script>
      function zoomIn()
      {
        if(!document.body.style.zoom){
          document.body.style.zoom = 1.1
        }else{
          document.body.style.zoom = 1.1 + 0.1
        }
        return false;
      }

      function zoomOut()
      {
        var Page = document.body;
        var zoom = parseInt(Page.style.zoom) - 10 +'%'
        Page.style.zoom = zoom;
        return false;
      }
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-XXXXXXX-9', 'auto');
      ga('send', 'pageview');

      $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'overflow':'visible'});
      })
    </script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('scripts')
  </body>
</html>
