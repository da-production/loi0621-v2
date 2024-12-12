<!DOCTYPE html>
<html>

<head>
    <title>LOI0621 - Administrateur</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('assets/images/logoWithoutTitle.png') }}" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/icon_fonts_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/main.css?version=4.4.0') }}" rel="stylesheet">
    <style>
        .progress-bar-danger {
            background-color: #e90f10;
        }
        .progress-bar-warning{
            background-color: #ffad00;
        }
        .progress-bar-success{
            background-color: #02b502;
        }
    </style>
</head>

<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="javascript:void(0)"><img alt="" width="90" src="{{ asset('assets/images/logo.png')}}"></a>
            </div>
            <h4 class="auth-header mb-0">
                Réinitialiser le mot de passe
            </h4>
            <form action="{{ route('administrateur.connexion.new-password.store') }}" method="POST">
                <input type="hidden" name="token" value="{{ request('token') }}">
                <div class="form-group alert alert-dark text-light">
                    votre mot de passe a expiré et doit être changé
                </div>
                @csrf
                @if (session('error'))
                <div class="form-group alert alert-danger text-light">
                    {{session('error')}}
                </div>
                @endif
                <div class="form-group">
                    <label for="">Mot de passe 
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input class="form-control" placeholder="****************" name="password" type="password">
                    
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>

                <div class="form-group">
                    <label for="">Nouveau Mot de passe 
                        @error('new_password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input class="form-control" placeholder="****************" id="password" name="new_password" type="password">
                    
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>

                <div class="form-group">
                    <label for="">Confirme le Mot de passe 
                        @error('new_password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input class="form-control" placeholder="****************" name="new_password_confirmation" type="password">
                    
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>

                <div class="form-group">
                    <div id="popover-password">
                        <p><span id="result"></span></p>
                        <div class="progress">
                            <div id="password-strength" 
                                class="progress-bar" 
                                role="progressbar" 
                                aria-valuenow="40" 
                                aria-valuemin="0" 
                                aria-valuemax="100" 
                                style="width:0%">
                            </div>
                        </div>
                        <ul class="list-unstyled">
                            <li class="">
                                <span class="low-upper-case">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    &nbsp;Minuscule &amp; Majuscule
                                </span>
                            </li>
                            <li class="">
                                <span class="one-number">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    &nbsp;Numéro (0-9)
                                </span> 
                            </li>
                            <li class="">
                                <span class="one-special-char">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    &nbsp;Caractère spécial (!@#$%^&*)
                                </span>
                            </li>
                            <li class="">
                                <span class="eight-character">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    &nbsp;Au moins 8 caractères
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="buttons-w">
                    <button class="btn btn-primary" type="submit">Réinitialiser</button>
                    {{-- <div class="form-check-inline">
                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="remember">Rester connecter</label>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script>
            let state = false;
            let password = document.getElementById("password");
            let passwordStrength = document.getElementById("password-strength");
            let lowUpperCase = document.querySelector(".low-upper-case i");
            let number = document.querySelector(".one-number i");
            let specialChar = document.querySelector(".one-special-char i");
            let eightChar = document.querySelector(".eight-character i");

            password.addEventListener("keyup", function(){
                let pass = document.getElementById("password").value;
                checkStrength(pass);
            });

            function toggle(){
                if(state){
                    document.getElementById("password").setAttribute("type","password");
                    state = false;
                }else{
                    document.getElementById("password").setAttribute("type","text")
                    state = true;
                }
            }

            function myFunction(show){
                show.classList.toggle("fa-eye-slash");
            }

            function checkStrength(password) {
                let strength = 0;

                //If password contains both lower and uppercase characters
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                    strength += 1;
                    lowUpperCase.classList.remove('fa-circle');
                    lowUpperCase.classList.add('fa-check');
                } else {
                    lowUpperCase.classList.add('fa-circle');
                    lowUpperCase.classList.remove('fa-check');
                }
                //If it has numbers and characters
                if (password.match(/([0-9])/)) {
                    strength += 1;
                    number.classList.remove('fa-circle');
                    number.classList.add('fa-check');
                } else {
                    number.classList.add('fa-circle');
                    number.classList.remove('fa-check');
                }
                //If it has one special character
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                    strength += 1;
                    specialChar.classList.remove('fa-circle');
                    specialChar.classList.add('fa-check');
                } else {
                    specialChar.classList.add('fa-circle');
                    specialChar.classList.remove('fa-check');
                }
                //If password is greater than 7
                if (password.length > 7) {
                    strength += 1;
                    eightChar.classList.remove('fa-circle');
                    eightChar.classList.add('fa-check');
                } else {
                    eightChar.classList.add('fa-circle');
                    eightChar.classList.remove('fa-check');   
                }

                // If value is less than 2
                if (strength < 2) {
                    passwordStrength.classList.remove('progress-bar-warning');
                    passwordStrength.classList.remove('progress-bar-success');
                    passwordStrength.classList.add('progress-bar-danger');
                    passwordStrength.style = 'width: 10%';
                } else if (strength == 3) {
                    passwordStrength.classList.remove('progress-bar-success');
                    passwordStrength.classList.remove('progress-bar-danger');
                    passwordStrength.classList.add('progress-bar-warning');
                    passwordStrength.style = 'width: 60%';
                } else if (strength == 4) {
                    passwordStrength.classList.remove('progress-bar-warning');
                    passwordStrength.classList.remove('progress-bar-danger');
                    passwordStrength.classList.add('progress-bar-success');
                    passwordStrength.style = 'width: 100%';
                }
            }
        </script>
</body>

</html>
