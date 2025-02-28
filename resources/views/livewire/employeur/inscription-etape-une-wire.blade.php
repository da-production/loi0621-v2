<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="rounded shadow bg-white p-4">
                <div class="custom-form">
                    <div id="message3"></div>
                    <form method="post" action="{{ route('register') }}" name="contact-form" id="contact-form3">
                        @csrf
                        <h4 class="text-dark mb-3 row">
                            <div class="col-md-9">
                                Inscription :
                            </div>
                        </h4>

                        <div class="col-md-12 alert alert-info">
                            <h6 class="mb-0 text-center"> <i class="fa fa-info-circle"></i> L'inscription se fait en deux étapes</h6>
                        </div>
                        <div class="mx-3 mb-3 steps-container row d-flex justify-content-between">
                            
                            <div>
                                <div class="steps step-1 start active">1</div>
                                <div class="text-center mt-1">
                                </div>
                            </div>
                            <div class="sizedBox sizedbox"></div>
                            <div>
                                <div class="steps step-1 end">2</div>
                                <div class="text-center mt-1">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning">
                                    <p> <h5>Important !</h5>
                                        {{-- <span>La vérification du code de l'employeur se fait à la fois au niveau du client et du côté serveur. Cette opération peut durer quelques secondes.</span> --}}
                                        <span>La vérification du Code Employeur peut durer quelques secondes.</span>
                                        <br>
                                        <span>merci de ne pas quitter ou fermer la page</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <div class="form-button">
                                        <label class="text-muted">Code Employeur (N° Adhérent)</label>
                                        <input wire:model.lazy="code_employeur" id="code_employeur" type="text" class="form-control employeur_code" value="{{ old('code_employeur') }}" placeholder="" required autocomplete="false">
                                    <img class="spinner" src="{{ asset('assets/images/loading-buffering.gif') }}" alt="">
                                    @error('code_employeur')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <p class="text-danger code_emplyeur_message"></p>
                                    <p class="text-danger code_emplyeur_message_existe" style="display: none"></p>
                                    <p class="text-success code_emplyeur_message_success" style="display: none"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <div class="form-button">
                                        <label class="text-muted">Wilaya</label>
                                        <select class="form-control" name="cod_wilaya">
                                            <option value=""></option>
                                            @foreach ($wilayas as $wilaya)
                                                <option value="{{ $wilaya->cod_wilaya }}">({{ $wilaya->cod_wilaya }}) {{ $wilaya->des_fr }} -- {{ $wilaya->des_ar }}</option>
                                            @endforeach
                                        </select>
                                        @error('cod_wilaya')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-muted">Nom</label>
                                    <input  name="nom" type="text" class="form-control resume" value="{{ old('nom') }}" placeholder="" required>
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-muted">Prenom</label>
                                    <input name="prenom" type="text" class="form-control resume" value="{{ old('prenom') }}" placeholder="" required>
                                    @error('prenom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group app-label mt-2 position-relative">
                                    
                                </div>
                            </div> --}}

                        </div>


                        <h4 class="text-dark mb-3">Compte Identifiant :</h4>

                        <div class="row alert alert-light">
                            <div class="col-md-4">
                                <div class="form-group app-label mt-2">
                                    <label class="text-muted" for="email">E-MAIL</label>
                                    <input id="email" name="email" type="text" class="form-control resume" value="{{ old('email') }}" placeholder="" required>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group app-label mt-2">
                                    <label class="text-muted">Mot de passe</label>
                                    <input id="company-name" name="password" type="password" class="form-control resume password" placeholder="" required>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group app-label mt-2">
                                    <label class="text-muted">Confirmer votre mot de passe</label>
                                    <input id="company-name" name="password_confirmation" type="password" class="form-control password resume" placeholder="">
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-12" style="direction: rtl;">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                    <p class="text-danger text-right">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> 
                        

                        <div class="row">
                            <div class="col-lg-12 mt-2 text-right">
                                <button type="submit" role="button" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>