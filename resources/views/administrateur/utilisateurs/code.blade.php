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
    <link href="{{ asset('assets/admin/css/main.css?version=4.4.0') }}" rel="stylesheet">
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
</head>

<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="javascript:void(0)"><img alt="" width="90" src="{{ asset('assets/images/logo.png')}}"></a>
            </div>
            <h4 class="auth-header">
                Code
            </h4>
            <form action="{{ route('administrateur.code') }}" id="form-code" method="POST">
                @csrf
                @if (session('error'))
                <div class="form-group alert alert-danger">
                    {{session('error')}}
                </div>
                @endif
                <input type="hidden" name="code" id="code">
                <div class="center">
                    <div class="keys">
                      <input type="text" maxlength="1" max="1" class="input" id="code1">
                      <input type="text" maxlength="1" max="1" class="input" id="code2">
                      <input type="text" maxlength="1" max="1" class="input" id="code3">
                      <input type="text" maxlength="1" max="1" class="input" id="code4">
                    </div>
                    <p class="header alert alert-primary text-light p-2 mt-3">le code de confirmation a été envoyé à vtore email address.</p>
                    
                  </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
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
</body>

</html>
