<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputmask.min.js') }}"></script>
<script>
    @if($errors->any())
    swal({
            title: "Attention",
            text: "@foreach($errors->all() as $error) {{$error}} \n @endforeach",
            icon: "warning",
            button: "Fermer",
            dangerMode: true,
        });
    @endif
    @if(session('error'))
    swal({
            title: "Attention",
            text: "{{ session('error') }}",
            icon: "warning",
            button: "Fermer",
            dangerMode: true,
        });
    @endif

    $(document).ready(function(){
        $("#code_employeur").inputmask("9999999999"); // 10length
        $("#email-e").inputmask({ alias: "email"});
        $("#email").inputmask({ alias: "email"}); 
        $('.password').on('mouseenter', function(){
            $(this).attr('type','text');
        });
        $('.password').on("mouseleave", function(){
            $(this).attr('type','password');
            });

    });
</script>
<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    $(function(){
    var submit = true;
        $("#code_employeur").on('keyup',function(){
            $("#code_employeur").removeClass("border-success");
            $(".code_emplyeur_message").hide();
            $(".code_emplyeur_message_existe").hide();
            code = $(this).val().replaceAll('_', '');
                // if(String(code).length == 10){
                //     $("#code_employeur").val("");
                //     $("#code_employeur").addClass('check').blur().attr('readonly',false);
                // }
                if(String(code).length == 10){
                    // code = code.slice(0, -2);
                    try{
                        somme1 = (parseInt(code.charAt(0))
                                + parseInt(code.charAt(2))
                                + parseInt(code.charAt(4))
                                + parseInt(code.charAt(6))) * 2;

                        somme2 = (parseInt(code.charAt(1))
                                + parseInt(code.charAt(3))
                                + parseInt(code.charAt(5))
                                + parseInt(code.charAt(7)));
                        cle = ("" + (99 - (somme1 + somme2))).padStart(2, '0');
                        // code = code + cle;
                        // 1617047460
                        $("#code_employeur").val(code);
                        // $("#code_employeur").blur().attr('readonly',true);
                        $('.spinner').show();
                        axios.post('{{ route("employeur.code.check") }}', {code})
                        .then(function (response) {
                            if(response.status != 200){
                                swal({
                                    title: "Attention",
                                    text: "une erreur s'est produite veuillez réessayer",
                                    icon: "warning",
                                    button: "Fermer",
                                    dangerMode: true,
                                });
                                $('.spinner').hide();
                                $("#code_employeur").removeClass("border-success");
                                $("#code_employeur").val("");
                                submit = false;
                                return submit;
                            }
                            $('.rate-limiter').text(response.headers['x-ratelimit-remaining']);
                            if(response.data.code == 1){
                                // $(".code_emplyeur_message").show().text("le code employeur n'est pas valide");
                                // $("#code_employeur").addClass('check').blur().attr('readonly',false);
                                swal({
                                    title: "Attention",
                                    text: response.data.message,
                                    icon: "warning",
                                    button: "Fermer",
                                    dangerMode: true,
                                });
                                $("#code_employeur").val("");
                                $('.spinner').hide();
                                submit = false;
                            }else{
                                $('.spinner').hide();
                                $("#code_employeur").addClass("border-success");
                                submit = true;
                                return submit;
                                
                            }
                        })
                        .catch(function (error) {
                            if(error.response?.status == 429){
                                swal({
                                    title: "Limite de requêtes atteinte",
                                    text: "Vous avez dépassé le nombre maximal de 10 requêtes par minute. Veuillez réessayer plus tard.",
                                    icon: "warning",
                                    button: "Fermer",
                                    dangerMode: true,
                                });
                            }else{
                                swal({
                                    title: "Attention",
                                    text: "une erreur s'est produite veuillez réessayer",
                                    icon: "warning",
                                    button: "Fermer",
                                    dangerMode: true,
                                });
                            }
                            
                            $('.spinner').hide();
                            $("#code_employeur").removeClass("border-success");
                            $("#code_employeur").val("");
                            submit = false;
                            return submit;
                        });
                        
                    }catch (error) {}
                }
        });
        $("#contact-form3").on('submit', function(e){
            if(!submit){
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>