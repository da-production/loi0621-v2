<!DOCTYPE html>
<html>

<head>
    <title>Loi0621 - Administrateur</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('assets/images/logoWithoutTitle.png') }}" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/main.css?version=4.4.0') }}" rel="stylesheet">
</head>

<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="javascript:void(0)"><img alt="" width="90" src="{{ asset('assets/images/logo.png')}}"></a>
            </div>
            <h4 class="auth-header">
                Connexion
            </h4>
            <form action="{{ route('administrateur.password.reset') }}" method="POST">
                @csrf
                @if (session('error'))
                <div class="form-group alert alert-danger">
                    {{session('error')}}
                </div>
                @endif
                @if (session('success'))
                <div class="form-group alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" type="text">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
